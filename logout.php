<?php
session_start();
unset($_SESSION['access']);
unset($_SESSION['id']);
unset($_SESSION['address']);
unset($_SESSION['contact']);
unset($_SESSION['name']);
unset($_SESSION['level']);
echo "<script> document.location.href='login.php';</script>";
?>
 