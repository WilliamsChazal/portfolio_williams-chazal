<?php
$servername ='localhost';
$dbname ='the_office';
$username ='root';
$password ='';
try {
    $db = new PDO("mysql:host=$servername; dbname=$dbname",$username, $password);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo 'Error Connection : '.$e->getMessage();
}




