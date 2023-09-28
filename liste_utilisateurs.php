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
   <?php
 if($_SESSION['statut'] !== 'Administrateur'){
  header('Location: index.php');
} ?>
    <!-- Partie header -->
    <div class="particle"></div>
    <section>
        <?php
        require_once 'Traitements/config.php';
        if (isset($_SESSION['user'])) {

            $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE nom != "' . $_SESSION['user'] . '"');
            $req->execute();
            $rows = $req->fetchAll();
        }

        ?>
    </section>
    <!--================ Start banner Area =================-->

    <!--================ End banner Area =================-->

    <!--================ Start Blog Post Area =================-->

    <?php
    if (isset($_GET['reg_err'])) {
        $err = htmlspecialchars($_GET['reg_err']);

        switch ($err) {
            case 'success_delete':
    ?>
                <script>
                    alert("Utilisateur supprimé!");
                </script>
            <?php
                break;
            case 'success_blq':
            ?>
                <script>
                    alert("Utilisateur bloqué !");
                </script>
            <?php
                break;
            case 'success_dblq':
            ?>
                <script>
                    alert("Utilisateur débloqué !");
                </script>
            <?php
                break;
            case 'faill_blq':
            ?>
                <script>
                    alert("Utilisateur non bloqué !");
                </script>
            <?php
                break;
            case 'faill_delete':
            ?>
                <script>
                    alert("Erreur lors de la suppréssion, veuillez réessayer !");
                </script>
                
              <?php
              break;
            case 'success_upgrade':
              ?>
                  <script>
                      alert("Le statut de l'utilisateur a été changé !");
                  </script>
            <?php
              break;
            case 'faill_upgrade':
            ?>
                  <script>
                      alert("Erreur, veuillez réessayer !");
                  </script>
            <?php
        }
    }
    ?>




      <section class="site-section" id="blog-section">
  <div class="container mt-5">
            <div class="container" id="work_section">
            </div>
            <?php if (!$rows) : ?>
                <div class="container">
                    <div class="alert alert-warning">
                        Aucun compte à gerer pour l'instant.
                    </div>
                </div>
            <?php else : ?>
                <div class="container">
                    <div class="card-title ">
                        <span>
                            <h4>Voici l'ensemble des comptes</h4>
                        </span>
                    </div>
                </div>
                <br>
                <?php foreach ($rows as $row) : ?>
                    <div class="container ">
                        <div class="alert btn-primary text-left">
                            <h5 class="text-white">
                                Nom: <?= $row['nom']; ?>
                            </h5>
                            <h6>
                                Email: <?= $row['email']; ?>
                            </h6>
                            <h6>
                                Téléphone: <?= $row['telephone']; ?>
                            </h6>
                            <h6>
                                Localisation: <?= $row['localisation']; ?>
                            </h6>
                            <h6 style="float:right;">
                                Etat: <?= $row['etat']; ?>
                            </h6>
                            <h6 style="float:left;">
                                Statut: <?= $row['statut']; ?>
                            </h6>
                            <br>
                        </div>
                    </div>
                    <div class="container mb-5">
                        <div style="margin-top:1em; position:relative;">
                            <?php if($row['etat']== "bloqué") :?>
                            <form action="Traitements/unlock_user.php?id_user_blq=<?= $row['id']; ?>" method="POST">
                                <button type="submit" class="btn btn-warning text-white" name="debloquer" style="float:right;">
                                Débloquer 
                                </button>
                            </form>
                            <?php else:?>
                            <form action="Traitements/lock_user.php?id_user_blq=<?= $row['id']; ?>" method="POST">
                            <span>
                                    <button type="submit" class="btn btn-success mr-2 text-white" name="bloquer" style="float:right;">
                                        Bloquer 
                                    </button>
                            </form>
                            </span>
                            <?php endif; ?>
                            
                            <span>
                            <?php if($row['statut'] !== "pharmacien(ne)") :?>

                            <div>
                            <form action="Traitements/upgrade_user.php?id_user=<?= $row['id']; ?>" method="POST">
                                <button type="submit" class="btn btn-primary mr-2" name="upgrade" style="float:right;">
                                    Nommer admin
                                </button>
                            </form>
                            <?php else:?>
                            <form action="Traitements/downgrade_user.php?id_user=<?= $row['id']; ?>" method="POST">
                              <button type="submit" class="btn btn-primary mr-2" name="upgrade" style="float:right;">
                                    Retirer les droits
                                </button>
                            </form>
                            <?php endif; ?>
                            </div>
                            </span>
                            <span>
                            <form action="Traitements/delete_user.php?id_user=<?= $row['id']; ?>" method="POST">
                            <div>
                                <button type="submit" class="btn btn-danger" name="delete" style="float:left;">
                                    Supprimer 
                                </button>
                            </div>
                            </form>
                            </span>
                        </div>
                    </div>
                    <br>
                <?php endforeach ?>
                <div class="container">
                    <div class="alert alert-warning">
                        Vous avez atteint le bas de la liste. <a href="#work_section" class="link">Cliquez ici pour remonter</a>
                    </div>
                </div>
            <?php endif ?>
        </div>
      </section>

      


    

    </div> <!-- .site-wrap -->
<!-- Partie footer -->
      <?php include 'header&footer/footer.php'; ?>
      <!-- Partie footer -->
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
        strings: ["Web Apps"," WordPress"," Mobile Apps"],
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
