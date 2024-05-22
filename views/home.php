<?php 
include "components/header.php"; 
include "../models/articleModel.php"; 

if(isset($_GET['page']) && $_GET['page'] === "home"){
    $villas = $_SESSION['articles_villa']; 
    $hotels = $_SESSION['articles_hotel'];
}else{
    $villas = getAllType('villa');
    $hotels = getAllType('hotel');

}

if(isset($_SESSION["images"])){
    $images = $_SESSION["images"];
}else{
    $images = getAllImg(); 
}




?>
<section class="section_home">
    <div class="banner">
        <img src="../assets/img/banner_beach.png" alt="Plage sable fin">
    </div>

    <div class="intro">
        <h1>Aux Quatre Coins du Monde, <br> Mes Récits de Voyage</h1>
        <h2>Explorer, Découvrir, partager</h2>
        <p>En tant que passionné d’exploration, j’ai parcouru des contrées lointaines, goûté à des saveurs exotiques et rencontré des âmes inspirantes. Ce blog est mon carnet de bord, mon refuge pour raconter les paysages époustouflants, les rencontres inoubliables et les moments de pure magie que j’ai vécus.
         </p>
        <p>
        Que vous soyez un voyageur chevronné ou simplement curieux, je vous invite à embarquer avec moi pour des récits authentiques, des conseils pratiques et des anecdotes captivantes. Ensemble, nous explorerons les coins les plus reculés de notre belle planète, et qui sait, peut-être trouverons nous l’inspiration pour nos propres aventures.        
        </p>
        <p>
        Préparez vos bagages, ajustez vos ceintures, et partons à la découverte des merveilles qui nous attendent !
        </p>
    </div>       
</section>

<section class="section_home">
    <h2>Les dernières perles cachées pour  <br><span>des vacances inoubliables</span></h2>
    <div class="gallery-container">
    <div class="gallery">
        <?php for($i=0; $i < 2; $i++){ ?>
        <a href="../controllers/commentController.php?id=<?php echo $hotels[$i]['id_article'];?>&page=display_article">     
            <article>
            <?php foreach($images as $image):
            $imageIndex = array_search($hotels[$i]['id_article'], array_column($images, 'id_article'));?>
                <img src="<?php echo $images[$imageIndex]['img']?>" alt=""> 
            <?php break; endforeach ?>
                <div class="card-header">
                    <h3><?php echo $hotels[$i]["title"] ;?></h3>
                    <h4><?php echo $hotels[$i]["place"] ;?></h4>
                </div>
                <p><?php echo $hotels[$i]["description"] ;?></p>
            </article>
        </a>
        <?php }?>
    </div>

    <div class="gallery">
        <?php for($i=0; $i < 2; $i++): ?>
        <a href="../controllers/commentController.php?id=<?php echo $hotels[$i]['id_article'];?>&page=display_article">     
            <article>
            <?php foreach($images as $image):
            $imageIndex = array_search($villas[$i]['id_article'], array_column($images, 'id_article'));?>
                <img src="<?php echo $images[$imageIndex]['img']?>" alt=""> 
            <?php break; endforeach ?>
                <div class="card-header">
                    <h3><?php echo $villas[$i]["title"] ;?></h3>
                    <h4><?php echo $villas[$i]["place"] ;?></h4>
                </div>
                <p><?php echo $villas[$i]["description"] ;?></p>
            </article>
        </a>
        <?php endfor ?>
    </div>

    <div class="btn-container">
        <div class="btn btn-discover">
            <a href="../controllers/articleController.php?page=blog">       
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white" width="16" height="16"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg> 
                <p class="btn-content">Tout voir</p>  
            </a>
        </div>
    </div>
    </div>   
</section>

<section class="section_home">
    <div class="description-container">
        <div>
            <img src="../assets/img/banner_pool.png" alt="Vue d'une piscine avec transate">
        </div>
        <div class="description-content">
            <p>
            Voyager offre une évasion précieuse de la routine quotidienne. Au bord d’une piscine, un verre de Chardonnay à la main, on se ressource, on se détend. Ces moments privilégiés permettent de se reconnecter à soi-même, d’apprécier la beauté du monde et de savourer la douceur de vivre.
            </p>
        </div>
    </div>
</section>

<section class="section_home">
    <h2>Découvertes Hôtelières, <br> <span>Les Nouveautés à ne pas manquer</span></h2>
    <div class="gallery-container">
        <div class="container-card-hotel">
            <?php for($i=0; $i < 3; $i++):?>
            <a href="../controllers/commentController.php?id=<?php echo $hotels[$i]['id_article'];?>&page=display_article"> 
                <article class="card-hotel">
                <?php foreach($images as $image):
                $imageIndex = array_search($hotels[$i]['id_article'], array_column($images, 'id_article'));?>
                    <img src="<?php echo $images[$imageIndex]['img']?>" alt=""> 
                <?php break; endforeach ?>
                    <div class="card-header">
                        <h3><?php echo $hotels[$i]["title"] ;?></h3>
                        <h4><?php echo $hotels[$i]["place"] ;?></h4>
                    </div>
                    <p><?php echo $hotels[$i]["description"] ;?></p>
                </article>
            </a>
            <?php endfor ?>
        </div>
        <div class="btn-container">
        <div class="btn">
            <a href="../controllers/articleController.php?page=blog_hotel" >       
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white" width="16" height="16"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg> 
                <p class="btn-content">Tout voir</p>  
            </a>
        </div>
    </div>
    </div>
</section>

<section class="section_home">
    <div class="voyage">
        <div>
            <p>
            En voyage, nous sommes souvent émerveillés par la beauté des paysages qui s’offrent à nous. Des montagnes majestueuses aux plages de sable fin, en passant par les forêts luxuriantes et les déserts arides, chaque paysage a sa propre histoire à raconter. 
            </p>
            <p>Ces paysages sont une source d’inspiration et d’émerveillement. Ils nous rappellent la beauté de notre planète et l’importance de la préserver. Alors, lors de votre prochain voyage, prenez le temps d’admirer le paysage, de respirer l’air frais et de vous imprégner de la beauté qui vous entoure. </p>
        </div>
        <div>
            <img src="../assets/img/hero-banner-4.jpg" alt="">
            <img src="../assets/img/hero-banner-6.jpg" alt="">
        </div>
    </div>
</section>

<section class="section_home">
    <h2>Villas de Rêve,<br> <span>les dernières pépites dévoilées</span></h2>
    <div class="gallery-container">
        <div class="container-card-villa">   
            <?php for($i=0; $i < 3; $i++): ?>
            <a href="../controllers/commentController.php?id=<?php echo $villas[$i]['id_article'];?>&page=display_article"> 
                <article class="card-villa">
                <?php foreach($images as $image):
                $imageIndex = array_search($villas[$i]['id_article'], array_column($images, 'id_article'));?>
                    <img src="<?php echo $images[$imageIndex]['img']?>" alt=""> 
                <?php break; endforeach ?>
                    <div class="card-header">
                        <h3><?php echo $villas[$i]["title"] ;?></h3>
                        <h4><?php echo $villas[$i]["place"] ;?></h4>
                    </div>
                    <p><?php echo $villas[$i]["description"] ;?></p>
                </article>
            </a>
            <?php endfor ?>
        </div>
        <div class="btn-container">
        <div class="btn">
            <a href="../controllers/articleController.php?page=blog_villa" >       
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white" width="16" height="16"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg> 
                <p class="btn-content">Tout voir</p>  
            </a>
        </div>
    </div>
    </div>
</section>


<?php include "components/footer.php"; ?>