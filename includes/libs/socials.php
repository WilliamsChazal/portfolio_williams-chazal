<!-- <div><h1>Conception visuelle</h1></div> -->
<?php
    /* if(isset($_GET['id']) &&!empty($_GET['id'])) { */
        require_once('./admin/db-connect.php');
        /* $id = strip_tags($_GET['id']); */
        /* $sql ='SELECT*FROM `projets` WHERE `idprojet`=:id'; */
        $sql ='SELECT*FROM `socials`';
        $query = $db->prepare($sql);
      /*   $query->bindValue(':id', $id, PDO::PARAM_STR); */
        $query ->execute();
        $result = $query->fetchAll();
        /* var_dump($result); */
    /* }else{
        echo'id manquante';
    } */
?>

<section class='socials'>
    <div>
    <?php
                foreach ($result as $socials) {
            ?>
    <span>
    <img src="./admin/assets_admin/admin_logo/<?=$socials['socials_logo']?>" alt="logo " srcset="">
    <a href="<?=$socials['socials_link']?>" target="_blank" rel="noopener noreferrer"><span><p><?=$socials['socials_titre']?></p></span></a>
    </span>
    <?php
                }
      ?>
    </div>
    
</section>