<?php
ob_start();
include('connection.php');
session_start();
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php' </script>";
}
echo $_SESSION['lrn'];
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





</body>
</html>
<?php
ob_end_flush();

?>