<?php

function pathImg($id, $extension, $directory, $file, $index){
    date_default_timezone_set('Europe/Paris');
    $date = date("Ymd-Hi");
    $fileName =  "../public/$directory/". $id . "img-". $index . "_". $date . $extension;
    $uploadFile = move_uploaded_file($file["tmp_name"], $fileName);
    return ['fileName' => $fileName, 'uploadFile' => $uploadFile];
}
