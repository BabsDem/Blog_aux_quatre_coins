<?php
session_start();
include "../models/articleModel.php";
include "../models/functions/validateImg.php";

if(isset($_POST['submit_admin_create_article'])){
    if(!empty($_POST["title"]) && !empty($_POST["subtitle"]) && !empty($_POST["place"]) && !empty($_POST["description"]) && !empty($_POST["categories"])){
        $title = htmlspecialchars(trim($_POST['title']));
        $subtitle = htmlspecialchars(trim($_POST['subtitle']));
        $place = htmlspecialchars(trim($_POST['place']));
        $description = htmlspecialchars(trim($_POST['description']));
        $category = htmlspecialchars(trim($_POST['categories']));
        $files = $_FILES['images']; 

        try{
        $articleId = createArticle($title, $subtitle, $place, $description, $category);       
        $uploadedFiles = [];
        for($i= 0; $i < count($files['name']); $i++){
            $file = [
            'name' => $files['name'][$i],
            'type' => $files['type'][$i],
            'tmp_name' => $files['tmp_name'][$i],
            'error' => $files['error'][$i],
            'size' => $files['size'][$i]
            ];
            $filename = validateImg($file, $articleId, "article", $i); 
            $uploadedFiles[] = $filename;
            $articleImg = createArticleImg($filename, $articleId);
        }
        $_SESSION['articles'] = getAllArticle();
        header("Location: ../views/admin_articles.php?page=admin_articles"); 
        exit;
        }catch(\Exception $e){
            $_SESSION['errors']= $e->getMessage();
            header("Location: ../views/admin_create_article.php"); 
            exit;
        }
    }
}
//READ ARTICLE
if(isset($_GET['page']) && $_GET['page'] === "admin_articles"){
    $_SESSION['articles'] = getAllArticle();
    header("Location: ../views/admin_articles.php?page=admin_articles"); 
    exit;
}

//UPDATE ARTICLE
if(isset($_POST['submit_admin_update_article'])){
    if(!empty($_POST["title"]) && !empty($_POST["subtitle"]) && !empty($_POST["place"]) && !empty($_POST["description"]) && !empty($_POST["categories"])){
        var_dump($_POST); exit;
    }
}

// DELETE ARTICLE
if(isset($_GET['article_id'])){
    $id = $_GET['article_id'];
    deleteArticle($id); 
    $_SESSION['articles'] = getAllArticle();
    header("Location: ../views/admin_articles.php?page=admin_articles"); 
    exit;
}
