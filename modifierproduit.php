<?php
// Vérifier la connexion à la base de données
require_once "config/database.php";

// Vérifier si l'identifiant du produit est passé dans l'URL
if(isset($_GET['id'])) {
    $id_prd = $_GET['id'];
    
    // Récupérer les données du produit à partir de la base de données
    $sql = "SELECT * FROM produit WHERE id_prd = ?";
    $stmt = $access->prepare($sql);
    $stmt->execute([$id_prd]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le produit existe
    if($produit) {
        // Afficher le formulaire de modification pré-rempli
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="css/ajouterprd.css">
</head>
<body>
    <h1 style="text-align:center;">Modifier Produit</h1>
    <form action="traitement_modification.php" method="post">
        <input type="hidden" name="id_produit" value="<?php echo $produit['id_prd']; ?>">
        <div class="container">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $produit['nom']; ?>">
            </div>
            <div class="form-group">
                <label for="prix">Prix (DH)</label>
                <input type="number" id="prix" name="prix" class="form-control" value="<?php echo $produit['prix']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" class="form-control"><?php echo $produit['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="poids">Poids (g)</label>
                <input type="number" id="poids" name="poids" class="form-control" min="0" value="<?php echo $produit['poids']; ?>">
            </div>
            <div class="form-group">
                <label for="code_generique">Code Generique</label>
                <input type="number" id="code_generique" name="code_generique" class="form-control" value="<?php echo $produit['code_generique']; ?>">
            </div>
            <div class="form-group">
                <label for="quantite_stocke">Quantite Stock</label>
                <input type="number" id="quantite_stocke" name="quantite_stocke" class="form-control" value="<?php echo $produit['qtt_stocke']; ?>">
            </div>
            <input type="submit" id="btn" value="Modifier Produit" name="modifier" class="btn btn-primary">
        </div>
    </form>
</body>
</html>
<?php
        // Fin du code PHP
    } else {
        // Afficher un message d'erreur si le produit n'existe pas
        echo "Produit non trouvé.";
    }
} else {
    // Rediriger vers une autre page si l'identifiant du produit n'est pas spécifié dans l'URL
    header("Location: modifieprd.php");
    exit();
}
?>
