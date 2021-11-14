<?php
session_start();

if($_SESSION['username']){
    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `designs` WHERE `iddesign`=:id';
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

<a href="design.php"><button>Retour</button></a><br>
<a href="design_edit.php?id=<?=$result['iddesign']?>">Modifier le design <?=$result['design_titre']?></a><br>
<a href="design_delete.php?id=<?=$result['iddesign']?>">Supprimer <?=$result['design_titre']?></a><br>

<?=$result['design_titre']?> <br>

<?=$result['design_texte']?> <br>
<img src="./assets_admin/admin_design/<?= $result['design_file'] ?>" class='skills_details--logo'>


<?php include('./footer_admin.php')?>