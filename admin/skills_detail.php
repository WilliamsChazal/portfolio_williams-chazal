<?php
session_start();

if($_SESSION['username']){
    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `skills` WHERE `idskills`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query ->execute();
        $result = $query->fetch();
        /* var_dump($result); */
        echo'ça marche <br>';
    }else{
        echo'id manquante';
    }
}else{
    echo'identifiez-vous';
}
?>
<?php include('./header_admin.php')?>
<a href="skills.php"><button>Retour</button></a><br>
<a href="skills_edit.php?id=<?=$result['idskills']?>">Modifier la compétence <?=$result['skills_titre']?></a><br>
<a href="skills_delete.php?id=<?=$result['idskills']?>">Supprimer <?=$result['skills_titre']?></a><br>
<img src="./assets_admin/admin_logo/<?= $result['skills_logo'] ?>" class='skills_details--logo'>
<?=$result['skills_titre']?> <br>

<?=$result['skills_texte']?> <br>





<?php include('./footer_admin.php')?>