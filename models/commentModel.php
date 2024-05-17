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

function getAllUserComment($article_id){
    global $bdd; 
    $req = $bdd->prepare("SELECT comments.*, users.lastname, users.firstname FROM comments INNER JOIN users ON comments.id_user = users.id_user WHERE id_article = :id ORDER BY date_creation DESC"); 
    $req->bindParam(":id", $article_id); 
    $req->execute(); 
    $comments = $req->fetchAll(); 
    return $comments;
}


function getAllComment(){
    global $bdd; 
    $req = $bdd->prepare("SELECT * FROM comments"); 
    $req->execute(); 
    $comments = $req->fetchAll(); 
    return $comments;
}

function getComment($id){
    global $bdd; 
    $req = $bdd->prepare("SELECT * FROM comments WHERE id_comment = :id"); 
    $req->bindParam(":id", $id); 
    $req->execute(); 
    $comment = $req->fetch(); 
    return $comment;
}

function updateComment($id, $description){
    global $bdd; 
    $req = $bdd->prepare("UPDATE comments SET description = :description WHERE id_comment = :id"); 
    $req->bindParam(":description", $description);
    $req->bindParam(":id", $id);
    $req->execute();
}

function deleteComment($id){
    global $bdd; 
    $req= $bdd->prepare("DELETE FROM comments WHERE id_comment= :id"); 
    $req->bindParam(":id", $id); 
    $req->execute(); 
}