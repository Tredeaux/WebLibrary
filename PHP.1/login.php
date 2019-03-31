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
    $name = strtolower(trim($_POST["name"]));
    $password = (trim($_POST["password"]));

    try {
        $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE  `username` = :name" ); 
        $stmt->execute([":name" => $name]);
        if ($stmt->rowcount() == 1)
        {
            $result =  $stmt->fetch(PDO::FETCH_ASSOC);
            $hash = $result["password"];

            if (password_verify($password, $hash)) {
                $_SESSION["id"] = $result["id"];
                $_SESSION["surname"] = $result["surname"];
                $_SESSION["name"] = $result["name"];
                $_SESSION["username"] = $result["username"];
                $_SESSION["member"] = $result["member"];
                if ($result["admin"] == 1) {
                    $_SESSION["admin"] = 1;
                }
                $_SESSION["login_suc"] = 1;
            header("Location: ../index2.php");
            } else {
                $_SESSION["login_err"] = 1;
                header("Location: ../signup.php");
            }
            
        } else {
            $_SESSION["login_err_uname"] = 1;
            header("Location: ../signup.php");
        }
    } catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
        header("Location: ../index2Err1.php");
    }
?>