 <?php
    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);
    // Afficher les erreurs et les avertissements
    error_reporting(E_ALL);
    ob_start();
    ?>

 <h1>Exercices - Premiers pas en PHP</h1>
 <p>
     Faire afficher dans un titre de niveau 2 (si besoin : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/Heading_Elements">Documentation sur les titres en HTML</a>) le message suivant : <br />
     Bonjour Marcel, nous sommes le 20/02/2019<br />
     Il est actuellement 11:55<br /><br />

     Remplacer Marcel par votre prénom et bien évidemment il faut afficher la date et l'heure courantes,<br />
     voir la documentation : <a href="http://php.net/manual/fr/function.date.php"> Lien fonction date</a><br /><br />

     S'il y a un problème d'heure et que vous n'êtes pas sur le bon fuseaux horaires<br />
     Il y a 2 solutions : <br />
 <ul>
     <li>
         Changer les paramètres de MAMP :
         <a href="https://clic-en-berry.com/comment-configurer-date-timezone-php/">Lien tutoriel</a>
     </li>
     <li>
         Ou forcer en PHP le fuseau horaire :
         <a href="http://php.net/manual/fr/function.date-default-timezone-set.php"> Lien fonction date default timezone</a>
     </li>
 </ul>
 </p>

 <strong> Résultat : </strong>


 <?php

    // Votre code ici



date_default_timezone_set('Europe/Paris');
     
$script_tz = date_default_timezone_get();
$ini_tz = ini_get('date.timezone');



echo "<h1>" . date("d/m/Y") . " il est actuellement " . date("H:i") . "</h1>";
echo "<h2>" . "Bonjour Marcel, nous sommes le 20/02/2019
Il est actuellement 11h55". "</h2>";




    ?>





 <?php $content = ob_get_clean(); ?>

 <?php require('../inc/template.php'); ?>