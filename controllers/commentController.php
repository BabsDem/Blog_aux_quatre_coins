<?php
session_start();
include "../models/commentModel.php";
include "../models/userModel.php";


if(isset($_POST["submit_create_comment"])){
    if(!empty($_POST["user_comment"])){
        $comment = htmlspecialchars(trim($_POST["user_comment"])); 
        $articleId = htmlspecialchars(trim($_POST["id_article"])); 
        $userId = $_SESSION['user']["id_user"];
        try{
           createComment($userId, $articleId, $comment); 
           $_SESSION["comments"] = getAllComment($articleId);
        }catch(\Exception $e){
            $_SESSION['errors']= $e->getMessage();
        }
        header("Location: ../views/article.php?page=display_article"); 
        exit;
    }else{
        $message = "Merci de remplir le champ"; 
        header("Location: ../views/article.php?page=display_article&message=". $message);
        exit;
    }
}
if(isset($_GET['page']) && $_GET['page'] === "display_article" && isset($_GET['id'])){
    $_SESSION["comments"] = getAllComment($_GET['id']);
    header("Location: ../views/article.php?page=display_article"); 
    exit;
}