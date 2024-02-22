<?php
     # Vérifier si le formulaire a été soumis
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
          #  Récupérer les données du formulaire
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $_SESSION["message"] = $titre;
        # Préparer la requête de mise à jour
        $requete = "UPDATE post SET titre = :titre, contenu = :contenu WHERE id = :id";
        $statement = $connexion->prepare($requete);
        
        # Exécuter la requête de mise à jour
        $statement->execute(array(':titre' => $titre, ':contenu' => $contenu, ':id' => $id));
        
        # Afficher un message de succès
        $message =  "<strong>Le titre : ".$_SESSION["message"]."</strong> à été bien mis à jour! <br><a href=\"index.php\" class=\"button button-outline btn-primary\">Revenir à l'accueil</a>";
     }     
         catch(PDOException $e)
     {
        # Afficher un message d'erreur
        $erreur = "Erreur lors de la mise à jour de l'article: " . $e->getMessage();
    }
}