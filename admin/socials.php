<?php
session_start();


if($_SESSION['username']){
    require_once('db-connect.php');
    $_sql = 'SELECT * FROM `socials`';
    $query = $db->prepare($_sql);
    $query ->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    /* var_dump($result); */

}

?>

<?php include('header_admin.php')?>





<div class="container-fluid">
  <div class="row align-items-start">
        <div class="col-2 position-sticky">
        <?php include('./navbar_admin.php')?>
        </div>

         <div class="col projet">
            <div class="row">
                <div class="col">
                    <a href="home.php"><button type="button" class="btn btn back">Retour</button></a>
                    <a href="add_socials.php"><button type="button" class="btn btn-primary">Ajouter un réseau social</button></a>
                    
            </div>
         <?php
    foreach ($result as $socials) {
?>
            <div class="card mt-4 mb-4">  
                <h5 class="card-header "><img src="./assets_admin/admin_logo/<?= $socials['socials_logo'] ?>" class="card-img-top  logo" alt="..."><?=$socials['socials_titre']?> </h5>
                    <div class="card-body text-center">
                       
                    <a href=" <?=$socials['socials_link']?>" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-primary"><?=$socials['socials_titre']?></button></a>
                        

                        <a href="socials_edit.php?id=<?=$socials['idsocials']?>" class="btn btn-warning">Modifier  : <?=$socials['socials_titre']?></a>
                        <a href="socials_delete.php?id=<?=$socials['idsocials']?>" class="btn btn-danger">Supprimer  : <?=$socials['socials_titre']?></a>
                    </div>
            </div>
            <?php
    }
?>

        </div>

</div>












<?php include('footer_admin.php')?>