<?php 
    include "components/header.php";

    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1 ){
    session_destroy();
    header("Location: signin.php");
    } 
    if(isset($_GET["page"]) && $_GET['page'] == "admin_comments"){
        $comments = $_SESSION['comments']; 
    }
?>

<section class="section_admin_comments">
    <div class="admin_menu">
        <?php include "components/menu_admin.php";?>
    </div>
    <div class="container_table">
            <table>
                <thead>
                    <tr>
                    <th>Id</th>
                        <th class="large_width">Description</th>
                        <th>Date de création</th>
                        <th>Id utilisateur</th>
                        <th>Id article</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comments as $comment): ?>
                    <tr>
                        <td><?php echo $comment["id_comment"] ?></td>
                        <td><?php echo $comment["description"] ?></td>
                        <td><?php echo $comment["date_creation"] ?></td>
                        <td><?php echo $comment["id_user"] ?></td>
                        <td><?php echo $comment["id_article"] ?></td>
                        <td>
                            <div class="icons_container">
                                <a href="">
                                    <img src="../assets/svg/pen-solid.svg" alt="bouton modifier utilisateur">
                                </a>
                                <a href=""> 
                                    <img src="../assets/svg/trash-solid.svg" alt="bouton supprimer utilisateur">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
</section>

<?php include "components/footer.php"; ?>