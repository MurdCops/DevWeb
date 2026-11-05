 <?php
   // Afficher les erreurs à l'écran
   ini_set('display_errors', 1);
   // Afficher les erreurs et les avertissements
   error_reporting(E_ALL);
   ob_start();
   ?>

 <h2>1 - Les premiers pas en PHP</h2>
 <h3> Ajouter du PHP</h3>
 <p>
    Chaque instruction PHP doit commencer par <code><span>
          << /span>?php</code> et finir par <code>?></code>
 </p>


 <h3> Les commentaires</h3>
 <p> Pour ajouter une ligne de commentaire
    <code> // Je suis une ligne de commentaire</code>
 </p>
 <p> Pour ajouter un bloc de commentaire
 <pre>/* Je suis un bloc entier 
        de commentaire */</pre>
 </p>

 <h3> Afficher des valeurs </h3>
 <p> Méthode 1 : on écrit dans le PHP mais c'est pas pratique pour le HTML
 <pre> <span><</span><span>?php echo "&lt;strong&gt;Marcel Pagnol&lt;/strong&gt;"; ?></span></pre>
 Résultat :

 <a href='http://www.google.fr'>
    <?php

      echo "Marcel Pagnol !!";
      ?>
 </a>
 </p>

 <p> Méthode 2 : echo classique dans le HTML :
 <pre> &lt;strong&gt;<span><</span><span>?php echo "Marcel Pagnol" ; ?></span>&lt;/strong&gt;</pre>
 Résultat : <strong> <?php echo "Marcel Pagnol"; ?> </strong>
 </p>


 <p> Méthode 3 : Syntaxe alternative, plus simple
 <pre> &lt;strong&gt;<span><</span><span>?= "Marcel Pagnol" ; ?></span>&lt;strong&gt;</pre>
 Résultat : <strong> <?= "Marcel Pagnol"; ?> </strong>
 </p>

 <a class="btn btn--primary full-width" href="../exo/exo1.php">Faire l'exercice</a>

 <?php

   $content = ob_get_clean();


   ?>

 <?php require('../inc/template.php'); ?>