<?php
// la connexion à la base de données


// Définir les variables et les initialiser 
$nom = $prenom = $adresse = $email = $tele = $adresse = '';
$nom_err = $prenom_err = $adresse_err = $email_err = $tel_err = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty(trim($_POST['nom']))) {
        $nom_err = 'Veuillez entrer votre nom.';
    } else {
        $nom = trim($_POST['nom']);
    }

    
    if(empty(trim($_POST['prenom']))){
        $prenom_err='entrer votre prenom';
    } else{
        $prenom = trim ($_POST['prenom']);
    } 

    
    if(empty(trim($_POST['email']))){
        $email_err='entrer votre email';
    } else{
        $email = trim ($_POST['email']);
    }

}

if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($tele) && !empty($adresse) ) {
    require_once 'config/database.php';

    $sql=$access ->prepare('INSERT INTO client VALUES(null,?,?,?,?)');
    $sql->execute([$nom, $prenom, $adresse, $email, $tele]);
}
   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="css/registre.css">
    <title>Registre</title>
</head>
<body>
        <h2>Registre</h2>
        <p>Remplir ce formulaire </p>
        
        <form action="" method="post">
        <div class="card2">
            <div class="form-group">
                <label>Nom </label>
                <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>">
                <span class="err"><?php echo $nom_err ?></span>
            </div> 
            
            
            <div class="form-group">
                <label>Prenom </label>
                <input type="text" name="prenom" class="form-control" value="<?php echo $prenom; ?>">
                <span class="err"><?php echo $prenom_err ?></span>
                
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">  
                
            </div>  

            <div class="form-group">
                <label>Telephone</label>
                <input type="text" name="telephone" class="form-control" value="<?php echo $tele; ?>">
            </div>  

            <div class="form-group">
                <label>Adresse</label>
                <input type="text" name="adresse" class="form-control" value="<?php echo $adresse; ?>">
            </div>  

            <div class="form-group">
                <input type="submit" value="ajouter">
                <input type="reset"  value="Réinitialiser">
            </div>

            </div>  
        </form>
        
</body>
</html>