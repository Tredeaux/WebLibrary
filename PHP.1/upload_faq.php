<?php
require_once '../SQL/dbconnect.php';
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "<script> console.log('Connected To DB successfully');</script>"; 
}
catch(PDOException $e)
{
//echo "<script> console.log('ERROR Conecting to DB');</script>";
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$question = (trim($_POST["q"]));
$answer = (trim($_POST["a"]));

if ($question && $answer) {
    try {
        $stmt = $conn->prepare("INSERT INTO `biofefqs_maindata`.`faqs` (`question`, `answer`) VALUES (:q1, :a1)" ); 
        $stmt->execute([":q1" => $question, ":a1" => $answer]);
        $_SESSION["faq_success"] = 1;
        header("Location: ../index2.php");
    } catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
        header("Location: ../index2.php");
    }
} else {
    header("Location: ../index2.php");
}
?>