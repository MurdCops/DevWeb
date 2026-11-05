<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);
ob_start();
?>

<h1>Exercices - Découpage des fichiers</h1>
<h2>Exercice 1 :</h2>

<p>Voici le code actuel du TP, tout le code tiens en un seul fichier ;&nbsp;</p>
<pre>
<code class="language-html">&lt;header class="s-header header"&gt;

         &lt;div class="header__logo"&gt;
             &lt;a class="logo" href="index.php"&gt;
                 &lt;p&gt;Cours PHP&lt;/p&gt;
             &lt;/a&gt;
         &lt;/div&gt; &lt;!-- end header__logo --&gt;



         &lt;a class="header__toggle-menu" href="#0" title="Menu"&gt;&lt;span&gt;Menu&lt;/span&gt;&lt;/a&gt;
         &lt;nav class="header__nav-wrap"&gt;

             &lt;h2 class="header__nav-heading h6"&gt;Navigate to&lt;/h2&gt;

             &lt;ul class="header__nav"&gt;
                 &lt;li class="current"&gt;&lt;a href="index.php" title=""&gt;Home&lt;/a&gt;&lt;/li&gt;
                 &lt;li class="has-children"&gt;
                    LISTE DES CHAPITRES
                 &lt;/li&gt;
                 &lt;li class="has-children"&gt;
                     &lt;a href="#0" title=""&gt;Exercices&lt;/a&gt;
                     LISTE DES EXERCICES
                 &lt;/li&gt;

             &lt;/ul&gt; &lt;!-- end header__nav --&gt;

             &lt;a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu"&gt;Close&lt;/a&gt;

         &lt;/nav&gt; &lt;!-- end header__nav-wrap --&gt;

&lt;/header&gt;

&lt;section class="s-featured"&gt;
         &lt;div class="row"&gt;
            LE CONTENU PRINCIPAL
         &lt;/div&gt;
&lt;/section&gt;

&lt;footer class="s-footer"&gt;

 LE FOOTER

&lt;/footer&gt;</code></pre>

<ol>
    <li>Dans un fichier temps r&eacute;cup&eacute;rer ce code est le mettre dans un fichier exo8-tp.php</li>
    <li>Puis cr&eacute;er d&#39;autres fichiers pour le header, main et footer et jouer avec le require_once</li>
    <li>Essayer de d&eacute;couper encore plus finement le header avec la liste des chapitres et la liste des exercices</li>
</ol>
<p>Pour l'instant ne pas utiliser de layout</p>

<h2>Exercice 2 :</h2>
<p>
    Reprendre le TP du chapitre précédent sur le transfert de données et découper en plusieurs fichiers.
</p>

<p>
    <a href="exo8-tp.php">Voir le résultat de l'exercice 1</a><br>
    <a href="exo7.php">Voir le résultat de l'exercice 2</a>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('../inc/template.php'); ?>