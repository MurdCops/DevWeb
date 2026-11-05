 <?php
    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);
    // Afficher les erreurs et les avertissements
    error_reporting(E_ALL);
    ob_start();
    ?>

 <h2>2 - Les variables </h2>
 <h3> Définition </h3>
 <p> C'est comme une petite boite qui va contenir une <strong>information</strong>, une <strong>donnée</strong> de manière <strong>temporaire</strong>
 </p>
 <p>
     Une variable est définie par : <br>
     - Un <strong>nom</strong> : de préférence par de chiffres ou caractères spéciaux<br>
     - Une <strong>valeur</strong> : qui peut être un nombre, une chaîne de caractère, un booléen etc…<br>
 </p>
 <h3> Création d'une variable</h3>
 <p>
     On va créer une variable grâce au mot clé <code>$</code>
 </p>
 <pre>
        $leNomDeMaVariable;                     // Ceci est une déclaration d'une variable
        $leNomDeMaVariable = "Une valeur";      // Ceci est une affectation d'une variable, cela ce fait avec le signe =

        // Pour afficher une variable à l'écran
        echo $leNomDeMaVariable ;

        // Ou comme ceci directement dans le HTML
        <span><</span><span>?= $leNomDeMaVariable ; ?></span>

    </pre>

 <strong> Résultat : </strong>
 <?php
    $leNomDeMaVariable = "Une valeur";
    echo $leNomDeMaVariable;
    ?>

 <a class="btn btn--primary full-width" href="exo2.php">Faire l'exercice 1</a>

 <h3>Type de données</h3>
 <p>Il existe différents types de données pour une variable
 <ul>
     <li>
         Des chaînes de caractères ou <strong>string</strong> <br>
         <code>
             $chaine = "Texte";
         </code>
     </li>
     <li>
         Des entier ou <strong>int</strong> <br>
         <code>
             $age = 27;
         </code>
     </li>
     <li>
         Des nombres décimaux ou <strong>float</strong> <br>
         <code>
             $moyenne = 14.6;
         </code>
     </li>
     <li>
         Des booléens ou <strong>bool / boolean</strong> qui prend la valeur de vrai ou faux<br>
         <code>$isHiver = true;</code><br>
         <code>$isEte = false;</code>
     </li>
     <li>
         Tout bêtement la valeur vide avec <code>NULL</code><br>
         <code>$defaut = NULL;</code>
     </li>
 </ul>

 </p>

 <h3>La concaténation</h3>
 <p> C'est le fait de pouvoir afficher plusieurs variables dans un seul echo, ce qui peut être très pratique<br>
     Pour cela il faudra séparer les variables des chaînes de caractères par un <code>.</code>
 </p>
 <pre>
        <span><</span>?php
        $couleur = "rouge";
        $teinte = "bordeaux";
        echo  "Ma couleur préférée est le ".$couleur." ".$teinte;
        ?>

        // OU syntax alternative
        Ma couleur préférée est le <span><</span>?= $couleur." ".$teinte ?>

        // Dorénavant en PHP on peut aussi faire comme ceci :
        Ma couleur préférée est le <span><</span>?= "$couleur  $teinte" ?> // Plus de points, mais on englobe avec des guillemets doubles

        // Idem avec un echo :
        <span><</span>?php echo "  Ma couleur préférée est le  $couleur  $teinte" ?>
       
    </pre>

 <strong> Résultat : </strong>
 <?php
    $couleur = "rouge";
    $teinte = "bordeaux";

    ?>
 <p>
     Ma couleur préférée est le <?= "$couleur  $teinte" ?>
     Ma couleur préférée est le <?= $couleur." ".$teinte ?>
 </p>

<?php echo " <p>Autre écriture : Ma couleur préférée est le  $couleur  $teinte </p>" ?>


 <?= "Ma couleur préférée est le " . $couleur . " est le " . $teinte ?>

 <a class="btn btn--primary full-width" href="../exo/exo2.php">Faire l'exercice 2</a>

 <?php $content = ob_get_clean(); ?>

 <?php require('../inc/template.php'); ?>