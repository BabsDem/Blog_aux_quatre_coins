<?php include "components/header.php"; 
// Vérifier que l'ancien mdp correspond 
// Appliquer la fonction validate sur le form et afficher les erreurs s'il y en a 
// Mettre a jour le password
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
        <form action="/blog_aux_quatre_coins/controllers/userController.php" method="post" class="form-account-modify">
            <h2>Modifier mon mot de passe !</h2>
            <div class="input-form-container">
                <input type="password" required id="email" autofocus autocomplete="off" name="old_password"/>
                <label for="password">Ancien mot de passe</label>
                <span class="connexion-error"><?php echo $message ?? ""; ?></span>

            </div>
            <div class="input-form-container">
                <input
                type="password"
                required
                id="password"
                name="new_password"
                autocomplete="off"
                />
                <label for="password">Nouveau mot de passe</label>
                <span class="connexion-error"><?php echo $errors["password"] ?? ""; ?></span>

            </div>
            <div class="input-form-container">
                <input
                type="password"
                required
                id="password"
                name="confirmation_new_password"
                autocomplete="off"
                />
                <label for="password">Confirmation du nouveau mot de passe</label>
                <span class="connexion-error"><?php echo $errors["confirm_password"] ?? ""; ?></span>
            </div>
            <input type="submit" name="submit_account_modify_password" value="Modifier" class="btn submit-account"/>
        </form>
    </div>
</section>

<?php include "components/footer.php"; ?>
