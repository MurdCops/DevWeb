 <?php
	// Afficher les erreurs à l'écran
	ini_set('display_errors', 1);
	// Afficher les erreurs et les avertissements
	error_reporting(E_ALL);
	ob_start();
	?>
 <h1>6 - Les fonctions</h1>

 <p>On a pu voir comment &eacute;crire du code simplement en faisant une instruction apr&egrave;s une autre, mais on peut voir que c&#39;est <strong>redondant </strong>!&nbsp;</p>

 <p>Pour am&eacute;liorer &ccedil;a, on peut cr&eacute;er des <strong>fonctions </strong>!&nbsp;</p>

 <p>Une fonction est une s&eacute;rie d&#39;instructions qui <strong>effectue des actions</strong> et qui <strong>retourne une valeur</strong>.</p>



 <pre>
<code class="language-php">&lt;?php 

// Déclaration de la fonction
function hello(){
echo "Bonjour !";
}

// Appel de la fonction
hello();


?&gt;
</code></pre>



 <h2>Les types de fonctions&nbsp;</h2>

 <p>En terme d&#39;algorythmie, une fonction peut &ecirc;tre de 2 types :&nbsp;</p>

 <ul>
 	<li>Une <strong>proc&eacute;dure </strong>permet d&#39;appliquer une ou plusieurs instructions</li>
 	<li>Une <strong>fonction </strong>permet d&#39;appliquer &eacute;galement une ou plusieurs instructions mais elle <strong>retourne </strong>une valeur</li>
 </ul>

 <pre>
<code class="language-php">&lt;?php 

// Déclaration de la fonction
function hello(){

return "Bonjour !";
}

// Appel de la fonction
$txt = hello(); 

echo $txt; // Affichera "Bonjour !"

?&gt;</code></pre>





 <h2>Les param&egrave;tres</h2>

 <p>Si on veut utiliser une fonction avec des donn&eacute;es ext&eacute;rieures diff&eacute;rentes, on va devoir utiliser des <strong>param&egrave;tres</strong>.</p>

 <p>Ces &eacute;l&eacute;ments se mettent <strong>entre parenth&egrave;se </strong>de la fonction au niveau de la d&eacute;claration mais aussi lors de l&#39;appel !&nbsp;</p>

 <p>On pourra alors r&eacute;cup&eacute;rer les valeurs &agrave; l&#39;int&eacute;rieur de la fonction !&nbsp;</p>



 <pre>
<code class="language-php">&lt;?php 

// Déclaration de la fonction
function hello($name){

return "Bonjour $name!";
}

// Appel de la fonction
$txt = hello("Jean-Jacques"); 

echo $txt; // Affichera "Bonjour Jean-Jacques!"

?&gt;</code></pre>



 <p>On peut &eacute;galement mettre des <strong>valeurs par d&eacute;faut </strong>dans nos param&egrave;tres, ce qui est parfois bien utile !! Pour cela, il suffit lors de la d&eacute;claration de mettre<strong> $maVariable = maValeur</strong></p>

 <pre>
<code class="language-php">&lt;?php 

// Déclaration de la fonction
function hello($name="Toto"){

return "Bonjour $name!";
}

// Appel de la fonction
$txt = hello(); 
$txtSecond = hello("Jean-Jacques"); 

echo $txt; // Affichera "Bonjour Toto!"
echo $txtSecond ; // Affichera "Bonjour Jean-Jacques!"

?&gt;</code></pre>



 <p>Bien &eacute;videmment, on peut mettre plusieurs param&egrave;tres &agrave; nos fonctions, pour cela les param&egrave;tres doivent &ecirc;tre s&eacute;par&eacute;s de virgule.</p>

 <p>Attention s&#39;il y a un param&egrave;tre par d&eacute;faut, il faudra le mettre en dernier pour &eacute;viter les erreurs.</p>



 <pre>
<code class="language-php">&lt;?php 

// Déclaration de la fonction
function hello($lastname,$name="Toto"){

return "Bonjour $name $lastname!";
}

// Appel de la fonction
$txt = hello("Bond"); 
$txtSecond = hello("Bond", "Jean-Jacques"); 

echo $txt; // Affichera "Bonjour Toto Bond!"
echo $txtSecond ; // Affichera "Bonjour Jean-Jacques Bond!"

?&gt;</code></pre>

 <h2>&nbsp;</h2>

 <h2>Le typage des donn&eacute;es</h2>

 <p>Depuis PHP 7 (2016), il est d&eacute;sormais possible de <strong>typer les donn&eacute;es</strong>.</p>

 <p>Voici les types possibles :&nbsp;</p>

 <ul>
 	<li>&quot;boolean&quot; or &quot;bool&quot;</li>
 	<li>&quot;integer&quot; or &quot;int&quot;</li>
 	<li>&quot;float&quot; or &quot;double&quot;</li>
 	<li>&quot;string&quot;</li>
 	<li>&quot;array&quot;</li>
 	<li>&quot;object&quot;</li>
 	<li>&quot;null&quot;</li>
 </ul>

 <p>Et &ccedil;a sera d&#39;autant plus utile dans les fonctions !&nbsp; Car si on d&eacute;clare dans les param&egrave;tres que l&#39;on souhaite un type pr&eacute;cis mais que dans l&#39;appel ce n&#39;est pas respect&eacute;, alors le PHP va renvoyer un gros <strong>FATAL ERROOOOR </strong>!&nbsp;</p>

 <pre>
