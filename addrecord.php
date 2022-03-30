<?php
ob_start();
include('connection.php');
date_default_timezone_set('Asia/Manila');
session_start();

if(empty($_SESSION['username'])){
echo "<script>window.location.href='login.php' </script>";
}
?>

<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="src/css/addrecord.css">
<?php include('includes/topnav.php'); ?>
<div class="container-lg p-0">
    <form id="register_form" novalidate action="stepper.php"  method="post">
      <fieldset>
          <div class="container-fluid p-5">
              <h2 class="text-center pt-5">Learner's Personal Information</h2>
              <hr class="featurette-divider mb-5">
              <div class="personal-info row gy-lg-3">
                  <div class="form-group col-6">
                      <label for="" class="form-label"> Last Name </label>
                      <input list="text" name="last_name" class="form-control"  required> 
                  </div>
                  <div class="form-group col-6">
                      <label for="" class="form-label">First Name </label>
                      <input type="text" name="first_name" class="form-control" required>
                  </div>
                  <div class="form-group col-6">
                      <label for="" class="form-label">Middle Name </label>
                      <input type="text" name="middle_name" class="form-control" required>
                  </div>
                  <div class="form-group col-6">
                      <label for="" class="form-label">Name Extn. </label>
                      <input type="text" name="suffix_name" class="form-control" placeholder="ex. Jr., II, III">   
                  </div>
                  <div class="form-group col-5">
                      <label for="" class="form-label"> Learner's Reference Number (LRN) </label>
                      <input type="number" name="lrn" class="form-control" id="input" required>
                  </div>
                  <div class="form-group col-4">
                      <label for="" class="form-label"> Birthdate : </label>
                      <input type="date" name="birthday" class="form-control" required> 
                  </div>
                  <div class="form-group col-3 inline-block">
                      <label class="form-label" style="margin:0 0 5px 0;">Gender</label>
                      <select class="form-select form-select-md" style="padding: 8px 10px;" name="sex" id="form-select" required> 
                          <option selected></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select> 
                  </div>
              </div>
              <hr class="featurette-divider" style="margin:1em 0 5em 0;">
          </div>
          <input type="button" class="next-form text-end btn btn-success" value="Next" />
        </fieldset>	
        <fieldset>
          <div class="container-fluid mb-5">
              <h2 class="text-center pt-5">Eligibity for Elementary School Enrollment</h2>
              <hr class="featurette-divider">
              <div class="eligibility row gy-lg-1">
              <span class="credentials-container">
                <p class="creds lead my-0 py-0 text-center">Credential Presented For Grade 1</p>
              </span>
              <div class="form-group col-12 d-flex flex-row row justify-content-between pt-4 pb-1">
                  <span class="form-check form-check-inline col-md-12 col-lg-4">
                      <label class="form-check-label">Kinder Progress Report </label>
                      <input type="checkbox" class="form-check-input" name="credential[]" value="Kinder progress report">
                  </span>
                  <span class="form-check form-check-inline col-md-12 col-lg-4">
                      <label class="form-check-label">ECCD Checklist </label>
                      <input type="checkbox" class="form-check-input" name="credential[]" value="ECCD Checklist" >
                  </span>
                  <span class="form-check form-check-inline col-md-12 col-lg-4">
                      <label class="form-check-label">Kindergarden Certificate of Completion </label>
                      <input type="checkbox" class="form-check-input" name="credential[]" value="Kindergarten Certificate of Completion" >
                  </span>
              </div>
                <hr class="featurette-divider">
                <div class="form-group col-md-12 pt-2">
                    <label class="form-label">Name of School</label>
                    <input list="text" class="form-control"  name="name_of_school" >
                </div>
                <div class="form-group col-md-12">
                    <label class="form-label" for="">School Id </label>
                    <input list="text" class="form-control" name="school_id" >
                </div>
                <div class="form-group col-md-12">
                    <label class="form-label" for="">Address of School</label>
                    <input list="text" class="form-control" name="address_school">
                </div>
                <div class="form-group col-md-12 mb-5">
                    <label class="form-label" for="">Others </label>
                    <input list="text" class="form-control" name="others">
                </div>
            </div>
            <hr class="featurette-divider">
          </div>
                <input type="button" name="previous" style="float:left;" class="previous-form btn btn-default" value="Previous" />
                <input type="submit" name="next" class="submit btn btn-success" value="Submit" />
        </fieldset>
        <div class="alert alert-danger d-none text-center"></div>
    </form>
</div>	
<script type="text/javascript" src="src/js/stepper.js"></script>

<?php 
include 'includes/footer.php';
?>

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

      if($run_insert_eligibility_for_elem ){
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