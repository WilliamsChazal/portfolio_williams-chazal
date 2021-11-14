<?php
session_start();

if($_SESSION['username']){
    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `projets` WHERE `idprojet`=:id';
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

<a href="projet.php"><button type="button" class="btn btn-primary">Retour</button></a><br>

<div class="card" style="width: 18rem;">
  <img src="./assets_admin/admin_img/<?= $result['projet_image'] ?>" class='projets_details--image' class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$result['projet_titre']?></h5>
    <p class="card-text"><?=$result['projet_contexte']?> <br></p>
    <p class="card-text"><?=$result['projet_specs']?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?=$result['projet_date_debut']?> &nbsp; <?=$result['projet_date_fin']?> </li>
    <li class="list-group-item"><?=$result['projet_type']?></li>
    <li class="list-group-item"><img src="./assets_admin/admin_logo/<?= $result['projet_logo'] ?>" class='projets_details--logo'></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link"><?=$result['projet_github']?> <br></a>
    <a href="#" class="card-link"><?=$result['projet_link']?></a>
  </div>
  <a href="projet_edit.php?id=<?=$result['idprojet']?>"><button type="button" class="btn btn-warning">Modifier le Projet <?=$result['projet_titre']?></button></a><br>
<a href="projet_delete.php?id=<?=$result['idprojet']?>"><button type="button" class="btn btn-danger">Supprimer <?=$result['projet_titre']?></button></a><br>
</div>


<?php include('./footer_admin.php')?>


