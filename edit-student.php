<?php
session_start();
include('connection.php');
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php' </script>";
}


if(isset($_GET['lrn'])){
    $lrn =  $_GET['lrn'];
    if(empty($lrn)){    //lrn verification starts here
        echo "<script>alert('LRN not found');
        window.location = 'index.php';</script>";
        exit();
    }
    $verify_lrn = "SELECT learners_personal_infos.lrn FROM `learners_personal_infos` WHERE lrn = '$lrn'";
    $query_request = mysqli_query($conn, $verify_lrn) or die (mysqli_error($conn));
    if(mysqli_num_rows($query_request) == 0){
            echo '
            <script type = "text/javascript">
                alert("LRN does not exist");
                window.location = "index.php";
            </script>
        ';
            exit();
    }   //lrn verification ends here
    
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
<br>
<?php

    $sql = "SELECT * FROM learners_personal_infos 
    LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn
    LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn
    WHERE learners_personal_infos.lrn = '$lrn'";
    $run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            ?>  

                <form action="edit-students.php" method="POST">
                    <h3>Learner's Personal Information</h3>
                    <label for="">LRN:</label>
                    <input type="text" name="lrn" value="<?php echo $row ['lrn']?>" required readonly>

                    <br>
                    <label for="">First Name: </label>
                    <input type="text" name="first_name" value="<?php echo $row ['first_name']?>" required>

                    <br>
                    <label for="">Last Name: </label>
                    <input type="text" name="last_name" value="<?php echo $row ['last_name'] ?>" required>

                    <br>
                    <label for="">Middle Name</label>
                    <input type="text" name="middle_name" value="<?php echo $row ['middle_name']?>" required>

                    <br>
                    <label for="">Suffix:</label>
                    <input type="text" name="suffix" value="<?php if(empty($row ['suffix'])){ echo 'N/A'; }else{ echo $row ['suffix']; }?>" >

                    <br>
                    <label for="">Birthday:</label>
                    <input type="date" name="birth_date" value="<?php echo $row ['birth_date']?>"> 

                    <br>
                    <label for="">Sex:</label>
                    <input type="text" name="" value="<?php echo $row ['sex']?>">
                    <select name="sex" id="">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                    <br>
                    <h3>Eligibility For Elementary School Enrolment</h3>
                    <label for="">Credential Presented:</label>
                    <input type="text" name="credential_presented" id="" value="<?php echo $row['credential_presented']?>" required>

                    <br>
                    <label for="">Name of School:</label>
                    <input type="text" name="name_of_school" value="<?php echo $row ['name_of_school']?>" required>
                    <br>
                    <label for="">School ID:</label>
                    <input type="text" name="school_id" value="<?php echo $row ['school_id']?>">
                    <br>
                    <label for="">School Address</label>
                    <input type="text" name="address_of_school" value="<?php echo $row ['address_of_school']?>" required>

                    <br>
                    <label for="">Others</label>
                    <input type="text" name="others" value="<?php echo $row ['others']?>">

                    <br>

                    <h3>Scholastic Records</h3>
                    
                    <label for="">School</label>
                    <input type="text" name="school_2" value="<?php echo $row ['school_2']?>"> 
                    <br>
                    <label for="">School Id</label>
                    <input type="text" name="school_id_2" value="<?php echo $row ['school_id_2']?>">

                    <br>
                    <label for="">District</label>
                    <input type="text" name="district" value="<?php echo $row ['district']?>">

                    <br>

                    <label for="">Division</label>
                    <input type="text" name="division" value="<?php echo $row ['division']?>">

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


?>