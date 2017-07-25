<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['type']);
echo "注销成功";
header('location:login.php');
?>