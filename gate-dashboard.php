<?php 
    session_start();
    $OTP = rand(100000,999999);

    include('connection.php');  
    //to add the otp to the otptable
    $sql = "INSERT INTO otptable (otp) VALUES ($OTP)";
    mysqli_query($con, $sql);  
    $sql = "SELECT COUNT(otp) FROM otptable";
    $lastentry = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="gate-dashboard.css">
    <title>Scan QR</title>
</head>
<body>
  <div class="wrapper">
    <header>
      <h1>Scan QR</h1>
    </header>
    <div id="qr-code">
        <img id="qrimg" src="" alt="QR">
    </div>
  </div>
    <script>

    const qrcall = document.getElementById('qrimg');

    var OTP = <?php echo $OTP; ?>;
    if(OTP!=0){
    qrcall.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${OTP}`;
      }
</script>
</body>
</html>