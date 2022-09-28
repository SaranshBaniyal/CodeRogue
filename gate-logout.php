<?
session_start();
session_unset();
session_destroy();
header("location:gate-login.html");
exit();
?>