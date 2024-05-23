<?php include "components/header.php"; ?>

<?php
  if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors']; 
    var_dump($errors);
    unset($_SESSION['errors']);            

  }
  if(isset($_SESSION['data'])){
    $data = $_SESSION['data'];    

  }
?>

<main class="reset_password">
      <div>
        <form action="/controllers/userController.php" method="post" class="form-reset-password">      
          <h1>Réinitialisation du mot de passe</h1>

          <div class="input-form-container">
            <input type="email" required id="email"  name="email" autocomplete="off"  value="<?php echo $data['email'] ?? ""?>"/>
            <label for="email">Email</label>
            <span class="inscription-error"><?php echo $errors['email'] ?? "";?> </span>
          </div>

          <div class="input-form-container">
            <input type="text" required id="token"  name="token" autocomplete="off"/>
            <label for="token">Votre token</label>
            <span class="inscription-error"><?php echo $errors['token'] ?? "";?> </span>
          </div>
          <input type="submit" name="submit_reset_password" value="Réinitialiser" class="submit_reset_password" />        
        </form>
      </div>
    </main>