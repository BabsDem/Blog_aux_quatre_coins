<?php include "components/header.php";?>

<section class="section_admin_create_article">
    <div class="admin_menu">
        <?php include "components/menu_admin.php";?>
    </div>

    <div class="admin_create_article">
        <form action="/blog_aux_quatre_coins/controllers/articleController.php" method="post" class="form_admin_create_article" enctype="multipart/form-data">
                <h2>Créer un nouvel article</h2>
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
                    <input type="file" id="images" name="images[]" multiple>
                    <label for="images" class="btn btn-file">Choisir des images</label>
                </div>
             
                <input type="submit" name="submit_admin_create_article" value="Créer" class="btn submit-account"/>
            </form>
    </div>
</section>

<?php include "components/footer.php";?>

