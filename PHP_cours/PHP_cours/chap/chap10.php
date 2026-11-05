<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);
ob_start();
?>

<h1><span lang="fr" dir="ltr">L'authentification</span></h1>
<p>&nbsp;</p>
<p>Voici une des fonctions les plus basiques, mais les plus cruciales sur un site web, c'est la connexion et son authentification !&nbsp;</p>
<p>Dans un 1er temps, nous allons voir comment on crée un utilisateur dans la base de données avec un mot de passe crypté !</p>
<p>Puis dans un second temps, nous verrons comment se connecter via une page de login !&nbsp;</p>
<p>Et nous allons voir pour finir comment on peut conserver les données de connexion à l'aide des variables Cookies et Sessions !</p>
<p>&nbsp;</p>
<h2>La création d'un compte</h2>
<p>Quelles sont les étapes ?&nbsp;</p>
<ol>
    <li>On crée une page index.php qui servira de porte d'accès au dashboard</li>
    <li>On affiche la page registrer.php</li>
    <li>L'utilisateur crée son compte en saisissant son login et password</li>
    <li>Le formulaire renvoi vers la page submit_registrer.php</li>
    <li>Si la création s'effectue, on est redirigé vers la page index.php</li>
    <li>Sinon, on est redirigé vers la page registrer.php</li>
</ol>
<h3>Page index.php</h3>
<p>Créer la page avec ce bout de code :&nbsp;</p>
<pre><code class="language-plaintext">&lt;?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);
header("Location: register.php");
?&gt;</code></pre>
<h3>Page Registrer</h3>
<p>Pour créer les pages on va se baser sur TailwindCSS et Flowbite :</p>
<ol>
    <li>Créer un fichier register.php avec une base HTML classique</li>
    <li>
        <p>Dans la balise head ajouter cette ligne de code :</p>
        <pre><code class="language-plaintext">&lt;link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /&gt;</code></pre>
    </li>
    <li>Dans le body ajouter le code du formulaire : <a target="_blank" rel="noopener noreferrer" href="https://flowbite.com/blocks/marketing/register/">https://flowbite.com/blocks/marketing/register/</a></li>
    <li>
        <p>Puis à nouveau dans la balise head ajouter:&nbsp;</p>
        <pre><code class="language-plaintext">&lt;script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"&gt;&lt;/script&gt;</code></pre>
    </li>
    <li>Créer un nouveau fichier “tailwind.config.js” à la racine de votre page</li>
    <li>Faite votre configuration via Flowbite et ajouter le code dans votre fichier</li>
    <li>
        <p>Puis à la fin du head ajouter :&nbsp;</p>
        <pre><code class="language-plaintext">   &lt;script defer src="https://cdn.tailwindcss.com"&gt;&lt;/script&gt;
   &lt;script defer src="tailwind.config.js"&gt;&lt;/script&gt;</code></pre>
    </li>
</ol>
<p>&nbsp;</p>
<p>Si besoin voir la documentation <a target="_blank" rel="noopener noreferrer" href="https://flowbite.com/docs/getting-started/quickstart/">https://flowbite.com/docs/getting-started/quickstart/</a><br>&nbsp;</p>
<h3>Page Submit_register</h3>
<ol>
    <li>Changer la valeur de l'action par submit_register.php dans le formulaire présent dans la page Register</li>
    <li>Puis également ajouter : method="POST"</li>
    <li>Créer un fichier submit_registrer.php à la racine</li>
    <li>
        <p>Dedans on va tester les données passées en POST, très facilement comme ceci :&nbsp;</p>
        <pre><code class="language-plaintext">&lt;?php&nbsp;
var_dump($_POST);
?&gt;</code></pre>
    </li>
    <li>
        <p>Puis il faut tester les valeurs et s'assurer qu'elles soient toutes remplies et que le password soit égale au confirm :</p>
        <pre><code class="language-plaintext">&lt;?php
