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
           // Session permettant d'afficher tous les commentaires sur un article spécifique (ajout first/last name via INNERJOIN)
           $_SESSION["user_comments"] = getAllUserComment($articleId);
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
if(isset($_POST["submit_admin_update_comment"])){
    if(!empty($_POST['description'])){
        $description = htmlspecialchars(trim($_POST['description'])); 
        $commentId = htmlspecialchars(trim($_POST['comment_id']));
        try{
            updateComment($commentId, $description);
            // Session permettant l'affichage de tous les commentaires dans l'admin (first/last name)
            $_SESSION['comments'] = getAllComment(); 
            
        }catch(\Exception $e){
            $_SESSION['errors']= $e->getMessage();
            header("Location: ../views/admin_update_comment.php?comment_id=$commentId"); 
            exit;
        }
        header("Location: ../views/admin_comments.php?page=admin_comments");
        exit;
    }
}
// Affichage d'un article spécifique (contenant commentaire - images - article)
if(isset($_GET['page']) && $_GET['page'] === "display_article" || isset($_GET['id'])){
    $_SESSION["user_comments"] = getAllUserComment($_GET['id']);
    $_SESSION['article'] = getArticle($_GET['id']);
    $_SESSION['images_article'] = getImg($_GET['id']);
    header("Location: ../views/article.php?page=display_article"); 
    exit;
}
// Affichage de tous les commentaires dans l'espace admin 
if(isset($_GET['page']) && $_GET['page'] === "admin_comments" || isset($_GET["id_comment"])){
    $_SESSION["comments"] = getAllComment();
    header("Location: ../views/admin_comments.php?page=admin_comments");
    exit;
}
// Suppression d'un commentaire pour l'admin
if(isset($_GET["comment_id"])){
    deleteComment($_GET["comment_id"]);
    $_SESSION['comments'] = getAllComment(); 
    header("Location: ../views/admin_comments.php?page=admin_comments");
    exit;
}