 <?php
    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);
    // Afficher les erreurs et les avertissements
    error_reporting(E_ALL);
    ob_start();
    ?>
 <h2>3 - Les conditions </h2>
 <h3> Définition </h3>
 <p>
     Les conditions permettront d'afficher du code ou d'exécuter du code selon le résultat d'une condition<br>
     Par exemple :<br>
     <strong>SI</strong> l'âge d'une personne est supérieur ou égale à 18 ans <br>
     <strong>ALORS</strong> on affichera "Vous êtes majeur"<br>
     <strong>SINON</strong> on affichera "Vous êtes mineur !"<br><br>
     Ici la condition se fera par rapport à l'âge de la personne.<br>
     Les mots clés en PHP, comme dans la plupart des langages pour faire des conditions c'est <code>if</code> et <code> else</code>
 </p>
 De manière générale, la condition s'écrit comme ça :
 <pre>
            if(ma condition){
                // ...
            }else{
                // ...
            }  
</pre>
 Exemple :
 <pre>
            <span><</span>?php
            if($age >=18){
                echo "Vous êtes majeur";
            }else{
                echo "Vous êtes mineur";
            }       
    ?>
            // Si $age = 20 alors "Vous êtes majeur"
            // Si $age = 14 alors "Vous êtes mineur"
</pre>

 <h3>Symbole des conditions</h3>
 <div class="table-responsive">
     <table>
         <thead>
             <tr>
                 <th>Symbole</th>
                 <th>Signification</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td>==</td>
                 <td>Est égal à</td>
             </tr>
             <tr>
                 <td>></td>
                 <td>Est supérieur à</td>
             </tr>
             <tr>
                 <td>
                     << /td>
                 <td>Est inférieur à</td>
             </tr>
             <tr>
                 <td>>=</td>
                 <td>Est supérieur ou égal à</td>
             </tr>
             <tr>
                 <td>
                     <=< /td>
                 <td>Est inférieur ou égal à</td>
             </tr>
             <tr>
                 <td>!=</td>
                 <td>Est différent de</td>
             </tr>
         </tbody>
     </table>
 </div>
 <a class="btn btn--primary full-width" href="exo3.php">Faire l'exercice 1</a>
 <h3> Les conditions avec les booléens </h3>
 <p>
     Pour rappel un booléen prend la valeur de <code>true</code> ou de <code>false</code>, donc soit vrai soit faux<br>
     Par exemple si <code>$age = 14;</code> alors la variable $isMajeur prendra la valeur de faux : <code> $isMajeur = false;</code>
     Avec ce booléen, il sera alors possible de faire des conditions beaucoup plus facilement et lisible :
 <pre>
                    $age = 14;
                    $isMajeur = true; // De base on créé la variable et on la met à vrai
                    // On contrôle si l'âge est inférieur à 18 ans
                    if($age < 18){
                        $isMajeur = false; // Si c'est le cas, on change la valeur de $isMajeur à faux
                    }
                    // Et il sera possible de faire d'autre condition
                    if($isMajeur == true){
                        echo "Tu as droit d'acheter de l'alcool";
                    }else{
                        echo "Attends d'être plus grand !";
                    }
    </pre>
 PS : <code>if($isMajeur == true)</code> peux aussi s'écrire tout simplement <code>if($isMajeur)</code><br>
 et <code>if($isMajeur == false)</code> peux aussi s'écrire avec un <code>!</code> devant <code>if(!$isMajeur)</code>

 </p>


 <?php

    $prenom = "Jean-Jacques";

    echo '<pre>';


    echo '</pre>';

    ?>



 <a class="btn btn--primary full-width" href="exo3.php">Faire l'exercice 2</a>
 <h3> Les conditions multiples </h3>
 <p>
     Admettons qu'on veux vérifier plusieurs éléments<br>
     Exemples :<br>
     - Si une personne est un homme <code>OU</code> une femme alors la personne peut boire de l'alcool<br>
     - Si une personne est une femme <code>ET</code> une femme enceinte alors la personne n'a pas le droit de boire de l'alcool<br><br>
     Pour faire ces contrôles multiples, on va utiliser ce qu'on appelle des <strong>opérateurs logiques</strong>
 <div class="table-responsive">
     <table>
         <thead>
             <tr>
                 <th>Mot-clés</th>
                 <th>Symboles</th>
                 <th>Signification</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td>AND</td>
                 <td>&&</td>
                 <td>ET</td>
             </tr>
             <tr>
                 <td>OR</td>
                 <td>||</td>
                 <td>OU</td>
             </tr>
         </tbody>
     </table>
 </div>

 En PHP les deux conditions ci-dessus s'écrivent comme ceci :
 <pre>

        if($sexe == "M" || $sexe == "F"){
            echo "La personne peut boire de l'alcool";
        }

        if($sexe == "F" && $isEnceinte == true){
            echo "La personne ne peut pas boire de l'alcool";
        }

        // On pourrait même compléter la première condition avec un OU et un ET
        if( ($sexe == "M" || $sexe == "F") && $isMajeur == true){
            echo "La personne peut boire de l'alcool";
        }
    </pre>


 <a class="btn btn--primary full-width" href="../exo/exo3.php">Faire l'exercice 3</a>
 </p>

 <?php $content = ob_get_clean(); ?>
 <?php require('../inc/template.php'); ?>