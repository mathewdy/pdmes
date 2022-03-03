<?php
$conn = new mysqli ("localhost" , "root" ,"" ,"pdmes");

if($conn == false){
    echo "not connected". $conn->error;
}


?>