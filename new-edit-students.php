<?php
ob_start();
session_start();
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


<?php
if(isset($_GET['sid'])){
    foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
        $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
        $decrypted_lrn = ((($decrypt_lrn * 582374)/ 4692)/ 859273574 );
    }
    
    if(empty($_GET['sid'])){    //lrn verification starts here
        echo "<script>alert('LRN not found');
        window.location = 'index.php';</script>";
        exit();
    }

    echo $decrypted_lrn;

    $sql = "SELECT * FROM learners_personal_infos 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn = remedial_classes.lrn 
    LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = remedial_classes.lrn
    LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn
    LEFT JOIN students_grades ON learners_personal_infos.lrn = scholastic_records.lrn
    LEFT JOIN certifications ON learners_personal_infos.lrn = scholastic_records.lrn
    WHERE learners_personal_infos.lrn = '109857060083'";
    $run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            ?>


                <h1>Learner's Personal Info</h1>
                <input type="text" name="last_name" value="<?php echo $row['last_name']?>">

            <?php
        }
    }

}
?>





    
</body>
</html>

<?php

// SELECT * FROM learners_personal_infos 
// LEFT JOIN remedial_classes ON learners_personal_infos.lrn = remedial_classes.lrn 
// LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = remedial_classes.lrn
// LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn
// LEFT JOIN students_grades ON learners_personal_infos.lrn = scholastic_records.lrn
// LEFT JOIN certifications ON learners_personal_infos.lrn = scholastic_records.lrn
// WHERE learners_personal_infos.lrn = '109857060083'


ob_flush();
?>