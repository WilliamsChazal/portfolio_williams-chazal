<?php
session_start();
?>

<?php include('./header_admin.php')?>

<div class="container-fluid">
  <div class="row align-items-start">
        <div class="col-2 position-sticky">
        <?php include('./navbar_admin.php')?>
        </div>

         <div class="col projet">
           
            <div class="container vh-100 d-flex justify-content-center align-items-center">

<form action="design_handler.php" method="post" enctype="multipart/form-data">
<h2>Ajouter un Design</h2> <br>
<div class="mb-3">
  <label for="input_titre" class="form-label">Titre</label>
  <input type="texte" class="form-control" name="design_titre" id="exampleFormControlInput1" placeholder="Titre de la compétence">
</div>
<div class="mb-3">
  <label for="input_texte" class="form-label">Description</label>
  <textarea class="form-control" name="design_texte" id="exampleFormControlTextarea1" placeholder="Description du design" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="input_logo" class="form-label">Aperçu du Design</label>
  <input class="form-control"  name="design_thumbnail" type="file" id="formFile" placeholder="Fichier du Design">
</div>
<div class="mb-3">
  <label for="input_file" class="form-label">Fichier du Design</label>
  <input class="form-control"  name="design_file" type="file" id="formFile" placeholder="Fichier du Design">
</div>
<div class="col-auto">
    <button type="submit" class="btn btn-success me-3 mb-3">Enregistrer le document</button> <a href="design.php"><button type="button" class="btn btn-warning mb-3">Retour</button></a>
  </div>
 
</form>
</div>

        </div>


</div>


<?php include('./footer_admin.php')?>