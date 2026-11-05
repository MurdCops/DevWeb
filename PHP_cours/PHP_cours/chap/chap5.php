 <?php
  // Afficher les erreurs à l'écran
  ini_set('display_errors', 1);
  // Afficher les erreurs et les avertissements
  error_reporting(E_ALL);
  ob_start();
  ?>
 <h2>5 - Les tableaux </h2>

 <p>
   On a vu précédement qu'on pouvait stocker des informations dans des variables, mais comment stocker plusieurs informations dans une seule variable ? Ca sera justement grâce aux tableaux !<br />
   Un tableau est un assemblage de variables ! Par exemple un tableau de 10 cases sera un tableau qui contiendra 10 variables !<br />
   Les tableaux (en anglais <strong>array</strong>) est un autre type de données pour une variable (vu au chapitre 2).

 <pre>
       <span><</span>?php
          $tableau = array(); // Déclaration d'un tableau, ici un tableau vide
          $tableauV2= []; // version alternative
      ?>
    </pre>
 Pour manipuler une <strong>valeur</strong> dans le tableau il faudra utiliser sa <strong>clé</strong> :
 <pre>
       <span><</span>?php
          $tableau = array(); // Déclaration d'un tableau, ici un tableau vide
          $tableau[clé] = valeur;
      ?>
    </pre>
 </p>
 <p>
   Il faut imaginer que les <strong>valeurs</strong> dans un tableau sont rangés dans différentes cases. Et pour récupérer une case précise, il faudra alors utiliser une <strong>clé</strong> qui permettra d'identifiée la case dont on veux récupérer la valeur.<br>
   Selon les types de tableaux, les <strong>clés</strong> peuvent être soient des numéros soit des noms.<br>

   Il existe deux grands types de tableaux :
   - les tableaux numérotés <br>
   - les tableaux associatifs
 </p>
 <h3>Les tableaux numérotés</h3>
 <p>
   Ces tableaux utilisent des <strong>clés</strong> qui sont numérotés, on les appelle également des <strong>index</strong>.<br>
   Pour créer un tableau numéroté en PHP : <br>
 <pre>
       <span><</span>?php
          $tableauCouleurs = array("Rouge","Bleu","Vert","Orange"); // Création d'un tableau de couleurs
          $tableauCouleursV2 = ["Rouge","Bleu","Vert","Orange"];
      ?>
    </pre>
 La particularité des tableaux numérotés c'est que pour avoir la valeur du premier index, il faut commencer le tableau par l'index 0 et non 1 !<br>
 On aurait pu créer le même tableau mais de la façon suivante : <br>
 <pre>
       <span><</span>?php      
          $tableauCouleurs[0] = "Rouge";
          $tableauCouleurs[1] = "Bleu";
          $tableauCouleurs[2] = "Vert";
          $tableauCouleurs[3] = "Orange";
      ?>
    </pre>
 On encore plus simple, de manière automatique comme cela :
 <pre>
       <span><</span>?php      
          $tableauCouleurs[] = "Rouge";
          $tableauCouleurs[] = "Bleu";
          $tableauCouleurs[] = "Vert";
          $tableauCouleurs[] = "Orange";
      ?>
    </pre>
 Pour récupérer la valeur des couleurs, il faudra écrire :
 <pre>
       <span><</span>?php
          $tableauCouleurs = array("Rouge","Bleu","Vert","Orange"); // Création d'un tableau de couleurs
          echo $tableauCouleurs[0]; // Affichera "Rouge"
          echo $tableauCouleurs[1]; // Affichera "Bleu"
          echo $tableauCouleurs[2]; // Affichera "Vert"
          echo $tableauCouleurs[3]; // Affichera "Orange"
      ?>
    </pre>
 </p>
 <h3>Les tableaux associatifs</h3>
 <p>
   Les tableaux associatifs sont plus évolués que les tableaux numérotés car ils permettront d'avoir des clés sous forme de noms au lieu d'avoir des index/numéros, donc le code aura plus de sens.<br>
   On les créé de la manière suivante :
 <pre>
       <span><</span>?php
          $tableauContacts['nom']     = 'Dusse';
          $tableauContacts['prenom']  = 'Jean-Paul';
          $tableauContacts['numero']  = '0612345678';
      ?>
    </pre>

 On aurait pu le créer également comme cela :
 <pre>
       <span><</span>?php
          $tableauContacts = array (
            'nom'     => 'Dusse',
            'prenom'  => 'Jean-Paul',
            'numero'  => 0612345678
          );
      ?>
    </pre>
 La particularité c'est la flèche <code>=></code> qui permet de faire l'association entre la clé et la valeur.<br>
 Pour afficher leurs valeurs, c'est pas plus compliqué que cela : <br>
 <pre>
       <span><</span>?php
          echo $tableauContacts['nom'];     // Affichera 'Dusse';
          echo $tableauContacts['prenom'];  // Affichera 'Jean-Paul';
          echo $tableauContacts['numero'];  // Affichera '0612345678';
      ?>
    </pre>
 </p>
 <h3>Les tableaux à plusieurs dimensions</h3>
 <p>
   Mais que se passe t-il si on souhaite avoir plusieurs contacts ? Il serait dommage de faire un $tableauContacts1 puis $tableauContacts2 puis $tableauContacts3 etc...<br>
   C'est pourquoi existe des tableaux à plusieurs dimensions, qui sera un tableau qui en contiendra plusieurs.<br>
   Il y aura alors un doublon au niveau des crochets : <code> $tab[][];</code><br>
   Par exemple, on pourra faire ceci :
 <pre>
       <span><</span>?php
          $tableauContacts[0]['nom']     = 'Dusse';
          $tableauContacts[0]['prenom']  = 'Jean-Paul';
          $tableauContacts[0]['numero']  = '0612345678';

          $tableauContacts[1]['nom']     = 'Pignon';
          $tableauContacts[1]['prenom']  = 'Michel';
          $tableauContacts[1]['numero']  = '0687654321';

          $tableauContacts[2]['nom']     = 'Jacob';
          $tableauContacts[2]['prenom']  = 'Rabbi';
          $tableauContacts[2]['numero']  = '0688888888';
      ?>
    </pre>

 Pour afficher leurs valeurs, on pourra faire ainsi : <br>
 <pre>
       <span><</span>?php
          echo $tableauContacts[0]['nom'];     // Affichera 'Dusse';
          echo $tableauContacts[1]['prenom'];  // Affichera 'Michel';
          echo $tableauContacts[2]['numero'];  // Affichera '0688888888';
      ?>
    </pre>
 </p>
 <h3>Les tableaux et les boucles</h3>
 <p>
   On a vu précédemment comment faire boucler des informations grâce aux boucles mais c'est avec la notion de tableau que la boucle représente un grand intérêt.<br>
   Par exemple si on veux afficher toutes les données d'un tableau de couleurs :
 <pre>
       <span><</span>?php      
          $tableauCouleurs = array("Rouge","Bleu","Vert","Orange"); // Création d'un tableau de couleurs

          for($i=0; $i < count($tableauCouleurs) ; $i++){
            echo $tableauCouleurs[$i]; // Affichera "Rouge" puis "Bleu" puis "Vert" et "Orange"
          }
      ?>
    </pre>
 La fonction <code>count()</code> permet de connaitre la longueur d'un tableau, ici la longueur sera de 4, donc il faut que je fasse la boucle jusqu'à 3 et non 4 d'où le <code>
   < </code> et non le <code>
       <=< /code>, car pour rappel, un tableau part de 0 et non de 1, ATTENTION !<br><br>
         <h3>Boucle foreach</h3>
         Il existe également un nouveau type de boucle, rien que pour les tableaux, ce sont les boucles <code>foreach</code>. Ces boucles permettent de simplifier l'écriture de la boucle :
         <pre>
       <span><</span>?php      
          $tableauCouleurs = array("Rouge","Bleu","Vert","Orange"); // Création d'un tableau de couleurs

          foreach($tableauCouleurs as $couleur){
            echo $couleur; // dans chaque itération $couleur équivaut à $tableauCouleurs[$i]
        }
      ?>
    </pre>
         La variable <code>$couleur</code> est utilisé qu'à l'intérieur de la boucle, donc on peut la nommer comme on veux.<br>

         La boucle foreach est très intéressante pour les tableaux numérotés ! Mais encore plus pour les tableaux associatifs :
         <pre>
       <span><</span>?php      
          $tableauContacts['nom']     = 'Dusse';
          $tableauContacts['prenom']  = 'Jean-Paul';
          $tableauContacts['numero']  = '0612345678';

          foreach($tableauContacts as $contact){
            echo $contact; // affichera toutes les données d'un contact
        }
      ?>
    </pre>

         <?php
          $tableauContacts['nom']     = 'Dusse';
          $tableauContacts['prenom']  = 'Jean-Paul';
          $tableauContacts['numero']  = '0612345678';

          foreach ($tableauContacts as $contact) {
            echo $contact; // affichera toutes les données d'un contact
          }
          ?>
         <p>On peut également retrouver et ajouter un clé/index de cette manière:</p>
         <pre>
 <span><</span>?php
  foreach ($tableau as $cle => $valeur) {
      echo $cle.' - '.$valeur.'&lt;br />'."\n";
  }
