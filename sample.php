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
        <input type="text" name="english">
        <label for="">English 2nd quarter</label>
        <input type="text" name="english1">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php

include('connection.php');

if(isset($_POST['submit'])){
    $english1 = $_POST['english'];
    $english2 = $_POST['english1'];
    $quarter1 = 1;
    $quarter2 = 2;

    $sql = "INSERT INTO sample (english,quarter) VALUES ('$english1', '$quarter1')";
    $run = mysqli_query($conn,$sql);

    if($run){
        echo "added";

        $sql1 = "INSERT INTO sample (english,quarter) VALUES ('$english2', '$quarter2')";
        $run1 = mysqli_query($conn,$sql1);

        if($run1){
            echo "added 1" ;
        }else{
            echo "erro" . $conn->error;
        }
    }else{
        echo "error" . $conn->error;
    }
}

?>

