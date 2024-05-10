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
            // ajouter nouveau produit au panier
            $produit['quantite'] = $quantite;
            //initial quantite stockee
            
            // 
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

    // $_SESSION['prix_produit'] = $prix_apres_remise;

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

                    
                    $background_color = 'white';
                    $alert_message = ''; 
                    if ($produit['qtt_stocke'] > 75) {
                        $background_color = '4C9567'; 
                    } elseif($produit['qtt_stocke'] > 25) {
                        $background_color = 'E1D027';  
                    }else {
                        $background_color='A02020';
                        $alert_message = 'Attention: Quantité faible en stock!';
                    }

                echo "<li style='background-color: $background_color; border-radius:8px; border: 2px solid black;'><strong>{$produit['nom']} - {$produit['prix']} DH (Quantité en stock : {$produit['qtt_stocke']} )</strong>";
                
                if ($alert_message !== '') {
                    echo "<script>document.write(\"<span style='color: red; margin-left: 10px; margin-right: 10px; border:solid 1px black; background-color:black;'>$alert_message</span>\");</script>";
                }

                echo "<form method='post'>";
                if($produit['qtt_stocke']>0){
                    echo "<input type='number' name='ajouter_panier[{$produit['id_prd']}]' value='1' min='1' max='1000'>";
                    
                    echo "<label for='remise_{$produit['id_prd']}'>Remise (en DH) :</label>";
                    echo "<input type='number' name='remise[{$produit['id_prd']}]' id='remise_{$produit['id_prd']}' value='0' min='0'>";
                    
                    echo "<button type='submit' style='margin-left:30px; color:blue; border-radius:6px;'>Ajouter au panier</button>";
                }else {
                    echo "<input type='number' name='ajouter_panier[{$produit['id_prd']}]' value='0' min='0' max='0' disabled>";
                    // echo "<button type='submit' style='margin-left:30px; color:gray; border-radius:6px;' disabled>Ajouter au panier</button>";
                }
                echo "</form></li>";
            }
           
            ?>
        </ul>
    </div>

    <div class="list1">
        <h2 >* Panier *</h2>
        <h6 >pour modifie une quantite d'un produit s'il vou plait supprime et ajouter nouveau quantite</h6>
        <?php
        // Afficher le contenu du panier
        if (!empty($_SESSION['panier'])) {
            echo "<ul>";
            foreach ($_SESSION['panier'] as $key => $produit) {


                $remise_key = 'remise_' . $produit['id_prd'];
                $remise_value = isset($_POST['remise'][$produit['id_prd']]) ? $_POST['remise'][$produit['id_prd']] : 0;
                
                // Calculate prix lorsque fait remise
                $prix_apres_remise = $produit['prix'] - $remise_value;

                $_SESSION['panier'][$key]['prix_apres_remise'] = $prix_apres_remise;

                
                echo "<li>{$produit['nom']} 
                                - Quantité : {$produit['quantite']} 

                                - Prix unitaire : {$produit['prix']}  
                                - Prix après remise : {$prix_apres_remise} DH";

                
                if ($produit['quantite'] > 1) {
                    echo " - Prix total pour {$produit['quantite']} articles : " . ($prix_apres_remise * $produit['quantite']) . " DH</li>";
                } else {
                    echo " - Prix total : " . ($prix_apres_remise * $produit['quantite']) . " DH</li>";
                }

                
                echo "<form  action='supprime_elem_panier.php' style='display: inline-block;' method='post'>
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
        }else{
            echo "paniier est vide";
        }
        
        ?>
    </div>

</body>
</html>
