<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="manifest" href="manifest.json">

    <title>FORET asbl</title>
  </head>
  <body>
    <?php include("header.php"); ?>
    <main class="main-formations">
      <div class="row main">
        <div class="col-md-5 col-sm-10 contenu offset-md-2 offset-sm-1">
            <button type="button" class="btn btn-light btn-formations" onclick="toggle()">FORM. DE BASE</button>
            <button type="button" class="btn btn-light btn-formations" onclick="toggle2()">FORM. COMMIS DE CUISINE</button>
            <div id="toggle"><?php include("formations-base.php")?></div>
            <div id="toggle2"><?php include("formations-commis.php"); ?></div>
        </div>
        <?php include("menu.php"); ?>
      </div>
    </main>
    <?php include("footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="./gosw.js"></script>
    <script>
      var off = document.getElementById('toggle');
      var off2 = document.getElementById('toggle2');

      function toggle() {
        if (off.style.display = "none") {
            off.style.display = "block";
            off2.style.display = "none";
        } else {
            off.style.display = "none";
        }
      }
      function toggle2() {
        if (off2.style.display = "none") {
            off2.style.display = "block";
            off.style.display = "none";
        } else {
            off.style.display = "none";
        }
      }

    </script>

</body>
</html>
