<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil</title>
    <?php include 'style/style.php';?>
</head>
<body>
<?php include 'pages/menu_footer/menu.php';?>

<div class="col md-12 d-flex " >
    <div class="col md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/im7.jpg" class="d-block w-100" height="450px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/im2.jpg" class="d-block w-100" height="450px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/im3.jpg" class="d-block w-100" height="450px" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
    <div class="col md-6"> <br> <br>
      <h1 style="font-family: Lucida Calligraphy ; text-align: center; color: red; font-size: 4em;">Bienvenu à la gestion des patients</h1>
      <h3 style="font-family: Times New Roman; text-align: center;">Amour, acceuil, hospitalité</h3>
    </div>
</div> <br>

      <?php include 'pages/menu_footer/pied.php';?>
      <?php include 'style/script.php';?>   
</body>
</html>