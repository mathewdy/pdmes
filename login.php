<?php
include('connection.php');
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/custom-style.css">
    <title>Login</title>
</head>
<body>
<div class="container-fluid px-0 py-2 text-center text-white bg-main">
    <p class="display-6 m-0">PLACIDO DEL MUNDO</p>
    <p class="lead m-0">ELEMENTARY SCHOOL</p>
    <p class="address">1116 Quirino Hwy, Novaliches, Quezon City, 1116 Metro Manila</p>
</div>
<div class="form-container container text-center">
    <form action="#" method="POST" class="login-form">
        <span class="form-header">
            <h1 class="header-text bg-success display-6">SIGN IN</h5>
        </span>
        <span class="input-boxes">
            <input type="text" name="username" placeholder="USERNAME" required >
            <input type="password" name="password" placeholder="PASSWORD" required>
            <input type="submit" name="submit" value="SUBMIT">
        </span>
    </form>
</div>
<?php
include "includes/footer.php";
?>

<?php 


if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    
    $query="SELECT * FROM admin WHERE username = '$username' ";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
               
                $_SESSION['username'] = $username;
                header("location: index.php");
                die();
            } 
            else{
                echo '<script>alert("Incorrect credentials")</script>' ; 
            }
        }
        
    } 
    else{
        echo '<script>alert("Incorrect credentials")</script>' ; 
    }
}
$conn->close();

    
 

    


   

?>


