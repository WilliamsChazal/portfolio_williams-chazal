<?php
session_start();

if($_SESSION['username']){
    
    if($_POST){

        if(isset($_POST['social_titre'])&&!empty($_POST['social_titre'])&&
        isset($_POST['social_link'])&&!empty($_POST['social_link'])&&
        isset($_FILES['social_logo']) && !empty($_FILES['social_logo'])){
    
            require_once("db-connect.php");
            $titre =strip_tags($_POST['social_titre']);
            $link =strip_tags($_POST['social_link']);
                    
                        if ($_FILES['social_logo']['error']) {     
                            switch ($_FILES['social_logo']['error']){     
                                    case 1: // UPLOAD_ERR_INI_SIZE     
                                    echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
                                    break;     
                                    case 2: // UPLOAD_ERR_FORM_SIZE     
                                    echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
                                    break;     
                                    case 3: // UPLOAD_ERR_PARTIAL     
                                    echo "L'envoi du fichier a été interrompu pendant le transfert !";     
                                    break;     
                                    case 4: // UPLOAD_ERR_NO_FILE     
                                    echo "Le fichier que vous avez envoyé a une taille nulle !"; 
                                    break;     
                            }     
                        }  else {     
                    
                            $target_dir = "./assets_admin/admin_logo/";
                            $target_file = $target_dir . basename($_FILES["social_logo"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                            // Check if image file is a actual image or fake image
                            if(isset($_POST["submit"])) {
                            $check = getimagesize($_FILES["social_logo"]["tmp_name"]);
                                if($check !== false) {
                                    echo "File is an image - " . $check["mime"] . ".";
                                    $uploadOk = 1;
                                } else {
                                    echo "File is not an image.";
                                    $uploadOk = 0;
                                }
                            }
                    
                            // Check if file already exists
                            if (file_exists($target_file)) {
                                echo "file already exists but it's all good bro.";
                                $uploadOk = 1;
                            }
                    
                            // Check file size
                            if ($_FILES["social_logo"]["size"] > 500000) {
                                echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }
                    
                            // Allow certain file formats
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                && $imageFileType != "gif" ) {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }
                    
                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                                echo "Sorry, your file was not uploaded.";
                            // if everything is ok, try to upload file
                            } else {
                                if (move_uploaded_file($_FILES["social_logo"]["tmp_name"], $target_file)) {
                                    echo "Le fichier ". htmlspecialchars( basename( $_FILES["social_logo"]["name"])). " a été téléversé.";
                                    $logo = basename( $_FILES["social_logo"]["name"]) ;

                        
                        $sql ="INSERT INTO socials (socials_titre,socials_link, socials_logo) VALUES(:social_titre,:social_link,:social_logo)";
                        $query = $db ->prepare($sql);
                        $query->bindValue(':social_titre', $titre, PDO::PARAM_STR);
                        $query->bindValue(':social_link', $link, PDO::PARAM_STR);
                        $query->bindValue(':social_logo', $logo, PDO::PARAM_STR);
                        $query->execute();
                        echo 'Sucess';
                        echo 'Les données ont été enregistré dans le base de données !'; 
                        echo'<br><a href=socials.php> Retour </a>';
                    } else {
                        echo 'Remplissez tous les champs';echo '<br><a href=socials.php> Retour </a>';
                    } 
                }
            }
            

        } else {
            echo 'Il manque une information !';
            echo'<br><a href=socials.php> Retour </a>';
           
        }
                
            
    } else {
        echo 'Pour acceder à cette page vous devez publier une compétence';
    }
} else {
    echo 'Vous n\'êtes pas identifiez';
}

?>