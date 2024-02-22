<?php
      try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Récupérer les données de l'article à modifier
        $article_id = $_GET['id'];
        $requete_article = "SELECT * FROM post WHERE id = :id";
        $statement_article = $connexion->prepare($requete_article);
        $statement_article->execute(array(':id' => $article_id));
        $article = $statement_article->fetch(PDO::FETCH_ASSOC);
        
        // Afficher le formulaire de mise à jour avec les données de l'article
        if($article) { ?>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                <label for="titre">Votre titre:</label>
                <input type="text" id="titre" name="titre" value="<?php echo $article['titre']; ?>">
                <label for="contenu">Votre contenu:</label>
                <textarea id="contenu" name="contenu"><?php echo $article['contenu']; ?></textarea>
                <input type="submit" class="button button-outline btn-primary" value="Modifier">
            </form>
        <?php } else { ?>
            <p>Aucun article trouvé avec cet identifiant.</p>
        <?php }
    } catch(PDOException $e) {
        // Afficher un message d'erreur
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
}