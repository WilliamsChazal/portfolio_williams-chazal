<?php session_start(); ?>
<?php include('./header_admin.php')?>

<div class="container vh-100 d-flex justify-content-center align-items-center">
   
        <div class="card" style="width: 18rem;">
            <img src="assets_admin/office-4.svg" class="card-img-top wc-image-cover" alt="...">
                 <div class="card-body">
                     <form method="post" action="register_handler.php">
                        <div class="mb-2">
                            <label for="input_username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="input_username" name="data_username">
                        </div>
                        <div class="mb-3">
                            <label for="input_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="input_email" name="data_email">
                        </div>
                        <div class="mb-3">
                            <label for="input_password" class="form-label">Mot de Passe</label>
                            <input type="password" class="form-control" id="input_password" name="data_password">
                        </div>
                        <div class="mb-3">
                            <label for="input_confirmation" class="form-label">Confirmer Mot de Passe</label>
                            <input type="password" class="form-control" id="input_confirmation" name="data_confirmation">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-primary">S'inscrire</button>
                        </div>   
                    </form>
                    
                         <?php 
                            if(!empty($_SESSION['error'])){
                                echo '<div class="alert alert-danger" role="alert">'. $_SESSION['error'].'</div>';
                            }    $_SESSION['error']='';                    
                         ?>
                    <div class="d-flex justify-content-end mt-3"><a href="home.php">Retour</a></div>
    
</div>
    
    
    </div>


</div>





<?php include('./footer_admin.php')?>