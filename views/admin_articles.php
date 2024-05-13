<?php 
include "components/header.php";
require ("../models/articleModel.php"); 

if(isset($_GET["page"]) && $_GET['page']=="admin_articles"){
    $articles = $_SESSION['articles']; 
}
?>

<section class="section_admin_articles">
    <div class="admin_menu">
        <?php include "components/menu_admin.php";?>
    </div>
    <div class="container_table">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Titre</th>
                        <th>Lieu</th>
                        <th class="large_width">Description</th>
                        <th>Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($articles as $article): ?>
                    <tr>
                        <td><?php echo $article["id_article"] ?></td>
                        <td><?php echo $article["title"] ?></td>
                        <td><?php echo $article["place"] ?></td>
                        <td><?php echo $article["subtitle"] ?></td>
                        <td><?php echo $article["description"] ?></td>
                        <td><?php echo $article["category"] ?></td>
                        <td>
                            <div class="icons_container">
                                <a href="admin_update_article.php?article_id=<?php echo $article['id_article']; ?>">
                                    <img src="../assets/svg/pen-solid.svg" alt="bouton modifier article">
                                </a>
                                <a href="../controllers/articleController.php?article_id=<?php echo $article['id_article']; ?>">
                                    <img src="../assets/svg/trash-solid.svg" alt="bouton supprimer article">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="create_container">

                <a class="btn create-btn" href="admin_create_article.php">Créer un article</a>

            </div>
        </div>
</section>
<?php include "components/footer.php"; ?>