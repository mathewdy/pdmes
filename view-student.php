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
    <h2>Eligibility For Elementary School Enrollment</h2>wspan></p>
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
<p> <span> School: <?php echo $rows ['school'];?> </span> <p>
<p><span>School Id: <?php echo$rows ['school_id'];?></p> </span>
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
<h2> Phase 1 </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '1' AND students_grades.term = '1' AND remedial_classes.phase = '1'";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<h2> 1 </h2> 


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2>Remedial Classes</h2>
<p><span>Date from: <?php if ($rows['date_from'] = '000-00-00'){ echo 'N/A'?> 
        <?php }else{ echo $rows['date_from']; }?></span></p>
<p><span> To:<?php if ($rows['date_to'] = '000-00-00'){ echo 'N/A'?> 
        <?php }else{ echo $rows['date_to']; }?></span></p>
<h3>Learning areas</h3>
<p><span> <?php echo $rows ['learning_areas']  ?></span></p>
<p><span> Final Rating <?php echo $rows ['final_rating']  ?></span></p>
<p><span> Remedial class mark <?php echo $rows ['remedial_class_mark']  ?></span></p>
<p><span> Recomputed final grade <?php echo $rows ['recomputed_final_grade']  ?></span></p>
<p><span> Remarks <?php echo $rows ['remarks']  ?></span></p>

<p><span> </span></p>


<h2> 2 </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '1' AND students_grades.term = '2';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 3 </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '1' AND students_grades.term = '3';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 4 </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '1' AND students_grades.term = '4';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
</body>
<h2> final rating </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '1' AND students_grades.term = '5';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
<h2> Phase 2 </h2>
<h2>1st Quarter  </h2> 


<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '1';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>



<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 2nd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '2';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 3rd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '3';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 4th Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '4';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
</body>
<h2> Finals </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '5';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> Phase 3 </h2>
<h2> 1st Quarter </h2> 

<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '1';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>



<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 2nd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '2';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 3rd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '3';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 4th Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '4';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
</body>
<h2> Finals  </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '2' AND students_grades.term = '5';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
<h2> Phase 4 </h2>
<h2> 1st Quarter </h2> 

<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '4' AND students_grades.term = '1';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>



<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 2nd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '4' AND students_grades.term = '2';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 3rd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '109857060083' AND students_grades.phase = '4' AND students_grades.term = '3';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 4th Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '4' AND students_grades.term = '4';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
</body>
<h2> Finals </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '4' AND students_grades.term = '5';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
<h2> Phase 5 </h2>
<h2> 1st Quarter </h2> 

<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '5' AND students_grades.term = '1';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>



<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 2nd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '5' AND students_grades.term = '2';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 3rd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '5' AND students_grades.term = '3';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 4th Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '5' AND students_grades.term = '4';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
</body>
<h2> Finals  </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '5' AND students_grades.term = '5';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> Phase 6 </h2>
<h2> 1st Quarter </h2> 

<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '6' AND students_grades.term = '1';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>



<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 2nd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '6' AND students_grades.term = '2';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 3rd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '6' AND students_grades.term = '3';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 4th Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '6' AND students_grades.term = '4';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
</body>
<h2> Finals  </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '6' AND students_grades.term = '5';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> Phase 7 </h2>
<h2> 1st Quarter </h2> 

<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '7' AND students_grades.term = '1';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>



<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 2nd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '7' AND students_grades.term = '2';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 3rd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '7' AND students_grades.term = '3';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 4th Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '7' AND students_grades.term = '4';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
</body>
<h2> Finals  </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '7' AND students_grades.term = '5';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> Phase 8 </h2>
<h2> 1st Quarter </h2> 

<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '8' AND students_grades.term = '1';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>



<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 2nd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '8' AND students_grades.term = '2';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 3rd Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '8' AND students_grades.term = '3';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

<h2> 4th Quarter </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '8' AND students_grades.term = '4';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>


<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>
</body>
<h2> Finals </h2>
<?php
$phase1_query = "SELECT * FROM `learners_personal_infos` LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn WHERE learners_personal_infos.lrn = '$lrn' AND students_grades.phase = '8' AND students_grades.term = '5';";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

?>

<p><span> Mother tounge: <?php echo$rows ['mother_tounge'];?></p> </span>
<p> <span> Filipino: <?php echo $rows ['filipino'];?> </p> </span>
<p> <span> English: <?php echo $rows ['english'];?> </p> </span>
<p> <span> Mathematics: <?php echo $rows ['math'];?> </p> </span>
<p> <span> Science: <?php echo $rows ['science'];?> </p> </span>
<p> <span> Araling Panlipunan <?php echo $rows ['araling_panlipunan'];?> </p> </span>
<p> <span> EPP/TLE: <?php echo $rows ['epp_tle'];?> </p> </span>
<p> <span> Mapeh:</p> </span>
<p><span> Music: <?php echo $rows ['music'];?> <?php ?> </span></p>
<p><span> Arts: <?php echo $rows ['arts'];?> <?php ?> </span></p>
<p><span> Physical Education: <?php echo $rows ['p_e'];?> <?php ?> </span></p>
<p><span> Health: <?php echo $rows ['health'];?> <?php ?> </span></p>
<p><span> Eduk. sa Pagpapakatao: <?php echo $rows ['edukasyon_sa_pagpapakatao'];?> <?php ?> </span></p> 
<p><span> Arabic Language: <?php echo $rows ['arabic_language'];?> <?php ?> </span></p>
<p><span> Islamic Values Education: <?php echo $rows ['islamic_values'];?> <?php ?> </span></p>
<p><span>General Average: <?php echo $rows ['general_average'];?></span></p>
<?php
}
?>

</html>