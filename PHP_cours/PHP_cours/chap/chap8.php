<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);
ob_start();
?>

<h2>8 - D&eacute;coupage du code</h2>



<p>Actuellement on a pu voir qu&#39;on faisait notre code PHP dans un seul et m&ecirc;me fichier, mais cela est une mauvaise pratique &agrave; long terme car le fichier sera de plus en plus moins et donc il deviendra <strong>moins maintenable</strong>.</p>

<p>C&#39;est pourquoi en programmation, on aime bien <strong>d&eacute;couper la logique de notre code en plusieurs fichiers</strong> !&nbsp;</p>

<p>Tout cela est rendu en PHP gr&acirc;ce aux fonctions <strong>include </strong>ou <strong>require </strong>et leurs d&eacute;clinaisons :</p>

<ul>
    <li><strong>include </strong>:&nbsp;Permet de charger un fichier PHP . Si ce dernier n&#39;existe pas, <strong>aucune erreur ne sera lev&eacute;e (</strong>seul un warning sera d&eacute;clench&eacute; et la suite du code va s&#39;ex&eacute;cuter normalement)</li>
    <li><strong>require </strong>:&nbsp;Permet de charger un fichier PHP. En revanche, si le fichier n&#39;existe pas <strong>une erreur sera lev&eacute;e</strong>.</li>
    <li><strong>require_once</strong>&nbsp;et&nbsp;<strong>include_once</strong>&nbsp;: Permettent de s&#39;assurer que les fichiers ne sont import&eacute;s qu&#39;une seule fois.</li>
</ul>

<p>Parmi toutes ces m&eacute;thodes, la plus conseill&eacute;e est le <strong>require_once</strong>, elle assurera une meilleure s&eacute;curis&eacute; et ma&icirc;trise dans le code, m&ecirc;me si c&#39;est la plus <strong>rigoureuse </strong>!&nbsp;</p>

<p>On va l&#39;&eacute;crire de cette mani&egrave;re :<strong> require_once(nomDuFichier.php)</strong>, ici voici l&#39;exemple avec le fichier header.php :&nbsp;</p>

<pre>
<code class="language-php">&lt;?php

    require_once('header.php');

?&gt;</code></pre>



<h2>Chemin absolu et chemin relatif</h2>

<p>D&egrave;s que l&#39;on commence a utiliser des fichiers php qui importent via require() ou include()&nbsp;d&#39;autres fichiers php qui eux m&ecirc;me importent des fichiers via require() ou include(), il n&#39;est plus possible d&#39;utiliser des chemins relatifs de fa&ccedil;on intuitive.</p>



<p>Deux logiques sont possibles :</p>

<h3>Chemin relatif avec &quot;__DIR__&quot; :</h3>

<p>__DIR__ est ce qu&#39;on appelle une <strong>constante magique </strong>en PHP !</p>

<p><strong>__DIR__</strong>&nbsp;vous assure que votre <strong>point de d&eacute;part</strong> est bien le <strong>script php depuis lequel vous faites l&#39;import</strong> :</p>

<pre>
<code class="language-php">&lt;?php 

    require_once(__DIR__.'/../inc/footer.php');

?&gt;</code></pre>

<?php echo __DIR__; ?>



<h3>Chemin absolu avec &quot;$_SERVER[&#39;DOCUMENT_ROOT&#39;]&quot;&nbsp;:</h3>

<p>&quot;<strong>$_SERVER[&#39;DOCUMENT_ROOT&#39;]</strong>&quot;&nbsp;vous assure que votre<strong> point de d&eacute;part est bien la racine de votre site web</strong> :</p>

<pre>
<code class="language-php">&lt;?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/../project/inc/footer.php');

?&gt;</code></pre>

<?php echo $_SERVER['DOCUMENT_ROOT']; ?>



<p><em><strong>==&gt; Dans la plupart des cas, &ccedil;a sera le chemin relatif qui sera utilis&eacute; !</strong></em></p>



<h2>Exemple&nbsp;</h2>

<p>Si on a un fichier main.php :&nbsp;</p>

<pre>
<code class="language-php">&lt;?php 

    echo "&lt;h1&gt;Ceci est la partie main du site&lt;/h1&gt;";

?&gt;

&lt;p&gt;Et là le texte de la main partie&lt;/p&gt;</code></pre>



<p>Dans le fichier principal index.php on peut avoir &ccedil;a :&nbsp;</p>

<pre>
<code class="language-php">&lt;header&gt;L'entête de mon site&lt;/header&gt;

&lt;main&gt;
&lt;?php 

    require_once(__DIR__."/main.php");

?&gt;
&lt;/main&gt;

&lt;footer&gt;Et là mon pied de page&lt;/footer&gt;</code></pre>



<p>Lorsque que le PHP va compiler son code en HTML &ccedil;a donnera &ccedil;a :&nbsp;</p>



<pre>
<code class="language-html">&lt;header&gt;L'entête de mon site&lt;/header&gt;

&lt;main&gt;

    &lt;h1&gt;Ceci est la partie main du site&lt;/h1&gt;
    &lt;p&gt;Et là le texte de la main partie&lt;/p&gt;

&lt;/main&gt;

&lt;footer&gt;Et là mon pied de page&lt;/footer&gt;</code></pre>

<p> Pour aller plus loin, on pourra plus tard utiliser la notion de <strong>layout</strong> ou <strong>template</strong> qui sera très très utile !! Et tout cela à l'iade de fonctions telles que <code>ob_start</code> et <code>ob_get_clean()</code>
<p>
    <a class="btn btn--primary full-width" href="../exo/exo8.php">Faire les exercices</a>
</p>


<?php $content = ob_get_clean(); ?>
 <?php require('../inc/template.php'); ?>