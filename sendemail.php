<?PHP
/*$sender = 'adam.kokoszka.it@gamil.com';
$recipient = 'polskikuglarek@gamil.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}*/
?>


<?php
    //include PHPMailerAutoload.php
    $postimie = $_POST["imie"];
    $postemail = $_POST["email"];
    $posttemat = $_POST["temat"];
    $posttext = $_POST["textarea"];
    require 'phpmailer/PHPMailerAutoload.php';

    //create an instance of PHPMailer
    $mail = new PHPMailer();

    //set a host
    $mail->Host = "smtp.gmail.com";

    //enable SMTP
    $mail->isSMTP();
    $mail->SMTPDebug = 2;

    //set authentication to true
    $mail->SMTPAuth = true;

    //set login details for Gmail account
    $mail->Username = "emerozwod@gmail.com";
    $mail->Password = "---";

    //set type of protection
    $mail->SMTPSecure = "ssl"; //or we can use TLS

    //set a port
    $mail->Port = 465; //or 587 if TLS

    //set subject
    $mail->Subject = $posttemat;

    //set HTML to true
    $mail->isHTML(true);

    //set body
    $posttext = $posttext." <br><br>Kontakt:<br>Email: ".$postemail;
    
    $mail->Body = $posttext;

    //add attachment

    $mail->AddAttachment($_FILES['ubfile']['tmp_name'], $_FILES['ubfile']['name']);

    //set who is sending an email
    $mail->setFrom( $postemail, $postemail);

    //set where we are sending email (recipients)
    $mail->addAddress('adam.kokoszka.it@gmail.com');

    //send an email
    if ($mail->send()){
        echo "mail is sent";
      echo "<script>window.location.assign('podziekowanie.html')</script>";
//        header('Location: podziekowanie.html');
    }
    else {
        echo $mail->ErrorInfo;
        header('Location: index.html');
    }

?>