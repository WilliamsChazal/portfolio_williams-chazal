<?php
    /* if(isset($_GET['id']) &&!empty($_GET['id'])) { */
        require_once('./admin/db-connect.php');
        /* $id = strip_tags($_GET['id']); */
        /* $sql ='SELECT*FROM `projets` WHERE `idprojet`=:id'; */
        $sql ='SELECT * FROM  projets WHERE projet_type = "Wordpress"';
        $query = $db->prepare($sql);
      /*   $query->bindValue(':id', $id, PDO::PARAM_STR); */
        $query ->execute();
        $result = $query->fetchAll();
        /* var_dump($result); */
    /* }else{
        echo'id manquante';
    } */
?>


<section class="wordpress">
    <div>
        
        <?php
                foreach ($result as $projet) {
            ?>
        <spans><img src="./admin/assets_admin/admin_logo/<?=$projet['projet_logo']?>" alt="" srcset=""></span>
            <a href="<?=$projet['projet_link']?>" target="_blank" rel="noopener noreferrer">
            <span><p><?=$projet['projet_titre']?></p></span>
            
        </a> 
            <?php
                }
      ?>
        
    </div>
</section>