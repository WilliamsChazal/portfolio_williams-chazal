<?php
session_start();

if($_SESSION['username']){
            if($_POST){
                if(isset($_POST['idprojet']) &&!empty($_POST['idprojet'])&&
                isset($_POST['projet_titre'])&&!empty($_POST['projet_titre'])&&
                isset($_POST['projet_debut'])&&!empty($_POST['projet_debut'])&&
                isset($_POST['projet_fin'])&&!empty($_POST['projet_fin'])&&
                isset($_POST['projet_context'])&&!empty($_POST['projet_context'])&&
                isset($_POST['projet_specs'])&&!empty($_POST['projet_specs'])&&
                isset($_POST['projet_githublink'])&&!empty($_POST['projet_githublink'])&&
                isset($_POST['projet_link'])&&!empty($_POST['projet_link'])&&
                isset($_POST['projet_type'])&&!empty($_POST['projet_type'])){
            
            require_once("db-connect.php");
            $id=strip_tags($_POST['idprojet']);
            $titre =strip_tags($_POST['projet_titre']);
            $begin =strip_tags($_POST['projet_debut']);
            $end =strip_tags($_POST['projet_fin']);
            $context =strip_tags($_POST['projet_context']);
            $specs =strip_tags($_POST['projet_specs']);
            $type =strip_tags($_POST['projet_type']);
            $githublink =strip_tags($_POST['projet_githublink']);
            $projetlink =strip_tags($_POST['projet_link']);
        
            $sql ='UPDATE `projets` SET `projet_titre`=:projet_titre, `projet_date_debut`=:projet_date_debut, `projet_date_fin`=:projet_date_fin, `projet_contexte`=:projet_contexte, `projet_specs`=:projet_specs, `projet_github`=:projet_github, `projet_link`=:projet_link, `projet_type`=:projet_type WHERE `idprojet`=:idprojet';


            $query = $db ->prepare($sql);

            $query = $db ->prepare($sql);
            $query->bindValue(':idprojet', $id, PDO::PARAM_INT);
            $query->bindValue(':projet_titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':projet_date_debut', $begin, PDO::PARAM_STR);
            $query->bindValue(':projet_date_fin', $end, PDO::PARAM_STR);
            $query->bindValue(':projet_contexte', $context, PDO::PARAM_STR);
            $query->bindValue(':projet_specs', $specs, PDO::PARAM_STR);
            $query->bindValue(':projet_github', $githublink, PDO::PARAM_STR);
            $query->bindValue(':projet_link', $projetlink, PDO::PARAM_STR);
            $query->bindValue(':projet_type', $type, PDO::PARAM_STR);
           /*  $query->bindValue(':projet_image', $picture, PDO::PARAM_STR);
            $query->bindValue(':projet_logo', $logo, PDO::PARAM_STR); */
            $query->execute();
            echo 'Sucess';


            $sql ='SELECT*FROM `projets` WHERE `idprojet`=:id';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query ->execute();
            $result = $query->fetch();


?>
        <a href="projet.php?id=<?php echo $result['idprojet'];?>"><button>Retour</button></a>

        <?php
        }else{
            echo 'Remplissez tous les champs';echo '<br><a href=home.php> Retour </a>';}

    }else{
        echo 'l\'Url n\'est pas valide';
    }
}else{
    echo 'Vous n\'êtes pas identifiez';
}