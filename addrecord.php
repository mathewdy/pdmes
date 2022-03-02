    <?php
    include('connection.php');
    date_default_timezone_set('Asia/Manila');

    ?>





    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Records</title>
    </head>
    <body>

    <h3> learners Presonal Information </h3>

    <form action="" method="POST">

    Lastnname<br> 
    <input list="text" name="last_name"   required  >


<br>
    Firstname <br>
    <input type="text" name="first_name"  required>
      <br>

      Name ext(jr,l,ll) <br>
    <input type="text" name="ext_name" >
      <br>

        (check if there is no name extension) <br>
      <input type="checkbox" name = "ext_name" value="none">
      <br>

      Middlename <br>
    <input type="text" name="middle_name"  required>
      <br>

      
      lrn <br>
    <input type="number" name="lrn"  >
      <br>

      Birthdate<br>
    <input type="date" name="birthday"  >
      <br>
      <label for="">Sex</label>
        <select name="sex" id=""> 
            <option value="">-Gender-</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            
        </select> <br>

        <h3> Eligibity for elementary school enrolment </h3>

        Credential Presented for Grade1 
        
           - -Please check below below --

        Kinder progress report  <br>
      <input type="checkbox" name = "credential" value="Kinder progress report">
      <br>

        ECCD Checklist  <br>
      <input type="checkbox" name = "credential" value="ECCD Checklis">
      <br>

      Kindergarden Certificate of Completion  <br>
      <input type="checkbox" name = "credential" value="Kindergarden Certificate of Completion">
      <br>
            
      Name of School <br> 
    <input list="text" name="name_school"  required  >

    School id <br> 
    <input list="text" name="school_id"  required  >

    Address of School <br> 
    <input list="text" name="address_school"  required  >

    others <br>
    <input list="text" name="others" required>
        

    
    <input type="submit" name="submit" value="submit">
  
</form>


<?php 

if (isset($_POST['submit'])) {

$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name']; 
$ext_name = $_POST ['ext_name'];
$lrn = $_POST['lrn'];
$birtdate = $_POST['birthday'];
$sex = $_POST['sex'];
$credential = $_POST['credential'];
$name_school = $_POST['name_school'];
$school_id = $_POST['school_id'];
$address_school = $_POST['address_school'];
$others = $_POST['others'];
$dateCreated = date("y-m-d h:i:a ");


$validate = "SELECT * FROM learners_personal_infos WHERE lrn='$lrn' AND birth_date='$birtdate' AND first_name = $first_name";
    $run_validate = mysqli_query($conn,$validate);
    if($run_validate){
        if(mysqli_num_rows($run_validate) > 0){
            echo '<script>alert("Already Registered")</script>';
        }
    }


$sql = "INSERT INTO `learners_personal_infos`(`last_name`, `first_name`, `middle_name`, `suffix`, `lrn`, `birth_date`, `sex`, `date_time_created`) VALUES ('$last_name', '$first_name','$middle_name','$ext_name', '$lrn', '$birtdate', '$sex', '$dateCreated')";
$result = $conn->query($sql);

if ($result == TRUE) {
    $eligibility_query = "INSERT INTO `eligibility_for_elementary_school_enrollment` (`credential_presented`, `name_of_school`, `school_id`, `address_of_school`, `others`, `lrn`, `date_time_created`) VALUES ('$credential', '$name_school','$school_id','$address_school', '$others', '$lrn', '$dateCreated')";
    $eligibility_result = $conn->query($eligibility_query);
    
    if($eligibility_result == TRUE){
        echo $eligibility_query;    
    }

    else{
        echo "Error:". $eligibility_query . "<br>". $conn->error;
    }
   
}else{
    echo "Error:". $sql . "<br>". $conn->error;
}







$conn->close();


    

}

?>


</body>
</html>

    
  






