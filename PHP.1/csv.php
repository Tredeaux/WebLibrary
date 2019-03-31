<?php

require_once '../SQL/dbconnect.php';
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "<script> console.log('Connected To DB successfully');</script>"; 
}
catch(PDOException $e)
{
echo "<script> console.log('ERROR Conecting to DB');</script>";
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$list = array("ID"."NAME");
    try {
        $stmt = $conn->prepare("SELECT * FROM `maindata`.`userdata`"); 
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 

        for ($i = 0; $i < $stmt->rowcount(); $i++ ) {
            $list_cur = array($result[$i]);
            array_push($list, $list_cur);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    print_r($list);
    
?>