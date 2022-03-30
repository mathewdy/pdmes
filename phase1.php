<?php
ob_start();
include('connection.php');
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

<?php include 'includes/header.php';?>
<link rel="stylesheet" href="src/css/phase-style.css">
<?php include 'includes/topnav.php';?>


<!---scholastic record  phase 1---> 
<div class="container-xl bg-white">
  <!-- phase 1 -->
    <form action="phase1.php" id="register_form" class="pb-3 pt-2 mx-0" method="POST">
    <fieldset>
        <section class="form-top d-flex flex-row justify-content-around align-items-center">
          <img src="src/images/DepEd.png" width="120" height="120" alt="">
          <span class="text-center">
              <p class="p-0 m-0">Republic of the Philippines</p>
              <p class="p-0 m-0">Department of Education	</p> 
              <h4 class="fw-bold">Learner's Permanent Academic Record for Elementary School</h4>
              <h4 class="p-0 m-0">(SF10-ES)</h4>
              <p class="p-0 m-0"><i>(Formerly Form 137)</i></p>
          </span>
          <img src="src/images/DepEd_2.png" width="150" height="100" alt="">
        </section>
        <p style="background:#808080; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">LEARNER'S PERSONAL INFORMATION</p>
          <section class="line-1 pt-2 pb-2 d-flex justify-content-between">
            <span class="hstack d-flex align-items-center">
                    <label for="">LAST NAME:</label>
                    <input type="text"  name="last_name" required>    
            </span>
            <span class="hstack d-flex align-items-center">
                <label for="">FIRST NAME:</label>
                <input type="text" name="first_name" required>   
            </span>
            <span class="hstack d-flex align-items-center" >
                <label for="">NAME EXTN. (Jr,I,II): </label>
                <input type="text" name="suffix_name">
            </span>
            <span class="hstack d-flex justify-content-end align-items-center">
                <label for="">MIDDLE NAME: </label>
                <input type="text" name="middle_name" required>                    
            </span>
        </section>
        <section class="line-2 d-flex justify-content-between">
            <span class="hstack d-flex align-items-end w-75">
                <label for="">Learner Reference Number (LRN):</label>
                <input type="text" style="margin: 0 1em 0 0; width:30%;" name="lrn" required>

                <label for="">Birthdate (mm/dd/yyyy):</label>
                <input type="date" name="birthday" required>  
            </span>
            <span class="hstack d-flex align-items-center w-25">
            <label for="">Sex:</label>
                <select class=" w-100" name="sex" id="" required>
                <option value="">-Gender-</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </span>
        </section>
        <p style="background:#d3d3d3; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">ELIGIBILITY FOR ELEMENTARY SCHOOL ENROLLMENT</p>
          <div class="credentials-row border border-dark px-2">
            <div class="d-flex flex-row justify-content-between">
                <i>Credential Presented for Grade 1</i>
                <span class="form-check form-check-inline">
                    <label class="form-check-label">Kinder Progress Report </label>
                    <input type="checkbox" class="form-check-input" name="credential[]" value="Kinder progress report">
                </span>
                <span class="form-check form-check-inline">
                    <label class="form-check-label">ECCD Checklist </label>
                    <input type="checkbox" class="form-check-input" name="credential[]" value="ECCD Checklist" >
                </span>
                <span class="form-check form-check-inline">
                    <label class="form-check-label">Kindergarden Certificate of Completion </label>
                    <input type="checkbox" class="form-check-input" name="credential[]" value="Kindergarten Certificate of Completion" >
                </span>
            </div>
            <section class="cred-info d-flex flex-row justify-content-between">
                <span class="hstack d-flex align-items-center">
                    <label for="">Name of School:</label>
                    <input type="text" name="name_of_school" required>
                </span>
                <span class="hstack d-flex align-items-center justify-content-start">
                    <label for="">School ID:</label>
                    <input type="text" name="school_id" required>
                </span>
                <span class="hstack d-flex align-items-center">
                <label for="">Address of School:</label>
                <input type="text" name="address_of_school" required>
                </span>
              </section>
          </div>
        <div class="other-cred">
            <p>Other Credential Presented</p>
            <span class="wrapper d-flex flex-row justify-content-evenly">
                <span>
                  <label for="" style="padding: 0 2px 0 0;">PEPT Passer</label>
                  <label for="">Rating:</label>
                  <input type="text" class="w-25" required>
                </span>
                <span>
                  <label for="">Date of Examination/Assessment (dd/mm/yyyy):</label>
                  <input type="date" name="" id=""> 
                  
                  <label for="">Others (Pls. Specify):</label>
                  <input type="text" style="width:20%;" name="" id="">
              </span>
            </span>
            <section class="last-cred d-flex flex-row justify-content-evenly px-5">
                <span class="hstack w-75">
                    <label for="">Name and Address of Testing Center:</label>
                    <input type="text" class="w-50" name=""  id="">
                </span>
                <span class="w-50">
                    <label for="">Remark:</label>
                    <input type="text" class="w-75" name="" id="">
                </span>
            </section>
        </div>
      <p style="background:#c0c0c0; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">SCHOLASTIC RECORDS</p>
      <div class="gen-container d-flex flex-row mt-0 pt-0">
      <div class="form-container" style="padding: 0 7px 7px 0 ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 1 -->
      <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
                </span>
              </span>
            </th>
          </tr>
          <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      <br>
      <br>
      <div class="form-container" style="padding:0 0 7px 7px;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 2 -->
      <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
                </span>
              </span>
            </th>
          </tr>
          <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      </div>
      <div class="gen-container d-flex">
      <div class="form-container" style="padding: 7px 7px 0 0 ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 3 -->
      <table class="table-condensed mb-5 text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
                </span>
              </span>
            </th>
          </tr>
          <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="form-container" style="padding: 7px 0 0 7px ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 3 -->
      <table class="table-condensed mb-5 text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
                </span>
              </span>
            </th>
          </tr>
          <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
      <a class="btn btn-default next-form" style="float:right;" href="#register_form"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" 
        fill="#4D96FF" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
      </a>
      <!-- <input type="button" class="next-form text-end btn btn-success" value="Next" /> -->
    </fieldset>
    <fieldset>
      <!-- back -->
      <div class="gen-container d-flex flex-row">
      <div class="form-container" style="padding: 0 7px 7px 0;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 5 -->
      <table class="table-condensed text-center w-100" >
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
                </span>
              </span>
            </th>
          </tr>
          <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="form-container" style="padding: 0 0 7px 7px ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 6 -->
      <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
                </span>
              </span>
            </th>
          </tr>
          <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      </div>
      <div class="gen-container d-flex">
      <div class="form-container" style="padding:7px 7px 0 0;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 7 -->
      <table class="table-condensed mb-5 text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
                </span>
              </span>
            </th>
          </tr>
          <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="form-container" style="padding: 7px 0 0 7px;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 8 -->
      <table class="table-condensed mb-5 text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
                </span>
              </span>
            </th>
          </tr>
          <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
      <a class="btn btn-default previous-form" name="previous" href="#register_form"><svg xmlns="http://www.w3.org/2000/svg" width="35" 
        height="35" fill="red" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
          <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
      </a>
      <input type="submit" name="next" style="float:right;" class="submitbtn btn btn-success" value="Submit">

      <!-- <input type="button" class="next-form text-end btn btn-success" value="Next" /> -->
    </fieldset>
      <!-- <input type="button" name="previous" style="float:left;" class="previous-form btn btn-default" value="" /> -->
  </form>
