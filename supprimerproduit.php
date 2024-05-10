<?php
// Vérifier la connexion à la base de données
require_once "config/database.php";

// Vérifier si l'identifiant du produit est passé dans l'URL
if(isset($_GET['id'])) {
    $id_prd = $_GET['id'];
    
    // Requête de suppression du produit
    $sql = "DELETE FROM produit WHERE id_prd = ?";
    $stmt = $access->prepare($sql);
    $stmt->execute([$id_prd]);

    // Rediriger vers la page des produits après la suppression
    header("Location: produits.php");
    exit();
} else {
    // Rediriger vers une autre page si l'identifiant du produit n'est pas spécifié dans l'URL
    header("Location: produits.php");
    exit();
}
?>

