<?php
ob_start();
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
    <link rel="stylesheet" href="../pdmes/bootstrap-5.1.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <title>PDMES</title>
</head>
<?php
include('../pdmes/includes/header.php')
?>
<body class="mt-">
<div class="container  my-5 py-5">
<form action="addrecord.php"  class="" method="POST">
  <div class="container ">
  <h3 class="text-center "> Learner's Presonal Information </h3>

  <div class="container justify-content-between">
      <div class="row justify-content-md-center ">
        <div class="col-md-3">
          <label for="" class="form-label"> Last Name : </label>
          <input list="text" name="last_name" class="form-control"  required> 
        </div>

        <div class="col-md-3">
          <label for="" class="form-label">First Name : </label>
          <input type="text" name="first_name" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label for="" class="form-label">Middle Name : </label>
          <input type="text" name="middle_name" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label for="" class="form-label">Suffix Name : </label>
          <input type="text" name="suffix_name" class="form-control">
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-4">
          <label for="" class="form-label"> LRN : </label>
          <input type="text" name="lrn" class="form-control" required>
        </div>

        <div class="col-md-4">
          <label for="" class="form-label"> Birthdate : </label>
          <input type="date" name="birthday" class="form-control" required>
        </div>
        
        <div class="col-md-4 flex-rgow">
          <label for="" class="form-label">Sex :</label>
          <select  class="form-select form-select-md mb-3" name="sex" id="" required> 
          <option value="">-Gender-</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select> 
    </div>  
  </div>
  



  <div class="container  mt-5 ">
    <h3  class="text-center "> Eligibity for Elementary School Enrollment </h3>
    <p class="text-center">Credential Presented for Grade1</p>
    <p class="text-center"> - -Please check below --</p> 

    <div class="container">
      <div class="row align-items-center my-4">
        <div class="col-md-4">
          <label>Kinder Porgress Report:</label>
          <input type="checkbox" name="credential[]" value="Kinder progress report">
        </div>

        <div class="col-md-4">
          <label>ECCD Checklist:</label>
          <input type="checkbox" name="credential[]" value="ECCD Checklist" >
        </div>

        <div class="col-md-4">
          <label>Kindergarden Certificate of Completion:</label>
          <input type="checkbox" name="credential[]" value="Kindergarden Certificate of Completion" >
        </div>
      </div>

      <div class="row justify-content-center my-5 ">
        <div class="col-md-3">
          <label class="form-label">Name of School:</label>
          <input list="text" class="form-control"  name="name_of_school" >
        </div>

        <div class="col-md-3">
          <label class="form-label" for="">School Id : </label>
          <input list="text" class="form-control" name="school_id" >
        </div>

        <div class="col-md-3">
          <label class="form-label" for="">Address of School :</label>
          <input list="text" class="form-control" name="address_school">
        </div>

        <div class="col-md-3">
          <label class="form-label" for="">Others :</label>
          <input list="text" class="form-control" name="others">
        </div>
      </div>
    </div>


    
  </div>
      <div class="row  justify-content-center">
        <div class="col-md-4">
         
      </div>
        <div class="col-md-4">
          
        </div>
      </div>
  </div>
</div>

    <div class="col-5-lg mt-4 text-center ">
      <input type="submit" name="next" class="btn btn-lg btn-success " value="Next">
    </div>
   </div>
</div>
</form>
</div>


<?php
include('../pdmes/includes/footer.php')
?>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
  </script>
  


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
ob_end_flush();
?>
</body>
</html>






