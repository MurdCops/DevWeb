 <?php
   // Afficher les erreurs à l'écran
   ini_set('display_errors', 1);
   // Afficher les erreurs et les avertissements
   error_reporting(E_ALL);
   ob_start();
   ?>

 <h1> Bases de PHP </h1>

 <a class="btn btn--stroke full-width" href="chap/chap1.php">Chapitre 1 - Les premiers pas en PHP</a>
 <a class="btn btn--stroke full-width" href="chap/chap2.php">Chapitre 2 - Les variables</a>
 <a class="btn btn--stroke full-width" href="chap/chap3.php">Chapitre 3 - Les conditions</a>
 <a class="btn btn--stroke full-width" href="chap/chap4.php">Chapitre 4 - Les boucles</a>
 <a class="btn btn--stroke full-width" href="chap/chap5.php">Chapitre 5 - Les tableaux</a>
 <a class="btn btn--stroke full-width" href="chap/chap6.php">Chapitre 6 - Les fonctions</a>
 <a class="btn btn--stroke full-width" href="chap/chap7.php">Chapitre 7 - Passage de données entre pages</a>
 <a class="btn btn--stroke full-width" href="chap/chap8.php">Chapitre 8 - Découpage du code</a>
 <a class="btn btn--stroke full-width" href="chap/chap9.php">Chapitre 9 - Manipulation des données SQL en PHP</a>
  <a class="btn btn--stroke full-width" href="chap/chap10.php">Chapitre 10 - L'authentification, variable de session et cookie</a>



 <?php $content = ob_get_clean(); 
 $base = true;
 ?>

 <?php require('inc/template.php'); ?>