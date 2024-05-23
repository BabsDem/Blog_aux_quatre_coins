<?php include "components/header.php"; 

if(!$_SESSION['user']){
    header("Location: signin.php");
}else{
    $user = $_SESSION['user'];
}
if(isset($_GET['message'])){
    $message = $_GET['message'];
}
?>

<section class="section-account-container">   
    <h1>Mon espace client</h1>
    <div class="account-content">
        <span id="password_message" class="success"><?php echo $message ?? "" ?></span>
        <div class="img-account-container">
            <img src="<?php echo $user['img']; ?>" alt="">
        </div>
        <div class="account-data">
            <p>Nom :</p>
            <p><?php echo $user["lastname"] ?></p>
        </div>
        <div class="account-data">
            <p>Prénom :</p>
            <p><?php echo $user["firstname"] ?></p>
        </div>
        <div>
            <p>Email :</p>
            <p><?php echo $user["email"] ?></p>
        </div>  
        <div class="account_token">
            <p>Token :</p>
            <p><?php echo $user["token"] ?></p>
        </div>  
        <div class="account_btn_container">
            <a href="account_modify.php" class="btn account-modify-btn">Modifier mes informations</a>
            <a href="../controllers/userController.php?page=delete_account&id=<?php echo $user['id_user'];?>" class="btn delete_account">Supprimer mon compte</a>
        </div>
    </div>
</section>

<?php include "components/footer.php"; ?>

