<?php 

try{

    $access = new pdo ("mysql:host=localhost;dbname=shop",'root','');

    $access -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    echo "connexion a la base de donnees reussie";

}catch(Exception $e){

    echo "connexion a la base de donnees echoue";
    $e ->getMessage();
    
}


?>