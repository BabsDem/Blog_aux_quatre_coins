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

<main class="reset_password">
      <div>
        <form action="/blog_aux_quatre_coins/controllers/userController.php" method="post" class="form-reset-password">      
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
         
          <input type="submit" name="submit_reset_password" value="S'inscrire" class="submit" />
        
        </form>
      </div>
    </main>