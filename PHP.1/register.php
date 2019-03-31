<?php
    require_once '../SQL/dbconnect.php';
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ////echo "<script> console.log('Connected To DB successfully');</script>"; 
    }
    catch(PDOException $e)
    {
    ////echo "<script> console.log('ERROR Conecting to DB');</script>";
    }

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $uname = strtolower(trim($_POST["uname"]));
    $password = (trim($_POST["password"]));
    $email = (trim($_POST["email"]));

    $password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE  `username` = :name " ); 
        $stmt->execute([":name" => $uname]);

        $b = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE  `email` = :em " ); 
        $b->execute([":em" => $email]);
        
        if (($stmt->rowcount() > 0))
        {
            $_SESSION["name_exist"] = 1;
            header("Location: ../signup.php");
        } else if ($b->rowcount() > 0) {
            $_SESSION["email_exist"] = 1;
            header("Location: ../signup.php");
        }
            
            else if ($stmt->rowcount() == 0) {
            $stmt = $conn->prepare("INSERT INTO `biofefqs_maindata`.`userdata` (`username`, `password`, `email`,`member`) VALUES (:q1, :a1, :p1, '0')" );
            $stmt->execute([":q1" => $uname, ":a1" => $password, ":p1" => $email]);
            $_SESSION["reg_success"] = 1;
            header("Location: ../signup.php");
        }

    } catch(PDOException $e) {
        header("Location: ../index2.php");
    }
?>