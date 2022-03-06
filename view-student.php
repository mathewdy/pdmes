<?php
include('connection.php');
session_start();
if(empty($_SESSION['username'])){
   echo "<script>window.location.href='login.php'</script>";
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
    <?php
    $sql = "SELECT * FROM learners_personal_infos 
    LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn
    LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn
    WHERE learners_personal_infos.lrn = '$lrn'";
    $run = mysqli_query($conn, $sql);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);
    ?>
    <a href="index.php">Back</a>
    <h2>Learner's Personal Information</h2>
    <p><span>LRN: <?php echo $rows['lrn'];?></span></p>
    <p><span>First Name: <?php echo $rows['first_name'];?></span></p>
    <p><span>Last Name: <?php echo $rows['last_name'];?></span></p>
    <p><span>Middle Name: <?php echo $rows['middle_name'];?></span></p>
    <p><span>Suffix: <?php if (empty($rows['suffix'])){?>N/A
        <?php }else{ echo $rows['suffix']; }?></span></p>
    <p><span>Birthday: <?php echo $rows['birth_date'];?></span></p>
    <p><span>Sex: <?php echo $rows['sex'];?></span></p>
    <br>
    <h2>Eligibility For Elementary School Enrollment</h2>
    <p><span>Credential Presented: <?php echo $rows['credential_presented'];?></span></p>
    <p><span>Name of School: <?php echo $rows['name_of_school'];?></span></p>
    <p><span>School ID: <?php echo $rows['school_id'];?></span></p>
    <p><span>School Address: <?php echo $rows['address_of_school'];?></span></p>
    <p><span>Others: <?php echo $rows['others'];?></span></p>
    <?php
    }
    ?>
</body>
</html>