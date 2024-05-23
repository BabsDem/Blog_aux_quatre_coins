<?php 
  include "components/header.php";
    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1 ){
      session_destroy();
      header("Location: signin.php");
  } 
    if(isset($_GET['user_id'])){
      $userId = $_GET['user_id'];
      var_dump($userId);
    }
    if(isset($_SESSION['errors'])){
      $errors = $_SESSION['errors']; 
      var_dump($errors);
      unset($_SESSION['errors']);   
    }
?>

<section class="section_admin_update_user">
    <div class="admin_menu">
        <?php include "components/menu_admin.php";?>
    </div>

    <div class="admin_update_user">
        <form action="/controllers/userController.php" method="post" class="form_admin_update_user">   
          <h2>Modifier les données de l'utilisateur</h2>
          <input type="hidden" name="update_user_id" value="<?php echo $userId; ?>">
          <div class="name-container">
            <div class="input-form-container">
              <input
                type="text"
                required
                id="last_name"
                name="last_name"
                autocomplete="off"
                autofocus
              />
              <label for="lastName">Nom</label>
              <span class="inscription-error"><?php echo $errors['lastname'] ?? "";?> </span>
            </div>
            <div class="input-form-container">
              <input type="text" required id="firstName"  name="first_name" autocomplete="off" />
              <label for="firstName">Prénom</label>
              <span class="inscription-error"><?php echo $errors['firstname'] ?? "";?> </span>
            </div>
          </div>
          <div class="input-form-container">
            <input type="email" required id="email"  name="email" autocomplete="off"  value="<?php echo $data['email'] ?? ""?>"/>
            <label for="email">Email</label>
            <span class="inscription-error"><?php echo $errors['email'] ?? "";?> </span>
          </div>
          <div class="input-form-container">
            <input type="password" required id="password"  name="password" autocomplete="off" />
            <label for="password">Mot de passe</label>
            <span class="inscription-error"><?php echo $errors['password'] ?? "";?> </span>
          </div>
          <div class="input-form-container">
            <input
              type="password"
              required
              id="confirm_password"  name="confirm_password"
              autocomplete="off"
            />
            <label for="confirm_password">Confirmer votre mot de passe</label>
            <span class="inscription-error"><?php echo $errors['confirm_password'] ?? "";?> </span>
          </div>
          <div>
          <input type="submit" name="submit_admin_update_user" value="Créer" class="btn submit-account" />         
        </form>
        </div>
</section>

<?php include "components/footer.php"; ?>