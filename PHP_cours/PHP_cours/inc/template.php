 <?php
    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);

    // Afficher les erreurs et les avertissements
    error_reporting(E_ALL);

    $path = (isset($base) && $base) ? "" : "../";
    ?>
 <!DOCTYPE html>
 <html class="no-js" lang="en">

 <head>

     <!--- basic page needs
    ================================================== -->
     <meta charset="utf-8">
     <title>Bases de PHP</title>
     <meta name="description" content="">
     <meta name="author" content="">

     <!-- mobile specific metas
    ================================================== -->
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <!-- CSS
    ================================================== -->
     <link rel="stylesheet" href="<?= $path; ?>css/base.css">
     <link rel="stylesheet" href="<?= $path; ?>css/vendor.css">
     <link rel="stylesheet" href="<?= $path; ?>css/main.css">
     <link rel="stylesheet" href="<?= $path; ?>css/style.css">

     <!-- script
    ================================================== -->
     <script src="<?= $path; ?>js/modernizr.js"></script>

     <!-- favicons
    ================================================== -->
     <link rel="shortcut icon" href="<?= $path; ?>favicon.ico" type="image/x-icon">
     <link rel="icon" href="<?= $path; ?>favicon.ico" type="image/x-icon">

 </head>

 <body id="top">

     <!-- preloader
    ================================================== -->
     <div id="preloader">
         <div id="loader" class="dots-fade">
             <div></div>
             <div></div>
             <div></div>
         </div>
     </div>


     <!-- header
    ================================================== -->
     <header class="s-header header">

         <div class="header__logo">
             <a class="logo" href="<?= $path; ?>index.php">
                 <p>Cours PHP</p>
                 <?php


                    if (isset($title)) {
                        echo $title;
                    } ?>
             </a>
         </div> <!-- end header__logo -->



         <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
         <nav class="header__nav-wrap">

             <h2 class="header__nav-heading h6">Navigate to</h2>

             <ul class="header__nav">
                 <li class="current"><a href="<?= $path; ?>index.php" title="">Home</a></li>
                 <li class="has-children">
                     <a href="#0" title="">Chapitres</a>
                     <ul class="sub-menu">
                         <li><a href="<?=$path;?>chap/chap1.php">Les premiers pas en PHP</a></li>
                         <li><a href="<?=$path;?>chap/chap2.php">Les variables</a></li>
                         <li><a href="<?=$path;?>chap/chap3.php">Les conditions</a></li>
                         <li><a href="<?=$path;?>chap/chap4.php">Les boucles</a></li>
                         <li><a href="<?=$path;?>chap/chap5.php">Les tableaux</a></li>
                         <li><a href="<?=$path;?>chap/chap6.php">Les fonctions</a></li>
                         <li><a href="<?=$path;?>chap/chap7.php">Passages de données entre pages</a></li>
                         <li><a href="<?=$path;?>chap/chap8.php">Découpage du code</a></li>
                         <li><a href="<?=$path;?>chap/chap9.php">Manipulation des données SQL en PHP</a></li>
                         <li><a href="<?=$path;?>chap/chap10.php">L'authentification, variable de session et cookie</a></li>

                     </ul>
                 </li>
                 <li class="has-children">
                     <a href="#0" title="">Exercices</a>
                     <ul class="sub-menu">
                         <li><a href="<?=$path;?>exo/exo1.php">Les premiers pas en PHP</a></li>
                         <li><a href="<?=$path;?>exo/exo2.php">Les variables</a></li>
                         <li><a href="<?=$path;?>exo/exo3.php">Les conditions</a></li>
                         <li><a href="<?=$path;?>exo/exo4.php">Les boucles</a></li>
                         <li><a href="<?=$path;?>exo/exo5.php">Les tableaux</a></li>
                         <li><a href="<?=$path;?>exo/exo6.php">Les fonctions</a></li>
                         <li><a href="<?=$path;?>exo/exo7.php">Passages de données entre pages</a></li>
                         <li><a href="<?=$path;?>exo/exo8.php">Découpage du code</a></li>
                         <li><a href="<?=$path;?>exo/exo9.php">Manipulation des données SQL en PHP</a></li>
                         <li><a href="<?=$path;?>exo/exo10.php">Authentification et session</a></li>

                     </ul>
                 </li>

             </ul> <!-- end header__nav -->

             <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

         </nav> <!-- end header__nav-wrap -->

     </header> <!-- s-header -->

     <!-- featured 
    ================================================== -->
     <section class="s-featured">
         <div class="row">

             <?= $content ?>

         </div>
     </section> <!-- end s-featured -->

     <!-- s-footer
    ================================================== -->
     <footer class="s-footer">

         <div class="s-footer__bottom">
             <div class="row">

                 <div class="col-six">
                     Antoine DE CONTO Copyright &copy;<script>
                         document.write(new Date().getFullYear());
                     </script>
                 </div>

             </div>
         </div> <!-- end s-footer__bottom -->

         <div class="go-top">
             <a class="smoothscroll" title="Back to Top" href="#top"></a>
         </div>

     </footer> <!-- end s-footer -->


     <!-- Java Script
    ================================================== -->
     <script src="<?= $path; ?>js/jquery-3.2.1.min.js"></script>
     <script src="<?= $path; ?>js/plugins.js"></script>
     <script src="<?= $path; ?>js/main.js"></script>

 </body>

 </html>