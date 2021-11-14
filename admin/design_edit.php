<?php
session_start();

if($_SESSION['username']){
    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `designs` WHERE `iddesign`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query ->execute();
        $result = $query->fetch();
        /* var_dump($result); */
    }else{
        echo 'l\'Url n\'est pas valide';
    }
}else{
    echo 'Vous n\'êtes pas identifiez';
}
?>
<?php include('./header_admin.php')?>

<div class="container-fluid">
  <div class="row align-items-start">
        <div class="col-2 position-sticky">
        <?php include('./navbar_admin.php')?>
        </div>
         <div class="col projet">
           <div class="container vh-100 d-flex justify-content-center align-items-center">

               <form action="design_edit_handler.php" method="post" enctype="multipart/form-data">
        <h2>Modifier : <?= $result['design_titre']?> </h2> <br>
        <div class="me-3">
        <div class="mb-3">
            <label for="input_titre" class="form-label">Titre</label>
            <input type="texte" class="form-control" name="design_titre" id="exampleFormControlInput1" placeholder="Titre de la compétence" value="<?= $result['design_titre']?>" require">
            </div>
        <div class="mb-3">
            <label for="input_texte" class="form-label">Description</label>
                <textarea class="form-control" name="design_texte" id="exampleFormControlTextarea1" placeholder="Description du design" rows="3"  require><?= $result['design_texte']?></textarea>
                    <input type="hidden" name="iddesign" value='<?= $result['iddesign'] ?>'>
                    <button type="submit" class="btn btn-success me-3 mb-3 mt-3">Enregistrer</button>
        </div>
    </form>
    </div>
    <form action="design_thumbnail_handler.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 me-3">
            <label for="input_logo" class="form-label">Aperçu du Design</label>
                <input class="form-control"  name="design_thumbnail" type="file" id="formFile" placeholder="Fichier du Design" ><?= $result['design_thumbnail']?>
                 <input type="hidden" name="iddesign" value='<?= $result['iddesign'] ?>'>
                 <button type="submit" class="btn btn-success me-3 mb-3 mt-3">Enregistrer</button>
        </div>
    </form>

    <form action="design_file_handler.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 me-3">
            <label for="input_file" class="form-label" >Fichier du Design</label>
                <input class="form-control"  name="design_file" type="file" id="formFile" placeholder="Fichier du Design"  require ><?= $result['design_file']?>
                <input type="hidden" name="iddesign" value='<?= $result['iddesign'] ?>'>
                <button type="submit" class="btn btn-success me-3 mb-3 mt-3">Enregistrer</button>
        </div>
    </form>
    <div class="col-auto">
         <a href="design.php"><button type="button" class="btn btn-warning mb-3">Retour</button></a>
  </div>
           </div>
        </div>
</div>


<?php include('./footer_admin.php')?>