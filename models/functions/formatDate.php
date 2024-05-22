<?php

function formatDateFr($date) {
    $days = [
        'Sunday' => 'dimanche', 
        'Monday' => 'lundi', 
        'Tuesday' => 'mardi', 
        'Wednesday' => 'mercredi', 
        'Thursday' => 'jeudi', 
        'Friday' => 'vendredi', 
        'Saturday' => 'samedi'];

    $months = [
        'January' => 'janvier', 
        'February' => 'février', 
        'March' => 'mars', 
        'April' => 'avril', 
        'May' => 'mai', 
        'June' => 'juin', 
        'July' => 'juillet', 
        'August' => 'août', 
        'September' => 'septembre', 
        'October' => 'octobre', 
        'November' => 'novembre', 
        'December' => 'décembre'];

    $date = date_create_from_format('Y-m-d H:i:s', $date);
    $dateStr = $date->format('l d F Y \à H\hi');

    $dateStr = str_replace(array_keys($days), $days, $dateStr);
    $dateStr = str_replace(array_keys($months), $months, $dateStr);

    return $dateStr;
}