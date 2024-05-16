<?php
    include "db.php"; 
    
    function createUser(){
        global $bdd;
        $req = $bdd->prepare("CREATE TABLE IF NOT EXISTS users (id_user int AUTO_INCREMENT PRIMARY KEY,
        lastname VARCHAR(50) NOT NULL, 
        firstname VARCHAR(50) NOT NULL, 
        email VARCHAR(100) NOT NULL UNIQUE, 
        password VARCHAR(255) NOT NULL, 
        img VARCHAR(255) NOT NULL, 
        token VARCHAR(191) UNIQUE,
        role TINYINT NOT NULL DEFAULT 0 )
        ");
        $req->execute();
    }
    
    createUser();
    //UNIQ ID php generer token
    
    function createArticle(){
        global $bdd;
        $req = $bdd->prepare("CREATE TABLE IF NOT EXISTS articles 
        (
        id_article int AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL, 
        place VARCHAR(50) NOT NULL, 
        subtitle VARCHAR(100) NOT NULL, 
        description TEXT NOT NULL, 
        category VARCHAR(50)
        )
        ");
        $req->execute();
    }
    createArticle(); 
    
    function createComments(){
        global $bdd;
        $req = $bdd->prepare("CREATE TABLE IF NOT EXISTS comments 
        (
            id_comment int AUTO_INCREMENT PRIMARY KEY,
        description TEXT NOT NULL, 
        date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
        id_user INT NOT NULL,
        id_article INT NOT NULL, 
        FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (id_article) REFERENCES articles(id_article) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ");
        $req->execute();
    }
    createComments();
    
    function createImages() {
        global $bdd;
        $req = $bdd->prepare("CREATE TABLE IF NOT EXISTS images 
        (
        id_img int AUTO_INCREMENT PRIMARY KEY,
        img VARCHAR(255)
        )
        ");
        $req->execute();
    }
    createImages();
    
    function createRelationArticleAndImage() {
        global $bdd;
        $req = $bdd->prepare("CREATE TABLE IF NOT EXISTS  relation_articles_images
        (
        id_relation_article_img int AUTO_INCREMENT PRIMARY KEY,
        id_article INT NOT NULL, 
        FOREIGN KEY (id_article) REFERENCES articles(id_article) ON DELETE CASCADE ON UPDATE CASCADE,
        id_img INT NOT NULL, 
        FOREIGN KEY (id_img) REFERENCES images(id_img) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ");
        $req->execute();
    }
    
    createRelationArticleAndImage();