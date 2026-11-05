<?php
ob_start();
?>

<h1>Exercices - Les fonctions</h1>
<h2>Exercice 1 :</h2>
<p>Reprendre le code du l&#39;exercice 3 sur les parties des boucles.&nbsp;</p>

<ol>
    <li>Faire en sorte de cr&eacute;er une fonction <strong>afficherTable</strong>() qui permet d&#39;afficher la table de multiplication jusqu&#39;&agrave; 3 comme dans <strong>l&#39;&eacute;nnonc&eacute; initial</strong>. Par contre, am&eacute;liorer l&#39;affichage en se basant sur ce mod&egrave;le :&nbsp;<a href="https://www.memozor.com/images/multiplication/tables_a_imprimer/toutes_les_tables/zoom/toutes_les_tables_de_multiplication_noir_et_blanc.jpg">https://www.memozor.com/images/multiplication/tables_a_imprimer/toutes_les_tables/zoom/toutes_les_tables_de_multiplication_noir_et_blanc.jpg</a></li>
    <li>Cr&eacute;er un <strong>param&egrave;tre </strong>(<strong>n</strong>) pour que la table de multiplication affiche jusqu&#39;&agrave; la table (n) inclus. Le n va remplacer la limite de 3 &eacute;crit en dur.</li>
    <li>Ajouter 2 param&egrave;tres (<strong>min)&nbsp;</strong>qui est &eacute;gale par d&eacute;faut &agrave; 1 et un autre (<strong>max)&nbsp;</strong>qui est &eacute;gale par d&eacute;faut &agrave; 9. En soit la table va commencer par 1 x (min) .... 1 x (max) jusqu&#39;&agrave; n x (max)</li>
    <li>Maintenant <strong>tenter </strong>diff&eacute;rentes min, max et n selon les param&egrave;tres que vous souhaitez</li>
</ol>

<?php

// Votre code ici

function afficherTable($n, $min = 1, $max = 9) {
    for ($i = 1; $i <= $n; $i++) {
        for ($j = $min; $j <= $max; $j++) {
            echo $i . " x " . $j . " = " . ($i * $j) . "<br>";
        }
        echo "<br>";
    }
}

afficherTable(3);          // tables 1 à 3, lignes 1 à 9
afficherTable(5, 2, 6);    // tables 1 à 5, lignes 2 à 6



?>



<h2>Exercice 2 :</h2>
<ol>
    <li>Cr&eacute;er une nouvelle fonction qui s&#39;appelle <strong>estPair </strong>et qui prend en param&egrave;tre un nombre (<strong>n</strong>). Cette fonction permet de contr&ocirc;ler si le nombre n est <strong>pair ou pas&nbsp;</strong>, elle doit <strong>retourner vrai </strong>ou <strong>faux </strong>!&nbsp;<br />
        Puis gr&acirc;ce &agrave; l&#39;appel de la fonction, affichez soit la phrase (n) est pair ou (n) est impair<br />
        Pour s&#39;aider, vous pouvez utiliser les modulos <a href="https://www.php.net/manual/fr/language.operators.arithmetic.php">https://www.php.net/manual/fr/language.operators.arithmetic.php</a>&nbsp;ou la fonctions fmod&nbsp;<a href="https://www.php.net/manual/fr/function.fmod.php">https://www.php.net/manual/fr/function.fmod.php</a>&nbsp;</li>
    <li>Maintenant ajouter le <strong>typage</strong> sur les param&egrave;tres et sur le retour de la fonction</li>
</ol>

<!-- <?php
// 1) Fonction sans typage
// function estPair($n) {
//     return $n % 2 == 0;   // vrai si le reste de la division par 2 est 0
// }

// $n = 7;   // nombre à tester

// if (estPair($n)) {
//     echo $n . " est pair";
// } else {
//     echo $n . " est impair";
// }
// ?> -->

<?php
// 2) Fonction avec typage (paramètre et retour)
function estPair(int $n): bool {
    return $n % 2 === 0;
}

$n = 7;

if (estPair($n)) {
    echo $n . " est pair";
} else {
    echo $n . " est impair";
}
?>





<?php $content = ob_get_clean(); ?>

<?php require('../inc/template.php'); ?>