$post = $_POST;
if(isset($post['email']) &amp;&amp; isset($post['password']) &amp;&amp; isset($post['confirm-password']) &amp;&amp; $post['password']=== $post['confirm-password']){
 &nbsp;&nbsp;&nbsp;echo "ok";

}else{
 &nbsp;&nbsp;&nbsp;echo "ko";
}
?&gt;</code></pre>
    </li>
    <li>
        <p>Puis si c'est ok, on redirige vers la page index à l'aide de :</p>
        <pre><code class="language-plaintext"> //header('Location: dashboard.php'); /* pour l'instant en commentaire */
 exit();</code></pre>
    </li>
    <li>Sinon on redirige vers la page de register.php</li>
    <li>Maintenant qu'on voit que tout est ok, on va jouer avec la BDD en insérant les données de l'user dans la base. On pourra utiliser un try catch.</li>
    <li>Récupérer via le TP9, les fichiers de PDO.php</li>
    <li>Puis dans la base de données, prévoir une table User avec comme champ un id, email et password ( en varchar(50) )&nbsp;</li>
    <li>
        <p>Puis dans le fichier submit_registrer.php, si les données du formulaire sont ok, alors on ajout ce code et on complète :</p>
        <pre><code class="language-plaintext">$resultat = $dbPDO-&gt;prepare("INSERT INTO `user` (`id`, `email`, `password`) VALUES (NULL, :email, SHA1(:password));");
$req = $resultat -&gt;execute([
	// ...
]); </code></pre>
    </li>
    <li>Faire un contrôle si l'utilisateur a bien été ajouté</li>
    <li>Puis décommentez la ligne du header('Location: dashboard.php'), dans ce fichier, mettez juste un “Hello” pour tester la bonne redirection</li>
</ol>
<p>&nbsp;</p>
<h2>La page de connexion</h2>
<h3>Page Login</h3>
<p>&nbsp;</p>
<ol>
    <li>Avant de créer la page login, on va créer un template de page pour nous faciliter la vie ! On peut juste utiliser les require ou sinon les ob_start etc</li>
    <li>Puis récupérer le code de la page de login : <a target="_blank" rel="noopener noreferrer" href="https://flowbite.com/blocks/marketing/login/">https://flowbite.com/blocks/marketing/login/</a></li>
    <li>Faire la même manipulation que pour la page Register en ajoutant les liens vers les fichiers JS ou CSS</li>
    <li>Modifier le formulaire avec à nouveau la méthode POST et changer la cible vers submit_login.php*</li>
