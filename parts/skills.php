<?php
    /* if(isset($_GET['id']) &&!empty($_GET['id'])) { */
        require_once('./../admin/db-connect.php');
        /* $id = strip_tags($_GET['id']); */
        /* $sql ='SELECT*FROM `projets` WHERE `idprojet`=:id'; */
        $sql ='SELECT*FROM `skills`';
        $query = $db->prepare($sql);
      /*   $query->bindValue(':id', $id, PDO::PARAM_STR); */
        $query ->execute();
        $result = $query->fetchAll();
        /* var_dump($result); */
    /* }else{
        echo'id manquante';
    } */
?>
    <div class='modal_skills_content '>
        <div  class='modal_skills_content--child '>
            <span><h2>Que sais je faire</h2></span>
            <?php

$i=0;
        foreach ($result as $skills) {
    ?>
            <span><p class='demo cursor' onclick="currentSlide(<?=$i+1?>)"><?= htmlspecialchars($skills["skills_titre"],ENT_QUOTES)?></p></span>
            
        <?php
            $i++;
                }
      ?>
        </div>
        <div class='modal_skills_content--child--1'>


        <?php

        $i=0;
                foreach ($result as $skills) {
            ?>
            <div class='slides' style=" <?= $i==0? "display:block" :"display:none" ?>">
                <span><img src="./admin/assets_admin/admin_logo/<?=$skills['skills_logo']?>" alt="" srcset=""></span>
                <span><h2><?= htmlspecialchars($skills["skills_titre"],ENT_QUOTES)?></h2></span>
                <span><p><?=$skills['skills_texte']?></p></span>
            </div>
            <?php
            $i++;
                }
      ?>
        </div>
    </div>
