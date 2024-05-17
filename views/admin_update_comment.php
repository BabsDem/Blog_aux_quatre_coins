<?php include "components/header.php";
if(isset($_GET['comment_id'])){
$commentId = $_GET['comment_id'];
var_dump($commentId);
}
if(isset($_SESSION["errors"])){
    $errors = $_SESSION["errors"];
    unset($_SESSION['errors']);   

}
?>
<section class="section_admin_update_comment">
    <div class="admin_menu">
        <?php include "components/menu_admin.php";?>
    </div>

    <div class="admin_update_comment">
        <form action="/blog_aux_quatre_coins/controllers/commentController.php" method="post" class="form_admin_update_comment" enctype="multipart/form-data">
            <input type="hidden" name="comment_id" value="<?php echo $commentId; ?>">
            <h2>Modifier le commentaire</h2>
                <div class="input-form-container">
                    <textarea class="textarea" name="description" id="description_comment"></textarea>
                    <label for="description" class="label-textarea">Description</label>
                </div>              
                <input type="submit" name="submit_admin_update_comment" value="Modifier" class="btn submit-account"/>
            </form>
    </div>
</section>

<?php include "components/footer.php";?>

