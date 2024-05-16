<?php 
    include "components/header.php"; 

    if(isset($_GET["page"]) && $_GET['page'] == "blog"){
        $articles = $_SESSION['articles']; 
    }

?>

<div class="banner">
    <img src="../assets/img/hero-banner-3.jpg" alt="">
</div>

<nav class="blog-menu-container">
    <p>Filtrée par :</p>
    <ul class="blog-menu">
        <li><button>Hôtel</button></li>
        <li><button>Villa</button></li>
        <li><button>Tout voir</button></li>
    </ul>
</nav>

<div class="blog-container">
    <article class="blog-card">
        <div class="img-blog-container">
            <img src="../assets/img/hotel-das-klima-resort-1.png" alt="">
        </div>
        <div>
            <div class="card-header">
                <h3>Das Klima Resort</h3>
                <h4>Espagne</h4>
            </div>
            <div class="card-content">
                <p> Lorsque l’on évoque le paradis, notre imagination s’envole vers des plages de sable fin, des eaux cristallines et des couchers de soleil enflammés. La villa paradisiaque incarne ce rêve éveillé, ce lieu où le temps se suspend et où chaque instant devient une poésie ...</p>
                <div class="btn-container">
                    <a href="article.php?"  class="btn">Découvrir</a>
                </div>
            </div>
        </div>
    </article>
    <?php foreach($articles as $article): ?>
    <article class="blog-card">
        <div class="img-blog-container">
            <img src="../assets/img/hotel-das-klima-resort-1.png" alt="">
        </div>
        <div>
            <div class="card-header">
                <h3><?php echo $article['title']; ?></h3>
                <h4><?php echo $article['place']; ?></h4>
            </div>
            <div class="card-content">
                <p> <?php echo $article['description']; ?></p>
                <div class="btn-container">
                    <a href="../controllers/articleController.php?page=display_article&id=<?php echo $article["id_article"]; ?>" class="btn">Découvrir</a>
                </div>
            </div>
        </div>
    </article>
    <?php endforeach ?>
</div>