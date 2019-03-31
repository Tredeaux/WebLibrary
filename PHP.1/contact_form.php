<?php
$name = strtolower(trim($_POST["name"]));
$email = (trim($_POST["email"]));
$subject = (trim($_POST["subject"]));
$message = ($_POST["message"]);
$message = wordwrap($message,70);
$message = date("d F Y") . "\nNAME: ".$name. "\n". "EMAIL: ".$email."\n"."SUBJECT: ".$subject."\n\n". $message;
$headers = 'From: contact@biofeedbacksa.co.za' . "\r\n" .
    'Reply-To: contact@biofeedbacksa.co.za' . "\r\n" .
    "Content-Type: text/html; charset=ISO-8859-1\r\n".
    'X-Mailer: PHP/' . phpversion();

$to = "contact@biofeedbacksa.co.za"; 
$subject = "QUERY | ".$name; 
$body =$message; 
mail($to, $subject, $body, $headers);

$_SESSION["email_sent"] = 1;

header('Location: https://biofeedbacksa.co.za/contact.php');

?>