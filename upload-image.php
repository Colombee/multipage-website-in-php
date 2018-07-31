<form class="" enctype='multipart/form-data' action="index.php" method="post">
  <!-- definis la taille maximale du fichier -->
  <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
  Send this file <input type="file" name="userfile">
  <input type="submit" name="submit" value="submit">
</form>

<?php
if(isset($_POST['submit'])){
  //le dossier vers où uploader
  $uploaddir = 'uploads/';
  //la destination complete
  $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
  echo '<pre>';
  //le movement du fichier
  //move_uploaded_file($Nomdufichier à uploader, $destination)
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "<img src='$uploadfile' width='15%' alt='lol'>";
  } else {
  echo "Possible file upload attack!\n";
  }
  // var_dump($_FILES);
  // print "</pre>";
};
 ?>
