<?php
include('connection.php');
session_start();
if(empty($_SESSION['username'])){
   echo "<script>window.location.href='login.php' </script>";
}

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$num_per_age = 05;
$start_from = ($page-1)*05;

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
<a href="addrecord.php"> ADD RECORD </a> <br>
<a href="logout.php"> Logout</a>

<form action="" method="POST">
    <label for="">Search</label>
    <input type="text" name="search_student" >
</form>
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>LRN</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $sql = "SELECT * FROM learners_personal_infos";
            $run = mysqli_query($conn,$sql);
            $total = mysqli_num_rows($run);
      
           
            if(mysqli_num_rows($run) > 0){
                $number = 0;
                foreach($run as $row){
                $number++;
                   
                    ?>

                        <tr>
                            
                            <td><?php echo $number?></td>
                            <td><?php echo $row ['lrn']?></td>
                            <td><?php echo $row ['last_name']?></td>
                            <td><?php echo $row ['first_name']?></td>
                            <td><?php echo $row ['middle_name']?></td>
                            <td>
                                <a href="view-student.php?lrn=<?php echo $row ['lrn']?>">View</a>
                                <a href="edit-student.php?lrn=<?php echo $row ['lrn'] ?>">Edit</a>
                                <a href="delete-student.php?lrn=<?php echo $row ['lrn']?>">Delete</a>
                            </td>                
                        </tr>

                    <?php
                }
                
            }


    ?>
    </tbody>
</table>

<?php
$pr_query = "SELECT * FROM learners_personal_infos";
$pr_results = mysqli_query($conn,$pr_query);
$total_record = mysqli_num_rows($pr_results);

$total_page = ceil($total_record/$num_per_age);


if($page > 1 ){
    echo  "".($page-1)."' class='btn btn-danger'>Previous</a> ";
}

for($i=1;$i<$total_page;$i++){
    echo  "".$i."' class='btn btn-primary'>$i</a> ";
}

if($i > $page ){
    echo  "".($page+1)."' class='btn btn-danger'>Next</a> ";
}

?>

<!---page ination --->
</body>
</html>
    
