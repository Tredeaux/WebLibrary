<?php
//This is for localhost testing only
//Host
$host = "";

//dbname
$db = "";

//username
$username = "";

//password
$password = "";

$dsn= "mysql:host=$host;dbname=$db";

$conn = new PDO($dsn, $username, $password);
if($conn){
    echo "✔️ Connected to the <strong>$db</strong> database successfully!<br>";
} else {
    echo "❌ Error connecting to <strong>$db</strong>! <br> ";
}

try {
    $stmt = $conn->prepare("CREATE TABLE $db.`_Table_` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `Integer with default` INT(10) DEFAULT '0', 
        `integer no default` INT(10)',
        `String` VARCHAR(255),
        `Text` TEXT(1000),
        `current_date` TIMESTAMP
        )"); 
    $stmt->execute();
    echo "✔️ _Table_ created succesfully! <br>";
} catch(PDOException $e) {
    echo "❌ Error: _Table_ " . $e->getMessage();
}

?>

