<?php
// Vérifier la connexion
include 'config/database.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="css/ajouterprd.css">
    <title>Ajouter Produit</title>


</head>
<body>
    <form action="ajouterprd.php" method="post" enctype="multipart/form-data">
    
    <div class="container">
        <div class="form-group1">
            <label>Nom  </label>
            <input type="text" name="nom" class="form-control1" value="">
        </div>

        <div class="form-group1">
            <label>Prix (DH) </label>
            <input type="number" name="Prix" class="form-control1" value="">
            <span class="gest"></span>
        </div>

        <div class="form-group1">
            <label>Description </label>
            <textarea name="description"  cols="35" rows="5">
            </textarea>
        </div>

        <div class="form-group1">
            <label>Poids (g) </label>
            <input type="number" class="form-control1" id="poids" name="poids" min="0">
            <!-- <select name="poid_unit">
                <option value="kg">kg</option>
                <option value="g">g</option>
            </select> -->
            <span class="gest"></span>
        </div>

        <div class="form-group1">
            <label>Code generique  </label>
            <input type="number" name="code_generique" class="form-control1" value="">
            <span class="gest"></span>
        </div>

        <div class="form-group1">
            <label>Quantite stock  </label>
            <input type="number" name="quantite_stocke" class="form-control1" value="">
            <span class="gest"></span>
        </div>

        <div class="form-group1">
            <label>Image  </label>
            <input type="file" id="image" name="image">
        </div>

        <input type="submit" id="btn" value="Ajouter produit" name="ajouter">
    </div>
    </form>
<?php

    // Ajouter un produit
    if(isset($_POST["ajouter"])){

        $nom = $_POST['nom'];
        $prix = $_POST['Prix'];
        $description = $_POST['description'];
        $poids = $_POST['poids'];
        $code_generique = $_POST['code_generique'];
        $quantite_stocke = $_POST['quantite_stocke'];
        

        //image

               
        $filename = null;
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            
            $filename = uniqid(). '.' .pathinfo($image, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['image']['tmp_name'], 'config/' . $filename);
        }

        if(!empty($nom) && !empty($prix) && !empty($description) && !empty($poids) && !empty($code_generique) && !empty($quantite_stocke)){
            // Insert data into database
            $sql = $access->prepare('INSERT INTO produit (id_prd,image, nom, prix, description, poids, code_generique, qtt_stocke) VALUES (null, ?, ?, ?, ?, ?, ?, ?)');
            $inserted = $sql->execute([$filename, $nom, $prix, $description, $poids, $code_generique, $quantite_stocke]);

            if ($inserted) {
                header('location: produits.php');
            } else {

                ?>
                <div class="alert alert-danger" role="alert">
                    Database error (40023).
                </div>
                <?php
            }
        }
}
?>
</body>
</html>