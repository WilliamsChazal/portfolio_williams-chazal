<!-- <div><h1>Conception visuelle</h1></div> -->
<?php
    /* if(isset($_GET['id']) &&!empty($_GET['id'])) { */
        require_once('./../admin/db-connect.php');
        /* $id = strip_tags($_GET['id']); */
        /* $sql ='SELECT*FROM `projets` WHERE `idprojet`=:id'; */
        $sql ='SELECT*FROM `designs`  ORDER BY iddesign DESC';
        $query = $db->prepare($sql);
      /*   $query->bindValue(':id', $id, PDO::PARAM_STR); */
        $query ->execute();
        $result = $query->fetchAll();
        /* var_dump($result); */
    /* }else{
        echo'id manquante';
    } */
?>
<div class="grid">
  <div class="grid-sizer"></div>

  <div class="grid-item">
  <?php
                foreach ($result as $designs) {
            ?>
            <h5><?=$designs['design_titre']?></h5>
    <img src="./admin/assets_admin/admin_design/<?=$designs['design_thumbnail']?>"/>
    
    <p><?=$designs['design_texte']?></p>
   <a href="./admin/assets_admin/admin_design/<?=$designs['design_file']?>" target="_blank" rel="noopener noreferrer"> <button class='design'>Voir la maquette : <?=$designs['design_titre']?> </button></a>
   <?php
                }
      ?>
  </div>

 
  </div>
</div>


    
      <span>
      

      </span>
     