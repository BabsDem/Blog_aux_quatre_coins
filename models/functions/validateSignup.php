<?php

// Vérification des formulaires concernant les utilisateurs
function validateSignup ($lastname = null, $firstname = null, $email = null, $password = null, $confirm_password = null){
    $errors = [];

    if($lastname !== null){
        if(strlen($lastname) < 3){
            $errors['lastname'] = "Votre nom doit contenir au moins 3 caractères !"; 
        }elseif(strlen($lastname) > 50){
            $errors['lastname'] = "Votre nom ne peut pas dépasser 50 caractères !"; 
        }
    }

    if($firstname !== null){
        if(strlen($firstname) < 3){
            $errors['firstname'] = "Votre prénom doit contenir au moins 3 caractères !"; 
        }elseif(strlen($firstname) > 50){
            $errors['firstname'] = "Votre prénom ne peut pas dépasser 50 caractères !"; 
        }
    }

    if($email !== null){
        $regexEmail =  "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/"; 
        if (!preg_match($regexEmail, $email)){
            $errors["email"] = "L'email est invalide";
        }
    }

    if($password !== null && $confirm_password !== null){
        if($password != $confirm_password){
            $errors["confirm_password"] = "Les mots de passe ne sont pas identiques";
        }
        $regexPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,}$/";   
        if(!preg_match($regexPassword, $password)){
            $errors["password"] = "Le mot de passe doit contenir au moins 7 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial";
        }
    }

    return $errors;
}