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

    function remplir($i,$j,$button_submit){
      if(!empty($i) AND !empty($j)){
        return $i . $j;
      } else {
        return "Veuillez remplir les champs précédent";
      }
    }

    function gender(){
        global $gender;
        if($gender !== false) {
            return $gender;
        } else {
            return "Veuillez indiquer votre genre";
        }
    }

    function val_email(){
        global $val_email;
        if($val_email !== false) {
            return $val_email;
        } else {
            return "Veuillez indiquer une adresse email valide";
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
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php include("header.php"); ?>
    <main>
      <div class="row main">
        <div class="col-5 contenu offset-2">
          <h2>Contact</h2>
          <!-- POST METHOD -->
          <form method="POST" action="contact.php">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name="lastname" placeholder="*Last name"/>
              </div>
              <div class="col">
                <input type="text" class="form-control" name='firstname' placeholder="*First name" />
              </div>
            </div>
            <p style="color:red"><?php if (isset($button_submit)) echo remplir($firstname,$lastname,$button_submit);?><p>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="Monsieur">
              <label class="custom-control-label" for="customRadioInline1">Homme</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="Madame">
              <label class="custom-control-label" for="customRadioInline2">Femme</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline3" name="gender" class="custom-control-input" value="Sans mention" checked>
              <label class="custom-control-label" for="customRadioInline3">Non-binaire</label>
            </div>
            <p style="color:red"><?php echo gender() ?><p>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="*Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <p style="color:red"><?php echo val_email(); ?><p>
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
              <p> <?php if (isset($button_submit)) echo uploadImage(); ?></p>
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
          <br>
        </div>
        <?php include("menu.php"); ?>
      </div>
    </main>
    <?php include("footer.php"); ?>
    <script type="text/javascript">
      // $("input[type=file]").change(function () {
      //   var fieldVal = $(this).val();
      //
      //   // Change the node's value by removing the fake path (Chrome)
      //   fieldVal = fieldVal.replace("C:\\fakepath\\", "");
      //
      //   if (fieldVal != undefined || fieldVal != "") {
      //     $(this).next(".custom-file-label").attr('data-content', fieldVal);
      //     $(this).next(".custom-file-label").text(fieldVal);
      //   }
      //
      // });
    </script>
  </body>
</html>
