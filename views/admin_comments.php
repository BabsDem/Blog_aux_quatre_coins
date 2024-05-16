<?php 
    include "components/header.php";

    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1 ){
    session_destroy();
    header("Location: signin.php");
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
                        <th>Description</th>
                        <th>Date de création</th>
                        <th>Id de l'article</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
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