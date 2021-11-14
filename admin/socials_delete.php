<?php
session_start();
 
if($_SESSION['username']){
    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `socials` WHERE `idsocials`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query ->execute();
        $result = $query->fetch();
        $sql ='DELETE FROM `socials` WHERE `idsocials`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query ->execute();
        header('location: socials.php');
        echo "<script type='text/javascript'>alert('Socials deleted');</script>";
        
    }else{
        echo'id manquant';}
    }else{
        echo'identifiez-vous';
    }