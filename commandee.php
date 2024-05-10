<?php
session_start();

// Include your database connection file
require_once "config/database.php";

// Fetch all orders from the database
$stmt = $access->query("SELECT * FROM commande");
$commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes</title>
    

    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 2.6;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table td, table th {
        border-radius: 3px;
        background-color: teal;
        padding: 8px;
    }

    table th {
        color:white;
        background-color: #574b4b;
        text-align: center;
    }

    table a {
        display: inline-block;
        background-color: #B24817;
        transition: background-color 0.3s;
        text-decoration: line;
        color: white;
    }
    </style>
</head>
<body>
    <h1>Liste des Commandes</h1>

    
    <table>
        <thead>
            <tr>
                <th>ID produit</th>
                <th>ID client</th>
                <th>ID facture</th>
                <th>Quantité</th>
                <th>Date de Commande</th>
                <th>Réduction</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande) : ?>
                <tr>
                    <td><?= $commande['id_prd'] ?></td>
                    <td><?= $commande['id_clt'] ?></td>
                    <td style="background-color:A02020;"><?= $commande['id_fact'] ?></td>
                    <td><?= $commande['quantite'] ?></td>
                    <td><?= $commande['date_cmd'] ?></td>
                    <td><?= $commande['reduction'] ?></td>
                    <td><a href="view_details.php?id_fact=<?= $commande['id_fact'] ?>">View Details</a></td> 
                
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>
</html>
