<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Document</title>
</head>
<style>
th{
    border: 2px solid #ddd;
}
</style>
<body>
<?php
    include('connection.php');
    $output = '';

    if(isset($_POST['query'])){
        $search = mysqli_real_escape_string($conn, $_POST['query']);
        $query = "SELECT * FROM learners_personal_infos WHERE first_name LIKE '%".$search."%'
        OR last_name LIKE '%".$search."%'
        OR lrn LIKE '%".$search."%'
        ";
    }else{
        $query="SELECT * FROM learners_personal_infos";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        $number = 0;
        $output .='<table class="table table-hover table-light table-striped" id="table-data">
        <thead class="text-center">
            <tr>
                <th>No.</th>
                <th>LRN</th>
                <th>STUDENT NAME</th>
                <th>GENDER</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>';
        while($row = mysqli_fetch_array($result)){
            
            $number++;
            $output .='
            <tr class="clickable-row text-center" data-href="view-student.php?lrn='.$row ["lrn"].'" style="cursor:pointer;">
            <td>'.$number.'</td>
            <td>'.$row["lrn"].'</td>
            <td>'.$row["first_name"].' '.$row["middle_name"].' '.$row["last_name"].'</td>
            <td>'.$row["sex"].'</td>
            <td class="d-flex flex-row justify-content-evenly">
                <a href="edit-student.php?lrn='.$row ["lrn"].'"><i style="color:#56BBF1; font-size:30px;" class="fa-solid fa-pen-to-square"></i></a>
                <a href="delete-student.php?lrn='.$row ["lrn"].'"><i style="color:red; font-size:30px;" class="fa-solid fa-circle-minus"></i></a>
            </td>   
            </tr>  
            ';
        }
        echo $output;
    }else{
        echo "
        <div class='alert alert-danger'>
            No data Found
        </div>
        ";
    }

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>

</body>
</html>