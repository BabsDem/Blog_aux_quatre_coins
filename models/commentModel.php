<?php
require "db.php";

function createComment($user_id, $article_id, $description){
    global $bdd; 
    $req = $bdd->prepare("INSERT INTO comments (description, id_user, id_article) VALUES (:description, :id_user, :id_article)"); 
    $req->bindParam(":description", $description);
    $req->bindParam(":id_user", $user_id);
    $req->bindParam(":id_article", $article_id);
    $req->execute();
}

function getAllComment($article_id){
    global $bdd; 
    $req = $bdd->prepare("SELECT comments.*, users.lastname, users.firstname FROM comments INNER JOIN users ON comments.id_user = users.id_user WHERE id_article = :id ORDER BY date_creation DESC"); 
    $req->bindParam(":id", $article_id); 
    $req->execute(); 
    $comments = $req->fetchAll(); 
    return $comments;
}