?>
</pre>
         <?php
          foreach ($tableauContacts as $cle => $valeur) {
            echo $cle . ' - ' . $valeur . '<br />' . "\n";
          }
          ?>
         <br><br>
         Maintenant si on veux afficher la totalité de notre répertoire téléphonique, on va boucler sur tous les contacts et chaque contacts sera un tableau qui contiendra plusieurs informations concernant notre contact ! Donc il y aura à nouveau une boucle dans une autre ! Le code ressemblera à ça : <br>
         <pre>
       <span><</span>?php      
          $tableauContacts[0]['nom']     = 'Dusse';
          $tableauContacts[0]['prenom']  = 'Jean-Paul';
          $tableauContacts[0]['numero']  = '0612345678';

          $tableauContacts[1]['nom']     = 'Pignon';
          $tableauContacts[1]['prenom']  = 'Michel';
          $tableauContacts[1]['numero']  = '0687654321';

          $tableauContacts[2]['nom']     = 'Jacob';
          $tableauContacts[2]['prenom']  = 'Rabbi';
          $tableauContacts[2]['numero']  = '0688888888';

         foreach ($tableauContacts as $contact) { 
              foreach ($contact as $information) {
                  echo $information; // Affichera "Rouge" puis "Bleu" puis "Vert" et "Orange"
                  echo "<span><</span>br>"; 
              }
              echo "-----";
              echo "<span><</span>br>"; 
          }
      ?>
    </pre>
         Le résultat sera celui-ci : <br>
         Dusse<br>
         Jean-Paul<br>
         0612345678<br>
         -----<br>
         Pignon<br>
         Michel<br>
         0687654321<br>
         -----<br>
         Jacob<br>
         Rabbi<br>
         0688888888<br>
         -----
         </p>


         <p>
           <a class="btn btn--primary full-width" href="../exo/exo5.php">Faire les exercices</a>
         </p>

         <?php $content = ob_get_clean(); ?>
          <?php require('../inc/template.php'); ?>