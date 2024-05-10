<?php

session_start();

if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['adresse']) && isset($_SESSION['telephone']) && isset($_SESSION['email'])) {
    // Retrieve the values from session variables

    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $adresse = $_SESSION['adresse'];
    $telephone = $_SESSION['telephone'];
    $email = $_SESSION['email'];

    // *******************************************************************************************

    
    require_once 'vendor/autoload.php'; // Include Twilio PHP library

    use Twilio\Rest\Client;

    // Your Twilio credentials
    $accountSid = 'AC355dfb359b795d75652a145fd0f97202';
    $authToken = '887e26dd366080380997e10a8edc9338';
    $twilio_phone_number = '+17176224918';

    // Initialize Twilio client
    $client = new Client($accountSid, $authToken);

    $message_body = "Bonjour $prenom $nom, votre achat a été complété avec succès.";
    $recipient_phone_number = $_POST['telephone'];

    // Send SMS
    $message = $client->messages->create(
        $recipient_phone_number, // Recipient's phone number
        [
            'from' => $twilio_phone_number, // Your Twilio phone number
            'body' => $message_body // Message body
        ]
    );

    // Output message SID
    echo 'Message SID: ' . $message->sid;



    // *******************************************************************************************


    
//     use PHPMailer\PHPMailer\PHPMailer;
//     use PHPMailer\PHPMailer\Exception;
//     use PHPMailer\PHPMailer\SMTP;

//     require 'mailer/PHPMailer/src/Exception.php';
//     require 'mailer/PHPMailer/src/PHPMailer.php';
//     require 'mailer/PHPMailer/src/SMTP.php';

//     $mail = new PHPMailer(true);
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com'; 
//     $mail->SMTPAuth = true;
//     $mail->Username = 'medmox94@gmail.com'; 
//     $mail->Password = 'medmox@1971'; 
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 587;

//     $mail->setFrom('medmox94@gmail.com', 'Mailer');
//     $mail->addAddress($email, 'Joe User'); // Add a recipient

//     $mail->isHTML(true); // Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     if(!$mail->send()) {
//         echo 'Message could not be sent.';
//         echo 'Mailer Error: ' . $mail->ErrorInfo;
//     } else {
//         echo 'Message has been sent';
//     }
// }


    // Include PHPMailer autoloader
    require 'vendor/autoload.php';

     // Include PHPMailer classes
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;
     use PHPMailer\PHPMailer\SMTP;
 
     // Load Composer's autoloader
     require 'mailer/PHPMailer/src/Exception.php';
     require 'mailer/PHPMailer/src/PHPMailer.php';
     require 'mailer/PHPMailer/src/SMTP.php';

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // Set mailer to use SMTP
    $mail->isSMTP();

    // Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;


    // Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';

    // Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    // Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = 'tls';

    // Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    // SMTP username (your Gmail username)
    $mail->Username = 'medmox94';

    // SMTP password (your Gmail password)
    $mail->Password = 'yggo ebye wlyw obzg';

    // Set the sender's email address
    $mail->setFrom('medmox@gmail.com', 'mohamed');




    if (isset($_POST["registre"])){
        // Get recipient email address from form input
        $mailTo = $_POST["email"];
    
        // Set recipient email address
        $mail->addAddress($mailTo, 'Client');
    
        // Set email subject
        $mail->Subject = 'Confirmation d\'achete';
    
        // Set email body
        $mail->Body = 'votre achete est passe bien';
    
        // Send email
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent successfully!';
        }
    }



// if (isset($_POST["registre"]))
// {
//     $mailTo = $_POST["email"];
//     $mailFrom = "Dumele";
//     $message = "https://docs.google.com/forms/d/1lpj2XnKW4HT_qHFfGwpUxcvzPmK2USZ0MGSDP0XCqfg/edit";
//     $subject = "Welcome to Dumele";
    
//     $txt = "Thank you for your interest in Dumele. We're glad to have 
//     you join our network and mission to enhance the technological 
//     innovation of our African diaspora. Below is a link to a survey 
//     we would like you to answer so we can better assist you.\n\n".$message;

//     $headers = "From: ".$mailFrom;
//     $headers = "MIME-Version: 1.0" . "\r\n";
//     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

//         (mail($mailTo, $subject, $txt, $headers));
        
    
// }   



?>