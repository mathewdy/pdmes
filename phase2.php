<?php
// ob_start();
// include('connection.php');
// session_start();
// if(empty($_SESSION['username'])){
//     echo "<script>window.location.href='login.php'</script>";
// }

// error_reporting(E_ERROR & E_WARNING);
// $lrn = $_SESSION['lrn'] ;

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

<a href="index.php">Back</a>

<!---scholastic record  phase 2--->
<h3>Scholastic records</h3>
<h4>Phase 2</h4>
<div class="container">
  <div class="container">
  <form action="phase2.php" method="POST">
    <div class="row">
      <div class="first col-md-10">
        <label class="first form-label">School:</label>
        <input type="text" name="school" class="px-3 school txt rounded" id="school_2">

        <label class="form-label">School ID:</label>
        <input type="text" name="school_id" id="school_id_2" class="school_id rounded txt">

      </div>

      <div class="col-md-10">
        <label class="form-label">District</label>
        <input type="text" name="district" class="form-input rounded">

        <label class="form-label">Division</label>
        <input type="text" name="division" class="form-input rounded">

        <label class="form-label">Region</label>
        <input type="text" name="Region" class="form-input rounded">
      </div>
      
    </div>

    <div class="row">
      <div class="col-md-12">
        <label class="form-label">Classified as Grade</label>
        <input type="text" name="classified_as_grade" class="form-input as_grade rounded" > 

        <label class="form-label">Section</label>
        <input type="text" name="section" class="form-input rounded">

        <label class="form-label">School Year</label>
        <input type="text" name="school_year" class="form-input rounded">
        
        <div class="col-md-8">
          <label class="form-label" for="">Name of Adviser : </label>
          <input type="text" name="name_of_adviser" class="form-input adviser rounded" >
        </div>
        

      </div>
    </div>
    <div class="row text-center  mt-2">
    <div class="border border-dark col-md-4  ">
      <h3>Learning Areas</h3>
    </div>
    <div class="col-md-4  border border-dark">
      <h4>Quarterly Rating</h4>
      <div class="col-md-12">
        <div class=" quarters  justify-content-between mx-1  ">
          <p class="q-1">1</p>
          <p class="q-2">2</p>
          <p class="q-3">3</p>
          <p class="q-4">4</p>
        </div>
      </div>
      </div>
      <div class="col-md-2 border border-dark">
        <h4>Final Rating</h4>
      </div>
    </div>
    <div class="row">
      <div class="col ">
          <!-- <h4>Mothers Tongue</h4>
          <h4>Filipino</h4>
          <h4>English</h4>
          <h4>Math</h4>
          <h4>Science</h4>
          <h4>Aralin Panlipunan</h4>
          <h4>EPP/TLE</h4>
          <h4>MAPEH</h4>
          <h5>Music</h5>
          <h5>Arts</h5>
          <h5>PE</h5>
          <h5>Health</h5>
          <h4>Edukasyon sa Pagkakatao</h4>
          <h5>Arabic Language</h5>
          <h5>Islamic Values</h5>
          <h4>General Average</h4> -->
        </div>
        <div class="row">
          <div class="col-md-4">
            <h3>Mother's Tongue</h3>
          </div>
          <div class="col-md-7">
            <div class="first-row">
              <input type="tel" name="mother_tounge1" class="mothertongue mothertounge1 me-5" pattern="[0-9]{2}" title="Please input 2 Numbers only" >
              <input type="tel" name="mother_tounge2" class="mothertongue mothertounge2 " pattern="[0-9]{2}" title="Please input 2 Numbers only" >
              <input type="tel" name="mother_tounge3" class="mothertongue mothertounge3" pattern="[0-9]{2}" title="Please input 2 Numbers only" >
              <input type="tel" name="mother_tounge4" class="mothertongue mothertounge4" pattern="[0-9]{2}" title="Please input 2 Numbers only" >
              <input type="tel" name="mother_tounge5" class="mothertongue mothertounge5" pattern="[0-9]{2}" title="Please input 2 Numbers only" >
            </div>
          </div>
        </div>

      

      
        <div class="row">
          <div class="col-md-4 me-4">
          <h3 class="mx-4">Filipino</h3>
          </div>
          <div class="col-md-7">
          <div class="second-row">
            <input type="text" class="filipino  filipino1" name="filipino1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" class="filipino filipino2"  name="filipino2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" class="filipino filipino3"  name="filipino2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" class="filipino filipino4"  name="filipino3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" class="filipino filipino5"  name="filipino4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 me-4">
          <h3 class="mx-4">English</h3>
        </div>
        <Div class="col-md-7">
          <div class="third-row">
          <input type="text" name="english1" class="english english1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="english2"  class="english english2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="english3"  class="english english3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="english4"  class="english english4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="english5"  class="english english5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
        </Div>
      </div>

      <div class="row">
        <div class="col-md-4 me-4">
          <h3 class="mx-4">Math</h3>

        </div>
        <div class="col-md-7">
          <div class="fourth-row">
          <input type="text" name="math1" class="math math1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="math2" class="math math2"  pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="math3" class="math math3"  pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="math4" class="math math4"  pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="math5" class="math math5"  pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 me-4">
          <h3 class="mx-4">Science</h3>
        </div>
          <div class="col-md-7">
            <div class="fifth-row">
              <input type="text" name="science1" class="science science1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="science2" class="science science2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="science3"  class="science science3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="science4"  class="science science4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="science5"  class="science science5"pattern="[0-9]{2}" title="Please input 2 Numbers only">
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-md-4 me-4">
          <h3 class="mx-4">Aralin Panlipunan</h3>
        </div>
        <div class="col-md-7">
          <div class="sixth-row">
            <input type="text" name="araling_panlipunan1" class="araling_panlipunan araling_panlipunan1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="araling_panlipunan2" class="araling_panlipunan araling_panlipunan2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="araling_panlipunan3" class="araling_panlipunan araling_panlipunan3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="araling_panlipunan4" class="araling_panlipunan araling_panlipunan4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="araling_panlipunan5" class="araling_panlipunan araling_panlipunan5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 me-4">
        <h3 class="mx-4">EPP/TLE</h3>
      </div>
      <div class="col-md-7">
        <div class="seventh-row">
              <input type="text" name="epp_tle1" class="epp epp1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="epp_tle2" class="epp epp2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="epp_tle3" class="epp epp3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="epp_tle4" class="epp epp4"  pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="epp_tle5" class="epp epp5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-4 me-4">
        <h3 class="mx-4">MAPEH</h3>
      </div>
        <div class="col-md-7">
            <div class="eighth-row">
              <input type="text" name="mapeh1" class="mapeh mapeh1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="mapeh2" class="mapeh mapeh2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="mapeh3" class="mapeh mapeh3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="mapeh4" class="mapeh mapeh4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="mapeh5" class="mapeh mapeh5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 me-4">
      <h3 class="mx-4">Music</h3>
    </div>
    <div class="col-md-7">
          <div class="nineth-row">
            <input type="text" name="music1" class="music music1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="music2"  class="music music2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="music3"  class="music music3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="music4"   class="music music4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="music5"  class="music music5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-4 me-4">
      <h3 class="mx-4">PE</h3>
    </div>
    <div class="col-md-7">
        <div class="eleventh-row">
            <input type="text" name="p_e1" class="pe pe1" pattern="[0-9]{2}"  class="pe2" title="Please input 2 Numbers only">
            <input type="text"  class="pe pe2" name="p_e2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="p_e3"  class="pe pe3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="p_e4"  class="pe pe4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="p_e5"  class="pe pe5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-md-4 me-4">
      <h3 class="mx-4">Health</h3>
    </div>
    
    <div class="col-md-7">
          <div class="twelfth-row">
            <input type="text" name="health1" class="health health1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="health2" class="health health2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="health3" class="health health3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="health4" class="health health4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="health5" class="health health5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-4 me-4 ">
      <h3 class="mx-4" >Edukasyon sa Pagkakatao</h3>
    </div>

      <div class="col-md-7">
        <div class="thirteenth-row">
              <input type="text" name="edukasyon_sa_pagpapakatao1" class="edukasyon_sa_pagpapakatao edukasyon_sa_pagpapakatao1"  pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="edukasyon_sa_pagpapakatao2" class="edukasyon_sa_pagpapakatao edukasyon_sa_pagpapakatao2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="edukasyon_sa_pagpapakatao3" class="edukasyon_sa_pagpapakatao edukasyon_sa_pagpapakatao3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="edukasyon_sa_pagpapakatao4" class="edukasyon_sa_pagpapakatao edukasyon_sa_pagpapakatao4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
              <input type="text" name="edukasyon_sa_pagpapakatao5" class="edukasyon_sa_pagpapakatao edukasyon_sa_pagpapakatao5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
      </div>
    </div> 
  </div>

  <div class="row">
    <div  class="col-md-4 me-3">
      <h3 class="mx-4">Arabic Language</h3>
    </div>
    <div class="col-md-7">
          <div class="fourteenth-row">
            <input type="text" name="arabic_language1" class="arabic_language arabic_language1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="arabic_language2" class="arabic_language arabic_language2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="arabic_language3" class="arabic_language arabic_language3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="arabic_language4" class="arabic_language arabic_language4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="arabic_language5" class="arabic_language arabic_language5" pattern="[0-9]{2}" title="Please input 2 Numbers only">

          </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-4 me-3">
      <h3 class="mx-4">Islamic Value</h3>
    </div>

    <div class="col-md-7">
        <div class="fifteenth-row">
          <input type="text" name="islamic_values1" class="islamic_values islamic_values1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          <input type="text" name="islamic_values2" class="islamic_values islamic_values2"  pattern="[0-9]{2}" title="Please input 2 Numbers only">
          <input type="text" name="islamic_values3" class="islamic_values islamic_values3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          <input type="text" name="islamic_values4" class="islamic_values islamic_values4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          <input type="text" name="islamic_values5" class="islamic_values islamic_values5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
        </div>

  </div>

  <div class="row">
    <div class="col-md-4 me-3">
      <h3 class="mx-4">General Average</h3>
    </div>
    <div class="col-md-7">
          <div class="sixteenth-row">
            <input type="text" name="general_average1" class="general_average general_average1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="general_average2" class="general_average general_average2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="general_average3" class="general_average general_average3" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="general_average4" class="general_average general_average4" pattern="[0-9]{2}" title="Please input 2 Numbers only">
            <input type="text" name="general_average5" class="general_average general_average5" pattern="[0-9]{2}" title="Please input 2 Numbers only">
          </div>
        </div>

  </div>
  <div class="row">
    <div class="col-md-3">
      <h3>Remedial Classes</h3>
    </div>
    <div class="col-md-5">
      <div class="date-conducted">
      <label class="dcf">Date Conducted From : </label>
      <input type="date" class="datefrom" name="date_from">
      </div>
      
    </div>
    <div class=" col-md-4">
        <label class="dct" for="">Date Conducted To :</label>
        <input type="date" class="dateto" name="date_to">
    </div>
