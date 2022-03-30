
<?php
include('connection.php');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
 
if(isset($_GET['sid'])){
    foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
        $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
        $decrypted_lrn = ((($decrypt_lrn*859475)/5977)/123456789);
    }
    if(empty($_GET['sid'])){
        echo "<script>window.location.href='index.php'</script>";
      }



    $validate = "SELECT lrn FROM learners_personal_infos WHERE learners_personal_infos.lrn = '$decrypted_lrn'";
    $vali = mysqli_query($conn, $validate);
    if(mysqli_num_rows($vali) == 0){
    
        echo "<script>alert('LRN does not exist');
        window.location.href='index.php';</script>";
        exit();
    }
   



    //learners personal infos
$learners_query = "SELECT * FROM learners_personal_infos 
LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn
LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn 
WHERE learners_personal_infos.lrn = '$decrypted_lrn'";
$run_learners_query = mysqli_query($conn, $learners_query);
    if(mysqli_num_rows($run_learners_query) > 0){
        $rows = mysqli_fetch_array($run_learners_query);
        
$html ='<link rel="stylesheet" href="../pdmes/bootstrap-5.1.1-dist/css/bootstrap.css">';

$html='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <title>PDMES</title>
</head>

<style  type="text/css" media="all">
*{
    font-family:Arial, sans-serif;
}
table{
    border:1px solid black;
}

th{
    text-align:center;
}

td{
    text-align:center;
 }

 .

.quarters {
    border:1px solid black;
}

.quarters th{
    border:1px solid black;
    left:40%;
}
tbody td{
    border:1px solid black;
}

tr{
    border:1px solid black;
}

.phase-row{
    display:grid;
    grid-template-columns: repeat(2, 10rem); 
    grid-auto-flow:row;
    margin-top:5rem;
    
    

}

.table-row{
    width:50%;
    position:absolute;
    top:568px;
    left:370px
    right:500px;
   

    }
tr{
    border:1px solid black;
}
table{
    width:50%;
}
.container{
    width:100%;
    margin:0 auto;
    margin:0.5rem;
    position:absolute;
    
    top:44.5%:
}

.phase-3{
    width:100%;
    margin: 0 0.5rem;
    margin-right:auto;
    margin:7rem 0;
}
.container-2{
    width:52%;
    margin:0 2rem;
    max-width:50%;
    margin:0 0.5rem;
    margin-right:auto;
}


.container-4{
    width:52%;
    margin:0 2rem;
    position:absolute;
    top:37.8%;
    left:53%;
    max-width:50%;
    margin:0 0.5rem;
    margin-left:auto;
}

.wrapper-page {
    page-break-after: always;
}

.wrapper-page:last-child {
    page-break-after: avoid;
}



.top-1{
    display:block;
    text-align:center;
}


.second-page{
    position:absolute;
    top:200px;
}

table {page-break-before:auto;}
.page_break { page-break-before: always; }


.learners{
    text-align:center;
    background:grey;
   

}
.first{
  margin:0.5rem 0 ;
}


.third{
    margin:1rem 0 ;
    
}

.fourth{
    margin:1rem 0;
   
}



.row label{
    margin: 0 1rem;
}

.row1 label{
    margin:0 1rem;
}

.row2 label{
    margin: 0 1rem;
}


.container-1{
    width:95%;
    margin:0 auto;
   
}

.container-5{
    
    width:100%;
    position:absolute;
    top:100px;
    
}

.learners-information{
    width:100%;
    margin:0 -1rem;
    border:1px solid red;
}





.school{
    margin:0 0.4rem;

    
    
}



.division{
    width:4rem;
    margin:0 2rem;
    
}

.region{
    width:4rem;
    margin:0 0.5rem;
    
}

.district{
    width:4rem;
    margin:0 0.2rem;
   
}

.section{
    width:2rem;
    
    margin-right:0.6rem;
}

.as_grade{
    width:2rem;
    margin:0 0.1rem;
    
}
.school_year{
    width:2rem;
    margin:0 -0.9rem;
}



.school{
    width:65%;
    max-width:880px;
    
}

.adviser{
    margin:0 0.2rem;
}


.remdial-2{
    position:absolute;
    left:51%;
    top: 84.8%;
   
}


</style>





    
    

    ';

                // SCHOLASTIC RECORDS


        
    while(mysqli_fetch_array($run_learners_query));

    
    $html.='
   <div class="top-1">
    <label class="block ">Republic of The Philippines</label>
    <label class="block">Department of education</label>
   </div>
   <div class="top-1">
   <h4>Learner&#8216s Permanent Academic Record for Elementary School</h4>
   <h4>(SF-10 ES)</h4>
   </div>
    


    <h2 class="learners ">LEARNER`S PERSONAL INFORMATION </h2>
<div class="container-1">
    <div class="first row">
        <label class="form-label"  for="">LASTNAME: '.$rows['last_name'].' </label> 
        <label  for="">FIRSTNAME: '.$rows['first_name'].' </label> 
        <label for="">MIDDLENAME: '.$rows['middle_name'].' </label><br>
    </div>
    <div class="second row1">
        <label for="">NAMEEXTN(JR,I,II): '.$rows['suffix'].' </label>
        <label for="">Birthdate(mm/yy/dd): '.$rows['birth_date'].' </label>
        <label for="">Sex: '.$rows['sex'].' </label>
    </div>
    </div>
      
</div>
    
    <h2 class="learners "> ELIGIBITY FOR ELEMENTARY SCHOOL ENROLLMENT </h2>
    < class="container-1">
        <div class="third row2">
            <label for="">Credential Presented for grade 1: '.$rows['credential_presented'].' </label>
            </div>

            <div class="fourth row2">
                <label for="">Name of School: '.$rows['name_of_school'].' </label>
                <label for="">School ID: '.$rows['efese_school_id'].' </label>
                <label for="">Address of School: '.$rows['address_of_school'].' </label>
                <label for="">others: '.$rows['others'].' </label>
            </div>
            </
   
      ';
    
    

   



    $html.= ' 
    <label>Phase 1</label>
    <h2 class="learners ">SCHOLASTIC RECORDS </h2>

    <div class="container-2">
        <div class="School">
        <label class="school" for="">School: '.$rows['school'].' </label>
    
        <label class="school_id" for="">School ID: '.$rows['sr_school_id'   ].' </label> 
        </div>

        <div class="">
        
        <label class="district" for="">District: '.$rows['district'].' </label>
        <label class="division" for="">Division: '.$rows['division'].' </label>
        <label class="region" for="">Region: '.$rows['region'].' </label> <br>
        </div>

        <div class="container-3">
        <label  class="as_grade" for="">Classified as Grade: '.$rows['classified_as_grade'].' </label>
        <label class="section" for="">Section: '.$rows['section'].' </label>
        <label class="school_year" for="">School year: '.$rows['school_year'].' </label><br>
        </div>
        <div>
        <label class="adviser" for="">Name of adviser: '.$rows['name_of_adviser'].' </label>
        </div>
        
        </div>

        <div class="container-4">
        <div class="School">
        <label class="school" for="">School: '.$rows['school'].' </label>
    
        <label class="school_id" for="">School ID: '.$rows['sr_school_id'   ].' </label> 
        </div>

        <div class="">
        
        <label class="district" for="">District: '.$rows['district'].' </label>
        <label class="division" for="">Division: '.$rows['division'].' </label>
        <label class="region" for="">Region: '.$rows['region'].' </label> <br>
        </div>

        <div class="container-3">
        <label  class="as_grade" for="">Classified as Grade: '.$rows['classified_as_grade'].' </label>
        <label class="section" for="">Section: '.$rows['section'].' </label>
        <label class="school_year" for="">School year: '.$rows['school_year'].' </label><br>
        </div>
        <div>
        <label class="adviser" for="">Name of adviser: '.$rows['name_of_adviser'].' </label>
        </div>
        
        </div>
        ';

        $html.='
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        ';
      $html.='
        <div class="container-5">
        <div class="School">
        <label class="school" for="">School: '.$rows['school'].' </label>
        
        <label class="school_id" for="">School ID: '.$rows['sr_school_id'   ].' </label> 
        </div>
        
        <div class="">
        
        <label class="district" for="">District: '.$rows['district'].' </label>
        <label class="division" for="">Division: '.$rows['division'].' </label>
        <label class="region" for="">Region: '.$rows['region'].' </label> <br>
        </div>
        
        <div class="container-3">
        <label  class="as_grade" for="">Classified as Grade: '.$rows['classified_as_grade'].' </label>
        <label class="section" for="">Section: '.$rows['section'].' </label>
        <label class="school_year" for="">School year: '.$rows['school_year'].' </label><br>
        </div>
        <div>
        <label class="adviser" for="">Name of adviser: '.$rows['name_of_adviser'].' </label>
        </div>
        
        </div>

          
    </div>
        
          
    </div>
    </div>
      

';
    }

//                         //PHASE 1 
$phase1_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
AND students_grades.phase = '1' AND students_grades.term = '1' AND remedial_classes.phase = '1'";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '2' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows2 = mysqli_fetch_array($run);

        
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '3' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows3 = mysqli_fetch_array($run);
        
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '4' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows4 = mysqli_fetch_array($run);

        
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '5' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows5 = mysqli_fetch_array($run);



$html.='
<div class="container">
<table>
<thead>
<tr>
<th rowspan="2">Learnering Areas</th>
<th class="quarters" colspan="4">Quarterly Rating</th>
<th class="final-raiting" rowspan="2" >Final Rating</th>
</tr>
<tr class="quarters">
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
</tr>
</thead>    
<tbody>
<tr>
<td>Mother&#8216s Tongue</td>
<td>'.$rows['mother_tounge'].'</td>
<td>'.$rows2['mother_tounge'].'</td>
<td>'.$rows3['mother_tounge'].'</td>
<td>'.$rows4['mother_tounge'].'</td>
<td>'.$rows5['mother_tounge'].'</td>
</tr>
<tr>
<td>Filipino</td>
<td>'.$rows['filipino'].'</td>
<td>'.$rows2['filipino'].'</td>
<td>'.$rows3['filipino'].'</td>
<td>'.$rows4['filipino'].'</td>
<td>'.$rows5['filipino'].'</td>
</tr>
<tr>
<td>English</td>
<td>'.$rows['english'].'</td>
<td>'.$rows2['english'].'</td>
<td>'.$rows3['english'].'</td>
<td>'.$rows4['english'].'</td>
<td>'.$rows5['english'].'</td>
</tr>
<tr>
<td>Math</td>
<td>'.$rows['math'].'</td>
<td>'.$rows2['math'].'</td>
<td>'.$rows3['math'].'</td>
<td>'.$rows4['math'].'</td>
<td>'.$rows5['math'].'</td>
</tr>
<tr>
<td>Science</td>
<td> '.$rows['science'].'</td>
<td> '.$rows2['science'].'</td>
<td> '.$rows3['science'].'</td>
<td> '.$rows4['science'].'</td>
<td> '.$rows5['science'].'</td>
</tr>
<tr>
<td>Araling Panlipunan</td>
<td>'.$rows['araling_panlipunan'].'</td>
<td>'.$rows2['araling_panlipunan'].'</td>
<td>'.$rows3['araling_panlipunan'].'</td>
<td>'.$rows4['araling_panlipunan'].'</td>
<td>'.$rows5['araling_panlipunan'].'</td>
</tr>
<tr>
<td>EPP/TLE
</td>
<td>'.$rows['epp_tle'].'</td>
<td>'.$rows2['epp_tle'].'</td>
<td>'.$rows3['epp_tle'].'</td>
<td>'.$rows4['epp_tle'].'</td>
<td>'.$rows5['epp_tle'].'</td>

</tr>
<tr>
<td>MAPEH</td>
<td>'.$rows['music'].'</td>
<td>'.$rows2['music'].'</td>
<td>'.$rows3['music'].'</td>
<td>'.$rows4['music'].'</td>
<td>'.$rows5['music'].'</td>
</tr>
<tr>
<td>Music</td>
<td>'.$rows['music'].'</td>
<td>'.$rows2['music'].'</td>
<td>'.$rows3['music'].'</td>
<td>'.$rows4['music'].'</td>
<td>'.$rows5['music'].'</td>

</tr>
<tr>
<td>Arts</td>
<td>'.$rows['arts'].'</td>
<td>'.$rows2['arts'].'</td>
<td>'.$rows3['arts'].'</td>
<td>'.$rows4['arts'].'</td>
<td>'.$rows5['arts'].'</td>
</tr>
<tr>
<td>Physical Education</td>
<td>'.$rows['p_e'].'</td>
<td>'.$rows2['p_e'].'</td>
<td>'.$rows3['p_e'].'</td>
<td>'.$rows4['p_e'].'</td>
<td>'.$rows5['p_e'].'</td>
</tr>
<tr>
<td>duk. sa Pagpapakatao</td>
<td>'.$rows['edukasyon_sa_pagpapakatao'].'</td>
<td>'.$rows2['edukasyon_sa_pagpapakatao'].'</td>
<td>'.$rows3['edukasyon_sa_pagpapakatao'].'</td>
<td>'.$rows4['edukasyon_sa_pagpapakatao'].'</td>
<td>'.$rows5['edukasyon_sa_pagpapakatao'].'</td>
</tr>
<tr>
<td>Arabic Language</td>
<td>'.$rows['arabic_language'].'</td>
<td>'.$rows2['arabic_language'].'</td>
<td>'.$rows3['arabic_language'].'</td>
<td>'.$rows4['arabic_language'].'</td>
<td>'.$rows5['arabic_language'].'</td>
</tr>
<tr>
<td>Islamic Values Education</td>
<td>'.$rows['islamic_values'].'</td>
<td>'.$rows2['islamic_values'].'</td>
<td>'.$rows3['islamic_values'].'</td>
<td>'.$rows4['islamic_values'].'</td>
<td>'.$rows5['islamic_values'].'</td>
</tr>
<tr>
<td>General average</td>
<td>'.$rows['general_average'].'</td>
<td>'.$rows2['general_average'].'</td>
<td>'.$rows3['general_average'].'</td>
<td>'.$rows4['general_average'].'</td>
<td>'.$rows5['general_average'].'</td>
</tr>
</tbody>


</table>

';
    }
}
    }
}
}
$phase1_query = "SELECT * FROM `learners_personal_infos` 
LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
AND students_grades.phase = '1' AND students_grades.term = '1' AND remedial_classes.phase = '1'";
$run = mysqli_query($conn, $phase1_query);
if(mysqli_num_rows($run) > 0){
    $rows = mysqli_fetch_array($run);

    
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '2' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

        
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '3' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);
        
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '4' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

        
    $phase1_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '1' AND students_grades.term = '5' AND remedial_classes.phase = '1'";
    $run = mysqli_query($conn, $phase1_query);
    if(mysqli_num_rows($run) > 0){
        $rows = mysqli_fetch_array($run);

$html.='
<table>
<thead>
<tr>
<th  colspan="2">Remidial Clasess</th>
<th colspan="1"> Conducted From: '.$rows['date_from'].'</th>
<th colspan="1">To:'.$rows['date_to'].'</th>
</tr>
<tr>
<th>Learning Areas</th>
<th>Final Raiting</th>
<th>Remarks</th>
<th>Recomputed Final Grade</th>

</tr>
</thead>
<tbody>
<tr>
<td>'.$rows['learning_areas'].'</td>
<td>'.$rows['remedial_class_mark'].'</td>
<td>'.$rows['recomputed_final_grade'].' </td>
<td>'.$rows['learning_areas'].'</td>
</tr>
<tr>
<td>'.$rows['learning_areas'].'</td>
<td>'.$rows['remedial_class_mark'].'</td>
<td>'.$rows['recomputed_final_grade'].' </td>
<td>'.$rows['learning_areas'].'</td>
</tr>
</tbody>
</table>
</div>

';
    }
}
    }
}
}



    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '2' AND students_grades.term = '2' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows= mysqli_fetch_array($run);

    

    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '2' AND students_grades.term = '2' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows2 = mysqli_fetch_array($run);
    
       


    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '2' AND students_grades.term = '3' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows3 = mysqli_fetch_array($run);

    

    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '2' AND students_grades.term = '4' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows4 = mysqli_fetch_array($run);
    
       

    
    $phase2_query = "SELECT * FROM `learners_personal_infos` 
    LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
    LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
    AND students_grades.phase = '2' AND students_grades.term = '5' AND remedial_classes.phase = '2'";
    $run = mysqli_query($conn, $phase2_query);
    if(mysqli_num_rows($run) > 0){
        $rows5 = mysqli_fetch_array($run);
  

        



 //----------------------------------------------PHASE 2-----------------------------------------------

 $html.='
<table class="table-row" >
<thead>
<tr>
<th rowspan="2">Learnering Areas</th>
<th colspan="4">Quarterly Rating</th>
<th rowspan="2">Final Rating</th>
</tr>
<tr>
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
</tr>
</thead>
 ';

        $html.='
        <tbody>
        <tr>
        <td>Mother&#8216s Tongue</td>
        <td>'.$rows['mother_tounge'].'</td>
        <td>'.$rows2['mother_tounge'].'</td>
        <td>'.$rows3['mother_tounge'].'</td>
        <td>'.$rows4['mother_tounge'].'</td>
        <td>'.$rows5['mother_tounge'].'</td>
        </tr>
        <tr>
        <td>Filipino</td>
        <td>'.$rows['filipino'].'</td>
        <td>'.$rows2['filipino'].'</td>
        <td>'.$rows3['filipino'].'</td>
        <td>'.$rows4['filipino'].'</td>
        <td>'.$rows5['filipino'].'</td>
        </tr>
        <tr>
        <td>English</td>
        <td>'.$rows['english'].'</td>
        <td>'.$rows2['english'].'</td>
        <td>'.$rows3['english'].'</td>
        <td>'.$rows4['english'].'</td>
        <td>'.$rows5['english'].'</td>
        </tr>
        <tr>
        <td>Math</td>
        <td>'.$rows['math'].'</td>
        <td>'.$rows2['math'].'</td>
        <td>'.$rows3['math'].'</td>
        <td>'.$rows4['math'].'</td>
        <td>'.$rows5['math'].'</td>
        </tr>
        <tr>
        <td>Science</td>
        <td> '.$rows['science'].'</td>
        <td> '.$rows2['science'].'</td>
        <td> '.$rows3['science'].'</td>
        <td> '.$rows4['science'].'</td>
        <td> '.$rows5['science'].'</td>
        </tr>
        <tr>
        <td>Araling Panlipunan</td>
        <td>'.$rows['araling_panlipunan'].'</td>
        <td>'.$rows2['araling_panlipunan'].'</td>
        <td>'.$rows3['araling_panlipunan'].'</td>
        <td>'.$rows4['araling_panlipunan'].'</td>
        <td>'.$rows5['araling_panlipunan'].'</td>
        </tr>
        <tr>
        <td>EPP/TLE
        </td>
        <td>'.$rows['epp_tle'].'</td>
        <td>'.$rows2['epp_tle'].'</td>
        <td>'.$rows3['epp_tle'].'</td>
        <td>'.$rows4['epp_tle'].'</td>
        <td>'.$rows5['epp_tle'].'</td>
        
        </tr>
        <tr>
        <td>MAPEH</td>
        <td>'.$rows['music'].'</td>
        <td>'.$rows2['music'].'</td>
        <td>'.$rows3['music'].'</td>
        <td>'.$rows4['music'].'</td>
        <td>'.$rows5['music'].'</td>
        </tr>
        <tr>
        <td>Music</td>
        <td>'.$rows['music'].'</td>
        <td>'.$rows2['music'].'</td>
        <td>'.$rows3['music'].'</td>
        <td>'.$rows4['music'].'</td>
        <td>'.$rows5['music'].'</td>
        
        </tr>
        <tr>
        <td>Arts</td>
        <td>'.$rows['arts'].'</td>
        <td>'.$rows2['arts'].'</td>
        <td>'.$rows3['arts'].'</td>
        <td>'.$rows4['arts'].'</td>
        <td>'.$rows5['arts'].'</td>
        </tr>
        <tr>
        <td>Physical Education</td>
        <td>'.$rows['p_e'].'</td>
        <td>'.$rows2['p_e'].'</td>
        <td>'.$rows3['p_e'].'</td>
        <td>'.$rows4['p_e'].'</td>
        <td>'.$rows5['p_e'].'</td>
        </tr>
        <tr>
        <td>duk. sa Pagpapakatao</td>
        <td>'.$rows['edukasyon_sa_pagpapakatao'].'</td>
        <td>'.$rows2['edukasyon_sa_pagpapakatao'].'</td>
        <td>'.$rows3['edukasyon_sa_pagpapakatao'].'</td>
        <td>'.$rows4['edukasyon_sa_pagpapakatao'].'</td>
        <td>'.$rows5['edukasyon_sa_pagpapakatao'].'</td>
        </tr>
        <tr>
        <td>Arabic Language</td>
        <td>'.$rows['arabic_language'].'</td>
        <td>'.$rows2['arabic_language'].'</td>
        <td>'.$rows3['arabic_language'].'</td>
        <td>'.$rows4['arabic_language'].'</td>
        <td>'.$rows5['arabic_language'].'</td>
        </tr>
        <tr>
        <td>Islamic Values Education</td>
        <td>'.$rows['islamic_values'].'</td>
        <td>'.$rows2['islamic_values'].'</td>
        <td>'.$rows3['islamic_values'].'</td>
        <td>'.$rows4['islamic_values'].'</td>
        <td>'.$rows5['islamic_values'].'</td>
        </tr>
        <tr>
        <td>General average</td>
        <td>'.$rows['general_average'].'</td>
        <td>'.$rows2['general_average'].'</td>
        <td>'.$rows3['general_average'].'</td>
        <td>'.$rows4['general_average'].'</td>
        <td>'.$rows5['general_average'].'</td>
        </tr>
        <tr>
        </tr>
        </tbody>
       
        </table>
    
        </tbody>
        
        ';
        
        
    } 
}
}
}
}
        $phase2_query = "SELECT * FROM `learners_personal_infos` 
        LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
        LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
        WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
        AND students_grades.phase = '2' AND students_grades.term = '2' AND remedial_classes.phase = '2'";
        $run = mysqli_query($conn, $phase2_query);
        if(mysqli_num_rows($run) > 0){
            $rows= mysqli_fetch_array($run);
    
        
    
        $phase2_query = "SELECT * FROM `learners_personal_infos` 
        LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
        LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
        WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
        AND students_grades.phase = '2' AND students_grades.term = '2' AND remedial_classes.phase = '2'";
        $run = mysqli_query($conn, $phase2_query);
        if(mysqli_num_rows($run) > 0){
            $rows2 = mysqli_fetch_array($run);
        
           
    
    
        $phase2_query = "SELECT * FROM `learners_personal_infos` 
        LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
        LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
        WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
        AND students_grades.phase = '2' AND students_grades.term = '3' AND remedial_classes.phase = '2'";
        $run = mysqli_query($conn, $phase2_query);
        if(mysqli_num_rows($run) > 0){
            $rows3 = mysqli_fetch_array($run);
    
        
    
        $phase2_query = "SELECT * FROM `learners_personal_infos` 
        LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
        LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
        WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
        AND students_grades.phase = '2' AND students_grades.term = '4' AND remedial_classes.phase = '2'";
        $run = mysqli_query($conn, $phase2_query);
        if(mysqli_num_rows($run) > 0){
            $rows4 = mysqli_fetch_array($run);
        
           
    
        
        $phase2_query = "SELECT * FROM `learners_personal_infos` 
        LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
        LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
        WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
        AND students_grades.phase = '2' AND students_grades.term = '5' AND remedial_classes.phase = '2'";
        $run = mysqli_query($conn, $phase2_query);
        if(mysqli_num_rows($run) > 0){
            $rows5 = mysqli_fetch_array($run);
        $html.='
        <table class="remdial-2"> 
        <thead>
        <tr>
        <th  colspan="2">Remidial Clasess</th>
        <th colspan="1"> Conducted From: '.$rows['date_from'].'</th>
        <th colspan="1">To:'.$rows['date_to'].'</th>
        </tr>
        <tr>
        <th>Learning Areas</th>
        <th>Final Raiting</th>
        <th>Remarks</th>
        <th>Recomputed Final Grade</th>
        
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>'.$rows['learning_areas'].'</td>
        <td>'.$rows['remedial_class_mark'].'</td>
        <td>'.$rows['recomputed_final_grade'].' </td>
        <td>'.$rows['learning_areas'].'</td>
        </tr>
        <tr>
        <td>'.$rows['learning_areas'].'</td>
        <td>'.$rows['remedial_class_mark'].'</td>
        <td>'.$rows['recomputed_final_grade'].' </td>
        <td>'.$rows['learning_areas'].'</td>
        </tr>
        </tbody>
        </table>
        </div>
        
        ';
            }
        }
            }
        }
        }
        
        $html.='
        <div class="page_break">
        ';
        




  




    //----------------------------------------------PHASE 3-----------------------------------------------
    $learners_query = "SELECT * FROM learners_personal_infos 
    LEFT JOIN eligibility_for_elementary_school_enrollment ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn
    LEFT JOIN scholastic_records ON learners_personal_infos.lrn = scholastic_records.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn'";
    $run_learners_query = mysqli_query($conn, $learners_query);
        if(mysqli_num_rows($run_learners_query) > 0){
            $rows = mysqli_fetch_array($run_learners_query);
$html.='
<h2>Phase3</h2>
<div class="learners-information row">
    <div class="container-5">
    <div class="School">
    <label class="school" for="">School: '.$rows['school'].' </label>

    <label class="school_id" for="">School ID: '.$rows['sr_school_id'   ].' </label> 
    </div>

    <div class="">

    <label class="district" for="">District: '.$rows['district'].' </label>
    <label class="division" for="">Division: '.$rows['division'].' </label>
    <label class="region" for="">Region: '.$rows['region'].' </label> <br>
    </div>

    <div class="container-3">
    <label  class="as_grade" for="">Classified as Grade: '.$rows['classified_as_grade'].' </label>
    <label class="section" for="">Section: '.$rows['section'].' </label>
    <label class="school_year" for="">School year: '.$rows['school_year'].' </label><br>
    </div>
    <div>
    <label class="adviser" for="">Name of adviser: '.$rows['name_of_adviser'].' </label>
    </div>
</div>
</div>

  
</div>
</div>


';
        }

        $phase3_query = "SELECT * FROM `learners_personal_infos` 
        LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
        LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
        WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
        AND students_grades.phase = '3' AND students_grades.term = '1' AND remedial_classes.phase = '3'";
        $run = mysqli_query($conn, $phase3_query);
        if(mysqli_num_rows($run) > 0){
            $rows = mysqli_fetch_array($run);



        
        $phase3_query = "SELECT * FROM `learners_personal_infos` 
        LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
        LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
        WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
        AND students_grades.phase = '3' AND students_grades.term = '2' AND remedial_classes.phase = '3'";
        $run = mysqli_query($conn, $phase3_query);
        if(mysqli_num_rows($run) > 0){
            $rows = mysqli_fetch_array($run);

            $phase3_query = "SELECT * FROM `learners_personal_infos` 
            LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
            LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
            WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
            AND students_grades.phase = '3' AND students_grades.term = '3' AND remedial_classes.phase = '3'";
           $run = mysqli_query($conn, $phase3_query);
            if(mysqli_num_rows($run) > 0){
                $rows = mysqli_fetch_array($run);   

                    $phase3_query = "SELECT * FROM `learners_personal_infos` 
            LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
            LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
            WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
            AND students_grades.phase = '3' AND students_grades.term = '4' AND remedial_classes.phase = '3'";
            $run = mysqli_query($conn, $phase3_query);
            if(mysqli_num_rows($run) > 0){
                $rows = mysqli_fetch_array($run);

                $phase3_query = "SELECT * FROM `learners_personal_infos` 
                LEFT JOIN students_grades ON learners_personal_infos.lrn = students_grades.lrn 
                LEFT JOIN remedial_classes ON learners_personal_infos.lrn= remedial_classes.lrn 
                WHERE learners_personal_infos.lrn = '$decrypted_lrn' 
                AND students_grades.phase = '3' AND students_grades.term = '5' AND remedial_classes.phase = '3'";
                    $run = mysqli_query($conn, $phase3_query);
                    if(mysqli_num_rows($run) > 0){
                    $rows = mysqli_fetch_array($run);
                
$html.='
<div class="phase-3 ">
<table>
<thead>
<tr>
<th rowspan="2">Learnering Areas</th>
<th class="quarters" colspan="4">Quarterly Rating</th>
<th class="final-raiting" rowspan="2" >Final Rating</th>
</tr>
<tr class="quarters">
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
</tr>
</thead>    
<tbody>
';
            }
                
            }

        }
    }
}
   
    }

        

 $dompdf = new Dompdf();
 $dompdf->loadHtml($html);
 

 // (Optional) Setup the paper size and orientation
 $dompdf->setPaper('Legal', 'portrait');
 
 // Render the HTML as PDF
 $dompdf->render();
 
 // Output the generated PDF to Browser
 $dompdf->stream("tangina", Array("Attachment" =>0));
?>