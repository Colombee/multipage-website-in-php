<?php
if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $expensions= array("jpeg","jpg","png","pdf");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
      }

      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name); //The folder where you would like your file to be saved
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

<!DOCTYPE html>
<html>
<head>
<title>Form</title>
</head>

<body>

<form id='contactus' action='contact.php' enctype="multipart/form-data" method='post'>

<fieldset >
<legend>Contact us</legend>


<div class='container'>

    <label for='email' >Name*:</label><br/>
    <input type="text" id="name" name="name" required /><br>
    <label for='email' >Phone*:</label><br/>
    <input type="text" id="phone" name="phone" required /><br>
    <label for='email' >Email*:</label><br/>
    <input type='text' name='email' id='email' required/><br/>

    <label for='message' >Message:</label><br/>
    <textarea rows="10" cols="50" name='message' id='message'></textarea>
    <br>
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input id="file" name="image" type="file" />
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>
    </body>
</html>
