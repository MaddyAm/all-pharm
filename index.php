<!-- /*
* Template Name: Strategy
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->


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
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   <!-- Partie header -->
   <?php include 'header&footer/header.php'; ?>
   <?php require_once 'Traitements/affichage.php'; ?>


    <!-- Partie header -->


    <div class="particle"></div>
    <!-- <div class="container"> -->
      <div class="site-blocks-cover" style="background-image:url('img_bckgrnd/bck.jpg'); background-size:cover; background-position:center; background-repeat:no-repeat;">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">

              <div class="row justify-content-center mb-4">
                <div class="col-md-10 text-center">
                <h2><span class="typed-words text-black"></span></h2>
                  <p class="lead mb-5 text-white bg-primary">Achetez et faites-vous livrez vos médicaments facilement en ligne.</p>
                  <?php
            if (isset($_GET['reg_err'])) {
              $err = htmlspecialchars($_GET['reg_err']);

              switch ($err) {
                case 'err_r':
            ?>
                  <div class="alert alert-danger">
                   <strong>Erreur !</strong>  veuillez remplir tous les champs avant de publier.
                  </div>
                <?php
                  break;

                case 'err_ri':
                ?>
                  <div class="alert alert-danger">
                    Veuillez ajouter une image.
                  </div>
                <?php
                  break;
                case 'err_rv':
                ?>
                  <div class="alert alert-danger">
                    Votre image est trop volumineuse.
                  </div>
                <?php
                  break;
                case 'err_rq':
                ?>
                  <div class="alert alert-danger">
                    Votre image n'est pas de bonne qualité (50Ko minimum).
                  </div>
                <?php
                  break;
                case 'err_re':
                ?>
                  <div class="alert alert-danger">
                    <strong>Erreur! </strong>Extensions autorisées : PNG, JPG, JPEG.
                  </div>
                <?php
                  break;
                case 'err_rt':
                ?>
                  <div class="alert alert-danger">
                    Problème lors du téléchargement de l'image, veuillez réessayer.
                  </div>
            <?php
                  break;

                  case 'err_re':
                    ?>
                      <div class="alert alert-success">
                        Le post a bien été supprimé.
                      </div>
                    <?php
                      break;

                case 'success_delete':
            ?>
                  <div class="alert alert-danger">
                    Le post a bien été supprimé.
                  </div>
            <?php
                  break;

                  case 'success':
                    ?>
                          <div class="alert alert-success">
                            Le post a bien été publié.
                          </div>
                    <?php
                          break;

                          case 'success_edit':
                            ?>
                                  <div class="alert alert-success">
                                    Le post a bien été modifié.
                                  </div>
                            <?php
                                  break;

                                  case 'err_r_edit':
                                    ?>
                                          <div class="alert alert-danger">
                                            <strong>Erreur !</strong> Le post n'a pas été modifié.
                                          </div>
                                    <?php
                                          break;
              }
            }
            ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
      <!-- </div> -->


      <section class="site-section" id="blog-section">
        <div class="container">
          <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
              <h2 class="site-section-heading text-center">Pharmacie</h2>
            </div>
          </div>

          <div class="row">
          <!-- Ajout de médicaments dans la pharmacie -->
          <?php if(($_SESSION['statut'] == 'Administrateur') || ($_SESSION['statut'] == 'pharmacien(ne)')) :?>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
              <div class="h-entry">
              <form action="Traitements/post.php" method="post" enctype="multipart/form-data" class="p-5 bg-white">

                <h2 class="h4 mb-5 text-center">Ajouter un médicament</h2> 
                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" for="nom">Nom</label> 
                    <input type="text" id="nom" class="form-control" name="nom">
                  </div>
                  <div class="col-md-6">
                    <label class="text-black" for="prix">Prix</label>
                    <input type="number" id="prix" class="form-control" name="prix">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" for="quantite">Quantité</label>
                    <input type="number" id="quantite" class="form-control" name="quantite">
                  </div>
                  <div class="col-md-6">
                    <label class="text-black" for="unite">U. Mesure</label>
                    <select name="unite" id="type" class="form-control">
                      <option value="boite(s)">boite</option>
                      <option value="ml">ml</option>
                      <option value="mg">mg</option>
                      <option value="cachet(s)">cachet</option>
                    </select>
                  </div>
                </div>
                <div class="row form-group">

                  <div class="col-md-12">
                    <label class="text-black" for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                      <option value="Sous ordonance">Sous ordonance</option>
                      <option value="Libre">Libre</option>
                    </select>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="description">Description</label> 
                    <textarea type="text" id="description" class="form-control" name="description"></textarea>
                  </div>
                </div>
                  <div class="row form-group">
                   <div class="col-md-12">
                      <input type="file" name="fichier" class="form-control btn-primary" id="formFile">
                    </div>
                  </div>
                <div class="row form-group">
                  <div class="col-md-12">
                  <button type="submit" class="btn btn-primary btn-md text-white" name="add" style="float:left;">Publier</button>
                  </div>
                </div>
              </form>
              </div>
          </div>
          <?php endif; ?>
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
                      <p> Description:<div class="text-left"  style="min-height: 2em; max-height:2em;"> <?=$row['description'] ; ?></div></p>
                        <!-- Option d'ajout au panier pour le/la Client(e) -->

                        <?php if(($_SESSION['statut'] == 'client(e)')) :?>
                        <form action="" method="post">
                          <button type="submit" class="btn btn-secondary text-white" name="command" style="float:left;">Ajouter au panier</button>
                        </form>
                        <?php endif; ?>
                        <!-- Options de modification et suppression pour l'admin et le /la pharmacienne -->
                        <?php if(($_SESSION['statut'] == 'Administrateur') || ($_SESSION['statut'] == 'pharmacien(ne)')) :?>
                        <form action="Traitements/update_post.php?id_post=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
                          <button type="submit" class="btn btn-primary" name="edit" style="float:right;">Modifier</button>
                        </form>

                        <form action="Traitements/delete_post.php?id_post=<?= $row['id']; ?>" method="post">
                          <button type="submit" class="btn btn-danger" name="delete" style="float:left;">Supprimer</button>
                        </form>
                        <?php endif; ?>
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
        strings: ["Welcome"," To ALL-PHARM"],
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
