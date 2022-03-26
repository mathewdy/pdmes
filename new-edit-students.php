<?php
ob_start();
session_start();
include('connection.php');


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
    <title>Document</title>
</head>
<body>


<?php
if(isset($_GET['sid'])){
    foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
        $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
        $decrypted_lrn = ((($decrypt_lrn*859475)/5977)/123456789);
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
    } 

    echo $decrypted_lrn . '<br>';

    $sql = "SELECT * FROM learners_personal_infos
    LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn
    WHERE learners_personal_infos.lrn = '$decrypted_lrn'";
    $run = mysqli_query($conn,$sql);
    if(mysqli_num_rows($run) > 0){  
        $row = mysqli_fetch_array($run);
            ?>
            <form action="new-edit-students.php" method="POST">
            <h1>Learner's Personal Info</h1>
                <label for="">Last Name</label>
                <input type="text" name="last_name" value="<?php echo $row['last_name']?>" required>
                <label for="">First Name</label>
                <input type="text" name="first_name" value="<?php echo $row['first_name']?>" required>
                <label for="">Middle Name</label>
                <input type="text" name="middle_name" value="<?php echo $row['middle_name']?>" required>
                <label for="">Suffix Name</label>
                <input type="text" name="suffix_name" value="<?php if(empty($row['suffix'])){ echo "";}else{ echo $row['suffix'];}?>">
                <label for="">LRN</label>
                <input type="text" name="lrn" value="<?php echo $row['lrn']?>" required>
                <label for="">Birthdate</label>
                <input type="date" name="birthday" value="<?php echo strftime('%Y-%m-%d', strtotime($row['birth_date']));?>" required>
                <label for="">Sex</label>
                <select name="sex" id="" required>
                <option value="">-Gender-</option>
                    <option value="Male"
                    <?php
                        if ($row['sex'] == "Male"){
                            echo "Selected";
                        }
                        ?>
                    >Male</option>
                    <option value="Female"
                    <?php
                        if ($row['sex'] == "Female"){
                            echo "Selected";
                        }
                    ?>
                    >Female</option>
                </select>

            <h1>Eligibility for Elementary School Enrollment</h1>
            <p>Credential Presented for Grade 1</p>
            <p>- -Please check below- -</p>

                <label for="">Credential Presented</label>
                <input type="text" name="credential_presented" value="<?php echo $row['credential_presented']?>" required>
                <label for="">Name of School</label>
                <input type="text" name="name_of_school" value="<?php echo $row['name_of_school']?>" required>
                <label for="">School ID</label>
                <input type="text" name="efese_school_id" value="<?php echo $row['efese_school_id']?>" required>
                <label for="">Addres of School</label>
                <input type="text" name="address_of_school" value="<?php echo $row['address_of_school']?>" required>
                <label for="">Others</label>
                <input type="text" name="others" value="<?php if(empty($row['others'])){ echo "";}else{ echo $row['others'];}?>">

            <?php
    }
            ?>

            <h1>Scholastic Records</h1>
            <!-- Phase 1 starts here -->
            <?php
            $sql_phase_1_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '1'
                AND students_grades.term = '1' AND remedial_classes.phase = '1'
                AND scholastic_records.phase = '1'";
            $query_phase_1_record = mysqli_query($conn, $sql_phase_1_record);
            if(mysqli_num_rows($query_phase_1_record) > 0){ 
                $term1 = mysqli_fetch_array($query_phase_1_record);
            }
            ?>
            <span><h3>Phase 1 (pala tandaan lang tang ina nyo -jd)</h3></span>
                <label for="">School</label>
                <input type="text" name="school_p1" 
                value="<?php if(empty($term1['school'])){ 
                    echo "";} else { echo $term1['school'];}?>">

                <label for="">School ID</label>
                <input type="text" name="sr_school_id_p1" 
                value="<?php if(empty($term1['sr_school_id'])){ 
                    echo "";} else { echo $term1['sr_school_id'];}?>">
                    
                <label for="">District</label>
                <input type="text" name="district_p1" 
                value="<?php if(empty($term1['district'])){ 
                    echo "";} else { echo $term1['district'];}?>">

                <label for="">Division</label>
                <input type="text" name="division_p1" 
                value="<?php if(empty($term1['division'])){ 
                    echo "";} else { echo $term1['division'];}?>">

                <label for="">Region</label>
                <input type="text" name="region_p1" 
                value="<?php if(empty($term1['region'])){ 
                    echo "";} else { echo $term1['region'];}?>">

                <label for="">Classified as Grade</label>
                <input type="text" name="classified_as_grade_p1" 
                value="<?php if(empty($term1['classified_as_grade'])){ 
                    echo "";} else { echo $term1['classified_as_grade'];}?>">

                <label for="">Section</label>
                <input type="text" name="section_p1" 
                value="<?php if(empty($term1['section'])){ 
                    echo "";} else { echo $term1['section'];}?>">

                <label for="">School Year</label>
                <input type="text" name="school_year_p1" 
                value="<?php if(empty($term1['school_year'])){ 
                    echo "";} else { echo $term1['school_year'];}?>">

                <label for="">Name of Adviser</label>
                <input type="text" name="name_of_adviser_p1" 
                value="<?php if(empty($term1['name_of_adviser'])){ 
                    echo "";} else { echo $term1['name_of_adviser'];}?>">

            <!-- learning areas starts here -->
            <!-- 1st Quarter 0f Phase 1 Starts here -->

            <span><h3>Learning Areas (Phase 1)</h3></span>
            <span><h3>1st Quarter</h4></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p1_t1" 
                value="<?php if(empty($term1['mother_tounge'])){ 
                    echo "";} else { echo $term1['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p1_t1" 
                value="<?php if(empty($term1['filipino'])){ 
                    echo "";} else { echo $term1['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p1_t1" 
                value="<?php if(empty($term1['english'])){ 
                    echo "";} else { echo $term1['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p1_t1" 
                value="<?php if(empty($term1['math'])){ 
                    echo "";} else { echo $term1['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p1_t1" 
                value="<?php if(empty($term1['science'])){ 
                    echo "";} else { echo $term1['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p1_t1" 
                value="<?php if(empty($term1['araling_panlipunan'])){ 
                    echo "";} else { echo $term1['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p1_t1" 
                value="<?php if(empty($term1['epp_tle'])){ 
                    echo "";} else { echo $term1['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p1_t1" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p1_t1" 
                value="<?php if(empty($term1['music'])){ 
                    echo "";} else { echo $term1['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p1_t1" 
                value="<?php if(empty($term1['arts'])){ 
                    echo "";} else { echo $term1['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p1_t1" 
                value="<?php if(empty($term1['p_e'])){ 
                    echo "";} else { echo $term1['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p1_t1" 
                value="<?php if(empty($term1['health'])){ 
                    echo "";} else { echo $term1['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p1_t1" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p1_t1" 
                value="<?php if(empty($term1['arabic_language'])){ 
                    echo "";} else { echo $term1['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p1_t1" 
                value="<?php if(empty($term1['islamic_values'])){ 
                    echo "";} else { echo $term1['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p1_t1" 
                value="<?php if(empty($term1['general_average'])){ 
                    echo "";} else { echo $term1['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 1st Quarter of Phase 1 Ends Here -->



            <!-- 2nd Quarter of Phase 1 Starts here -->
            <?php
            $sql_phase_1_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '1'
                AND students_grades.term = '2' AND remedial_classes.phase = '1'";
            $query_phase_1_record = mysqli_query($conn, $sql_phase_1_record);
            if(mysqli_num_rows($query_phase_1_record) > 0){ 
                $term2 = mysqli_fetch_array($query_phase_1_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 2nd Quarter Starts Here -->
            
            <span><h3>2nd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p1_t2" 
                value="<?php if(empty($term2['mother_tounge'])){ 
                    echo "";} else { echo $term2['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p1_t2" 
                value="<?php if(empty($term2['filipino'])){ 
                    echo "";} else { echo $term2['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p1_t2" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term2['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p1_t2" 
                value="<?php if(empty($term2['math'])){ 
                    echo "";} else { echo $term2['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p1_t2" 
                value="<?php if(empty($term2['science'])){ 
                    echo "";} else { echo $term2['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p1_t2" 
                value="<?php if(empty($term2['araling_panlipunan'])){ 
                    echo "";} else { echo $term2['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p1_t2" 
                value="<?php if(empty($term2['epp_tle'])){ 
                    echo "";} else { echo $term2['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p1_t2" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p1_t2" 
                value="<?php if(empty($term2['music'])){ 
                    echo "";} else { echo $term2['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p1_t2" 
                value="<?php if(empty($term2['arts'])){ 
                    echo "";} else { echo $term2['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p1_t2" 
                value="<?php if(empty($term2['p_e'])){ 
                    echo "";} else { echo $term2['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p1_t2" 
                value="<?php if(empty($term2['health'])){ 
                    echo "";} else { echo $term2['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p1_t2" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p1_t2" 
                value="<?php if(empty($term2['arabic_language'])){ 
                    echo "";} else { echo $term2['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p1_t2" 
                value="<?php if(empty($term2['islamic_values'])){ 
                    echo "";} else { echo $term2['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p1_t2" 
                value="<?php if(empty($term2['general_average'])){ 
                    echo "";} else { echo $term2['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 2nd Quarter of Phase 1 Ends Here -->


            <!-- 3rd Quarter of Phase 1 Starts here -->
            <?php
            $sql_phase_1_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '1'
                AND students_grades.term = '3' AND remedial_classes.phase = '1'";
            $query_phase_1_record = mysqli_query($conn, $sql_phase_1_record);
            if(mysqli_num_rows($query_phase_1_record) > 0){ 
                $term3 = mysqli_fetch_array($query_phase_1_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 3rd Quarter Starts Here -->
            
            <span><h3>3rd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p1_t3" 
                value="<?php if(empty($term3['mother_tounge'])){ 
                    echo "";} else { echo $term3['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p1_t3" 
                value="<?php if(empty($term3['filipino'])){ 
                    echo "";} else { echo $term3['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p1_t3" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term3['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p1_t3" 
                value="<?php if(empty($term3['math'])){ 
                    echo "";} else { echo $term3['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p1_t3" 
                value="<?php if(empty($term3['science'])){ 
                    echo "";} else { echo $term3['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p1_t3" 
                value="<?php if(empty($term3['araling_panlipunan'])){ 
                    echo "";} else { echo $term3['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p1_t3" 
                value="<?php if(empty($term3['epp_tle'])){ 
                    echo "";} else { echo $term3['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p1_t3" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p1_t3" 
                value="<?php if(empty($term3['music'])){ 
                    echo "";} else { echo $term3['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p1_t3" 
                value="<?php if(empty($term3['arts'])){ 
                    echo "";} else { echo $term3['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p1_t3" 
                value="<?php if(empty($term3['p_e'])){ 
                    echo "";} else { echo $term3['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p1_t3" 
                value="<?php if(empty($term3['health'])){ 
                    echo "";} else { echo $term3['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p1_t3" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p1_t3" 
                value="<?php if(empty($term3['arabic_language'])){ 
                    echo "";} else { echo $term3['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p1_t3" 
                value="<?php if(empty($term3['islamic_values'])){ 
                    echo "";} else { echo $term3['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p1_t3" 
                value="<?php if(empty($term3['general_average'])){ 
                    echo "";} else { echo $term3['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 3rd Quarter of Phase 1 Ends Here -->
            <!-- Term 3 -->



            <!-- 4th Quarter of Phase 1 Starts here -->
            <?php
            $sql_phase_1_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '1'
                AND students_grades.term = '4' AND remedial_classes.phase = '1'";
            $query_phase_1_record = mysqli_query($conn, $sql_phase_1_record);
            if(mysqli_num_rows($query_phase_1_record) > 0){ 
                $term4 = mysqli_fetch_array($query_phase_1_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 4th Quarter Starts Here -->
            
            <span><h3>4th Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p1_t4" 
                value="<?php if(empty($term4['mother_tounge'])){ 
                    echo "";} else { echo $term4['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p1_t4" 
                value="<?php if(empty($term4['filipino'])){ 
                    echo "";} else { echo $term4['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p1_t4" 
                value="<?php if(empty($term4['english'])){ 
                    echo "";} else { echo $term4['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p1_t4" 
                value="<?php if(empty($term4['math'])){ 
                    echo "";} else { echo $term4['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p1_t4" 
                value="<?php if(empty($term4['science'])){ 
                    echo "";} else { echo $term4['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p1_t4" 
                value="<?php if(empty($term4['araling_panlipunan'])){ 
                    echo "";} else { echo $term4['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p1_t4" 
                value="<?php if(empty($term4['epp_tle'])){ 
                    echo "";} else { echo $term4['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p1_t4" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p1_t4" 
                value="<?php if(empty($term4['music'])){ 
                    echo "";} else { echo $term4['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p1_t4" 
                value="<?php if(empty($term4['arts'])){ 
                    echo "";} else { echo $term4['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p1_t4" 
                value="<?php if(empty($term4['p_e'])){ 
                    echo "";} else { echo $term4['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p1_t4" 
                value="<?php if(empty($term4['health'])){ 
                    echo "";} else { echo $term4['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p1_t4" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p1_t4" 
                value="<?php if(empty($term4['arabic_language'])){ 
                    echo "";} else { echo $term4['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p1_t4" 
                value="<?php if(empty($term4['islamic_values'])){ 
                    echo "";} else { echo $term4['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p1_t4" 
                value="<?php if(empty($term4['general_average'])){ 
                    echo "";} else { echo $term4['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 4th Quarter of Phase 1 Ends Here -->
            <!-- Term 4 -->


            <!-- Final Quarter of Phase 1 Starts here -->
            <?php
            $sql_phase_1_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '1'
                AND students_grades.term = '5' AND remedial_classes.phase = '1'";
            $query_phase_1_record = mysqli_query($conn, $sql_phase_1_record);
            if(mysqli_num_rows($query_phase_1_record) > 0){ 
                $term5 = mysqli_fetch_array($query_phase_1_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- Final Quarter Starts Here -->
            
            <span><h3>Final Rating</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p1_t5" 
                value="<?php if(empty($term5['mother_tounge'])){ 
                    echo "";} else { echo $term5['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p1_t5" 
                value="<?php if(empty($term5['filipino'])){ 
                    echo "";} else { echo $term5['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english" 
                value="<?php if(empty($term5['english'])){ 
                    echo "";} else { echo $term5['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p1_t5" 
                value="<?php if(empty($term5['math'])){ 
                    echo "";} else { echo $term5['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p1_t5" 
                value="<?php if(empty($term5['science'])){ 
                    echo "";} else { echo $term5['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p1_t5" 
                value="<?php if(empty($term5['araling_panlipunan'])){ 
                    echo "";} else { echo $term5['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p1_t5" 
                value="<?php if(empty($term5['epp_tle'])){ 
                    echo "";} else { echo $term5['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p1_t5" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p1_t5" 
                value="<?php if(empty($term5['music'])){ 
                    echo "";} else { echo $term5['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p1_t5" 
                value="<?php if(empty($term5['arts'])){ 
                    echo "";} else { echo $term5['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p1_t5" 
                value="<?php if(empty($term5['p_e'])){ 
                    echo "";} else { echo $term5['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p1_t5" 
                value="<?php if(empty($term5['health'])){ 
                    echo "";} else { echo $term5['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p1_t5" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p1_t5" 
                value="<?php if(empty($term5['arabic_language'])){ 
                    echo "";} else { echo $term5['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p1_t5" 
                value="<?php if(empty($term5['islamic_values'])){ 
                    echo "";} else { echo $term5['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p1_t5" 
                value="<?php if(empty($term5['general_average'])){ 
                    echo "";} else { echo $term5['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

                    <p><h4>Remedial Classes</h4></p>
                    
                    <label for="">Date Conducted From : </label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', strtotime($term5['date_from']));?>" name="date_from_p1">
                    <br>
                    <label for="">Date Conducted To :</label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_to']));?>" name="date_to_p1">
                    
                    <label for="">Learning Areas</label>
                <input type="text" name="learning_areas_p1_t5_1" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                <input type="text" name="learning_areas_p1_t5_2" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                    <label for="">Final Rating</label>
                <input type="text" name="final_rating_p1_t5_1" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">
                    
                    <input type="text" name="final_rating_p1_t5_2" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">

                    <label for="">Remedial Class Mark</label>
                <input type="text" name="remedial_class_mark_p1_t5_1" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">
                    
                    <input type="text" name="remedial_class_mark_p1_t5_2" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">

                    <label for="">Recomputed Final Grade</label>
                <input type="text" name="recomputed_final_grade_p1_t5_1" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <input type="text" name="recomputed_final_grade_p1_t5_2" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <label for="">Remarks</label>
                <input type="text" name="remarks_p1_t5_1" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

                    <input type="text" name="remarks_p1_t5_2" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

            <!-- Final Quarter of Phase 1 Ends Here -->
            <!-- Final Rating -->

            <br>
            <br>


            <?php
            $sql_phase_2_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '2' 
                AND students_grades.term = '1' AND remedial_classes.phase = '2'
                AND scholastic_records.phase = '2'";
            $query_phase_2_record = mysqli_query($conn, $sql_phase_2_record);
            if(mysqli_num_rows($query_phase_2_record) > 0){ 
                $term1 = mysqli_fetch_array($query_phase_2_record);
            }
            ?>
            <span><h3>Phase 2(pala tandaan lang tang ina nyo -jd)</h3></span>
                <label for="">School</label>
                <input type="text" name="school_p2" 
                value="<?php if(empty($term1['school'])){ 
                    echo "";} else { echo $term1['school'];}?>">

                <label for="">School ID</label>
                <input type="text" name="sr_school_id_p2" 
                value="<?php if(empty($term1['sr_school_id'])){ 
                    echo "";} else { echo $term1['sr_school_id'];}?>">
                    
                <label for="">District</label>
                <input type="text" name="district_p2" 
                value="<?php if(empty($term1['district'])){ 
                    echo "";} else { echo $term1['district'];}?>">

                <label for="">Division</label>
                <input type="text" name="division_p2" 
                value="<?php if(empty($term1['division'])){ 
                    echo "";} else { echo $term1['division'];}?>">

                <label for="">Region</label>
                <input type="text" name="region_p2" 
                value="<?php if(empty($term1['region'])){ 
                    echo "";} else { echo $term1['region'];}?>">

                <label for="">Classified as Grade</label>
                <input type="text" name="classified_as_grade_p2" 
                value="<?php if(empty($term1['classified_as_grade'])){ 
                    echo "";} else { echo $term1['classified_as_grade'];}?>">

                <label for="">Section</label>
                <input type="text" name="section_p2" 
                value="<?php if(empty($term1['section'])){ 
                    echo "";} else { echo $term1['section'];}?>">

                <label for="">School Year</label>
                <input type="text" name="school_year_p2" 
                value="<?php if(empty($term1['school_year'])){ 
                    echo "";} else { echo $term1['school_year'];}?>">

                <label for="">Name of Adviser</label>
                <input type="text" name="name_of_adviser_p2" 
                value="<?php if(empty($term1['name_of_adviser'])){ 
                    echo "";} else { echo $term1['name_of_adviser'];}?>">

            <!-- learning areas starts here -->
            <!-- 1st Quarter 0f Phase 2 Starts here -->

            <span><h3>Learning Areas (Phase 2)</h3></span>
            <span><h3>1st Quarter</h4></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p2_t1" 
                value="<?php if(empty($term1['mother_tounge'])){ 
                    echo "";} else { echo $term1['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p2_t1" 
                value="<?php if(empty($term1['filipino'])){ 
                    echo "";} else { echo $term1['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p2_t1" 
                value="<?php if(empty($term1['english'])){ 
                    echo "";} else { echo $term1['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p2_t1" 
                value="<?php if(empty($term1['math'])){ 
                    echo "";} else { echo $term1['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p2_t1" 
                value="<?php if(empty($term1['science'])){ 
                    echo "";} else { echo $term1['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p2_t1" 
                value="<?php if(empty($term1['araling_panlipunan'])){ 
                    echo "";} else { echo $term1['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p2_t1" 
                value="<?php if(empty($term1['epp_tle'])){ 
                    echo "";} else { echo $term1['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p2_t1" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p2_t1" 
                value="<?php if(empty($term1['music'])){ 
                    echo "";} else { echo $term1['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p2_t1" 
                value="<?php if(empty($term1['arts'])){ 
                    echo "";} else { echo $term1['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p2_t1" 
                value="<?php if(empty($term1['p_e'])){ 
                    echo "";} else { echo $term1['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p2_t1" 
                value="<?php if(empty($term1['health'])){ 
                    echo "";} else { echo $term1['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p2_t1" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p2_t1" 
                value="<?php if(empty($term1['arabic_language'])){ 
                    echo "";} else { echo $term1['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p2_t1" 
                value="<?php if(empty($term1['islamic_values'])){ 
                    echo "";} else { echo $term1['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p2_t1" 
                value="<?php if(empty($term1['general_average'])){ 
                    echo "";} else { echo $term1['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 1st Quarter of Phase 2 Ends Here -->



            <!-- 2nd Quarter of Phase 2 Starts here -->
            <?php
            $sql_phase_2_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '2' 
                AND students_grades.term = '2' AND remedial_classes.phase = '2' ";
            $query_phase_2_record = mysqli_query($conn, $sql_phase_2_record);
            if(mysqli_num_rows($query_phase_2_record) > 0){ 
                $term2 = mysqli_fetch_array($query_phase_2_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 2nd Quarter Starts Here -->
            
            <span><h3>2nd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p2_t2" 
                value="<?php if(empty($term2['mother_tounge'])){ 
                    echo "";} else { echo $term2['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p2_t2" 
                value="<?php if(empty($term2['filipino'])){ 
                    echo "";} else { echo $term2['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p2_t2" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term2['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p2_t2" 
                value="<?php if(empty($term2['math'])){ 
                    echo "";} else { echo $term2['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p2_t2" 
                value="<?php if(empty($term2['science'])){ 
                    echo "";} else { echo $term2['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p2_t2" 
                value="<?php if(empty($term2['araling_panlipunan'])){ 
                    echo "";} else { echo $term2['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p2_t2" 
                value="<?php if(empty($term2['epp_tle'])){ 
                    echo "";} else { echo $term2['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p2_t2" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p2_t2" 
                value="<?php if(empty($term2['music'])){ 
                    echo "";} else { echo $term2['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p2_t2" 
                value="<?php if(empty($term2['arts'])){ 
                    echo "";} else { echo $term2['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p2_t2" 
                value="<?php if(empty($term2['p_e'])){ 
                    echo "";} else { echo $term2['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p2_t2" 
                value="<?php if(empty($term2['health'])){ 
                    echo "";} else { echo $term2['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p2_t2" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p2_t2" 
                value="<?php if(empty($term2['arabic_language'])){ 
                    echo "";} else { echo $term2['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p2_t2" 
                value="<?php if(empty($term2['islamic_values'])){ 
                    echo "";} else { echo $term2['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p2_t2" 
                value="<?php if(empty($term2['general_average'])){ 
                    echo "";} else { echo $term2['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 2nd Quarter of Phase 2 Ends Here -->


            <!-- 3rd Quarter of Phase 2 Starts here -->
            <?php
            $sql_phase_2_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '2' 
                AND students_grades.term = '3' AND remedial_classes.phase = '2' ";
            $query_phase_2_record = mysqli_query($conn, $sql_phase_2_record);
            if(mysqli_num_rows($query_phase_2_record) > 0){ 
                $term3 = mysqli_fetch_array($query_phase_2_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 3rd Quarter Starts Here -->
            
            <span><h3>3rd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p2_t3" 
                value="<?php if(empty($term3['mother_tounge'])){ 
                    echo "";} else { echo $term3['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p2_t3" 
                value="<?php if(empty($term3['filipino'])){ 
                    echo "";} else { echo $term3['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p2_t3" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term3['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p2_t3" 
                value="<?php if(empty($term3['math'])){ 
                    echo "";} else { echo $term3['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p2_t3" 
                value="<?php if(empty($term3['science'])){ 
                    echo "";} else { echo $term3['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p2_t3" 
                value="<?php if(empty($term3['araling_panlipunan'])){ 
                    echo "";} else { echo $term3['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p2_t3" 
                value="<?php if(empty($term3['epp_tle'])){ 
                    echo "";} else { echo $term3['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p2_t3" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p2_t3" 
                value="<?php if(empty($term3['music'])){ 
                    echo "";} else { echo $term3['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p2_t3" 
                value="<?php if(empty($term3['arts'])){ 
                    echo "";} else { echo $term3['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p2_t3" 
                value="<?php if(empty($term3['p_e'])){ 
                    echo "";} else { echo $term3['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p2_t3" 
                value="<?php if(empty($term3['health'])){ 
                    echo "";} else { echo $term3['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p2_t3" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p2_t3" 
                value="<?php if(empty($term3['arabic_language'])){ 
                    echo "";} else { echo $term3['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p2_t3" 
                value="<?php if(empty($term3['islamic_values'])){ 
                    echo "";} else { echo $term3['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p2_t3" 
                value="<?php if(empty($term3['general_average'])){ 
                    echo "";} else { echo $term3['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 3rd Quarter of Phase 2 Ends Here -->
            <!-- Term 3 -->



            <!-- 4th Quarter of Phase 2 Starts here -->
            <?php
            $sql_phase_2_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '2' 
                AND students_grades.term = '4' AND remedial_classes.phase = '2' ";
            $query_phase_2_record = mysqli_query($conn, $sql_phase_2_record);
            if(mysqli_num_rows($query_phase_2_record) > 0){ 
                $term4 = mysqli_fetch_array($query_phase_2_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 4th Quarter Starts Here -->
            
            <span><h3>4th Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p2_t4" 
                value="<?php if(empty($term4['mother_tounge'])){ 
                    echo "";} else { echo $term4['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p2_t4" 
                value="<?php if(empty($term4['filipino'])){ 
                    echo "";} else { echo $term4['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p2_t4" 
                value="<?php if(empty($term4['english'])){ 
                    echo "";} else { echo $term4['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p2_t4" 
                value="<?php if(empty($term4['math'])){ 
                    echo "";} else { echo $term4['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p2_t4" 
                value="<?php if(empty($term4['science'])){ 
                    echo "";} else { echo $term4['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p2_t4" 
                value="<?php if(empty($term4['araling_panlipunan'])){ 
                    echo "";} else { echo $term4['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p2_t4" 
                value="<?php if(empty($term4['epp_tle'])){ 
                    echo "";} else { echo $term4['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p2_t4" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p2_t4" 
                value="<?php if(empty($term4['music'])){ 
                    echo "";} else { echo $term4['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p2_t4" 
                value="<?php if(empty($term4['arts'])){ 
                    echo "";} else { echo $term4['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p2_t4" 
                value="<?php if(empty($term4['p_e'])){ 
                    echo "";} else { echo $term4['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p2_t4" 
                value="<?php if(empty($term4['health'])){ 
                    echo "";} else { echo $term4['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p2_t4" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p2_t4" 
                value="<?php if(empty($term4['arabic_language'])){ 
                    echo "";} else { echo $term4['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p2_t4" 
                value="<?php if(empty($term4['islamic_values'])){ 
                    echo "";} else { echo $term4['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p2_t4" 
                value="<?php if(empty($term4['general_average'])){ 
                    echo "";} else { echo $term4['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 4th Quarter of Phase 2 Ends Here -->
            <!-- Term 4 -->


            <!-- Final Quarter of Phase 2 Starts here -->
            <?php
            $sql_phase_2_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '2' 
                AND students_grades.term = '5' AND remedial_classes.phase = '2' ";
            $query_phase_2_record = mysqli_query($conn, $sql_phase_2_record);
            if(mysqli_num_rows($query_phase_2_record) > 0){ 
                $term5 = mysqli_fetch_array($query_phase_2_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- Final Quarter Starts Here -->
            
            <span><h3>Final Rating</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p2_t5" 
                value="<?php if(empty($term5['mother_tounge'])){ 
                    echo "";} else { echo $term5['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p2_t5" 
                value="<?php if(empty($term5['filipino'])){ 
                    echo "";} else { echo $term5['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english" 
                value="<?php if(empty($term5['english'])){ 
                    echo "";} else { echo $term5['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p2_t5" 
                value="<?php if(empty($term5['math'])){ 
                    echo "";} else { echo $term5['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p2_t5" 
                value="<?php if(empty($term5['science'])){ 
                    echo "";} else { echo $term5['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p2_t5" 
                value="<?php if(empty($term5['araling_panlipunan'])){ 
                    echo "";} else { echo $term5['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p2_t5" 
                value="<?php if(empty($term5['epp_tle'])){ 
                    echo "";} else { echo $term5['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p2_t5" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p2_t5" 
                value="<?php if(empty($term5['music'])){ 
                    echo "";} else { echo $term5['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p2_t5" 
                value="<?php if(empty($term5['arts'])){ 
                    echo "";} else { echo $term5['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p2_t5" 
                value="<?php if(empty($term5['p_e'])){ 
                    echo "";} else { echo $term5['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p2_t5" 
                value="<?php if(empty($term5['health'])){ 
                    echo "";} else { echo $term5['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p2_t5" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p2_t5" 
                value="<?php if(empty($term5['arabic_language'])){ 
                    echo "";} else { echo $term5['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p2_t5" 
                value="<?php if(empty($term5['islamic_values'])){ 
                    echo "";} else { echo $term5['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p2_t5" 
                value="<?php if(empty($term5['general_average'])){ 
                    echo "";} else { echo $term5['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

                    <p><h4>Remedial Classes</h4></p>

                    <label for="">Date Conducted From : </label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_from']));?>" name="date_from_p2">
                    <br>
                    <label for="">Date Conducted To :</label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_to']));?>" name="date_to_p2">
                    
                    <label for="">Learning Areas</label>
                <input type="text" name="learning_areas_p2_t5_1" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                <input type="text" name="learning_areas_p2_t5_2" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                    <label for="">Final Rating</label>
                <input type="text" name="final_rating_p2_t5_1" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">
                    
                    <input type="text" name="final_rating_p2_t5_2" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">

                    <label for="">Remedial Class Mark</label>
                <input type="text" name="remedial_class_mark_p2_t5_1" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">
                    
                    <input type="text" name="remedial_class_mark_p2_t5_2" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">

                    <label for="">Recomputed Final Grade</label>
                <input type="text" name="recomputed_final_grade_p2_t5_1" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <input type="text" name="recomputed_final_grade_p2_t5_2" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <label for="">Remarks</label>
                <input type="text" name="remarks_p2_t5_1" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

                    <input type="text" name="remarks_p2_t5_2" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">
            
            <!-- Final Quarter of Phase 2 Ends Here -->
            <!-- Final Rating -->

            
            <br>
            <br>


            <?php
            $sql_phase_3_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '3'
                AND students_grades.term = '1' AND remedial_classes.phase = '3'
                AND scholastic_records.phase = '3'";
            $query_phase_3_record = mysqli_query($conn, $sql_phase_3_record);
            if(mysqli_num_rows($query_phase_3_record) > 0){ 
                $term1 = mysqli_fetch_array($query_phase_3_record);
            }
            ?>
            <span><h3>Phase 3(pala tandaan lang tang ina nyo -jd)</h3></span>
                <label for="">School</label>
                <input type="text" name="school_p3" 
                value="<?php if(empty($term1['school'])){ 
                    echo "";} else { echo $term1['school'];}?>">

                <label for="">School ID</label>
                <input type="text" name="sr_school_id_p3" 
                value="<?php if(empty($term1['sr_school_id'])){ 
                    echo "";} else { echo $term1['sr_school_id'];}?>">
                    
                <label for="">District</label>
                <input type="text" name="district_p3" 
                value="<?php if(empty($term1['district'])){ 
                    echo "";} else { echo $term1['district'];}?>">

                <label for="">Division</label>
                <input type="text" name="division_p3" 
                value="<?php if(empty($term1['division'])){ 
                    echo "";} else { echo $term1['division'];}?>">

                <label for="">Region</label>
                <input type="text" name="region_p3" 
                value="<?php if(empty($term1['region'])){ 
                    echo "";} else { echo $term1['region'];}?>">

                <label for="">Classified as Grade</label>
                <input type="text" name="classified_as_grade_p3" 
                value="<?php if(empty($term1['classified_as_grade'])){ 
                    echo "";} else { echo $term1['classified_as_grade'];}?>">

                <label for="">Section</label>
                <input type="text" name="section_p3" 
                value="<?php if(empty($term1['section'])){ 
                    echo "";} else { echo $term1['section'];}?>">

                <label for="">School Year</label>
                <input type="text" name="school_year_p3" 
                value="<?php if(empty($term1['school_year'])){ 
                    echo "";} else { echo $term1['school_year'];}?>">

                <label for="">Name of Adviser</label>
                <input type="text" name="name_of_adviser_p3" 
                value="<?php if(empty($term1['name_of_adviser'])){ 
                    echo "";} else { echo $term1['name_of_adviser'];}?>">

            <!-- learning areas starts here -->
            <!-- 1st Quarter 0f Phase 3 Starts here -->

            <span><h3>Learning Areas (Phase 3)</h3></span>
            <span><h3>1st Quarter</h4></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p3_t1" 
                value="<?php if(empty($term1['mother_tounge'])){ 
                    echo "";} else { echo $term1['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p3_t1" 
                value="<?php if(empty($term1['filipino'])){ 
                    echo "";} else { echo $term1['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p3_t1" 
                value="<?php if(empty($term1['english'])){ 
                    echo "";} else { echo $term1['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p3_t1" 
                value="<?php if(empty($term1['math'])){ 
                    echo "";} else { echo $term1['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p3_t1" 
                value="<?php if(empty($term1['science'])){ 
                    echo "";} else { echo $term1['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p3_t1" 
                value="<?php if(empty($term1['araling_panlipunan'])){ 
                    echo "";} else { echo $term1['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p3_t1" 
                value="<?php if(empty($term1['epp_tle'])){ 
                    echo "";} else { echo $term1['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p3_t1" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p3_t1" 
                value="<?php if(empty($term1['music'])){ 
                    echo "";} else { echo $term1['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p3_t1" 
                value="<?php if(empty($term1['arts'])){ 
                    echo "";} else { echo $term1['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p3_t1" 
                value="<?php if(empty($term1['p_e'])){ 
                    echo "";} else { echo $term1['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p3_t1" 
                value="<?php if(empty($term1['health'])){ 
                    echo "";} else { echo $term1['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p3_t1" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p3_t1" 
                value="<?php if(empty($term1['arabic_language'])){ 
                    echo "";} else { echo $term1['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p3_t1" 
                value="<?php if(empty($term1['islamic_values'])){ 
                    echo "";} else { echo $term1['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p3_t1" 
                value="<?php if(empty($term1['general_average'])){ 
                    echo "";} else { echo $term1['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 1st Quarter of Phase 3 Ends Here -->



            <!-- 2nd Quarter of Phase 3 Starts here -->
            <?php
            $sql_phase_3_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '3'
                AND students_grades.term = '2' AND remedial_classes.phase = '3'";
            $query_phase_3_record = mysqli_query($conn, $sql_phase_3_record);
            if(mysqli_num_rows($query_phase_3_record) > 0){ 
                $term2 = mysqli_fetch_array($query_phase_3_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 2nd Quarter Starts Here -->
            
            <span><h3>2nd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p3_t2" 
                value="<?php if(empty($term2['mother_tounge'])){ 
                    echo "";} else { echo $term2['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p3_t2" 
                value="<?php if(empty($term2['filipino'])){ 
                    echo "";} else { echo $term2['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p3_t2" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term2['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p3_t2" 
                value="<?php if(empty($term2['math'])){ 
                    echo "";} else { echo $term2['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p3_t2" 
                value="<?php if(empty($term2['science'])){ 
                    echo "";} else { echo $term2['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p3_t2" 
                value="<?php if(empty($term2['araling_panlipunan'])){ 
                    echo "";} else { echo $term2['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p3_t2" 
                value="<?php if(empty($term2['epp_tle'])){ 
                    echo "";} else { echo $term2['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p3_t2" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p3_t2" 
                value="<?php if(empty($term2['music'])){ 
                    echo "";} else { echo $term2['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p3_t2" 
                value="<?php if(empty($term2['arts'])){ 
                    echo "";} else { echo $term2['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p3_t2" 
                value="<?php if(empty($term2['p_e'])){ 
                    echo "";} else { echo $term2['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p3_t2" 
                value="<?php if(empty($term2['health'])){ 
                    echo "";} else { echo $term2['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p3_t2" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p3_t2" 
                value="<?php if(empty($term2['arabic_language'])){ 
                    echo "";} else { echo $term2['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p3_t2" 
                value="<?php if(empty($term2['islamic_values'])){ 
                    echo "";} else { echo $term2['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p3_t2" 
                value="<?php if(empty($term2['general_average'])){ 
                    echo "";} else { echo $term2['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 2nd Quarter of Phase 3 Ends Here -->


            <!-- 3rd Quarter of Phase 3 Starts here -->
            <?php
            $sql_phase_3_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '3'
                AND students_grades.term = '3' AND remedial_classes.phase = '3'";
            $query_phase_3_record = mysqli_query($conn, $sql_phase_3_record);
            if(mysqli_num_rows($query_phase_3_record) > 0){ 
                $term3 = mysqli_fetch_array($query_phase_3_record);
            ?>
            
            <!-- learning areas starts here -->
            <!-- 3rd Quarter Starts Here -->
            
            <span><h3>3rd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p3_t3" 
                value="<?php if(empty($term3['mother_tounge'])){ 
                    echo "";} else { echo $term3['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p3_t3" 
                value="<?php if(empty($term3['filipino'])){ 
                    echo "";} else { echo $term3['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p3_t3" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term3['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p3_t3" 
                value="<?php if(empty($term3['math'])){ 
                    echo "";} else { echo $term3['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p3_t3" 
                value="<?php if(empty($term3['science'])){ 
                    echo "";} else { echo $term3['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p3_t3" 
                value="<?php if(empty($term3['araling_panlipunan'])){ 
                    echo "";} else { echo $term3['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p3_t3" 
                value="<?php if(empty($term3['epp_tle'])){ 
                    echo "";} else { echo $term3['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p3_t3" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p3_t3" 
                value="<?php if(empty($term3['music'])){ 
                    echo "";} else { echo $term3['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p3_t3" 
                value="<?php if(empty($term3['arts'])){ 
                    echo "";} else { echo $term3['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p3_t3" 
                value="<?php if(empty($term3['p_e'])){ 
                    echo "";} else { echo $term3['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p3_t3" 
                value="<?php if(empty($term3['health'])){ 
                    echo "";} else { echo $term3['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p3_t3" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p3_t3" 
                value="<?php if(empty($term3['arabic_language'])){ 
                    echo "";} else { echo $term3['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p3_t3" 
                value="<?php if(empty($term3['islamic_values'])){ 
                    echo "";} else { echo $term3['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p3_t3" 
                value="<?php if(empty($term3['general_average'])){ 
                    echo "";} else { echo $term3['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <?php
            }
            ?>
            <!-- 3rd Quarter of Phase 3 Ends Here -->
            <!-- Term 3 -->



            <!-- 4th Quarter of Phase 3 Starts here -->
            <?php
            $sql_phase_3_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '3'
                AND students_grades.term = '4' AND remedial_classes.phase = '3'";
            $query_phase_3_record = mysqli_query($conn, $sql_phase_3_record);
            if(mysqli_num_rows($query_phase_3_record) > 0){ 
                $term4 = mysqli_fetch_array($query_phase_3_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 4th Quarter Starts Here -->
            
            <span><h3>4th Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p3_t4" 
                value="<?php if(empty($term4['mother_tounge'])){ 
                    echo "";} else { echo $term4['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p3_t4" 
                value="<?php if(empty($term4['filipino'])){ 
                    echo "";} else { echo $term4['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p3_t4" 
                value="<?php if(empty($term4['english'])){ 
                    echo "";} else { echo $term4['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p3_t4" 
                value="<?php if(empty($term4['math'])){ 
                    echo "";} else { echo $term4['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p3_t4" 
                value="<?php if(empty($term4['science'])){ 
                    echo "";} else { echo $term4['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p3_t4" 
                value="<?php if(empty($term4['araling_panlipunan'])){ 
                    echo "";} else { echo $term4['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p3_t4" 
                value="<?php if(empty($term4['epp_tle'])){ 
                    echo "";} else { echo $term4['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p3_t4" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p3_t4" 
                value="<?php if(empty($term4['music'])){ 
                    echo "";} else { echo $term4['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p3_t4" 
                value="<?php if(empty($term4['arts'])){ 
                    echo "";} else { echo $term4['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p3_t4" 
                value="<?php if(empty($term4['p_e'])){ 
                    echo "";} else { echo $term4['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p3_t4" 
                value="<?php if(empty($term4['health'])){ 
                    echo "";} else { echo $term4['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p3_t4" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p3_t4" 
                value="<?php if(empty($term4['arabic_language'])){ 
                    echo "";} else { echo $term4['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p3_t4" 
                value="<?php if(empty($term4['islamic_values'])){ 
                    echo "";} else { echo $term4['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p3_t4" 
                value="<?php if(empty($term4['general_average'])){ 
                    echo "";} else { echo $term4['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 4th Quarter of Phase 3 Ends Here -->
            <!-- Term 4 -->


            <!-- Final Quarter of Phase 3 Starts here -->
            <?php
            $sql_phase_3_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '3'
                AND students_grades.term = '5' AND remedial_classes.phase = '3'";
            $query_phase_3_record = mysqli_query($conn, $sql_phase_3_record);
            if(mysqli_num_rows($query_phase_3_record) > 0){ 
                $term5 = mysqli_fetch_array($query_phase_3_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- Final Quarter Starts Here -->
            
            <span><h3>Final Rating</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p3_t5" 
                value="<?php if(empty($term5['mother_tounge'])){ 
                    echo "";} else { echo $term5['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p3_t5" 
                value="<?php if(empty($term5['filipino'])){ 
                    echo "";} else { echo $term5['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english" 
                value="<?php if(empty($term5['english'])){ 
                    echo "";} else { echo $term5['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p3_t5" 
                value="<?php if(empty($term5['math'])){ 
                    echo "";} else { echo $term5['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p3_t5" 
                value="<?php if(empty($term5['science'])){ 
                    echo "";} else { echo $term5['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p3_t5" 
                value="<?php if(empty($term5['araling_panlipunan'])){ 
                    echo "";} else { echo $term5['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p3_t5" 
                value="<?php if(empty($term5['epp_tle'])){ 
                    echo "";} else { echo $term5['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p3_t5" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p3_t5" 
                value="<?php if(empty($term5['music'])){ 
                    echo "";} else { echo $term5['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p3_t5" 
                value="<?php if(empty($term5['arts'])){ 
                    echo "";} else { echo $term5['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p3_t5" 
                value="<?php if(empty($term5['p_e'])){ 
                    echo "";} else { echo $term5['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p3_t5" 
                value="<?php if(empty($term5['health'])){ 
                    echo "";} else { echo $term5['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p3_t5" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p3_t5" 
                value="<?php if(empty($term5['arabic_language'])){ 
                    echo "";} else { echo $term5['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p3_t5" 
                value="<?php if(empty($term5['islamic_values'])){ 
                    echo "";} else { echo $term5['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p3_t5" 
                value="<?php if(empty($term5['general_average'])){ 
                    echo "";} else { echo $term5['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

                    <p><h4>Remedial Classes</h4></p>

                    <label for="">Date Conducted From : </label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_from']));?>" name="date_from_p3">
                    <br>
                    <label for="">Date Conducted To :</label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_to']));?>" name="date_to_p3">
                    
                    <label for="">Learning Areas</label>
                <input type="text" name="learning_areas_p3_t5_1" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                <input type="text" name="learning_areas_p3_t5_2" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                    <label for="">Final Rating</label>
                <input type="text" name="final_rating_p3_t5_1" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">
                    
                    <input type="text" name="final_rating_p3_t5_2" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">

                    <label for="">Remedial Class Mark</label>
                <input type="text" name="remedial_class_mark_p3_t5_1" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">
                    
                    <input type="text" name="remedial_class_mark_p3_t5_2" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">

                    <label for="">Recomputed Final Grade</label>
                <input type="text" name="recomputed_final_grade_p3_t5_1" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <input type="text" name="recomputed_final_grade_p3_t5_2" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <label for="">Remarks</label>
                <input type="text" name="remarks_p3_t5_1" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

                    <input type="text" name="remarks_p3_t5_2" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

            <!-- Final Quarter of Phase 3 Ends Here -->
            <!-- Final Rating -->
            

            <br>
            <br>


            <?php
            $sql_phase_4_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '4'
                AND students_grades.term = '1' AND remedial_classes.phase = '4'
                AND scholastic_records.phase = '4'";
            $query_phase_4_record = mysqli_query($conn, $sql_phase_4_record);
            if(mysqli_num_rows($query_phase_4_record) > 0){ 
                $term1 = mysqli_fetch_array($query_phase_4_record);
            }
            ?>
            <span><h3>Phase 4(pala tandaan lang tang ina nyo -jd)</h3></span>
                <label for="">School</label>
                <input type="text" name="school_p4" 
                value="<?php if(empty($term1['school'])){ 
                    echo "";} else { echo $term1['school'];}?>">

                <label for="">School ID</label>
                <input type="text" name="sr_school_id_p4" 
                value="<?php if(empty($term1['sr_school_id'])){ 
                    echo "";} else { echo $term1['sr_school_id'];}?>">
                    
                <label for="">District</label>
                <input type="text" name="district_p4" 
                value="<?php if(empty($term1['district'])){ 
                    echo "";} else { echo $term1['district'];}?>">

                <label for="">Division</label>
                <input type="text" name="division_p4" 
                value="<?php if(empty($term1['division'])){ 
                    echo "";} else { echo $term1['division'];}?>">

                <label for="">Region</label>
                <input type="text" name="region_p4" 
                value="<?php if(empty($term1['region'])){ 
                    echo "";} else { echo $term1['region'];}?>">

                <label for="">Classified as Grade</label>
                <input type="text" name="classified_as_grade_p4" 
                value="<?php if(empty($term1['classified_as_grade'])){ 
                    echo "";} else { echo $term1['classified_as_grade'];}?>">

                <label for="">Section</label>
                <input type="text" name="section_p4" 
                value="<?php if(empty($term1['section'])){ 
                    echo "";} else { echo $term1['section'];}?>">

                <label for="">School Year</label>
                <input type="text" name="school_year_p4" 
                value="<?php if(empty($term1['school_year'])){ 
                    echo "";} else { echo $term1['school_year'];}?>">

                <label for="">Name of Adviser</label>
                <input type="text" name="name_of_adviser_p4" 
                value="<?php if(empty($term1['name_of_adviser'])){ 
                    echo "";} else { echo $term1['name_of_adviser'];}?>">

            <!-- learning areas starts here -->
            <!-- 1st Quarter 0f Phase 4 Starts here -->

            <span><h3>Learning Areas (Phase 4)</h3></span>
            <span><h3>1st Quarter</h4></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p4_t1" 
                value="<?php if(empty($term1['mother_tounge'])){ 
                    echo "";} else { echo $term1['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p4_t1" 
                value="<?php if(empty($term1['filipino'])){ 
                    echo "";} else { echo $term1['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p4_t1" 
                value="<?php if(empty($term1['english'])){ 
                    echo "";} else { echo $term1['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p4_t1" 
                value="<?php if(empty($term1['math'])){ 
                    echo "";} else { echo $term1['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p4_t1" 
                value="<?php if(empty($term1['science'])){ 
                    echo "";} else { echo $term1['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p4_t1" 
                value="<?php if(empty($term1['araling_panlipunan'])){ 
                    echo "";} else { echo $term1['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p4_t1" 
                value="<?php if(empty($term1['epp_tle'])){ 
                    echo "";} else { echo $term1['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p4_t1" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p4_t1" 
                value="<?php if(empty($term1['music'])){ 
                    echo "";} else { echo $term1['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p4_t1" 
                value="<?php if(empty($term1['arts'])){ 
                    echo "";} else { echo $term1['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p4_t1" 
                value="<?php if(empty($term1['p_e'])){ 
                    echo "";} else { echo $term1['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p4_t1" 
                value="<?php if(empty($term1['health'])){ 
                    echo "";} else { echo $term1['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p4_t1" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p4_t1" 
                value="<?php if(empty($term1['arabic_language'])){ 
                    echo "";} else { echo $term1['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p4_t1" 
                value="<?php if(empty($term1['islamic_values'])){ 
                    echo "";} else { echo $term1['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p4_t1" 
                value="<?php if(empty($term1['general_average'])){ 
                    echo "";} else { echo $term1['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 1st Quarter of Phase 4 Ends Here -->



            <!-- 2nd Quarter of Phase 4 Starts here -->
            <?php
            $sql_phase_4_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '4'
                AND students_grades.term = '2' AND remedial_classes.phase = '4'";
            $query_phase_4_record = mysqli_query($conn, $sql_phase_4_record);
            if(mysqli_num_rows($query_phase_4_record) > 0){ 
                $term2 = mysqli_fetch_array($query_phase_4_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 2nd Quarter Starts Here -->
            
            <span><h3>2nd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p4_t2" 
                value="<?php if(empty($term2['mother_tounge'])){ 
                    echo "";} else { echo $term2['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p4_t2" 
                value="<?php if(empty($term2['filipino'])){ 
                    echo "";} else { echo $term2['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p4_t2" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term2['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p4_t2" 
                value="<?php if(empty($term2['math'])){ 
                    echo "";} else { echo $term2['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p4_t2" 
                value="<?php if(empty($term2['science'])){ 
                    echo "";} else { echo $term2['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p4_t2" 
                value="<?php if(empty($term2['araling_panlipunan'])){ 
                    echo "";} else { echo $term2['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p4_t2" 
                value="<?php if(empty($term2['epp_tle'])){ 
                    echo "";} else { echo $term2['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p4_t2" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p4_t2" 
                value="<?php if(empty($term2['music'])){ 
                    echo "";} else { echo $term2['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p4_t2" 
                value="<?php if(empty($term2['arts'])){ 
                    echo "";} else { echo $term2['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p4_t2" 
                value="<?php if(empty($term2['p_e'])){ 
                    echo "";} else { echo $term2['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p4_t2" 
                value="<?php if(empty($term2['health'])){ 
                    echo "";} else { echo $term2['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p4_t2" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p4_t2" 
                value="<?php if(empty($term2['arabic_language'])){ 
                    echo "";} else { echo $term2['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p4_t2" 
                value="<?php if(empty($term2['islamic_values'])){ 
                    echo "";} else { echo $term2['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p4_t2" 
                value="<?php if(empty($term2['general_average'])){ 
                    echo "";} else { echo $term2['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 2nd Quarter of Phase 4 Ends Here -->


            <!-- 3rd Quarter of Phase 4 Starts here -->
            <?php
            $sql_phase_4_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '4'
                AND students_grades.term = '3' AND remedial_classes.phase = '4'";
            $query_phase_4_record = mysqli_query($conn, $sql_phase_4_record);
            if(mysqli_num_rows($query_phase_4_record) > 0){ 
                $term3 = mysqli_fetch_array($query_phase_4_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 3rd Quarter Starts Here -->
            
            <span><h3>3rd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p4_t3" 
                value="<?php if(empty($term3['mother_tounge'])){ 
                    echo "";} else { echo $term3['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p4_t3" 
                value="<?php if(empty($term3['filipino'])){ 
                    echo "";} else { echo $term3['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p4_t3" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term3['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p4_t3" 
                value="<?php if(empty($term3['math'])){ 
                    echo "";} else { echo $term3['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p4_t3" 
                value="<?php if(empty($term3['science'])){ 
                    echo "";} else { echo $term3['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p4_t3" 
                value="<?php if(empty($term3['araling_panlipunan'])){ 
                    echo "";} else { echo $term3['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p4_t3" 
                value="<?php if(empty($term3['epp_tle'])){ 
                    echo "";} else { echo $term3['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p4_t3" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p4_t3" 
                value="<?php if(empty($term3['music'])){ 
                    echo "";} else { echo $term3['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p4_t3" 
                value="<?php if(empty($term3['arts'])){ 
                    echo "";} else { echo $term3['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p4_t3" 
                value="<?php if(empty($term3['p_e'])){ 
                    echo "";} else { echo $term3['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p4_t3" 
                value="<?php if(empty($term3['health'])){ 
                    echo "";} else { echo $term3['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p4_t3" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p4_t3" 
                value="<?php if(empty($term3['arabic_language'])){ 
                    echo "";} else { echo $term3['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p4_t3" 
                value="<?php if(empty($term3['islamic_values'])){ 
                    echo "";} else { echo $term3['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p4_t3" 
                value="<?php if(empty($term3['general_average'])){ 
                    echo "";} else { echo $term3['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 3rd Quarter of Phase 4 Ends Here -->
            <!-- Term 3 -->



            <!-- 4th Quarter of Phase 4 Starts here -->
            <?php
            $sql_phase_4_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '4'
                AND students_grades.term = '4' AND remedial_classes.phase = '4'";
            $query_phase_4_record = mysqli_query($conn, $sql_phase_4_record);
            if(mysqli_num_rows($query_phase_4_record) > 0){ 
                $term4 = mysqli_fetch_array($query_phase_4_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 4th Quarter Starts Here -->
            
            <span><h3>4th Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p4_t4" 
                value="<?php if(empty($term4['mother_tounge'])){ 
                    echo "";} else { echo $term4['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p4_t4" 
                value="<?php if(empty($term4['filipino'])){ 
                    echo "";} else { echo $term4['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p4_t4" 
                value="<?php if(empty($term4['english'])){ 
                    echo "";} else { echo $term4['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p4_t4" 
                value="<?php if(empty($term4['math'])){ 
                    echo "";} else { echo $term4['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p4_t4" 
                value="<?php if(empty($term4['science'])){ 
                    echo "";} else { echo $term4['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p4_t4" 
                value="<?php if(empty($term4['araling_panlipunan'])){ 
                    echo "";} else { echo $term4['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p4_t4" 
                value="<?php if(empty($term4['epp_tle'])){ 
                    echo "";} else { echo $term4['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p4_t4" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p4_t4" 
                value="<?php if(empty($term4['music'])){ 
                    echo "";} else { echo $term4['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p4_t4" 
                value="<?php if(empty($term4['arts'])){ 
                    echo "";} else { echo $term4['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p4_t4" 
                value="<?php if(empty($term4['p_e'])){ 
                    echo "";} else { echo $term4['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p4_t4" 
                value="<?php if(empty($term4['health'])){ 
                    echo "";} else { echo $term4['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p4_t4" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p4_t4" 
                value="<?php if(empty($term4['arabic_language'])){ 
                    echo "";} else { echo $term4['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p4_t4" 
                value="<?php if(empty($term4['islamic_values'])){ 
                    echo "";} else { echo $term4['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p4_t4" 
                value="<?php if(empty($term4['general_average'])){ 
                    echo "";} else { echo $term4['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 4th Quarter of Phase 4 Ends Here -->
            <!-- Term 4 -->


            <!-- Final Quarter of Phase 4 Starts here -->
            <?php
            $sql_phase_4_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '4'
                AND students_grades.term = '5' AND remedial_classes.phase = '4'";
            $query_phase_4_record = mysqli_query($conn, $sql_phase_4_record);
            if(mysqli_num_rows($query_phase_4_record) > 0){ 
                $term5 = mysqli_fetch_array($query_phase_4_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- Final Quarter Starts Here -->
            
            <span><h3>Final Rating</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p4_t5" 
                value="<?php if(empty($term5['mother_tounge'])){ 
                    echo "";} else { echo $term5['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p4_t5" 
                value="<?php if(empty($term5['filipino'])){ 
                    echo "";} else { echo $term5['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english" 
                value="<?php if(empty($term5['english'])){ 
                    echo "";} else { echo $term5['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p4_t5" 
                value="<?php if(empty($term5['math'])){ 
                    echo "";} else { echo $term5['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p4_t5" 
                value="<?php if(empty($term5['science'])){ 
                    echo "";} else { echo $term5['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p4_t5" 
                value="<?php if(empty($term5['araling_panlipunan'])){ 
                    echo "";} else { echo $term5['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p4_t5" 
                value="<?php if(empty($term5['epp_tle'])){ 
                    echo "";} else { echo $term5['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p4_t5" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p4_t5" 
                value="<?php if(empty($term5['music'])){ 
                    echo "";} else { echo $term5['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p4_t5" 
                value="<?php if(empty($term5['arts'])){ 
                    echo "";} else { echo $term5['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p4_t5" 
                value="<?php if(empty($term5['p_e'])){ 
                    echo "";} else { echo $term5['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p4_t5" 
                value="<?php if(empty($term5['health'])){ 
                    echo "";} else { echo $term5['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p4_t5" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p4_t5" 
                value="<?php if(empty($term5['arabic_language'])){ 
                    echo "";} else { echo $term5['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p4_t5" 
                value="<?php if(empty($term5['islamic_values'])){ 
                    echo "";} else { echo $term5['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p4_t5" 
                value="<?php if(empty($term5['general_average'])){ 
                    echo "";} else { echo $term5['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

                    <p><h4>Remedial Classes</h4></p>

                    <label for="">Date Conducted From : </label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_from']));?>" name="date_from_p4">
                    <br>
                    <label for="">Date Conducted To :</label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_to']));?>" name="date_to_p4">
                    
                    <label for="">Learning Areas</label>
                <input type="text" name="learning_areas_p4_t5_1" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                <input type="text" name="learning_areas_p4_t5_2" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                    <label for="">Final Rating</label>
                <input type="text" name="final_rating_p4_t5_1" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">
                    
                    <input type="text" name="final_rating_p4_t5_2" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">

                    <label for="">Remedial Class Mark</label>
                <input type="text" name="remedial_class_mark_p4_t5_1" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">
                    
                    <input type="text" name="remedial_class_mark_p4_t5_2" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">

                    <label for="">Recomputed Final Grade</label>
                <input type="text" name="recomputed_final_grade_p4_t5_1" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <input type="text" name="recomputed_final_grade_p4_t5_2" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <label for="">Remarks</label>
                <input type="text" name="remarks_p4_t5_1" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

                    <input type="text" name="remarks_p4_t5_2" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">
            
            <!-- Final Quarter of Phase 4 Ends Here -->
            <!-- Final Rating -->

            
            <br>
            <br>


            <?php
            $sql_phase_5_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '5'
                AND students_grades.term = '1' AND remedial_classes.phase = '5'
                AND scholastic_records.phase = '5'";
            $query_phase_5_record = mysqli_query($conn, $sql_phase_5_record);
            if(mysqli_num_rows($query_phase_5_record) > 0){ 
                $term1 = mysqli_fetch_array($query_phase_5_record);
            }
            ?>
            <span><h3>Phase 5(pala tandaan lang tang ina nyo -jd)</h3></span>
                <label for="">School</label>
                <input type="text" name="school_p5" 
                value="<?php if(empty($term1['school'])){ 
                    echo "";} else { echo $term1['school'];}?>">

                <label for="">School ID</label>
                <input type="text" name="sr_school_id_p5" 
                value="<?php if(empty($term1['sr_school_id'])){ 
                    echo "";} else { echo $term1['sr_school_id'];}?>">
                    
                <label for="">District</label>
                <input type="text" name="district_p5" 
                value="<?php if(empty($term1['district'])){ 
                    echo "";} else { echo $term1['district'];}?>">

                <label for="">Division</label>
                <input type="text" name="division_p5" 
                value="<?php if(empty($term1['division'])){ 
                    echo "";} else { echo $term1['division'];}?>">

                <label for="">Region</label>
                <input type="text" name="region_p5" 
                value="<?php if(empty($term1['region'])){ 
                    echo "";} else { echo $term1['region'];}?>">

                <label for="">Classified as Grade</label>
                <input type="text" name="classified_as_grade_p5" 
                value="<?php if(empty($term1['classified_as_grade'])){ 
                    echo "";} else { echo $term1['classified_as_grade'];}?>">

                <label for="">Section</label>
                <input type="text" name="section_p5" 
                value="<?php if(empty($term1['section'])){ 
                    echo "";} else { echo $term1['section'];}?>">

                <label for="">School Year</label>
                <input type="text" name="school_year_p5" 
                value="<?php if(empty($term1['school_year'])){ 
                    echo "";} else { echo $term1['school_year'];}?>">

                <label for="">Name of Adviser</label>
                <input type="text" name="name_of_adviser_p5" 
                value="<?php if(empty($term1['name_of_adviser'])){ 
                    echo "";} else { echo $term1['name_of_adviser'];}?>">

            <!-- learning areas starts here -->
            <!-- 1st Quarter 0f Phase 5 Starts here -->

            <span><h3>Learning Areas (Phase 5)</h3></span>
            <span><h3>1st Quarter</h4></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p5_t1" 
                value="<?php if(empty($term1['mother_tounge'])){ 
                    echo "";} else { echo $term1['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p5_t1" 
                value="<?php if(empty($term1['filipino'])){ 
                    echo "";} else { echo $term1['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p5_t1" 
                value="<?php if(empty($term1['english'])){ 
                    echo "";} else { echo $term1['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p5_t1" 
                value="<?php if(empty($term1['math'])){ 
                    echo "";} else { echo $term1['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p5_t1" 
                value="<?php if(empty($term1['science'])){ 
                    echo "";} else { echo $term1['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p5_t1" 
                value="<?php if(empty($term1['araling_panlipunan'])){ 
                    echo "";} else { echo $term1['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p5_t1" 
                value="<?php if(empty($term1['epp_tle'])){ 
                    echo "";} else { echo $term1['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p5_t1" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p5_t1" 
                value="<?php if(empty($term1['music'])){ 
                    echo "";} else { echo $term1['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p5_t1" 
                value="<?php if(empty($term1['arts'])){ 
                    echo "";} else { echo $term1['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p5_t1" 
                value="<?php if(empty($term1['p_e'])){ 
                    echo "";} else { echo $term1['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p5_t1" 
                value="<?php if(empty($term1['health'])){ 
                    echo "";} else { echo $term1['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p5_t1" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p5_t1" 
                value="<?php if(empty($term1['arabic_language'])){ 
                    echo "";} else { echo $term1['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p5_t1" 
                value="<?php if(empty($term1['islamic_values'])){ 
                    echo "";} else { echo $term1['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p5_t1" 
                value="<?php if(empty($term1['general_average'])){ 
                    echo "";} else { echo $term1['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->


            <!-- 1st Quarter of Phase 5 Ends Here -->



            <!-- 2nd Quarter of Phase 5 Starts here -->
            <?php
            $sql_phase_5_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '5'
                AND students_grades.term = '2' AND remedial_classes.phase = '5'";
            $query_phase_5_record = mysqli_query($conn, $sql_phase_5_record);
            if(mysqli_num_rows($query_phase_5_record) > 0){ 
                $term2 = mysqli_fetch_array($query_phase_5_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 2nd Quarter Starts Here -->
            
            <span><h3>2nd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p5_t2" 
                value="<?php if(empty($term2['mother_tounge'])){ 
                    echo "";} else { echo $term2['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p5_t2" 
                value="<?php if(empty($term2['filipino'])){ 
                    echo "";} else { echo $term2['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p5_t2" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term2['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p5_t2" 
                value="<?php if(empty($term2['math'])){ 
                    echo "";} else { echo $term2['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p5_t2" 
                value="<?php if(empty($term2['science'])){ 
                    echo "";} else { echo $term2['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p5_t2" 
                value="<?php if(empty($term2['araling_panlipunan'])){ 
                    echo "";} else { echo $term2['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p5_t2" 
                value="<?php if(empty($term2['epp_tle'])){ 
                    echo "";} else { echo $term2['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p5_t2" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p5_t2" 
                value="<?php if(empty($term2['music'])){ 
                    echo "";} else { echo $term2['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p5_t2" 
                value="<?php if(empty($term2['arts'])){ 
                    echo "";} else { echo $term2['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p5_t2" 
                value="<?php if(empty($term2['p_e'])){ 
                    echo "";} else { echo $term2['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p5_t2" 
                value="<?php if(empty($term2['health'])){ 
                    echo "";} else { echo $term2['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p5_t2" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p5_t2" 
                value="<?php if(empty($term2['arabic_language'])){ 
                    echo "";} else { echo $term2['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p5_t2" 
                value="<?php if(empty($term2['islamic_values'])){ 
                    echo "";} else { echo $term2['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p5_t2" 
                value="<?php if(empty($term2['general_average'])){ 
                    echo "";} else { echo $term2['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            
            <!-- 2nd Quarter of Phase 5 Ends Here -->


            <!-- 3rd Quarter of Phase 5 Starts here -->
            <?php
            $sql_phase_5_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '5'
                AND students_grades.term = '3' AND remedial_classes.phase = '5'";
            $query_phase_5_record = mysqli_query($conn, $sql_phase_5_record);
            if(mysqli_num_rows($query_phase_5_record) > 0){ 
                $term3 = mysqli_fetch_array($query_phase_5_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 3rd Quarter Starts Here -->
            
            <span><h3>3rd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p5_t3" 
                value="<?php if(empty($term3['mother_tounge'])){ 
                    echo "";} else { echo $term3['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p5_t3" 
                value="<?php if(empty($term3['filipino'])){ 
                    echo "";} else { echo $term3['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p5_t3" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term3['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p5_t3" 
                value="<?php if(empty($term3['math'])){ 
                    echo "";} else { echo $term3['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p5_t3" 
                value="<?php if(empty($term3['science'])){ 
                    echo "";} else { echo $term3['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p5_t3" 
                value="<?php if(empty($term3['araling_panlipunan'])){ 
                    echo "";} else { echo $term3['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p5_t3" 
                value="<?php if(empty($term3['epp_tle'])){ 
                    echo "";} else { echo $term3['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p5_t3" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p5_t3" 
                value="<?php if(empty($term3['music'])){ 
                    echo "";} else { echo $term3['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p5_t3" 
                value="<?php if(empty($term3['arts'])){ 
                    echo "";} else { echo $term3['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p5_t3" 
                value="<?php if(empty($term3['p_e'])){ 
                    echo "";} else { echo $term3['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p5_t3" 
                value="<?php if(empty($term3['health'])){ 
                    echo "";} else { echo $term3['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p5_t3" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p5_t3" 
                value="<?php if(empty($term3['arabic_language'])){ 
                    echo "";} else { echo $term3['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p5_t3" 
                value="<?php if(empty($term3['islamic_values'])){ 
                    echo "";} else { echo $term3['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p5_t3" 
                value="<?php if(empty($term3['general_average'])){ 
                    echo "";} else { echo $term3['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->


            <!-- 3rd Quarter of Phase 5 Ends Here -->
            <!-- Term 3 -->



            <!-- 4th Quarter of Phase 5 Starts here -->
            <?php
            $sql_phase_5_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '5'
                AND students_grades.term = '4' AND remedial_classes.phase = '5'";
            $query_phase_5_record = mysqli_query($conn, $sql_phase_5_record);
            if(mysqli_num_rows($query_phase_5_record) > 0){ 
                $term4 = mysqli_fetch_array($query_phase_5_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 4th Quarter Starts Here -->
            
            <span><h3>4th Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p5_t4" 
                value="<?php if(empty($term4['mother_tounge'])){ 
                    echo "";} else { echo $term4['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p5_t4" 
                value="<?php if(empty($term4['filipino'])){ 
                    echo "";} else { echo $term4['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p5_t4" 
                value="<?php if(empty($term4['english'])){ 
                    echo "";} else { echo $term4['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p5_t4" 
                value="<?php if(empty($term4['math'])){ 
                    echo "";} else { echo $term4['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p5_t4" 
                value="<?php if(empty($term4['science'])){ 
                    echo "";} else { echo $term4['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p5_t4" 
                value="<?php if(empty($term4['araling_panlipunan'])){ 
                    echo "";} else { echo $term4['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p5_t4" 
                value="<?php if(empty($term4['epp_tle'])){ 
                    echo "";} else { echo $term4['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p5_t4" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p5_t4" 
                value="<?php if(empty($term4['music'])){ 
                    echo "";} else { echo $term4['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p5_t4" 
                value="<?php if(empty($term4['arts'])){ 
                    echo "";} else { echo $term4['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p5_t4" 
                value="<?php if(empty($term4['p_e'])){ 
                    echo "";} else { echo $term4['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p5_t4" 
                value="<?php if(empty($term4['health'])){ 
                    echo "";} else { echo $term4['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p5_t4" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">
                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p5_t4" 
                value="<?php if(empty($term4['arabic_language'])){ 
                    echo "";} else { echo $term4['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p5_t4" 
                value="<?php if(empty($term4['islamic_values'])){ 
                    echo "";} else { echo $term4['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p5_t4" 
                value="<?php if(empty($term4['general_average'])){ 
                    echo "";} else { echo $term4['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->


            <!-- 4th Quarter of Phase 5 Ends Here -->
            <!-- Term 4 -->


            <!-- Final Quarter of Phase 5 Starts here -->
            <?php
            $sql_phase_5_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '5'
                AND students_grades.term = '5' AND remedial_classes.phase = '5'";
            $query_phase_5_record = mysqli_query($conn, $sql_phase_5_record);
            if(mysqli_num_rows($query_phase_5_record) > 0){ 
                $term5 = mysqli_fetch_array($query_phase_5_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- Final Quarter Starts Here -->
            
            <span><h3>Final Rating</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p5_t5" 
                value="<?php if(empty($term5['mother_tounge'])){ 
                    echo "";} else { echo $term5['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p5_t5" 
                value="<?php if(empty($term5['filipino'])){ 
                    echo "";} else { echo $term5['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english" 
                value="<?php if(empty($term5['english'])){ 
                    echo "";} else { echo $term5['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p5_t5" 
                value="<?php if(empty($term5['math'])){ 
                    echo "";} else { echo $term5['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p5_t5" 
                value="<?php if(empty($term5['science'])){ 
                    echo "";} else { echo $term5['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p5_t5" 
                value="<?php if(empty($term5['araling_panlipunan'])){ 
                    echo "";} else { echo $term5['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p5_t5" 
                value="<?php if(empty($term5['epp_tle'])){ 
                    echo "";} else { echo $term5['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p5_t5" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p5_t5" 
                value="<?php if(empty($term5['music'])){ 
                    echo "";} else { echo $term5['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p5_t5" 
                value="<?php if(empty($term5['arts'])){ 
                    echo "";} else { echo $term5['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p5_t5" 
                value="<?php if(empty($term5['p_e'])){ 
                    echo "";} else { echo $term5['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p5_t5" 
                value="<?php if(empty($term5['health'])){ 
                    echo "";} else { echo $term5['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p5_t5" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p5_t5" 
                value="<?php if(empty($term5['arabic_language'])){ 
                    echo "";} else { echo $term5['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p5_t5" 
                value="<?php if(empty($term5['islamic_values'])){ 
                    echo "";} else { echo $term5['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p5_t5" 
                value="<?php if(empty($term5['general_average'])){ 
                    echo "";} else { echo $term5['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

                    <p><h4>Remedial Classes</h4></p>

                    <label for="">Date Conducted From : </label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_from']));?>" name="date_from_p5">
                    <br>
                    <label for="">Date Conducted To :</label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_to']));?>" name="date_to_p5">
                    
                    <label for="">Learning Areas</label>
                <input type="text" name="learning_areas_p5_t5_1" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                <input type="text" name="learning_areas_p5_t5_2" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                    <label for="">Final Rating</label>
                <input type="text" name="final_rating_p5_t5_1" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">
                    
                    <input type="text" name="final_rating_p5_t5_2" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">

                    <label for="">Remedial Class Mark</label>
                <input type="text" name="remedial_class_mark_p5_t5_1" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">
                    
                    <input type="text" name="remedial_class_mark_p5_t5_2" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">

                    <label for="">Recomputed Final Grade</label>
                <input type="text" name="recomputed_final_grade_p5_t5_1" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <input type="text" name="recomputed_final_grade_p5_t5_2" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <label for="">Remarks</label>
                <input type="text" name="remarks_p5_t5_1" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

                    <input type="text" name="remarks_p5_t5_2" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">
 
            <!-- Final Quarter of Phase 5 Ends Here -->
            <!-- Final Rating -->


            <br>
            <br>


            <?php
            $sql_phase_6_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '6'
                AND students_grades.term = '1' AND remedial_classes.phase = '6'
                AND scholastic_records.phase = '6'";
            $query_phase_6_record = mysqli_query($conn, $sql_phase_6_record);
            if(mysqli_num_rows($query_phase_6_record) > 0){ 
                $term1 = mysqli_fetch_array($query_phase_6_record);
            }
            ?>
            <span><h3>Phase 6(pala tandaan lang tang ina nyo -jd)</h3></span>
                <label for="">School</label>
                <input type="text" name="school_p6" 
                value="<?php if(empty($term1['school'])){ 
                    echo "";} else { echo $term1['school'];}?>">

                <label for="">School ID</label>
                <input type="text" name="sr_school_id_p6" 
                value="<?php if(empty($term1['sr_school_id'])){ 
                    echo "";} else { echo $term1['sr_school_id'];}?>">
                    
                <label for="">District</label>
                <input type="text" name="district_p6" 
                value="<?php if(empty($term1['district'])){ 
                    echo "";} else { echo $term1['district'];}?>">

                <label for="">Division</label>
                <input type="text" name="division_p6" 
                value="<?php if(empty($term1['division'])){ 
                    echo "";} else { echo $term1['division'];}?>">

                <label for="">Region</label>
                <input type="text" name="region_p6" 
                value="<?php if(empty($term1['region'])){ 
                    echo "";} else { echo $term1['region'];}?>">

                <label for="">Classified as Grade</label>
                <input type="text" name="classified_as_grade_p6" 
                value="<?php if(empty($term1['classified_as_grade'])){ 
                    echo "";} else { echo $term1['classified_as_grade'];}?>">

                <label for="">Section</label>
                <input type="text" name="section_p6" 
                value="<?php if(empty($term1['section'])){ 
                    echo "";} else { echo $term1['section'];}?>">

                <label for="">School Year</label>
                <input type="text" name="school_year_p6" 
                value="<?php if(empty($term1['school_year'])){ 
                    echo "";} else { echo $term1['school_year'];}?>">

                <label for="">Name of Adviser</label>
                <input type="text" name="name_of_adviser_p6" 
                value="<?php if(empty($term1['name_of_adviser'])){ 
                    echo "";} else { echo $term1['name_of_adviser'];}?>">

            <!-- learning areas starts here -->
            <!-- 1st Quarter 0f Phase 6 Starts here -->

            <span><h3>Learning Areas (Phase 6)</h3></span>
            <span><h3>1st Quarter</h4></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p6_t1" 
                value="<?php if(empty($term1['mother_tounge'])){ 
                    echo "";} else { echo $term1['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p6_t1" 
                value="<?php if(empty($term1['filipino'])){ 
                    echo "";} else { echo $term1['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p6_t1" 
                value="<?php if(empty($term1['english'])){ 
                    echo "";} else { echo $term1['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p6_t1" 
                value="<?php if(empty($term1['math'])){ 
                    echo "";} else { echo $term1['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p6_t1" 
                value="<?php if(empty($term1['science'])){ 
                    echo "";} else { echo $term1['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p6_t1" 
                value="<?php if(empty($term1['araling_panlipunan'])){ 
                    echo "";} else { echo $term1['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p6_t1" 
                value="<?php if(empty($term1['epp_tle'])){ 
                    echo "";} else { echo $term1['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p6_t1" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p6_t1" 
                value="<?php if(empty($term1['music'])){ 
                    echo "";} else { echo $term1['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p6_t1" 
                value="<?php if(empty($term1['arts'])){ 
                    echo "";} else { echo $term1['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p6_t1" 
                value="<?php if(empty($term1['p_e'])){ 
                    echo "";} else { echo $term1['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p6_t1" 
                value="<?php if(empty($term1['health'])){ 
                    echo "";} else { echo $term1['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p6_t1" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p6_t1" 
                value="<?php if(empty($term1['arabic_language'])){ 
                    echo "";} else { echo $term1['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p6_t1" 
                value="<?php if(empty($term1['islamic_values'])){ 
                    echo "";} else { echo $term1['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p6_t1" 
                value="<?php if(empty($term1['general_average'])){ 
                    echo "";} else { echo $term1['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 1st Quarter of Phase 6 Ends Here -->



            <!-- 2nd Quarter of Phase 6 Starts here -->
            <?php
            $sql_phase_6_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '6'
                AND students_grades.term = '2' AND remedial_classes.phase = '6'";
            $query_phase_6_record = mysqli_query($conn, $sql_phase_6_record);
            if(mysqli_num_rows($query_phase_6_record) > 0){ 
                $term2 = mysqli_fetch_array($query_phase_6_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 2nd Quarter Starts Here -->
            
            <span><h3>2nd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p6_t2" 
                value="<?php if(empty($term2['mother_tounge'])){ 
                    echo "";} else { echo $term2['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p6_t2" 
                value="<?php if(empty($term2['filipino'])){ 
                    echo "";} else { echo $term2['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p6_t2" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term2['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p6_t2" 
                value="<?php if(empty($term2['math'])){ 
                    echo "";} else { echo $term2['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p6_t2" 
                value="<?php if(empty($term2['science'])){ 
                    echo "";} else { echo $term2['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p6_t2" 
                value="<?php if(empty($term2['araling_panlipunan'])){ 
                    echo "";} else { echo $term2['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p6_t2" 
                value="<?php if(empty($term2['epp_tle'])){ 
                    echo "";} else { echo $term2['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p6_t2" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p6_t2" 
                value="<?php if(empty($term2['music'])){ 
                    echo "";} else { echo $term2['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p6_t2" 
                value="<?php if(empty($term2['arts'])){ 
                    echo "";} else { echo $term2['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p6_t2" 
                value="<?php if(empty($term2['p_e'])){ 
                    echo "";} else { echo $term2['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p6_t2" 
                value="<?php if(empty($term2['health'])){ 
                    echo "";} else { echo $term2['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p6_t2" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p6_t2" 
                value="<?php if(empty($term2['arabic_language'])){ 
                    echo "";} else { echo $term2['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p6_t2" 
                value="<?php if(empty($term2['islamic_values'])){ 
                    echo "";} else { echo $term2['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p6_t2" 
                value="<?php if(empty($term2['general_average'])){ 
                    echo "";} else { echo $term2['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 2nd Quarter of Phase 6 Ends Here -->


            <!-- 3rd Quarter of Phase 6 Starts here -->
            <?php
            $sql_phase_6_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '6'
                AND students_grades.term = '3' AND remedial_classes.phase = '6'";
            $query_phase_6_record = mysqli_query($conn, $sql_phase_6_record);
            if(mysqli_num_rows($query_phase_6_record) > 0){ 
                $term3 = mysqli_fetch_array($query_phase_6_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 3rd Quarter Starts Here -->
            
            <span><h3>3rd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p6_t3" 
                value="<?php if(empty($term3['mother_tounge'])){ 
                    echo "";} else { echo $term3['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p6_t3" 
                value="<?php if(empty($term3['filipino'])){ 
                    echo "";} else { echo $term3['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p6_t3" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term3['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p6_t3" 
                value="<?php if(empty($term3['math'])){ 
                    echo "";} else { echo $term3['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p6_t3" 
                value="<?php if(empty($term3['science'])){ 
                    echo "";} else { echo $term3['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p6_t3" 
                value="<?php if(empty($term3['araling_panlipunan'])){ 
                    echo "";} else { echo $term3['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p6_t3" 
                value="<?php if(empty($term3['epp_tle'])){ 
                    echo "";} else { echo $term3['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p6_t3" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p6_t3" 
                value="<?php if(empty($term3['music'])){ 
                    echo "";} else { echo $term3['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p6_t3" 
                value="<?php if(empty($term3['arts'])){ 
                    echo "";} else { echo $term3['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p6_t3" 
                value="<?php if(empty($term3['p_e'])){ 
                    echo "";} else { echo $term3['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p6_t3" 
                value="<?php if(empty($term3['health'])){ 
                    echo "";} else { echo $term3['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p6_t3" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p6_t3" 
                value="<?php if(empty($term3['arabic_language'])){ 
                    echo "";} else { echo $term3['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p6_t3" 
                value="<?php if(empty($term3['islamic_values'])){ 
                    echo "";} else { echo $term3['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p6_t3" 
                value="<?php if(empty($term3['general_average'])){ 
                    echo "";} else { echo $term3['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 3rd Quarter of Phase 6 Ends Here -->
            <!-- Term 3 -->



            <!-- 4th Quarter of Phase 6 Starts here -->
            <?php
            $sql_phase_6_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '6'
                AND students_grades.term = '4' AND remedial_classes.phase = '6'";
            $query_phase_6_record = mysqli_query($conn, $sql_phase_6_record);
            if(mysqli_num_rows($query_phase_6_record) > 0){ 
                $term4 = mysqli_fetch_array($query_phase_6_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 4th Quarter Starts Here -->
            
            <span><h3>4th Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p6_t4" 
                value="<?php if(empty($term4['mother_tounge'])){ 
                    echo "";} else { echo $term4['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p6_t4" 
                value="<?php if(empty($term4['filipino'])){ 
                    echo "";} else { echo $term4['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p6_t4" 
                value="<?php if(empty($term4['english'])){ 
                    echo "";} else { echo $term4['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p6_t4" 
                value="<?php if(empty($term4['math'])){ 
                    echo "";} else { echo $term4['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p6_t4" 
                value="<?php if(empty($term4['science'])){ 
                    echo "";} else { echo $term4['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p6_t4" 
                value="<?php if(empty($term4['araling_panlipunan'])){ 
                    echo "";} else { echo $term4['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p6_t4" 
                value="<?php if(empty($term4['epp_tle'])){ 
                    echo "";} else { echo $term4['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p6_t4" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p6_t4" 
                value="<?php if(empty($term4['music'])){ 
                    echo "";} else { echo $term4['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p6_t4" 
                value="<?php if(empty($term4['arts'])){ 
                    echo "";} else { echo $term4['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p6_t4" 
                value="<?php if(empty($term4['p_e'])){ 
                    echo "";} else { echo $term4['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p6_t4" 
                value="<?php if(empty($term4['health'])){ 
                    echo "";} else { echo $term4['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p6_t4" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p6_t4" 
                value="<?php if(empty($term4['arabic_language'])){ 
                    echo "";} else { echo $term4['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p6_t4" 
                value="<?php if(empty($term4['islamic_values'])){ 
                    echo "";} else { echo $term4['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p6_t4" 
                value="<?php if(empty($term4['general_average'])){ 
                    echo "";} else { echo $term4['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 4th Quarter of Phase 6 Ends Here -->
            <!-- Term 4 -->


            <!-- Final Quarter of Phase 6 Starts here -->
            <?php
            $sql_phase_6_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '6'
                AND students_grades.term = '5' AND remedial_classes.phase = '6'";
            $query_phase_6_record = mysqli_query($conn, $sql_phase_6_record);
            if(mysqli_num_rows($query_phase_6_record) > 0){ 
                $term5 = mysqli_fetch_array($query_phase_6_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- Final Quarter Starts Here -->
            
            <span><h3>Final Rating</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p6_t5" 
                value="<?php if(empty($term5['mother_tounge'])){ 
                    echo "";} else { echo $term5['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p6_t5" 
                value="<?php if(empty($term5['filipino'])){ 
                    echo "";} else { echo $term5['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english" 
                value="<?php if(empty($term5['english'])){ 
                    echo "";} else { echo $term5['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p6_t5" 
                value="<?php if(empty($term5['math'])){ 
                    echo "";} else { echo $term5['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p6_t5" 
                value="<?php if(empty($term5['science'])){ 
                    echo "";} else { echo $term5['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p6_t5" 
                value="<?php if(empty($term5['araling_panlipunan'])){ 
                    echo "";} else { echo $term5['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p6_t5" 
                value="<?php if(empty($term5['epp_tle'])){ 
                    echo "";} else { echo $term5['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p6_t5" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p6_t5" 
                value="<?php if(empty($term5['music'])){ 
                    echo "";} else { echo $term5['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p6_t5" 
                value="<?php if(empty($term5['arts'])){ 
                    echo "";} else { echo $term5['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p6_t5" 
                value="<?php if(empty($term5['p_e'])){ 
                    echo "";} else { echo $term5['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p6_t5" 
                value="<?php if(empty($term5['health'])){ 
                    echo "";} else { echo $term5['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p6_t5" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p6_t5" 
                value="<?php if(empty($term5['arabic_language'])){ 
                    echo "";} else { echo $term5['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p6_t5" 
                value="<?php if(empty($term5['islamic_values'])){ 
                    echo "";} else { echo $term5['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p6_t5" 
                value="<?php if(empty($term5['general_average'])){ 
                    echo "";} else { echo $term5['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

                    <p><h4>Remedial Classes</h4></p>

                    <label for="">Date Conducted From : </label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_from']));?>" name="date_from_p6">
                    <br>
                    <label for="">Date Conducted To :</label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_to']));?>" name="date_to_p6">
                    
                    <label for="">Learning Areas</label>
                <input type="text" name="learning_areas_p6_t5_1" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                <input type="text" name="learning_areas_p6_t5_2" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                    <label for="">Final Rating</label>
                <input type="text" name="final_rating_p6_t5_1" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">
                    
                    <input type="text" name="final_rating_p6_t5_2" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">

                    <label for="">Remedial Class Mark</label>
                <input type="text" name="remedial_class_mark_p6_t5_1" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">
                    
                    <input type="text" name="remedial_class_mark_p6_t5_2" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">

                    <label for="">Recomputed Final Grade</label>
                <input type="text" name="recomputed_final_grade_p6_t5_1" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <input type="text" name="recomputed_final_grade_p6_t5_2" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <label for="">Remarks</label>
                <input type="text" name="remarks_p6_t5_1" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

                    <input type="text" name="remarks_p6_t5_2" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">
    
            <!-- Final Quarter of Phase 6 Ends Here -->
            <!-- Final Rating -->


            <br>
            <br>


            <?php
            $sql_phase_7_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '7'
                AND students_grades.term = '1' AND remedial_classes.phase = '7'
                AND scholastic_records.phase = '7'";
            $query_phase_7_record = mysqli_query($conn, $sql_phase_7_record);
            if(mysqli_num_rows($query_phase_7_record) > 0){ 
                $term1 = mysqli_fetch_array($query_phase_7_record);
            }
            ?>
            <span><h3>Phase 7(pala tandaan lang tang ina nyo -jd)</h3></span>
                <label for="">School</label>
                <input type="text" name="school_p7" 
                value="<?php if(empty($term1['school'])){ 
                    echo "";} else { echo $term1['school'];}?>">

                <label for="">School ID</label>
                <input type="text" name="sr_school_id_p7" 
                value="<?php if(empty($term1['sr_school_id'])){ 
                    echo "";} else { echo $term1['sr_school_id'];}?>">
                    
                <label for="">District</label>
                <input type="text" name="district_p7" 
                value="<?php if(empty($term1['district'])){ 
                    echo "";} else { echo $term1['district'];}?>">

                <label for="">Division</label>
                <input type="text" name="division_p7" 
                value="<?php if(empty($term1['division'])){ 
                    echo "";} else { echo $term1['division'];}?>">

                <label for="">Region</label>
                <input type="text" name="region_p7" 
                value="<?php if(empty($term1['region'])){ 
                    echo "";} else { echo $term1['region'];}?>">

                <label for="">Classified as Grade</label>
                <input type="text" name="classified_as_grade_p7" 
                value="<?php if(empty($term1['classified_as_grade'])){ 
                    echo "";} else { echo $term1['classified_as_grade'];}?>">

                <label for="">Section</label>
                <input type="text" name="section_p7" 
                value="<?php if(empty($term1['section'])){ 
                    echo "";} else { echo $term1['section'];}?>">

                <label for="">School Year</label>
                <input type="text" name="school_year_p7" 
                value="<?php if(empty($term1['school_year'])){ 
                    echo "";} else { echo $term1['school_year'];}?>">

                <label for="">Name of Adviser</label>
                <input type="text" name="name_of_adviser_p7" 
                value="<?php if(empty($term1['name_of_adviser'])){ 
                    echo "";} else { echo $term1['name_of_adviser'];}?>">

            <!-- learning areas starts here -->
            <!-- 1st Quarter 0f Phase 7 Starts here -->

            <span><h3>Learning Areas (Phase 7)</h3></span>
            <span><h3>1st Quarter</h4></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p7_t1" 
                value="<?php if(empty($term1['mother_tounge'])){ 
                    echo "";} else { echo $term1['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p7_t1" 
                value="<?php if(empty($term1['filipino'])){ 
                    echo "";} else { echo $term1['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p7_t1" 
                value="<?php if(empty($term1['english'])){ 
                    echo "";} else { echo $term1['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p7_t1" 
                value="<?php if(empty($term1['math'])){ 
                    echo "";} else { echo $term1['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p7_t1" 
                value="<?php if(empty($term1['science'])){ 
                    echo "";} else { echo $term1['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p7_t1" 
                value="<?php if(empty($term1['araling_panlipunan'])){ 
                    echo "";} else { echo $term1['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p7_t1" 
                value="<?php if(empty($term1['epp_tle'])){ 
                    echo "";} else { echo $term1['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p7_t1" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p7_t1" 
                value="<?php if(empty($term1['music'])){ 
                    echo "";} else { echo $term1['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p7_t1" 
                value="<?php if(empty($term1['arts'])){ 
                    echo "";} else { echo $term1['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p7_t1" 
                value="<?php if(empty($term1['p_e'])){ 
                    echo "";} else { echo $term1['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p7_t1" 
                value="<?php if(empty($term1['health'])){ 
                    echo "";} else { echo $term1['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p7_t1" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p7_t1" 
                value="<?php if(empty($term1['arabic_language'])){ 
                    echo "";} else { echo $term1['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p7_t1" 
                value="<?php if(empty($term1['islamic_values'])){ 
                    echo "";} else { echo $term1['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p7_t1" 
                value="<?php if(empty($term1['general_average'])){ 
                    echo "";} else { echo $term1['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->


            <!-- 1st Quarter of Phase 7 Ends Here -->



            <!-- 2nd Quarter of Phase 7 Starts here -->
            <?php
            $sql_phase_7_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '7'
                AND students_grades.term = '2' AND remedial_classes.phase = '7'";
            $query_phase_7_record = mysqli_query($conn, $sql_phase_7_record);
            if(mysqli_num_rows($query_phase_7_record) > 0){ 
                $term2 = mysqli_fetch_array($query_phase_7_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 2nd Quarter Starts Here -->
            
            <span><h3>2nd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p7_t2" 
                value="<?php if(empty($term2['mother_tounge'])){ 
                    echo "";} else { echo $term2['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p7_t2" 
                value="<?php if(empty($term2['filipino'])){ 
                    echo "";} else { echo $term2['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p7_t2" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term2['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p7_t2" 
                value="<?php if(empty($term2['math'])){ 
                    echo "";} else { echo $term2['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p7_t2" 
                value="<?php if(empty($term2['science'])){ 
                    echo "";} else { echo $term2['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p7_t2" 
                value="<?php if(empty($term2['araling_panlipunan'])){ 
                    echo "";} else { echo $term2['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p7_t2" 
                value="<?php if(empty($term2['epp_tle'])){ 
                    echo "";} else { echo $term2['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p7_t2" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p7_t2" 
                value="<?php if(empty($term2['music'])){ 
                    echo "";} else { echo $term2['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p7_t2" 
                value="<?php if(empty($term2['arts'])){ 
                    echo "";} else { echo $term2['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p7_t2" 
                value="<?php if(empty($term2['p_e'])){ 
                    echo "";} else { echo $term2['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p7_t2" 
                value="<?php if(empty($term2['health'])){ 
                    echo "";} else { echo $term2['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p7_t2" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p7_t2" 
                value="<?php if(empty($term2['arabic_language'])){ 
                    echo "";} else { echo $term2['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p7_t2" 
                value="<?php if(empty($term2['islamic_values'])){ 
                    echo "";} else { echo $term2['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p7_t2" 
                value="<?php if(empty($term2['general_average'])){ 
                    echo "";} else { echo $term2['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 2nd Quarter of Phase 7 Ends Here -->


            <!-- 3rd Quarter of Phase 7 Starts here -->
            <?php
            $sql_phase_7_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '7'
                AND students_grades.term = '3' AND remedial_classes.phase = '7'";
            $query_phase_7_record = mysqli_query($conn, $sql_phase_7_record);
            if(mysqli_num_rows($query_phase_7_record) > 0){ 
                $term3 = mysqli_fetch_array($query_phase_7_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 3rd Quarter Starts Here -->
            
            <span><h3>3rd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p7_t3" 
                value="<?php if(empty($term3['mother_tounge'])){ 
                    echo "";} else { echo $term3['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p7_t3" 
                value="<?php if(empty($term3['filipino'])){ 
                    echo "";} else { echo $term3['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p7_t3" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term3['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p7_t3" 
                value="<?php if(empty($term3['math'])){ 
                    echo "";} else { echo $term3['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p7_t3" 
                value="<?php if(empty($term3['science'])){ 
                    echo "";} else { echo $term3['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p7_t3" 
                value="<?php if(empty($term3['araling_panlipunan'])){ 
                    echo "";} else { echo $term3['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p7_t3" 
                value="<?php if(empty($term3['epp_tle'])){ 
                    echo "";} else { echo $term3['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p7_t3" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p7_t3" 
                value="<?php if(empty($term3['music'])){ 
                    echo "";} else { echo $term3['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p7_t3" 
                value="<?php if(empty($term3['arts'])){ 
                    echo "";} else { echo $term3['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p7_t3" 
                value="<?php if(empty($term3['p_e'])){ 
                    echo "";} else { echo $term3['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p7_t3" 
                value="<?php if(empty($term3['health'])){ 
                    echo "";} else { echo $term3['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p7_t3" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p7_t3" 
                value="<?php if(empty($term3['arabic_language'])){ 
                    echo "";} else { echo $term3['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p7_t3" 
                value="<?php if(empty($term3['islamic_values'])){ 
                    echo "";} else { echo $term3['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p7_t3" 
                value="<?php if(empty($term3['general_average'])){ 
                    echo "";} else { echo $term3['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 3rd Quarter of Phase 7 Ends Here -->
            <!-- Term 3 -->



            <!-- 4th Quarter of Phase 7 Starts here -->
            <?php
            $sql_phase_7_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '7'
                AND students_grades.term = '4' AND remedial_classes.phase = '7'";
            $query_phase_7_record = mysqli_query($conn, $sql_phase_7_record);
            if(mysqli_num_rows($query_phase_7_record) > 0){ 
                $term4 = mysqli_fetch_array($query_phase_7_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 4th Quarter Starts Here -->
            
            <span><h3>4th Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p7_t4" 
                value="<?php if(empty($term4['mother_tounge'])){ 
                    echo "";} else { echo $term4['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p7_t4" 
                value="<?php if(empty($term4['filipino'])){ 
                    echo "";} else { echo $term4['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p7_t4" 
                value="<?php if(empty($term4['english'])){ 
                    echo "";} else { echo $term4['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p7_t4" 
                value="<?php if(empty($term4['math'])){ 
                    echo "";} else { echo $term4['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p7_t4" 
                value="<?php if(empty($term4['science'])){ 
                    echo "";} else { echo $term4['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p7_t4" 
                value="<?php if(empty($term4['araling_panlipunan'])){ 
                    echo "";} else { echo $term4['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p7_t4" 
                value="<?php if(empty($term4['epp_tle'])){ 
                    echo "";} else { echo $term4['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p7_t4" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p7_t4" 
                value="<?php if(empty($term4['music'])){ 
                    echo "";} else { echo $term4['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p7_t4" 
                value="<?php if(empty($term4['arts'])){ 
                    echo "";} else { echo $term4['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p7_t4" 
                value="<?php if(empty($term4['p_e'])){ 
                    echo "";} else { echo $term4['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p7_t4" 
                value="<?php if(empty($term4['health'])){ 
                    echo "";} else { echo $term4['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p7_t4" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p7_t4" 
                value="<?php if(empty($term4['arabic_language'])){ 
                    echo "";} else { echo $term4['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p7_t4" 
                value="<?php if(empty($term4['islamic_values'])){ 
                    echo "";} else { echo $term4['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p7_t4" 
                value="<?php if(empty($term4['general_average'])){ 
                    echo "";} else { echo $term4['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->


            <!-- 4th Quarter of Phase 7 Ends Here -->
            <!-- Term 4 -->


            <!-- Final Quarter of Phase 7 Starts here -->
            <?php
            $sql_phase_7_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '7'
                AND students_grades.term = '5' AND remedial_classes.phase = '7'";
            $query_phase_7_record = mysqli_query($conn, $sql_phase_7_record);
            if(mysqli_num_rows($query_phase_7_record) > 0){ 
                $term5 = mysqli_fetch_array($query_phase_7_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- Final Quarter Starts Here -->
            
            <span><h3>Final Rating</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p7_t5" 
                value="<?php if(empty($term5['mother_tounge'])){ 
                    echo "";} else { echo $term5['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p7_t5" 
                value="<?php if(empty($term5['filipino'])){ 
                    echo "";} else { echo $term5['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english" 
                value="<?php if(empty($term5['english'])){ 
                    echo "";} else { echo $term5['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p7_t5" 
                value="<?php if(empty($term5['math'])){ 
                    echo "";} else { echo $term5['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p7_t5" 
                value="<?php if(empty($term5['science'])){ 
                    echo "";} else { echo $term5['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p7_t5" 
                value="<?php if(empty($term5['araling_panlipunan'])){ 
                    echo "";} else { echo $term5['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p7_t5" 
                value="<?php if(empty($term5['epp_tle'])){ 
                    echo "";} else { echo $term5['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p7_t5" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p7_t5" 
                value="<?php if(empty($term5['music'])){ 
                    echo "";} else { echo $term5['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p7_t5" 
                value="<?php if(empty($term5['arts'])){ 
                    echo "";} else { echo $term5['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p7_t5" 
                value="<?php if(empty($term5['p_e'])){ 
                    echo "";} else { echo $term5['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p7_t5" 
                value="<?php if(empty($term5['health'])){ 
                    echo "";} else { echo $term5['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p7_t5" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p7_t5" 
                value="<?php if(empty($term5['arabic_language'])){ 
                    echo "";} else { echo $term5['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p7_t5" 
                value="<?php if(empty($term5['islamic_values'])){ 
                    echo "";} else { echo $term5['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p7_t5" 
                value="<?php if(empty($term5['general_average'])){ 
                    echo "";} else { echo $term5['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

                    <p><h4>Remedial Classes</h4></p>

                    <label for="">Date Conducted From : </label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_from']));?>" name="date_from_p7">
                    <br>
                    <label for="">Date Conducted To :</label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_to']));?>" name="date_to_p7">
                    
                    <label for="">Learning Areas</label>
                <input type="text" name="learning_areas_p7_t5_1" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                <input type="text" name="learning_areas_p7_t5_2" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                    <label for="">Final Rating</label>
                <input type="text" name="final_rating_p7_t5_1" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">
                    
                    <input type="text" name="final_rating_p7_t5_2" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">

                    <label for="">Remedial Class Mark</label>
                <input type="text" name="remedial_class_mark_p7_t5_1" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">
                    
                    <input type="text" name="remedial_class_mark_p7_t5_2" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">

                    <label for="">Recomputed Final Grade</label>
                <input type="text" name="recomputed_final_grade_p7_t5_1" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <input type="text" name="recomputed_final_grade_p7_t5_2" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <label for="">Remarks</label>
                <input type="text" name="remarks_p7_t5_1" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

                    <input type="text" name="remarks_p7_t5_2" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

            <!-- Final Quarter of Phase 7 Ends Here -->
            <!-- Final Rating -->

            
            <br>
            <br>


            <?php
            $sql_phase_8_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '8'
                AND students_grades.term = '1' AND remedial_classes.phase = '8'
                AND scholastic_records.phase = '8'";
            $query_phase_8_record = mysqli_query($conn, $sql_phase_8_record);
            if(mysqli_num_rows($query_phase_8_record) > 0){ 
                $term1 = mysqli_fetch_array($query_phase_8_record);
            }
            ?>
            <span><h3>Phase 8(pala tandaan lang tang ina nyo -jd)</h3></span>
                <label for="">School</label>
                <input type="text" name="school_p8" 
                value="<?php if(empty($term1['school'])){ 
                    echo "";} else { echo $term1['school'];}?>">

                <label for="">School ID</label>
                <input type="text" name="sr_school_id_p8" 
                value="<?php if(empty($term1['sr_school_id'])){ 
                    echo "";} else { echo $term1['sr_school_id'];}?>">
                    
                <label for="">District</label>
                <input type="text" name="district_p8" 
                value="<?php if(empty($term1['district'])){ 
                    echo "";} else { echo $term1['district'];}?>">

                <label for="">Division</label>
                <input type="text" name="division_p8" 
                value="<?php if(empty($term1['division'])){ 
                    echo "";} else { echo $term1['division'];}?>">

                <label for="">Region</label>
                <input type="text" name="region_p8" 
                value="<?php if(empty($term1['region'])){ 
                    echo "";} else { echo $term1['region'];}?>">

                <label for="">Classified as Grade</label>
                <input type="text" name="classified_as_grade_p8" 
                value="<?php if(empty($term1['classified_as_grade'])){ 
                    echo "";} else { echo $term1['classified_as_grade'];}?>">

                <label for="">Section</label>
                <input type="text" name="section_p8" 
                value="<?php if(empty($term1['section'])){ 
                    echo "";} else { echo $term1['section'];}?>">

                <label for="">School Year</label>
                <input type="text" name="school_year_p8" 
                value="<?php if(empty($term1['school_year'])){ 
                    echo "";} else { echo $term1['school_year'];}?>">

                <label for="">Name of Adviser</label>
                <input type="text" name="name_of_adviser_p8" 
                value="<?php if(empty($term1['name_of_adviser'])){ 
                    echo "";} else { echo $term1['name_of_adviser'];}?>">

            <!-- learning areas starts here -->
            <!-- 1st Quarter 0f Phase 8 Starts here -->

            <span><h3>Learning Areas (Phase 8)</h3></span>
            <span><h3>1st Quarter</h4></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p8_t1" 
                value="<?php if(empty($term1['mother_tounge'])){ 
                    echo "";} else { echo $term1['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p8_t1" 
                value="<?php if(empty($term1['filipino'])){ 
                    echo "";} else { echo $term1['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p8_t1" 
                value="<?php if(empty($term1['english'])){ 
                    echo "";} else { echo $term1['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p8_t1" 
                value="<?php if(empty($term1['math'])){ 
                    echo "";} else { echo $term1['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p8_t1"
                value="<?php if(empty($term1['science'])){ 
                    echo "";} else { echo $term1['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p8_t1" 
                value="<?php if(empty($term1['araling_panlipunan'])){ 
                    echo "";} else { echo $term1['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p8_t1" 
                value="<?php if(empty($term1['epp_tle'])){ 
                    echo "";} else { echo $term1['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p8_t1" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p8_t1" 
                value="<?php if(empty($term1['music'])){ 
                    echo "";} else { echo $term1['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p8_t1" 
                value="<?php if(empty($term1['arts'])){ 
                    echo "";} else { echo $term1['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p8_t1" 
                value="<?php if(empty($term1['p_e'])){ 
                    echo "";} else { echo $term1['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p8_t1" 
                value="<?php if(empty($term1['health'])){ 
                    echo "";} else { echo $term1['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p8_t1" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p8_t1" 
                value="<?php if(empty($term1['arabic_language'])){ 
                    echo "";} else { echo $term1['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p8_t1" 
                value="<?php if(empty($term1['islamic_values'])){ 
                    echo "";} else { echo $term1['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p8_t1" 
                value="<?php if(empty($term1['general_average'])){ 
                    echo "";} else { echo $term1['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 1st Quarter of Phase 8 Ends Here -->



            <!-- 2nd Quarter of Phase 8 Starts here -->
            <?php
            $sql_phase_8_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '8'
                AND students_grades.term = '2' AND remedial_classes.phase = '8'";
            $query_phase_8_record = mysqli_query($conn, $sql_phase_8_record);
            if(mysqli_num_rows($query_phase_8_record) > 0){ 
                $term2 = mysqli_fetch_array($query_phase_8_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 2nd Quarter Starts Here -->
            
            <span><h3>2nd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p8_t2" 
                value="<?php if(empty($term2['mother_tounge'])){ 
                    echo "";} else { echo $term2['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p8_t2" 
                value="<?php if(empty($term2['filipino'])){ 
                    echo "";} else { echo $term2['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p8_t2" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term2['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p8_t2" 
                value="<?php if(empty($term2['math'])){ 
                    echo "";} else { echo $term2['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p8_t2" 
                value="<?php if(empty($term2['science'])){ 
                    echo "";} else { echo $term2['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p8_t2" 
                value="<?php if(empty($term2['araling_panlipunan'])){ 
                    echo "";} else { echo $term2['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p8_t2" 
                value="<?php if(empty($term2['epp_tle'])){ 
                    echo "";} else { echo $term2['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p8_t2" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p8_t2" 
                value="<?php if(empty($term2['music'])){ 
                    echo "";} else { echo $term2['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p8_t2" 
                value="<?php if(empty($term2['arts'])){ 
                    echo "";} else { echo $term2['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p8_t2" 
                value="<?php if(empty($term2['p_e'])){ 
                    echo "";} else { echo $term2['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p8_t2" 
                value="<?php if(empty($term2['health'])){ 
                    echo "";} else { echo $term2['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p8_t2" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p8_t2" 
                value="<?php if(empty($term2['arabic_language'])){ 
                    echo "";} else { echo $term2['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p8_t2" 
                value="<?php if(empty($term2['islamic_values'])){ 
                    echo "";} else { echo $term2['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p8_t2" 
                value="<?php if(empty($term2['general_average'])){ 
                    echo "";} else { echo $term2['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 2nd Quarter of Phase 8 Ends Here -->


            <!-- 3rd Quarter of Phase 8 Starts here -->
            <?php
            $sql_phase_8_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '8'
                AND students_grades.term = '3' AND remedial_classes.phase = '8'";
            $query_phase_8_record = mysqli_query($conn, $sql_phase_8_record);
            if(mysqli_num_rows($query_phase_8_record) > 0){ 
                $term3 = mysqli_fetch_array($query_phase_8_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 3rd Quarter Starts Here -->
            
            <span><h3>3rd Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p8_t3" 
                value="<?php if(empty($term3['mother_tounge'])){ 
                    echo "";} else { echo $term3['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p8_t3" 
                value="<?php if(empty($term3['filipino'])){ 
                    echo "";} else { echo $term3['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p8_t3" 
                value="<?php if(empty($term2['english'])){ 
                    echo "";} else { echo $term3['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p8_t3" 
                value="<?php if(empty($term3['math'])){ 
                    echo "";} else { echo $term3['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p8_t3" 
                value="<?php if(empty($term3['science'])){ 
                    echo "";} else { echo $term3['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p8_t3" 
                value="<?php if(empty($term3['araling_panlipunan'])){ 
                    echo "";} else { echo $term3['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p8_t3" 
                value="<?php if(empty($term3['epp_tle'])){ 
                    echo "";} else { echo $term3['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p8_t3" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p8_t3" 
                value="<?php if(empty($term3['music'])){ 
                    echo "";} else { echo $term3['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p8_t3" 
                value="<?php if(empty($term3['arts'])){ 
                    echo "";} else { echo $term3['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p8_t3" 
                value="<?php if(empty($term3['p_e'])){ 
                    echo "";} else { echo $term3['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p8_t3" 
                value="<?php if(empty($term3['health'])){ 
                    echo "";} else { echo $term3['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p8_t3" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p8_t3" 
                value="<?php if(empty($term3['arabic_language'])){ 
                    echo "";} else { echo $term3['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p8_t3" 
                value="<?php if(empty($term3['islamic_values'])){ 
                    echo "";} else { echo $term3['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p8_t3" 
                value="<?php if(empty($term3['general_average'])){ 
                    echo "";} else { echo $term3['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 3rd Quarter of Phase 8 Ends Here -->
            <!-- Term 3 -->



            <!-- 4th Quarter of Phase 8 Starts here -->
            <?php
            $sql_phase_8_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '8'
                AND students_grades.term = '4' AND remedial_classes.phase = '8'";
            $query_phase_8_record = mysqli_query($conn, $sql_phase_8_record);
            if(mysqli_num_rows($query_phase_8_record) > 0){ 
                $term4 = mysqli_fetch_array($query_phase_8_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- 4th Quarter Starts Here -->
            
            <span><h3>4th Quarter</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p8_t4" 
                value="<?php if(empty($term4['mother_tounge'])){ 
                    echo "";} else { echo $term4['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p8_t4" 
                value="<?php if(empty($term4['filipino'])){ 
                    echo "";} else { echo $term4['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english_p8_t4" 
                value="<?php if(empty($term4['english'])){ 
                    echo "";} else { echo $term4['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p8_t4" 
                value="<?php if(empty($term4['math'])){ 
                    echo "";} else { echo $term4['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p8_t4" 
                value="<?php if(empty($term4['science'])){ 
                    echo "";} else { echo $term4['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p8_t4" 
                value="<?php if(empty($term4['araling_panlipunan'])){ 
                    echo "";} else { echo $term4['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p8_t4" 
                value="<?php if(empty($term4['epp_tle'])){ 
                    echo "";} else { echo $term4['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p8_t4" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p8_t4" 
                value="<?php if(empty($term4['music'])){ 
                    echo "";} else { echo $term4['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p8_t4" 
                value="<?php if(empty($term4['arts'])){ 
                    echo "";} else { echo $term4['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p8_t4" 
                value="<?php if(empty($term4['p_e'])){ 
                    echo "";} else { echo $term4['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p8_t4" 
                value="<?php if(empty($term4['health'])){ 
                    echo "";} else { echo $term4['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p8_t4" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p8_t4" 
                value="<?php if(empty($term4['arabic_language'])){ 
                    echo "";} else { echo $term4['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p8_t4" 
                value="<?php if(empty($term4['islamic_values'])){ 
                    echo "";} else { echo $term4['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p8_t4" 
                value="<?php if(empty($term4['general_average'])){ 
                    echo "";} else { echo $term4['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

            <!-- 4th Quarter of Phase 8 Ends Here -->
            <!-- Term 4 -->


            <!-- Final Quarter of Phase 8 Starts here -->
            <?php
            $sql_phase_8_record = "SELECT * FROM scholastic_records
                LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '8'
                AND students_grades.term = '5' AND remedial_classes.phase = '8'";
            $query_phase_8_record = mysqli_query($conn, $sql_phase_8_record);
            if(mysqli_num_rows($query_phase_8_record) > 0){ 
                $term5 = mysqli_fetch_array($query_phase_8_record);
            }
            ?>
            
            <!-- learning areas starts here -->
            <!-- Final Quarter Starts Here -->
            
            <span><h3>Final Rating</h3></span>
                <label for="">Mother Tounge</label>
                <input type="text" name="mother_tounge_p8_t5" 
                value="<?php if(empty($term5['mother_tounge'])){ 
                    echo "";} else { echo $term5['mother_tounge'];}?>">
                    
                    <label for="">Filipino</label>
                <input type="text" name="filipino_p8_t5" 
                value="<?php if(empty($term5['filipino'])){ 
                    echo "";} else { echo $term5['filipino'];}?>">

                    <label for="">English</label>
                <input type="text" name="english" 
                value="<?php if(empty($term5['english'])){ 
                    echo "";} else { echo $term5['english'];}?>">

                    <label for="">Math</label>
                <input type="text" name="math_p8_t5" 
                value="<?php if(empty($term5['math'])){ 
                    echo "";} else { echo $term5['math'];}?>">

                    <label for="">Science</label>
                <input type="text" name="science_p8_t5" 
                value="<?php if(empty($term5['science'])){ 
                    echo "";} else { echo $term5['science'];}?>">

                    <label for="">Araling Panlipunan</label>
                <input type="text" name="araling_panlipunan_p8_t5" 
                value="<?php if(empty($term5['araling_panlipunan'])){ 
                    echo "";} else { echo $term5['araling_panlipunan'];}?>">

                    <label for="">EPP / TLE</label>
                <input type="text" name="epp_tle_p8_t5" 
                value="<?php if(empty($term5['epp_tle'])){ 
                    echo "";} else { echo $term5['epp_tle'];}?>">
                
                <label for="">MAPEH</label>
                <input type="text" name="mapeh_p8_t5" 
                value="<?php if(empty($term1['mapeh'])){ 
                    echo "";} else { echo $term1['mapeh'];}?>">

                    <label for="">Music</label>
                <input type="text" name="music_p8_t5" 
                value="<?php if(empty($term5['music'])){ 
                    echo "";} else { echo $term5['music'];}?>">

                    <label for="">Arts</label>
                <input type="text" name="arts_p8_t5" 
                value="<?php if(empty($term5['arts'])){ 
                    echo "";} else { echo $term5['arts'];}?>">

                    <label for="">Physical Education</label>
                <input type="text" name="p_e_p8_t5" 
                value="<?php if(empty($term5['p_e'])){ 
                    echo "";} else { echo $term5['p_e'];}?>">

                    <label for="">Health</label>
                <input type="text" name="health_p8_t5" 
                value="<?php if(empty($term5['health'])){ 
                    echo "";} else { echo $term5['health'];}?>">

                    <label for="">Edukasyon sa Pagpapakatao</label>
                <input type="text" name="esp_p8_t5" 
                value="<?php if(empty($term1['edukasyon_sa_pagpapakatao'])){ 
                    echo "";} else { echo $term1['edukasyon_sa_pagpapakatao'];}?>">

                    <label for="">Arabic Language</label>
                <input type="text" name="arabic_language_p8_t5" 
                value="<?php if(empty($term5['arabic_language'])){ 
                    echo "";} else { echo $term5['arabic_language'];}?>">

                    <label for="">Islamic Values</label>
                <input type="text" name="islamic_values_p8_t5" 
                value="<?php if(empty($term5['islamic_values'])){ 
                    echo "";} else { echo $term5['islamic_values'];}?>">
                    
                    <label for="">General Average</label>
                <input type="text" name="general_average_p8_t5" 
                value="<?php if(empty($term5['general_average'])){ 
                    echo "";} else { echo $term5['general_average'];}?>">

                    <!-- Learning Areas Ends Here -->

                    <p><h4>Remedial Classes</h4></p>

                    <label for="">Date Conducted From : </label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_from']));?>" name="date_from_p8">
                    <br>
                    <label for="">Date Conducted To :</label>
                    <input type="date" value="<?php echo strftime('%Y-%m-%d', 
                    strtotime($term5['date_to']));?>" name="date_to_p8">
                    
                    <label for="">Learning Areas</label>
                <input type="text" name="learning_areas_p8_t5_1" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                <input type="text" name="learning_areas_p8_t5_2" 
                value="<?php if(empty($term5['learning_areas'])){ 
                    echo "";} else { echo $term5['learning_areas'];}?>">

                    <label for="">Final Rating</label>
                <input type="text" name="final_rating_p8_t5_1" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">
                    
                    <input type="text" name="final_rating_p8_t5_2" 
                value="<?php if(empty($term5['final_rating'])){ 
                    echo "";} else { echo $term5['final_rating'];}?>">

                    <label for="">Remedial Class Mark</label>
                <input type="text" name="remedial_class_mark_p8_t5_1" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">
                    
                    <input type="text" name="remedial_class_mark_p8_t5_2" 
                value="<?php if(empty($term5['remedial_class_mark'])){ 
                    echo "";} else { echo $term5['remedial_class_mark'];}?>">

                    <label for="">Recomputed Final Grade</label>
                <input type="text" name="recomputed_final_grade_p8_t5_1" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <input type="text" name="recomputed_final_grade_p8_t5_2" 
                value="<?php if(empty($term5['recomputed_final_grade'])){ 
                    echo "";} else { echo $term5['recomputed_final_grade'];}?>">

                    <label for="">Remarks</label>
                <input type="text" name="remarks_p8_t5_1" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">

                    <input type="text" name="remarks_p8_t5_2" 
                value="<?php if(empty($term5['rc_remarks'])){ 
                    echo "";} else { echo $term5['rc_remarks'];}?>">
            <!-- Final Quarter of Phase 8 Ends Here -->
            <!-- Final Rating -->

            <button type="submit" name="update">Update</button>
            </form>
            <?php


}
?>

</body>
</html>

<?php
    if(isset($_POST['update'])){
        // Learner`s Personal Info Starts Here
        $lrn = $_POST['lrn'];
        $last_name = ucfirst($_POST['last_name']);
        $first_name = ucfirst($_POST['first_name']);
        $middle_name = ucfirst($_POST['middle_name']);
        $suffix_name = ucfirst($_POST['suffix_name']);
        $birthday = $_POST['birthday'];
        $sex = ucfirst($_POST['sex']);
        // Learner`s Personal Info Ends Here

        // Eligibility for Elem School Enrollment Starts Here
        $credential_presented = ucfirst($_POST['credential_presented']);
        $name_of_school = ucfirst($_POST['name_of_school']);
        $efese_school_id = $_POST['efese_school_id'];
        $address_of_school = $_POST['address_of_school'];
        $others = ucfirst($_POST['others']);
        // Eligibility Ends Here

        // Scholastic Records Phase 1 Starts Here
        $school_p1 = ucfirst($_POST['school_p1']);
        $sr_school_id_p1 = $_POST['sr_school_id_p1'];
        $district_p1 = $_POST['district_p1'];
        $division_p1 = $_POST['division_p1'];
        $region_p1 = $_POST['region_p1'];
        $classified_as_grade_p1 = $_POST['classified_as_grade_p1'];
        $section_p1 = $_POST['section_p1'];
        $school_year_p1 = $_POST['school_year_p1'];
        $name_of_adviser_p1 = ucfirst($_POST['name_of_adviser_p1']);
        // Scholastic Records Phase 1 Ends Here

        // Learning Areas Starts Here
        // 1st Quarter of Phase 1 Starts Here
        $mother_tounge_p1_t1 = $_POST['mother_tounge_p1_t1'];
        $filipino_p1_t1 = $_POST['filipino_p1_t1'];
        $english_p1_t1 = $_POST['english_p1_t1'];
        $math_p1_t1 = $_POST['math_p1_t1'];
        $araling_panlipunan_p1_t1 = $_POST['araling_panlipunan_p1_t1'];
        $epp_tle_p1_t1 = $_POST['epp_tle_p1_t1'];
        $mapeh_p1_t1 = $_POST['mapeh_p1_t1'];
        $music_p1_t1 = $_POST['music_p1_t1'];
        $arts_p1_t1 = $_POST['arts_p1_t1'];
        $p_e_p1_t1 = $_POST['p_e_p1_t1'];
        $health_p1_t1 = $_POST['health_p1_t1'];
        $esp_p1_t1 = $_POST['esp_p1_t1'];
        $arabic_language_p1_t1 = $_POST['arabic_language_p1_t1'];
        $islamic_values_p1_t1 = $_POST['islamic_values_p1_t1'];
        $general_average_p1_t1 = $_POST['general_average_p1_t1'];
        // 1st Quarter of Phase 1 Ends Here

        // 2nd Quarter of Phase 1 Starts Here
        $mother_tounge_p1_t2 = $_POST['mother_tounge_p1_t2'];
        $filipino_p1_t2 = $_POST['filipino_p1_t2'];
        $english_p1_t2 = $_POST['english_p1_t2'];
        $math_p1_t2 = $_POST['math_p1_t2'];
        $araling_panlipunan_p1_t2 = $_POST['araling_panlipunan_p1_t2'];
        $epp_tle_p1_t2 = $_POST['epp_tle_p1_t2'];
        $mapeh_p1_t2 = $_POST['mapeh_p1_t2'];
        $music_p1_t2 = $_POST['music_p1_t2'];
        $arts_p1_t2 = $_POST['arts_p1_t2'];
        $p_e_p1_t2 = $_POST['p_e_p1_t2'];
        $health_p1_t2 = $_POST['health_p1_t2'];
        $esp_p1_t2 = $_POST['esp_p1_t2'];
        $arabic_language_p1_t2 = $_POST['arabic_language_p1_t2'];
        $islamic_values_p1_t2 = $_POST['islamic_values_p1_t2'];
        $general_average_p1_t2 = $_POST['general_average_p1_t2'];
        // 2nd Quarter of Phase 1 Ends Here

        // 3rd Quarter of Phase 1 Starts Here
        $mother_tounge_p1_t3 = $_POST['mother_tounge_p1_t3'];
        $filipino_p1_t3 = $_POST['filipino_p1_t3'];
        $english_p1_t3 = $_POST['english_p1_t3'];
        $math_p1_t3 = $_POST['math_p1_t3'];
        $araling_panlipunan_p1_t3 = $_POST['araling_panlipunan_p1_t3'];
        $epp_tle_p1_t3 = $_POST['epp_tle_p1_t3'];
        $mapeh_p1_t3 = $_POST['mapeh_p1_t3'];
        $music_p1_t3 = $_POST['music_p1_t3'];
        $arts_p1_t3 = $_POST['arts_p1_t3'];
        $p_e_p1_t3 = $_POST['p_e_p1_t3'];
        $health_p1_t3 = $_POST['health_p1_t3'];
        $esp_p1_t3 = $_POST['esp_p1_t3'];
        $arabic_language_p1_t3 = $_POST['arabic_language_p1_t3'];
        $islamic_values_p1_t3 = $_POST['islamic_values_p1_t3'];
        $general_average_p1_t3 = $_POST['general_average_p1_t3'];
        // 3rd Quarter of Phase 1 Ends Here

        // 4th Quarter of Phase 1 Starts Here
        $mother_tounge_p1_t4 = $_POST['mother_tounge_p1_t4'];
        $filipino_p1_t4 = $_POST['filipino_p1_t4'];
        $english_p1_t4 = $_POST['english_p1_t4'];
        $math_p1_t4 = $_POST['math_p1_t4'];
        $araling_panlipunan_p1_t4 = $_POST['araling_panlipunan_p1_t4'];
        $epp_tle_p1_t4 = $_POST['epp_tle_p1_t4'];
        $mapeh_p1_t4 = $_POST['mapeh_p1_t4'];
        $music_p1_t4 = $_POST['music_p1_t4'];
        $arts_p1_t4 = $_POST['arts_p1_t4'];
        $p_e_p1_t4 = $_POST['p_e_p1_t4'];
        $health_p1_t4 = $_POST['health_p1_t4'];
        $esp_p1_t4 = $_POST['esp_p1_t4'];
        $arabic_language_p1_t4 = $_POST['arabic_language_p1_t4'];
        $islamic_values_p1_t4 = $_POST['islamic_values_p1_t4'];
        $general_average_p1_t4 = $_POST['general_average_p1_t4'];
        // 4th Quarter of Phase 1 Ends Here

        // Final Quarter of Phase 1 Starts Here
        $mother_tounge_p1_t5 = $_POST['mother_tounge_p1_t5'];
        $filipino_p1_t5 = $_POST['filipino_p1_t5'];
        $english_p1_t5 = $_POST['english_p1_t5'];
        $math_p1_t5 = $_POST['math_p1_t5'];
        $araling_panlipunan_p1_t5 = $_POST['araling_panlipunan_p1_t5'];
        $epp_tle_p1_t5 = $_POST['epp_tle_p1_t5'];
        $mapeh_p1_t5 = $_POST['mapeh_p1_t5'];
        $music_p1_t5 = $_POST['music_p1_t5'];
        $arts_p1_t5 = $_POST['arts_p1_t5'];
        $p_e_p1_t5 = $_POST['p_e_p1_t5'];
        $health_p1_t5 = $_POST['health_p1_t5'];
        $esp_p1_t5 = $_POST['esp_p1_t5'];
        $arabic_language_p1_t5 = $_POST['arabic_language_p1_t5'];
        $islamic_values_p1_t5 = $_POST['islamic_values_p1_t5'];
        $general_average_p1_t5 = $_POST['general_average_p1_t5'];
        // Final Quarter of Phase 1 Ends Here

        // Remedial Classes of Phase 1 Starts Here
        $date_from_p1 = $_POST['date_from_p1'];
        $date_to_p1 = $_POST['date_to_p1'];
        $learning_areas_p1_t5_1 = $_POST['learning_areas_p1_t5_1'];
        $learning_areas_p1_t5_2 = $_POST['learning_areas_p1_t5_2'];
        $final_rating_p1_t5_1 = $_POST['final_rating_p1_t5_1'];
        $final_rating_p1_t5_2 = $_POST['final_rating_p1_t5_2'];
        $remedial_class_mark_p1_t5_1 = $_POST['remedial_class_mark_p1_t5_1'];
        $remedial_class_mark_p1_t5_2 = $_POST['remedial_class_mark_p1_t5_2'];
        $recomputed_final_grade_p1_t5_1 = $_POST['recomputed_final_grade_p1_t5_1'];
        $recomputed_final_grade_p1_t5_2 = $_POST['recomputed_final_grade_p1_t5_2'];
        $remarks_p1_t5_1 = $_POST['remarks_p1_t5_1'];
        $remarks_p1_t5_2 = $_POST['remarks_p1_t5_2'];
        // Remedial Classes of Phase 1 Ends Here

        // Scholastic Records Phase 2 Starts Here
        $school_p2 = ucfirst($_POST['school_p2']);
        $sr_school_id_p2 = $_POST['sr_school_id_p2'];
        $district_p2 = $_POST['district_p2'];
        $division_p2 = $_POST['division_p2'];
        $region_p2 = $_POST['region_p2'];
        $classified_as_grade_p2 = $_POST['classified_as_grade_p2'];
        $section_p2 = $_POST['section_p2'];
        $school_year_p2 = $_POST['school_year_p2'];
        $name_of_adviser_p2 = ucfirst($_POST['name_of_adviser_p2']);
        // Scholastic Records Phase 2 Ends Here

        // Learning Areas Starts Here
        // 1st Quarter of Phase 2 Starts Here
        $mother_tounge_p2_t1 = $_POST['mother_tounge_p2_t1'];
        $filipino_p2_t1 = $_POST['filipino_p2_t1'];
        $english_p2_t1 = $_POST['english_p2_t1'];
        $math_p2_t1 = $_POST['math_p2_t1'];
        $araling_panlipunan_p2_t1 = $_POST['araling_panlipunan_p2_t1'];
        $epp_tle_p2_t1 = $_POST['epp_tle_p2_t1'];
        $mapeh_p2_t1 = $_POST['mapeh_p2_t1'];
        $music_p2_t1 = $_POST['music_p2_t1'];
        $arts_p2_t1 = $_POST['arts_p2_t1'];
        $p_e_p2_t1 = $_POST['p_e_p2_t1'];
        $health_p2_t1 = $_POST['health_p2_t1'];
        $esp_p2_t1 = $_POST['esp_p2_t1'];
        $arabic_language_p2_t1 = $_POST['arabic_language_p2_t1'];
        $islamic_values_p2_t1 = $_POST['islamic_values_p2_t1'];
        $general_average_p2_t1 = $_POST['general_average_p2_t1'];
        // 1st Quarter of Phase 2 Ends Here

        // 2nd Quarter of Phase 2 Starts Here
        $mother_tounge_p2_t2 = $_POST['mother_tounge_p2_t2'];
        $filipino_p2_t2 = $_POST['filipino_p2_t2'];
        $english_p2_t2 = $_POST['english_p2_t2'];
        $math_p2_t2 = $_POST['math_p2_t2'];
        $araling_panlipunan_p2_t2 = $_POST['araling_panlipunan_p2_t2'];
        $epp_tle_p2_t2 = $_POST['epp_tle_p2_t2'];
        $mapeh_p2_t2 = $_POST['mapeh_p2_t2'];
        $music_p2_t2 = $_POST['music_p2_t2'];
        $arts_p2_t2 = $_POST['arts_p2_t2'];
        $p_e_p2_t2 = $_POST['p_e_p2_t2'];
        $health_p2_t2 = $_POST['health_p2_t2'];
        $esp_p2_t2 = $_POST['esp_p2_t2'];
        $arabic_language_p2_t2 = $_POST['arabic_language_p2_t2'];
        $islamic_values_p2_t2 = $_POST['islamic_values_p2_t2'];
        $general_average_p2_t2 = $_POST['general_average_p2_t2'];
        // 2nd Quarter of Phase 2 Ends Here

        // 3rd Quarter of Phase 2 Starts Here
        $mother_tounge_p2_t3 = $_POST['mother_tounge_p2_t3'];
        $filipino_p2_t3 = $_POST['filipino_p2_t3'];
        $english_p2_t3 = $_POST['english_p2_t3'];
        $math_p2_t3 = $_POST['math_p2_t3'];
        $araling_panlipunan_p2_t3 = $_POST['araling_panlipunan_p2_t3'];
        $epp_tle_p2_t3 = $_POST['epp_tle_p2_t3'];
        $mapeh_p2_t3 = $_POST['mapeh_p2_t3'];
        $music_p2_t3 = $_POST['music_p2_t3'];
        $arts_p2_t3 = $_POST['arts_p2_t3'];
        $p_e_p2_t3 = $_POST['p_e_p2_t3'];
        $health_p2_t3 = $_POST['health_p2_t3'];
        $esp_p2_t3 = $_POST['esp_p2_t3'];
        $arabic_language_p2_t3 = $_POST['arabic_language_p2_t3'];
        $islamic_values_p2_t3 = $_POST['islamic_values_p2_t3'];
        $general_average_p2_t3 = $_POST['general_average_p2_t3'];
        // 3rd Quarter of Phase 2 Ends Here

        // 4th Quarter of Phase 2 Starts Here
        $mother_tounge_p2_t4 = $_POST['mother_tounge_p2_t4'];
        $filipino_p2_t4 = $_POST['filipino_p2_t4'];
        $english_p2_t4 = $_POST['english_p2_t4'];
        $math_p2_t4 = $_POST['math_p2_t4'];
        $araling_panlipunan_p2_t4 = $_POST['araling_panlipunan_p2_t4'];
        $epp_tle_p2_t4 = $_POST['epp_tle_p2_t4'];
        $mapeh_p2_t4 = $_POST['mapeh_p2_t4'];
        $music_p2_t4 = $_POST['music_p2_t4'];
        $arts_p2_t4 = $_POST['arts_p2_t4'];
        $p_e_p2_t4 = $_POST['p_e_p2_t4'];
        $health_p2_t4 = $_POST['health_p2_t4'];
        $esp_p2_t4 = $_POST['esp_p2_t4'];
        $arabic_language_p2_t4 = $_POST['arabic_language_p2_t4'];
        $islamic_values_p2_t4 = $_POST['islamic_values_p2_t4'];
        $general_average_p2_t4 = $_POST['general_average_p2_t4'];
        // 4th Quarter of Phase 2 Ends Here

        // Final Quarter of Phase 2 Starts Here
        $mother_tounge_p2_t5 = $_POST['mother_tounge_p2_t5'];
        $filipino_p2_t5 = $_POST['filipino_p2_t5'];
        $english_p2_t5 = $_POST['english_p2_t5'];
        $math_p2_t5 = $_POST['math_p2_t5'];
        $araling_panlipunan_p2_t5 = $_POST['araling_panlipunan_p2_t5'];
        $epp_tle_p2_t5 = $_POST['epp_tle_p2_t5'];
        $mapeh_p2_t5 = $_POST['mapeh_p2_t5'];
        $music_p2_t5 = $_POST['music_p2_t5'];
        $arts_p2_t5 = $_POST['arts_p2_t5'];
        $p_e_p2_t5 = $_POST['p_e_p2_t5'];
        $health_p2_t5 = $_POST['health_p2_t5'];
        $esp_p2_t5 = $_POST['esp_p2_t5'];
        $arabic_language_p2_t5 = $_POST['arabic_language_p2_t5'];
        $islamic_values_p2_t5 = $_POST['islamic_values_p2_t5'];
        $general_average_p2_t5 = $_POST['general_average_p2_t5'];
        // Final Quarter of Phase 2 Ends Here

        // Remedial Classes of Phase 2 Starts Here
        $date_from_p2 = $_POST['date_from_p2'];
        $date_to_p2 = $_POST['date_to_p2'];
        $learning_areas_p2_t5_1 = $_POST['learning_areas_p2_t5_1'];
        $learning_areas_p2_t5_2 = $_POST['learning_areas_p2_t5_2'];
        $final_rating_p2_t5_1 = $_POST['final_rating_p2_t5_1'];
        $final_rating_p2_t5_2 = $_POST['final_rating_p2_t5_2'];
        $remedial_class_mark_p2_t5_1 = $_POST['remedial_class_mark_p2_t5_1'];
        $remedial_class_mark_p2_t5_2 = $_POST['remedial_class_mark_p2_t5_2'];
        $recomputed_final_grade_p2_t5_1 = $_POST['recomputed_final_grade_p2_t5_1'];
        $recomputed_final_grade_p2_t5_2 = $_POST['recomputed_final_grade_p2_t5_2'];
        $remarks_p2_t5_1 = $_POST['remarks_p2_t5_1'];
        $remarks_p2_t5_2 = $_POST['remarks_p2_t5_2'];
        // Remedial Classes of Phase 2 Ends Here

        // Scholastic Records Phase 3 Starts Here
        $school_p3 = ucfirst($_POST['school_p3']);
        $sr_school_id_p3 = $_POST['sr_school_id_p3'];
        $district_p3 = $_POST['district_p3'];
        $division_p3 = $_POST['division_p3'];
        $region_p3 = $_POST['region_p3'];
        $classified_as_grade_p3 = $_POST['classified_as_grade_p3'];
        $section_p3 = $_POST['section_p3'];
        $school_year_p3 = $_POST['school_year_p3'];
        $name_of_adviser_p3 = ucfirst($_POST['name_of_adviser_p3']);
        // Scholastic Records Phase 3 Ends Here

        // Learning Areas Starts Here
        // 1st Quarter of Phase 3 Starts Here
        $mother_tounge_p3_t1 = $_POST['mother_tounge_p3_t1'];
        $filipino_p3_t1 = $_POST['filipino_p3_t1'];
        $english_p3_t1 = $_POST['english_p3_t1'];
        $math_p3_t1 = $_POST['math_p3_t1'];
        $araling_panlipunan_p3_t1 = $_POST['araling_panlipunan_p3_t1'];
        $epp_tle_p3_t1 = $_POST['epp_tle_p3_t1'];
        $mapeh_p3_t1 = $_POST['mapeh_p3_t1'];
        $music_p3_t1 = $_POST['music_p3_t1'];
        $arts_p3_t1 = $_POST['arts_p3_t1'];
        $p_e_p3_t1 = $_POST['p_e_p3_t1'];
        $health_p3_t1 = $_POST['health_p3_t1'];
        $esp_p3_t1 = $_POST['esp_p3_t1'];
        $arabic_language_p3_t1 = $_POST['arabic_language_p3_t1'];
        $islamic_values_p3_t1 = $_POST['islamic_values_p3_t1'];
        $general_average_p3_t1 = $_POST['general_average_p3_t1'];
        // 1st Quarter of Phase 3 Ends Here

        // 2nd Quarter of Phase 3 Starts Here
        $mother_tounge_p3_t2 = $_POST['mother_tounge_p3_t2'];
        $filipino_p3_t2 = $_POST['filipino_p3_t2'];
        $english_p3_t2 = $_POST['english_p3_t2'];
        $math_p3_t2 = $_POST['math_p3_t2'];
        $araling_panlipunan_p3_t2 = $_POST['araling_panlipunan_p3_t2'];
        $epp_tle_p3_t2 = $_POST['epp_tle_p3_t2'];
        $mapeh_p3_t2 = $_POST['mapeh_p3_t2'];
        $music_p3_t2 = $_POST['music_p3_t2'];
        $arts_p3_t2 = $_POST['arts_p3_t2'];
        $p_e_p3_t2 = $_POST['p_e_p3_t2'];
        $health_p3_t2 = $_POST['health_p3_t2'];
        $esp_p3_t2 = $_POST['esp_p3_t2'];
        $arabic_language_p3_t2 = $_POST['arabic_language_p3_t2'];
        $islamic_values_p3_t2 = $_POST['islamic_values_p3_t2'];
        $general_average_p3_t2 = $_POST['general_average_p3_t2'];
        // 2nd Quarter of Phase 3 Ends Here

        // 3rd Quarter of Phase 3 Starts Here
        $mother_tounge_p3_t3 = $_POST['mother_tounge_p3_t3'];
        $filipino_p3_t3 = $_POST['filipino_p3_t3'];
        $english_p3_t3 = $_POST['english_p3_t3'];
        $math_p3_t3 = $_POST['math_p3_t3'];
        $araling_panlipunan_p3_t3 = $_POST['araling_panlipunan_p3_t3'];
        $epp_tle_p3_t3 = $_POST['epp_tle_p3_t3'];
        $mapeh_p3_t3 = $_POST['mapeh_p3_t3'];
        $music_p3_t3 = $_POST['music_p3_t3'];
        $arts_p3_t3 = $_POST['arts_p3_t3'];
        $p_e_p3_t3 = $_POST['p_e_p3_t3'];
        $health_p3_t3 = $_POST['health_p3_t3'];
        $esp_p3_t3 = $_POST['esp_p3_t3'];
        $arabic_language_p3_t3 = $_POST['arabic_language_p3_t3'];
        $islamic_values_p3_t3 = $_POST['islamic_values_p3_t3'];
        $general_average_p3_t3 = $_POST['general_average_p3_t3'];
        // 3rd Quarter of Phase 3 Ends Here

        // 4th Quarter of Phase 3 Starts Here
        $mother_tounge_p3_t4 = $_POST['mother_tounge_p3_t4'];
        $filipino_p3_t4 = $_POST['filipino_p3_t4'];
        $english_p3_t4 = $_POST['english_p3_t4'];
        $math_p3_t4 = $_POST['math_p3_t4'];
        $araling_panlipunan_p3_t4 = $_POST['araling_panlipunan_p3_t4'];
        $epp_tle_p3_t4 = $_POST['epp_tle_p3_t4'];
        $mapeh_p3_t4 = $_POST['mapeh_p3_t4'];
        $music_p3_t4 = $_POST['music_p3_t4'];
        $arts_p3_t4 = $_POST['arts_p3_t4'];
        $p_e_p3_t4 = $_POST['p_e_p3_t4'];
        $health_p3_t4 = $_POST['health_p3_t4'];
        $esp_p3_t4 = $_POST['esp_p3_t4'];
        $arabic_language_p3_t4 = $_POST['arabic_language_p3_t4'];
        $islamic_values_p3_t4 = $_POST['islamic_values_p3_t4'];
        $general_average_p3_t4 = $_POST['general_average_p3_t4'];
        // 4th Quarter of Phase 3 Ends Here

        // Final Quarter of Phase 3 Starts Here
        $mother_tounge_p3_t5 = $_POST['mother_tounge_p3_t5'];
        $filipino_p3_t5 = $_POST['filipino_p3_t5'];
        $english_p3_t5 = $_POST['english_p3_t5'];
        $math_p3_t5 = $_POST['math_p3_t5'];
        $araling_panlipunan_p3_t5 = $_POST['araling_panlipunan_p3_t5'];
        $epp_tle_p3_t5 = $_POST['epp_tle_p3_t5'];
        $mapeh_p3_t5 = $_POST['mapeh_p3_t5'];
        $music_p3_t5 = $_POST['music_p3_t5'];
        $arts_p3_t5 = $_POST['arts_p3_t5'];
        $p_e_p3_t5 = $_POST['p_e_p3_t5'];
        $health_p3_t5 = $_POST['health_p3_t5'];
        $esp_p3_t5 = $_POST['esp_p3_t5'];
        $arabic_language_p3_t5 = $_POST['arabic_language_p3_t5'];
        $islamic_values_p3_t5 = $_POST['islamic_values_p3_t5'];
        $general_average_p3_t5 = $_POST['general_average_p3_t5'];
        // Final Quarter of Phase 3 Ends Here

        // Remedial Classes of Phase 3 Starts Here
        $date_from_p3 = $_POST['date_from_p3'];
        $date_to_p3 = $_POST['date_to_p3'];
        $learning_areas_p3_t5_1 = $_POST['learning_areas_p3_t5_1'];
        $learning_areas_p3_t5_2 = $_POST['learning_areas_p3_t5_2'];
        $final_rating_p3_t5_1 = $_POST['final_rating_p3_t5_1'];
        $final_rating_p3_t5_2 = $_POST['final_rating_p3_t5_2'];
        $remedial_class_mark_p3_t5_1 = $_POST['remedial_class_mark_p3_t5_1'];
        $remedial_class_mark_p3_t5_2 = $_POST['remedial_class_mark_p3_t5_2'];
        $recomputed_final_grade_p3_t5_1 = $_POST['recomputed_final_grade_p3_t5_1'];
        $recomputed_final_grade_p3_t5_2 = $_POST['recomputed_final_grade_p3_t5_2'];
        $remarks_p3_t5_1 = $_POST['remarks_p3_t5_1'];
        $remarks_p3_t5_2 = $_POST['remarks_p3_t5_2'];
        // Remedial Classes of Phase 3 Ends Here

        // Scholastic Records Phase 4 Starts Here
        $school_p4 = ucfirst($_POST['school_p4']);
        $sr_school_id_p4 = $_POST['sr_school_id_p4'];
        $district_p4 = $_POST['district_p4'];
        $division_p4 = $_POST['division_p4'];
        $region_p4 = $_POST['region_p4'];
        $classified_as_grade_p4 = $_POST['classified_as_grade_p4'];
        $section_p4 = $_POST['section_p4'];
        $school_year_p4 = $_POST['school_year_p4'];
        $name_of_adviser_p4 = ucfirst($_POST['name_of_adviser_p4']);
        // Scholastic Records Phase 4 Ends Here

        // Learning Areas Starts Here
        // 1st Quarter of Phase 4 Starts Here
        $mother_tounge_p4_t1 = $_POST['mother_tounge_p4_t1'];
        $filipino_p4_t1 = $_POST['filipino_p4_t1'];
        $english_p4_t1 = $_POST['english_p4_t1'];
        $math_p4_t1 = $_POST['math_p4_t1'];
        $araling_panlipunan_p4_t1 = $_POST['araling_panlipunan_p4_t1'];
        $epp_tle_p4_t1 = $_POST['epp_tle_p4_t1'];
        $mapeh_p4_t1 = $_POST['mapeh_p4_t1'];
        $music_p4_t1 = $_POST['music_p4_t1'];
        $arts_p4_t1 = $_POST['arts_p4_t1'];
        $p_e_p4_t1 = $_POST['p_e_p4_t1'];
        $health_p4_t1 = $_POST['health_p4_t1'];
        $esp_p4_t1 = $_POST['esp_p4_t1'];
        $arabic_language_p4_t1 = $_POST['arabic_language_p4_t1'];
        $islamic_values_p4_t1 = $_POST['islamic_values_p4_t1'];
        $general_average_p4_t1 = $_POST['general_average_p4_t1'];
        // 1st Quarter of Phase 4 Ends Here

        // 2nd Quarter of Phase 4 Starts Here
        $mother_tounge_p4_t2 = $_POST['mother_tounge_p4_t2'];
        $filipino_p4_t2 = $_POST['filipino_p4_t2'];
        $english_p4_t2 = $_POST['english_p4_t2'];
        $math_p4_t2 = $_POST['math_p4_t2'];
        $araling_panlipunan_p4_t2 = $_POST['araling_panlipunan_p4_t2'];
        $epp_tle_p4_t2 = $_POST['epp_tle_p4_t2'];
        $mapeh_p4_t2 = $_POST['mapeh_p4_t2'];
        $music_p4_t2 = $_POST['music_p4_t2'];
        $arts_p4_t2 = $_POST['arts_p4_t2'];
        $p_e_p4_t2 = $_POST['p_e_p4_t2'];
        $health_p4_t2 = $_POST['health_p4_t2'];
        $esp_p4_t2 = $_POST['esp_p4_t2'];
        $arabic_language_p4_t2 = $_POST['arabic_language_p4_t2'];
        $islamic_values_p4_t2 = $_POST['islamic_values_p4_t2'];
        $general_average_p4_t2 = $_POST['general_average_p4_t2'];
        // 2nd Quarter of Phase 4 Ends Here

        // 3rd Quarter of Phase 4 Starts Here
        $mother_tounge_p4_t3 = $_POST['mother_tounge_p4_t3'];
        $filipino_p4_t3 = $_POST['filipino_p4_t3'];
        $english_p4_t3 = $_POST['english_p4_t3'];
        $math_p4_t3 = $_POST['math_p4_t3'];
        $araling_panlipunan_p4_t3 = $_POST['araling_panlipunan_p4_t3'];
        $epp_tle_p4_t3 = $_POST['epp_tle_p4_t3'];
        $mapeh_p4_t3 = $_POST['mapeh_p4_t3'];
        $music_p4_t3 = $_POST['music_p4_t3'];
        $arts_p4_t3 = $_POST['arts_p4_t3'];
        $p_e_p4_t3 = $_POST['p_e_p4_t3'];
        $health_p4_t3 = $_POST['health_p4_t3'];
        $esp_p4_t3 = $_POST['esp_p4_t3'];
        $arabic_language_p4_t3 = $_POST['arabic_language_p4_t3'];
        $islamic_values_p4_t3 = $_POST['islamic_values_p4_t3'];
        $general_average_p4_t3 = $_POST['general_average_p4_t3'];
        // 3rd Quarter of Phase 4 Ends Here

        // 4th Quarter of Phase 4 Starts Here
        $mother_tounge_p4_t4 = $_POST['mother_tounge_p4_t4'];
        $filipino_p4_t4 = $_POST['filipino_p4_t4'];
        $english_p4_t4 = $_POST['english_p4_t4'];
        $math_p4_t4 = $_POST['math_p4_t4'];
        $araling_panlipunan_p4_t4 = $_POST['araling_panlipunan_p4_t4'];
        $epp_tle_p4_t4 = $_POST['epp_tle_p4_t4'];
        $mapeh_p4_t4 = $_POST['mapeh_p4_t4'];
        $music_p4_t4 = $_POST['music_p4_t4'];
        $arts_p4_t4 = $_POST['arts_p4_t4'];
        $p_e_p4_t4 = $_POST['p_e_p4_t4'];
        $health_p4_t4 = $_POST['health_p4_t4'];
        $esp_p4_t4 = $_POST['esp_p4_t4'];
        $arabic_language_p4_t4 = $_POST['arabic_language_p4_t4'];
        $islamic_values_p4_t4 = $_POST['islamic_values_p4_t4'];
        $general_average_p4_t4 = $_POST['general_average_p4_t4'];
        // 4th Quarter of Phase 4 Ends Here

        // Final Quarter of Phase 4 Starts Here
        $mother_tounge_p4_t5 = $_POST['mother_tounge_p4_t5'];
        $filipino_p4_t5 = $_POST['filipino_p4_t5'];
        $english_p4_t5 = $_POST['english_p4_t5'];
        $math_p4_t5 = $_POST['math_p4_t5'];
        $araling_panlipunan_p4_t5 = $_POST['araling_panlipunan_p4_t5'];
        $epp_tle_p4_t5 = $_POST['epp_tle_p4_t5'];
        $mapeh_p4_t5 = $_POST['mapeh_p4_t5'];
        $music_p4_t5 = $_POST['music_p4_t5'];
        $arts_p4_t5 = $_POST['arts_p4_t5'];
        $p_e_p4_t5 = $_POST['p_e_p4_t5'];
        $health_p4_t5 = $_POST['health_p4_t5'];
        $esp_p4_t5 = $_POST['esp_p4_t5'];
        $arabic_language_p4_t5 = $_POST['arabic_language_p4_t5'];
        $islamic_values_p4_t5 = $_POST['islamic_values_p4_t5'];
        $general_average_p4_t5 = $_POST['general_average_p4_t5'];
        // Final Quarter of Phase 4 Ends Here

        // Remedial Classes of Phase 4 Starts Here
        $date_from_p4 = $_POST['date_from_p4'];
        $date_to_p4 = $_POST['date_to_p4'];
        $learning_areas_p4_t5_1 = $_POST['learning_areas_p4_t5_1'];
        $learning_areas_p4_t5_2 = $_POST['learning_areas_p4_t5_2'];
        $final_rating_p4_t5_1 = $_POST['final_rating_p4_t5_1'];
        $final_rating_p4_t5_2 = $_POST['final_rating_p4_t5_2'];
        $remedial_class_mark_p4_t5_1 = $_POST['remedial_class_mark_p4_t5_1'];
        $remedial_class_mark_p4_t5_2 = $_POST['remedial_class_mark_p4_t5_2'];
        $recomputed_final_grade_p4_t5_1 = $_POST['recomputed_final_grade_p4_t5_1'];
        $recomputed_final_grade_p4_t5_2 = $_POST['recomputed_final_grade_p4_t5_2'];
        $remarks_p4_t5_1 = $_POST['remarks_p4_t5_1'];
        $remarks_p4_t5_2 = $_POST['remarks_p4_t5_2'];
        // Remedial Classes of Phase 4 Ends Here

        // Scholastic Records Phase 5 Starts Here
        $school_p5 = ucfirst($_POST['school_p5']);
        $sr_school_id_p5 = $_POST['sr_school_id_p5'];
        $district_p5 = $_POST['district_p5'];
        $division_p5 = $_POST['division_p5'];
        $region_p5 = $_POST['region_p5'];
        $classified_as_grade_p5 = $_POST['classified_as_grade_p5'];
        $section_p5 = $_POST['section_p5'];
        $school_year_p5 = $_POST['school_year_p5'];
        $name_of_adviser_p5 = ucfirst($_POST['name_of_adviser_p5']);
        // Scholastic Records Phase 5 Ends Here

        // Learning Areas Starts Here
        // 1st Quarter of Phase 5 Starts Here
        $mother_tounge_p5_t1 = $_POST['mother_tounge_p5_t1'];
        $filipino_p5_t1 = $_POST['filipino_p5_t1'];
        $english_p5_t1 = $_POST['english_p5_t1'];
        $math_p5_t1 = $_POST['math_p5_t1'];
        $araling_panlipunan_p5_t1 = $_POST['araling_panlipunan_p5_t1'];
        $epp_tle_p5_t1 = $_POST['epp_tle_p5_t1'];
        $mapeh_p5_t1 = $_POST['mapeh_p5_t1'];
        $music_p5_t1 = $_POST['music_p5_t1'];
        $arts_p5_t1 = $_POST['arts_p5_t1'];
        $p_e_p5_t1 = $_POST['p_e_p5_t1'];
        $health_p5_t1 = $_POST['health_p5_t1'];
        $esp_p5_t1 = $_POST['esp_p5_t1'];
        $arabic_language_p5_t1 = $_POST['arabic_language_p5_t1'];
        $islamic_values_p5_t1 = $_POST['islamic_values_p5_t1'];
        $general_average_p5_t1 = $_POST['general_average_p5_t1'];
        // 1st Quarter of Phase 5 Ends Here

        // 2nd Quarter of Phase 5 Starts Here
        $mother_tounge_p5_t2 = $_POST['mother_tounge_p5_t2'];
        $filipino_p5_t2 = $_POST['filipino_p5_t2'];
        $english_p5_t2 = $_POST['english_p5_t2'];
        $math_p5_t2 = $_POST['math_p5_t2'];
        $araling_panlipunan_p5_t2 = $_POST['araling_panlipunan_p5_t2'];
        $epp_tle_p5_t2 = $_POST['epp_tle_p5_t2'];
        $mapeh_p5_t2 = $_POST['mapeh_p5_t2'];
        $music_p5_t2 = $_POST['music_p5_t2'];
        $arts_p5_t2 = $_POST['arts_p5_t2'];
        $p_e_p5_t2 = $_POST['p_e_p5_t2'];
        $health_p5_t2 = $_POST['health_p5_t2'];
        $esp_p5_t2 = $_POST['esp_p5_t2'];
        $arabic_language_p5_t2 = $_POST['arabic_language_p5_t2'];
        $islamic_values_p5_t2 = $_POST['islamic_values_p5_t2'];
        $general_average_p5_t2 = $_POST['general_average_p5_t2'];
        // 2nd Quarter of Phase 5 Ends Here

        // 3rd Quarter of Phase 5 Starts Here
        $mother_tounge_p5_t3 = $_POST['mother_tounge_p5_t3'];
        $filipino_p5_t3 = $_POST['filipino_p5_t3'];
        $english_p5_t3 = $_POST['english_p5_t3'];
        $math_p5_t3 = $_POST['math_p5_t3'];
        $araling_panlipunan_p5_t3 = $_POST['araling_panlipunan_p5_t3'];
        $epp_tle_p5_t3 = $_POST['epp_tle_p5_t3'];
        $mapeh_p5_t3 = $_POST['mapeh_p5_t3'];
        $music_p5_t3 = $_POST['music_p5_t3'];
        $arts_p5_t3 = $_POST['arts_p5_t3'];
        $p_e_p5_t3 = $_POST['p_e_p5_t3'];
        $health_p5_t3 = $_POST['health_p5_t3'];
        $esp_p5_t3 = $_POST['esp_p5_t3'];
        $arabic_language_p5_t3 = $_POST['arabic_language_p5_t3'];
        $islamic_values_p5_t3 = $_POST['islamic_values_p5_t3'];
        $general_average_p5_t3 = $_POST['general_average_p5_t3'];
        // 3rd Quarter of Phase 5 Ends Here

        // 4th Quarter of Phase 5 Starts Here
        $mother_tounge_p5_t4 = $_POST['mother_tounge_p5_t4'];
        $filipino_p5_t4 = $_POST['filipino_p5_t4'];
        $english_p5_t4 = $_POST['english_p5_t4'];
        $math_p5_t4 = $_POST['math_p5_t4'];
        $araling_panlipunan_p5_t4 = $_POST['araling_panlipunan_p5_t4'];
        $epp_tle_p5_t4 = $_POST['epp_tle_p5_t4'];
        $mapeh_p5_t4 = $_POST['mapeh_p5_t4'];
        $music_p5_t4 = $_POST['music_p5_t4'];
        $arts_p5_t4 = $_POST['arts_p5_t4'];
        $p_e_p5_t4 = $_POST['p_e_p5_t4'];
        $health_p5_t4 = $_POST['health_p5_t4'];
        $esp_p5_t4 = $_POST['esp_p5_t4'];
        $arabic_language_p5_t4 = $_POST['arabic_language_p5_t4'];
        $islamic_values_p5_t4 = $_POST['islamic_values_p5_t4'];
        $general_average_p5_t4 = $_POST['general_average_p5_t4'];
        // 4th Quarter of Phase 5 Ends Here

        // Final Quarter of Phase 5 Starts Here
        $mother_tounge_p5_t5 = $_POST['mother_tounge_p5_t5'];
        $filipino_p5_t5 = $_POST['filipino_p5_t5'];
        $english_p5_t5 = $_POST['english_p5_t5'];
        $math_p5_t5 = $_POST['math_p5_t5'];
        $araling_panlipunan_p5_t5 = $_POST['araling_panlipunan_p5_t5'];
        $epp_tle_p5_t5 = $_POST['epp_tle_p5_t5'];
        $mapeh_p5_t5 = $_POST['mapeh_p5_t5'];
        $music_p5_t5 = $_POST['music_p5_t5'];
        $arts_p5_t5 = $_POST['arts_p5_t5'];
        $p_e_p5_t5 = $_POST['p_e_p5_t5'];
        $health_p5_t5 = $_POST['health_p5_t5'];
        $esp_p5_t5 = $_POST['esp_p5_t5'];
        $arabic_language_p5_t5 = $_POST['arabic_language_p5_t5'];
        $islamic_values_p5_t5 = $_POST['islamic_values_p5_t5'];
        $general_average_p5_t5 = $_POST['general_average_p5_t5'];
        // Final Quarter of Phase 5 Ends Here

        // Remedial Classes of Phase 5 Starts Here
        $date_from_p5 = $_POST['date_from_p5'];
        $date_to_p5 = $_POST['date_to_p5'];
        $learning_areas_p5_t5_1 = $_POST['learning_areas_p5_t5_1'];
        $learning_areas_p5_t5_2 = $_POST['learning_areas_p5_t5_2'];
        $final_rating_p5_t5_1 = $_POST['final_rating_p5_t5_1'];
        $final_rating_p5_t5_2 = $_POST['final_rating_p5_t5_2'];
        $remedial_class_mark_p5_t5_1 = $_POST['remedial_class_mark_p5_t5_1'];
        $remedial_class_mark_p5_t5_2 = $_POST['remedial_class_mark_p5_t5_2'];
        $recomputed_final_grade_p5_t5_1 = $_POST['recomputed_final_grade_p5_t5_1'];
        $recomputed_final_grade_p5_t5_2 = $_POST['recomputed_final_grade_p5_t5_2'];
        $remarks_p5_t5_1 = $_POST['remarks_p5_t5_1'];
        $remarks_p5_t5_2 = $_POST['remarks_p5_t5_2'];
        // Remedial Classes of Phase 5 Ends Here

        // Scholastic Records Phase 6 Starts Here
        $school_p6 = ucfirst($_POST['school_p6']);
        $sr_school_id_p6 = $_POST['sr_school_id_p6'];
        $district_p6 = $_POST['district_p6'];
        $division_p6 = $_POST['division_p6'];
        $region_p6 = $_POST['region_p6'];
        $classified_as_grade_p6 = $_POST['classified_as_grade_p6'];
        $section_p6 = $_POST['section_p6'];
        $school_year_p6 = $_POST['school_year_p6'];
        $name_of_adviser_p6 = ucfirst($_POST['name_of_adviser_p6']);
        // Scholastic Records Phase 6 Ends Here

        // Learning Areas Starts Here
        // 1st Quarter of Phase 6 Starts Here
        $mother_tounge_p6_t1 = $_POST['mother_tounge_p6_t1'];
        $filipino_p6_t1 = $_POST['filipino_p6_t1'];
        $english_p6_t1 = $_POST['english_p6_t1'];
        $math_p6_t1 = $_POST['math_p6_t1'];
        $araling_panlipunan_p6_t1 = $_POST['araling_panlipunan_p6_t1'];
        $epp_tle_p6_t1 = $_POST['epp_tle_p6_t1'];
        $mapeh_p6_t1 = $_POST['mapeh_p6_t1'];
        $music_p6_t1 = $_POST['music_p6_t1'];
        $arts_p6_t1 = $_POST['arts_p6_t1'];
        $p_e_p6_t1 = $_POST['p_e_p6_t1'];
        $health_p6_t1 = $_POST['health_p6_t1'];
        $esp_p6_t1 = $_POST['esp_p6_t1'];
        $arabic_language_p6_t1 = $_POST['arabic_language_p6_t1'];
        $islamic_values_p6_t1 = $_POST['islamic_values_p6_t1'];
        $general_average_p6_t1 = $_POST['general_average_p6_t1'];
        // 1st Quarter of Phase 6 Ends Here

        // 2nd Quarter of Phase 6 Starts Here
        $mother_tounge_p6_t2 = $_POST['mother_tounge_p6_t2'];
        $filipino_p6_t2 = $_POST['filipino_p6_t2'];
        $english_p6_t2 = $_POST['english_p6_t2'];
        $math_p6_t2 = $_POST['math_p6_t2'];
        $araling_panlipunan_p6_t2 = $_POST['araling_panlipunan_p6_t2'];
        $epp_tle_p6_t2 = $_POST['epp_tle_p6_t2'];
        $mapeh_p6_t2 = $_POST['mapeh_p6_t2'];
        $music_p6_t2 = $_POST['music_p6_t2'];
        $arts_p6_t2 = $_POST['arts_p6_t2'];
        $p_e_p6_t2 = $_POST['p_e_p6_t2'];
        $health_p6_t2 = $_POST['health_p6_t2'];
        $esp_p6_t2 = $_POST['esp_p6_t2'];
        $arabic_language_p6_t2 = $_POST['arabic_language_p6_t2'];
        $islamic_values_p6_t2 = $_POST['islamic_values_p6_t2'];
        $general_average_p6_t2 = $_POST['general_average_p6_t2'];
        // 2nd Quarter of Phase 6 Ends Here

        // 3rd Quarter of Phase 6 Starts Here
        $mother_tounge_p6_t3 = $_POST['mother_tounge_p6_t3'];
        $filipino_p6_t3 = $_POST['filipino_p6_t3'];
        $english_p6_t3 = $_POST['english_p6_t3'];
        $math_p6_t3 = $_POST['math_p6_t3'];
        $araling_panlipunan_p6_t3 = $_POST['araling_panlipunan_p6_t3'];
        $epp_tle_p6_t3 = $_POST['epp_tle_p6_t3'];
        $mapeh_p6_t3 = $_POST['mapeh_p6_t3'];
        $music_p6_t3 = $_POST['music_p6_t3'];
        $arts_p6_t3 = $_POST['arts_p6_t3'];
        $p_e_p6_t3 = $_POST['p_e_p6_t3'];
        $health_p6_t3 = $_POST['health_p6_t3'];
        $esp_p6_t3 = $_POST['esp_p6_t3'];
        $arabic_language_p6_t3 = $_POST['arabic_language_p6_t3'];
        $islamic_values_p6_t3 = $_POST['islamic_values_p6_t3'];
        $general_average_p6_t3 = $_POST['general_average_p6_t3'];
        // 3rd Quarter of Phase 6 Ends Here

        // 4th Quarter of Phase 6 Starts Here
        $mother_tounge_p6_t4 = $_POST['mother_tounge_p6_t4'];
        $filipino_p6_t4 = $_POST['filipino_p6_t4'];
        $english_p6_t4 = $_POST['english_p6_t4'];
        $math_p6_t4 = $_POST['math_p6_t4'];
        $araling_panlipunan_p6_t4 = $_POST['araling_panlipunan_p6_t4'];
        $epp_tle_p6_t4 = $_POST['epp_tle_p6_t4'];
        $mapeh_p6_t4 = $_POST['mapeh_p6_t4'];
        $music_p6_t4 = $_POST['music_p6_t4'];
        $arts_p6_t4 = $_POST['arts_p6_t4'];
        $p_e_p6_t4 = $_POST['p_e_p6_t4'];
        $health_p6_t4 = $_POST['health_p6_t4'];
        $esp_p6_t4 = $_POST['esp_p6_t4'];
        $arabic_language_p6_t4 = $_POST['arabic_language_p6_t4'];
        $islamic_values_p6_t4 = $_POST['islamic_values_p6_t4'];
        $general_average_p6_t4 = $_POST['general_average_p6_t4'];
        // 4th Quarter of Phase 6 Ends Here

        // Final Quarter of Phase 6 Starts Here
        $mother_tounge_p6_t5 = $_POST['mother_tounge_p6_t5'];
        $filipino_p6_t5 = $_POST['filipino_p6_t5'];
        $english_p6_t5 = $_POST['english_p6_t5'];
        $math_p6_t5 = $_POST['math_p6_t5'];
        $araling_panlipunan_p6_t5 = $_POST['araling_panlipunan_p6_t5'];
        $epp_tle_p6_t5 = $_POST['epp_tle_p6_t5'];
        $mapeh_p6_t5 = $_POST['mapeh_p6_t5'];
        $music_p6_t5 = $_POST['music_p6_t5'];
        $arts_p6_t5 = $_POST['arts_p6_t5'];
        $p_e_p6_t5 = $_POST['p_e_p6_t5'];
        $health_p6_t5 = $_POST['health_p6_t5'];
        $esp_p6_t5 = $_POST['esp_p6_t5'];
        $arabic_language_p6_t5 = $_POST['arabic_language_p6_t5'];
        $islamic_values_p6_t5 = $_POST['islamic_values_p6_t5'];
        $general_average_p6_t5 = $_POST['general_average_p6_t5'];
        // Final Quarter of Phase 6 Ends Here

        // Remedial Classes of Phase 6 Starts Here
        $date_from_p6 = $_POST['date_from_p6'];
        $date_to_p6 = $_POST['date_to_p6'];
        $learning_areas_p6_t5_1 = $_POST['learning_areas_p6_t5_1'];
        $learning_areas_p6_t5_2 = $_POST['learning_areas_p6_t5_2'];
        $final_rating_p6_t5_1 = $_POST['final_rating_p6_t5_1'];
        $final_rating_p6_t5_2 = $_POST['final_rating_p6_t5_2'];
        $remedial_class_mark_p6_t5_1 = $_POST['remedial_class_mark_p6_t5_1'];
        $remedial_class_mark_p6_t5_2 = $_POST['remedial_class_mark_p6_t5_2'];
        $recomputed_final_grade_p6_t5_1 = $_POST['recomputed_final_grade_p6_t5_1'];
        $recomputed_final_grade_p6_t5_2 = $_POST['recomputed_final_grade_p6_t5_2'];
        $remarks_p6_t5_1 = $_POST['remarks_p6_t5_1'];
        $remarks_p6_t5_2 = $_POST['remarks_p6_t5_2'];
        // Remedial Classes of Phase 6 Ends Here

        // Scholastic Records Phase 7 Starts Here
        $school_p7 = ucfirst($_POST['school_p7']);
        $sr_school_id_p7 = $_POST['sr_school_id_p7'];
        $district_p7 = $_POST['district_p7'];
        $division_p7 = $_POST['division_p7'];
        $region_p7 = $_POST['region_p7'];
        $classified_as_grade_p7 = $_POST['classified_as_grade_p7'];
        $section_p7 = $_POST['section_p7'];
        $school_year_p7 = $_POST['school_year_p7'];
        $name_of_adviser_p7 = ucfirst($_POST['name_of_adviser_p7']);
        // Scholastic Records Phase 7 Ends Here

        // Learning Areas Starts Here
        // 1st Quarter of Phase 7 Starts Here
        $mother_tounge_p7_t1 = $_POST['mother_tounge_p7_t1'];
        $filipino_p7_t1 = $_POST['filipino_p7_t1'];
        $english_p7_t1 = $_POST['english_p7_t1'];
        $math_p7_t1 = $_POST['math_p7_t1'];
        $araling_panlipunan_p7_t1 = $_POST['araling_panlipunan_p7_t1'];
        $epp_tle_p7_t1 = $_POST['epp_tle_p7_t1'];
        $mapeh_p7_t1 = $_POST['mapeh_p7_t1'];
        $music_p7_t1 = $_POST['music_p7_t1'];
        $arts_p7_t1 = $_POST['arts_p7_t1'];
        $p_e_p7_t1 = $_POST['p_e_p7_t1'];
        $health_p7_t1 = $_POST['health_p7_t1'];
        $esp_p7_t1 = $_POST['esp_p7_t1'];
        $arabic_language_p7_t1 = $_POST['arabic_language_p7_t1'];
        $islamic_values_p7_t1 = $_POST['islamic_values_p7_t1'];
        $general_average_p7_t1 = $_POST['general_average_p7_t1'];
        // 1st Quarter of Phase 7 Ends Here

        // 2nd Quarter of Phase 7 Starts Here
        $mother_tounge_p7_t2 = $_POST['mother_tounge_p7_t2'];
        $filipino_p7_t2 = $_POST['filipino_p7_t2'];
        $english_p7_t2 = $_POST['english_p7_t2'];
        $math_p7_t2 = $_POST['math_p7_t2'];
        $araling_panlipunan_p7_t2 = $_POST['araling_panlipunan_p7_t2'];
        $epp_tle_p7_t2 = $_POST['epp_tle_p7_t2'];
        $mapeh_p7_t2 = $_POST['mapeh_p7_t2'];
        $music_p7_t2 = $_POST['music_p7_t2'];
        $arts_p7_t2 = $_POST['arts_p7_t2'];
        $p_e_p7_t2 = $_POST['p_e_p7_t2'];
        $health_p7_t2 = $_POST['health_p7_t2'];
        $esp_p7_t2 = $_POST['esp_p7_t2'];
        $arabic_language_p7_t2 = $_POST['arabic_language_p7_t2'];
        $islamic_values_p7_t2 = $_POST['islamic_values_p7_t2'];
        $general_average_p7_t2 = $_POST['general_average_p7_t2'];
        // 2nd Quarter of Phase 7 Ends Here

        // 3rd Quarter of Phase 7 Starts Here
        $mother_tounge_p7_t3 = $_POST['mother_tounge_p7_t3'];
        $filipino_p7_t3 = $_POST['filipino_p7_t3'];
        $english_p7_t3 = $_POST['english_p7_t3'];
        $math_p7_t3 = $_POST['math_p7_t3'];
        $araling_panlipunan_p7_t3 = $_POST['araling_panlipunan_p7_t3'];
        $epp_tle_p7_t3 = $_POST['epp_tle_p7_t3'];
        $mapeh_p7_t3 = $_POST['mapeh_p7_t3'];
        $music_p7_t3 = $_POST['music_p7_t3'];
        $arts_p7_t3 = $_POST['arts_p7_t3'];
        $p_e_p7_t3 = $_POST['p_e_p7_t3'];
        $health_p7_t3 = $_POST['health_p7_t3'];
        $esp_p7_t3 = $_POST['esp_p7_t3'];
        $arabic_language_p7_t3 = $_POST['arabic_language_p7_t3'];
        $islamic_values_p7_t3 = $_POST['islamic_values_p7_t3'];
        $general_average_p7_t3 = $_POST['general_average_p7_t3'];
        // 3rd Quarter of Phase 7 Ends Here

        // 4th Quarter of Phase 7 Starts Here
        $mother_tounge_p7_t4 = $_POST['mother_tounge_p7_t4'];
        $filipino_p7_t4 = $_POST['filipino_p7_t4'];
        $english_p7_t4 = $_POST['english_p7_t4'];
        $math_p7_t4 = $_POST['math_p7_t4'];
        $araling_panlipunan_p7_t4 = $_POST['araling_panlipunan_p7_t4'];
        $epp_tle_p7_t4 = $_POST['epp_tle_p7_t4'];
        $mapeh_p7_t4 = $_POST['mapeh_p7_t4'];
        $music_p7_t4 = $_POST['music_p7_t4'];
        $arts_p7_t4 = $_POST['arts_p7_t4'];
        $p_e_p7_t4 = $_POST['p_e_p7_t4'];
        $health_p7_t4 = $_POST['health_p7_t4'];
        $esp_p7_t4 = $_POST['esp_p7_t4'];
        $arabic_language_p7_t4 = $_POST['arabic_language_p7_t4'];
        $islamic_values_p7_t4 = $_POST['islamic_values_p7_t4'];
        $general_average_p7_t4 = $_POST['general_average_p7_t4'];
        // 4th Quarter of Phase 7 Ends Here

        // Final Quarter of Phase 7 Starts Here
        $mother_tounge_p7_t5 = $_POST['mother_tounge_p7_t5'];
        $filipino_p7_t5 = $_POST['filipino_p7_t5'];
        $english_p7_t5 = $_POST['english_p7_t5'];
        $math_p7_t5 = $_POST['math_p7_t5'];
        $araling_panlipunan_p7_t5 = $_POST['araling_panlipunan_p7_t5'];
        $epp_tle_p7_t5 = $_POST['epp_tle_p7_t5'];
        $mapeh_p7_t5 = $_POST['mapeh_p7_t5'];
        $music_p7_t5 = $_POST['music_p7_t5'];
        $arts_p7_t5 = $_POST['arts_p7_t5'];
        $p_e_p7_t5 = $_POST['p_e_p7_t5'];
        $health_p7_t5 = $_POST['health_p7_t5'];
        $esp_p7_t5 = $_POST['esp_p7_t5'];
        $arabic_language_p7_t5 = $_POST['arabic_language_p7_t5'];
        $islamic_values_p7_t5 = $_POST['islamic_values_p7_t5'];
        $general_average_p7_t5 = $_POST['general_average_p7_t5'];
        // Final Quarter of Phase 7 Ends Here

        // Remedial Classes of Phase 7 Starts Here
        $date_from_p7 = $_POST['date_from_p7'];
        $date_to_p7 = $_POST['date_to_p7'];
        $learning_areas_p7_t5_1 = $_POST['learning_areas_p7_t5_1'];
        $learning_areas_p7_t5_2 = $_POST['learning_areas_p7_t5_2'];
        $final_rating_p7_t5_1 = $_POST['final_rating_p7_t5_1'];
        $final_rating_p7_t5_2 = $_POST['final_rating_p7_t5_2'];
        $remedial_class_mark_p7_t5_1 = $_POST['remedial_class_mark_p7_t5_1'];
        $remedial_class_mark_p7_t5_2 = $_POST['remedial_class_mark_p7_t5_2'];
        $recomputed_final_grade_p7_t5_1 = $_POST['recomputed_final_grade_p7_t5_1'];
        $recomputed_final_grade_p7_t5_2 = $_POST['recomputed_final_grade_p7_t5_2'];
        $remarks_p7_t5_1 = $_POST['remarks_p7_t5_1'];
        $remarks_p7_t5_2 = $_POST['remarks_p7_t5_2'];
        // Remedial Classes of Phase 7 Ends Here

        // Scholastic Records Phase 8 Starts Here
        $school_p8 = ucfirst($_POST['school_p8']);
        $sr_school_id_p8 = $_POST['sr_school_id_p8'];
        $district_p8 = $_POST['district_p8'];
        $division_p8 = $_POST['division_p8'];
        $region_p8 = $_POST['region_p8'];
        $classified_as_grade_p8 = $_POST['classified_as_grade_p8'];
        $section_p8 = $_POST['section_p8'];
        $school_year_p8 = $_POST['school_year_p8'];
        $name_of_adviser_p8 = ucfirst($_POST['name_of_adviser_p8']);
        // Scholastic Records Phase 8 Ends Here

        // Learning Areas Starts Here
        // 1st Quarter of Phase 8 Starts Here
        $mother_tounge_p8_t1 = $_POST['mother_tounge_p8_t1'];
        $filipino_p8_t1 = $_POST['filipino_p8_t1'];
        $english_p8_t1 = $_POST['english_p8_t1'];
        $math_p8_t1 = $_POST['math_p8_t1'];
        $araling_panlipunan_p8_t1 = $_POST['araling_panlipunan_p8_t1'];
        $epp_tle_p8_t1 = $_POST['epp_tle_p8_t1'];
        $mapeh_p8_t1 = $_POST['mapeh_p8_t1'];
        $music_p8_t1 = $_POST['music_p8_t1'];
        $arts_p8_t1 = $_POST['arts_p8_t1'];
        $p_e_p8_t1 = $_POST['p_e_p8_t1'];
        $health_p8_t1 = $_POST['health_p8_t1'];
        $esp_p8_t1 = $_POST['esp_p8_t1'];
        $arabic_language_p8_t1 = $_POST['arabic_language_p8_t1'];
        $islamic_values_p8_t1 = $_POST['islamic_values_p8_t1'];
        $general_average_p8_t1 = $_POST['general_average_p8_t1'];
        // 1st Quarter of Phase 8 Ends Here

        // 2nd Quarter of Phase 8 Starts Here
        $mother_tounge_p8_t2 = $_POST['mother_tounge_p8_t2'];
        $filipino_p8_t2 = $_POST['filipino_p8_t2'];
        $english_p8_t2 = $_POST['english_p8_t2'];
        $math_p8_t2 = $_POST['math_p8_t2'];
        $araling_panlipunan_p8_t2 = $_POST['araling_panlipunan_p8_t2'];
        $epp_tle_p8_t2 = $_POST['epp_tle_p8_t2'];
        $mapeh_p8_t2 = $_POST['mapeh_p8_t2'];
        $music_p8_t2 = $_POST['music_p8_t2'];
        $arts_p8_t2 = $_POST['arts_p8_t2'];
        $p_e_p8_t2 = $_POST['p_e_p8_t2'];
        $health_p8_t2 = $_POST['health_p8_t2'];
        $esp_p8_t2 = $_POST['esp_p8_t2'];
        $arabic_language_p8_t2 = $_POST['arabic_language_p8_t2'];
        $islamic_values_p8_t2 = $_POST['islamic_values_p8_t2'];
        $general_average_p8_t2 = $_POST['general_average_p8_t2'];
        // 2nd Quarter of Phase 8 Ends Here

        // 3rd Quarter of Phase 8 Starts Here
        $mother_tounge_p8_t3 = $_POST['mother_tounge_p8_t3'];
        $filipino_p8_t3 = $_POST['filipino_p8_t3'];
        $english_p8_t3 = $_POST['english_p8_t3'];
        $math_p8_t3 = $_POST['math_p8_t3'];
        $araling_panlipunan_p8_t3 = $_POST['araling_panlipunan_p8_t3'];
        $epp_tle_p8_t3 = $_POST['epp_tle_p8_t3'];
        $mapeh_p8_t3 = $_POST['mapeh_p8_t3'];
        $music_p8_t3 = $_POST['music_p8_t3'];
        $arts_p8_t3 = $_POST['arts_p8_t3'];
        $p_e_p8_t3 = $_POST['p_e_p8_t3'];
        $health_p8_t3 = $_POST['health_p8_t3'];
        $esp_p8_t3 = $_POST['esp_p8_t3'];
        $arabic_language_p8_t3 = $_POST['arabic_language_p8_t3'];
        $islamic_values_p8_t3 = $_POST['islamic_values_p8_t3'];
        $general_average_p8_t3 = $_POST['general_average_p8_t3'];
        // 3rd Quarter of Phase 8 Ends Here

        // 4th Quarter of Phase 8 Starts Here
        $mother_tounge_p8_t4 = $_POST['mother_tounge_p8_t4'];
        $filipino_p8_t4 = $_POST['filipino_p8_t4'];
        $english_p8_t4 = $_POST['english_p8_t4'];
        $math_p8_t4 = $_POST['math_p8_t4'];
        $araling_panlipunan_p8_t4 = $_POST['araling_panlipunan_p8_t4'];
        $epp_tle_p8_t4 = $_POST['epp_tle_p8_t4'];
        $mapeh_p8_t4 = $_POST['mapeh_p8_t4'];
        $music_p8_t4 = $_POST['music_p8_t4'];
        $arts_p8_t4 = $_POST['arts_p8_t4'];
        $p_e_p8_t4 = $_POST['p_e_p8_t4'];
        $health_p8_t4 = $_POST['health_p8_t4'];
        $esp_p8_t4 = $_POST['esp_p8_t4'];
        $arabic_language_p8_t4 = $_POST['arabic_language_p8_t4'];
        $islamic_values_p8_t4 = $_POST['islamic_values_p8_t4'];
        $general_average_p8_t4 = $_POST['general_average_p8_t4'];
        // 4th Quarter of Phase 8 Ends Here

        // Final Quarter of Phase 8 Starts Here
        $mother_tounge_p8_t5 = $_POST['mother_tounge_p8_t5'];
        $filipino_p8_t5 = $_POST['filipino_p8_t5'];
        $english_p8_t5 = $_POST['english_p8_t5'];
        $math_p8_t5 = $_POST['math_p8_t5'];
        $araling_panlipunan_p8_t5 = $_POST['araling_panlipunan_p8_t5'];
        $epp_tle_p8_t5 = $_POST['epp_tle_p8_t5'];
        $mapeh_p8_t5 = $_POST['mapeh_p8_t5'];
        $music_p8_t5 = $_POST['music_p8_t5'];
        $arts_p8_t5 = $_POST['arts_p8_t5'];
        $p_e_p8_t5 = $_POST['p_e_p8_t5'];
        $health_p8_t5 = $_POST['health_p8_t5'];
        $esp_p8_t5 = $_POST['esp_p8_t5'];
        $arabic_language_p8_t5 = $_POST['arabic_language_p8_t5'];
        $islamic_values_p8_t5 = $_POST['islamic_values_p8_t5'];
        $general_average_p8_t5 = $_POST['general_average_p8_t5'];
        // Final Quarter of Phase 8 Ends Here

        // Remedial Classes of Phase 8 Starts Here
        $date_from_p8 = $_POST['date_from_p8'];
        $date_to_p8 = $_POST['date_to_p8'];
        $learning_areas_p8_t5_1 = $_POST['learning_areas_p8_t5_1'];
        $learning_areas_p8_t5_2 = $_POST['learning_areas_p8_t5_2'];
        $final_rating_p8_t5_1 = $_POST['final_rating_p8_t5_1'];
        $final_rating_p8_t5_2 = $_POST['final_rating_p8_t5_2'];
        $remedial_class_mark_p8_t5_1 = $_POST['remedial_class_mark_p8_t5_1'];
        $remedial_class_mark_p8_t5_2 = $_POST['remedial_class_mark_p8_t5_2'];
        $recomputed_final_grade_p8_t5_1 = $_POST['recomputed_final_grade_p8_t5_1'];
        $recomputed_final_grade_p8_t5_2 = $_POST['recomputed_final_grade_p8_t5_2'];
        $remarks_p8_t5_1 = $_POST['remarks_p8_t5_1'];
        $remarks_p8_t5_2 = $_POST['remarks_p8_t5_2'];
        // Remedial Classes of Phase 8 Ends Here



        // Updating Records of Student in Phase 1 Starts Here
    }


ob_flush();
?>