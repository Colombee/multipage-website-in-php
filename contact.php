<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(@$_POST['button-submit']){
        $gender = $_POST['gender'];

        $email = $_POST['email'];
        $san_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $val_email = filter_var($san_email, FILTER_VALIDATE_EMAIL);

    };
    function gender(){
        global $gender;
        if(@$gender !== false) {
            return $gender;
        } 
        else {
            return "veuillez indiquer votre genre";
        }
    };
    function val_email(){
        global $val_email;
        if(@$val_email !== false) {
            return $val_email;
        } 
        else {
            return "veuillez indiquer une adresse email valide";
        }
    };
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h2>Contact</h2> 

    <!-- POST METHOD -->
    <form method="post" action="contact.php">
        <input type="radio" name="gender" value="monsieur"> Mr 
        <input type="radio" name="gender" value="madame"> Mme
        <input type="radio" name="gender" value="mademoiselle"> Mlle
        <p style="color:red"><?php echo gender() ?><p>
        Nom :<br>
        <input type="text" name="lastname"><br>
        Prénom :<br>
        <input type="text" name="firstname"><br>
        Email :<br>
        <input type="email" name="email">
        <p style="color:red"><?php echo val_email() ?><p>
        Objet :<br>
        <select name="object-list" form="objects">
            <option value="restaurant">Restaurant</option>
            <option value="formations">Formations</option>
            <option value="opel">Administratif</option>
            <option value="other">Autre</option>
        </select> <br>
        Photo illustrant vos propos : <br>
        <input type="file" name="button-file">
        <br>
        Message : <br>
        <textarea id="textmessage" name="message" style="height:200px"></textarea><br>
        Format de réponse : <br>
        <input type="radio" name="txt" value="html-txt"> HTML
        <input type="radio" name="txt" value="texte-txt"> Texte <br>
        <input type="submit" name="button-submit" value="Envoyer">
    </form> 
    <br>
    
</body>
</html>