
<?php
session_start();
if( $_SESSION['username']){
    echo"".$_SESSION["username"];
}
else{
    header("location:login.php");
}


?>

<a href="addrecord.php"> ADD RECORD </a>





<a href="logout.php"> Logout</a>