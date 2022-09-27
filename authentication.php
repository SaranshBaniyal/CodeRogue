<?php      
    include('connection.php');  
    $rollnumber = $_POST['rollnumber'];  
    $password = $_POST['password'];  
       
        $rollnumber = stripcslashes($rollnumber);  
        $password = stripcslashes($password);  
        $rollnumber = mysqli_real_escape_string($con, $rollnumber);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where rollnumber = '$rollnumber' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login unsuccessful. Invalid rollnumber or password.</h1>";  
        }     
?>  