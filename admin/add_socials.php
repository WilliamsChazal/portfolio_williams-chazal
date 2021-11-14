<?php
session_start();
?>

<?php include('header_admin.php')?>



<div class="container-fluid">
  <div class="row align-items-start">
        <div class="col-2 position-sticky">
        <?php include('./navbar_admin.php')?>
        </div>

         <div class="col projet">
           
            <div class="container vh-100 d-flex justify-content-center align-items-center">

            <form action="socials_handler.php" method="post" enctype="multipart/form-data">
<h2>Ajouter un réseau social</h2> <br>
<div class="mb-3">
  <label for="input_titre" class="form-label">Titre</label>
  <input type="texte" class="form-control" name="social_titre" id="exampleFormControlInput1" placeholder="Titre">
</div>
<div class="mb-3">
  <label for="input_logo" class="form-label">Logo</label>
  <input class="form-control"  name="social_logo" type="file" id="formFile">
</div>
<div class="mb-3">
<label for="input_titre" class="form-label">lien</label>
  <input type="texte" class="form-control" name="social_link" id="exampleFormControlInput1" placeholder="lien">
</div>

<div class="col-auto">
    <button type="submit" class="btn btn-success me-3 mb-3">Enregistrer le réseau social</button> <a href="socials.php"><button type="button" class="btn btn-warning mb-3 me-3">Retour</button></a>
  </div>
  
</form>
</div>

        </div>


</div>


<?php include('footer_admin.php')?>