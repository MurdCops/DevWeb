 <?php
  // Afficher les erreurs à l'écran
  ini_set('display_errors', 1);
  // Afficher les erreurs et les avertissements
  error_reporting(E_ALL);
  ob_start();
  ?>
 <h2>7 - Passage de données entre pages</h2>

 <p>
   On a vu actuellement comment créer des variables, des conditions, des boucles et aussi des tableaux. Mais cela n'a rien de trop dynamique en soit car on reste toujours sur la même page !
   Et justement comment faire transmettre des données entre pages pour récupérer les valeurs et les afficher justement ?! Ca sera possible grâce à 2 méthodes principales ! <br>
   La méthode <code>GET</code> et la méthode <code>POST</code>.<br />
   La première permettra de récupérer des valeurs par l'URL alors que la deuxième passera par un formualaire !
 </p>

 <h3>La méthode GET : passage de données par l'URL</h3>
 <p>
   Si vous n'avez jamais fait attention, regardez bien l'URL qu'affiche YouTUbe (ou tout autre site) une fois une recherche faite.
   Par exemple si on recherche "Elvis Presley", dans l'URL on aura ça :<br />
   <code>https://www.youtube.com/results?search_query=elvis+presley</code><br>
   On peut voir dans l'URL qu'il y a plein de choses qui se sont rajoutés, on va analyser tout cela !
 <ul>
   <li>Le <strong>results</strong> : signifie qu'on se trouve sur la page de résultats, on peut imaginer que cette page soit resultats.php mais qu'elle a été renommée ici</li>
   <li>Puis il y a le <strong>?</strong> : permet de dire que les paramètres à transmettre sont à venir</li>
   <li>Et il y a <strong>search_query=</strong> : il s'agit du nom du paramètre</li>
   <li>Enfin il y a <strong>elvis+presley</strong> : il s'agit de la valeur qu'on a voulu transmettre</li>
 </ul>
 En transmettant les informations de la sorte, la page resultat.php recevra le fait qu'on recherche le terme "Elvis Presley" !<br>
 Il est tout a fait possible aussi d'avoir plusieurs paramètres, en les séparant par un <code>&</code><br>
 Exemple : <code>https://www.monsite.com/maPage.php?parametre1=aaa&amp;parametre2=bbb&amp;parametre3=ccc</code><br>
 Où le premier paramètre renvoi "aaa", le 2ème "bbb" et le 3ème "ccc".<br><br>

 Et justement comment récupérer ces valeurs une fois passées?! Ca sera grâce à la méthode <code>GET</code> ! Pour récupérer la première valeur il suffit de l'appeller <code>$_GET[NOMduPARAMETRE]</code>, donc <code>$_GET['parametre1']</code> et le deuxième <code>$_GET['parametre2']</code> et <code>$_GET['parametre3']</code> pour finir<br><br>
 Exemple complet : Si on veux passer en paramètre le nom et prénom de quelqu'un, il faudra écrire :<br />
 Dans le fichier <strong>index.php</strong> : <br />
 <pre>
       <span><</span>?php
          echo "<span><</span>a href='maPage.php?nom=Hugo&amp;prenom=Victor'>Dis-moi bonjour !<span><</span>/a>";
      ?>
    </pre>
 <br>
 Dans le fichier <strong>maPage.php</strong>, pour récupérer les valeurs :
 <pre>
       <span><</span>?php
          echo "Bonjour ".$_GET['prenom']." ".$_GET['nom']; // Affichera Bonjour Victor Hugo
      ?>
    </pre>

 Cette méthode est bien mais ne permet pas de transmettre de longue information comme tout un texte et de plus, le fait qu'on voit les informations sur l'URL, ne rend pas le transfère de données "sécurisé", on va alors préférer la méthode suivante, la méthode POST !
 </p>
 <h2>La méthode POST par les formulaires</h2>
 Cette méthode va fonctionner presque comme la méthode GET mais on va transmettre les informations par rapport à un formulaire, ce qui va permettre d'ajouter de l'intéractivité !!<br />
 Sauf qu'ici au lieu de passer les données directement dans les liens grâce aux paramètres, ça sera grâce au <strong>name</strong> des champs dans le formulaire !<br>
 D'ailleurs, à quoi ressemble un formulaire déjà :
 <pre>
  <span><</span>form action="cible.php" method="post">
        <span><</span>label>Ici pour un champ de saisie simple<span><</span>/label>
        <span><</span>input type="text" name="prenom" />
        <input type="text" name="prenom" />

        <span><</span>label>Ici pour un champ de saisie de long texte<span><</span>/label>
        <span><</span>textarea name="message" rows="8" cols="45">
        Votre message ici.
        <span><</span>/textarea>
        <textarea name="message" rows="8" cols="45">
        Votre message ici.
        </textarea>

        <span><</span>label>Ici pour une liste déroulante<span><</span>/label>
        <span><</span>select name="choix">
            <span><</span>option value="choix1">Choix 1<span><</span>/option>
            <span><</span>option value="choix2">Choix 2<span><</span>/option>
            <span><</span>option value="choix3">Choix 3<span><</span>/option>
            <span><</span>option value="choix4">Choix 4<span><</span>/option>
        <span><</span>/select>
         <select name="choix">
            <option value="choix1">Choix 1
            <option value="choix2">Choix 2
            <option value="choix3">Choix 3
            <option value="choix4">Choix 4
        </select>

        <span><</span>label>Ici pour une liste case à cocher<span><</span>/label>
           
        <span><</span>input type="checkbox" name="salade">Salade
        <span><</span>input type="checkbox" name="tomate"
         checked>Tomate  
        <span><</span>input type="checkbox" name="oignon">Oignon
        <input type="checkbox" name="salade">Salade
        <input type="checkbox" name="tomate" checked>Tomate
        <input type="checkbox" name="oignon">Oignon
    


        <span><</span>label>Ici pour un radio bouton<span><</span>/label>
        <span><</span>input type="radio" name="frites" value="oui" id="oui" checked="checked" />Oui
        <span><</span>input type="radio" name="frites" value="non" id="non" /> Non
        <input type="radio" name="frites" value="oui" id="oui" checked="checked" /> Oui
        <input type="radio" name="frites" value="non" id="non" /> Non

        <span><</span>label>Ici un bouton pour valider le formulaire<span><</span>/label>
        <span><</span>input type="submit" value="Valider" />
        <input type="submit" value="Valider" />
  <span><</span>/form>