</div>
<div class="row">
  <div class="col-md-2">
    <label for="">Learning Areas  </label>
  </div>
  <div class="col-md-2">
  <label for="">Final Rating  </label>
</div>
<div class="col-sm-2">
  <label for="">Remarks </label>
</div>
<div class="col-md-3">
<label for="">Recomputed Final Grade  </label> 
</div>
<div class="col-sm-3">
<label for="">Remarks :</label>
</div>


</div>

<div class="row">
  <div class="col-md-2">
    <input type="text" class="learning-areas1" name="learning_areas1">
  </div>
  <div class="col-md-2 ">
  <input type="text" class="final_rating1" name="final_rating1" >
  </div>
  <div class="col-md-2">
  <select name="remedial_class_mark1" id=""> 
      <option value="">-Remakrs-</option>
      <option value="Passed">Passed</option>
      <option value="Failed">Failed</option>
    </select> 
  </div>
  <div class="col-md-3">
  <input type="text" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only">
  </div>
  <div class="col-md-3">
      
  <select name="remedial_remarks1" id="" > 
      <option value="">-Remakrs-</option>
      <option value="Passed">Passed</option>
      <option value="Failed">Failed</option>
    </select> 
  </div>
</div>

<div class="row mt-1">
  <div class="col-md-2">
    <input type="text" class="learning_areas2" name="learning_areas2">
  </div>
  <div class="col-md-2">
  <input type="text" class="final_rating2" name="final_rating2" >
  </div>
  <div class="col-md-2">
  <select name="remedial_class_mark2" id=""> 
      <option value="">-Remakrs-</option>
      <option value="Passed">Passed</option>
      <option value="Failed">Failed</option>
    </select> 
  </div>
  <div class="col-md-3">
  <input type="text" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only">
  </div>
  <div class="col-md-3">
      
  <select name="remedial_remarks2" id="" > 
      <option value="">-Remakrs-</option>
      <option value="Passed">Passed</option>
      <option value="Failed">Failed</option>
    </select> 
  </div>
