<?php 
    include "components/header.php"; 

    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1 ){
        session_destroy();
        header("Location: signin.php");
    } 

?>
    <section class="section_admin_users">
        <div class="admin_menu">
            <?php include "components/menu_admin.php";?>
        </div>
        <div class="container_table">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>Dupont</td>
                        <td>Marie</td>
                        <td>dupontmarie@hotmail.com</td>
                        <td>

                            <div class="icons_container">
                                    <a href="admin_update_article.php">
                                        <img src="../assets/svg/pen-solid.svg" alt="bouton modifier article">
                                    </a>
                                    <button>
                                        <img src="../assets/svg/trash-solid.svg" alt="bouton supprimer article">
                                    </button>
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="create_container">

                <a class="btn create-btn" href="admin_create_user.php">Créer un utilisateur</a>
            </div>
        </div>
</section>

<?php include "components/footer.php"; ?>