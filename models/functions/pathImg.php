<?php
// Téléchargement de l'image dans le dossier public qui contient le dossier article et profil
function pathImg($id, $extension, $directory, $file, $index = null){
    date_default_timezone_set('Europe/Paris');
    $date = date("Hi");
    $fileName =  "../public/$directory/". $id . "img-". $index . "_". $date .".". $extension;
    $uploadFile = move_uploaded_file($file["tmp_name"], $fileName);
    
    if (!$uploadFile) {
        throw new Exception("Le transfert a échoué");
    }
    return $fileName;
}
