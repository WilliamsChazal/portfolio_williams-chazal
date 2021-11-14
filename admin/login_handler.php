<?php

require_once("db-connect.php");
// cherche une entrée dans la base de données (username) qui correspond avec ce que l'utilisateur a renseigné dans le forumlaire.
$sql = 'SELECT id,username,password FROM users WHERE username=:username';
$query = $db->prepare($sql);
$query->execute (array('username'=>$_POST['data_username']));
$result = $query->fetch();

if(!$result){
    echo 'l\'identifiant et/ou le Mot de passe sont incorrects <br> <button><a href="login.php">Retour</button></a>';
}else{
    $verif = password_verify($_POST['data_password'],$result['password']); 
    if(!$verif){
        echo 'l\'identifiant et/ou le Mot de passe sont incorrects';
    }else{
        session_start();
        $_SESSION['id']=$result['id'];
        $_SESSION['username']=$result['username'];
        $_SESSION['success']='Connexion réussie';
        header('Location:home.php');
    }

}