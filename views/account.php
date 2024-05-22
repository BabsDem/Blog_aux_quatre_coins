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
        <span><?php echo $message ?? "" ?></span>
        <div class="img-account-container">
            <img src="<?php echo $user['img']; ?>" alt="">
        </div>
        <div>
            <p>Nom :</p>
            <p><?php echo $user["lastname"] ?></p>
        </div>
        <div>
            <p>Prénom :</p>
            <p><?php echo $user["firstname"] ?></p>
        </div>
        <div>
            <p>Email :</p>
            <p><?php echo $user["email"] ?></p>
        </div>  
        <div>
            <p>Token :</p>
            <p><?php echo $user["token"] ?></p>
        </div>  

        <div>
            <a href="account_modify.php" class="btn" >Modifier mes informations</a>
        </div>
    </div>
</section>

<?php include "components/footer.php"; ?>

