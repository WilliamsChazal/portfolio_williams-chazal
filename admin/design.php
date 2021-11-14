<?php
session_start();


if($_SESSION['username']){
    require_once('db-connect.php');
    $_sql = 'SELECT * FROM `designs`  ORDER BY iddesign DESC';
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
                <a href="home.php"><button type="button" class="btn back">Retour</button></a>
                <a href="add_design.php"><button type="button" class="btn btn-primary">Ajouter un design</button></a></div>
            </div>
         <?php
    foreach ($result as $design) {
?>
            <div class="card mt-4 mb-4">  
                <h5 class="card-header "><img src="assets_admin/admin_design/<?= $design['design_thumbnail'] ?>" class="card-img-top  logo" alt="..."><?=$design['design_titre']?> </h5>
                    <div class="card-body text-center">
                        <img src="./assets_admin/admin_design/<?= $design['design_thumbnail'] ?>" class='image' class="card-img-top" alt="..." class="card-img-top" alt="...">
                        <p class="card-text list-group-item"><?=$design['design_texte']?></p>

                        <ul class="list-group list-group-flush">
      
                            <li class="list-group-item"><a href="assets_admin/admin_design/<?= $design['design_file'] ?>" target="_blank" class="btn btn-primary">Voir la maquette</a>

                            </li>
                        </ul>
                        <a href="design_edit.php?id=<?=$design['iddesign']?>" class="btn btn-warning">Modifier le design : <?=$design['design_titre']?></a>
                        <a href="design_delete.php?id=<?=$design['iddesign']?>" class="btn btn-danger">Supprimer le projet <?=$design['design_titre']?></a>
                    </div>
            </div>
            <?php
    }
?>

        </div>


</div>


<?php include('./footer_admin.php')?>