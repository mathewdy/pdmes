<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');

include('connection.php');

if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php' </script>";
}

$lrn = $_SESSION['lrn'];
echo $lrn;

$query_lrn = "SELECT * FROM learners_personal_infos WHERE lrn = '$lrn' ";
$run_query_lrn = mysqli_query($conn,$query_lrn);




if(empty($_SESSION['lrn'])){
  echo "<script>window.location.href='addrecords.php'</script>";
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



<form action="certification.php" method="POST">

<label>I CERTIFY that this is a true record of </label>
<input type="text" name="full_name">
<br>

<label>with LRN</label>
<input type="text" name="lrn">
<br>

<label>and that he/she is eligible for admission to Grade</label>
<input type="text" name="grade">
<label>.</label>
<br>

<label>School Name: </label>
<input type="text" name="school_name">
<br>

<label>School ID</label>
<input type="text" name="school_id">

<br>

<label>Division: </label>
<input type="text" name="division">

<br>

<label>Last School Year Attended: </label>
<input type="text" name="last_school_year_attended">

<br>

<label for="">Date</label>
<input type="date" name="date">
<br>

<label for="">Name of Principal / School Head over Printed Name</label>
<input type="text" name="name_of_principal">
<br>

<label for="">(Affix School Seal Here)</label>
<input type="text" name="affix">
<br>


<input type="submit" name="next" value="Next"> 



</form>

    
</body>
</html>


<?php

if(isset($_POST['next'])){

    $full_name = $_POST['full_name'];
    $grade = $_POST['grade'];
    $school_name = $_POST['school_name'];
    $school_id = $_POST['school_id'];
    $division = $_POST['division'];
    $last_school_year_attended = $_POST['last_school_year_attended'];
    $date = $_POST['date'];
    $name_of_principal = $_POST['name_of_principal'];
    $affix = $_POST['affix'];
    


    $insert_certification = "INSERT certifications (full_name,lrn,grade,school_name,school_id,division, last_school_year_attended,
    date,name_of_principal,affix) VALUES ('$full_name', '$lrn', '$grade' , '$school_name', '$school_id',
    '$division', '$last_school_year_attended', '$date' , '$name_of_principal' , '$affix')";
    $run_certification = mysqli_query($conn,$insert_certification);

    if($run_certification){
        echo "added certification";
        header("Location: index.php");
        exit();
    }else{
        echo "Error certification" . $conn->error;
    }


}




ob_end_flush();
?>