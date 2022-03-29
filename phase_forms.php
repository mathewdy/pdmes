<?php
// ob_start();
// include('connection.php');
// session_start();
// if(empty($_SESSION['username'])){
//     echo "<script>window.location.href='login.php'</script>";
// }

// error_reporting(E_ERROR & E_WARNING);
// $lrn = $_SESSION['lrn'];
// if(empty($_SESSION['lrn'])){
//   echo "<script>window,location.href='addrecord.php' </script>";
// }


// $query_lrn = "SELECT * FROM learners_personal_infos WHERE lrn = '$lrn' ";
// $run_query_lrn = mysqli_query($conn,$query_lrn);



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

  
  <div class="phase-row justify-content-center mx-auto ">
    <div class="container">
    <body>



<!---scholastic record  phase 1--->
<h3>Scholastic records</h3>
<h4>Phase 1</h4>
      <div class="container">
    <form action="phase1.php" method="POST">
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
    <br>
    <input type="submit" name="next" value="Next"> 

    </form>
    
</body>
    </div>
    <div class="container">
    <h3>Scholastic records</h3>
<h4>Phase 2</h4>
<div class="container">
    <form action="phase2.php" method="POST">
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
    <br>
    <input type="submit" name="next" value="Next"> 

    </form>
    
    </div>
  
 
</div>

<div class="phase-row justify-content-center mx-auto ">
  <div class="container">
  <h3>Scholastic records</h3>
<h4>Phase 3</h4>
<div class="container">
    <form action="phase3.php" method="POST">
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
  </div>

  <div class="container">
  <h3>Scholastic records</h3>
<h4>Phase 4</h4>
<div class="container">
    <form action="phase4.php" method="POST">
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
  </div>
 
</div>

<div class="phase-row justify-content-center mx-auto ">
  <div class="container">
  <h3>Scholastic records</h3>
<h4>Phase 5</h4>
<div class="container">
    <form action="phase5.php" method="POST">
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

</form>>
  </div>

  <div class="container">
  <h3>Scholastic records</h3>
<h4>Phase 6</h4>
<div class="container">
    <form action="phase6.php" method="POST">
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
  </div>
 
</div>

<div class="phase-row justify-content-center mx-auto ">
  <div class="container">
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
  </div>

  <div class="container">
  <h3>Scholastic records</h3>
<h4>Phase 8</h4>
<div class="container">
    <form action="phase8.php" method="POST">
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
  </div>
 
</div>




  
    

</body>
</html>


  