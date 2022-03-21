<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');

include('connection.php');

if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php' </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="kinder.php">Kinder</a>
<a href="grade1.php">Grade 1</a>
<a href="grade2.php">Grade 2</a>
<a href="grade3.php">Grade 3</a>
<a href="grade4.php">Grade 4</a>
<a href="grade5.php">Grade 5</a>
<a href="grade6.php">Grade 6</a>
    
</body>
</html>


<?php

ob_end_flush();

?>