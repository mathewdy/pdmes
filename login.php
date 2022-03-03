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
    <title>Login</title>
</head>
<body>
<form action="#" method="POST">
  
 username:<br>
   <input list="text" name="username" required >
  

<br>
    password <br>
    <input type="password" name="password" required>
  

   
    
    <br>
    
    <input type="submit" name="submit" value="submit">
  
</form>


</body>
</html>

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


