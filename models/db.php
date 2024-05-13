<?php 

// Connexion à la Base de données
try{
$bdd = new PDO('mysql:host=localhost;dbname=aux_quatre_coins', 'root', '',[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET default_storage_engine=INNODB']);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
global $bdd; 

// Attraper les éventuelles erreurs
}catch(exception $e){
    echo $e->getMessage();
}