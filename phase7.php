<?php
ob_start();
include('connection.php');
session_start();
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php'</script>";
}


error_reporting(E_ERROR & E_WARNING);
$lrn = $_SESSION['lrn'] ;

if(empty($_SESSION['lrn'])){
   echo "<script>window.location.href='addrecord.php'</script>";
}

$query_lrn = "SELECT * FROM learners_personal_infos WHERE lrn = '$lrn' ";
$run_query_lrn = mysqli_query($conn,$query_lrn);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pdmes/src/css/form.css">
    <link rel="stylesheet" href="../pdmes/src/css/bootstrap.css">
    <title>Document</title>
</head>


<body>



<!---scholastic record  phase 7--->
<h3>Scholastic records</h3>
<h4>Phase 7</h4>
<div class="container">
    <form action="phase7.php" method="POST">
    <div>
    <label>School</label>
  <input type="text" name="school" class="school">
  <label>School ID</label>
  <input type="text" name="school_id" class="school_id">
  <div>
  <label>District</label>
  <input type="text" name="school" class="district">
  <label>Division</label>
  <input type="text" name="school_id" class="division">
  <label>Region</label>
  <input type="text" name="school_id" class="region">

  </div>
  <label>Classified as Grade</label>
  <input type="text" name="classified_as_grade" class=" as_grade rounded" >
  <label>Section</label>
  <input type="text" name="section" class="section  rounded"> 
  <label>School Year</label>
  <input type="text" name="school_year" class="school_year rounded">
  <div>
  <label  for="">Name of Adviser: </label>
          <input type="text" name="name_of_adviser" class=" adviser rounded" >
  </div>
</div>
 
 

  <table class="table try table-bordered border border-dark text-center">
        <thead>
          <tr>
            <th rowspan="2">Learner's Area</th>
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
<tbody>
          <tr>
            <td>Mother's tongue</td>
            <td> <input type="tel" name="mother_tounge1"  pattern="[0-9]{2}" title="Please input 2 Numbers only" ></td>
            <td> <input type="tel" name="mother_tounge2"  pattern="[0-9]{2}" title="Please input 2 Numbers only" ></td>
            <td>  <input type="tel" name="mother_tounge3"  pattern="[0-9]{2}" title="Please input 2 Numbers only" ></td>
            <td> 
              <input type="tel" name="mother_tounge4"  pattern="[0-9]{2}" title="Please input 2 Numbers only" ></td>
            <td>
              <input type="tel" name="mother_tounge5"  pattern="[0-9]{2}" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td>Filipino</td>
            <td>
          <input type="tel" class="filipino  filipino1" name="filipino1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
</td>
            <td>
          <input type="tel" name="filipino2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>
<input type="tel" name="filipino3" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>
<input type="tel"   name="filipino4" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>
<input type="tel"  name="filipino5" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>

 

          <tr>
            <td>English</td>
            <td>  <input type="tel" name="english1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="english2"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="english3"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="english4"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>
            <input type="tel" name="english5"   pattern="[0-9]{2}" title="Please input 2 Numbers only">
