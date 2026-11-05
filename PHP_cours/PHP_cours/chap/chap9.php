<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);
ob_start();
?>

<h2>9 - Manipulation des données SQL en PHP</h2>

<h3>La connexion à la base de données</h3>
<p>Il y a plusieurs méthodes pour se connecter à une base de données SQL en PHP, par exemple mysqli, mais une meilleure méthode est d'utiliser une autre extension PHP qui est plus orienté objet et donc plus moderne et adapter : il s'agit de la <a target="_blank" rel="noopener noreferrer" href="https://www.php.net/manual/fr/book.pdo.php"><strong>PDO </strong></a><strong>(PHP Data Objects)</strong></p>
<p>De plus, grâce à la PDO, on aura accès à plein de fonctions qui vont nous faciliter la vie comme <strong>prepare(), fetch(), fetchAll(), rowCount()</strong> etc.</p>

<p>Voici un exemple de fichier pdo.php :</p>

<pre><code class="language-php">&lt;?php
$servername = "localhost"; // Nom du serveur
$username = "username"; // Nom d'utilisateur de la base de données
$password = "password"; // Mot de passe de la base de données
$dbname = "nom_de_la_base_de_donnees"; // Nom de la base de données

try {
    $dbPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration de PDO pour générer des exceptions en cas d'erreur
    $dbPDO-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données"; 
} catch(PDOException $e) {
    echo "La connexion a échouée : " . $e-&gt;getMessage();
}
?&gt;</code></pre>

<p>On créé d'abord des variables de configuration de connexion, si vous ne connaissez pas la &nbsp;valeur, il est possible de les consulter sur la page d'accueil de MAMP.</p>
<p>Puis on faire un <strong>try…catch</strong>, c'est-à-dire on teste un bout de code et si celui-ci renvoi des erreurs alors l'erreur est attrapée et affichée dans le catch.</p>
<p>Au final, toute notre connexion sera stockée dans notre variable $dbPDO.</p>

<h3>Lancer des requêtes SQL en PHP</h3>
<p>Pour exécuter une requête, il faudra passer par 2 étapes : le <strong>prepare</strong>() puis le <strong>execute</strong>().</p>
<p>Le <strong>prepare</strong>() permettra d'y insérer la requête SQL avec une <strong>requête préparée</strong>. Cela permettra de garantir la bonne sécurité du code et d'<strong>éviter les injections SQL</strong> !!</p>

<pre><code class="language-php">&lt;?php
$resultat = $dbPDO-&gt;prepare("SELECT * FROM clients");
$resultat -&gt;execute();
?&gt;</code></pre>
<p>Si nous avons des données à passer en paramètre de notre requête pour filtrer ou trier, par exemple le nom d'un client ou son id, nous allons avoir besoin de bind des paramètres. On peut le faire de plusieurs manières :</p>
<h4>Avec des emplacements nommés : (:param)</h4>
<pre><code class="language-php">&lt;?php
$resultat = $dbPDO-&gt;prepare("SELECT * FROM clients WHERE name=:nom AND city=:ville ");
$resultat-&gt;bindParam(':nom', "Jean");
$resultat-&gt;bindParam(':ville', "Bordeaux",PDO::PARAM_STR ); // On peut préciser le type du paramètre (par défaut c'est en String)
$resultat -&gt;execute();

// OU DIRECTEMENT COMME CECI :
$resultat = $dbPDO-&gt;prepare("SELECT * FROM clients WHERE name=:nom AND city=:ville ");
$resultat -&gt;execute([
	'nom' =&gt; "Jean",
	'ville' =&gt; "Bordeaux"
]);
?&gt;</code></pre>
<h4>Avec des marqueurs de positionnement : (?)</h4>
<pre><code class="language-php">&lt;?php
$resultat = $dbPDO-&gt;prepare("SELECT * FROM clients WHERE name=? AND city=? ");
$resultat-&gt;bindParam(1, "Jean");
$resultat-&gt;bindParam(2, "Bordeaux",PDO::PARAM_STR ); // On peut préciser le type du paramètre (par défaut c'est en String)
$resultat -&gt;execute();

// OU DIRECTEMENT COMME CECI :
$resultat = $dbPDO-&gt;prepare("SELECT * FROM clients WHERE name=? AND city=? ");
$resultat -&gt;execute(["Jean","Bordeaux"]); // Attention à l'ordre d'appel
?&gt;</code></pre>

