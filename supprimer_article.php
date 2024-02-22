<?php
    include_once __DIR__ ."/controller/head.inc.php";
?>
<body>
    <header>
        
        <h1>
            <span aria-hidden="true">🔒️</span>
            Liste des langages de programmation 2024 admin
        </h1>
    </header>
    <div class="logo-admin" role="region" aria-labelledby="logo admin">
        <img src="./asset/admin.svg" alt="admin logo" id="logo admin">
    </div>
<main>

<?php
include_once __DIR__ . "/controller/config.inc.php";

# encapsuler dans une classe

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $article_id = $_GET['id'];

        try {
            $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            # Récupérer les détails de l'article à supprimer
            $requete = "SELECT * FROM post WHERE id = :id";
            $statement = $connexion->prepare($requete);
            $statement->bindParam(':id', $article_id, PDO::PARAM_INT);
            $statement->execute();
            $article = $statement->fetch(PDO::FETCH_ASSOC);

            # Vérifier si l'article existe
            if($article) {
                # Afficher les détails de l'article
                print "<h2 class=\"sub-title\">Confirmation de suppression de l'article</h2>";
                print "<p><strong>Sujet:</strong> " . $article['id'] . "</p>";
                print "<p><strong>Titre:</strong> " . $article['titre'] . "</p>";
                print "<p><strong>Description:</strong> " . $article['contenu'] . "</p>";
                print "<p><strong>Date:</strong> " . $article['date_modification'] . "</p>";
                print "<p class=\"error-warning\">Êtes-vous sûr de vouloir supprimer cet article ?</p>";
                print "<form action='supprimer_article.php' method='get'>";
                print "<input type='hidden' name='id' value='" . $article['id'] . "'>";
                print "<input type='submit' name='submit' value='Oui, supprimer' class=\"button button-outline btn-warning\"> ";
                print "<a href='index.php' class=\"button button-outline btn-primary\">Revenir à l'acceuil</a>";
                print "</form>";
            

                # Si le formulaire est soumis et que l'utilisateur confirme la suppression
                if(isset($_GET['submit']) && $_GET['submit'] == 'Oui, supprimer') {
                    # Requête de suppression de l'article
                    $requete_delete = "DELETE FROM post WHERE id = :id";
                    $statement_delete = $connexion->prepare($requete_delete);
                    $statement_delete->bindParam(':id', $article_id, PDO::PARAM_INT);
                    $statement_delete->execute();

                    print "<p>L'article a été supprimé avec succès.</p>";
                }
            } else {
                print "L'article à supprimer n'a pas été trouvé.";
            }
        } catch(PDOException $e) {
            print "Erreur de suppression de l'article: " . $e->getMessage();
        }
    } else {
            print "L'ID de l'article à supprimer n'est pas spécifié.";
    }

?>
</main>
<?php
        include_once __DIR__ ."/controller/footer.inc.php";
?>
</body>
</html>
