<?php
    session_start();
if(
    isset($_POST['data_username'])&&!empty($_POST['data_username'])&&
    isset($_POST['data_email'])&&!empty($_POST['data_email'])&&
    isset($_POST['data_password'])&&!empty($_POST['data_password'])&&
    isset($_POST['data_confirmation'])&&!empty($_POST['data_confirmation']) ) {
        if($_POST['data_password']==$_POST['data_confirmation']){

            $user_username = strip_tags($_POST['data_username']);
            $user_email = strip_tags($_POST['data_email']);
            $user_unencrypted_password = strip_tags($_POST['data_password']);
            $user_encrypted_password = password_hash($user_unencrypted_password , PASSWORD_DEFAULT);

            require_once('db-connect.php');
            $sql = 'INSERT INTO users(`username`, `password`, `email`) VALUES(:user_username, :user_password, :user_email)';
            $query = $db->prepare($sql);
            $query->bindValue(':user_username', $user_username, PDO::PARAM_STR);
            $query->bindValue(':user_password', $user_encrypted_password, PDO::PARAM_STR);
            $query->bindValue(':user_email', $user_email, PDO::PARAM_STR);
            $query->execute();



            $_SESSION['success']='connexion réussie &#128516 ';
            header('Location:index.php');
        }else {
            $_SESSION['error']='Les mots de passe ne sont pas identiques ! &#128552 ';
            header('Location:register.php'); 
        }
        

}else{
    $_SESSION['error']='Remplissez tous les champs ! &#128531 ';
    header('Location:register.php');
}