 <?php
    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);
    // Afficher les erreurs et les avertissements
    error_reporting(E_ALL);
    ob_start();
    ?>

 <h1>Exercices - Les conditions</h1>
 <h2>Exercice 1 :</h2>
 <p>
     1 - Reprendre le code de l'exercice 2 du chapitre 2<br>
     On va y ajouter une condition, qui affichera en dessous "C'est le matin" ou "C'est l'après-midi"<br>
     La condition ici se fera selon la variable qui contient le nombre d'heure<br><br>

     2 - On peut même aller plus loin, en créant une variable $politesse, qui va prendre comme valeur "Bonjour" ou "Bonsoir" <br>
     Il faudra faire à nouveau une condition selon le nombre d'heure et si l'heure est supérieure à 19h alors la variable $politesse prendra comme valeur "Bonsoir" <br />
     Cette variable $politesse sera à mettre dans la phrase

 </p>

 <strong>Résultat :</strong>

 <?php

    // Votre code ici

      


$prenom  = "Marcel";
$date    = date("d/m/Y");
$heure   = (int) date("H");
$minutes = date("i");


if ($heure > 19) {
    $politesse = "Bonsoir";
} else {
    $politesse = "Bonjour";
}

echo $politesse . " " . $prenom . ", nous sommes le " . $date . " et il est " . $heure . "h" . $minutes . ".";
echo "<br>";

if ($heure < 12) {
    echo "C'est le matin";
} else {
    echo "C'est l'après-midi";
}


    ?>

 <h3> 1)</h3>

 <?php

    // Votre code ici

      if ($heure < 12) {
    echo "C'est le matin";
} else {
    echo "C'est l'après-midi";
}

      if ($heure > 19) {
    $politesse = "Bonsoir";
} else {
    $politesse = "Bonjour";
}

    ?>
 <h3> 2)</h3>
 <?php
    // Votre code ici

      echo $politesse . " " . $prenom . ", nous sommes le " . $date . " et il est " . $heure . "h" . $minutes . ".";
echo "<br>";


    ?>




 <h2>Exercice 2 :</h2>
 <p>
     Reprendre l'exercice précédent <br>
     On va créer une variable $isHiver qui prendra par défaut comme valeur <code>true</code><br />
     Faire une nouvelle condition qui écrira une phrase disant : <br>
     Cet été il ne sera pas <code>10h55</code> mais <code>11h55</code><br>
     ( Bien évidemment l'heure devra être dynamique ;) )

 </p>

 <strong>Résultat :</strong>

 <?php

    // Votre code ici
    
    echo $isHiver = true;
   

$isHiver = true;   // valeur par défaut

if ($isHiver) {
    $heureEte = ($heure + 1) % 24;   // heure d'été = heure d'hiver + 1
    echo "Cet été il ne sera pas " . $heure . "h" . $minutes . " mais " . $heureEte . "h" . $minutes . ".";
}


    
   
    
    ?>

 <h2>Exercice 3 :</h2>
 <p>
     Le but sera d'afficher un message différent selon l'âge de la personne, le sexe de la personne et son état matrimonial <br>
     Si c'est un homme et qu'il a moins de 18 ans --> "Bonjour jeune homme"<br>
     Si c'est un homme et qu'il a entre 18 et 60 ans --> "Bonjour monsieur"<br><br>


     Si c'est une femme et qu'elle a moins de 18 ans --> "Bonjour jeune fille"<br>
     Si c'est une femme et qu'elle a plus de 40 ans OU qu'elle soit mariée --> "Bonjour madame"<br><br>

     Il faudra pour cela, créer des variables $age, $sexe, $isMariee

 </p>

 <strong>Résultat :</strong>

 <?php

    // Votre code ici


$age      = 25;
$sexe     = "homme";   // "homme" ou "femme"
$isMariee = false;     // booléen, sans guillemets

if ($sexe == "homme" && $age < 18) {
    echo "Bonjour jeune homme";
} elseif ($sexe == "homme" && $age >= 18 && $age <= 60) {
    echo "Bonjour monsieur";
} elseif ($sexe == "femme" && $age < 18) {
    echo "Bonjour jeune fille";
} elseif ($sexe == "femme" && ($age > 40 || $isMariee)) {
    echo "Bonjour madame";
} else {
    echo "Bonjour";   // cas non prévus par l'énoncé
}




    ?>



 <?php $content = ob_get_clean(); ?>

 <?php require('../inc/template.php'); ?>