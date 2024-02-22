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
            include_once __DIR__."/controller/connect.inc.php";   
        ?>

    </main>
    <?php
        include_once __DIR__ ."/controller/footer.inc.php";
    ?>
</body>
</html>



