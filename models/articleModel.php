<?php 

    require "db.php"; 

    function createArticle($title, $subtitle, $place, $description, $category){
        global $bdd; 
        $req = $bdd->prepare('INSERT INTO articles (title, subtitle, place, description, category) VALUES (:title, :subtitle, :place, :description, :category)'); 
        $req->bindParam(":title", $title);
        $req->bindParam(":subtitle", $subtitle);
        $req->bindParam(":place", $place);
        $req->bindParam(":description", $description);
        $req->bindParam(":category", $category);
        $req->execute();        
        $articleId = $bdd->lastInsertId(); 
        return $articleId;  
    }

    function createArticleImg($img, $articleId){
        global $bdd; 
            $req2 = $bdd->prepare('INSERT INTO images (img) VALUES (:img)');
            $req2->bindParam(":img", $img);
            $req2->execute();
            $imgId = $bdd->lastInsertId(); 
    
            $req3 = $bdd->prepare('INSERT INTO relation_articles_images (id_img, id_article) VALUES (:id_img, :id_article)');
            $req3->bindParam(":id_article", $articleId);
            $req3->bindParam(":id_img", $imgId);
            $req3->execute();
    }

    function getArticle($id){
        global $bdd;
        $req = $bdd->prepare("SELECT articles.*, images.img 
        FROM articles 
        INNER JOIN relation_articles_images as r ON articles.id_article = r.id_article 
        INNER JOIN images ON r.id_img = images.id_img
        WHERE articles.id_article = :id"); 
        $req->bindParam(":id", $id); 
        $req->execute(); 
        $article = $req->fetch();
        return $article;
    }
    // function getArticle($id){
    //     global $bdd;
    //     $req = $bdd->prepare("SELECT * FROM articles 
    //     WHERE id_article = :id"); 
    //     $req->bindParam(":id", $id); 
    //     $req->execute(); 
    //     $article = $req->fetch();
    //     return $article;
    // }
 
    function updateArticle($id, $title, $subtitle, $place, $description, $category){
        global $bdd; 
        $req = $bdd->prepare("UPDATE articles SET title= :title, subtitle= :subtitle, place= :place, description= :description, category= :category WHERE id_article= :id");
        $req->bindParam(":title",$title);
        $req->bindParam(":subtitle",$subtitle);
        $req->bindParam(":place",$place);
        $req->bindParam(":description",$description);
        $req->bindParam(":category",$category);
        $req->bindParam(":id",$id);
        $req->execute();
    }

    function updateImageArticle($articleId, $img){
        global $bdd; 
        $req = $bdd->prepare("
        UPDATE images 
        INNER JOIN relation_articles_images 
        ON images.id_img = relation_articles_images.id_img 
        SET images.img= :img 
        WHERE relation_articles_images.id_article = :articleId");
        $req->bindParam(":img",$img); 
        $req->bindParam(":articleId",$articleId); 
        $req->execute();
    }

    // function updateImageArticle($id_article, $img, $index){
    //     global $bdd; 
    
    //     // Récupérer l'id_img correspondant à l'id_article et à l'index de l'image
    //     $req1 = $bdd->prepare("
    //     SELECT id_img 
    //     FROM relation_articles_images 
    //     WHERE id_article = :id_article 
    //     ORDER BY id_relation 
    //     LIMIT 1 OFFSET :index");
    //     $req1->bindParam(":id_article", $id_article); 
    //     $req1->bindParam(":index", $index, PDO::PARAM_INT); 
    //     $req1->execute();
    //     $id_img = $req1->fetchColumn();
    
    //     // Mettre à jour l'image dans la table images
    //     $req2 = $bdd->prepare("
    //     UPDATE images 
    //     SET img = :img 
    //     WHERE id_img = :id_img");
    //     $req2->bindParam(":img", $img); 
    //     $req2->bindParam(":id_img", $id_img); 
    //     $req2->execute();
    // }

    function deleteArticle($id){
        global $bdd; 
        $req = $bdd->prepare("
        DELETE images 
        FROM images 
        INNER JOIN relation_articles_images 
        ON images.id_img = relation_articles_images.id_img 
        WHERE relation_articles_images.id_article = :id"); 
        $req->bindParam(":id", $id); 
        $req->execute(); 
        $req2 = $bdd->prepare("DELETE FROM articles WHERE id_article= :id"); 
        $req2->bindParam(":id", $id); 
        $req2->execute(); 
    }

    // Ajouter colonne img_presentation dans articles 
    function getAllArticle(){
        global $bdd;
        // $req = $bdd->prepare('SELECT articles.*, images.img  FROM articles 
        //     INNER JOIN relation_articles_images as r ON articles.id_article = r.id_article
        //     INNER JOIN images ON r.id_img = images.id_img
        //     WHERE articles.id_article = r.id_article
        // ');
        $req= $bdd->prepare('SELECT * FROM articles');
        $req->execute(); 
        $articles = $req->fetchAll(PDO::FETCH_ASSOC); 
        return $articles;
    }

    function getAllImg(){
        global $bdd;
        $req= $bdd->prepare('SELECT images.img, r.id_article FROM images 
        INNER JOIN relation_articles_images as r ON r.id_img = images.id_img
        INNER JOIN articles ON r.id_article = articles.id_article');
        $req->execute(); 
        $images = $req->fetchAll(PDO::FETCH_ASSOC); 
        return $images;

    }

    function getAllType($category){
        global $bdd; 
        // $req = $bdd->prepare("SELECT articles.*, images.img FROM articles 
        // INNER JOIN relation_articles_images 
        // INNER JOIN images ON relation_articles_images.id_img = images.id_img       
        //  WHERE category= :category");
        $req= $bdd->prepare('SELECT * FROM articles WHERE category= :category');
        $req->bindParam(":category", $category); 
        $req->execute(); 
        $categoryArticle = $req->fetchAll(); 
        // var_dump($categoryArticle);exit;
        return $categoryArticle;
    }