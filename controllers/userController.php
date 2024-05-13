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
        header("Location: ../views/signup?message=$message");
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
}