</div>
<script src="src/js/stepper.js"></script>
<script src="src/js/number_limitation.js"></script>
<?php
include 'includes/footer.php';
?>
<?php
if(isset($_POST['next'])){
  date_default_timezone_set('Asia/Manila');
  //scholastic_record
  $lrn123 = $_SESSION['lrn'];

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

  //3rd quarter

  $mother_tounge3 = $_POST['mother_tounge3'];
  $filipino3 = $_POST['filipino3'];
  $english3 = $_POST['english3'];
  $math3 = $_POST['math3'];
  $science3 = $_POST['science3'];
  $araling_panlipunan3 = $_POST['araling_panlipunan3'];
  $epp_tle3 = $_POST['epp_tle3'];
  $mapeh3 = $_POST['mapeh3'];

  $music3 = $_POST['music4'];
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
  $phase = 1;


  //scholastic records, remedial_classes, students_grades lang ang may phase 
  $insert_scholastic = "INSERT INTO scholastic_records (lrn,school,sr_school_id,district,division,region,
  classified_as_grade,section,school_year,name_of_adviser,phase,remarks,date_time_created,date_time_updated)
  VALUES ('$lrn123', '$school_2','$school_id_2','$district', '$division', '$region', '$classified_as_grade', '$section', '$school_year', '$name_of_adviser','$phase', '$remarks', '$dateCreated', '$dateUpdated')";
  $run_scholastic = mysqli_query($conn,$insert_scholastic);


  if($run_scholastic){
    echo "added 3 SCHOLASTIC RECORD";

    //calculate ng grade
    
    if($general_average1 > 75){
      $remarks1 = 'Passed';
    }else{
      $remarks1 = 'Failed';
    }

    $insert_students_grades1 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
        VALUES ('$lrn123','$mother_tounge1', '$filipino1', '$english1', '$math1', '$science1', '$araling_panlipunan1', '$epp_tle1','$mapeh1', '$music1', '$arts1', '$p_e1', '$health1', '$edukasyon_sa_pagpapakatao1', '$arabic_language1', '$islamic_values1', '$general_average1', '$quarterly_rating1', '$remarks1','$phase','$dateCreated', '$dateUpdated') ";
        $run_insert_students_grades1 = mysqli_query($conn,$insert_students_grades1);

    if($run_insert_students_grades1){
      echo "added 4 STUDENT GRADES 1";

      if($general_average2 > 75){
        $remarks2 = 'Passed';
      }else{
        $remarks2 = 'Failed';
      }

      $insert_students_grades2 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
        VALUES ('$lrn123','$mother_tounge2', '$filipino2', '$english2', '$math2', '$science2', '$araling_panlipunan2', '$epp_tle2','$mapeh2', '$music2', '$arts2', '$p_e2', '$health2', '$edukasyon_sa_pagpapakatao2', '$arabic_language2', '$islamic_values2', '$general_average2', '$quarterly_rating2', '$remarks2','$phase','$dateCreated', '$dateUpdated') ";
        $run_insert_students_grades2 = mysqli_query($conn,$insert_students_grades2);
      

      if($run_insert_students_grades2){
        echo "added 4 STUDENT GRADES 2";

        if($general_average3 > 75){
          $remarks3 = 'Passed';
        }else{
          $remarks3 = 'Failed';
        }

        $insert_students_grades3 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
        VALUES ('$lrn123','$mother_tounge3', '$filipino3', '$english3', '$math3', '$science3', '$araling_panlipunan3', '$epp_tle3','$mapeh3', '$music3', '$arts3', '$p_e3', '$health3', '$edukasyon_sa_pagpapakatao3', '$arabic_language3', '$islamic_values3', '$general_average3', '$quarterly_rating3', '$remarks3','$phase','$dateCreated', '$dateUpdated') ";
        $run_insert_students_grades3 = mysqli_query($conn,$insert_students_grades3);
      
        if($run_insert_students_grades3){
          echo "added 4 STUDENT GRADES 3" ;

          if($general_average4 > 75){
            $remarks4 = 'Passed';
          }else{
            $remarks4 = 'Failed';
          }


          $insert_students_grades4 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
          VALUES ('$lrn123','$mother_tounge4', '$filipino4', '$english4', '$math4', '$science4', '$araling_panlipunan4', '$epp_tle4','$mapeh4', '$music4', '$arts4', '$p_e4', '$health4', '$edukasyon_sa_pagpapakatao4', '$arabic_language4', '$islamic_values4', '$general_average4', '$quarterly_rating4','$remarks4', '$phase','$dateCreated', '$dateUpdated') ";
          $run_insert_students_grades4 = mysqli_query($conn,$insert_students_grades4);


          if($run_insert_students_grades4){
            echo "added 4 STUDENT GRADES 4" ;

            if($general_average5 > 75){
              $remarks5 = 'Passed';
            }else{
              $remarks5 = 'Failed';
            }


            $insert_students_grades5 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
            VALUES ('$lrn123','$mother_tounge5', '$filipino5', '$english5', '$math5', '$science5', '$araling_panlipunan5', '$epp_tle5','$mapeh5', '$music5', '$arts5', '$p_e5', '$health5', '$edukasyon_sa_pagpapakatao5', '$arabic_language5', '$islamic_values5', '$general_average5', '$quarterly_rating5','$remarks5', '$phase','$dateCreated', '$dateUpdated') ";
            $run_insert_students_grades5 = mysqli_query($conn,$insert_students_grades5);

            
            if($run_insert_students_grades5){
              echo "added 5 STUDENT GRADES 5 ";
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
        echo "error 4  student grades 4" . $conn->error;
      }

      $insert_remedial_class1 = "INSERT INTO remedial_classes (lrn,date_from,date_to,learning_areas,final_rating,remedial_class_mark,recomputed_final_grade,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn123', '$date_from', '$date_to' ,'$learning_areas1', '$final_rating1', '$remedial_class_mark1','$recomputed_final_grade1', '$phase','$remedial_remarks1', '$dateCreated', '$dateUpdated')";
      $run_remedial_class1 = mysqli_query($conn,$insert_remedial_class1);

      if($run_remedial_class1){
        echo "added 5 REMEDIAL CLASSES" ;


      $insert_remedial_class2 = "INSERT INTO remedial_classes (lrn,date_from,date_to,learning_areas,final_rating,remedial_class_mark,recomputed_final_grade,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn123', '$date_from', '$date_to' ,'$learning_areas2', '$final_rating2', '$remedial_class_mark2','$recomputed_final_grade2', '$phase','$remedial_remarks2', '$dateCreated', '$dateUpdated')";
      $run_remedial_class2 = mysqli_query($conn,$insert_remedial_class2);

      if($run_remedial_class2){
        echo "added 5 REMEDIAL CLASSES 2";
        $_SESSION['lrn'] = $lrn;
        header('Location: phase2.php');  
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
