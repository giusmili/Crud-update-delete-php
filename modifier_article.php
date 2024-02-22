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
   
    include_once __DIR__ . "/controller/update.inc.php";
?>
    
    <h2 class="sub-title">
        <img src="./asset/pencil.png" alt="modifier"
        class="modifier" aria-hidden="true" loading="lazy">
        Modifier cet article
        
    </h2>
    
        <?php if(isset($message)) { ?>
            <p class="warning-default success-warning"><?php echo $message; ?></p>
        <?php } ?>
        
        <?php if(isset($erreur)) { ?>
            <p class="warning-default error-warning"><?php echo $erreur; ?></p>
        <?php } ?>
        
 <?php
     include_once __DIR__ . "/controller/select.inc.php";
 ?>
 </main>

<?php
        include_once __DIR__ ."/controller/footer.inc.php";
?>
    
</body>
</html>

<?php
   // Fermer la connexion à la base de données
   $connexion = null;
?>


</body>
</html>