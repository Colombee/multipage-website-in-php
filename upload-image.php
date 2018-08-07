<?php
if(isset($_FILES['userfile']['name'])){
  //le dossier vers où uploader
  $uploaddir = 'uploads/';
  //la destination complete
  $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
  echo '<pre>';
  //le movement du fichier
  //move_uploaded_file($Nomdufichier à uploader, $destination)
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "<img src='$uploadfile' style='max-width:300px' alt=''>";
  } else {
  echo "Possible file upload attack\n";
  }
  // var_dump($_FILES);
  // print "</pre>";
};
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <div class="custom-file">
      <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
      <input type="file" class="custom-file-input" id="customFile" name="button-file">
      <label class="custom-file-label" for="customFile">Choose file</label>
      <p> <?php if (isset($button_submit)) echo uploadImage(); ?></p>
    </div>
    <form class="" enctype='multipart/form-data' action="upload-image.php" method="post">
      <!-- definis la taille maximale du fichier -->
      <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
      Send this file <input type="file" name="userfile">
      <input type="submit" name="submit" value="submit">
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $("input[type=file]").change(function () {
        var fieldVal = $(this).val();

        // Change the node's value by removing the fake path (Chrome)
        fieldVal = fieldVal.replace("C:\\fakepath\\", "");

        if (fieldVal != undefined || fieldVal != "") {
          $(this).next(".custom-file-label").attr('data-content', fieldVal);
          $(this).next(".custom-file-label").text(fieldVal);
        }

      });
    </script>
  </body>
</html>
