<?php 
session_start(); 
if(isset($_SESSION['user'])){
 $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aux 4 coins</title>
    <script src="../assets/js/textarea__article.js" defer></script>
    <script src="../assets/js/img__on_change.js" defer></script>
    <script src="../assets/js/mobile_menu.js" defer></script>
    <script src="../assets/js/time_out.js" defer></script>

    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>

  <header>
    <nav>
      <ul class="menu">
        <div>
          <a href="../controllers/articleController.php?page=home">
            <img src="../assets/img/logo.png" class="logo-header" alt="">
          </a>
        </div>
        <div class="menu-items">  
          <li><a href="../controllers/articleController.php?page=home">Accueil</a></li>
          <li><a href="../controllers/articleController.php?page=blog">Blog</a></li> 
        <?php if(isset($user)):?>
          <?php if($_SESSION['user']['role'] == 0) : ?>
          <li><a href="account.php">Mon compte</a></li>
          <?php else : ?>
          <li><a href="../controllers/userController.php?page=admin_users">Tableau de bord</a></li>
            <?php endif ?>
          <li class="btn-menu" ><a href="components/logout.php" >Déconnexion</a></li>
          <?php else : ?>
            <li><a href="signup.php">Inscription</a></li>
            <li><a href="signin.php">Connexion</a></li>
          <?php endif ?>
        </ul>
        <div class="icons-menu">
          <svg class="bars-menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="#448c8d"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
          <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20" fill="#448c8d"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
        </div>
      </div>
    </nav>
  </header>
