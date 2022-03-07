<?php
include('connection.php');
session_start();
if(empty($_SESSION['username'])){
   echo "<script>window.location.href='login.php'</script>";
}
if(isset($_GET['lrn'])){
    $lrn =  $_GET['lrn'];

    if(empty($lrn)){
        echo "<script>window.location.href='index.php' </script>";
      }



    $validate = "SELECT lrn FROM learners_personal_infos WHERE learners_personal_infos.lrn = '$lrn'";
    $vali = mysqli_query($conn, $validate);
    if(mysqli_num_rows($vali ) == 0){
    
        echo "<script>alert('LRN does not exist');
        window.location.href='index.php';</script>";
        exit();
 
    }

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
    <h2> Scholastic Records </h2>
<?php

$query = "SELECT * FROM `scholastic_records` WHERE '$lrn' ";
$run = mysqli_query($conn, $query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>
<p> <span> School: <?php echo $rows ['school_2'];?> </span> <p>
<p><span>School Id: <?php echo$rows ['school_id_2'];?></p> </span>
<p> <span> District: <?php echo $rows ['district'];?> </p> </span>
<p> <span> Division: <?php echo $rows ['division'];?> </p> </span>
<p> <span> Region: <?php echo $rows ['region'];?> </p> </span>
<p> <span> Classified as Grade: <?php echo $rows ['classified_as_grade'];?> </p> </span>
<p> <span> Section: <?php echo $rows ['section'];?> </p> </span>
<p> <span> School Year: <?php echo $rows ['school_year'];?> </p> </span>
<p> <span> Name of Adviser: <?php echo $rows ['name_of_adviser'];?> </p> </span>

  

<?php
}
?>
</body>
</html>