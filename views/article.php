<?php 
    include "components/header.php"; 

    if(isset($_GET["page"]) && $_GET['page'] == "display_article"){
        $article = $_SESSION['article']; 
    }
    if(isset($_GET['message'])){
        $message = $_GET["message"];
    }    
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    if(isset($_SESSION["user_comments"])){
        $comments = $_SESSION["user_comments"]; 
    }
?>
<div class="banner">
    <img src="../assets/img/hotel-das-klima-resort-1.png" alt="">
</div>

<main>
    <section class="section-article-container">   
        <h1>Hôtel Das Klima Resort</h1>
        <span>Espagne </span>
        <h2>Découvertes et aventures inoubliables</h2>
        <p>Lorsque l’on évoque le paradis, notre imagination s’envole vers des plages de sable fin, des eaux cristallines et des couchers de soleil enflammés. La villa paradisiaque incarne ce rêve éveillé, ce lieu où le temps se suspend et où chaque instant devient une poésie.</p>
        <p>Imaginez-vous, niché au cœur d’une végétation luxuriante, bercé par le chant des oiseaux tropicaux. La villa paradisiaque est un écrin de sérénité, un refuge où les soucis s’évaporent et où l’âme se ressource. Les murs blancs se fondent dans le bleu du ciel, les palmiers dansent au gré du vent, et la piscine scintille comme un joyau.
        </p>
        <p>À l’intérieur, la villa dévoile ses secrets. Les baies vitrées laissent entrer la lumière, les meubles en bois exotique racontent des histoires d’ailleurs, et les chambres sont des nids douillets où les rêves prennent vie. Le salon s’ouvre sur une terrasse en bois, où les repas se prolongent sous les étoiles. Et que dire du jacuzzi, niché dans un coin secret, où l’on se laisse emporter par la douceur de l’eau ?
        </p>
        <p>Chaque matin, vous vous réveillez avec le chant des vagues en toile de fond. Vous dégustez un petit-déjeuner tropical, les pieds dans le sable. Puis, vous partez à la découverte des alentours : plongée dans les récifs coralliens, balade en kayak, sieste sous un cocotier. Les soirées sont des tableaux vivants : dîner aux chandelles, musique douce, et les étoiles qui veillent sur votre bonheur.
        </p>
        <p>La villa paradisiaque, c’est bien plus qu’un lieu de villégiature. C’est un voyage intérieur, une invitation à se reconnecter à l’essentiel. On y apprend à savourer chaque instant, à écouter le murmure du vent, à contempler l’horizon. On y découvre la simplicité du bonheur, la magie des rencontres, et la beauté du monde.
        </p>
        <p>Alors, que vous soyez en quête d’une escapade romantique, d’un séjour en famille ou d’une retraite solitaire, laissez vous emporter par la douceur de la villa paradisiaque. Car ici, le paradis n’est pas un mythe, mais une réalité à portée de main.
        Que cette villa imaginaire vous transporte vers des horizons lointains et des émotions infinies.</p>
    </section>

    <section class="section-carroussel-container">
        <div class="wrapper-carroussel">
                <ul class="carroussel">
                    <li>
                        <img src="../assets/img/hotel-das-klima-resort-1.png" alt="">       
                    </li>
                </ul>
                <button class="btn-left">
                    <img src="../assets/svg/chevron-left.svg" alt="">
                </button>
                <button class="btn-right">
                    <img src="../assets/svg/chevron-right.svg" alt="">
                </button>
        </div>
    </section>

    <section class="section-comment-container">
        <div>        
            <?php if(isset($user)): ?>
            <form action="/blog_aux_quatre_coins/controllers/commentController.php" method="post">
            <span><?php echo $message ?? ""; ?></span> 
            <input type="hidden" name="id_article" value="<?php echo $article["id_article"];?>">
                <textarea name="user_comment" class="textarea-comment"></textarea>   
                <label class="label-textarea">Laissez un commentaire !</label>
                <input type="submit" name="submit_create_comment" value="Poster" class="btn">
            </form>
            <?php else : ?>
                <p>Si vous souhaitez laisser un commentaire, <a class="btn" href="signin.php">Inscrivez vous</a> ou <a class="btn" href="signup.php">Connectez vous </a></p>
            <?php endif ?>
        </div>
    </section>

    <section class="display__user-comment-container">
        <div class="user-comment-card">
            <div class="img-user-container">
                <img src="../assets/img/banner_pool.png" alt="">
            </div>
            <div class="user-comment-container">
                <p>Marie Dupont</p>
                <p>Cet article m’a vraiment donné envie de voyager ! Les descriptions des lieux sont si vivantes, on a l’impression d’y être. Merci pour ce partage !</p>
                <p>Posté le samedi 23 mars 2024 à 14h08</p>
            </div>
        </div>

        <div class="user-comment-card">
            <div class="img-user-container">
                <img src="../assets/img/banner_pool.png" alt="">
            </div>
            <div class="user-comment-container">
            <?php foreach($comments as $comment) : ?>
                <p><?php echo $comment['lastname'] . " ". $comment['firstname'];?></p>
                <p><?php echo $comment['description'];?></p>
                <p><?php echo $comment['date_creation'];?></p>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</main>

<?php include "components/footer.php"; ?>

