<?php 

    include "db.php"; 

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

    function getAllArticle(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM articles');
        $req->execute(); 
        $articles = $req->fetchAll(); 
        return $articles;
    }

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
        $req = $bdd->prepare("");
    }

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