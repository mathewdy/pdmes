<?php    
    if(isset($_POST ['send'])){

        function sentmail($to, $attachment){

            require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");

    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = 'thaddeusgamit31@gmail.com';
    $mail->Password = 'ktegeztjzmyogrjm';
    $mail->SetFrom('thaddeusgamit31@gmail.com');
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("$to");

     if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            } 
     else {
            echo "Message has been sent";
     }
    
        }

        $to = $_POST(['email']);

    }
   
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>

    


<form action = index.php method = "POST">
<label for="">Sent your emmail to </label>
        <input type="text" name="email" id=""> <br>
<label for="">Sent your attachment</label>
        <input type="file" name="attachment" id=""> <br>

        <input type="submit" name="send" value="Sent">

</form>




</form>
    
</body>
</html>