</ol>
<h3>Page Submit_Login</h3>
<ol>
    <li>Refaire les contrôles par rapport au formulaire (ici il n'y aura pas de confirme_password)</li>
    <li>Puis faire une requête pour récupérer un user avec l'email correspond</li>
    <li>
        <pre><code class="language-plaintext">&nbsp;&nbsp;&nbsp;$resultat = $dbPDO-&gt;prepare("SELECT * FROM `user` WHERE `email` = :email");
 &nbsp;&nbsp;&nbsp;$req = $resultat -&gt;execute([
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/* Code here */
 &nbsp;&nbsp;&nbsp;]);
 &nbsp;&nbsp;&nbsp;$rows = $resultat-&gt;rowCount();
 &nbsp;&nbsp;&nbsp;if ($rows&gt;0){
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "&lt;pre&gt;L'utilisateur a bien été trouvé&lt;/pre&gt;";
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//header('Location: dashboard.php');
 &nbsp;&nbsp;&nbsp;}else{
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "&lt;pre&gt;Aucun user trouvé&lt;/pre&gt;";
 &nbsp;&nbsp;&nbsp;}
 &nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;exit();</code></pre>
    </li>
    <li>
        <p>Puis une fois qu'on a bien trouvé un user, faire le contrôle si le password de la BDD est le même que celui saisi. Attention car d'un côté le password est crypté (en BDD) et pas via le formulaire, il faudra donc utiliser la méthode sha1() de PHP :</p>
        <pre><code class="language-plaintext">	$user = $resultat-&gt;fetch();
	if($user['password']===sha1($post['password'])){
		echo "&lt;pre&gt;le password est ok !&lt;/pre&gt;";
	}</code></pre>
    </li>
    <li>Puis décommenter la redirection vers le dashboard</li>
</ol>
<p>&nbsp;</p>
<h2>Conserver les données grâce aux sessions</h2>
<p>Actuellement le problème, c'est dès qu'on se connecte, on va être redirigé, mais que se passe-t-il si on change de page ou autre ? Il faudra à chaque fois s'authentifier ?!</p>
<p>Bien sûr que non ! Mais à la place il faudra stocker cette donnée quelque part disponible partout dans le code !&nbsp;</p>
<p>Et ça sera grâce à la variable globale : <strong>$_SESSION</strong> !&nbsp;</p>
<p>Cette donnée sera disponible le temps de la connexion de l'utilisateur, càd dès qu'il va quitter son navigateur, cela va disparaître !</p>
<p>&nbsp;</p>
<p>Pour l'utiliser, il faut <strong>IMPERATIVEMENT </strong>mettre un <strong>session_start() </strong>en haut de toutes les pages !</p>
<p>Pour supprimer la variable de session, ça sera <strong>session_destroy()</strong>, par exemple pour se déconnecter.</p>
<pre><code class="language-plaintext">&lt;?php
session_start();
$_SESSION['userId'] = 5;
echo $_SESSION['userId'];

// Pour détruire une variable de session
unset($_SESSION['userId']);

// Pour détruire toutes les variables de session
session_destroy();


</code></pre>
<p>Maintenant on va pouvoir modifier la page index.php.</p>
<p>Si on est connecté, on va être redirigé vers la page <strong>dashboard</strong>, dans le cas contraire vers la page de <strong>login</strong>.php :&nbsp;</p>
<pre><code class="language-plaintext"> // Page index.php
 if (isset($_SESSION['userId'])){
 &nbsp;&nbsp;&nbsp;header("Location: dashboard.php");
} else{
 &nbsp;&nbsp;&nbsp;header("Location: login.php");
}</code></pre>
<p>On pourra également protéger les pages internes comme le dashboard, en contrôlant qu'on soit bien connecté pour y accéder ! Si ce n'est pas le cas, c'est direction la case départ vers la page index.php :&nbsp;</p>
<p>&nbsp;</p>
<pre><code class="language-plaintext">// Page dashboard.php
session_start();
if (!isset($_SESSION['userId'])){
 &nbsp;&nbsp;&nbsp;header("Location: index.php");
}</code></pre>
<p>&nbsp;</p>
<h2>Conserver les données grâce aux cookies</h2>
<p>Les cookies fonctionnent sensiblement pareil aux sessions, mais contrairement à eux les cookies vont se stocker sur le navigateur, même si on quitte la session et même si on redémarre l'ordinateur !&nbsp;</p>
<p>Pour les écrire, ça sera un peu plus compliqué que les sessions, il y aura trois paramètres :&nbsp;</p>
<ul>
    <li>le nom du cookie</li>
    <li>la valeur du cookie</li>
    <li>la date d'expiration (sous forme de timestamp<ul>
            <li>propriété “expires”, exemple de valeur : <strong>time() + 60*60*24*31 </strong>(correspond à 1 mois, time() donnera la date actuelle et le reste est une simple multiplication ms*s*h*j)</li>
            <li>secure à true pour la sécurité</li>
            <li>httponly à true pour éviter des failles XSS</li>
        </ul>
    </li>
</ul>
<pre><code class="language-plaintext">&lt;?php
// retenir l'email de la personne connectée pendant 1 an
setcookie(
   'LOGGED_USER',
   'toto@dupont.com',
   [
       'expires' =&gt; time() + 365*24*60*60,
       'secure' =&gt; true,
       'httponly' =&gt; true,
   ]
);</code></pre>
<p>Pour l'afficher et le récupérer :&nbsp;</p>
<pre><code class="language-plaintext">Bonjour &lt;?php echo $_COOKIE['LOGGED_USER']; ?&gt; !</code></pre>
<p>&nbsp;</p>
<p>Pour le modifier :&nbsp;</p>
<pre><code class="language-plaintext">&lt;?php
setcookie(
    'LOGGED_USER',
    'paul@mirabel.com',
    [
        'expires' =&gt; time() + 365*24*3600,
        'secure' =&gt; true,
        'httponly' =&gt; true,
    ]
);</code></pre>

 <a class="btn btn--primary full-width" href="../exo/exo10.php">Faire l'exercice</a>



 <?php $content = ob_get_clean(); ?>

 <?php require('../inc/template.php'); ?>

