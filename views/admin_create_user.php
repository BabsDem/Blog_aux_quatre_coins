<?php include "components/header.php";?>

<section class="section_admin_create_user">
    <div class="admin_menu">
        <?php include "components/menu_admin.php";?>
    </div>

    <div class="admin_create_user">

        <form action="/blog/controllers/userController.php" method="post" class="form_admin_create_user">   
          <h2>Créer un utilisateur</h2>
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
          <input type="submit" name="submit_admin_create_user" value="Créer" class="btn submit-account" />         
        </form>
        </div>
</section>

<?php include "components/footer.php"; ?>