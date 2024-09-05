<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Contat</h1>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <textarea rows="5" cols="" name="msg" placeholder="Enter your massage"></textarea>
            </div>
            <input id="btn" type="submit" name="send" value="send">
        </form>
    </div>
</body>

</html>

<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];


    //Load Composer's autoloader
    require 'PHPmailer/Exception.php';
    require 'PHPmailer/PHPMailer.php';
    require 'PHPmailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anandkumargupta2433@gmail.com';                     //SMTP username
        $mail->Password   = 'phrr jkxs tcne iiwz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('anandkumargupta2433@gmail.com', 'Contact Form');
        $mail->addAddress('imdeveloperanand@gmail.com', 'Hamari website');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Test Contact Form';
        $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> massage - $msg";

        $mail->send();
        echo "<div class='success'>Massage Has Been Send.</div>";
    } catch (Exception $e) {
        echo "<div class='alert'>Massage Could't Send.</div>";
    }
}

?>