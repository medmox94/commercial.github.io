<?php

session_start();

require_once "config/database.php";

// Check if the cart exists in the session
if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
    // returne to ventee
    header("Location: ventee.php");
    exit;
}

// client registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Validate and process the form data here
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];


    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['adresse'] = $adresse;
    $_SESSION['telephone'] = $telephone;
    $_SESSION['email'] = $email;
    



    // Insert client data into the database
    $stmt = $access->prepare("INSERT INTO client (id_clt,nom_clt, prenom_clt, adresse,telephone,email) VALUES (null,?,?,?,?,?)");
    $result = $stmt->execute([$nom,$prenom,$adresse,$telephone,$email]);
       

    if ($result) {
    
        $client_id = $access->lastInsertId();

        


        // require __DIR__ . '/vendor/autoload.php';

        // // Your Account SID and Auth Token from console.twilio.com
        // $sid = "AC355dfb359b795d75652a145fd0f97202";
        // $token = "887e26dd366080380997e10a8edc9338";
        // $client = new Twilio\Rest\Client($sid, $token);

        
        // $message_body = "Bonjour $prenom $nom, votre achat a été complété avec succès.";
        // $recipient_phone_number = $_POST['telephone'];
        
        // // Use the Client to make requests to the Twilio REST API
        // $client->messages->create(
        //     // The number you'd like to send the message to
        //     $recipient_phone_number,
        //     [
        //         // A Twilio phone number you purchased at https://console.twilio.com
        //         'from' => '+17176224918',
        //         // The body of the text message
        //         'body' => $message_body
        //     ]);

        $totalPrice = 0;
        foreach ($_SESSION['panier'] as $produit) {
            $prix = isset($produit['prix_apres_remise']) ? $produit['prix_apres_remise'] : $produit['prix'];
            $totalPrice += $prix * $produit['quantite'];
            // $totalPrice += $produit['prix'] * $produit['quantite'];
        }

        // $discountPercentage = $_POST['discount']; // reduction de input
        // $discountAmount = ($totalPrice / 100) * $discountPercentage; // calculate rprix apres reduction
        // $totalPriceWithDiscount = $totalPrice - $discountAmount;


        // Insert facture data into the database
        $date_fact = date('Y-m-d');
        $etat = "en cours";

        $stmt = $access->prepare("INSERT INTO facture (id_fact, id_clt, date_fact, etat, montant_tota) VALUES (null,?,?,?,?)");
        $result2 = $stmt->execute([$client_id, $date_fact, $etat, $totalPrice ]);
        
        

        if ($result2) {
        
            $facture_id = $access->lastInsertId();
        
            $date_cmd = date('Y-m-d');
            foreach ($_SESSION['panier'] as $produit) {
                $id_prd = $produit['id_prd'];
                $quantite = $produit['quantite'];
                $reduction = 0; 
                $stmt = $access->prepare("INSERT INTO commande (id_prd, id_clt, id_fact, quantite, date_cmd, reduction) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$id_prd, $client_id, $facture_id, $quantite, $date_cmd, $reduction]);
            }
        } else {
            echo "insere non valide";
        }

        // $_SESSION['prix_produit'] = $prix_apres_remise;

        // Redirect to some page after insertion
        header("Location: facture.php");
        exit;

} else {
    // Insertion failed
    echo "isere nn valide.";

}
header("Location: facture.php");

}
$totalPrice = 0;
    foreach ($_SESSION['panier'] as $produit) {
        $prix = isset($produit['prix_apres_remise']) ? $produit['prix_apres_remise'] : $produit['prix'];
        $totalPrice += $prix * $produit['quantite'];
    }

    // $totalPriceProduct = $_SESSION['total_price'];
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fact.css">
    <title>Facturation</title>
     
</head>
<body>
    <h1>Informations client</h1>

    <!-- registre infos client -->
    <form method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required><br>
        <label for="adresse">Telephone :</label>
        <input type="number" id="telephone" name="telephone" required><br>

        <label for="adresse">Email :</label>
        <input type="text" id="email" name="email"><br>

        
        <input type="submit" name="register" value="Enregistrer et passer à la facturation">
    </form>

    


    <div class="details">
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>

                </tr>
                <?php foreach ($_SESSION['panier'] as $produit) : ?>
                    <tr>
                        <td><?= $produit['nom'] ?></td>
                        <td><?= $produit['quantite'] ?></td>
                        <td><?= isset($produit['prix_apres_remise']) ? $produit['prix_apres_remise'] : $produit['prix']?> DH</td>
                        
                    </tr>
                <?php endforeach; ?>
                <tr class="total">
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong><?= $totalPrice ?> DH</strong></td>
                </tr>
            </table>
    </div>
</body>
</html>
