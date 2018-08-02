<form method="post" enctype='multipart/form-data' action="contact.php">
    <input type="radio" name="gender" value="monsieur"> Homme
    <input type="radio" name="gender" value="madame"> Femme
    <input type="radio" name="gender" value="sans mention" checked> Non-binaire
    <p style="color:red"><?php  echo gender() ?><p>
    Nom :<br>
    <input type="text" name="lastname">
    <p style="color:red"><?php if (isset($button_submit)) echo remplir($lastname,$button_submit)?><p>
    Prénom :<br>
    <input type="text" name="firstname">
    <p style="color:red"><?php if (isset($button_submit)) echo remplir($firstname,$button_submit)?><p>
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
</form>
