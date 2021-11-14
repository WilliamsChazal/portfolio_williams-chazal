<?php
    /* if(isset($_GET['id']) &&!empty($_GET['id'])) { */
        require_once('./../admin/db-connect.php');
        /* $id = strip_tags($_GET['id']); */
        /* $sql ='SELECT*FROM `projets` WHERE `idprojet`=:id'; */
        $sql ='SELECT*FROM `projets` ORDER BY idprojet DESC';
        $query = $db->prepare($sql);
      /*   $query->bindValue(':id', $id, PDO::PARAM_STR); */
        $query ->execute();
        $result = $query->fetchAll();
        /* var_dump($result); */
    /* }else{
        echo'id manquante';
    } */
?>


       
  
    <?php
                foreach ($result as $projet) {
            ?>
        <span class='hover' id='openDetails' onclick='openProjectDetails(<?=$projet["idprojet"]?>,"<?= htmlspecialchars($projet["projet_titre"],ENT_QUOTES)?>")'>
        <img src="./admin/assets_admin/admin_logo/<?=$projet['projet_logo']?>" alt="" alt="" srcset="">
            <p><?=$projet['projet_titre']?></p>
        </span>
      <?php
                }
      ?>