</td>

          </tr>
          <tr>
            <td>Math</td>
            <td>    <input type="tel"   name="math1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>   <input type="tel" name="math2"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="tel" name="math3"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="math4"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="math5"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td>Science</td>
            <td>  <input type="tel" name="science1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="science2"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  
              <input type="tel" name="science3"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>
              <input type="tel" name="science4"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>
              <input type="tel" name="science5"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td>Aralin Panlipunan</td>
            <td>   <input type="tel" name="araling_panlipunan1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="araling_panlipunan2"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="araling_panlipunan3"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="araling_panlipunan4"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="araling_panlipunan5"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>

          <tr>
            <td>EPP/TLE</td>
            <td> <input type="tel" name="epp_tle1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="epp_tle2"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="epp_tle3"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>      <input type="tel" name="epp_tle4"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="epp_tle5"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>

          <tr>
            <td>MAPEH</td>
            <td> <input type="tel" name="mapeh1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="mapeh2"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="mapeh3"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="mapeh4"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="mapeh5"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>

          <tr>
            <td>Music</td>
            <td> <input type="tel" name="music1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>    <input type="tel" name="music2"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>            <input type="tel" name="music3"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="music4"    pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="music5"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td>PE</td>
            <td><input type="tel" name="p_e1"  pattern="[0-9]{2}"  title="Please input 2 Numbers only"></td>
            <td> <input type="tel"   name="p_e2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="p_e3"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="p_e4"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="p_e5"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td>Health</td>
            <td> <input type="tel" name="health1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="health2"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>

            <td> <input type="tel" name="health3"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="health4"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="tel" name="health5"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>

          <tr>
            <td>Eduaksyon sa Pagkakatao</td>
            <td> <input type="tel" name="edukasyon_sa_pagpapakatao1"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="edukasyon_sa_pagpapakatao2"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="edukasyon_sa_pagpapakatao3"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="edukasyon_sa_pagpapakatao4"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="tel" name="edukasyon_sa_pagpapakatao5"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>

          <tr>
            <td>
              Arabic Language
            </td>
            <td><input type="tel" name="arabic_language1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="arabic_language2"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="arabic_language3"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td>  <input type="tel" name="arabic_language4"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="tel" name="arabic_language5"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>

          </tr>

          <tr>
            <td>Islamic Value</td>
            <td>      <input type="tel" name="islamic_values1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="islamic_values2"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="islamic_values3"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="islamic_values4"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="islamic_values5"   pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>

          <tr>
            <td>General Average</td>
            <td> <input type="tel" name="general_average1"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="general_average2"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="general_average3"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="general_average4"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td> <input type="tel" name="general_average5"  pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
        <table  class="table-bordered border border-dark mt-1  text-center">
        <tr>
        <thead>
        <th colspan="2"  >Remedial Classes</th>
        <th  colspan="2" >Date conducted: <input type="date" class="datefrom" name="date_from"></th>
       
        <th colspan="2" >To:   <input type="date" class="dateto" name="date_to"></th>
        </tr>
        <tr>
          <th>Learning Areas</th>
          <th>Final Rating</th>
          <th>Remarks</th>
          <th>Recomputed Final Grade</th>
          <th>Remakrs</th>
        </tr>
        </thead>
        <tbody>
          <td >   <input type="text" class="learning-areas1" name="learning_areas1"></td>
          <td> <input type="tel" class="final_rating1" name="final_rating1" ></td>
          <td> <select name="remedial_class_mark1" id=""> 
      <option value="">-Remarks-</option>
      <option value="Passed">Passed</option>
      <option value="Failed">Failed</option>
    </select> </td>
    <td>
    <input type="tel" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
    </td>
    <td>
    <select name="remedial_remarks1" id="" > 
      <option value="">-Remarks-</option>
      <option value="Passed">Passed</option>
      <option value="Failed">Failed</option>
    </select> 
    </td>
    <tr>
    <td>
     
      <input type="text" class="learning_areas2" name="learning_areas2">
    </td>
    <td>
    <input type="tel" class="final_rating2" name="final_rating2" >
    </td>
    <td>
    <select name="remedial_class_mark2" id=""> 
      <option value="">-Remarks-</option>
      <option value="Passed">Passed</option>
      <option value="Failed">Failed</option>
    </select> 
    </td>
    <td>
    <input type="tel" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
    </td>
    <td>
    <select name="remedial_remarks2" id="" > 
      <option value="">-Remarks-</option>
      <option value="Passed">Passed</option>
      <option value="Failed">Failed</option>
    </select> 
    </td>

      </tr>
   
        </tbody>
      </table>
  </div>

</form>
</body>

</html>
<?php

