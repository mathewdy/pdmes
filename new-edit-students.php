<?php
ob_start();
session_start();
include('connection.php');


if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php' </script>";
}
?>
<?php
include 'includes/header.php';
?>
<link rel="stylesheet" href="src/css/edit-students.css">
<?php
include 'includes/topnav.php';
?>
<div class="container-xl p-2 bg-white">
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
    // echo $decrypted_lrn . '<br>';
    // inalis ko muna palatandaan mo lang naman to jd

    $sql = "SELECT * FROM learners_personal_infos
    LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn
    WHERE learners_personal_infos.lrn = '$decrypted_lrn'";
    $run = mysqli_query($conn,$sql);
    if(mysqli_num_rows($run) > 0){  
        $row = mysqli_fetch_array($run);
            ?>
            <div class="container-fluid p-0">
                <form id="editform" action="new-edit-students.php" method="POST">
                <fieldset>
                    <section class="form-top">
                            <img src="src/images/DepEd.png" width="120" height="120" alt="">
                            <span>
                                <p class="p-0 m-0">Republic of the Philippines</p>
                                <p class="p-0 m-0">Department of Education	</p> 
                                <h4 class="fw-bold">Learner's Permanent Academic Record for Elementary School</h4>
                                <h4 class="p-0 m-0">(SF10-ES)</h4>
                                <p class="p-0 m-0"><i>(Formerly Form 137)</i></p>
                            </span>
                            <img src="src/images/DepEd_2.png" width="150" height="100" alt="">
                    </section>
                    <h6 class="text-center py-1" style="background: #808080;">LEARNER'S  PERSONAL INFORMATION </h6>
                        <section class="line-1 pb-2">
                            <span class="hstack d-flex align-items-center">
                                    <label for="">LAST NAME:</label>
                                    <input type="text" style="width: 60%;" name="last_name" value="<?php echo $row['last_name']?>" required>    
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">FIRST NAME:</label>
                                <input type="text" style="width: 60%;" name="first_name" value="<?php echo $row['first_name']?>" required>   
                            </span>
                            <span class="hstack d-flex align-items-center" style="width:20%;">
                                <label for="">NAME EXTN. (Jr,I,II): </label>
                                <input type="text" name="suffix_name" style="width:20%;" value="<?php if(empty($row['suffix'])){ echo "";}else{ echo $row['suffix'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">MIDDLE NAME: </label>
                                <input type="text" style="width: 50%;" name="middle_name" value="<?php echo $row['middle_name']?>" required>                    
                            </span>
                        </section>
                        <section class="line-2">
                            <span class="hstack d-flex align-items-end w-75">
                                <label for="">Learner Reference Number (LRN):</label>
                                <input type="text" style="margin: 0 1em 0 0; width:30%;" name="lrn" value="<?php echo $row['lrn']?>" required>

                                <label for="">Birthdate (mm/dd/yyyy):</label>
                                <input type="date" style="width:100%:" name="birthday" value="<?php echo strftime('%Y-%m-%d', strtotime($row['birth_date']));?>" required>  
                            </span>
                            <span class="hstack d-flex align-items-center w-25">
                            <label for="">Sex:</label>
                                    <select class="form-select-sm w-100" name="sex" id="" required>
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
                            </span>
                        </section>
                    <h6 class="text-center px-0 py-1" style="background:#c0c0c0;">ELIGIBILITY FOR ELEMENTARY SCHOOL ENROLLMENT</h6>
                    <div class="credentials-row">
                        <span class="hstack d-flex align-items-center">
                            <label for=""><i>Credential Presented for Grade 1</i></label>
                            <input type="text" name="credential_presented" value="<?php echo $row['credential_presented']?>" required>
                        </span>
                        <section class="cred-info">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of School:</label>
                                <input type="text" name="name_of_school" value="<?php echo $row['name_of_school']?>" required>
                            </span>
                            <span class="hstack d-flex align-items-center justify-content-start">
                                <label for="">School ID:</label>
                                <input type="text" name="school_id" value="<?php echo $row['efese_school_id']?>" required>
                            </span>
                            <span class="hstack d-flex align-items-center">
                            <label for="">Address of School:</label>
                            <input type="text" name="address_of_school" value="<?php echo $row['address_of_school']?>" required>
                            </span>
                        </section>
                    </div>
                    <div class="other-cred">
                        <p>Other Credential Presented</p>
                        <span class="wrapper w-100">
                            <span class="PEPT px-2 w-10 d-flex align-items-center justify-content-center">
                                PEPT Passer 
                            </span>
                            <label for="">Rating:</label>
                            <input type="text" style="width:5%;  margin:0 12px 0 0;" required>
                            
                            <label for="">Date of Examination/Assessment (dd/mm/yyyy):</label>
                            <input type="date" name="" id=""> 
                            
                            <label for="">Others (Pls. Specify):</label>
                            <input type="text" style="width:20%;" name="" id="">

                        </span>
                        <section class="last-cred px-3 row">
                            <span class="col-8 hstack d-flex align-items-center">
                                <label for="">Name and Address of Testing Center:</label>
                                <input type="text" style="width:65%;" name=""  id="">
                            </span>
                            <span class="col-4 hstack d-flex align-items-end">
                                <label for="">Remark:</label>
                                <input type="text"  name="" id="">
                            </span>
                        </section>
                    </div>
                    <?php
            }
                    ?>
            <h6 class="py-1 px-0 text-center my-2" style="background: #808080;">SCHOLASTIC RECORD</h6>
            <div class="container-fluid mt-0 p-0">
                <div class="row gx-2 gy-lg-3">
                <div class="col-lg-6"> 
                    <!-- phase 1 -->
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
                    <section class="grade-header">
                        <section class="first-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">School: </label>
                                <input type="text" name="school_p1" 
                                value="<?php if(empty($term1['school'])){ 
                                    echo "";} else { echo $term1['school'];}?>"> 
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">School ID:</label>
                                <input type="text" style="width: 70%;" name="sr_school_id_p1" 
                                value="<?php if(empty($term1['sr_school_id'])){ 
                                    echo "";} else { echo $term1['sr_school_id'];}?>">
                            </span>
                        </section>
                        <section class="second-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">District:</label>
                                <input type="text" name="district_p1" 
                                value="<?php if(empty($term1['district'])){ 
                                    echo "";} else { echo $term1['district'];}?>">
                            </span>
                            <span class="hstack d-flex  align-items-center">
                                <label for="">Division:</label>
                                <input type="text" name="division_p1" 
                                value="<?php if(empty($term1['division'])){ 
                                    echo "";} else { echo $term1['division'];}?>">
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">Region:</label>
                                <input type="text" name="region_p1" 
                                value="<?php if(empty($term1['region'])){ 
                                    echo "";} else { echo $term1['region'];}?>">
                            </span>
                        </section>
                        <section class="third-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Classified as Grade: </label>
                                <input type="text" style="width: 30%;"  name="classified_as_grade_p1" 
                                value="<?php if(empty($term1['classified_as_grade'])){ 
                                    echo "";} else { echo $term1['classified_as_grade'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Section: </label>
                                <input type="text" name="section_p1" 
                                value="<?php if(empty($term1['section'])){ 
                                    echo "";} else { echo $term1['section'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-center align-items-center">
                                <label for="">School Year: </label>
                                <input type="text" style="width: 4%;" name="school_year_p1" 
                                value="<?php if(empty($term1['school_year'])){ 
                                    echo "";} else { echo $term1['school_year'];}?>">
                            </span>
                        </section>
                        <section class="fourth-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of Adviser: </label>
                                <input type="text" name="name_of_adviser_p1" 
                                value="<?php if(empty($term1['name_of_adviser'])){ 
                                    echo "";} else { echo $term1['name_of_adviser'];}?>">
                            </span>
                        </section>
                    </section>
                <table class="gradesheet w-100 table-border p-0 my-0" style="border:2px solid black;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" colspan="4">Learning Areas</th>
                            <th colspan="4"> Quarterly ratings</th>
                            <th rowspan="2" style="width:12%;">Final Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show_student_grades = "SELECT mother_tounge FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grades = mysqli_query($conn, $show_student_grades);
                    ?>
                        <tr>
                            <td colspan="4" class="fw-bold subj">Mother Tongue</td>
                            <?php
                                while($grades = mysqli_fetch_array($query_student_grades)){
                            ?>
                            <td class="text-center"><?php if($grades['mother_tounge'] == 0){ echo "";
                                    }else{ echo $grades['mother_tounge'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_fil = "SELECT filipino FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_fil = mysqli_query($conn, $show_student_grade_fil);
                    ?> 
                        <tr>
                            <td colspan="4" class="fw-bold subj">Filipino</td>
                            <?php
                                while($grade_fil = mysqli_fetch_array($query_student_grade_fil)){
                            ?>
                            <td class="text-center"><?php if($grade_fil['filipino'] == 0){ echo "";
                                    }else{ echo $grade_fil['filipino'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_eng = "SELECT english FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_eng = mysqli_query($conn, $show_student_grade_eng);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">English</td>
                            <?php
                                while($grade_eng = mysqli_fetch_array($query_student_grade_eng)){
                            ?>
                            <td class="text-center"><?php if($grade_eng['english'] == 0){ echo "";
                                    }else{ echo $grade_eng['english'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_math = "SELECT math FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_math = mysqli_query($conn, $show_student_grade_math);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Mathematics</td>
                            <?php
                                while($grade_math = mysqli_fetch_array($query_student_grade_math)){
                            ?>
                            <td class="text-center"><?php if($grade_math['math'] == 0){ echo "";
                                    }else{ echo $grade_math['math'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_sci = "SELECT science FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_sci = mysqli_query($conn, $show_student_grade_sci);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Science</td>
                            <?php
                                while($grade_sci = mysqli_fetch_array($query_student_grade_sci)){
                            ?>
                            <td class="text-center"><?php if($grade_sci['science'] == 0){ echo "";
                                    }else{ echo $grade_sci['science'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ap = "SELECT araling_panlipunan FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_ap = mysqli_query($conn, $show_student_grade_ap);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Araling Panlipunan</td>
                            <?php
                                while($grade_ap = mysqli_fetch_array($query_student_grade_ap)){
                            ?>
                            <td class="text-center"><?php if($grade_ap['araling_panlipunan'] == 0){ echo "";
                                    }else{ echo $grade_ap['araling_panlipunan'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_epp = "SELECT epp_tle FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_epp = mysqli_query($conn, $show_student_grade_epp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">EPP/TLE</td>
                            <?php
                                while($grade_epp = mysqli_fetch_array($query_student_grade_epp)){
                            ?>
                            <td class="text-center"><?php if($grade_epp['epp_tle'] == 0){ echo "";
                                    }else{ echo $grade_epp['epp_tle'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_mapeh = "SELECT mapeh FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_mapeh = mysqli_query($conn, $show_student_grade_mapeh);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">MAPEH</td>
                            <?php
                                while($grade_mapeh = mysqli_fetch_array($query_student_grade_mapeh)){
                            ?>
                            <td class="text-center"><?php if($grade_mapeh['mapeh'] == 0){ echo "";
                                    }else{ echo $grade_mapeh['mapeh'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_music = "SELECT music FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_music = mysqli_query($conn, $show_student_grade_music);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Music</i></td>
                            <?php
                                while($grade_music = mysqli_fetch_array($query_student_grade_music)){
                            ?>
                            <td class="text-center"><?php if($grade_music['music'] == 0){ echo "";
                                    }else{ echo $grade_music['music'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arts = "SELECT arts FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_arts = mysqli_query($conn, $show_student_grade_arts);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Arts</i></td>
                            <?php
                                while($grade_arts = mysqli_fetch_array($query_student_grade_arts)){
                            ?>
                            <td class="text-center"><?php if($grade_arts['arts'] == 0){ echo "";
                                    }else{ echo $grade_arts['arts'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_pe = "SELECT p_e FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_pe = mysqli_query($conn, $show_student_grade_pe);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Physical Education</i></td>
                            <?php
                                while($grade_pe = mysqli_fetch_array($query_student_grade_pe)){
                            ?>
                            <td class="text-center"><?php if($grade_pe['p_e'] == 0){ echo "";
                                    }else{ echo $grade_pe['p_e'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_health = "SELECT health FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_health = mysqli_query($conn, $show_student_grade_health);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Health</i></td>
                            <?php
                                while($grade_health = mysqli_fetch_array($query_student_grade_health)){
                            ?>
                            <td class="text-center"><?php if($grade_health['health'] == 0){ echo "";
                                    }else{ echo $grade_health['health'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_esp = "SELECT edukasyon_sa_pagpapakatao FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_esp = mysqli_query($conn, $show_student_grade_esp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Eduk. sa Pagpapakatao</td>
                            <?php
                                while($grade_esp = mysqli_fetch_array($query_student_grade_esp)){
                            ?>
                            <td class="text-center"><?php if($grade_esp['edukasyon_sa_pagpapakatao'] == 0){ echo "";
                                    }else{ echo $grade_esp['edukasyon_sa_pagpapakatao'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arabic = "SELECT arabic_language FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_arabic = mysqli_query($conn, $show_student_grade_arabic);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Arabic Language</i></td>
                            <?php
                                while($grade_arabic = mysqli_fetch_array($query_student_grade_arabic)){
                            ?>
                            <td class="text-center"><?php if($grade_arabic['arabic_language'] == 0){ echo "";
                                    }else{ echo $grade_arabic['arabic_language'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_islamic_values = "SELECT islamic_values FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_islamic_values = mysqli_query($conn, $show_student_grade_islamic_values);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Islamic Values</i></td>
                            <?php
                                while($grade_islamic_values = mysqli_fetch_array($query_student_grade_islamic_values)){
                            ?>
                            <td class="text-center"><?php if($grade_islamic_values['islamic_values'] == 0){ echo "";
                                    }else{ echo $grade_islamic_values['islamic_values'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ave = "SELECT general_average FROM students_grades WHERE phase = '1' AND lrn = '123456789012'";
                    $query_student_grade_ave = mysqli_query($conn, $show_student_grade_ave);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">General Average</td>
                            <?php
                                while($grade_ave = mysqli_fetch_array($query_student_grade_ave)){
                            ?>
                            <td class="text-center"><?php if($grade_ave['general_average'] == 0){ echo "";
                                    }else{ echo $grade_ave['general_average'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="remedial-table">
                    <tr>
                        <th style="font-size:11pt; width:30%;" class="text-center">Remedial Classes</th>
                        <th colspan="4">Date Conducted:</th>
                    </tr>
                    <tr class="text-center" style="font-size: 14px;">
                        <th>Learning Areas</th>
                        <th>Final Rating</th>
                        <th>Remedial Class Mark</th>
                        <th>Recomputed Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </table>
                <!-- end of phase 1 -->
                </div>
                <div class="col-lg-6"> 
                    <!-- phase 2 -->
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
                    <section class="grade-header">
                    <section class="first-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">School: </label>
                                <input type="text" name="school_p1" 
                                value="<?php if(empty($term1['school'])){ 
                                    echo "";} else { echo $term1['school'];}?>"> 
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">School ID:</label>
                                <input type="text" style="width: 70%;" name="sr_school_id_p1" 
                                value="<?php if(empty($term1['sr_school_id'])){ 
                                    echo "";} else { echo $term1['sr_school_id'];}?>">
                            </span>
                        </section>
                        <section class="second-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">District:</label>
                                <input type="text" name="district_p1" 
                                value="<?php if(empty($term1['district'])){ 
                                    echo "";} else { echo $term1['district'];}?>">
                            </span>
                            <span class="hstack d-flex  align-items-center">
                                <label for="">Division:</label>
                                <input type="text" name="division_p1" 
                                value="<?php if(empty($term1['division'])){ 
                                    echo "";} else { echo $term1['division'];}?>">
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">Region:</label>
                                <input type="text" name="region_p1" 
                                value="<?php if(empty($term1['region'])){ 
                                    echo "";} else { echo $term1['region'];}?>">
                            </span>
                        </section>
                        <section class="third-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Classified as Grade: </label>
                                <input type="text" style="width: 30%;"  name="classified_as_grade_p1" 
                                value="<?php if(empty($term1['classified_as_grade'])){ 
                                    echo "";} else { echo $term1['classified_as_grade'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Section: </label>
                                <input type="text" name="section_p1" 
                                value="<?php if(empty($term1['section'])){ 
                                    echo "";} else { echo $term1['section'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-center align-items-center">
                                <label for="">School Year: </label>
                                <input type="text" style="width: 47%;" name="school_year_p1" 
                                value="<?php if(empty($term1['school_year'])){ 
                                    echo "";} else { echo $term1['school_year'];}?>">
                            </span>
                        </section>
                        <section class="fourth-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of Adviser: </label>
                                <input type="text" name="name_of_adviser_p1" 
                                value="<?php if(empty($term1['name_of_adviser'])){ 
                                    echo "";} else { echo $term1['name_of_adviser'];}?>">
                            </span>
                        </section>
                    </section>
                <table class="gradesheet w-100 table-border p-0 my-0" style="border:2px solid black;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" colspan="4">Learning Areas</th>
                            <th colspan="4"> Quarterly ratings</th>
                            <th rowspan="2" style="width:12%;">Final Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show_student_grades = "SELECT mother_tounge FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grades = mysqli_query($conn, $show_student_grades);
                    ?>
                        <tr>
                            <td colspan="4" class="fw-bold subj">Mother Tongue</td>
                            <?php
                                while($grades = mysqli_fetch_array($query_student_grades)){
                            ?>
                            <td class="text-center"><?php if($grades['mother_tounge'] == 0){ echo "";
                                    }else{ echo $grades['mother_tounge'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_fil = "SELECT filipino FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_fil = mysqli_query($conn, $show_student_grade_fil);
                    ?> 
                        <tr>
                            <td colspan="4" class="fw-bold subj">Filipino</td>
                            <?php
                                while($grade_fil = mysqli_fetch_array($query_student_grade_fil)){
                            ?>
                            <td class="text-center"><?php if($grade_fil['filipino'] == 0){ echo "";
                                    }else{ echo $grade_fil['filipino'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_eng = "SELECT english FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_eng = mysqli_query($conn, $show_student_grade_eng);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">English</td>
                            <?php
                                while($grade_eng = mysqli_fetch_array($query_student_grade_eng)){
                            ?>
                            <td class="text-center"><?php if($grade_eng['english'] == 0){ echo "";
                                    }else{ echo $grade_eng['english'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_math = "SELECT math FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_math = mysqli_query($conn, $show_student_grade_math);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Mathematics</td>
                            <?php
                                while($grade_math = mysqli_fetch_array($query_student_grade_math)){
                            ?>
                            <td class="text-center"><?php if($grade_math['math'] == 0){ echo "";
                                    }else{ echo $grade_math['math'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_sci = "SELECT science FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_sci = mysqli_query($conn, $show_student_grade_sci);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Science</td>
                            <?php
                                while($grade_sci = mysqli_fetch_array($query_student_grade_sci)){
                            ?>
                            <td class="text-center"><?php if($grade_sci['science'] == 0){ echo "";
                                    }else{ echo $grade_sci['science'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ap = "SELECT araling_panlipunan FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_ap = mysqli_query($conn, $show_student_grade_ap);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Araling Panlipunan</td>
                            <?php
                                while($grade_ap = mysqli_fetch_array($query_student_grade_ap)){
                            ?>
                            <td class="text-center"><?php if($grade_ap['araling_panlipunan'] == 0){ echo "";
                                    }else{ echo $grade_ap['araling_panlipunan'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_epp = "SELECT epp_tle FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_epp = mysqli_query($conn, $show_student_grade_epp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">EPP/TLE</td>
                            <?php
                                while($grade_epp = mysqli_fetch_array($query_student_grade_epp)){
                            ?>
                            <td class="text-center"><?php if($grade_epp['epp_tle'] == 0){ echo "";
                                    }else{ echo $grade_epp['epp_tle'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_mapeh = "SELECT mapeh FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_mapeh = mysqli_query($conn, $show_student_grade_mapeh);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">MAPEH</td>
                            <?php
                                while($grade_mapeh = mysqli_fetch_array($query_student_grade_mapeh)){
                            ?>
                            <td class="text-center"><?php if($grade_mapeh['mapeh'] == 0){ echo "";
                                    }else{ echo $grade_mapeh['mapeh'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_music = "SELECT music FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_music = mysqli_query($conn, $show_student_grade_music);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Music</i></td>
                            <?php
                                while($grade_music = mysqli_fetch_array($query_student_grade_music)){
                            ?>
                            <td class="text-center"><?php if($grade_music['music'] == 0){ echo "";
                                    }else{ echo $grade_music['music'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arts = "SELECT arts FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_arts = mysqli_query($conn, $show_student_grade_arts);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Arts</i></td>
                            <?php
                                while($grade_arts = mysqli_fetch_array($query_student_grade_arts)){
                            ?>
                            <td class="text-center"><?php if($grade_arts['arts'] == 0){ echo "";
                                    }else{ echo $grade_arts['arts'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_pe = "SELECT p_e FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_pe = mysqli_query($conn, $show_student_grade_pe);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Physical Education</i></td>
                            <?php
                                while($grade_pe = mysqli_fetch_array($query_student_grade_pe)){
                            ?>
                            <td class="text-center"><?php if($grade_pe['p_e'] == 0){ echo "";
                                    }else{ echo $grade_pe['p_e'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_health = "SELECT health FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_health = mysqli_query($conn, $show_student_grade_health);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Health</i></td>
                            <?php
                                while($grade_health = mysqli_fetch_array($query_student_grade_health)){
                            ?>
                            <td class="text-center"><?php if($grade_health['health'] == 0){ echo "";
                                    }else{ echo $grade_health['health'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_esp = "SELECT edukasyon_sa_pagpapakatao FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_esp = mysqli_query($conn, $show_student_grade_esp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Eduk. sa Pagpapakatao</td>
                            <?php
                                while($grade_esp = mysqli_fetch_array($query_student_grade_esp)){
                            ?>
                            <td class="text-center"><?php if($grade_esp['edukasyon_sa_pagpapakatao'] == 0){ echo "";
                                    }else{ echo $grade_esp['edukasyon_sa_pagpapakatao'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arabic = "SELECT arabic_language FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_arabic = mysqli_query($conn, $show_student_grade_arabic);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Arabic Language</i></td>
                            <?php
                                while($grade_arabic = mysqli_fetch_array($query_student_grade_arabic)){
                            ?>
                            <td class="text-center"><?php if($grade_arabic['arabic_language'] == 0){ echo "";
                                    }else{ echo $grade_arabic['arabic_language'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_islamic_values = "SELECT islamic_values FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_islamic_values = mysqli_query($conn, $show_student_grade_islamic_values);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Islamic Values</i></td>
                            <?php
                                while($grade_islamic_values = mysqli_fetch_array($query_student_grade_islamic_values)){
                            ?>
                            <td class="text-center"><?php if($grade_islamic_values['islamic_values'] == 0){ echo "";
                                    }else{ echo $grade_islamic_values['islamic_values'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ave = "SELECT general_average FROM students_grades WHERE phase = '2' AND lrn = '123456789012'";
                    $query_student_grade_ave = mysqli_query($conn, $show_student_grade_ave);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">General Average</td>
                            <?php
                                while($grade_ave = mysqli_fetch_array($query_student_grade_ave)){
                            ?>
                            <td class="text-center"><?php if($grade_ave['general_average'] == 0){ echo "";
                                    }else{ echo $grade_ave['general_average'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="remedial-table">
                    <tr>
                        <th style="font-size:11pt; width:30%;" class="text-center">Remedial Classes</th>
                        <th colspan="4">Date Conducted:</th>
                    </tr>
                    <tr class="text-center" style="font-size: 14px;">
                        <th>Learning Areas</th>
                        <th>Final Rating</th>
                        <th>Remedial Class Mark</th>
                        <th>Recomputed Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </table>
                <!-- end of phase 2 -->
                </div>
                
                <div class="col-lg-6"> 
                    <!-- phase 3 -->
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
                    <section class="grade-header">
                    <section class="first-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">School: </label>
                                <input type="text" name="school_p1" 
                                value="<?php if(empty($term1['school'])){ 
                                    echo "";} else { echo $term1['school'];}?>"> 
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">School ID:</label>
                                <input type="text" style="width: 70%;" name="sr_school_id_p1" 
                                value="<?php if(empty($term1['sr_school_id'])){ 
                                    echo "";} else { echo $term1['sr_school_id'];}?>">
                            </span>
                        </section>
                        <section class="second-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">District:</label>
                                <input type="text" name="district_p1" 
                                value="<?php if(empty($term1['district'])){ 
                                    echo "";} else { echo $term1['district'];}?>">
                            </span>
                            <span class="hstack d-flex  align-items-center">
                                <label for="">Division:</label>
                                <input type="text" name="division_p1" 
                                value="<?php if(empty($term1['division'])){ 
                                    echo "";} else { echo $term1['division'];}?>">
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">Region:</label>
                                <input type="text" name="region_p1" 
                                value="<?php if(empty($term1['region'])){ 
                                    echo "";} else { echo $term1['region'];}?>">
                            </span>
                        </section>
                        <section class="third-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Classified as Grade: </label>
                                <input type="text" style="width: 30%;"  name="classified_as_grade_p1" 
                                value="<?php if(empty($term1['classified_as_grade'])){ 
                                    echo "";} else { echo $term1['classified_as_grade'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Section: </label>
                                <input type="text" name="section_p1" 
                                value="<?php if(empty($term1['section'])){ 
                                    echo "";} else { echo $term1['section'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-center align-items-center">
                                <label for="">School Year: </label>
                                <input type="text" style="width: 47%;" name="school_year_p1" 
                                value="<?php if(empty($term1['school_year'])){ 
                                    echo "";} else { echo $term1['school_year'];}?>">
                            </span>
                        </section>
                        <section class="fourth-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of Adviser: </label>
                                <input type="text" name="name_of_adviser_p1" 
                                value="<?php if(empty($term1['name_of_adviser'])){ 
                                    echo "";} else { echo $term1['name_of_adviser'];}?>">
                            </span>
                        </section>
                    </section>
                <table class="gradesheet w-100 table-border p-0 my-0" style="border:2px solid black;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" colspan="4">Learning Areas</th>
                            <th colspan="4"> Quarterly ratings</th>
                            <th rowspan="2" style="width:12%;">Final Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show_student_grades = "SELECT mother_tounge FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grades = mysqli_query($conn, $show_student_grades);
                    ?>
                        <tr>
                            <td colspan="4" class="fw-bold subj">Mother Tongue</td>
                            <?php
                                while($grades = mysqli_fetch_array($query_student_grades)){
                            ?>
                            <td class="text-center"><?php if($grades['mother_tounge'] == 0){ echo "";
                                    }else{ echo $grades['mother_tounge'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_fil = "SELECT filipino FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_fil = mysqli_query($conn, $show_student_grade_fil);
                    ?> 
                        <tr>
                            <td colspan="4" class="fw-bold subj">Filipino</td>
                            <?php
                                while($grade_fil = mysqli_fetch_array($query_student_grade_fil)){
                            ?>
                            <td class="text-center"><?php if($grade_fil['filipino'] == 0){ echo "";
                                    }else{ echo $grade_fil['filipino'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_eng = "SELECT english FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_eng = mysqli_query($conn, $show_student_grade_eng);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">English</td>
                            <?php
                                while($grade_eng = mysqli_fetch_array($query_student_grade_eng)){
                            ?>
                            <td class="text-center"><?php if($grade_eng['english'] == 0){ echo "";
                                    }else{ echo $grade_eng['english'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_math = "SELECT math FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_math = mysqli_query($conn, $show_student_grade_math);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Mathematics</td>
                            <?php
                                while($grade_math = mysqli_fetch_array($query_student_grade_math)){
                            ?>
                            <td class="text-center"><?php if($grade_math['math'] == 0){ echo "";
                                    }else{ echo $grade_math['math'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_sci = "SELECT science FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_sci = mysqli_query($conn, $show_student_grade_sci);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Science</td>
                            <?php
                                while($grade_sci = mysqli_fetch_array($query_student_grade_sci)){
                            ?>
                            <td class="text-center"><?php if($grade_sci['science'] == 0){ echo "";
                                    }else{ echo $grade_sci['science'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ap = "SELECT araling_panlipunan FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_ap = mysqli_query($conn, $show_student_grade_ap);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Araling Panlipunan</td>
                            <?php
                                while($grade_ap = mysqli_fetch_array($query_student_grade_ap)){
                            ?>
                            <td class="text-center"><?php if($grade_ap['araling_panlipunan'] == 0){ echo "";
                                    }else{ echo $grade_ap['araling_panlipunan'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_epp = "SELECT epp_tle FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_epp = mysqli_query($conn, $show_student_grade_epp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">EPP/TLE</td>
                            <?php
                                while($grade_epp = mysqli_fetch_array($query_student_grade_epp)){
                            ?>
                            <td class="text-center"><?php if($grade_epp['epp_tle'] == 0){ echo "";
                                    }else{ echo $grade_epp['epp_tle'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_mapeh = "SELECT mapeh FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_mapeh = mysqli_query($conn, $show_student_grade_mapeh);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">MAPEH</td>
                            <?php
                                while($grade_mapeh = mysqli_fetch_array($query_student_grade_mapeh)){
                            ?>
                            <td class="text-center"><?php if($grade_mapeh['mapeh'] == 0){ echo "";
                                    }else{ echo $grade_mapeh['mapeh'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_music = "SELECT music FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_music = mysqli_query($conn, $show_student_grade_music);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Music</i></td>
                            <?php
                                while($grade_music = mysqli_fetch_array($query_student_grade_music)){
                            ?>
                            <td class="text-center"><?php if($grade_music['music'] == 0){ echo "";
                                    }else{ echo $grade_music['music'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arts = "SELECT arts FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_arts = mysqli_query($conn, $show_student_grade_arts);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Arts</i></td>
                            <?php
                                while($grade_arts = mysqli_fetch_array($query_student_grade_arts)){
                            ?>
                            <td class="text-center"><?php if($grade_arts['arts'] == 0){ echo "";
                                    }else{ echo $grade_arts['arts'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_pe = "SELECT p_e FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_pe = mysqli_query($conn, $show_student_grade_pe);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Physical Education</i></td>
                            <?php
                                while($grade_pe = mysqli_fetch_array($query_student_grade_pe)){
                            ?>
                            <td class="text-center"><?php if($grade_pe['p_e'] == 0){ echo "";
                                    }else{ echo $grade_pe['p_e'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_health = "SELECT health FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_health = mysqli_query($conn, $show_student_grade_health);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Health</i></td>
                            <?php
                                while($grade_health = mysqli_fetch_array($query_student_grade_health)){
                            ?>
                            <td class="text-center"><?php if($grade_health['health'] == 0){ echo "";
                                    }else{ echo $grade_health['health'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_esp = "SELECT edukasyon_sa_pagpapakatao FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_esp = mysqli_query($conn, $show_student_grade_esp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Eduk. sa Pagpapakatao</td>
                            <?php
                                while($grade_esp = mysqli_fetch_array($query_student_grade_esp)){
                            ?>
                            <td class="text-center"><?php if($grade_esp['edukasyon_sa_pagpapakatao'] == 0){ echo "";
                                    }else{ echo $grade_esp['edukasyon_sa_pagpapakatao'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arabic = "SELECT arabic_language FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_arabic = mysqli_query($conn, $show_student_grade_arabic);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Arabic Language</i></td>
                            <?php
                                while($grade_arabic = mysqli_fetch_array($query_student_grade_arabic)){
                            ?>
                            <td class="text-center"><?php if($grade_arabic['arabic_language'] == 0){ echo "";
                                    }else{ echo $grade_arabic['arabic_language'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_islamic_values = "SELECT islamic_values FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_islamic_values = mysqli_query($conn, $show_student_grade_islamic_values);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Islamic Values</i></td>
                            <?php
                                while($grade_islamic_values = mysqli_fetch_array($query_student_grade_islamic_values)){
                            ?>
                            <td class="text-center"><?php if($grade_islamic_values['islamic_values'] == 0){ echo "";
                                    }else{ echo $grade_islamic_values['islamic_values'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ave = "SELECT general_average FROM students_grades WHERE phase = '3' AND lrn = '123456789012'";
                    $query_student_grade_ave = mysqli_query($conn, $show_student_grade_ave);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">General Average</td>
                            <?php
                                while($grade_ave = mysqli_fetch_array($query_student_grade_ave)){
                            ?>
                            <td class="text-center"><?php if($grade_ave['general_average'] == 0){ echo "";
                                    }else{ echo $grade_ave['general_average'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="remedial-table">
                    <tr>
                        <th style="font-size:11pt; width:30%;" class="text-center">Remedial Classes</th>
                        <th colspan="4">Date Conducted:</th>
                    </tr>
                    <tr class="text-center" style="font-size: 14px;">
                        <th>Learning Areas</th>
                        <th>Final Rating</th>
                        <th>Remedial Class Mark</th>
                        <th>Recomputed Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </table>
                <!-- end of phase 3 -->
                </div>
                
                <div class="col-lg-6"> 
                    <!-- phase 4 -->
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
                    <section class="grade-header">
                    <section class="first-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">School: </label>
                                <input type="text" name="school_p1" 
                                value="<?php if(empty($term1['school'])){ 
                                    echo "";} else { echo $term1['school'];}?>"> 
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">School ID:</label>
                                <input type="text" style="width: 70%;" name="sr_school_id_p1" 
                                value="<?php if(empty($term1['sr_school_id'])){ 
                                    echo "";} else { echo $term1['sr_school_id'];}?>">
                            </span>
                        </section>
                        <section class="second-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">District:</label>
                                <input type="text" name="district_p1" 
                                value="<?php if(empty($term1['district'])){ 
                                    echo "";} else { echo $term1['district'];}?>">
                            </span>
                            <span class="hstack d-flex  align-items-center">
                                <label for="">Division:</label>
                                <input type="text" name="division_p1" 
                                value="<?php if(empty($term1['division'])){ 
                                    echo "";} else { echo $term1['division'];}?>">
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">Region:</label>
                                <input type="text" name="region_p1" 
                                value="<?php if(empty($term1['region'])){ 
                                    echo "";} else { echo $term1['region'];}?>">
                            </span>
                        </section>
                        <section class="third-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Classified as Grade: </label>
                                <input type="text" style="width: 30%;"  name="classified_as_grade_p1" 
                                value="<?php if(empty($term1['classified_as_grade'])){ 
                                    echo "";} else { echo $term1['classified_as_grade'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Section: </label>
                                <input type="text" name="section_p1" 
                                value="<?php if(empty($term1['section'])){ 
                                    echo "";} else { echo $term1['section'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-center align-items-center">
                                <label for="">School Year: </label>
                                <input type="text" style="width: 47%;" name="school_year_p1" 
                                value="<?php if(empty($term1['school_year'])){ 
                                    echo "";} else { echo $term1['school_year'];}?>">
                            </span>
                        </section>
                        <section class="fourth-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of Adviser: </label>
                                <input type="text" name="name_of_adviser_p1" 
                                value="<?php if(empty($term1['name_of_adviser'])){ 
                                    echo "";} else { echo $term1['name_of_adviser'];}?>">
                            </span>
                        </section>
                    </section>
                <table class="gradesheet w-100 table-border p-0 my-0" style="border:2px solid black;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" colspan="4">Learning Areas</th>
                            <th colspan="4"> Quarterly ratings</th>
                            <th rowspan="2" style="width:12%;">Final Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show_student_grades = "SELECT mother_tounge FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grades = mysqli_query($conn, $show_student_grades);
                    ?>
                        <tr>
                            <td colspan="4" class="fw-bold subj">Mother Tongue</td>
                            <?php
                                while($grades = mysqli_fetch_array($query_student_grades)){
                            ?>
                            <td class="text-center"><?php if($grades['mother_tounge'] == 0){ echo "";
                                    }else{ echo $grades['mother_tounge'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_fil = "SELECT filipino FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_fil = mysqli_query($conn, $show_student_grade_fil);
                    ?> 
                        <tr>
                            <td colspan="4" class="fw-bold subj">Filipino</td>
                            <?php
                                while($grade_fil = mysqli_fetch_array($query_student_grade_fil)){
                            ?>
                            <td class="text-center"><?php if($grade_fil['filipino'] == 0){ echo "";
                                    }else{ echo $grade_fil['filipino'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_eng = "SELECT english FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_eng = mysqli_query($conn, $show_student_grade_eng);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">English</td>
                            <?php
                                while($grade_eng = mysqli_fetch_array($query_student_grade_eng)){
                            ?>
                            <td class="text-center"><?php if($grade_eng['english'] == 0){ echo "";
                                    }else{ echo $grade_eng['english'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_math = "SELECT math FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_math = mysqli_query($conn, $show_student_grade_math);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Mathematics</td>
                            <?php
                                while($grade_math = mysqli_fetch_array($query_student_grade_math)){
                            ?>
                            <td class="text-center"><?php if($grade_math['math'] == 0){ echo "";
                                    }else{ echo $grade_math['math'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_sci = "SELECT science FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_sci = mysqli_query($conn, $show_student_grade_sci);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Science</td>
                            <?php
                                while($grade_sci = mysqli_fetch_array($query_student_grade_sci)){
                            ?>
                            <td class="text-center"><?php if($grade_sci['science'] == 0){ echo "";
                                    }else{ echo $grade_sci['science'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ap = "SELECT araling_panlipunan FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_ap = mysqli_query($conn, $show_student_grade_ap);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Araling Panlipunan</td>
                            <?php
                                while($grade_ap = mysqli_fetch_array($query_student_grade_ap)){
                            ?>
                            <td class="text-center"><?php if($grade_ap['araling_panlipunan'] == 0){ echo "";
                                    }else{ echo $grade_ap['araling_panlipunan'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_epp = "SELECT epp_tle FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_epp = mysqli_query($conn, $show_student_grade_epp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">EPP/TLE</td>
                            <?php
                                while($grade_epp = mysqli_fetch_array($query_student_grade_epp)){
                            ?>
                            <td class="text-center"><?php if($grade_epp['epp_tle'] == 0){ echo "";
                                    }else{ echo $grade_epp['epp_tle'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_mapeh = "SELECT mapeh FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_mapeh = mysqli_query($conn, $show_student_grade_mapeh);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">MAPEH</td>
                            <?php
                                while($grade_mapeh = mysqli_fetch_array($query_student_grade_mapeh)){
                            ?>
                            <td class="text-center"><?php if($grade_mapeh['mapeh'] == 0){ echo "";
                                    }else{ echo $grade_mapeh['mapeh'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_music = "SELECT music FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_music = mysqli_query($conn, $show_student_grade_music);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Music</i></td>
                            <?php
                                while($grade_music = mysqli_fetch_array($query_student_grade_music)){
                            ?>
                            <td class="text-center"><?php if($grade_music['music'] == 0){ echo "";
                                    }else{ echo $grade_music['music'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arts = "SELECT arts FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_arts = mysqli_query($conn, $show_student_grade_arts);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Arts</i></td>
                            <?php
                                while($grade_arts = mysqli_fetch_array($query_student_grade_arts)){
                            ?>
                            <td class="text-center"><?php if($grade_arts['arts'] == 0){ echo "";
                                    }else{ echo $grade_arts['arts'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_pe = "SELECT p_e FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_pe = mysqli_query($conn, $show_student_grade_pe);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Physical Education</i></td>
                            <?php
                                while($grade_pe = mysqli_fetch_array($query_student_grade_pe)){
                            ?>
                            <td class="text-center"><?php if($grade_pe['p_e'] == 0){ echo "";
                                    }else{ echo $grade_pe['p_e'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_health = "SELECT health FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_health = mysqli_query($conn, $show_student_grade_health);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Health</i></td>
                            <?php
                                while($grade_health = mysqli_fetch_array($query_student_grade_health)){
                            ?>
                            <td class="text-center"><?php if($grade_health['health'] == 0){ echo "";
                                    }else{ echo $grade_health['health'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_esp = "SELECT edukasyon_sa_pagpapakatao FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_esp = mysqli_query($conn, $show_student_grade_esp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Eduk. sa Pagpapakatao</td>
                            <?php
                                while($grade_esp = mysqli_fetch_array($query_student_grade_esp)){
                            ?>
                            <td class="text-center"><?php if($grade_esp['edukasyon_sa_pagpapakatao'] == 0){ echo "";
                                    }else{ echo $grade_esp['edukasyon_sa_pagpapakatao'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arabic = "SELECT arabic_language FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_arabic = mysqli_query($conn, $show_student_grade_arabic);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Arabic Language</i></td>
                            <?php
                                while($grade_arabic = mysqli_fetch_array($query_student_grade_arabic)){
                            ?>
                            <td class="text-center"><?php if($grade_arabic['arabic_language'] == 0){ echo "";
                                    }else{ echo $grade_arabic['arabic_language'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_islamic_values = "SELECT islamic_values FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_islamic_values = mysqli_query($conn, $show_student_grade_islamic_values);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Islamic Values</i></td>
                            <?php
                                while($grade_islamic_values = mysqli_fetch_array($query_student_grade_islamic_values)){
                            ?>
                            <td class="text-center"><?php if($grade_islamic_values['islamic_values'] == 0){ echo "";
                                    }else{ echo $grade_islamic_values['islamic_values'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ave = "SELECT general_average FROM students_grades WHERE phase = '4' AND lrn = '123456789012'";
                    $query_student_grade_ave = mysqli_query($conn, $show_student_grade_ave);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">General Average</td>
                            <?php
                                while($grade_ave = mysqli_fetch_array($query_student_grade_ave)){
                            ?>
                            <td class="text-center"><?php if($grade_ave['general_average'] == 0){ echo "";
                                    }else{ echo $grade_ave['general_average'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="remedial-table">
                    <tr>
                        <th style="font-size:11pt; width:30%;" class="text-center">Remedial Classes</th>
                        <th colspan="4">Date Conducted:</th>
                    </tr>
                    <tr class="text-center" style="font-size: 14px;">
                        <th>Learning Areas</th>
                        <th>Final Rating</th>
                        <th>Remedial Class Mark</th>
                        <th>Recomputed Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </table>
                <!-- end of phase 4 -->
                </div>
                
            </div>
        </div>
        <input type="button" class="next-form text-end btn btn-success" value="Next" />
        </fieldset>
        <fieldset>
                        
                    <?php
            }
                    ?>
            <h6 class="py-1 px-0 text-center" style="background: #808080;">SCHOLASTIC RECORD</h6>
            <div class="container-fluid p-0">
                <div class="row gx-2 gy-lg-3">
                <div class="col-lg-6"> 
                    <!-- phase 5 -->
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
                    <section class="grade-header">
                    <section class="first-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">School: </label>
                                <input type="text" name="school_p1" 
                                value="<?php if(empty($term1['school'])){ 
                                    echo "";} else { echo $term1['school'];}?>"> 
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">School ID:</label>
                                <input type="text" style="width: 70%;" name="sr_school_id_p1" 
                                value="<?php if(empty($term1['sr_school_id'])){ 
                                    echo "";} else { echo $term1['sr_school_id'];}?>">
                            </span>
                        </section>
                        <section class="second-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">District:</label>
                                <input type="text" name="district_p1" 
                                value="<?php if(empty($term1['district'])){ 
                                    echo "";} else { echo $term1['district'];}?>">
                            </span>
                            <span class="hstack d-flex  align-items-center">
                                <label for="">Division:</label>
                                <input type="text" name="division_p1" 
                                value="<?php if(empty($term1['division'])){ 
                                    echo "";} else { echo $term1['division'];}?>">
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">Region:</label>
                                <input type="text" name="region_p1" 
                                value="<?php if(empty($term1['region'])){ 
                                    echo "";} else { echo $term1['region'];}?>">
                            </span>
                        </section>
                        <section class="third-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Classified as Grade: </label>
                                <input type="text" style="width: 30%;"  name="classified_as_grade_p1" 
                                value="<?php if(empty($term1['classified_as_grade'])){ 
                                    echo "";} else { echo $term1['classified_as_grade'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Section: </label>
                                <input type="text" name="section_p1" 
                                value="<?php if(empty($term1['section'])){ 
                                    echo "";} else { echo $term1['section'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-center align-items-center">
                                <label for="">School Year: </label>
                                <input type="text" style="width: 47%;" name="school_year_p1" 
                                value="<?php if(empty($term1['school_year'])){ 
                                    echo "";} else { echo $term1['school_year'];}?>">
                            </span>
                        </section>
                        <section class="fourth-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of Adviser: </label>
                                <input type="text" name="name_of_adviser_p1" 
                                value="<?php if(empty($term1['name_of_adviser'])){ 
                                    echo "";} else { echo $term1['name_of_adviser'];}?>">
                            </span>
                        </section>
                    </section>
                <table class="gradesheet w-100 table-border p-0 my-0" style="border:2px solid black;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" colspan="4">Learning Areas</th>
                            <th colspan="4"> Quarterly ratings</th>
                            <th rowspan="2" style="width:12%;">Final Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show_student_grades = "SELECT mother_tounge FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grades = mysqli_query($conn, $show_student_grades);
                    ?>
                        <tr>
                            <td colspan="4" class="fw-bold subj">Mother Tongue</td>
                            <?php
                                while($grades = mysqli_fetch_array($query_student_grades)){
                            ?>
                            <td class="text-center"><?php if($grades['mother_tounge'] == 0){ echo "";
                                    }else{ echo $grades['mother_tounge'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_fil = "SELECT filipino FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_fil = mysqli_query($conn, $show_student_grade_fil);
                    ?> 
                        <tr>
                            <td colspan="4" class="fw-bold subj">Filipino</td>
                            <?php
                                while($grade_fil = mysqli_fetch_array($query_student_grade_fil)){
                            ?>
                            <td class="text-center"><?php if($grade_fil['filipino'] == 0){ echo "";
                                    }else{ echo $grade_fil['filipino'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_eng = "SELECT english FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_eng = mysqli_query($conn, $show_student_grade_eng);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">English</td>
                            <?php
                                while($grade_eng = mysqli_fetch_array($query_student_grade_eng)){
                            ?>
                            <td class="text-center"><?php if($grade_eng['english'] == 0){ echo "";
                                    }else{ echo $grade_eng['english'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_math = "SELECT math FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_math = mysqli_query($conn, $show_student_grade_math);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Mathematics</td>
                            <?php
                                while($grade_math = mysqli_fetch_array($query_student_grade_math)){
                            ?>
                            <td class="text-center"><?php if($grade_math['math'] == 0){ echo "";
                                    }else{ echo $grade_math['math'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_sci = "SELECT science FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_sci = mysqli_query($conn, $show_student_grade_sci);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Science</td>
                            <?php
                                while($grade_sci = mysqli_fetch_array($query_student_grade_sci)){
                            ?>
                            <td class="text-center"><?php if($grade_sci['science'] == 0){ echo "";
                                    }else{ echo $grade_sci['science'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ap = "SELECT araling_panlipunan FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_ap = mysqli_query($conn, $show_student_grade_ap);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Araling Panlipunan</td>
                            <?php
                                while($grade_ap = mysqli_fetch_array($query_student_grade_ap)){
                            ?>
                            <td class="text-center"><?php if($grade_ap['araling_panlipunan'] == 0){ echo "";
                                    }else{ echo $grade_ap['araling_panlipunan'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_epp = "SELECT epp_tle FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_epp = mysqli_query($conn, $show_student_grade_epp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">EPP/TLE</td>
                            <?php
                                while($grade_epp = mysqli_fetch_array($query_student_grade_epp)){
                            ?>
                            <td class="text-center"><?php if($grade_epp['epp_tle'] == 0){ echo "";
                                    }else{ echo $grade_epp['epp_tle'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_mapeh = "SELECT mapeh FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_mapeh = mysqli_query($conn, $show_student_grade_mapeh);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">MAPEH</td>
                            <?php
                                while($grade_mapeh = mysqli_fetch_array($query_student_grade_mapeh)){
                            ?>
                            <td class="text-center"><?php if($grade_mapeh['mapeh'] == 0){ echo "";
                                    }else{ echo $grade_mapeh['mapeh'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_music = "SELECT music FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_music = mysqli_query($conn, $show_student_grade_music);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Music</i></td>
                            <?php
                                while($grade_music = mysqli_fetch_array($query_student_grade_music)){
                            ?>
                            <td class="text-center"><?php if($grade_music['music'] == 0){ echo "";
                                    }else{ echo $grade_music['music'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arts = "SELECT arts FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_arts = mysqli_query($conn, $show_student_grade_arts);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Arts</i></td>
                            <?php
                                while($grade_arts = mysqli_fetch_array($query_student_grade_arts)){
                            ?>
                            <td class="text-center"><?php if($grade_arts['arts'] == 0){ echo "";
                                    }else{ echo $grade_arts['arts'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_pe = "SELECT p_e FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_pe = mysqli_query($conn, $show_student_grade_pe);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Physical Education</i></td>
                            <?php
                                while($grade_pe = mysqli_fetch_array($query_student_grade_pe)){
                            ?>
                            <td class="text-center"><?php if($grade_pe['p_e'] == 0){ echo "";
                                    }else{ echo $grade_pe['p_e'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_health = "SELECT health FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_health = mysqli_query($conn, $show_student_grade_health);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Health</i></td>
                            <?php
                                while($grade_health = mysqli_fetch_array($query_student_grade_health)){
                            ?>
                            <td class="text-center"><?php if($grade_health['health'] == 0){ echo "";
                                    }else{ echo $grade_health['health'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_esp = "SELECT edukasyon_sa_pagpapakatao FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_esp = mysqli_query($conn, $show_student_grade_esp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Eduk. sa Pagpapakatao</td>
                            <?php
                                while($grade_esp = mysqli_fetch_array($query_student_grade_esp)){
                            ?>
                            <td class="text-center"><?php if($grade_esp['edukasyon_sa_pagpapakatao'] == 0){ echo "";
                                    }else{ echo $grade_esp['edukasyon_sa_pagpapakatao'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arabic = "SELECT arabic_language FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_arabic = mysqli_query($conn, $show_student_grade_arabic);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Arabic Language</i></td>
                            <?php
                                while($grade_arabic = mysqli_fetch_array($query_student_grade_arabic)){
                            ?>
                            <td class="text-center"><?php if($grade_arabic['arabic_language'] == 0){ echo "";
                                    }else{ echo $grade_arabic['arabic_language'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_islamic_values = "SELECT islamic_values FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_islamic_values = mysqli_query($conn, $show_student_grade_islamic_values);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Islamic Values</i></td>
                            <?php
                                while($grade_islamic_values = mysqli_fetch_array($query_student_grade_islamic_values)){
                            ?>
                            <td class="text-center"><?php if($grade_islamic_values['islamic_values'] == 0){ echo "";
                                    }else{ echo $grade_islamic_values['islamic_values'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ave = "SELECT general_average FROM students_grades WHERE phase = '5' AND lrn = '123456789012'";
                    $query_student_grade_ave = mysqli_query($conn, $show_student_grade_ave);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">General Average</td>
                            <?php
                                while($grade_ave = mysqli_fetch_array($query_student_grade_ave)){
                            ?>
                            <td class="text-center"><?php if($grade_ave['general_average'] == 0){ echo "";
                                    }else{ echo $grade_ave['general_average'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="remedial-table">
                    <tr>
                        <th style="font-size:11pt; width:30%;" class="text-center">Remedial Classes</th>
                        <th colspan="4">Date Conducted:</th>
                    </tr>
                    <tr class="text-center" style="font-size: 14px;">
                        <th>Learning Areas</th>
                        <th>Final Rating</th>
                        <th>Remedial Class Mark</th>
                        <th>Recomputed Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </table>
                <!-- end of phase 5 -->
                </div>
                <div class="col-lg-6"> 
                    <!-- phase 6 -->
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
                    <section class="grade-header">
                    <section class="first-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">School: </label>
                                <input type="text" name="school_p1" 
                                value="<?php if(empty($term1['school'])){ 
                                    echo "";} else { echo $term1['school'];}?>"> 
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">School ID:</label>
                                <input type="text" style="width: 70%;" name="sr_school_id_p1" 
                                value="<?php if(empty($term1['sr_school_id'])){ 
                                    echo "";} else { echo $term1['sr_school_id'];}?>">
                            </span>
                        </section>
                        <section class="second-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">District:</label>
                                <input type="text" name="district_p1" 
                                value="<?php if(empty($term1['district'])){ 
                                    echo "";} else { echo $term1['district'];}?>">
                            </span>
                            <span class="hstack d-flex  align-items-center">
                                <label for="">Division:</label>
                                <input type="text" name="division_p1" 
                                value="<?php if(empty($term1['division'])){ 
                                    echo "";} else { echo $term1['division'];}?>">
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">Region:</label>
                                <input type="text" name="region_p1" 
                                value="<?php if(empty($term1['region'])){ 
                                    echo "";} else { echo $term1['region'];}?>">
                            </span>
                        </section>
                        <section class="third-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Classified as Grade: </label>
                                <input type="text" style="width: 30%;"  name="classified_as_grade_p1" 
                                value="<?php if(empty($term1['classified_as_grade'])){ 
                                    echo "";} else { echo $term1['classified_as_grade'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Section: </label>
                                <input type="text" name="section_p1" 
                                value="<?php if(empty($term1['section'])){ 
                                    echo "";} else { echo $term1['section'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-center align-items-center">
                                <label for="">School Year: </label>
                                <input type="text" style="width: 47%;" name="school_year_p1" 
                                value="<?php if(empty($term1['school_year'])){ 
                                    echo "";} else { echo $term1['school_year'];}?>">
                            </span>
                        </section>
                        <section class="fourth-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of Adviser: </label>
                                <input type="text" name="name_of_adviser_p1" 
                                value="<?php if(empty($term1['name_of_adviser'])){ 
                                    echo "";} else { echo $term1['name_of_adviser'];}?>">
                            </span>
                        </section>
                    </section>
                <table class="gradesheet w-100 table-border p-0 my-0" style="border:2px solid black;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" colspan="4">Learning Areas</th>
                            <th colspan="4"> Quarterly ratings</th>
                            <th rowspan="2" style="width:12%;">Final Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show_student_grades = "SELECT mother_tounge FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grades = mysqli_query($conn, $show_student_grades);
                    ?>
                        <tr>
                            <td colspan="4" class="fw-bold subj">Mother Tongue</td>
                            <?php
                                while($grades = mysqli_fetch_array($query_student_grades)){
                            ?>
                            <td class="text-center"><?php if($grades['mother_tounge'] == 0){ echo "";
                                    }else{ echo $grades['mother_tounge'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_fil = "SELECT filipino FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_fil = mysqli_query($conn, $show_student_grade_fil);
                    ?> 
                        <tr>
                            <td colspan="4" class="fw-bold subj">Filipino</td>
                            <?php
                                while($grade_fil = mysqli_fetch_array($query_student_grade_fil)){
                            ?>
                            <td class="text-center"><?php if($grade_fil['filipino'] == 0){ echo "";
                                    }else{ echo $grade_fil['filipino'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_eng = "SELECT english FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_eng = mysqli_query($conn, $show_student_grade_eng);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">English</td>
                            <?php
                                while($grade_eng = mysqli_fetch_array($query_student_grade_eng)){
                            ?>
                            <td class="text-center"><?php if($grade_eng['english'] == 0){ echo "";
                                    }else{ echo $grade_eng['english'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_math = "SELECT math FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_math = mysqli_query($conn, $show_student_grade_math);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Mathematics</td>
                            <?php
                                while($grade_math = mysqli_fetch_array($query_student_grade_math)){
                            ?>
                            <td class="text-center"><?php if($grade_math['math'] == 0){ echo "";
                                    }else{ echo $grade_math['math'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_sci = "SELECT science FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_sci = mysqli_query($conn, $show_student_grade_sci);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Science</td>
                            <?php
                                while($grade_sci = mysqli_fetch_array($query_student_grade_sci)){
                            ?>
                            <td class="text-center"><?php if($grade_sci['science'] == 0){ echo "";
                                    }else{ echo $grade_sci['science'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ap = "SELECT araling_panlipunan FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_ap = mysqli_query($conn, $show_student_grade_ap);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Araling Panlipunan</td>
                            <?php
                                while($grade_ap = mysqli_fetch_array($query_student_grade_ap)){
                            ?>
                            <td class="text-center"><?php if($grade_ap['araling_panlipunan'] == 0){ echo "";
                                    }else{ echo $grade_ap['araling_panlipunan'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_epp = "SELECT epp_tle FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_epp = mysqli_query($conn, $show_student_grade_epp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">EPP/TLE</td>
                            <?php
                                while($grade_epp = mysqli_fetch_array($query_student_grade_epp)){
                            ?>
                            <td class="text-center"><?php if($grade_epp['epp_tle'] == 0){ echo "";
                                    }else{ echo $grade_epp['epp_tle'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_mapeh = "SELECT mapeh FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_mapeh = mysqli_query($conn, $show_student_grade_mapeh);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">MAPEH</td>
                            <?php
                                while($grade_mapeh = mysqli_fetch_array($query_student_grade_mapeh)){
                            ?>
                            <td class="text-center"><?php if($grade_mapeh['mapeh'] == 0){ echo "";
                                    }else{ echo $grade_mapeh['mapeh'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_music = "SELECT music FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_music = mysqli_query($conn, $show_student_grade_music);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Music</i></td>
                            <?php
                                while($grade_music = mysqli_fetch_array($query_student_grade_music)){
                            ?>
                            <td class="text-center"><?php if($grade_music['music'] == 0){ echo "";
                                    }else{ echo $grade_music['music'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arts = "SELECT arts FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_arts = mysqli_query($conn, $show_student_grade_arts);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Arts</i></td>
                            <?php
                                while($grade_arts = mysqli_fetch_array($query_student_grade_arts)){
                            ?>
                            <td class="text-center"><?php if($grade_arts['arts'] == 0){ echo "";
                                    }else{ echo $grade_arts['arts'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_pe = "SELECT p_e FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_pe = mysqli_query($conn, $show_student_grade_pe);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Physical Education</i></td>
                            <?php
                                while($grade_pe = mysqli_fetch_array($query_student_grade_pe)){
                            ?>
                            <td class="text-center"><?php if($grade_pe['p_e'] == 0){ echo "";
                                    }else{ echo $grade_pe['p_e'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_health = "SELECT health FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_health = mysqli_query($conn, $show_student_grade_health);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Health</i></td>
                            <?php
                                while($grade_health = mysqli_fetch_array($query_student_grade_health)){
                            ?>
                            <td class="text-center"><?php if($grade_health['health'] == 0){ echo "";
                                    }else{ echo $grade_health['health'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_esp = "SELECT edukasyon_sa_pagpapakatao FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_esp = mysqli_query($conn, $show_student_grade_esp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Eduk. sa Pagpapakatao</td>
                            <?php
                                while($grade_esp = mysqli_fetch_array($query_student_grade_esp)){
                            ?>
                            <td class="text-center"><?php if($grade_esp['edukasyon_sa_pagpapakatao'] == 0){ echo "";
                                    }else{ echo $grade_esp['edukasyon_sa_pagpapakatao'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arabic = "SELECT arabic_language FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_arabic = mysqli_query($conn, $show_student_grade_arabic);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Arabic Language</i></td>
                            <?php
                                while($grade_arabic = mysqli_fetch_array($query_student_grade_arabic)){
                            ?>
                            <td class="text-center"><?php if($grade_arabic['arabic_language'] == 0){ echo "";
                                    }else{ echo $grade_arabic['arabic_language'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_islamic_values = "SELECT islamic_values FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_islamic_values = mysqli_query($conn, $show_student_grade_islamic_values);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Islamic Values</i></td>
                            <?php
                                while($grade_islamic_values = mysqli_fetch_array($query_student_grade_islamic_values)){
                            ?>
                            <td class="text-center"><?php if($grade_islamic_values['islamic_values'] == 0){ echo "";
                                    }else{ echo $grade_islamic_values['islamic_values'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ave = "SELECT general_average FROM students_grades WHERE phase = '6' AND lrn = '123456789012'";
                    $query_student_grade_ave = mysqli_query($conn, $show_student_grade_ave);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">General Average</td>
                            <?php
                                while($grade_ave = mysqli_fetch_array($query_student_grade_ave)){
                            ?>
                            <td class="text-center"><?php if($grade_ave['general_average'] == 0){ echo "";
                                    }else{ echo $grade_ave['general_average'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="remedial-table">
                    <tr>
                        <th style="font-size:11pt; width:30%;" class="text-center">Remedial Classes</th>
                        <th colspan="4">Date Conducted:</th>
                    </tr>
                    <tr class="text-center" style="font-size: 14px;">
                        <th>Learning Areas</th>
                        <th>Final Rating</th>
                        <th>Remedial Class Mark</th>
                        <th>Recomputed Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </table>
                <!-- end of phase 6 -->
                </div>
                
                <div class="col-lg-6"> 
                    <!-- phase 7 -->
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
                    <section class="grade-header">
                    <section class="first-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">School: </label>
                                <input type="text" name="school_p1" 
                                value="<?php if(empty($term1['school'])){ 
                                    echo "";} else { echo $term1['school'];}?>"> 
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">School ID:</label>
                                <input type="text" style="width: 70%;" name="sr_school_id_p1" 
                                value="<?php if(empty($term1['sr_school_id'])){ 
                                    echo "";} else { echo $term1['sr_school_id'];}?>">
                            </span>
                        </section>
                        <section class="second-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">District:</label>
                                <input type="text" name="district_p1" 
                                value="<?php if(empty($term1['district'])){ 
                                    echo "";} else { echo $term1['district'];}?>">
                            </span>
                            <span class="hstack d-flex  align-items-center">
                                <label for="">Division:</label>
                                <input type="text" name="division_p1" 
                                value="<?php if(empty($term1['division'])){ 
                                    echo "";} else { echo $term1['division'];}?>">
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">Region:</label>
                                <input type="text" name="region_p1" 
                                value="<?php if(empty($term1['region'])){ 
                                    echo "";} else { echo $term1['region'];}?>">
                            </span>
                        </section>
                        <section class="third-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Classified as Grade: </label>
                                <input type="text" style="width: 30%;"  name="classified_as_grade_p1" 
                                value="<?php if(empty($term1['classified_as_grade'])){ 
                                    echo "";} else { echo $term1['classified_as_grade'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Section: </label>
                                <input type="text" name="section_p1" 
                                value="<?php if(empty($term1['section'])){ 
                                    echo "";} else { echo $term1['section'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-center align-items-center">
                                <label for="">School Year: </label>
                                <input type="text" style="width: 47%;" name="school_year_p1" 
                                value="<?php if(empty($term1['school_year'])){ 
                                    echo "";} else { echo $term1['school_year'];}?>">
                            </span>
                        </section>
                        <section class="fourth-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of Adviser: </label>
                                <input type="text" name="name_of_adviser_p1" 
                                value="<?php if(empty($term1['name_of_adviser'])){ 
                                    echo "";} else { echo $term1['name_of_adviser'];}?>">
                            </span>
                        </section>
                    </section>
                <table class="gradesheet w-100 table-border p-0 my-0" style="border:2px solid black;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" colspan="4">Learning Areas</th>
                            <th colspan="4"> Quarterly ratings</th>
                            <th rowspan="2" style="width:12%;">Final Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show_student_grades = "SELECT mother_tounge FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grades = mysqli_query($conn, $show_student_grades);
                    ?>
                        <tr>
                            <td colspan="4" class="fw-bold subj">Mother Tongue</td>
                            <?php
                                while($grades = mysqli_fetch_array($query_student_grades)){
                            ?>
                            <td class="text-center"><?php if($grades['mother_tounge'] == 0){ echo "";
                                    }else{ echo $grades['mother_tounge'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_fil = "SELECT filipino FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_fil = mysqli_query($conn, $show_student_grade_fil);
                    ?> 
                        <tr>
                            <td colspan="4" class="fw-bold subj">Filipino</td>
                            <?php
                                while($grade_fil = mysqli_fetch_array($query_student_grade_fil)){
                            ?>
                            <td class="text-center"><?php if($grade_fil['filipino'] == 0){ echo "";
                                    }else{ echo $grade_fil['filipino'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_eng = "SELECT english FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_eng = mysqli_query($conn, $show_student_grade_eng);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">English</td>
                            <?php
                                while($grade_eng = mysqli_fetch_array($query_student_grade_eng)){
                            ?>
                            <td class="text-center"><?php if($grade_eng['english'] == 0){ echo "";
                                    }else{ echo $grade_eng['english'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_math = "SELECT math FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_math = mysqli_query($conn, $show_student_grade_math);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Mathematics</td>
                            <?php
                                while($grade_math = mysqli_fetch_array($query_student_grade_math)){
                            ?>
                            <td class="text-center"><?php if($grade_math['math'] == 0){ echo "";
                                    }else{ echo $grade_math['math'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_sci = "SELECT science FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_sci = mysqli_query($conn, $show_student_grade_sci);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Science</td>
                            <?php
                                while($grade_sci = mysqli_fetch_array($query_student_grade_sci)){
                            ?>
                            <td class="text-center"><?php if($grade_sci['science'] == 0){ echo "";
                                    }else{ echo $grade_sci['science'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ap = "SELECT araling_panlipunan FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_ap = mysqli_query($conn, $show_student_grade_ap);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Araling Panlipunan</td>
                            <?php
                                while($grade_ap = mysqli_fetch_array($query_student_grade_ap)){
                            ?>
                            <td class="text-center"><?php if($grade_ap['araling_panlipunan'] == 0){ echo "";
                                    }else{ echo $grade_ap['araling_panlipunan'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_epp = "SELECT epp_tle FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_epp = mysqli_query($conn, $show_student_grade_epp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">EPP/TLE</td>
                            <?php
                                while($grade_epp = mysqli_fetch_array($query_student_grade_epp)){
                            ?>
                            <td class="text-center"><?php if($grade_epp['epp_tle'] == 0){ echo "";
                                    }else{ echo $grade_epp['epp_tle'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_mapeh = "SELECT mapeh FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_mapeh = mysqli_query($conn, $show_student_grade_mapeh);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">MAPEH</td>
                            <?php
                                while($grade_mapeh = mysqli_fetch_array($query_student_grade_mapeh)){
                            ?>
                            <td class="text-center"><?php if($grade_mapeh['mapeh'] == 0){ echo "";
                                    }else{ echo $grade_mapeh['mapeh'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_music = "SELECT music FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_music = mysqli_query($conn, $show_student_grade_music);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Music</i></td>
                            <?php
                                while($grade_music = mysqli_fetch_array($query_student_grade_music)){
                            ?>
                            <td class="text-center"><?php if($grade_music['music'] == 0){ echo "";
                                    }else{ echo $grade_music['music'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arts = "SELECT arts FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_arts = mysqli_query($conn, $show_student_grade_arts);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Arts</i></td>
                            <?php
                                while($grade_arts = mysqli_fetch_array($query_student_grade_arts)){
                            ?>
                            <td class="text-center"><?php if($grade_arts['arts'] == 0){ echo "";
                                    }else{ echo $grade_arts['arts'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_pe = "SELECT p_e FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_pe = mysqli_query($conn, $show_student_grade_pe);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Physical Education</i></td>
                            <?php
                                while($grade_pe = mysqli_fetch_array($query_student_grade_pe)){
                            ?>
                            <td class="text-center"><?php if($grade_pe['p_e'] == 0){ echo "";
                                    }else{ echo $grade_pe['p_e'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_health = "SELECT health FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_health = mysqli_query($conn, $show_student_grade_health);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Health</i></td>
                            <?php
                                while($grade_health = mysqli_fetch_array($query_student_grade_health)){
                            ?>
                            <td class="text-center"><?php if($grade_health['health'] == 0){ echo "";
                                    }else{ echo $grade_health['health'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_esp = "SELECT edukasyon_sa_pagpapakatao FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_esp = mysqli_query($conn, $show_student_grade_esp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Eduk. sa Pagpapakatao</td>
                            <?php
                                while($grade_esp = mysqli_fetch_array($query_student_grade_esp)){
                            ?>
                            <td class="text-center"><?php if($grade_esp['edukasyon_sa_pagpapakatao'] == 0){ echo "";
                                    }else{ echo $grade_esp['edukasyon_sa_pagpapakatao'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arabic = "SELECT arabic_language FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_arabic = mysqli_query($conn, $show_student_grade_arabic);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Arabic Language</i></td>
                            <?php
                                while($grade_arabic = mysqli_fetch_array($query_student_grade_arabic)){
                            ?>
                            <td class="text-center"><?php if($grade_arabic['arabic_language'] == 0){ echo "";
                                    }else{ echo $grade_arabic['arabic_language'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_islamic_values = "SELECT islamic_values FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_islamic_values = mysqli_query($conn, $show_student_grade_islamic_values);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Islamic Values</i></td>
                            <?php
                                while($grade_islamic_values = mysqli_fetch_array($query_student_grade_islamic_values)){
                            ?>
                            <td class="text-center"><?php if($grade_islamic_values['islamic_values'] == 0){ echo "";
                                    }else{ echo $grade_islamic_values['islamic_values'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ave = "SELECT general_average FROM students_grades WHERE phase = '7' AND lrn = '123456789012'";
                    $query_student_grade_ave = mysqli_query($conn, $show_student_grade_ave);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">General Average</td>
                            <?php
                                while($grade_ave = mysqli_fetch_array($query_student_grade_ave)){
                            ?>
                            <td class="text-center"><?php if($grade_ave['general_average'] == 0){ echo "";
                                    }else{ echo $grade_ave['general_average'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="remedial-table">
                    <tr>
                        <th style="font-size:11pt; width:30%;" class="text-center">Remedial Classes</th>
                        <th colspan="4">Date Conducted:</th>
                    </tr>
                    <tr class="text-center" style="font-size: 14px;">
                        <th>Learning Areas</th>
                        <th>Final Rating</th>
                        <th>Remedial Class Mark</th>
                        <th>Recomputed Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </table>
                <!-- end of phase 7 -->
                </div>
                
                <div class="col-lg-6"> 
                    <!-- phase 8 -->
                    <?php
                        $sql_phase_1_record = "SELECT * FROM scholastic_records
                            LEFT JOIN students_grades on scholastic_records.lrn = students_grades.lrn
                            LEFT JOIN remedial_classes on scholastic_records.lrn = remedial_classes.lrn
                            WHERE scholastic_records.lrn = '$decrypted_lrn' AND students_grades.phase = '8'
                            AND students_grades.term = '8' AND remedial_classes.phase = '8'
                            AND scholastic_records.phase = '8'";
                        $query_phase_1_record = mysqli_query($conn, $sql_phase_1_record);
                        if(mysqli_num_rows($query_phase_1_record) > 0){ 
                            $term1 = mysqli_fetch_array($query_phase_1_record);
                        }
                    ?>
                    <section class="grade-header">
                    <section class="first-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">School: </label>
                                <input type="text" name="school_p1" 
                                value="<?php if(empty($term1['school'])){ 
                                    echo "";} else { echo $term1['school'];}?>"> 
                            </span>
                            <span class="hstack d-flex justify-content-end align-items-center">
                                <label for="">School ID:</label>
                                <input type="text" style="width: 70%;" name="sr_school_id_p1" 
                                value="<?php if(empty($term1['sr_school_id'])){ 
                                    echo "";} else { echo $term1['sr_school_id'];}?>">
                            </span>
                        </section>
                        <section class="second-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">District:</label>
                                <input type="text" name="district_p1" 
                                value="<?php if(empty($term1['district'])){ 
                                    echo "";} else { echo $term1['district'];}?>">
                            </span>
                            <span class="hstack d-flex  align-items-center">
                                <label for="">Division:</label>
                                <input type="text" name="division_p1" 
                                value="<?php if(empty($term1['division'])){ 
                                    echo "";} else { echo $term1['division'];}?>">
                            </span>
                            <span class="hstack d-flex align-items-center">
                                <label for="">Region:</label>
                                <input type="text" name="region_p1" 
                                value="<?php if(empty($term1['region'])){ 
                                    echo "";} else { echo $term1['region'];}?>">
                            </span>
                        </section>
                        <section class="third-row">
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Classified as Grade: </label>
                                <input type="text" style="width: 30%;"  name="classified_as_grade_p1" 
                                value="<?php if(empty($term1['classified_as_grade'])){ 
                                    echo "";} else { echo $term1['classified_as_grade'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-start align-items-center">
                                <label for="">Section: </label>
                                <input type="text" name="section_p1" 
                                value="<?php if(empty($term1['section'])){ 
                                    echo "";} else { echo $term1['section'];}?>">
                            </span>
                            <span class="hstack d-flex justify-content-center align-items-center">
                                <label for="">School Year: </label>
                                <input type="text" style="width: 47%;" name="school_year_p1" 
                                value="<?php if(empty($term1['school_year'])){ 
                                    echo "";} else { echo $term1['school_year'];}?>">
                            </span>
                        </section>
                        <section class="fourth-row">
                            <span class="hstack d-flex align-items-center">
                                <label for="">Name of Adviser: </label>
                                <input type="text" name="name_of_adviser_p1" 
                                value="<?php if(empty($term1['name_of_adviser'])){ 
                                    echo "";} else { echo $term1['name_of_adviser'];}?>">
                            </span>
                        </section>
                    </section>
                <table class="gradesheet w-100 table-border p-0 my-0" style="border:2px solid black;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" colspan="4">Learning Areas</th>
                            <th colspan="4"> Quarterly ratings</th>
                            <th rowspan="2" style="width:12%;">Final Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>4th</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show_student_grades = "SELECT mother_tounge FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grades = mysqli_query($conn, $show_student_grades);
                    ?>
                        <tr>
                            <td colspan="4" class="fw-bold subj">Mother Tongue</td>
                            <?php
                                while($grades = mysqli_fetch_array($query_student_grades)){
                            ?>
                            <td class="text-center"><?php if($grades['mother_tounge'] == 0){ echo "";
                                    }else{ echo $grades['mother_tounge'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_fil = "SELECT filipino FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_fil = mysqli_query($conn, $show_student_grade_fil);
                    ?> 
                        <tr>
                            <td colspan="4" class="fw-bold subj">Filipino</td>
                            <?php
                                while($grade_fil = mysqli_fetch_array($query_student_grade_fil)){
                            ?>
                            <td class="text-center"><?php if($grade_fil['filipino'] == 0){ echo "";
                                    }else{ echo $grade_fil['filipino'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_eng = "SELECT english FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_eng = mysqli_query($conn, $show_student_grade_eng);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">English</td>
                            <?php
                                while($grade_eng = mysqli_fetch_array($query_student_grade_eng)){
                            ?>
                            <td class="text-center"><?php if($grade_eng['english'] == 0){ echo "";
                                    }else{ echo $grade_eng['english'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_math = "SELECT math FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_math = mysqli_query($conn, $show_student_grade_math);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Mathematics</td>
                            <?php
                                while($grade_math = mysqli_fetch_array($query_student_grade_math)){
                            ?>
                            <td class="text-center"><?php if($grade_math['math'] == 0){ echo "";
                                    }else{ echo $grade_math['math'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_sci = "SELECT science FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_sci = mysqli_query($conn, $show_student_grade_sci);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Science</td>
                            <?php
                                while($grade_sci = mysqli_fetch_array($query_student_grade_sci)){
                            ?>
                            <td class="text-center"><?php if($grade_sci['science'] == 0){ echo "";
                                    }else{ echo $grade_sci['science'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ap = "SELECT araling_panlipunan FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_ap = mysqli_query($conn, $show_student_grade_ap);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Araling Panlipunan</td>
                            <?php
                                while($grade_ap = mysqli_fetch_array($query_student_grade_ap)){
                            ?>
                            <td class="text-center"><?php if($grade_ap['araling_panlipunan'] == 0){ echo "";
                                    }else{ echo $grade_ap['araling_panlipunan'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_epp = "SELECT epp_tle FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_epp = mysqli_query($conn, $show_student_grade_epp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">EPP/TLE</td>
                            <?php
                                while($grade_epp = mysqli_fetch_array($query_student_grade_epp)){
                            ?>
                            <td class="text-center"><?php if($grade_epp['epp_tle'] == 0){ echo "";
                                    }else{ echo $grade_epp['epp_tle'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_mapeh = "SELECT mapeh FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_mapeh = mysqli_query($conn, $show_student_grade_mapeh);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">MAPEH</td>
                            <?php
                                while($grade_mapeh = mysqli_fetch_array($query_student_grade_mapeh)){
                            ?>
                            <td class="text-center"><?php if($grade_mapeh['mapeh'] == 0){ echo "";
                                    }else{ echo $grade_mapeh['mapeh'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_music = "SELECT music FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_music = mysqli_query($conn, $show_student_grade_music);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Music</i></td>
                            <?php
                                while($grade_music = mysqli_fetch_array($query_student_grade_music)){
                            ?>
                            <td class="text-center"><?php if($grade_music['music'] == 0){ echo "";
                                    }else{ echo $grade_music['music'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arts = "SELECT arts FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_arts = mysqli_query($conn, $show_student_grade_arts);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Arts</i></td>
                            <?php
                                while($grade_arts = mysqli_fetch_array($query_student_grade_arts)){
                            ?>
                            <td class="text-center"><?php if($grade_arts['arts'] == 0){ echo "";
                                    }else{ echo $grade_arts['arts'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_pe = "SELECT p_e FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_pe = mysqli_query($conn, $show_student_grade_pe);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Physical Education</i></td>
                            <?php
                                while($grade_pe = mysqli_fetch_array($query_student_grade_pe)){
                            ?>
                            <td class="text-center"><?php if($grade_pe['p_e'] == 0){ echo "";
                                    }else{ echo $grade_pe['p_e'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_health = "SELECT health FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_health = mysqli_query($conn, $show_student_grade_health);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj"><i>Health</i></td>
                            <?php
                                while($grade_health = mysqli_fetch_array($query_student_grade_health)){
                            ?>
                            <td class="text-center"><?php if($grade_health['health'] == 0){ echo "";
                                    }else{ echo $grade_health['health'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_esp = "SELECT edukasyon_sa_pagpapakatao FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_esp = mysqli_query($conn, $show_student_grade_esp);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">Eduk. sa Pagpapakatao</td>
                            <?php
                                while($grade_esp = mysqli_fetch_array($query_student_grade_esp)){
                            ?>
                            <td class="text-center"><?php if($grade_esp['edukasyon_sa_pagpapakatao'] == 0){ echo "";
                                    }else{ echo $grade_esp['edukasyon_sa_pagpapakatao'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_arabic = "SELECT arabic_language FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_arabic = mysqli_query($conn, $show_student_grade_arabic);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Arabic Language</i></td>
                            <?php
                                while($grade_arabic = mysqli_fetch_array($query_student_grade_arabic)){
                            ?>
                            <td class="text-center"><?php if($grade_arabic['arabic_language'] == 0){ echo "";
                                    }else{ echo $grade_arabic['arabic_language'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_islamic_values = "SELECT islamic_values FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_islamic_values = mysqli_query($conn, $show_student_grade_islamic_values);
                    ?> 
                        </tr>
                            <td colspan="4" class="subj">*Islamic Values</i></td>
                            <?php
                                while($grade_islamic_values = mysqli_fetch_array($query_student_grade_islamic_values)){
                            ?>
                            <td class="text-center"><?php if($grade_islamic_values['islamic_values'] == 0){ echo "";
                                    }else{ echo $grade_islamic_values['islamic_values'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    <?php
                    $show_student_grade_ave = "SELECT general_average FROM students_grades WHERE phase = '8' AND lrn = '123456789012'";
                    $query_student_grade_ave = mysqli_query($conn, $show_student_grade_ave);
                    ?> 
                        </tr>
                            <td colspan="4" class="fw-bold subj">General Average</td>
                            <?php
                                while($grade_ave = mysqli_fetch_array($query_student_grade_ave)){
                            ?>
                            <td class="text-center"><?php if($grade_ave['general_average'] == 0){ echo "";
                                    }else{ echo $grade_ave['general_average'];}?></td>
                            <?php
                            }
                            ?>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="remedial-table">
                    <tr>
                        <th style="font-size:11pt; width:30%;" class="text-center">Remedial Classes</th>
                        <th colspan="4">Date Conducted:</th>
                    </tr>
                    <tr class="text-center" style="font-size: 14px;">
                        <th>Learning Areas</th>
                        <th>Final Rating</th>
                        <th>Remedial Class Mark</th>
                        <th>Recomputed Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                </table>
                <!-- end of phase 8 -->
                </div>
                <div class="col-lg-12 p-0">
                    <p class="fw-bold m-0">For Transfer Out /Elementary School Completer Only</p>
                    <section class="certification-box">
                        <h6 class="text-center py-1 " style="background: #ddd; border:none;">CERTIFICATION</h6>
                            <span class="cert-card px-lg-4 ">
                                <span class="d-flex flex-row align-items-center">
                                    <label>I CERTIFY that this is a true record of</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span class="hstack d-flex justify-content-end align-items-end">
                                    <label>with LRN</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span>
                                    <label>and that he/she is eligible for admission to Grade </label>
                                    <input type="text" size="4" style="width: auto;">
                                </span> 
                            </span>
                            <span class="d-flex flex-row justify-content-start align-items-center px-lg-4">
                                <span class="d-flex flex-row align-items-center justify-content-end">
                                    <label>School Name: </label>
                                    <input type="text" style="width: auto;" name="" id="">
                                </span>
                                <span class="hstack d-flex justify-content-center align-items-end">
                                    <label>School ID</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span>
                                    <label>Division</label>
                                    <input type="text" size="4">
                                </span> 
                                <span class="hstack d-flex justify-content-center align-items-end">
                                    <label>Last School Year Attended:</label>
                                    <input type="text" name="" id="">
                                </span>
                            </span>
                            <div class="container pt-5">
                                <div class="row ">
                                    <div class="col-3">
                                        <span class="vstack d-flex flex-column-reverse text-center">
                                            <label for="" class="">Date</label>
                                            <input type="text">
                                        </span>
                                    </div>
                                    <div class="col-5">
                                        <span class="vstack d-flex flex-column-reverse">
                                            <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                            <input type="text">
                                        </span>
                                    </div>
                                    <div class="col-4" style="display:grid; place-items:end;">
                                        <p style="font-size: 14px; font-weight:600; padding:0; margin:0;">(Affix School Seal here)</p>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
                <div class="col-lg-12 p-0">
                    <section class="certification-box">
                        <h6 class="text-center py-1 " style="background: #ddd; border:none;">CERTIFICATION</h6>
                            <span class="cert-card px-lg-4 ">
                                <span class="d-flex flex-row align-items-center">
                                    <label>I CERTIFY that this is a true record of</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span class="hstack d-flex justify-content-end align-items-end">
                                    <label>with LRN</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span>
                                    <label>and that he/she is eligible for admission to Grade </label>
                                    <input type="text" size="4" style="width: auto;">
                                </span> 
                            </span>
                            <span class="d-flex flex-row justify-content-start align-items-center px-lg-4">
                                <span class="d-flex flex-row align-items-center justify-content-end">
                                    <label>School Name: </label>
                                    <input type="text" style="width: auto;" name="" id="">
                                </span>
                                <span class="hstack d-flex justify-content-center align-items-end">
                                    <label>School ID</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span>
                                    <label>Division</label>
                                    <input type="text" size="4">
                                </span> 
                                <span class="hstack d-flex justify-content-center align-items-end">
                                    <label>Last School Year Attended:</label>
                                    <input type="text" name="" id="">
                                </span>
                            </span>
                            <div class="container pt-5">
                                <div class="row ">
                                    <div class="col-3">
                                        <span class="vstack d-flex flex-column-reverse text-center">
                                            <label for="" class="">Date</label>
                                            <input type="text">
                                        </span>
                                    </div>
                                    <div class="col-5">
                                        <span class="vstack d-flex flex-column-reverse">
                                            <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                            <input type="text">
                                        </span>
                                    </div>
                                    <div class="col-4" style="display:grid; place-items:end;">
                                        <p style="font-size: 14px; font-weight:600; padding:0; margin:0;">(Affix School Seal here)</p>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
                <div class="col-lg-12 p-0">
                    <section class="certification-box">
                        <h6 class="text-center py-1 " style="background: #ddd; border:none;">CERTIFICATION</h6>
                            <span class="cert-card px-lg-4 ">
                                <span class="d-flex flex-row align-items-center">
                                    <label>I CERTIFY that this is a true record of</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span class="hstack d-flex justify-content-end align-items-end">
                                    <label>with LRN</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span>
                                    <label>and that he/she is eligible for admission to Grade </label>
                                    <input type="text" size="4" style="width: auto;">
                                </span> 
                            </span>
                            <span class="d-flex flex-row justify-content-start align-items-center px-lg-4">
                                <span class="d-flex flex-row align-items-center justify-content-end">
                                    <label>School Name: </label>
                                    <input type="text" style="width: auto;" name="" id="">
                                </span>
                                <span class="hstack d-flex justify-content-center align-items-end">
                                    <label>School ID</label>
                                    <input type="text" name="" id="">
                                </span>
                                <span>
                                    <label>Division</label>
                                    <input type="text" size="4">
                                </span> 
                                <span class="hstack d-flex justify-content-center align-items-end">
                                    <label>Last School Year Attended:</label>
                                    <input type="text" name="" id="">
                                </span>
                            </span>
                            <div class="container pt-5">
                                <div class="row ">
                                    <div class="col-3">
                                        <span class="vstack d-flex flex-column-reverse text-center">
                                            <label for="" class="">Date</label>
                                            <input type="text">
                                        </span>
                                    </div>
                                    <div class="col-5">
                                        <span class="vstack d-flex flex-column-reverse">
                                            <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                            <input type="text">
                                        </span>
                                    </div>
                                    <div class="col-4" style="display:grid; place-items:end;">
                                        <p style="font-size: 14px; font-weight:600; padding:0; margin:0;">(Affix School Seal here)</p>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </div>
        <input type="button" name="previous" class="previous-form btn btn-light" value="Previous" />        
        </fieldset>
        <button class="btn btn-primary" style="float:right;" type="submit" name="update">Update</button>
    </form>
<script src="src/js/stepper.js"></script>
</body>
</html>

<?php

    if(isset($_POST['']))
// SELECT * FROM learners_personal_infos 
// LEFT JOIN remedial_classes ON learners_personal_infos.lrn = remedial_classes.lrn 
// LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = remedial_classes.lrn
// LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn
// LEFT JOIN students_grades ON learners_personal_infos.lrn = scholastic_records.lrn
// LEFT JOIN certifications ON learners_personal_infos.lrn = scholastic_records.lrn
// WHERE learners_personal_infos.lrn = '109857060083'


ob_flush();
?>