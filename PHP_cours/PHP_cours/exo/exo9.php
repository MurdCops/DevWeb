<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);
ob_start();
?>
<h1>Exercices chap 9 - Manipulation requête SQL</h1>
<h2>Partie 1 : Mise en place</h2>
<ol>
    <li>Récupérer la base de données “junia.sql” avec les étudiants, prof, matières et classes</li>
    <li>Importer cette base de données sur votre PhpMyAdmin</li>
    <li>Ajouter directement avec l'interface de PhpMyAdmin : 2 nouvelles classes, 1 nouveau prof de sport et 4 nouveaux élèves</li>
    <li>Créer un dossier “<strong>exo9-tp</strong>”<ol>
            <li>Créer un fichier “<strong>index.php”</strong></li>
            <li>Créer un sous dossier “<strong>Views</strong>”</li>
            <li>Créer un sous dossier “<strong>Model</strong>”</li>
            <li>Dans ce sous dossier <strong>Model </strong>y ajouter le fichier “<strong>pdo.php</strong>”, comme vu dans le cours</li>
            <li>Paramétrer le fichier selon votre configuration</li>
        </ol>
    </li>
    <li>Dans le fichier index.php, importer le fichier<strong> pdo.php</strong> à l'aide d'un require</li>
</ol>
<h2>Partie 2 : Afficher les données</h2>
<ol>
    <li>Dans le fichier <strong>index</strong>.<strong>php</strong>, afficher la liste de tous les étudiants avec le nom et prénom (vous pouvez utiliser des ul/ol/li ou simplement plusieurs &lt;p&gt; )&nbsp;</li>
    <li>Afficher la liste de toutes les classes&nbsp;</li>
    <li>Afficher la liste de tous les profs</li>
    <li><strong><u>Bonus </u></strong>: Grâce à des jointures, afficher tous les professeurs avec leur matière et le nom de la classe</li>
</ol>
<h2>Partie 3 : Ajouter des données</h2>
<ol>
    <li>Directement en PHP faire une requête pour ajouter une nouvelle matière</li>
    <li>Créer un mini formulaire pour ajouter une nouvelle matière<ol>
            <li>Sur la page index.php, faire le formulaire avec le champ “<strong>Libellé</strong>” et un bouton “<strong>Valider</strong>”</li>
            <li>Créer un nouveau fichier “<strong>nouvelle_matiere.php</strong>” dans le dossier <strong>Views</strong>, où on récupère le texte saisi dans le formulaire puis on fera la requête SQL. Vous pouvez rajouter un lien pour retourner sur la page <strong>index.php</strong>.</li>
            <li>N'oubliez pas d'utiliser les <strong>$_POST </strong>et vérifier que cela fonctionne en BDD. Si besoin, voir exemple ici : <a target="_blank" rel="noopener noreferrer" href="https://www.php.net/manual/fr/tutorial.forms.php">https://www.php.net/manual/fr/tutorial.forms.php</a></li>
        </ol>
    </li>
    <li>Puis faire pareil mais pour un nouvel élève. Dans un fichier “<strong>nouvel_eudiant.php</strong>” dans le dossier <strong>Views</strong>, avec les champs nom et prénom et on mettra en dur dans la requête la classe avec l'id 1</li>
    <li><strong><u>Bonus </u></strong>: Un peu plus complexe ! Améliorer le point précédent, mais par contre l'id ne sera pas en dur, mais de manière dynamique<ul>
            <li>Il faudra ajouter une liste déroulante pour choisir la classe dans le formulaire : <a target="_blank" rel="noopener noreferrer" href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/select">https://developer.mozilla.org/fr/docs/Web/HTML/Element/select</a></li>
            <li>Dans la liste on veut voir afficher le nom des classes. Par contre dans les value, ça doit être les id.</li>
            <li>Il faut donc faire au préalable une requête qui récupère les classes puis faire une boucle pour créer de manière dynamique cette liste déroulante</li>
        </ul>
    </li>
</ol>
<h2>Partie 4 : Modifier les données</h2>
<ol>
    <li>Commencer en SQL simple à faire la modification d'un étudiant, en modifiant son nom ou son prénom</li>
    <li>Dans la liste des étudiants, ajouter un lien “Modifier”<ol>
            <li>En cliquant dessous, on doit être redirigé sur la page “<strong>modif_etudiant.php</strong>” dans le dossier <strong>Views</strong></li>
            <li>Pour savoir de quel étudiant il s'agit, il faut passer dans l'url son id, pensez à utiliser $_GET</li>
        </ol>
    </li>
    <li>Sur la page de modification, une fois l'id de l'étudiant récupéré, faire une requête pour avoir ses informations</li>
    <li>Puis reprendre le mini formulaire de la partie 3.3, mais là la différence, c'est que les données sont déjà remplies par défaut. Idem l'id de la classe peut rester à 1</li>
    <li>Faire en sorte que le formulaire fonctionne en PHP</li>
    <li><strong><u>Bonus </u></strong>: Avoir la liste déroulante à nouveau pour sélectionner la classe.<ul>
            <li>Bien évidemment, la classe de l'étudiant doit apparaitre par défaut</li>
            <li>Pour avoir l'option sélectionnée par défaut, il faudra faire des conditions et aussi utiliser l'attribut <strong>selected </strong>: https://www.w3schools.com/tags/att_option_selected.asp</li>
        </ul>
    </li>
</ol>
<h2>Partie 5 : Suppression des données</h2>
<ol>
    <li>Commencer en SQL simple à faire la suppression d'un étudiant</li>
    <li>Dans la liste des étudiants, ajouter un lien “Supprimer”<ol>
            <li>En cliquant dessous, on doit être redirigé sur la page “<strong>suppression_etudiant.php</strong>” dans le dossier <strong>Views</strong></li>
            <li>Pour savoir de quel étudiant il s'agit, il faut passer dans l'url son id, pensez à utiliser $_GET</li>
        </ol>
    </li>
    <li>Puis une fois l'id récupéré, vérifier que l'id existe et que l'étudiant aussi du coup</li>
    <li>Puis si la suppression a bien été effectuée, alors on doit afficher un message “Suppression de l'étudiant réussie”</li>
    <li><strong><u>Bonus </u></strong>: Trouver un moyen pour faire une redirection vers la page index.php si la suppression a bien été effectuée</li>
</ol>
<p>&nbsp;</p>

<?php $content = ob_get_clean(); ?>
 <?php require('../inc/template.php'); ?>