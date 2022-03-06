<?php
session_start();
include('connection.php');
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php' </script>";
}

if(isset($_GET['lrn'])){
    $lrn =  $_GET['lrn'];
    if(empty($lrn)){    //lrn verification starts here
        echo "<script>alert('LRN not found');
        window.location = 'index.php';</script>";
        exit();
    }
    $verify_lrn = "SELECT learners_personal_infos.lrn FROM `learners_personal_infos` WHERE lrn = '$lrn'";
    $query_request = mysqli_query($conn, $verify_lrn) or die (mysqli_error($conn));
    if(mysqli_num_rows($query_request) == 0){
            echo '
            <script type = "text/javascript">
                alert("LRN does not exist");
                window.location = "index.php";
            </script>
        ';
            exit();
    }   //lrn verification ends here


    $delete_student_info = "DELETE FROM `learners_personal_infos` WHERE learners_personal_infos.lrn = '$lrn'";
    $query_delete_data = mysqli_query($conn, $delete_student_info) or die (mysqli_error($conn));
    if($query_delete_data){
        echo '
            <script type = "text/javascript">
                alert("Delete successfuly");
                window.location = "index.php";
            </script>
        ';
            exit();
    }
}

?>