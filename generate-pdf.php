<?php
require_once('tcpdf.php');

ob_start(); // Start output buffering
// Start session
session_start();

if(isset($_SESSION['invoice_details'])) {
    $id_fact = $_SESSION['invoice_details']['id_fact'];
    $products = $_SESSION['invoice_details']['products'];
    
    // Create new PDF instance
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Facture');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Document Title');
    $pdf->SetSubject('Document Subject');
    $pdf->SetKeywords('Keywords');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Add content to the PDF
    $pdf->Cell(0, 10, 'Facturation  ', 0, 1, 'C');

    $pdf->Write(10, 'Facture ID: ' . $id_fact, '', 0, 'C', true, 0, false, false, 0);

    $pdf->Cell(0, 10, 'Détails de la commande', 0, 1, 'C', 0);

    // Output table headers for cart details
    // $pdf->Cell(50, 10, 'ID produit', 1, 0, 1);
    // $pdf->Cell(30, 10, 'ID client', 1, 0, 1);
    // $pdf->Cell(40, 10, 'Quantite', 1, 0, 1);
    // $pdf->Cell(40, 10, 'Date d Commande', 1, 1, 1);
    // $pdf->Cell(30, 10, 'Reduction', 1, 0, 1);


    // foreach ($products as $product) {

    //     $pdf->Cell(50, 10, $product['id_prd'], 1, 0,'L');
    //     $pdf->Cell(30, 10, $product['id_clt'], 1, 0,'R');
    //     $pdf->Cell(40, 10, $product['quantite'], 1, 0,'R');
    //     $pdf->Cell(40, 10, $product['date_cmd'], 1, 0,'R');
    //     $pdf->Cell(30, 10, $product['reduction'], 1, 1,'R');


    // $tableWidth = 25 * 5;
    // $tableX = ($pdf-> getPageWidth()-$tableWidth) / 2;

    // $pdf->SetXY($tableX, $pdf->GetY());

    $pdf->Cell(40, 10, 'ID produit', 1, 0, 'C');
    $pdf->Cell(30, 10, 'ID client', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Quantite', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Date de Commande', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Reduction', 1, 1, 'C');

    // Output table data
    foreach ($products as $product) {

        // $pdf->SetX($tableX);

        $pdf->Cell(40, 10, $product['id_prd'], 1, 0, 'C');
        $pdf->Cell(30, 10, $product['id_clt'], 1, 0, 'C');
        $pdf->Cell(30, 10, $product['quantite'], 1, 0, 'C');
        $pdf->Cell(40, 10, $product['date_cmd'], 1, 0, 'C');
        $pdf->Cell(30, 10, $product['reduction'], 1, 1, 'C');
    }



    // Output the PDF as a download
    $pdf->Output('example.pdf', 'D');
}else{
    header("Location: index.php");
    exit;
}
ob_end_flush(); 

?>