<?php
session_start();

if($_SESSION['username']){
    
    if($_POST){

        if(isset($_POST['projet_titre'])&&!empty($_POST['projet_titre'])&&
        isset($_POST['projet_debut'])&&!empty($_POST['projet_debut'])&&
        isset($_POST['projet_fin'])&&!empty($_POST['projet_fin'])&&
        isset($_POST['projet_context'])&&!empty($_POST['projet_context'])&&
        isset($_POST['projet_specs'])&&!empty($_POST['projet_specs'])&&
        isset($_POST['projet_githublink'])&&!empty($_POST['projet_githublink'])&&
        isset($_POST['projet_link'])&&!empty($_POST['projet_link'])&&
        isset($_POST['projet_type'])&&!empty($_POST['projet_type'])&&
        isset($_FILES['projet_image']) && !empty($_FILES['projet_image'])&&
        isset($_FILES['projet_logo']) && !empty($_FILES['projet_logo'])){
    
            require_once("db-connect.php");
            $titre =strip_tags($_POST['projet_titre']);
            $begin =strip_tags($_POST['projet_debut']);
            $end =strip_tags($_POST['projet_fin']);
            $context =strip_tags($_POST['projet_context']);
            $specs =strip_tags($_POST['projet_specs']);
            $type =strip_tags($_POST['projet_type']);
            $githublink =strip_tags($_POST['projet_githublink']);
            $projetlink =strip_tags($_POST['projet_link']);

            if ($_FILES['projet_image']['error']) {     
                switch ($_FILES['projet_image']['error']){     
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
        
                $target_dir = "./assets_admin/admin_img/";
                $target_file = $target_dir . basename($_FILES["projet_image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["projet_image"]["tmp_name"]);
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
                if ($_FILES["projet_image"]["size"] > 5000000) {
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
                    if (move_uploaded_file($_FILES["projet_image"]["tmp_name"], $target_file)) {
                        echo "Le fichier ". htmlspecialchars( basename( $_FILES["projet_image"]["name"])). " a été téléversé.";
                        $picture = basename( $_FILES["projet_image"]["name"]) ;
        
                    }}}

                    
                        if ($_FILES['projet_logo']['error']) {     
                            switch ($_FILES['projet_logo']['error']){     
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
                            $target_file = $target_dir . basename($_FILES["projet_logo"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                            // Check if image file is a actual image or fake image
                            if(isset($_POST["submit"])) {
                            $check = getimagesize($_FILES["projet_logo"]["tmp_name"]);
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
                            if ($_FILES["projet_logo"]["size"] > 500000) {
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
                                if (move_uploaded_file($_FILES["projet_logo"]["tmp_name"], $target_file)) {
                                    echo "Le fichier ". htmlspecialchars( basename( $_FILES["projet_logo"]["name"])). " a été téléversé.";
                                    $logo = basename( $_FILES["projet_logo"]["name"]) ;

                        
                        $sql ="INSERT INTO projets (projet_titre,projet_date_debut,projet_date_fin,projet_contexte,projet_specs, projet_github,projet_link,projet_type, projet_image, projet_logo) VALUES(:projet_titre,:projet_date_debut,:projet_date_fin,:projet_contexte,:projet_specs,:projet_github,:projet_link,:projet_type,:projet_image,:projet_logo)";
                        $query = $db ->prepare($sql);
                        $query->bindValue(':projet_titre', $titre, PDO::PARAM_STR);
                        $query->bindValue(':projet_date_debut', $begin, PDO::PARAM_STR);
                        $query->bindValue(':projet_date_fin', $end, PDO::PARAM_STR);
                        $query->bindValue(':projet_contexte', $context, PDO::PARAM_STR);
                        $query->bindValue(':projet_specs', $specs, PDO::PARAM_STR);
                        $query->bindValue(':projet_github', $githublink, PDO::PARAM_STR);
                        $query->bindValue(':projet_link', $projetlink, PDO::PARAM_STR);
                        $query->bindValue(':projet_type', $type, PDO::PARAM_STR);
                        $query->bindValue(':projet_image', $picture, PDO::PARAM_STR);
                        $query->bindValue(':projet_logo', $logo, PDO::PARAM_STR);
                        $query->execute();
                        echo 'Sucess';
                        echo 'Les données ont été enregistré dans le base de données !'; 
                        echo'<br><a href=projet.php> Retour </a>';
                    } else {
                        echo 'Remplissez tous les champs';echo '<br><a href=projet.php> Retour </a>';
                    } 
                }
            }
            

        } else {
            echo 'Il manque une information !';
           
        }
                
            
    } else {
        echo 'Pour acceder à cette page vous devez publier un projet';
    }
} else {
    echo 'Vous n\'êtes pas identifiez';
}

?>