<?php

    include "pathImg.php";

  function validateImg($file, $id, $directory){
    
    $maxSize = 2000000; // 2 MO
    $validExtension = ['.jpg','.jpeg','.png','.gif', '.webp'];  
   
    if($file['size'] > $maxSize){
        throw new Exception("L'image est trop volumineuse! (Poids maximum : 2Mo)");
    }else if($file['error'] > 0){
        throw new Exception("Une erreur est survenue lors du transfert");
    }
    $fileExtension = ".".strtolower(substr(strrchr($file["name"], "."), 1));

    if(!in_array($fileExtension, $validExtension)){
        throw new Exception("Seulement le format jpg, jpeg, png, gif et webp sont acceptés");
    }
    
    $path = pathImg($id, $fileExtension, $directory, $file); 
    $uploadFile = $path["uploadFile"];
    $fileName = $path["fileName"];

    if($uploadFile ){
        return $fileName;
    }else{
        throw new Exception("Le transfert a échoué");
    }

  }
