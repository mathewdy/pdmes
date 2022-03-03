<?php

session_start();
$_SESSION['username'];
unset($_SESSION['username']);
session_destroy();

echo "<script>alert('logout') </script>";
echo "<script>window.location.href='login.php' </script>";

?>