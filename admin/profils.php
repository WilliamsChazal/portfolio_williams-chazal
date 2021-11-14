<?php
session_start();


if($_SESSION['username']){
    require_once('db-connect.php');
    $_sql = 'SELECT * FROM `users`';
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
                    <a href="register.php"><button type="button" class="btn btn-primary">Ajouter un utilisateur</button></a>
                    <?php
    foreach ($result as $users) {
?>

<div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header"><h5><?=$users['username']?></h5></div>
  <div class="card-body">
    <p class="card-title"><?=$users['email']?></p>
  </div>
  <div class="card-footer"><a href="user_delete.php?id=<?=$users['id']?>"><i class="fas fa-trash-alt" id='trash'></i>&nbsp;Supprimer :&nbsp;<?=$users['username']?> </i></a></div>
</div>



          
            <?php
    }
?>
            </div>


        </div>

</div>












<?php include('footer_admin.php')?>