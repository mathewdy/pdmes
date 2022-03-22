


<?php
include('connection.php');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

if(isset($_GET['lrn'])){
    $lrn = $_GET['lrn'];


    



    //learners personal infos
$learners_query = "SELECT * FROM learners_personal_infos 
LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn
LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn 
WHERE learners_personal_infos.lrn = '$lrn'";
$run_learners_query = mysqli_query($conn, $learners_query);
    if(mysqli_num_rows($run_learners_query) > 0){
        $rows = mysqli_fetch_array($run_learners_query);

$html='
    


   
    
    

    ';


                // SCHOLASTIC RECORDS


        
    while(mysqli_fetch_array($run_learners_query));

    
    $html.='

    <h2>LEARNER`S PERSONAL INFORMATION </h2>
    <label for="">LASTNAME: '.$rows['last_name'].' </label> <br>
    <label for="">FIRSTNAME: '.$rows['first_name'].' </label> <br>
    <label for="">MIDDLENAME: '.$rows['middle_name'].' </label><br>
    <label for="">NAMEEXTN(JR,I,II): '.$rows['suffix'].' </label><br>
    <label for="">Birthdate(mm/yy/dd): '.$rows['birth_date'].' </label><br>
    <label for="">Sex: '.$rows['sex'].' </label><br>
    <h2> ELIGIBITY FOR ELEMENTARY SCHOOL ENROLLMENT </h2>
    <label for="">Credential Presented for grade 1: '.$rows['credential_presented'].' </label><br>
    <label for="">Name of School: '.$rows['name_of_school'].' </label><br>
    <label for="">School ID: '.$rows['school_id'].' </label><br>
    <label for="">Address of School: '.$rows['address_of_school'].' </label><br>
    <label for="">others: '.$rows['others'].' </label><br>
      
    <h2>SCHOLASTIC RECORDS </h2>
    <label for="">School: '.$rows['school'].' </label> <br>
    <label for="">School ID: '.$rows['school'].' </label> <br>
    <label for="">District: '.$rows['school'].' </label><br>
    <label for="">Disivision: '.$rows['school'].' </label><br>
    <label for="">Region: '.$rows['school'].' </label><br>
    <label for="">Classified as Grade: '.$rows['school'].' </label><br>
    <label for="">Section: '.$rows['section'].' </label><br>
    <label for="">School year: '.$rows['school_year'].' </label><br>
    <label for="">Name of adviser: '.$rows['name_of_adviser'].' </label><br>
      ';
    
    }

                        //PHASE 1 

    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '1' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       // 1ST QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='
        <h2> PHASE 1 </h2>
        <h2> 1 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }

    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '1' AND students_grades.term = '2' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

        //2ND QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 2 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }


    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '1' AND students_grades.term = '3' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

        // 3RD QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 3 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }


    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '1' AND students_grades.term = '4' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       //4TH QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 4 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '1' AND students_grades.term = '5' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       //5TH QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> FINAL RATING </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

        <h5> Remedial Classes </h5> 
        <label for="">Conducted From: '.$rows['date_from'].' </label> <br>
        <label for="">To: '.$rows['date_to'].' </label> <br>
        <label for="">Learning Areas: '.$rows['learning_areas'].' </label> <br>
        <label for="">Remedial Class mark: '.$rows['remedial_class_mark'].' </label> <br>
        <label for="">Recomputed Final Grade: '.$rows['recomputed_final_grade'].' </label>  <br>
        <label for="">Remarks '.$rows['remarks'].' </label> 

    
        


    ';


    }


 //----------------------------------------------PHASE 2-----------------------------------------------

    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$lrn' 
    AND students_grades.phase = '2' AND students_grades.term = '2' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       // 1ST QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <br>

        <h2> PHASE 2 </h2>

        <h2> 1 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }

    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '2' AND students_grades.term = '2' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

        //2ND QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 2 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }


    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '2' AND students_grades.term = '3' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

        // 3RD QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 3 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }


    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '2' AND students_grades.term = '4' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       //4TH QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 4 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }
    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '2' AND students_grades.term = '5' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       //5TH QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> FINAL RATING </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

        <h5> Remedial Classes </h5>
        <label for="">Conducted From: '.$rows['date_from'].' </label> <br>
        <label for="">To: '.$rows['date_to'].' </label> <br>
        <label for="">Learning Areas: '.$rows['learning_areas'].' </label> <br>
        <label for="">Remedial Class mark: '.$rows['remedial_class_mark'].' </label> <br>
        <label for="">Recomputed Final Grade: '.$rows['recomputed_final_grade'].' </label> <br>
        <label for="">Remarks: '.$rows['learning_areas'].' </label> <br>
        
    ';


    }



    //----------------------------------------------PHASE 3-----------------------------------------------

    $phase3_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$lrn' 
    AND students_grades.phase = '3' AND students_grades.term = '1' AND remedial_classes.phase = '3'";
    $run = mysqli_query($conn, $phase3_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       // 1ST QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='
        <h2> PHASE 3 </h2>
        <h2> 1 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }

    $phase3_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '3' AND students_grades.term = '2' AND remedial_classes.phase = '3'";
    $run = mysqli_query($conn, $phase3_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

        //2ND QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 2 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }


    $phase3_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '3' AND students_grades.term = '3' AND remedial_classes.phase = '3'";
    $run = mysqli_query($conn, $phase3_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

        // 3RD QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 3 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }


    $phase3_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '3' AND students_grades.term = '4' AND remedial_classes.phase = '3'";
    $run = mysqli_query($conn, $phase3_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       //4TH QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> 4 </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

    ';


    }
    $phase3_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '123456789012' 
    AND students_grades.phase = '3' AND students_grades.term = '5' AND remedial_classes.phase = '3'";
    $run = mysqli_query($conn, $phase3_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

       //5TH QUARTER
        
        //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
        

        $html.='

        <h2> FINAL RATING </h2>
        <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
        <label for="">Filipino: '.$rows['filipino'].' </label> <br>
        <label for="">English: '.$rows['english'].' </label> <br>
        <label for="">Math: '.$rows['math'].' </label> <br>
        <label for="">Sciense: '.$rows['science'].' </label> <br>
        <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
        <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
        <label for="">MAPEH: '.$rows['music'].' </label> <br>
        <label for="">Music: '.$rows['music'].' </label> <br>
        <label for="">Arts: '.$rows['arts'].' </label> <br>
        <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
        <label for="">Health: '.$rows['health'].' </label> <br>
        <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
        <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
        <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
        <label for="">General average: '.$rows['general_average'].' </label> <br>

        <h5> Remedial Classes </h5> 
        <label for="">Conducted From: '.$rows['date_from'].' </label> <br>
        <label for="">To: '.$rows['date_to'].' </label> <br>
        <label for="">Learning Areas '.$rows['learning_areas'].' </label> <br>
        <label for="">Remedial Class mark: '.$rows['remedial_class_mark'].' </label> <br>
        <label for="">Recomputed Final Grade: '.$rows['recomputed_final_grade'].' </label>  <br>
        <label for="">Remarks: '.$rows['remarks'].' </label> 

    
        


    ';

    }

//----------------------------------------------PHASE 4-----------------------------------------------

   

$phase4_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '$lrn' 
AND students_grades.phase = '4' AND students_grades.term = '1' AND remedial_classes.phase = '4'";
$run = mysqli_query($conn, $phase4_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   // 1ST QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='
    <h2> PHASE 4 </h2>
    <h2> 1 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}

$phase4_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '4' AND students_grades.term = '2' AND remedial_classes.phase = '4'";
$run = mysqli_query($conn, $phase4_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    //2ND QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 2 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase4_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '4' AND students_grades.term = '3' AND remedial_classes.phase = '4'";
$run = mysqli_query($conn, $phase4_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    // 3RD QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 3 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase4_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '4' AND students_grades.term = '4' AND remedial_classes.phase = '4'";
$run = mysqli_query($conn, $phase4_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //4TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 4 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}
$phase4_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '4' AND students_grades.term = '5' AND remedial_classes.phase = '4'";
$run = mysqli_query($conn, $phase4_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //5TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> FINAL RATING </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

    <h5> Remedial Classes </h5> 
    <label for="">Conducted From: '.$rows['date_from'].' </label> <br>
    <label for="">To: '.$rows['date_to'].' </label> <br>
    <label for="">Learning Areas '.$rows['learning_areas'].' </label> <br>
    <label for="">Remedial Class mark '.$rows['remedial_class_mark'].' </label> <br>
    <label for="">Recomputed Final Grade '.$rows['recomputed_final_grade'].' </label>  <br>
    <label for="">Remarks '.$rows['learning_areas'].' </label> 


    


';
        }


 //----------------------------------------------PHASE 5-----------------------------------------------

   

$phase5_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '$lrn' 
AND students_grades.phase = '5' AND students_grades.term = '1' AND remedial_classes.phase = '5'";
$run = mysqli_query($conn, $phase5_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   // 1ST QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='
    <h2> PHASE 5 </h2>
    <h2> 1 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}

$phase5_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '5' AND students_grades.term = '2' AND remedial_classes.phase = '5'";
$run = mysqli_query($conn, $phase5_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    //2ND QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 2 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase5_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '5' AND students_grades.term = '3' AND remedial_classes.phase = '5'";
$run = mysqli_query($conn, $phase5_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    // 3RD QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 3 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase5_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '5' AND students_grades.term = '4' AND remedial_classes.phase = '5'";
$run = mysqli_query($conn, $phase5_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //4TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 4 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}
$phase5_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '5' AND students_grades.term = '5' AND remedial_classes.phase = '5'";
$run = mysqli_query($conn, $phase5_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //5TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> FINAL RATING </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

    <h5> Remedial Classes </h5> 
    <label for="">Conducted From: '.$rows['date_from'].' </label> <br>
    <label for="">To: '.$rows['date_to'].' </label> <br>
    <label for="">Learning Areas: '.$rows['learning_areas'].' </label> <br>
    <label for="">Remedial Class mark: '.$rows['remedial_class_mark'].' </label> <br>
    <label for="">Recomputed Final Grade: '.$rows['recomputed_final_grade'].' </label>  <br>
    <label for="">Remarks '.$rows['remarks'].' </label> 


    


';
        }


//----------------------------------------------PHASE 6-----------------------------------------------

   

$phase6_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '$lrn' 
AND students_grades.phase = '6' AND students_grades.term = '1' AND remedial_classes.phase = '6'";
$run = mysqli_query($conn, $phase6_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   // 1ST QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='
    <h2> PHASE 6 </h2> 
    <h2> 1 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}

$phase6_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '6' AND students_grades.term = '2' AND remedial_classes.phase = '6'";
$run = mysqli_query($conn, $phase6_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    //2ND QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 2 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase6_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '6' AND students_grades.term = '3' AND remedial_classes.phase = '6'";
$run = mysqli_query($conn, $phase6_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    // 3RD QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 3 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase6_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '6' AND students_grades.term = '4' AND remedial_classes.phase = '6'";
$run = mysqli_query($conn, $phase6_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //4TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 4 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}
$phase6_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '6' AND students_grades.term = '5' AND remedial_classes.phase = '6'";
$run = mysqli_query($conn, $phase6_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //5TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> FINAL RATING </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

    <h5> Remedial Classes </h5> 
    <label for="">Conducted From: '.$rows['date_from'].' </label> <br>
    <label for="">To: '.$rows['date_to'].' </label> <br>
    <label for="">Learning Areas: '.$rows['learning_areas'].' </label> <br>
    <label for="">Remedial Class mark: '.$rows['remedial_class_mark'].' </label> <br>
    <label for="">Recomputed Final Grade: '.$rows['recomputed_final_grade'].' </label>  <br>
    <label for="">Remarks '.$rows['remarks'].' </label> 

';
        }







//-------------------------------------phase 7 ------------------------------------------------------

$phase7_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '$lrn' 
AND students_grades.phase = '7' AND students_grades.term = '1' AND remedial_classes.phase = '7'";
$run = mysqli_query($conn, $phase7_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   // 1ST QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='
    <h2> PHASE 7 </h2>
    <h2> 1 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}

$phase7_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '7' AND students_grades.term = '2' AND remedial_classes.phase = '7'";
$run = mysqli_query($conn, $phase7_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    //2ND QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 2 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase7_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '7' AND students_grades.term = '3' AND remedial_classes.phase = '7'";
$run = mysqli_query($conn, $phase7_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    // 3RD QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 3 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase7_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '7' AND students_grades.term = '4' AND remedial_classes.phase = '7'";
$run = mysqli_query($conn, $phase7_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //4TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 4 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}
$phase7_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '7' AND students_grades.term = '5' AND remedial_classes.phase = '7'";
$run = mysqli_query($conn, $phase7_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //5TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> FINAL RATING </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

    <h5> Remedial Classes </h5> 
    <label for="">Conducted From: '.$rows['date_from'].' </label> <br>
    <label for="">To: '.$rows['date_to'].' </label> <br>
    <label for="">Learning Areas: '.$rows['learning_areas'].' </label> <br>
    <label for="">Remedial Class mark: '.$rows['remedial_class_mark'].' </label> <br>
    <label for="">Recomputed Final Grade: '.$rows['recomputed_final_grade'].' </label>  <br>
    <label for="">Remarks '.$rows['remarks'].' </label> 

';
        }



//-------------------------------------phase 8 ------------------------------------------------------

$phase8_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '$lrn' 
AND students_grades.phase = '8' AND students_grades.term = '1' AND remedial_classes.phase = '8'";
$run = mysqli_query($conn, $phase8_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   // 1ST QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> PHASE 8 </h2>
    <h2> 1 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}

$phase8_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '8' AND students_grades.term = '2' AND remedial_classes.phase = '8'";
$run = mysqli_query($conn, $phase8_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    //2ND QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 2 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase8_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '8' AND students_grades.term = '3' AND remedial_classes.phase = '8'";
$run = mysqli_query($conn, $phase8_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    // 3RD QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 3 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}


$phase8_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '8' AND students_grades.term = '4' AND remedial_classes.phase = '8'";
$run = mysqli_query($conn, $phase8_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //4TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> 4 </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

';


}
$phase8_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '123456789012' 
AND students_grades.phase = '8' AND students_grades.term = '5' AND remedial_classes.phase = '8'";
$run = mysqli_query($conn, $phase8_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

   //5TH QUARTER
    
    //KULANG NG MAPEH ITO PANSAMANTALA ANG MUSIC NA GRADE
    

    $html.='

    <h2> FINAL RATING </h2>
    <label for="">Mothertounge: '.$rows['mother_tounge'].' </label> <br>
    <label for="">Filipino: '.$rows['filipino'].' </label> <br>
    <label for="">English: '.$rows['english'].' </label> <br>
    <label for="">Math: '.$rows['math'].' </label> <br>
    <label for="">Sciense: '.$rows['science'].' </label> <br>
    <label for="">Araling Panlipunan: '.$rows['araling_panlipunan'].' </label> <br>
    <label for="">EPP/TLE: '.$rows['epp_tle'].' </label> <br>
    <label for="">MAPEH: '.$rows['music'].' </label> <br>
    <label for="">Music: '.$rows['music'].' </label> <br>
    <label for="">Arts: '.$rows['arts'].' </label> <br>
    <label for="">Physical Education: '.$rows['p_e'].' </label> <br>
    <label for="">Health: '.$rows['health'].' </label> <br>
    <label for="">Eduk. sa Pagpapakatao: '.$rows['edukasyon_sa_pagpapakatao'].' </label> <br>
    <label for="">Arabic Language: '.$rows['arabic_language'].' </label> <br>
    <label for="">Islamic Values Education: '.$rows['islamic_values'].' </label <br>
    <label for="">General average: '.$rows['general_average'].' </label> <br>

    <h5> Remedial Classes </h5> 
    <label for="">Conducted From: '.$rows['date_from'].' </label> <br>
    <label for="">To: '.$rows['date_to'].' </label> <br>
    <label for="">Learning Areas: '.$rows['learning_areas'].' </label> <br>
    <label for="">Remedial Class mark: '.$rows['remedial_class_mark'].' </label> <br>
    <label for="">Recomputed Final Grade: '.$rows['recomputed_final_grade'].' </label>  <br>
    <label for="">Remarks '.$rows['remarks'].' </label> 



    
';
        }



}



        


        
      








   


        

        $dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Legal', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("$lrn", Array("Attachment" =>0));    
?>