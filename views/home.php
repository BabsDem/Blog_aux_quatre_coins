<?php 
include "components/header.php"; 
if(isset($_SESSION['articles'])){
    $articles = $_SESSION['articles']; 
}
?>
<section>
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

<section>
    <h2>Les dernières perles cachées pour  <br><span>des vacances inoubliables</span></h2>
    <div class="gallery-container">
    <div class="gallery">
        <a href="article.php">     
        <article class="gallery-card medium">
            <img src="../assets/img/hotel-das-klima-resort-1.png" alt=""> 
                <div class="card-header">
                    <h3>Hôtel Das Klima Resort</h3>
                    <h4>Espagne</h4>
                </div>
                <p>
                    Lorsque l’on évoque le paradis, notre imagination s’envole vers des plages de sable fin, des eaux cristallines et des couchers de soleil enflammés. La villa paradisiaque incarne ce rêve éveillé, ce lieu où le temps se suspend et où chaque instant devient une poésie ...
                </p>
        </article>
        </a>
        <a href="article.php"> 
            <article class="gallery-card small">
                <img src="../assets/img/natura-ressort-presentation-1.png" alt=""> 
                    <div class="card-header">
                        <h3>Hôtel Natura Ressort</h3>
                        <h4>Grèce</h4>
                    </div>
                    <p>
                    Situé au cœur de la commune de Moncoutant, est une véritable oasis pour les amoureux de la nature. Cet établissement unique offre une expérience de vacances reposante ... 
                    </p>
            </article>
        </a>
    </div>
    <div class="gallery">
        <a href="article.php"> 
            <article class="gallery-card small">
                <img src="../assets/img/villa-palmeraie-presentation-1.png" alt=""> 
                    <div class="card-header">
                        <h3>Villa Palmeraie</h3>
                        <h4>Italie</h4>
                    </div>
                    <p>
                    Située à deux pas d’un quartier animé, la Villa Palmeraie est une oasis de tranquillité pour ceux qui cherchent à échapper à l’agitation de la ville sans renoncer à ses commodités ...
                    </p>
            </article>
        </a>
        <a href="article.php"> 
            <article class="gallery-card medium">
                <img src="../assets/img/oasis-du-voyageur-presentation-1.png" alt="">         
                    <div class="card-header">
                        <h3>Villa l'Oasis du voyageur</h3>
                        <h4>Espagne</h4>
                    </div>
                    <p>
                    Nichée à proximité d’une grande ville, la villa “L’Oasis du Voyageur” est un véritable joyau pour les voyageurs en quête de confort et de modernité. Cette villa spacieuse offre un cadre idéal pour se détendre après une journée d’exploration urbaine.
                    </p>
            </article>
        </a>
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

<section>
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

<section>
    <h2>Découvertes Hôtelières, <br> <span>Les Nouveautés à ne pas manquer</span></h2>
    <div class="gallery-container">
        <div class="container-card-hotel">
            <a href="article.php"> 
                <article class="card-hotel">
                    <img src="../assets/img/hotel-das-klima-resort-1.png" alt="">
                    <div class="card-header">
                        <h3>Hôtel Das Klima Resort</h3>
                        <h4>Espagne</h4>
                    </div>
                    <p>Situé au cœur de la commune de Moncoutant, est une véritable oasis pour les amoureux de la nature. Cet établissement unique offre une expérience de vacances reposante ... 
                    </p>
                </article>
            </a>
            <a href="article.php"> 
                <article class="card-hotel">
                    <img src="../assets/img/natura-ressort-presentation-1.png" alt="">
                    <div class="card-header">
                        <h3>Hôtel Fée Dodo Resort</h3>
                        <h4>Grèce</h4>
                    </div>
                    <p>Niché au cœur d’un paysage tropical luxuriant, le Fée Dodo Resort est plus qu’un simple hôtel, c’est un paradis pour les familles à la recherche d’une escapade mémorable. Dès votre arrivée, vous êtes accueilli par le doux parfum des fleurs exotiques et ...
                    </p>
                </article>
            </a>
            <a href="article.php"> 
                <article class="card-hotel">
                    <img src="../assets/img/hotel-fee-dodo-ressort-presentation-1.png" alt="">
                    <div class="card-header">
                        <h3>Hôtel Das Klima Resort</h3>
                        <h4>Espagne</h4>
                    </div>
                    <p>Lorsque l’on évoque le paradis, notre imagination s’envole vers des plages de sable fin, des eaux cristallines et des couchers de soleil enflammés. La villa paradisiaque incarne ce rêve éveillé, ce lieu où le temps se suspend et où chaque instant devient une poésie ...
                    </p>
                </article>
            </a>
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

<section>
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

<section>
    <h2>Villas de Rêve,<br> <span>les dernières pépites dévoilées</span></h2>
    <div class="gallery-container">
        <div class="container-card-villa">
            <a href="article.php"> 
                <article class="card-villa">
                    <img src="../assets/img/hotel-das-klima-resort-1.png" alt="">
                    <div class="card-header">
                        <h3>Hôtel Das Klima Resort</h3>
                        <h4>Espagne</h4>
                    </div>
                    <p>Situé au cœur de la commune de Moncoutant, est une véritable oasis pour les amoureux de la nature. Cet établissement unique offre une expérience de vacances reposante ... 
                    </p>
                </article>
            </a>
            <a href="article.php"> 
                <article class="card-villa">
                    <img src="../assets/img/natura-ressort-presentation-1.png" alt="">
                    <div class="card-header">
                        <h3>Hôtel Fée Dodo Resort</h3>
                        <h4>Grèce</h4>
                    </div>
                    <p>Niché au cœur d’un paysage tropical luxuriant, le Fée Dodo Resort est plus qu’un simple hôtel, c’est un paradis pour les familles à la recherche d’une escapade mémorable. Dès votre arrivée, vous êtes accueilli par le doux parfum des fleurs exotiques et ...
                    </p>
                </article>
            </a>
            <a href="article.php"> 
                <article class="card-villa">
                    <img src="../assets/img/hotel-fee-dodo-ressort-presentation-1.png" alt="">
                    <div class="card-header">
                        <h3>Hôtel Das Klima Resort</h3>
                        <h4>Espagne</h4>
                    </div>
                    <p>Lorsque l’on évoque le paradis, notre imagination s’envole vers des plages de sable fin, des eaux cristallines et des couchers de soleil enflammés. La villa paradisiaque incarne ce rêve éveillé, ce lieu où le temps se suspend et où chaque instant devient une poésie ...
                    </p>
                </article>
            </a>
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