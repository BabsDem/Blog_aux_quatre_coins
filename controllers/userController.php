<?php
session_start();
include "../models/userModel.php";
include "../models/functions/validateSignup.php";
include "../models/functions/validateImg.php";


if(isset($_POST['submit_inscription'])){
    if(!empty($_POST['last_name']) && !empty($_POST['first_name']) &&  !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
        $lastname = htmlspecialchars(trim(strtolower($_POST['last_name']))); 
        $firstname = htmlspecialchars(trim(strtolower($_POST['first_name']))); 
        $email = htmlspecialchars(trim(strtolower($_POST['email']))); 
        $password = htmlspecialchars(trim($_POST['password']));
        $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

        $_SESSION['errors'] = validateSignup($lastname, $firstname, $email, $password, $confirm_password);

        if(empty( $_SESSION['errors'])){
            try{
                $password = password_hash($password, PASSWORD_DEFAULT);
                addUser($lastname, $firstname, $email , $password);
                $_SESSION['user'] = getUser($email); 
            }catch(\Exception $e){
                $_SESSION['errors']['email'] = $e->getMessage();
                header("Location: ../views/signup.php");
                exit;
            }
            header("Location: ../views/home.php");
            exit;
        }else{
            header("Location: ../views/signup.php");
            exit;
        }
    }else{
        $message = "Merci de remplir tous les champs"; 
        header("Location: ../views/signup.php?message=$message");
        exit;
    }
    
}else if(isset($_POST['submit_connexion'])){   
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = htmlspecialchars(trim(strtolower($_POST['email']))); 
        $password = htmlspecialchars(trim($_POST['password']));
        try{           
            login($email); 
            $user = getUser($email);
            if (password_verify($password, $user['password'])) {                    
                $_SESSION['user'] = $user;
                header("Location: ../views/home.php");
                exit;
            } else {
                $_SESSION['errors']['password'] = "Le mot de passe est incorrect"; 
                header("Location: ../views/signin.php"); 
                exit;          
            }
        }catch(\Exception $e){
            $_SESSION['errors']['email'] = $e->getMessage();
            header("Location: ../views/signin.php"); 
            exit;
        }        
    }else{
        $message = "Merci de remplir tous les champs"; 
        header("Location: ../views/signin?message=$message");
        exit;
    }
    
}else if(isset($_POST['submit_modify_userdata'])){
    if(!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['email'])){
        $lastname = htmlspecialchars(trim(strtolower($_POST['last_name'])));
        $firstname = htmlspecialchars(trim(strtolower($_POST['first_name'])));
        $email = htmlspecialchars(trim(strtolower($_POST['email'])));
        $file = $_FILES['profile_img'];   
        $user = $_SESSION['user']; 
        try{                    
            $filename = validateImg($file, $user['id_user'], "profile", $index = 0); 
            $_SESSION['user'] = updateUser($user["id_user"], $lastname, $firstname, $email, $filename);
            $_SESSION["errors"] = validateSignup($lastname,$firstname, $email, null,null);
            header("Location: ../views/account.php");
            exit;
       
        }catch(\Exception $e){
            $_SESSION['errors']['img'] = $e->getMessage();
            header("Location: ../views/account_modify.php"); 
            exit;
        }
    }
}else if(isset($_POST['submit_account_modify_password'])){
    if(!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['confirmation_new_password'])){
        $oldPassword = htmlspecialchars(trim($_POST["old_password"])); 
        $newPassword = htmlspecialchars(trim($_POST["new_password"])); 
        $confirmPassword = htmlspecialchars(trim($_POST["confirmation_new_password"]));
        $user = $_SESSION['user']; 

        if(password_verify($oldPassword, $user['password'])){
            $_SESSION['errors'] = validateSignup(null, null, null,$newPassword, $confirmPassword);
            if(empty($_SESSION['errors'])){
                try{
                    $password = password_hash($newPassword, PASSWORD_DEFAULT);
                    updateUserPassword($user["id_user"], $password);
                    $message = "Votre mot de passe a été mis à jour !";
                    header("Location: ../views/account.php?message=$message"); 
                    exit;

                }catch(\Exception $e){
                    $_SESSION['errors']['password'] = $e->getMessage();
                    header("Location: ../views/account_modify_password.php"); 
                    exit;
                }
            }else{
                header("Location: ../views/account_modify_password.php"); 
                exit;
            }
        }else{
            $message = "Votre ancien mot de passe est incorrect"; 
            header("Location: ../views/account_modify_password.php?message=$message"); 
        }

    }
}else if(isset($_POST['submit_admin_create_user'])){
    if(!empty($_POST['last_name']) && !empty($_POST['first_name']) &&  !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
        $lastname = htmlspecialchars(trim(strtolower($_POST['last_name']))); 
        $firstname = htmlspecialchars(trim(strtolower($_POST['first_name']))); 
        $email = htmlspecialchars(trim(strtolower($_POST['email']))); 
        $password = htmlspecialchars(trim($_POST['password']));
        $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

        $_SESSION['errors'] = validateSignup($lastname, $firstname, $email, $password, $confirm_password);

        if(empty( $_SESSION['errors'])){
            try{
                $password = password_hash($password, PASSWORD_DEFAULT);
                addUser($lastname, $firstname, $email , $password);                   
                $_SESSION['users'] = getAllUser(); 
            }catch(\Exception $e){
                $_SESSION['errors']['email'] = $e->getMessage();
                header("Location: ../views/admin_create_user.php");
                exit;
            }
            header("Location: ../views/admin_users.php?page=admin_users");
            exit;
        }else{
            header("Location: ../views/admin_create_user.php");
            exit;
        }
    }else{
        $message = "Merci de remplir tous les champs"; 
        header("Location: ../views/admin_users.php?message=$message");
        exit;
    }
}else if(isset($_POST['submit_admin_update_user'])){
    if(!empty($_POST['last_name']) && !empty($_POST['first_name']) &&  !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
        $lastname = htmlspecialchars(trim(strtolower($_POST['last_name']))); 
        $firstname = htmlspecialchars(trim(strtolower($_POST['first_name']))); 
        $email = htmlspecialchars(trim(strtolower($_POST['email']))); 
        $password = htmlspecialchars(trim($_POST['password']));
        $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));
        $id = htmlspecialchars(trim($_POST["update_user_id"]));

        $_SESSION['errors'] = validateSignup($lastname, $firstname, $email, $password, $confirm_password);
        $user = getUserForUpdate($id);
    
        if(empty( $_SESSION['errors'])){
            try{
                $password = password_hash($password, PASSWORD_DEFAULT);
                updateUser($id, $lastname, $firstname, $email, $user["img"]); 
                updateUserPassword($id, $password); 
                $_SESSION['users'] = getAllUser();               
                header("Location: ../views/admin_users.php?page=admin_users");
                exit;
            }catch(\Exception $e){
                $_SESSION['errors']['email'] = $e->getMessage();
            }
        }else{
            header("Location: ../views/admin_update_user.php?user_id=". $id);
            exit;
        }
    }
}else if(isset($_POST['submit_reset_password'])){
    if(!empty($_POST['email']) && !empty($_POST['token'])){
        $email = htmlspecialchars(trim(strtolower($_POST['email']))); 
        $token = htmlspecialchars(trim(strtolower($_POST['token']))); 
        try{
            $user = getUser($email); 
            $_SESSION['errors'] = validateSignup (null, null, $email,null, null);
            if(empty($_SESSION['errors'])) {
                if(checkUserExists($email)){
                    if($token === $user['token']){
                        $token = password_hash($token, PASSWORD_DEFAULT);
                        resetPassword($user['id_user'],$token);
                        $message = "Connectez vous avec le token"; 
                        header("Location: ../views/signin.php?message=$message"); 
                        exit;
                    }else{
                    $_SESSION['errors']['token'] = "Votre token est incorrect !"; 
                    header("Location: ../views/reset_password.php");
                    exit;
                    }
                }else{
                    $_SESSION['errors']['email'] = "Votre email n'existe pas !"; 
                    header("Location: ../views/reset_password.php");
                    exit;
                }
            }else{
                header("Location: ../views/reset_password.php");
                exit; 
            }
        }catch(\Exception $e){
            $_SESSION['errors'] = $e->getMessage(); 
        }
    }
}

if(isset($_GET['page']) && $_GET['page'] === "admin_users"){
    $_SESSION['users'] = getAllUser();
    header("Location: ../views/admin_users.php?page=admin_users"); 
    exit;
}
if(isset($_GET['user_id'])){
    deleteUser($_GET['user_id']); 
    $_SESSION["users"] = getAllUser(); 
    header("Location: ../views/admin_users.php?page=admin_users"); 
    exit;
}
