<?php       //connection to the database

$dsn = "mysql:host=localhost;dbname=userlogin";
$dbusername = "root";
$dbpassword = "AlMi120805";

try {       #error handling in case
    $pdo = new PDO($dsn, $dbusername, $dbpassword); #flexible for connecting to other databases(this is the connection line)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage()); 

}
