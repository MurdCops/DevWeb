 <?php
  // Afficher les erreurs à l'écran
  ini_set('display_errors', 1);
  // Afficher les erreurs et les avertissements
  error_reporting(E_ALL);
  ob_start();
  ?>
 <h2>4 - Les boucles </h2>

 <p>
   Il existe un concept très important en PHP, il s'agit des <strong>boucles</strong>.<br>
   Cela permet de faciliter la vie, car il faut savoir que les développeurs moins ils en font, mieux ils se portent.<br />
   Par exemple, si on souhaite afficher 10 phrases, on va afficher la phrase 1 puis la phrase 2 puis la phrase 3 ... et enfin la phrase 10<br />
   Le code pourrait ressembler à cela :

 <pre>
        echo "Phrase 1";
        echo "Phrase 2";
        echo "Phrase 3";
        echo "Phrase 4";
        echo "Phrase 5";
        echo "Phrase 6";
        echo "Phrase 7";
        echo "Phrase 8";
        echo "Phrase 9";
        echo "Phrase 10";
    </pre>

 En soit pas trop compliqué mais admettons qu'on souhaite afficher non pas 10 phrases mais 30, 40,100 ou 1000. Ca ferait beaucoup de ligne à afficher de manière répétitive ! <br />
 Avec les boucles, il sera possible de faire la même chose mais seulement avec une seule ligne !!<br />Je vous ai prévenu, les développeurs sont des fainéants dans l'âme ! :)<br />

 </p>

 <h3> Définition </h3>
 <p>
   Les boucles vont permettre d'effectuer un certain nombre de fois les mêmes opérations.
   Il sera possible de répéter autant d'instructions que l'on souhaite et de les arrêter quand on veux selon des conditions. Tant que la condition sera remplie, la boucle continuera.<br />
   <img src="images/boucles.gif"><br>
   D'après le schéma, la boucle suit les étapes suivantes :

 <ol>
   <li>Les instructions dans la boucle vont s'exécuter dans l'ordre ( flèche rouge )</li>
   <li>A la fin des instrustions, on retourne à la première (flèche verte)</li>
   <li>On repasse à l'étape 1</li>
   <li>Puis on repasse à l'étape 2</li>
   <li>etc... jusqu'à que la boucle se termine !</li>
 </ol>



 Il existe en PHP plusieurs types de boucles, on verra dans ce cours que les 2 principales à savoir les boucles <strong>while</strong> et les boucles <strong>for</strong>

 </p>

 <h3> Boucle "Tant que" : while </h3>
 <p>
   Une boucle while s'écrit de la façon suivante: instruction <code>while</code> suivi, entres parenthèses, de la condition à remplir pour que l'instruction ou le bloc d'instructions qui suit soit exécuté.

 <pre>
       <span><</span>?php
            while ($condition) {
                // instructions
        }
      ?>
    </pre>
 On pourrait expliquer la boucle <code>while</code> de cette manière : TANT QUE la condition est remplie ALORS j'exécute les instructions.<br />
 On peut voir qu'il y a des similitude avec les conditions (le chapitre précédent)<br><br>
 Si on reprend l'exemple pour afficher les 10 phrases, ça donnerait ceci :
 <pre>
       <span><</span>?php
            $compteur = 1; 
            while ($compteur <= 10) {
                echo "Phrase ".$compteur;
                $compteur = $compteur + 1; // On incrémente de 1 la valeur du compteur
            }
        ?>
    </pre>
 On pourrait "traduire" ce code par : <br>
 " Je créé une variable $compteur et je lui met la valeur de 1<br>
 Je lance ma boucle : TANT QUE $compteur est inférrieur de 10 <br>
 ALORS j'affiche : Phrase [valeur du compteur]<br>
 J'ajoute 1 à ma variable de $compteur "<br>
 Etc... tant que le $compteur ne soit pas supérieur à 10<br><br>
 Généralement, on utilise la variable <code>$i</code> pour faire le compteur, <code>i</code> pour l'<code>i</code>ncrémentation ! <br />
 Donc on pourrait remplacer <code>$compteur = $compteur + 1;</code> par <code>$i = $i+1;</code> et encore mieux ! On peut simplifier l'écriture par <code>$i++</code> !<br>
 Pour faire l'inverse, réduire de 1 à chaque tour c'est à dire <strong>décrémenter</strong>, on peut l'écrire <code>$i = $i - 1;</code> mais aussi <code>$i--</code> !!
 </p>

 <h3> Boucle "Répéter...Tant que" : do...while </h3>

 <p>L'instruction do est associée au terme while (qui est parfois baptisé until dans d'autres langages que PHP). Elle est similaire à la boucle while à ceci près que les instructions sont exécutées au moins une fois, la condition n'étant testée pour la première fois qu'après exécution des instructions.</p>
 <pre>
<span><</span>?php
    $i = 5;
    do {
        echo $i;
        $i++;
    } while ($i<9);
?>
</pre>


 <h3> Boucle "Pour" : for </h3>
 <p>
   La boucle <code>for</code> fonctionne de manière similaire à la boucle <code>while</code>, à la différence où la boucle while s'arrête dès que la condition n'est plus remplie alors que la boucle <code>for</code> permettra de lancer la boucle d'un point initial à un point final.
 </p>
 <p>

 <pre>
     <span><</span>?php
        for ($initialisation; $condition; $incrémentation) {
            // instructions
        }
        ?>
    </pre>
 L'<strong>initialisation</strong> sera la valeur que l'on donne au compteur au début de la boucle<br>
 La <strong>condition</strong> comme la boucle while permettra de faire tourner la boucle TANT QUE la condition est remplie<br>
 L'<strong>incrémentation</strong> c'est ce qui permet d'ajouter 1 à notre compteur à chaque boucle
 <br><br>
 (+) L'avantage principal de la boucle <code>for</code> par rapport à la boucle <code>while</code>, c'est qu'il sera possible de commencer la boucle à partir de l'indice que l'on veut. A condition biensûr de savoir le nombre de répétitions que l'on souhaite<br>
 De plus, il ne sera pas nécessaire de déclarer une variable <code>$i</code> hors de la boucle et de l'incrémenter dans la boucle !<br>

 Si on reprend à nouveau le code pour afficher les 10 phrases, ça donnerait :
 <pre>
      <span><</span>?php
        for ($i=1; $i <= 10; $i++) {
            echo "Phrase ".$i;
        }
      ?>
    </pre>
 Ici, si on veux "traduire" le code : <br>
 "POUR i de 1 à 10 ( en incrémentant de 1 à chaque tour)<br />
 J'affiche : Phrase [valeur du compteur]"
 <br><br>
 Il est même possible (et c'est souvent très pratique !) de faire des boucles dans des boucles (boucleception!). Ca peut ressembler à quelques choses comem ça, grâce à une deuxième variable de compteur, souvent appelé <code>$j</code>
 <pre>
      <span><</span>?php
        for ($i=0; $i <= 3; $i++) {
          for ($j=0; $j <= 2; $j++) {
            echo $i."-".$j;
            echo '<span><</span>br/>';
          }
        }
      ?>
    </pre>
 Ce qui donnera :<br>
 0-0<br>
 0-1<br>
 0-2<br>
 1-0<br>
 1-1<br>
 1-2<br>
 2-0<br>
 2-1<br>
 2-2<br>
 3-0<br>
 3-1<br>
 3-2<br>
 </p>



 <a class="btn btn--primary full-width" href="../exo/exo4.php">Faire les exercices</a>
 </p>

 <?php $content = ob_get_clean(); ?>
 
 <?php require('../inc/template.php'); ?>