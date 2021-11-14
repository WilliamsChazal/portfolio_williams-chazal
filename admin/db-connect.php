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

/* $servername ='promo-68.codeur.online';
$dbname ='williamsc_portfolio';
$username ='williamsc';
$password ='on3zxq186gb+nw==';
try {
    $db = new PDO("mysql:host=$servername; dbname=$dbname",$username, $password);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error Connection : '.$e->getMessage();
} */


/* <?php
$servername = 'localhost';
$dbname = 'backoffice';
$username = 'root';
$password = '';
try {
$db = new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo 'succes';
} catch (PDOException $e) {
echo 'connexion fail : '.$e->getMessage();
} */