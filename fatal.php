<?php
session_start();

require_once "config/database.php";

// Vérifie si la session du panier existe, sinon initialise-la
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Vérifie si des produits ont été ajoutés au panier
if (isset($_POST['ajouter_panier'])) {
    foreach ($_POST['ajouter_panier'] as $id_produit => $quantite) {
        // Récupère les informations du produit depuis la base de données
        $sql = "SELECT * FROM produit WHERE id_prd=?";
        $stmt = $access->prepare($sql);
        $stmt->execute([$id_produit]);
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);

        
        $produit['quantite'] = $quantite;


        $existing_key = array_search($id_produit, array_column($_SESSION['panier'], 'id_prd'));
        if ($existing_key !== false) {
            // 
            $_SESSION['panier'][$existing_key]['quantite'] += $quantite;
        } else {
            
            $_SESSION['panier'][] = $produit;
        }

        $nouvelle_quantite = $produit['qtt_stocke'] - $quantite;
        $sql_update = "UPDATE produit SET qtt_stocke = ? WHERE id_prd = ?";
        $stmt_update = $access->prepare($sql_update);
        $stmt_update->execute([$nouvelle_quantite, $id_produit]);
    }
}

if (empty($_POST['ajouter_panier']) && empty($_SESSION['panier'])) {
    // Clear the panier
    unset($_SESSION['panier']);
}
if (isset($_POST['passer_facturation'])) {
    // Redirection vers la page de facturation
    header("Location: facturation.php");
    exit; // Assurez-vous de terminer le script après la redirection
}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vente</title>
    <link rel="stylesheet" href="css/vente.css">
</head>
<body>
    <h1 style="text-align:center; ">Page de vente</h1>


    <div class="list">
        <h2>Liste des produits</h2>
        <ul>
            <?php
            // Afficher la liste des produits
            $sql = "SELECT * FROM produit";
            $stmt = $access->query($sql);
            while ($produit = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>{$produit['nom']} - {$produit['prix']} DH (Quantité en stock : {$produit['qtt_stocke']} )";
                echo "<form method='post'>";
                echo "<input type='number' name='ajouter_panier[{$produit['id_prd']}]' value='1' min='1' max='1000'>";
                echo "<button type='submit' style='margin-left:30px; color:blue; border-radius:6px;'>Ajouter au panier</button>";
                echo "</form></li>";
            }
            ?>
        </ul>
    </div>

    <div class="list1">
        <h2>* Panier *</h2>
        <?php
        // Afficher le contenu du panier
        if (!empty($_SESSION['panier'])) {
            echo "<ul>";
            foreach ($_SESSION['panier'] as $key => $produit) {
                echo "<li>{$produit['nom']} 
                - Quantité : {$produit['quantite']} 
                - Prix unitaire : {$produit['prix']} DH
                - Prix total : " . ($produit['prix'] * $produit['quantite']) . " DH
                
                <form  action='supprime_elem_panier.php' style='display: inline-block;' method='post'>
                    <input type='hidden' name='key' value='$key'>
                    <input type='submit' value='Supprimer' style='color:white; background-color: red; border-radius: 4px;' >
                </form>

                </li>";
            }
            echo "</ul>";
            // Bouton pour passer à la facturation
            echo "<form method='post'>";
            echo "<button type='submit' name='passer_facturation' style='justify-content:center;'>Passer à la facturation</button>";
            echo "</form>";
        }
        ?>
    </div>

</body>
</html>
