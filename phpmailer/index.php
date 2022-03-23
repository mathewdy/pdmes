<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    

    //we need to create an instance of PHPMailer
    $mail = new PHPMailer();

    //set where we are sending email
    $mail->addAddress('******@gmail.com', 'Senaid Bacinovic');

    //set who is sending an email
    $mail->setFrom('******', 'Admin at CPI');

    //set subject
    $mail->Subject = "Test email!";

    //type of email
    $mail->isHTML(true);

    //write email
    $mail->Body = "<p>this is our email body</p><br><br><a href='http://google.com'>Google</a>";

    //include attachment
    $mail->addAttachment('fbcover.png', 'Facebook cover.png');

    //send an email
    if (!$mail->send())
        echo "Something wrong happened!";
    else
        echo "Mail sent";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Email</title>
</head>
<body>

<form action = index.php method = "POST">
<input type = "text" name= "name"> Enter your name </input required>

</form>
    
</body>
</html>