<h3>Récupérer des données &nbsp;via le SQL :&nbsp;</h3>
<p>Pour récupérer des données on utilise très souvent la fonction <strong>fetch</strong>() ou <strong>fetchAll</strong>(). La différence est que le 1er ne permet que de récupérer une ligne de résultat, alors que le <strong>fetchAll</strong>() permettra d'en récupérer plusieurs. Cette seconde méthode sera donc privilégiée !</p>
<pre><code class="language-php">&lt;?php
$resultat = $dbPDO-&gt;prepare("SELECT * FROM clients WHERE name=:nom AND city=:ville ");
$resultat -&gt;execute([
	'nom' =&gt; "Jean",
	'ville' =&gt; "Bordeaux"
]);
$clients = $resultat-&gt;fetchAll()

foreach($clients as $client) {
   echo $client['id'];
}
?&gt;</code></pre>

<p>On peut aussi ajouter un paramètre dans la méthode fetchAll(), par défaut il est à <strong>PDO::FETCH_BOTH</strong>, càd que les résultats sont renvoyés sous forme de tableau mais pour travailler en POO, il sera intéressant de changer le mode comme ceci :&nbsp;</p>

<pre><code class="language-php">&lt;?php
//...
$clients = $resultat-&gt;fetchAll(PDO::FETCH_CLASS)

foreach($clients as $client) {
   echo $client-&gt;id; // au lieu de $client['id']
}
?&gt;</code></pre>
<h3>Ajouter, modifier et supprimer des données :&nbsp;</h3>
<p>Pour effectuer les autres actions, on reprend la même structure, on change bien évidemment la requête SQL, par exemple :&nbsp;</p>
<pre><code class="language-php">&lt;?php
// Pas la peine de mettre l'id s'il est en auto_incremente
$resultat = $dbPDO-&gt;prepare("INSERT INTO clients(name,email,city) VALUES (:nom,:email,:ville)" );
$resultat -&gt;execute([
	'nom' =&gt; "Jean",
	'email' =&gt; "jean@gmail.com",
	'ville' =&gt; "Bordeaux"
]);
?&gt;</code></pre>
<h3>Autres méthodes intéressantes :</h3>
<p>On peut traiter des erreurs SQL en affichant la source du problème avec <strong>errorInfo</strong>() :&nbsp;</p>
<pre><code class="language-php">&lt;?php
$resultat = $dbPDO-&gt;prepare("INSERT INTO clients(name,email,city) VALUES (:nom,:email,:ville)" );
$resultat -&gt;execute([
	'nom' =&gt; "Jean",
	'email' =&gt; "jean@gmail.com",
	'ville' =&gt; "Bordeaux"
])or die(print_r($resultat -&gt;errorInfo())); // Affichera un message d'erreur
?&gt;</code></pre>
<p>Il est également possible de regarder tous les paramètres de la requête afin de la débugger avec la méthode <a target="_blank" rel="noopener noreferrer" href="https://www.php.net/manual/fr/pdostatement.debugdumpparams.php">debugDumpParams </a>:&nbsp;</p>
<pre><code class="language-php">&lt;?php
$resultat = $dbPDO-&gt;prepare("INSERT INTO clients(name,email,city) VALUES (:nom,:email,:ville)" );
$resultat -&gt;execute([
	'nom' =&gt; "Jean",
	'email' =&gt; "jean@gmail.com",
	'ville' =&gt; "Bordeaux"
]); 

// Affichera les informations concernant la requête
$resultat -&gt;debugDumpParams();
?&gt;</code></pre>

<p>Quand on exécute une requête, on peut vérifier son bon fonctionnement, car la méthode <strong>execute</strong>() renvoie un boolean.<br>Également, on peut utiliser la méthode rowCount(), qui permet de calculer le nombre de lignes impactées, donc si c'est supérieur à 0, c'est ok !&nbsp;</p>
<p>On pourra donc faire ce genre de conditions :</p>
<pre><code class="language-php">&lt;?php
$resultat = $dbPDO-&gt;prepare("DELETE FROM clients WHERE name=:nom" );
$req = $resultat -&gt;execute([
	'nom' =&gt; "Jean"
]); 

if($req){ // c'est équivalent à $req == true
	echo "Le client a bien été supprimé";
}else{
	echo "La suppresion a échouée";
}

/* ET/OU */
$rows = $resultat-&gt;rowCount();

if ($rows&gt;0){
	echo "Il y a $rows client(s) supprimé(s)";
}else{
	echo "Aucune suppression";
}

?&gt;</code></pre>

<p>
    <a class="btn btn--primary full-width" href="../exo/exo9.php">Faire les exercices</a>
</p>
<?php

$content = ob_get_clean();
$base = false;

?>

<?php require('../inc/template.php'); ?>