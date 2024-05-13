<?php include "components/header.php"; ?>

<?php
  if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors']; 
    unset($_SESSION['errors']);            

  }
  if(isset($_SESSION['data'])){
    $data = $_SESSION['data'];    

  }
?>

<main class="inscription">
      <div>
        <form action="/blog_aux_quatre_coins/controllers/userController.php" method="post" class="form-inscription">      
          <h1>Inscrivez vous !</h1>
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
          <input type="submit" name="submit_inscription" value="S'inscrire" class="submit" />
          <a href="signin.php" class="link-to-connexion">
            <p>Vous avez déjà un compte ?</p>
          </a>
        </form>
      </div>
    </main>