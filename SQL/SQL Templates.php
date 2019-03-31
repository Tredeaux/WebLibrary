<?php
//-----------------------------------------------------------------------------------------------------------------------
// Fetch Database Connection data
//-----------------------------------------------------------------------------------------------------------------------

require_once "SQL/dbconnect.php";

//-----------------------------------------------------------------------------------------------------------------------
//Conencting To Database
//-----------------------------------------------------------------------------------------------------------------------

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script> console.log('✔️ Connected To Database successfully!');</script>"; 
}
catch(PDOException $e) {
    echo "<script> console.log('❌ Error Conecting to Database');</script>";
}

//-----------------------------------------------------------------------------------------------------------------------
// When Executing a SQL
//-----------------------------------------------------------------------------------------------------------------------

try {

    $stmt = $conn->prepare("QUERY HERE"); 
    $stmt->execute();

    echo "✔️ Success! <br>";
} catch(PDOException $e) {

    echo "❌ Error: " . $e->getMessage() ."<br>";
}

//-----------------------------------------------------------------------------------------------------------------------
// SQL Queries
//-----------------------------------------------------------------------------------------------------------------------

// Select

"SELECT * FROM `Database`.`Table`"
"SELECT * FROM `Database`.`Table` WHERE `field` = `value`"
"SELECT * FROM `Database`.`Table` WHERE `field` = `value` AND  `field` = `value`"
"SELECT * FROM `Database`.`Table` WHERE `field` = `value` OR  `field` = `value`"
"SELECT * FROM `Database`.`Table` WHERE NOT `field` = `value`"
"SELECT * FROM `Database`.`Table` WHERE NOT `field` = `value` AND NOT `field` = `value`"

    // NULL
"SELECT * FROM `Database`.`Table` WHERE `field`IS NULL"
"SELECT * FROM `Database`.`Table` WHERE `field`IS NOT NULL"

    //LIMIT-Ammount
"SELECT * FROM `Database`.`Table` LIMIT #"

// Order Data

"SELECT * FROM `Database`.`Table` WHERE `field` = `value` ORDER BY `field`"
"SELECT * FROM `Database`.`Table` WHERE `field` = `value` ORDER BY `field`,`field2`"
"SELECT * FROM `Database`.`Table` WHERE `field` = `value` ORDER BY `field` ASC/DESC "
"SELECT * FROM `Database`.`Table` WHERE `field` = `value` ORDER BY `field` ASC,`field2` DESC"

// Insert

"INSERT INTO `Database`.`Table` (`field`,`field2`) VALUES (`value`, `value2`)"

// Update

"UPDATE `Database`.`Table` SET `field` = `value`WHERE `field` = `value`"

// Delete 

"DELETE FROM `Database`.`Table` WHERE `field` = `value`"

//-----------------------------------------------------------------------------------------------------------------------
// Reults Format
//-----------------------------------------------------------------------------------------------------------------------

// Get Result in Array
$stmt = $conn->prepare("QUERY"); 
$stmt->execute();
$results = array();
if ($stmt->execute()) {
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
    }
}

//Only 1 row of results

$stmt = $conn->prepare("SELECT * FROM $db.`_Table_` WHERE `id` = :id"); 
$stmt->execute([":id" => $id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>