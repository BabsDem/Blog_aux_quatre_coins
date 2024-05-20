<?php
require ("db.php");

function checkUserExists($email) {
        global $bdd;
        $req = $bdd->prepare("SELECT email FROM users WHERE email = :email");
        $req->bindParam(":email", $email);
        $req->execute();
        $user = $req->fetch();      
        return $user ? true  : false;
}

// Ajouter l'user à la BDD 
function addUser( $lastname, $firstname, $email, $password){
    global $bdd;
    // Si l'email n'existe pas en BDD on ajoute, l'user en BDD
    if(!checkUserExists($email)){
        $req = $bdd->prepare("INSERT INTO users (lastname, firstname, email, password, img) VALUES (:lastname, :firstname, :email, :password, :img)");
        $req->bindParam(":lastname", $lastname); 
        $req->bindParam(":firstname", $firstname); 
        $req->bindParam(":email", $email); 
        $req->bindParam(":password", $password); 
        $img = "bird.jpeg";
        $pathImg ="../public/profile/" . $img; 
        $req->bindParam(":img", $pathImg); 
        $req->execute();  
    // Sinon on ajoute une exception      
    }else{
        throw new Exception("L'email existe déjà !");
    }
  
}
//Connecter l'user via son email
function login($email){
    global $bdd; 
    $req = $bdd->prepare("SELECT email FROM users WHERE email = :email"); 
    $req->bindParam(":email", $email);  
    $req->execute(); 
    $user = $req->fetch();   
    // Si l'email n'existe pas on lance une nouvelle exception sinon on retourne l'user   
    if(!checkUserExists($email)){
        throw new Exception("L'email n'existe pas ! ");
    }
    return $user;
}

function getUser($email){
    global $bdd; 
    $req = $bdd->prepare("SELECT * FROM users WHERE email = :email"); 
    $req->bindParam(":email", $email);  
    $req->execute(); 
    $user = $req->fetch();         
    return $user;
}

function getUserForUpdate($id){
    global $bdd; 
    $req = $bdd->prepare("SELECT * FROM users WHERE id_user = :id"); 
    $req->bindParam(":id", $id);  
    $req->execute(); 
    $user = $req->fetch();         
    return $user;
}


function getAllUser(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM users"); 
    $req->execute();
    $users =$req->fetchAll();
    return $users;
}

function updateUser($id, $lastname, $firstname, $email, $img){
    global $bdd;
    $req = $bdd->prepare("UPDATE users SET lastname= :lastname, firstname= :firstname, email= :email, img= :img WHERE id_user = :id");
    $req->bindParam(":lastname",$lastname);
    $req->bindParam(":firstname",$firstname);
    $req->bindParam(":email",$email);
    $req->bindParam(":img",$img);
    $req->bindParam(":id",$id);
    $req->execute();
    return getUser($email); 
}

function updateUserPassword($id, $password){
    global $bdd; 
    $req = $bdd->prepare("UPDATE users SET password= :password WHERE id_user= :id"); 
    $req->bindParam(":password",$password); 
    $req->bindParam(":id", $id); 
    $req->execute(); 
}

function deleteUser($id){
    global $bdd;
    $req= $bdd->prepare("DELETE FROM users WHERE id_user= :id"); 
    $req->bindParam(":id", $id); 
    $req->execute(); 
}
