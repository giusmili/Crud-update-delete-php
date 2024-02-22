<?php


include_once __DIR__ . "/config.inc.php";
   
   try {
       $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
       # Définir le mode d'erreur PDO sur exception
       $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
       # Récupérer les articles depuis la base de données
       $requete = "SELECT * FROM post ORDER BY id ASC LIMIT 10";
       $resultat = $connexion->query($requete);
       
       if ($resultat->rowCount() > 0) {
           # Afficher les articles sous forme de liste
           print"<ul class=\"list-primary\">";
           while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
               print"<li>";
               print"<strong>Sujet:</strong> ".$ligne["id"]."</li>";
               print"<li><strong>Langage:</strong> ".$ligne["titre"]."</li>";
               print"<li><strong>Déscription:</strong> ".$ligne["contenu"]."</li>";
               print"<li><strong>Date:</strong> ".$ligne["date_modification"]."</li>";
               # partie à modifier ou supprimer
               echo"<li>
               <a href='modifier_article.php?id=".$ligne["id"]."' 
               class=\"button button-outline btn-primary\">
               <span class=\"material-symbols-outlined\">
                edit
               </span>
               Modifier</a>  
               <a href='supprimer_article.php?id=".$ligne["id"]."' 
               class=\"button button-outline btn-warning\">
               <span class=\"material-symbols-outlined\">
                    delete
                </span>
               Supprimer</a></li>";
           }
           print"</ul>";
       } else {
           print"Aucun article trouvé dans la base de données.";
       }
   } catch(PDOException $e) {
       print"Erreur de connexion à la base de données: " . $e->getMessage();
   }
   
   # Fermer la connexion à la base de données
   $connexion = null;
   ?>
   
