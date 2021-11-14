<?php
session_start();


if($_SESSION['username']){
    require_once('db-connect.php');
    $_sql = 'SELECT * FROM `skills`';
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
                    <a href="add_skills.php"><button type="button" class="btn btn-primary">Ajouter une compétence</button></a></div>
            </div>
         <?php
    foreach ($result as $skills) {
?>
            <div class="card mt-4 mb-4">  
                <h5 class="card-header "><img src="./assets_admin/admin_logo/<?= $skills['skills_logo'] ?>" class="card-img-top  logo" alt="..."><?=$skills['skills_titre']?> </h5>
                    <div class="card-body text-center">
                       
                        <p class="card-text list-group-item"><?=$skills['skills_texte']?></p>

                        <a href="#" class="btn btn-warning">Modifier la compétence : <?=$skills['skills_titre']?></a>
                        <a href="#" class="btn btn-danger">Supprimer la compétence : <?=$skills['skills_titre']?></a>
                    </div>
            </div>
            <?php
    }
?>

        </div>


</div>



<a href="add_skills.php"><button>Ajouter une compétence</button></a>
<br><a href="home.php"><button>Retour</button></a>

<?php include('./footer_admin.php')?>