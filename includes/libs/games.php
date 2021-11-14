<?php
    /* if(isset($_GET['id']) &&!empty($_GET['id'])) { */
        require_once('./admin/db-connect.php');
        /* $id = strip_tags($_GET['id']); */
        /* $sql ='SELECT*FROM `projets` WHERE `idprojet`=:id'; */
        $sql ='SELECT * FROM  projets WHERE projet_type = "jeu"';
        $query = $db->prepare($sql);
      /*   $query->bindValue(':id', $id, PDO::PARAM_STR); */
        $query ->execute();
        $result = $query->fetchAll();
        /* var_dump($result); */
    /* }else{
        echo'id manquante';
    } */
?>


<section class='games'>
    <div><h4 class='text-pop-up-top' >Mes Jeux</h4></div>
        <div>
        <?php
                foreach ($result as $projet) {
            ?>
            <span onclick="displayIframe('<?=$projet['projet_link']?>')" class='heartbeat'> 
                <img src="./admin/assets_admin/admin_logo/<?=$projet['projet_logo']?>" alt="" srcset="">
            </span>
            <span onclick="displayIframe('<?=$projet['projet_link']?>')">
                <p><?=$projet['projet_titre']?></p>
            </span>
            <span  onclick ="removeIFrame('<?=$projet['projet_link']?>')"><i class="fa fa-times-circle" aria-hidden="true" id="close_games"></i></span>
            <?php
                }
      ?>
       </div> 
       
</section>


<script>


function displayIframe(projet_link) {
        let frame = document.getElementById("iframeDisplay");
        
        document.getElementById("iframeDisplay").innerHTML = "<iframe src='"+projet_link+"' height=\"100%\" width=\"100%\" ></iframe>";
            frame.style.display ='block'
        document.getElementById('close_games').style.display ='block';
        
        }
function removeIFrame(projet_link) {
      let frame = document.getElementById("iframeDisplay");
      frame.style.display ='none';
      document.getElementById('close_games').style.display ='none';
}
</script>