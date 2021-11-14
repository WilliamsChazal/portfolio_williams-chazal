<?php
session_start();

if($_SESSION['username']){
    require_once('db-connect.php');
    $_sql = 'SELECT * FROM `projets` ORDER BY idprojet DESC';
    $query = $db->prepare($_sql);
    $query ->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    /* var_dump($result); */

}



?>

<?php include('./header_admin.php')?>

<div class="container-fluid">
  <div class="row align-items-start">
        <div class="col-2 position-sticky">
        <?php include('./navbar_admin.php')?>
        </div>

         <div class="col projet">
            <div class="row">
                <div class="col">
                    <a href="home.php"><button type="button" class="btn btn back">Retour</button></a>
                    <a href="add_projet.php"><button type="button" class="btn btn-primary">Ajouter un projet</button></a></div>
            </div>
         <?php
    foreach ($result as $projet) {
?>
            <div class="card mt-4 mb-4">  
                <h5 class="card-header "><img src="./assets_admin/admin_logo/<?= $projet['projet_logo'] ?>" class="card-img-top  logo" alt="..."><?=$projet['projet_titre']?> </h5>
                    <div class="card-body text-center">
                        <img src="./assets_admin/admin_img/<?= $projet['projet_image'] ?>" class='image' class="card-img-top" alt="..." class="card-img-top" alt="...">
                        <p class="card-text list-group-item"><?=$projet['projet_contexte']?></p>
                        <p class="card-text list-group-item"><?=$projet['projet_specs']?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?=$projet['projet_date_debut']?> &nbsp; <?=$projet['projet_date_fin']?></li>
                            <li class="list-group-item"<?=$projet['projet_type']?>></li>
                            <li class="list-group-item"><a href="<?=$projet['projet_link']?> " target="_blank" class="btn btn-primary">Lien du site</a>
                             <a href="<?=$projet['projet_github']?>" target="_blank" class="btn btn-primary">Github</a>
                            </li>
                        </ul>
                        <a href="projet_edit.php?id=<?=$projet['idprojet']?>" class="btn btn-warning">Modifier le projet <?=$projet['projet_titre']?></a>
                        <a href="projet_delete.php?id=<?=$projet['idprojet']?>" class="btn btn-danger">Supprimer le projet <?=$projet['projet_titre']?></a>
                    </div>
            </div>
            <?php
    }
?>

        </div>

</div>


<?php include('./footer_admin.php')?>