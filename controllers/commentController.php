<?php
session_start();
include "../models/commentModel.php";
include "../models/userModel.php";
include "../models/articleModel.php";


if(isset($_POST["submit_create_comment"])){
    if(!empty($_POST["user_comment"])){
        $comment = htmlspecialchars(trim($_POST["user_comment"])); 
        $articleId = htmlspecialchars(trim($_POST["id_article"])); 
        $userId = $_SESSION['user']["id_user"];
        try{
           createComment($userId, $articleId, $comment); 
           $_SESSION["comments"] = getAllUserComment($articleId);
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
    $_SESSION["user_comments"] = getAllUserComment($_GET['id']);
    $_SESSION['article'] = getArticle($_GET['id']);
    header("Location: ../views/article.php?page=display_article"); 
    exit;
}

if(isset($_GET['page']) && $_GET['page'] === "admin_comments"){
    $_SESSION["comments"] = getAllComment();
    header("Location: ../views/admin_comments.php?page=admin_comments");
    exit;

}