if(isset($_POST['next'])){
  date_default_timezone_set('Asia/Manila');
  //scholastic_record
  $lrn = $_SESSION['lrn'];

  $school_2 = ucfirst($_POST['school']);
  $school_id_2 = $_POST['school_id'];
  $division = $_POST['division'];
  $district = ucfirst($_POST['district']);
  $region = ucfirst($_POST['region']);
  $classified_as_grade = $_POST['classified_as_grade'];
  $section = ucfirst($_POST['section']);
  $school_year = $_POST['school_year'];
  $name_of_adviser = $_POST['name_of_adviser'];

  //student's_grades 1st quarter

  $mother_tounge1 = $_POST['mother_tounge1'];
  $filipino1 = $_POST['filipino1'];
  $english1 = $_POST['english1'];
  $math1 = $_POST['math1'];
  $science1 = $_POST['science1'];
  $araling_panlipunan1 = $_POST['araling_panlipunan1'];
  $epp_tle1 = $_POST['epp_tle1'];
  $mapeh1 = $_POST['mapeh1'];

  $music1 = $_POST['music1'];
  $arts1 = $_POST['arts1'];
  $p_e1 = $_POST['p_e1'];
  $health1 = $_POST['health1'];
  $edukasyon_sa_pagpapakatao1 = $_POST['edukasyon_sa_pagpapakatao1'];
  $arabic_language1 = $_POST['arabic_language1'];
  $islamic_values1 = $_POST['islamic_values1'];
  $general_average1 = $_POST['general_average1'];
  $quarterly_rating1 = 1;

  //2nd quarter

  $mother_tounge2 = $_POST['mother_tounge2'];
  $filipino2 = $_POST['filipino2'];
  $english2 = $_POST['english2'];
  $math2 = $_POST['math2'];
  $science2 = $_POST['science2'];
  $araling_panlipunan2 = $_POST['araling_panlipunan2'];
  $epp_tle2 = $_POST['epp_tle2'];
  $mapeh2 = $_POST['mapeh2'];

  $music2 = $_POST['music2'];
  $arts2 = $_POST['arts2'];
  $p_e2 = $_POST['p_e2'];
  $health2 = $_POST['health2'];
  $edukasyon_sa_pagpapakatao2 = $_POST['edukasyon_sa_pagpapakatao2'];
  $arabic_language2 = $_POST['arabic_language2'];
  $islamic_values2 = $_POST['islamic_values2'];
  $general_average2 = $_POST['general_average2'];
  $quarterly_rating2 = 2;

  

 

  //3rd quarter

  $mother_tounge3 = $_POST['mother_tounge3'];
  $filipino3 = $_POST['filipino3'];
  $english3 = $_POST['english3'];
  $math3 = $_POST['math3'];
  $science3 = $_POST['science3'];
  $araling_panlipunan3 = $_POST['araling_panlipunan3'];
  $epp_tle3 = $_POST['epp_tle3'];
  $mapeh3 = $_POST['mapeh3'];

  $music3 = $_POST['music3'];
  $arts3 = $_POST['arts3'];
  $p_e3 = $_POST['p_e3'];
  $health3 = $_POST['health3'];
  $edukasyon_sa_pagpapakatao3 = $_POST['edukasyon_sa_pagpapakatao3'];
  $arabic_language3 = $_POST['arabic_language3'];
  $islamic_values3 = $_POST['islamic_values3'];
  $general_average3 = $_POST['general_average3'];
  $quarterly_rating3 = 3;
  
  //4th quarter

  $mother_tounge4 = $_POST['mother_tounge4'];
  $filipino4 = $_POST['filipino4'];
  $english4 = $_POST['english4'];
  $math4 = $_POST['math4'];
  $science4 = $_POST['science4'];
  $araling_panlipunan4 = $_POST['araling_panlipunan4'];
  $epp_tle4 = $_POST['epp_tle4'];
  $mapeh4 = $_POST['mapeh4'];

  $music4 = $_POST['music4'];
  $arts4 = $_POST['arts4'];
  $p_e4 = $_POST['p_e4'];
  $health4 = $_POST['health4'];
  $edukasyon_sa_pagpapakatao4 = $_POST['edukasyon_sa_pagpapakatao4'];
  $arabic_language4 = $_POST['arabic_language4'];
  $islamic_values4 = $_POST['islamic_values4'];
  $general_average4 = $_POST['general_average4'];
  $quarterly_rating4 = 4;

   //FINALS quarter

  $mother_tounge5 = $_POST['mother_tounge5'];
  $filipino5 = $_POST['filipino5'];
  $english5 = $_POST['english5'];
  $math5 = $_POST['math5'];
  $science5 = $_POST['science5'];
  $araling_panlipunan5 = $_POST['araling_panlipunan5'];
  $epp_tle5 = $_POST['epp_tle5'];
  $mapeh5 = $_POST['mapeh5'];

  $music5 = $_POST['music5'];
  $arts5 = $_POST['arts5'];
  $p_e5 = $_POST['p_e5'];
  $health5 = $_POST['health5'];
  $edukasyon_sa_pagpapakatao5 = $_POST['edukasyon_sa_pagpapakatao5'];
  $arabic_language5 = $_POST['arabic_language5'];
  $islamic_values5 = $_POST['islamic_values5'];
  $general_average5 = $_POST['general_average5'];
  $quarterly_rating5 = 5;
 

  //remedial_classes
  $date_from = $_POST['date_from'];
  $date_to = $_POST['date_to'];

  //line 1
  $learning_areas1 = $_POST['learning_areas1'];
  $final_rating1 = $_POST['final_rating1'];
  $remedial_class_mark1 = $_POST['remedial_class_mark1'];
  $recomputed_final_grade1 = $_POST['recomputed_final_grade1'];
  $remedial_remarks1 = $_POST['remedial_remarks1'];
  

  //line 2

  $learning_areas2 = $_POST['learning_areas2'];
  $final_rating2 = $_POST['final_rating2'];
  $remedial_class_mark2 = $_POST['remedial_class_mark2'];
  $recomputed_final_grade2 = $_POST['recomputed_final_grade2'];
  $remedial_remarks2 = $_POST['remedial_remarks2'];

  $remarks = 'none';
  $dateCreated = date("y-m-d h:i:a");
  $dateUpdated = date("y-m-d h:i:a");
  $phase =7;


  //scholastic records, remedial_classes, students_grades lang ang may phase 
  $insert_scholastic = "INSERT INTO scholastic_records (lrn,school,sr_school_id,district,division,region,
  classified_as_grade,section,school_year,name_of_adviser,phase,remarks,date_time_created,date_time_updated)
  VALUES ('$lrn', '$school_2','$school_id_2','$district', '$division', '$region', '$classified_as_grade', '$section', '$school_year', '$name_of_adviser','$phase', '$remarks', '$dateCreated', '$dateUpdated')";
  $run_scholastic = mysqli_query($conn,$insert_scholastic);

  if($run_scholastic){
    echo "added 3 SCHOLASTIC RECORD" . '<br>';

    if($general_average1 > 75){
      $remarks1 = 'Passed';
    }else{
      $remarks1 = 'Failed';
    }

    $insert_students_grades1 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tounge1', '$filipino1', '$english1', '$math1', '$science1', '$araling_panlipunan1', '$epp_tle1','$mapeh1', '$music1', '$arts1', '$p_e1', '$health1', '$edukasyon_sa_pagpapakatao1', '$arabic_language1', '$islamic_values1', '$general_average1', '$quarterly_rating1','$remarks1', '$phase','$dateCreated', '$dateUpdated' ) ";
    $run_insert_students_grades1 = mysqli_query($conn,$insert_students_grades1);

    if($run_insert_students_grades1){
      echo "added 4 STUDENT GRADES 1". '<br>';

      if($general_average2 > 75){
        $remarks2 = 'Passed';
      }else{
        $remarks2 = 'Failed';
      }

      $insert_students_grades2 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
      VALUES ('$lrn','$mother_tounge2', '$filipino2', '$english2', '$math2', '$science2', '$araling_panlipunan2', '$epp_tle2','$mapeh2', '$music2', '$arts2', '$p_e2', '$health2', '$edukasyon_sa_pagpapakatao2', '$arabic_language2', '$islamic_values2', '$general_average2', '$quarterly_rating2', '$remarks2','$phase','$dateCreated', '$dateUpdated') ";
      $run_insert_students_grades2 = mysqli_query($conn,$insert_students_grades2);
      

      if($run_insert_students_grades2){
        echo "added 4 STUDENT GRADES 2". '<br>';

        if($general_average3 > 75){
          $remarks3 = 'Passed';
        }else{
          $remarks3 = 'Failed';
        }

        $insert_students_grades3 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
        VALUES ('$lrn','$mother_tounge3', '$filipino3', '$english3', '$math3', '$science3', '$araling_panlipunan3', '$epp_tle3','$mapeh3', '$music3', '$arts3', '$p_e3', '$health3', '$edukasyon_sa_pagpapakatao3', '$arabic_language3', '$islamic_values3', '$general_average3', '$quarterly_rating3','$remarks3', '$phase','$dateCreated', '$dateUpdated') ";
        $run_insert_students_grades3 = mysqli_query($conn,$insert_students_grades3);
      
        if($run_insert_students_grades3){
          echo "added 4 STUDENT GRADES 3" . '<br>';

          if($general_average4 > 75){
            $remarks4 = 'Passed';
          }else{
            $remarks4 = 'Failed';
          }


          $insert_students_grades4 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
          VALUES ('$lrn','$mother_tounge4', '$filipino4', '$english4', '$math4', '$science4', '$araling_panlipunan4', '$epp_tle4', '$mapeh4','$music4', '$arts4', '$p_e4', '$health4', '$edukasyon_sa_pagpapakatao4', '$arabic_language4', '$islamic_values4', '$general_average4', '$quarterly_rating4','$remarks4', '$phase','$dateCreated', '$dateUpdated') ";
          $run_insert_students_grades4 = mysqli_query($conn,$insert_students_grades4);


          if($run_insert_students_grades4){
            echo "added 4 STUDENT GRADES 4" . '<br>';

            if($general_average5 > 75){
              $remarks5 = 'Passed';
            }else{
              $remarks5 = 'Failed';
            }



            $insert_students_grades5 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tounge5', '$filipino5', '$english5', '$math5', '$science5', '$araling_panlipunan5', '$epp_tle5','$mapeh6', '$music5', '$arts5', '$p_e5', '$health5', '$edukasyon_sa_pagpapakatao5', '$arabic_language5', '$islamic_values5', '$general_average5', '$quarterly_rating5','$remarks5', '$phase','$dateCreated', '$dateUpdated') ";
            $run_insert_students_grades5 = mysqli_query($conn,$insert_students_grades5);

            
            if($run_insert_students_grades5){
              echo "added 5 STUDENT GRADES 5 " . '<br>';
            }else{
              echo "error " . $conn->error;
            }

          }else{
            echo "error 4" . $conn->error;
          }

        }else{
          echo "error" . $conn->error;
        }


      }else{
        echo "error 4  student grades 4" . '<br>'. $conn->error;
      }

      $insert_remedial_class1 = "INSERT INTO remedial_classes (lrn,date_from,date_to,learning_areas,final_rating,remedial_class_mark,recomputed_final_grade,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn', '$date_from', '$date_to' ,'$learning_areas1', '$final_rating1', '$remedial_class_mark1','$recomputed_final_grade1', '$phase','$remedial_remarks1', '$dateCreated', '$dateUpdated')";
      $run_remedial_class1 = mysqli_query($conn,$insert_remedial_class1);

      if($run_remedial_class1){
        echo "added 5 REMEDIAL CLASSES" . '<br>';


      $insert_remedial_class2 = "INSERT INTO remedial_classes (lrn,date_from,date_to,learning_areas,final_rating,remedial_class_mark,recomputed_final_grade,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn', '$date_from', '$date_to' ,'$learning_areas2', '$final_rating2', '$remedial_class_mark2','$recomputed_final_grade2', '$phase','$remedial_remarks2', '$dateCreated', '$dateUpdated')";
      $run_remedial_class2 = mysqli_query($conn,$insert_remedial_class2);

      if($run_remedial_class2){
        echo "added 5 REMEDIAL CLASSES 2" .'<br>';
        $_SESSION['lrn'] = $lrn;
        header('Location: phase8.php');  
        exit();
      }else{
        echo "error 5" .$conn->error ;
      }
      }else{
        echo "error ". $conn->error;
      }
    }else{
      echo "error 4" . $conn->error;
    }
  }else{
    echo "error 3" . $conn->error;
  }
}
ob_end_flush();
?>