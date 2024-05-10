<?php
// Vérifier la connexion à la base de données
require_once "config/database.php";

if(isset($_POST['modifier'])) {
    // Récupérer les données du formulaire
    $id_produit = $_POST['id_produit'];
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $poids = $_POST['poids'];
    $code_generique = $_POST['code_generique'];
    $quantite_stocke = $_POST['quantite_stocke'];

    // Mettre à jour les données du produit dans la base de données
    $sql = "UPDATE produit SET nom=?, prix=?, description=?, poids=?, code_generique=?, qtt_stocke=? WHERE id_prd=?";
    $stmt = $access->prepare($sql);
    $stmt->execute([$nom, $prix, $description, $poids, $code_generique, $quantite_stocke, $id_produit]);

    // Rediriger vers la liste des produits avec un message de succès
    header("Location: produits.php?modifie=success");
    exit();
} else {
    // Rediriger vers la liste des produits si la modification n'a pas été déclenchée via le formulaire de modification
    header("Location: produits.php");
    exit();
}
?>
