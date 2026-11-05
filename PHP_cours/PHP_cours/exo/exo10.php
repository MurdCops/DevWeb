<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);
ob_start();
?>

<h1>Exercices chap 10 - Authentification</h1>
<p>&nbsp;</p>
<h2>Partie 1 :&nbsp;</h2>
<p>Reprendre le TP 9 avec une table user en plus</p>
<p>&nbsp;</p>
<h2>Partie 2 :&nbsp;</h2>
<p>Sur la page d'accueil lister les données à nouveau.&nbsp;</p>
<p>On se sera pas obligé de se connecter pour voir les données.</p>
<p>Reprendre la forme de tableau de Flowbite : <a target="_blank" rel="noopener noreferrer" href="https://flowbite.com/docs/components/tables/">https://flowbite.com/docs/components/tables/</a></p>
<p>&nbsp;</p>
<h2>Partie 3 :&nbsp;</h2>
<p>Créer une page admin qui sera accessible que pour les personnes connectées.</p>
<p>Dans cette page admin, on pourra faire l'ajout, la modification et la suppression des données mais via l'interface !</p>
<p>Prendre la forme des formulaire de Flowbite : <a target="_blank" rel="noopener noreferrer" href="https://flowbite.com/docs/components/forms/">https://flowbite.com/docs/components/forms/</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
 <?php $content = ob_get_clean(); ?>

 <?php require('../inc/template.php'); ?>