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

    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>

  <header>
    <nav>
      <ul class="menu">
        <div>
          <a href="home.php">
            <img src="../assets/img/logo.png" class="logo-header" alt="">
          </a>
        </div>
        <div class="menu-items">  
        <li><a href="home.php">Accueil</a></li>
        <li><a href="../controllers/articleController.php?page=blog">Blog</a></li>   

        <?php if(isset($user)):?>
          <?php if($_SESSION['user']['role'] == 0) : ?>
          <li><a href="account.php">Mon compte</a></li>
          <?php else : ?>
          <li><a href="../controllers/userController.php?page=admin_users">Tableau de bord</a></li>

            <?php endif ?>
          <li><a href="components/logout.php" >Déconnexion</a></li>
          <?php else : ?>
            <li><a href="signup.php">Inscription</a></li>
            <li><a href="signin.php">Connexion</a></li>
          <?php endif ?>
          <div class="icon-menu">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24" fill="#448c8d"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
          </div>
        </div>
      </ul>
    </nav>
  </header>
