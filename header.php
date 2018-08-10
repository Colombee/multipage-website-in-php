<header>
  <?php $page = basename($_SERVER['PHP_SELF']); ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img class="logo" src="images/logo.png" href="#" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navigation" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item navli <?php echo ($page == "index.php" ? "active" : "");?>">
            <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
          </li>
          <li class="nav-item navli  <?php echo ($page == "formations.php" ? "active" : "");?>">
            <a class="nav-link" href="formations.php">Formations</a>
          </li>
          <li class="nav-item navli  <?php echo ($page == "contact.php" ? "active" : "");?>" id="padding-right-nav">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
    </div>
    <img class="plate-img" src="images/header_plate3.png" alt="plate decoration">
  </nav>
</header>
