<!-- /*
* Template Name: Strategy
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php 
session_start();
if(!empty($_SESSION['user'])){header('Location: index.php');} 
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
  <title></title>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">
    <?php require_once 'Traitements/affichage.php'; ?>

    <header class="site-navbar py-4 js-sticky-header site-navbar-target" >

      <div class="container">
        <div class="row align-items-center">

          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="auth-forms/html/auth-login-basic.php" class="mb-0">Connectez-vous</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#" class="nav-link">Accueil</a></li>
                <li>
                  <a href="#" class="nav-link">Services</a>
                </li>
                <li>
                  <a href="#" class="nav-link">A propos</a>
                </li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                <li><a href="auth-forms/html/auth-login-basic.php" class="nav-link">Login</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

    <div class="particle"></div>
    <!-- <div class="container"> -->
      <div class="site-blocks-cover" style="background-image:url('img_bckgrnd/bck.jpg'); background-size:cover; background-position:center; background-repeat:no-repeat;">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">

              <div class="row justify-content-center mb-4">
                <div class="col-md-10 text-center">
                  <h3><span class="typed-words text-black"></span></h3>
                  <p class="lead mb-5 bg-primary text-white">Achetez et faites-vous livrez vos médicaments facilement en ligne.</a></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div> 

      <section class="site-section" id="blog-section">
        <div class="container">
          <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
              <h2 class="site-section-heading text-center">Pharmacie</h2>
            </div>
          </div>

          <div class="row">
            <?php if (!$rows) : ?>
                 <?php echo "<div class='card-title '> <h4>Aucun médicament n'est disponible pour l'instant."; ?>
              <?php else : ?>
              <?php foreach ($rows as $row) : ?>
                  <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                      <img src="images_publiees\<?= $row['img']; ?>" style="min-width:345px; max-width:345px; min-height:260px; max-height:260px;" alt="Image" class="img-fluid">
                      <h2 class="font-size-regular">Nom: <?=$row['nom'] ; ?></h2>
                      <h6 class="font-size-regular">Prix: <?=$row['prix'] ; ?> XAF,   Stock: <?=$row['quantite'] ; ?> <?=$row['unite'] ; ?></h6>
                      <div class="meta mb-4 text-primary"><?=$row['type'] ; ?> <span class="mx-2">&bullet;</span> Ajouté le: <?=$row['date'] ; ?></div>
                      <p>  Description:<div class="text-left"  style="min-height: 2em; max-height:2em;"> <?=$row['description'] ; ?></div></p>
                        <!-- Option d'ajout au panier pour le/la Client(e) -->
                          <a href="auth-forms/html/auth-login-basic.php"><button type="submit" class="btn btn-secondary text-white" name="command" style="float:left;">Connectez-vous</button></a>
                    </div> 
                  </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </section>

      <!-- Partie footer -->
      <?php include 'header&footer/footer.php'; ?>
      <!-- Partie footer -->


    

    </div> <!-- .site-wrap -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jarallax.min.js"></script>
    <script src="js/jarallax-element.min.js"></script>
    <script src="js/lozad.min.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/three.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/OBJLoader.js"></script>
    <script src="js/ParticleHead.js"></script>

    <script src="js/jquery.sticky.js"></script>

    <script src="js/typed.js"></script>
    <script>
      var typed = new Typed('.typed-words', {
        strings: ["ALL-PHARM", "PAR MADELEINE AMOUGOU"],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 4000,
        startDelay: 1000,
        loop: true,
        showCursor: true
      });
    </script>

    <script src="js/main.js"></script>

    

  </body>
  </html>
