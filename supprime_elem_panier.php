<?php
session_start();

require_once "config/database.php";

if (isset($_POST['key']) && isset($_SESSION['panier'])) {
    $key = $_POST['key'];

    $id_produit = $_SESSION['panier'][$key]['id_prd'];

    $quantite = $_SESSION['panier'][$key]['quantite'];

    $sql_select = "SELECT qtt_stocke FROM produit WHERE id_prd = ?";
    $stmt_select = $access->prepare($sql_select);
    $stmt_select->execute([$id_produit]);
    $row = $stmt_select->fetch(PDO::FETCH_ASSOC);
    $current_stock_quantity = $row['qtt_stocke'];

    // Add the quantity back to the stock
    $new_stock_quantity = $current_stock_quantity + $quantite;

    // Restore the stock quantity in the database
    $sql_update = "UPDATE produit SET qtt_stocke = ? WHERE id_prd = ?";
    $stmt_update = $access->prepare($sql_update);
    $stmt_update->execute([$new_stock_quantity, $id_produit]);

    unset($_SESSION['panier'][$key]);
    // retour a la page vente
    header("Location: ventee.php");
    exit();
} else {
    // invalid si le key n'existe
    echo "Invalid request.";
}
?>