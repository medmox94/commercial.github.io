<?php 

function ajouter($nom, $prix, $image, $desc, $poid, $code_prod){
    
    if(require("database.php")){

        $req = $access ->prepare("INSERT INTO produit (nom, prix, image, description, poids, code_generique) VALUES ($nom, $prix, $image, $desc, $poid, $code_prod)");

        $req ->execute(array($nom, $prix, $image, $desc, $poid, $code_prod));

        $req ->closeCursor();

    }
}

function afficher(){

    if(require("database.php")){

        $req = $access ->prepare("SELECT * FROM produit ORDER BY id DESC");

        $req ->execute();

        $data = $req ->fetchall(PDO::FETCH_OBJ);    

        return $data;
    }

}
function supprime($id){
    if(require("database.php")){

        $req = $access ->prepare("DELETE * FROM prooduit WHERE id=?");

        $req ->execute(array($id));
    }
}
?>