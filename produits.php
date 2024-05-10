<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="css/produits.css">
</head>
<body>
    <h1>Liste des produits</h1>

    <div class="liste-produits">

    <?php

    require_once "config/database.php";
    echo "<br>";
    
    // Récupérer tous les produits
    $sql = "SELECT * FROM produit";
    $resultat = $access->query($sql);

    if ($resultat->rowCount() > 0) {
        // Afficher chaque produit
        echo "<table>";
        echo "<tr>";
        echo "<th>Image</th>";
        echo "<th>Nom</th>";
        echo "<th>Prix</th>";
        echo "<th>Description</th>";
        echo "<th>Poids</th>";
        echo "<th>Code Générique</th>";
        echo "<th>Quantité Stockée</th>";
        echo "<th>Action</th>";
        echo "<th>Supprime</th>";
        echo "</tr>";
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                
                echo "<tr>";
                echo "<td><img src='" . $row['image'] . "' alt='" . $row['nom'] . "' width='200'></td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['prix'] . " €</td>";
                echo "<td>" . $row['description'] . " </td>";
                echo "<td>" . $row['poids'] . " </td>";
                echo "<td>" . $row['code_generique'] . " </td>";
                echo "<td>" . $row['qtt_stocke'] . "</td>";
                                

                echo "<td><a href='modifierproduit.php?id=" . $row['id_prd'] . "' style='color:blue;'>Modifier</a></td>";
                echo "<td><a href='supprimerproduit.php?id=" . $row['id_prd'] . "' style='color:red;''>Supprimer</a></td>";
                
                echo "</tr>";             
                
            }
        echo "</table>";
    } else {
        echo "<br>";
        echo "<tr><td colspan='4'>لم يتم العثور على منتجات.</td></tr>";
    }
    // $access->close();
    ?>
    <br>
    
    </div>
</body>
</html>