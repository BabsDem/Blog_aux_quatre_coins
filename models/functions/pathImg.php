<?php

function pathImg($id, $extension, $directory, $file){
    date_default_timezone_set('Europe/Paris');
    $date = date("Hi");
    $fileName =  "../public/$directory/". $id . "img-". $date . $extension;
    $uploadFile = move_uploaded_file($file["tmp_name"], $fileName);
    return ['fileName' => $fileName, 'uploadFile' => $uploadFile];
}
