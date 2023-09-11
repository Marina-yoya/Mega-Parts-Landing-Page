<?php
$host = "localhost"; 
$database = "megaparts"; 
$username = "root"; 


try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
