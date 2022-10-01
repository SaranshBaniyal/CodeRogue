<?php       
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>QR Scanner</title>
    <link href="scanner.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <script src="library.js"></script>
<div class="wrapper">
  <p class="msg">Enter Destination</p>
<form action="student-dashboard.php" method="post">

    <input id="inp" name="destination" type="text" placeholder="Write Here">
        <input id="otp" name="otp" type="text">
        <input id="rollnumber" name="rollnumber" type="number" value="<?php echo $_SESSION['rollnumber']; ?>">
        <input id="username" name="username" type="text" value="<?php echo $_SESSION['username']; ?>">


    <div class="row">
        <div class="col">
            <div id="reader"></div>
        </div>
        <div class="col">
            <h4>SCAN RESULT</h4>
            <div id="result">Result Here</div>
        </div>
    </div>
    

    <input id="sp" type="submit" onclick="subfun()">
</form>
  </div>
    <script type="text/javascript">
    
        let a = 0;
        function onScanSuccess(qrCodeMessage) {
            document.getElementById('result').innerHTML = '<span>' + qrCodeMessage + '</span>';
            a = 1;
            document.getElementById('otp').value = qrCodeMessage;
            document.getElementById('reader__scan_region').style.display="none";    
        document.getElementById('reader__dashboard_section').style.display="none";
        
        }
        

        function onScanError(errorMessage) {
            //handle scan error
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {fps: 10, qrbox: 250});
        html5QrcodeScanner.render(onScanSuccess, onScanError);

        function subfun() {
            let takeInp = document.getElementById('inp').value;
            let b = 1;
            if (takeInp.length == 0){
                b = 0;
            }
            if (b == 1 && a==1) {
                alert("Form Submitted");
            }
            else if(b==0 && a==1){
                alert("Enter Destination");
            }
            else if(b==1 && a==0){
                alert("Scan QR Correctly");
            }
            else {
                alert("Enter Destination and Scan QR Correctly");
            }
        }
    </script>
</body>

</html>