</pre>
 <br>
 Maintenant si on veut à nouveau transmettre le nom et le prénom, on va faire un formulaire, comme <strong>action</strong> du <code>form</code> on va choisir la page vers laquelle on va retourner le formulaire puis on va utiliser les <code>name</code> comme paramètre.<br>
 Sans oublier le plus important, préciser dans la balise <code>form</code> ceci : la <code>method="post"</code>
 <pre>
  <span><</span>form action="maPage.php" method="post">
        
    Prénom : <span><</span>input type="text" name="prenom" />
    Nom : <span><</span>input type="text" name="nom" />

   <span><</span>input type="submit" value="Valider" />
 <span><</span>/form>
</pre>
 Puis dans ma page où on récupérera les résultats, on pourra utiliser les résultats de la sorte : <code>$_POST['prenom']</code> et <code>$_POST['nom']</code>
 <br>
 On aura une page maPage.php comme ceci :
 <pre>
       <span><</span>?php
          echo "Bonjour ".$_POST['prenom']." ".$_POST['nom'];
      ?>
  </pre>
 Sera alors affiché le prénom et le nom saisi au préalable par l'utilisateur !

 <h2>Attention à la sécurité !</h2>
 <p>
   Vu que les données vont dépendre des utilisateurs, des petits malins peuvent s'amuser à mettre tout et n'importe quoi !
 </p>
 <p>C'est pourquoi, il est nécessaire de vérifier les données via des méthodes comme <code>isset</code>(permet de vérifier que les données sont remplis) mais aussi à l'aide de <code>htmlspecialchars</code> (qui permet de convertir les caractères spéciaux : <strong>utile contre les failles XSS</strong>)</p>
 <p>Il existe également la méthode <code>strip_tags</code> qui permet de retirer des balises, à nouveau pour éviter des failles XSS</p>
 <p>Exemple :</p>

 <pre>
<span><</span>?php
if(isset($_POST['prenom']) && isset($_POST['nom'])){
  echo "Bonjour ".$_POST['prenom']." ".$_POST['nom'];
}else{
  echo 'Erreur dans les données saisies.'
}
  
?>
</pre>
 <p>
   <a class="btn btn--primary full-width" href="../exo/exo7.php">Faire les exercices</a>
 </p>

 <?php $content = ob_get_clean(); ?>
 <?php require('../inc/template.php'); ?>