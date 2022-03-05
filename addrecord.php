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

<a href="index.php">Back</a>


<h3> Learner's Presonal Information </h3>
<form action="addrecord.php" method="POST">
  <label for=""> Last Name : </label>
    <input list="text" name="last_name"  required> 
  <br>
    
  <label for="">First Name : </label>
    <input type="text" name="first_name" required>
  <br>
    


  <label for="">Suffix Name : </label>
    <input type="text" name="suffix_name">
  <br>
  
  <label for=""> Middle Name : </label>
    <input type="text" name="middle_name">
  <br>

  <label for=""> LRN : </label>
    <input type="text" name="lrn" required>
  <br>


  <label for="">Birthdate : </label>
    <input type="date" name="birthday" required>
  <br>
  <label for="">Sex :</label>
    <select name="sex" id="" required> 
      <option value="">-Gender-</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select> 
  <br>

  <h3> Eligibity for elementary school enrolment </h3>
    <p>Credential Presented for Grade1</p>
    <p> - -Please check below below --</p> 
          

    <label for=""> Kinder progress report :  </label>
      <input type="checkbox" name="credential[]" value="Kinder progress report" >
    <br>
    <label for=""> ECCD Checklist: </label>
      <input type="checkbox" name="credential[]" value="ECCD Checklist" >
    <br>
    
    <label for="">Kindergarden Certificate of Completion : </label>
      <input type="checkbox" name="credential[]" value="Kindergarden Certificate of Completion" >
    <br>
            
    <label for="">Name of School : </label>
      <input list="text" name="name_of_school" >
    <br>

    <label for="">School Id : </label>
      <input list="text" name="school_id" >
    <br>

    <label for="">Address of School : </label>
      <input list="text" name="address_school">
    <br>
    <label for="">Others : </label>
      <input list="text" name="others" >
    <br>


    <input type="submit" name="next" value="Next">
  
</form>


<?php 

if(isset($_POST['next'])){


  $last_name = ucfirst($_POST['last_name']);
  $first_name = ucfirst($_POST['first_name']);
  $middle_name = ucfirst($_POST['middle_name']); 
  $suffix = ucfirst($_POST['suffix_name']);
  $lrn = $_POST['lrn'];
  $birthdate = $_POST['birthday'];
  $sex = $_POST['sex'];
  $name_of_school = ucfirst($_POST['name_of_school']);
  $school_id = $_POST['school_id'];
  $address_school = strtoupper($_POST['address_school']);
  $others = $_POST['others'];
  $dateCreated = date("y-m-d h:i:a");
  $dateUpdated = date("y-m-d h:i:a");
  $remarks = 'none';

  $credential = $_POST['credential'];
  $new_credential = implode(", " ,$credential);

  $validate_lrn = "SELECT * FROM learners_personal_infos WHERE last_name = '$last_name' AND first_name= '$first_name' AND
  middle_name= '$middle_name' AND lrn= '$lrn' AND birth_date ='$birthdate'";
  $run_validate = mysqli_query($conn,$validate_lrn);

  if(mysqli_num_rows($run_validate) > 0){
    echo "already added" . '<br>';
  }else{
    //
    $insert_learners_personal_infos = "INSERT INTO learners_personal_infos (last_name,first_name,middle_name,suffix,lrn,birth_date,sex,date_time_created,date_time_updated,remarks)
    VALUES ('$last_name', '$first_name', '$middle_name', '$suffix' , '$lrn', '$birthdate', '$sex', '$dateCreated', '$dateUpdated', '$remarks')";

    $run_insert_learners_personal_infos = mysqli_query($conn,$insert_learners_personal_infos);


    if($run_insert_learners_personal_infos){
      echo "Added learners_personal_infos" . '<br>';
      

      $insert_eligibility_for_elem = "INSERT INTO eligibility_for_elementary_school_enrollment (lrn,credential_presented,name_of_school,school_id,address_of_school,others ,date_time_created,date_time_updated,remarks) VALUES ('$lrn','$new_credential', '$name_of_school' , '$school_id', '$address_school','$others', '$dateCreated', '$dateUpdated', '$remarks')";

      $run_insert_eligibility_for_elem = mysqli_query($conn,$insert_eligibility_for_elem);

      if($run_insert_eligibility_for_elem){
        echo "Added insert_eligibility_for_elem";
        $_SESSION['lrn'] = $lrn;
        header('Location: phase1.php');
        exit();
      }else{
        echo "error insert_eligibility_for_elem" . $conn->error . '<br>';
      }


    }else{
      echo "error learners_personal_infos" . $conn->error  . '<br>';
    }
  }
 
}
?>
</body>
</html>