</div>
<div class="col-md-4 mt-4">
  <input type="submit" class="btn btn-lg btn-success mx-auto" name="next" value="Next"> 
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
  $phase =2;


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
      echo "added 4 STUDENT GRADES 1";

      if($general_average2 > 75){
        $remarks2 = 'Passed';
      }else{
        $remarks2 = 'Failed';
      }

      $insert_students_grades2 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
      VALUES ('$lrn','$mother_tounge2', '$filipino2', '$english2', '$math2', '$science2', '$araling_panlipunan2', '$epp_tle2', '$mapeh2','$music2', '$arts2', '$p_e2', '$health2', '$edukasyon_sa_pagpapakatao2', '$arabic_language2', '$islamic_values2', '$general_average2', '$quarterly_rating2','$remarks2', '$phase','$dateCreated', '$dateUpdated') ";
      $run_insert_students_grades2 = mysqli_query($conn,$insert_students_grades2);
      

      if($run_insert_students_grades2){
        echo "added 4 STUDENT GRADES 2";

        if($general_average3 > 75){
          $remarks3 = 'Passed';
        }else{
          $remarks3 = 'Failed';
        }

        $insert_students_grades3 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
        VALUES ('$lrn','$mother_tounge3', '$filipino3', '$english3', '$math3', '$science3', '$araling_panlipunan3', '$epp_tle3','$mapeh3', '$music3', '$arts3', '$p_e3', '$health3', '$edukasyon_sa_pagpapakatao3', '$arabic_language3', '$islamic_values3', '$general_average3', '$quarterly_rating3','$remarks3', '$phase','$dateCreated', '$dateUpdated') ";
        $run_insert_students_grades3 = mysqli_query($conn,$insert_students_grades3);
      
        if($run_insert_students_grades3){
          echo "added 4 STUDENT GRADES 3";

          if($general_average4 > 75){
            $remarks4 = 'Passed';
          }else{
            $remarks4 = 'Failed';
          }


          $insert_students_grades4 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
          VALUES ('$lrn','$mother_tounge4', '$filipino4', '$english4', '$math4', '$science4', '$araling_panlipunan4', '$epp_tle4','$mapeh4', '$music4', '$arts4', '$p_e4', '$health4', '$edukasyon_sa_pagpapakatao4', '$arabic_language4', '$islamic_values4', '$general_average4', '$quarterly_rating4','$remarks4', '$phase','$dateCreated', '$dateUpdated') ";
          $run_insert_students_grades4 = mysqli_query($conn,$insert_students_grades4);


          if($run_insert_students_grades4){
            echo "added 4 STUDENT GRADES 4" ;

            if($general_average5 > 75){
              $remarks5 = 'Passed';
            }else{
              $remarks5 = 'Failed';
            }



            $insert_students_grades5 = "INSERT INTO students_grades (lrn,mother_tounge,filipino,english,math,science,araling_panlipunan,epp_tle,mapeh,music,arts,p_e,health,edukasyon_sa_pagpapakatao,arabic_language,islamic_values,general_average,term,remarks,phase,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tounge5', '$filipino5', '$english5', '$math5', '$science5', '$araling_panlipunan5', '$epp_tle5','$mapeh5', '$music5', '$arts5', '$p_e5', '$health5', '$edukasyon_sa_pagpapakatao5', '$arabic_language5', '$islamic_values5', '$general_average5', '$quarterly_rating5','$remarks5', '$phase','$dateCreated', '$dateUpdated') ";
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
        echo "added 5 REMEDIAL CLASSES 2";
        $_SESSION['lrn'] = $lrn;
        header('Location: phase3.php');  
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