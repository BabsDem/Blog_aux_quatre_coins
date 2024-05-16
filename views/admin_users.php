<?php 
    include "components/header.php"; 

    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1 ){
        session_destroy();
        header("Location: signin.php");
    } 
    if(isset($_GET["page"]) && $_GET['page'] == "admin_users"){
        $users = $_SESSION['users']; 
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
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user["id_user"] ?></td>
                        <td><?php echo $user["lastname"] ?></td>
                        <td><?php echo $user["firstname"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td>
                            <div class="icons_container">
                                <a href="admin_update_user.php?user_id=<?php echo $user['id_user']; ?>">
                                    <img src="../assets/svg/pen-solid.svg" alt="bouton modifier utilisateur">
                                </a>
                                <a href="../controllers/userController.php?user_id=<?php echo $user['id_user']; ?>"> 
                                    <img src="../assets/svg/trash-solid.svg" alt="bouton supprimer utilisateur">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="create_container">
                <a class="btn create-btn" href="admin_create_user.php">Créer un utilisateur</a>
            </div>
        </div>
</section>

<?php include "components/footer.php"; ?>