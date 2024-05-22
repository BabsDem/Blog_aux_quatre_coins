<?php 
    include "components/header.php"; 

    if(isset($_GET["page"]) && $_GET['page'] === "blog" || $_GET['page'] === "blog_villa"|| $_GET['page'] === "blog_hotel"){
        $articles = $_SESSION['articles']; 
        $images = $_SESSION['images'];         
    }

    $articleImages = [];
    foreach ($images as $image) {
        $articleImages[$image['id_article']][] = $image['img'];
    }


?>

<div class="banner">
    <img src="../assets/img/hero-banner-3.jpg" alt="">
</div>

<nav class="blog-menu-container">
    <p>Filtrée par :</p>
    <ul class="blog-menu">
        <li><a href="../controllers/articleController.php?page=blog_hotel">Hôtel</a></li>
        <li><a href="../controllers/articleController.php?page=blog_villa">Villa</a></li>
        <li><a href="../controllers/articleController.php?page=blog">Tout voir</a></li>
    </ul>
</nav>


<div class="blog-container">
<?php foreach($articles as $article): ?>
    <article class="blog-card">
        <div class="img-blog-container">
        <?php if (isset($articleImages[$article['id_article']]) && count($articleImages[$article['id_article']]) > 0):?>
            <img src="<?php echo $articleImages[$article['id_article']][0];?>" alt="">
        <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="card-header">
                <h3><?php echo $article['title']; ?></h3>
                <h4><?php echo $article['place']; ?></h4>
            </div>
            <div class="card-content">
                <p> <?php echo $article['description']; ?></p>
                <div class="btn-container">
                <a href="../controllers/commentController.php?page=display_article&id=<?php echo $article["id_article"]; ?>" class="btn">Découvrir</a>
            </div>
        </div>
    </article>
    <?php endforeach ?>

  
</div>

<?php include "components/footer.php";?>