<?php
require ("models/articleModel.php"); 

    $_SESSION['articles'] = getAllArticle(); 
header("Location: ./views/home.php"); 
?>