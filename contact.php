<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

     if (isset($_POST['button-submit'])){
      $button_submit = $_POST['button-submit'];
     }

    if (isset($button_submit)){
        $gender = $_POST['gender'];

        $lastname = $_POST['lastname'];
        $san_lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
        // $val_lastname = filter_var($lastname, FILTER_VALIDATE_EMAIL);

        $firstname = $_POST['firstname'];
        $san_firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
        // $val_firstname = filter_var($firstname, FILTER_VALIDATE_EMAIL);

        $email = $_POST['email'];
        $san_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $val_email = filter_var($san_email, FILTER_VALIDATE_EMAIL);
    }

    function uploadImage($value='') {
      if (isset($_FILES['button-file']['name'])) {
        //le dossier vers où uploader
        $uploaddir = 'uploads/';
        //la destination complete
        $uploadfile = $uploaddir . basename($_FILES['button-file']['name']);
        //le movement du fichier
        //move_uploaded_file($Nomdufichier à uploader, $destination)
        if (move_uploaded_file($_FILES['button-file']['tmp_name'], $uploadfile)) {
        // return "<img src='$uploadfile' style='max-width:300px' alt=''>";
        return "Fichier uploadé avec succès.";
        } else {
        return "Aucun fichier à uploader.\n";
        }
        // var_dump($_FILES);
      }
    }

    function remplir($i,$button_submit){
      if(!empty($i)){
        return $i;
      } else {
        return "veuillez remplir le champs précédent";
      }
    }

    function gender(){
        global $gender;
        if($gender !== false) {
            return $gender;
        } else {
            return "veuillez indiquer votre genre";
        }
    }

    function val_email(){
        global $val_email;
        if($val_email !== false) {
            return $val_email;
        } else {
            return "veuillez indiquer une adresse email valide";
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include("header.php"); ?>
    <main>
      <div class="row main">
        <div class="col-5 contenu offset-2">
          <h2>Contact</h2>

          <!-- POST METHOD -->
          <form method="post" enctype='multipart/form-data' action="contact.php">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name"firstname" placeholder="First name">
              </div>
              <p style="color:red"><?php if (isset($button_submit)) echo remplir($firstname,$button_submit);?><p>
              <div class="col">
                <input type="text" class="form-control" name="lastname" placeholder="Last name">
              </div>
              <p style="color:red"><?php if (isset($button_submit)) echo remplir($lastname,$button_submit)?><p>
            </div>
            <br>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="monsieur">
              <label class="custom-control-label" for="customRadioInline1">Homme</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="madame">
              <label class="custom-control-label" for="customRadioInline2">Femme</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline3" name="gender" class="custom-control-input" value="sans mention" checked>
              <label class="custom-control-label" for="customRadioInline3">Non-binaire</label>
            </div>
            <p style="color:red"><?php echo gender() ?><p>
            <br>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <p style="color:red"><?php echo val_email(); ?><p>
            <br>
            <select class="custom-select" name="object-list">
              <option selected>Objet</option>
              <option value="restaurant">Restaurant</option>
              <option value="formations">Formations</option>
              <option value="opel">Administratif</option>
              <option value="other">Autre</option>
            </select>
            <br><br>
            <div class="custom-file">
              <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
              <input type="file" class="custom-file-input" id="customFile" name="button-file">
              <label class="custom-file-label" for="customFile">Choose file</label>
              <?php if (isset($button_submit)) echo uploadImage() ?>
            </div>
            <br> <br>
            <div class="form-group">
              <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Message"></textarea>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline4" name="txt" value="html-txt" class="custom-control-input"checked>
              <label class="custom-control-label" for="customRadioInline4">HTML</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline5" name="txt" value="texte-txt" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline5">Texte</label>
            </div>
            <br> <br>
            <button type="submit" name="button-submit" class="btn btn-primary">Envoyer</button>
          </form>
          <!-- <form method="post" enctype='multipart/form-data' action="contact.php">
              <input type="radio" name="gender" value="monsieur"> Homme
              <input type="radio" name="gender" value="madame"> Femme
              <input type="radio" name="gender" value="sans mention" checked> Non-binaire
              <p style="color:red"><?php  echo gender() ?><p>
              Nom :<br>
              <input type="text" name="lastname">
              <p style="color:red"><?php if (isset($button_submit)) echo remplir($lastname,$button_submit)?><p>
              Prénom :<br>
              <input type="text" name="firstname">
              <p style="color:red"><?php if (isset($button_submit)) echo remplir($firstname,$button_submit);?><p>
              Email :<br>
              <input type="email" name="email">
              <p style="color:red"><?php echo val_email(); ?><p>
              Objet :<br>
              <select name="object-list" form="objects">
                  <option value="restaurant">Restaurant</option>
                  <option value="formations">Formations</option>
                  <option value="opel">Administratif</option>
                  <option value="other">Autre</option>
              </select> <br>
              <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
              Photo illustrant vos propos : <br>
              <input type="file" name="button-file">
              <br>
              <?php if (isset($button_submit)) echo uploadImage() ?>
              <br>
              Message : <br>
              <textarea id="textmessage" name="message" style="height:200px"></textarea><br>
              Format de réponse : <br>
              <input type="radio" name="txt" value="html-txt"> HTML
              <input type="radio" name="txt" value="texte-txt"> Texte <br>
              <input type="submit" name="button-submit" value="Envoyer">
          </form> -->
          <br>
        </div>
        <?php include("menu.php"); ?>
      </div>
    </main>
    <?php include("footer.php"); ?>
  </body>
</html>
