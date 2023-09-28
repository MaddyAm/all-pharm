<?php session_start()?>
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

<div class="container">
  <div class="row align-items-center">

    <div class="col-11 col-xl-2">
    <?php if(!empty($_SESSION['user'])):?>
      <div class="text-left"><?php echo $_SESSION['user']."<a href='#' class='ml-1'>: connecté(e).</a>" ;?></div>  
      <?php else: ?> 
      <h1 class="mb-0 site-logo"><a href="auth-forms/html/auth-login-basic.php" class="mb-0"> Connectez-vous<span class="text-primary"></span> </a>
    <?php endif; ?>     
    </div>
    <div class="col-12 col-md-10 d-none d-xl-block">
    <nav class="site-navigation position-relative text-right" role="navigation">
        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
          <li><a href="index.php" class="nav-link">Accueil</a></li>
          <li><a href="#work-section" class="nav-link">A propos</a></li>
          <li><a href="#services-section" class="nav-link">Services</a></li>
          <li><?php if ($_SESSION['user'] == 'Admin' ):?><a href="liste_utilisateurs.php"><div> Gérer les utilisateurs</div> </a> <?php  endif;?></li>
          <li><a href="#about-section">Contact</a></li>
          <li><?php if(empty($_SESSION['user'])):?>
            <a href="auth-forms/html/auth-login-basic.php" class="nav-link">Login</a>
            <?php else: ?>
              <a href="auth-forms/html/logout.php" class="text-danger">Se déconnecter ?</a>
            <?php endif; ?> 
          </li>
        </ul>
      </nav>
    </div>

    <?php if(empty($_SESSION['user'])){header('Location: home.php');} ?>
    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

  </div>
</div>

</header>