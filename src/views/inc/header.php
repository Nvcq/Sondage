<header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="?page=mySondages">Resultats</a></li>
            <li><a href="?page=friend">Amis</a></li>
            <li><a href="?page=createSondage">Sondage</a></li>

            <?php 
                if(isset($_SESSION['email'])) {
                    echo '<li><a href="?page=logout">Se déconnecter</a></li>';
                    echo '<li><a href="?page=profile">Bonjour ' . $_SESSION["pseudo"] . ' !</a></li>';
                }
                else {
                    echo '<li><a href="?page=log">Connexion</a></li>';
                    echo '<li><a href="?page=sign">Inscription</a></li>';
                }
            
            ?>

            
            
          </ul>
    </nav>
</header>