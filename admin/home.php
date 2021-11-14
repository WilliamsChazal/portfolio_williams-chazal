<?php
session_start();


?>
<?php include('./header_admin.php')?>

<div class="container-fluid">
  <div class="row align-items-start">
        <div class="col-2 position-sticky">
        <?php include('./navbar_admin.php')?>
         </div>
          <div class="col-10">
          <h1>Bienvenue dans votre arrière boutique <br> </h1><h2><?php echo $_SESSION['username'];?></h2>
          <div class="container-home">

              
              <div class='cards'>

              <div class="card" style="width: 18rem;">
                  <img src="./assets_admin/project.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Projets</h5>
                    <p class="card-text"></p>
                    <a href="./projet.php" class="btn btn-primary">Voir les projets</a>
                  </div>
              </div>

              <div class="card" style="width: 18rem;">
                  <img src="./assets_admin/design.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Designs</h5>
                    <p class="card-text"></p>
                    <a href="./design.php" class="btn btn-primary">Voir les designs</a>
                  </div>
              </div>
              <div class="card" style="width: 18rem;">
                  <img src="./assets_admin/skills.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Compétences</h5>
                    <p class="card-text"></p>
                    <a href="./skills.php" class="btn btn-primary">Voir les compétences</a>
                  </div>
              </div>
              <div class="card" style="width: 18rem;">
                  <img src="./assets_admin/socials.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Réseaux sociaux</h5>
                    <p class="card-text"></p>
                    <a href="./socials.php" class="btn btn-primary">Voir les réseaux sociaux</a>
                  </div>
              </div>

              </div>
            </div>
          </div>



    </div>
</div>
   

<?php include('./footer_admin.php')?>



