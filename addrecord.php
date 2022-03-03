<?php
include('connection.php');
date_default_timezone_set('Asia/Manila');
session_start();

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
    <title>PDMES</title>
</head>
<body>

<h3> learners Presonal Information </h3>
<a href="index.php">Back</a>
<form action="addrecord.php" method="POST">
  <label for=""> Last Name : </label>
    <input list="text" name="last_name" required> 
  <br>
    
  <label for="">First Name : </label>
    <input type="text" name="first_name"required>
  <br>
    


  <label for="">Suffix Name : </label>
    <input type="text" name="suffix_name">
  <br>

  
  <label for=""> Middle Name : </label>
    <input type="text" name="middle_name"  required>
  <br>

  <label for=""> LRN : </label>
    <input type="number" name="lrn" required>
  <br>


  <label for="">Birthdate : </label>
    <input type="date" name="birthday" required>
  <br>
  <label for="">Sex :</label>
    <select name="sex" id=""> 
      <option value="">-Gender-</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select> 
  <br>

  <h3> Eligibity for elementary school enrolment </h3>
    <p>Credential Presented for Grade1</p>
    <p> - -Please check below below --</p> 
          

    <label for=""> Kinder progress report :  </label>
      <input type="checkbox" name = "credential" value="Kinder progress report">
    <br>
    <label for=""> ECCD Checklist: </label>
      <input type="checkbox" name = "credential" value="ECCD Checklis">
    <br>
    
    <label for="">Kindergarden Certificate of Completion : </label>
      <input type="checkbox" name = "credential" value="Kindergarden Certificate of Completion">
    <br>
            
    <label for="">Name of School : </label>
      <input list="text" name="name_school"  required  >
    <br>

    <label for="">School Id : </label>
      <input list="text" name="school_id"  required  >
    <br>

    <label for="">Address of School : </label>
      <input list="text" name="address_school"  required  >
    <br>
    <label for="">Others : </label>
      <input list="text" name="others" required>
    <br>

    <h3>Scholastic Record</h3>

    <!---scholastic record--->
    <label for="">School : </label>
      <input type="text" name="school_2" required>
    <br>

    <label for="">School ID : </label>
      <input type="text" name="school_id_2" required>

    <br>

    <label for="">District : </label>
    <input type="text" name="district" required>
    <br>

    <label for="">Division</label>
    <input type="text" name="division" required>
    <br>

    <label for="">Region:</label>
    <input type="text" name="region">

    <br>
    <label for="">Classified as Grade : </label>
    <input type="text" name="classified_as_grade" required>

    <br>
    <label for="">Section : </label>
    <input type="text" name="section">

    <br>
    <label for="">School Year : </label>
    <input type="text" name="school_year" required>

    <br>

    <label for="">Name of Adviser: </label>
    <input type="text" name="name_of_adviser">

    <br>

    <input type="submit" name="submit" value="submit">
  
</form>


<?php 

if(isset($_POST['submit'])){

  $last_name = ucfirst($_POST['last_name']);
  $first_name = ucfirst($_POST['first_name']);
  $middle_name = ucfirst($_POST['middle_name']); 
  $suffix = ucfirst($_POST['suffix_name']);
  $lrn = $_POST['lrn'];
  $birtdate = $_POST['birthday'];
  $sex = $_POST['sex'];
  $credential = $_POST['credential'];
  $name_school = strtoupper($_POST['name_school']);
  $school_id = $_POST['school_id'];
  $address_school = strtoupper($_POST['address_school']);
  $others = $_POST['others'];
  $dateCreated = date("y-m-d h:i:a");
  $dateUpdated = date("y-m-d h:i:a");
  $remarks = 'none';


  //scholastic_record

  $school_2 = ucfirst($_POST['school_2']);
  $school_id_2 = $_POST['school_id_2'];
  $division = $_POST['division'];
  $district = ucfirst($_POST['district']);
  $region = ucfirst($_POST['region']);
  $classified_as_grade = $_POST['classified_as_grade'];
  $section = ucfirst($_POST['section']);
  $school_year = $_POST['school_year'];
  $name_of_adviser = $_POST['name_of_adviser'];



 

  $validate = "SELECT * FROM learners_personal_infos WHERE last_name = '$last_name' AND first_name ='$first_name' AND middle_name = '$middle_name' AND lrn = '$lrn' AND birth_date = '$birtdate' ";
  $run_validate = mysqli_query($conn,$validate);

  if(mysqli_num_rows($run_validate )> 0){
    echo "<script>alert('already register') </script>";
  }else{
    $insert_LPI ="INSERT INTO learners_personal_infos (last_name,first_name,middle_name,suffix,lrn ,birth_date,sex,date_time_created,date_time_updated,remarks) VALUES('$last_name', '$first_name', '$middle_name', '$suffix',
    '$lrn', '$birtdate', '$sex','$dateCreated', '$dateUpdated', '$remarks')";
    $run_LPI = mysqli_query($conn,$insert_LPI);

    if($run_LPI){
      echo "added";
      $insert_eligibility = "INSERT INTO eligibility_for_elementary_school_enrollment (credential_presented,name_of_school,school_id,address_of_school,others,lrn ,date_time_created,date_time_updated,remarks)
      VALUES ('$credential', '$name_school', '$school_id', '$address_school' , '$others' , '$lrn', '$dateCreated','$dateUpdated', '$remarks')";
      $run_eligibility = mysqli_query($conn,$insert_eligibility);


      if($run_eligibility){
        echo "added 2";

        $insert_scholastic = "INSERT INTO scholastic_records (lrn,school_2,school_id_2,district,division,region,
        classified_as_grade,section,school_year,name_of_adviser,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn', '$school_2','$school_id_2','$district', '$division', '$region', '$classified_as_grade', '$section', '$school_year', '$name_of_adviser', '$remarks', '$dateCreated', '$dateUpdated')";
        $run_scholastic = mysqli_query($conn,$insert_scholastic);

        if($run_scholastic){
          echo "added 3";
        }else{
          echo "error 3" . $conn->error;;
        }
      }else{
        echo "error1" . $conn->error;
      }
    }else{
      echo "error2" . $conn->error;
    }
  }
}

?>

</body>
</html>