<code class="language-php">&lt;?php 

// Déclaration de la fonction
function hello(string $name){

return "Bonjour $name!";
}

// Appel de la fonction
$txt = hello("Jean-Jacques"); 

echo $txt; // Affichera "Bonjour Jean-Jacques!"


// ********* FATAL ERROR ************
$txtERROR = hello(5); 

?&gt;</code></pre>
 Résultat : <strong>
 	<?php

		// Déclaration de la fonction
		function hello(int $nombre)
		{

			return "Bonjour $nombre!";
		}

		// Appel de la fonction
		$txt = hello(65465);

		echo $txt; // Affichera "Bonjour Jean-Jacques!"

		?>
 </strong>
 <p>Egalement si la fonction retourne une donn&eacute;e avec un type pr&eacute;cis, alors on pourra le pr&eacute;ciser !</p>

 <ul>
 </ul>

 <pre>
<code class="language-php">&lt;?php 

// Déclaration de la fonction
function hello(string $name): string {

return "Bonjour $name!";
}

// Appel de la fonction
$txt = hello("Jean-Jacques"); 

echo $txt; // Affichera "Bonjour Jean-Jacques!"


// ********* FATAL ERROR ************
// Déclaration de la fonction
function helloERROR(string $name): int{

return "Bonjour $name!";
}

// Appel de la fonction
$txtERROR = helloERROR("Jean-Jacques"); 

echo $txtERROR ; 

?&gt;</code></pre>



 <p><u>Remarques :&nbsp;</u></p>

 <p>Il est possible de combiner plusieurs types en mettant un <strong>pipe</strong> | , exemple function essai2(int|string $truc): bool|string</p>

 <p>Et on peut accepter que le r&eacute;sultat soit nul &agrave; l&#39;aide d&#39;un <strong>? </strong>, exemple&nbsp;&nbsp;function essai(?string $truc): ?int</p>

 <h2>&nbsp;</h2>

 <pre>
<code class="language-php">&lt;?php 


if(0 == "0"){
echo "Youpi je passe"
}else{
echo "Ca contrôle un peu ici";
}



if(0 === "0"){
echo "Youpi je passe !!! C'est incroyaaaable !! ";
}else{
echo "Aie ça contrôle sévère ici";
}

?&gt;</code></pre>
 Résultat : <strong>
 	<?php
		if (0 == "0") {
			echo "Youpi je passe !!! C'est incroyaaaable !! ";
		} else {
			echo "Aie ça contrôle sévère ici";
		}
		?>
 </strong>
 <p>On a vu pr&eacute;c&eacute;demment qu&#39;on pouvait contr&ocirc;ler les donn&eacute;es avec des conditions du type == ou !=.<br />
 	Mais si on fait 0 == &quot;0&quot;, on voit que le r&eacute;sultat renvoie true, alors que le type n&#39;est pas le m&ecirc;me.</p>

 <p>Il faudra alors utilis&eacute; une triple &eacute;galit&eacute; pour que ce soit strictement &eacute;gale ! Idem pour &ecirc;tre strictement diff&eacute;rent.</p>





 <h2>Les fonctions int&eacute;gr&eacute;es &agrave; PHP</h2>

 <p>Le language &eacute;tant robuste et ancien, il est compos&eacute; de centaiiiiiiiines de fonctions super utile ! Pour toutes les voir, vous pouvez les retrouver :</p>

 <ul>
 	<li>Sur la documentation officielle :&nbsp;<a href="https://www.php.net/">https://www.php.net/</a></li>
 	<li>Sur un site bien fourni :&nbsp;<a href="https://www.w3schools.com/PhP/php_ref_overview.asp">https://www.w3schools.com/PhP/php_ref_overview.asp</a></li>
 </ul>

 <p> Il existe de dizaines de chouettes fonctions mais on peut mettre en avant :
 <ul>
 	<li>isset : permet de vérifier si la variable est bien rempli</li>
 	<li>empty : permet de vérifier si la variable est vide</li>
 	<li>unset : permet de détruire une variable ou l’élément d’un tableau</li>
 	<li>sort : permet de trier un tableau</li>
 	<li>in_array : permet de vérifier la présence d'une valeur dans un tableau</li>
 	<li>str_replace : permet de rechercher et remplacer une chaîne de caractères</li>
 </ul>

 </p>

 <p>
 	<a class="btn btn--primary full-width" href="../exo/exo7.php">Faire les exercices</a>
 </p>
 <?php $content = ob_get_clean(); ?>
 <?php require('../inc/template.php'); ?>