<?php include "components/header.php";
    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1 ){
        session_destroy();
        header("Location: signin.php");
    } 
    if(isset($_GET['article_id'])){
    $articleId = $_GET['article_id'];
    }
    if(isset($_SESSION["errors"])){
        $errors = $_SESSION["errors"];
        unset($_SESSION['errors']);   

    }
?>
<section class="section_admin_update_article">
    <div class="admin_menu">
        <?php include "components/menu_admin.php";?>
    </div>

    <div class="admin_update_article">
        <form action="/controllers/articleController.php" method="post" class="form_admin_update_article" enctype="multipart/form-data">
            <h2>Modifier l'article</h2>
                <input type="hidden" name="update_article_id" value="<?php echo $articleId; ?>">
                <div class="input-form-container">
                    <input type="text" id="title" required autofocus autocomplete="off" name="title"/>
                    <label for="title">Nom</label>
                </div>
                <div class="input-form-container">
                    <input
                    type="text"
                    id="subtitle"
                    name="subtitle"
                    autocomplete="off"
                    />
                    <label for="subtitle">Titre de l'article</label>
                </div>
                <div class="input-form-container">
                    <input
                    type="text"
                    required
                    id="place"
                    name="place"
                    autocomplete="off"
                    />
                    <label for="place">Lieu</label>
                </div>
                <div class="input-form-container">
                    <textarea class="textarea" name="description" id="description"></textarea>
                    <label for="description" class="label-textarea">Description</label>
                </div>              
                <div class="input-form-container">
                  <select name="categories" id="categories">
                    <option value="hotel">Hôtel</option>
                    <option value="villa">Villa</option>
                  </select>
                    <label for="categories">Choisir une catégorie d'article</label>
                </div>
                <div>
                    <span class="error"><?php echo $errors ?? "" ; ?></span>
                    <input type="file" id="images" name="images[]" multiple>
                    <label for="images" class="btn btn-file">Choisir des images</label>
                </div>
             
                <input type="submit" name="submit_admin_update_article" value="Modifier" class="btn submit-account"/>
            </form>
    </div>
</section>

<?php include "components/footer.php";?>

