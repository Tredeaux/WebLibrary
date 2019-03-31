<?php
$name = strtolower(trim($_POST["name"]));
$email = (trim($_POST["email"]));
$subject = (trim($_POST["subject"]));
$message = ($_POST["message"]);
$message = wordwrap($message,70);
$message = date("d F Y") . "\nNAME: ".$name. "\n". "EMAIL: ".$email."\n"."SUBJECT: ".$subject."\n\n". $message;
$headers = 'From: ' . "\r\n" .
    'Reply-To: ' . "\r\n" .
    "Content-Type: text/html; charset=ISO-8859-1\r\n".
    'X-Mailer: PHP/' . phpversion();

$to = ""; 
$subject = ""; 
$body =$message; 
mail($to, $subject, $body, $headers);

$_SESSION["email_sent"] = 1;

header('Location: ');

?>