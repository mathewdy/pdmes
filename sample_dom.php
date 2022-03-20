<?php
require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$document = new Dompdf();
include('connection.php');

$sql = "SELECT * FROM learners_personal_infos";
$run = mysqli_query($conn,$sql);

if(mysqli_num_rows($run) > 0){
    foreach($run as $row){

        ?>




        <?php
        
    }
}



$document->loadHtml($html);


$document->setPaper('A4', 'landscape');

$document->render();

$document->stream("PDMES", array("Attatchment" => 0));
?>