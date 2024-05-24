<?php
    include "pathImg.php";

    // Vérification sur les images (format - size - error)
    function validateImg($file, $fileExtension){
        
        $maxSize = 2000000; // 2 MO
        $validExtension = ['jpg','jpeg','png','gif', 'webp'];  
        
        if($file['size'] > $maxSize){
            throw new Exception("L'image est trop volumineuse! (Poids maximum : 2Mo)");
        }else if($file['error'] > 0){
            throw new Exception("Une erreur est survenue lors du transfert");
        }else if(!in_array($fileExtension, $validExtension)){
            throw new Exception("Seulement le format jpg, jpeg, png, gif et webp sont acceptés");
        }


    }
