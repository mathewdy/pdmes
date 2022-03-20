<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">English 1st quarter</label>
        <input type="text" name="english1">
        <label for="">English 2nd quarter</label>
        <input type="text" name="english2">
        <label for="">english 3rd</label>
        <input type="text" name="english3">
        <label for="">english 4</label>
        <input type="text" name="english4">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php

include('connection.php');

if(isset($_POST['submit'])){

    

    $english1 = $_POST['english1'];
    $english2 = $_POST['english2'];
    $english3 = $_POST['english3'];
    $english4 = $_POST['english4'];

    $average = ($english1 + $english2 + $english3 + $english4) / 4;
    echo $average;

    if($average > 75){
     echo  $string = "passed";
    }else{
      echo  $string = "failed";
    }
  
   
}

?>

