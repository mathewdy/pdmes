<?php
ob_flush();
session_start();
include('connection.php');
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php' </script>";
}
$key = 'ajbh^ZskSgk2kavCjQtkgx9dG3%&';

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
    $verify_lrn = "SELECT learners_personal_infos.lrn FROM `learners_personal_infos` WHERE lrn = '$decrypted_lrn'";
    $query_request = mysqli_query($conn, $verify_lrn) or die (mysqli_error($conn));
    if(mysqli_num_rows($query_request) == 0){
            echo "
            <script type = 'text/javascript'>
            window.location = 'index.php';
            </script>";
            exit();
    }   //lrn verification ends here
    
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
<body>

<a href="index.php">Back</a>
<br>
<?php

    $sql = "SELECT * FROM learners_personal_infos 
    LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn
    LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn
    WHERE learners_personal_infos.lrn = '$decrypted_lrn'";
    $run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            ?>  
            <div class="container bg-light py-5">
                <form action="edit-students.php" method="POST">
                    <div class="container">
                    <h3 class="text-center bg-light">Learner's Personal Information</h3>

                    <div class="container justify-content-between">
                        <div class="row justify-content-md-center">

                            <div class="col-md-4">
                            <label for="" class="form-label">First Name: </label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $row ['first_name']?>" required>
                            </div>

                            <div class="col-md-4">
                                <label for="" class="form-label">LRN:</label>
                                <input type="text" name="lrn" class="form-control" value="<?php echo $row ['lrn']?>" required readonly>
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-md-4">
                            <label for="" class="form-label">Last Name: </label>
                            <input type="text" class="form-control" name="last_name" value="<?php echo $row ['last_name'] ?>" required>
                            </div>

                            <div class="col-md-4">
                            <label for="" class="form-label" >Birthday:</label>
                            <input type="date" class="form-control"  name="birth_date" value="<?php echo $row ['birth_date']?>"> 
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-md-4 flex-column">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Middle Name</label>
                                    <input type="text"  class="form-control"  name="middle_name" value="<?php echo $row ['middle_name']?>" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label">Suffix:</label>
                                    <input type="text"  class="form-control" name="suffix" value="<?php if(empty($row ['suffix'])){ echo 'N/A'; }else{ echo $row ['suffix']; }?>" >
                                </div>
                            </div>
                                
                                <div class="col-md-4">
                                    <label for="" class="form-label">Sex:</label>
                                    <input type="text" name="" hidden value="<?php echo $row ['sex']?>">
                                    <select class="form-select form-select-md mb-3" name="sex" id="">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>


                                <div class="container bg-light mt-5">
                                    <h3  class="text-center bg-light"> Eligibity for Elementary School Enrollment </h3>
                                    <p class="text-center">Credential Presented for Grade1</p>
                                    <p class="text-center"> - -Please check below --</p> 

                                    <div class="container justify-content-between">
                                        <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <label for=""class="form-label" >Credential Presented:</label>
                                            <input type="text" class="form-control" name="credential_presented" id="" value="<?php echo $row['credential_presented']?>" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="" class="form-label" >Name of School:</label>
                                            <input type="text"  class="form-control"  name="name_of_school" value="<?php echo $row ['name_of_school']?>" required>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-md-4 flex-column">
                                        <div class="col-md-12">
                                            <label for="" class="form-label" >School ID:</label>
                                            <input type="text"  class="form-control"  name="school_id" value="<?php echo $row ['school_id']?>">
                                        </div>

                                        <div class="col-md-12">
                                            <label for="" class="form-label">School Address</label>
                                            <input type="text" class="form-control" name="address_of_school" value="<?php echo $row ['address_of_school']?>" required>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                            <label for="" class="form-label">Others</label>
                                            <input type="text" class="form-control" name="others" value="<?php echo $row ['others']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="container bg-light mt-5">
                            <h3 class="text-center bg-light">Scholastic Records</h3>
                            
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label for="" class="form-label">School</label>
                                    <input type="text" class="form-control" name="nane_of_school" value="<?php echo $row ['name_of_school']?>"> 
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">School Id</label>
                                    <input type="text"  class="form-control" name="school_id" value="<?php echo $row ['school_id']?>">
                                </div>
                            </div>
                            
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label for="" class="form-label">District</label>
                                    <input type="text" class="form-control" name="district" value="<?php echo $row ['district']?>">
                                </div>

                                <div class="col-md-4">
                                                
                                <label for="" class="form-label">Division</label>
                                <input type="text" class="form-control" name="division" value="<?php echo $row ['division']?>">
                                </div>
                            </div>
                            </div>

                            <div class="col-5-lg mt-4 text-end ">
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
 </div>



                    <br>

                    <label for=""></label>
<!-----hindi pa tapos---->
                    <input type="submit" name="update" value="Update">

                </form>
            <?php
        }
    }
}

?>
</body>
</html>


<?php

//hindi pa tapos
date_default_timezone_set('Asia/Manila');

if(isset($_POST['update'])){

    $lrn = $_POST['lrn'];
    $first_name = ucfirst($_POST['first_name']);
    $last_name = ucfirst($_POST['last_name']);
    $suffix = ucfirst($_POST['suffix']);
    $middle_name = ucfirst($_POST['middle_name']);
    $birth_date = $_POST['birth_date'];
    $sex = $_POST['sex'];
    $credential_presented = $_POST['credential_presented'];
    $name_of_school = $_POST['name_of_school'];
    $school_id = $_POST['school_id'];
    $school_address = $_POST['address_of_school'];
    $others = $_POST['others'];
    $dateUpdated = date("y-m-d h:i:a");

    



    $sql_update = "UPDATE learners_personal_infos SET last_name = '$last_name' , first_name = '$first_name',
    middle_name='$middle_name' , suffix='$suffix' , birth_date = '$birth_date', sex = '$sex',
    date_time_updated='$dateUpdated' WHERE lrn = '$lrn' ";
    $sql_run = mysqli_query($conn,$sql_update);

    if($sql_run){
        echo "updated";
        $sql_update_2 = "UPDATE eligibility_for_elementary_school_enrollment SET credential_presented = '$credential_presented' , name_of_school = '$name_of_school', school_id = '$school_id', others='$others',
        date_time_updated= '$dateUpdated' WHERE lrn = '$lrn'";
        $sql_update_2_run = mysqli_query($conn,$sql_update_2);

        if($sql_update_2_run){
            echo "updated 2";
        }else{
            echo "error" . $conn->error;
        }
    }else{
        echo "error : " . $conn->error;
    }



}

ob_end_flush();

?>