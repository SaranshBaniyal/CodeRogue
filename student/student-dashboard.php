<?php
    session_start();
    include('connection.php'); 
    if(empty($_SESSION['validlogin'])){
        echo "Login Error";
    }
    else{
        date_default_timezone_set("Asia/Kolkata");
        $rollnumber = $_POST['rollnumber'];  
        $username = $_POST['username'];
        $destination = $_POST['destination'];
        $otp = $_POST['otp'];  
        $currentdatetime = date('m/d/Y h:i:s a', time());

        //to get the last otp id
        $sql = "SELECT * FROM otptable";
        $entry1 = mysqli_query($con, $sql); 
        $count = mysqli_num_rows($entry1); 

        $sql = "SELECT *FROM otptable WHERE ID = '$count'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $serverotp = $row['otp'];
        
        //to check otp and insert information into gatesession table
        if($otp == $serverotp){
            //we have to check the latest entry for the passed rollnumber if it has indatetime as '' or not
            $sql = "SELECT *FROM gatesession WHERE rollnumber = $rollnumber AND indatetime = '' ";
            $entry2 = mysqli_query($con, $sql); 
            $entryarray = mysqli_fetch_array($entry2, MYSQLI_ASSOC); 
            $countentries = mysqli_num_rows($entry2);


            //check if its a new entry
            if($countentries == 0){
                echo "$rollnumber $username $destination $currentdatetime";
                $sql = "INSERT INTO gatesession(rollnumber, username, destination, indatetime, outdatetime) VALUES ($rollnumber, \"$username\", \"$destination\", '', \"$currentdatetime\")";  
                mysqli_query($con, $sql);  
        
            }
//             //in case its an old entry that needs to be closed
            else{
                $outdatetime = $entryarray['outdatetime']; //extractinf outdatetime from the one where indatetime =  ''
                $sql = "UPDATE gatesession SET indatetime = \"$currentdatetime\" WHERE outdatetime = \"$outdatetime\";";
                mysqli_query($con, $sql);  //this is troublesome // solved by escaping "" in string type variable
                
                
            }

        }
    }
     
?>

