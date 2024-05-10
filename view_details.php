<?php
session_start();

// Include your database connection file
require_once "config/database.php";

// Check if the invoice ID is provided in the URL
if(isset($_GET['id_fact'])) {
    $id_fact = $_GET['id_fact'];

    // Fetch products details for the given invoice ID
    $sql = "SELECT * FROM commande WHERE id_fact = ?";
    $stmt = $access->prepare($sql);
    $stmt->execute([$id_fact]);
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $_SESSION['invoice_details'] = array(
        'id_fact' => $id_fact,
        'products' => $products
    );
} else {
    // Redirect back to the main page if invoice ID is not provided
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Facture</title>
    <link rel="stylesheet" href="css/view_details.css">
    

</head>
<body>
    <h1>Détails de la Facture</h1>
    <h2>Facture ID: <?= $id_fact ?></h2>

    <table>
        <thead>
            <tr>
                <th>ID produit</th>
                <th>ID client</th>
                <th>Quantité</th>
                <th>Date de Commande</th>
                <th>Réduction</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product['id_prd'] ?></td>
                    <td><?= $product['id_clt'] ?></td>
                    <td><?= $product['quantite'] ?></td>
                    <td><?= $product['date_cmd'] ?></td>
                    <td><?= $product['reduction'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="generate-pdf.php" >facture final</a>
    <a href="commandee.php">retour a la liste</a>

</body>
</html>
