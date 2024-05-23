<?php include "components/header.php"; 

if(!$_SESSION['user']){
    header("Location: signin.php");
}else{
    $user = $_SESSION['user'];
}
if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors']; 
    unset($_SESSION['errors']);
}
if(isset($_GET['message'])){
    $message = $_GET['message'];
}

?>

<section class="section-account-modify ">    
    <div class="account-modify">
        <h2>Modifier mes informations</h2>
        <a href="account_modify_password.php" class="btn account-btn">Modifier mon mot de passe</a>

        <form action="/blog_aux_quatre_coins/controllers/userController.php" method="post" class="form-account-modify" enctype="multipart/form-data">
            <div class="input-account-container">
               <!-- id communique avec for du label ce qui le rend fonctionnel -->
                <input type="file" id="profile_img" name="profile_img">
                <label for="profile_img" class="btn btn-file">Choisissez une image</label>
                <span class="error"><?php echo $errors['img'] ?? ""; ?></span>
                <span><?php echo $message ?? ""; ?></span>

            </div>
            <div class="input-form-container">
                <input type="text" name="last_name" value="<?php echo $user['lastname']?>" autofocus>
                <label>Nom</label>
            </div>
            <div class="input-form-container">
                <input type="text" name="first_name" value="<?php echo $user['firstname']?>">
                <label>Prénom</label>
            </div>
            <div class="input-form-container">
                <input type="email" name="email" value="<?php echo $user['email']?>">
                <label>email</label>
            </div>
            <input type="submit" name="submit_modify_userdata" value="Modifier" class="btn submit-account">
        </form>
    </div>
</section>
<?php include "components/footer.php"; ?>

