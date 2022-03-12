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
<?php
include 'includes/header.php';
?>
<div class="table-container container">
    <div class="table-top container-fluid p-0 d-flex flex-row justify-content-between">
        <a class="btn btn-success" href="addrecord.php"><i class="fa-solid fa-user-plus"></i>  ADD RECORD </a> <br>
        <span>
            <input type="text" placeholder="Search..." class="form-control" id="searchbox" name="search_student">
        </span>
    </div>
<div id="result"></div>
</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script> 
    $(document).ready(function(){
        load_data();
        function load_data(query){
            $.ajax({
                url: 'table.php',
                method: "post",
                data: {query:query},
                success: function(data){
                    $('#result').html(data);
                }
            });
        }
        $("#searchbox").keyup(function(){
            var search = $(this).val();
            if(search !=''){
                load_data(search);
            }else{
                load_data();
            }
        });
    });
</script>
<?php
include 'includes/footer.php';
?>
    
