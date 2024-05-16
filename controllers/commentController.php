<?php
session_start();
include "../models/commentModel.php";

if(isset($_POST["submit_comment"])){
    if(!empty($_POST["user_comment"])){
        $comment = htmlspecialchars(trim($_POST["user_comment"])); 
        $userId = htmlspecialchars(trim($_POST["id_user"])); 
        $articleId = htmlspecialchars(trim($_POST["id_article"])); 
        // $user= $_SESSION['user']; 
        // var_dump($user);exit;   
        try{
           createComment($userId, $articleId, $comment); 
           $_SESSION["com"] = getAllComment($articleId);
        //    var_dump(getAllComment($articleId));exit;
        //    var_dump($_SESSION['comments']);      
        // session_write_close();
        }catch(\Exception $e){
            $_SESSION['errors']= $e->getMessage();
            // header("Location: ../views/article.php?page=display_article"); 
            // exit;
        }
        header("Location: ../views/article.php?page=display_article"); 
        exit;
    }else{
        $message = "Merci de remplir le champ"; 
        header("Location: ../views/article.php?page=display_article&message=". $message);
        exit;
    }
}