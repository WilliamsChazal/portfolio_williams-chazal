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

<form action="projet_handler.php" method="post" enctype="multipart/form-data">
<h2>Ajouter un projet</h2> <br>
<div class="mb-3">
  <label for="input_titre" class="form-label">Titre</label>
  <input type="texte" class="form-control" name="projet_titre"id="input_titre"  placeholder="Titre du projet">
</div>
<div class="mb-3">
  <label for="input_debut" class="form-label">Date de démarrage</label>
  <input type="date" class="form-control" name="projet_debut" id="input_debut" placeholder="Date de début du projet">
</div>
<div class="mb-3">
  <label for="input_end" class="form-label">Date de fin</label>
  <input type="date" class="form-control" name="projet_fin"id="input_end"  placeholder="Date de fin du projet">
</div>
<div class="mb-3">
  <label for="input_contexte" class="form-label">Contexte</label>
  <textarea class="form-control" name="projet_context" id="exampleFormControlTextarea1" placeholder="Description du projet" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="input_specs" class="form-label">Spécifications fonctionnelles</label>
  <textarea class="form-control" name="projet_specs" id="exampleFormControlTextarea1" placeholder="Spécifités du projet" rows="3"></textarea>
</div>
<div class="mb-3">
<label for="input_type">Type du projet</label>
            <select name="projet_type" id="input_type">
                <option value="jeu">Jeu</option>
                <option value="web">Web</option>
                <option value="Wordpress">WordPress</option>
            </select>
</div>
<div class="mb-3">
  <label for="input_logo" class="form-label">Logo du projet</label>
  <input class="form-control"  name="projet_logo" type="file" id="input_logo" placeholder="Logo du projet">
</div>
<div class="mb-3">
  <label for="input_image" class="form-label">Capture du projet</label>
  <input class="form-control"  name="projet_image" type="file" id="input_image" placeholder="Fichier du Design">
</div>
<div class="mb-3">
            <label for="input_githublink">Lien GitHub</label>
            <input type="text" id="input_githublink" name="projet_githublink">
</div>
<div class="mb-3">
<label for="input_link">Lien du projet</label>
            <input type="text" id="input_link" name="projet_link">
</div>
<div class="col-auto">
    <button type="submit" class="btn btn-success me-3">Enregistrer le projet</button>  <a href="projet.php"><button type="button" class="btn btn-warning">Retour</button></a>
  </div>
 
</form>
</div>

        </div>


</div>
    <?php include('./footer_admin.php')?>