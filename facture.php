<?php

ob_start(); // Start output buffering
// Start session
session_start();

// Include database configuration file
// require_once "config/database.php";

// Check if the cart exists in the session
if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
    // Return to ventee page if cart is empty
    header("Location: ventee.php");
    exit;
}

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['panier'] as $produit) {
    $prix = isset($produit['prix_apres_remise']) ? $produit['prix_apres_remise'] : $produit['prix'];
    $totalPrice += $prix * $produit['quantite'];
    // $totalPrice += $produit['prix'] * $produit['quantite'];
}

// Include TCPDF library
require_once 'tcpdf.php';

// Create new PDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Commercial');
$pdf->SetAuthor('Commercial');
$pdf->SetTitle('Facture');
$pdf->SetSubject('Informations client et détails de la commande');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Output customer information
$pdf->Cell(0, 10, 'Informations client', 0, 1,'C',0);
$pdf->SetFillColor(75, 149, 161); // Light blue
$pdf->SetTextColor(0, 0, 0); // Black


if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['adresse']) && isset($_SESSION['telephone']) && isset($_SESSION['email'])) {
    // Retrieve the values from session variables

    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $adresse = $_SESSION['adresse'];
    $telephone = $_SESSION['telephone'];
    $email = $_SESSION['email'];

    // Now you can use these variables as needed in your page
    // For example:
    // cell(width,height,valeur,)
    $pdf->Cell(50, 10, "Nom: $nom", 0, 1);
    $pdf->Cell(50, 10, "Prénom: $prenom", 0, 1);
    $pdf->Cell(50, 10, "Adresse: $adresse", 0, 1);
    $pdf->Cell(50, 10, "Téléphone: $telephone", 0, 1);
    $pdf->Cell(50, 10, "Email: $email", 0, 1);
} else {
    // Handle the case when session variables are not set
    echo "Session variables are not set.";
}


// Output cart details

$pdf->Cell(0, 10, 'Détails de la commande', 0, 1, 'C', 0);

// Output table headers for cart details
$pdf->Cell(50, 10, 'Nom Produit', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Quantité', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Prix Unité', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Montant', 1, 1, 'C', 1);

foreach ($_SESSION['panier'] as $produit) {

    $pdf->Cell(50, 10, $produit['nom'], 1, 0,'L');
    $pdf->Cell(30, 10, $produit['quantite'], 1, 0,'R');
    $pdf->Cell(40, 10,  $prix =isset($produit['prix_apres_remise']) ? $produit['prix_apres_remise'] : $produit['prix']. ' DH', 1, 0,'R');
    $pdf->Cell(40, 10, ($prix * $produit['quantite']) . ' DH', 1, 1,'R');
}

// Output total price
$pdf->Cell(0, 10, '', 0, 1); // Add blank line
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell(0, 10, 'Total : ' . $totalPrice . ' DH', 1, 1, 'C', 1);


// Output PDF to browser
$pdf->Output('facture.pdf', 'D');

ob_end_flush(); 



?>
