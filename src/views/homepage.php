<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/style/homepage.css">
  <link rel="stylesheet" href="../public/style/header.css">

  <title>Accueil</title>
</head>

<body>
<?php require('inc/header.php') ;?>


  <main>
    <section class="section1">
      <h1>Bienvenue sur votre site de sondage préféré. </h1>
      <h2> Vos derniers sondages</h2>
      <article>

        <div class="sondage">

        <?php if(isset($_SESSION['email'])) echo '<h3>' . $hasSondages . '</h3>'; ?>
        <?php if(!isset($_SESSION['email'])) echo '<h3>Vous devez vous connecter pour voir vos sondages</h3>' ?>

          <?php if(isset($_SESSION['email'])) {
              foreach($mine as $my) { ?>

                <div class="questions">
    
                  <p id="q">Question : <?= $my['question'] ?></p>
    
                    <p>Choix 1 : <?= $my['choice1'] ?></p> 
    
                    <p>Choix 2 : <?= $my['choice2'] ?></p> <br>
    
                    <a href="?page=result&id=<?= $my['sondage_id'] ?>">Voir les réponses</a>
                </div>
              <?php }  }?>
          
        </div>

      </article>
    </section>

    <hr>

    <section class="section2">
      <h2> Les sondages de vos amis </h2>
      <article>
        <div class="sondage">
        
        <?php if(isset($_SESSION['email'])) echo '<h3>' . $hasFriendSondages . '</h3>'; ?>
        <?php if(!isset($_SESSION['email'])) echo '<h3>Vous devez vous connecter pour voir les sondages de vos amis</h3>' ?>

          <?php if(isset($_SESSION['email'])) {
            foreach($friends as $friend) { ?>

              <div class="questions">
                <h4>Créer par <?= $friend['pseudo'] ?>, <?php if($friend['time'] > 0 ) {
                echo " plus que " . $friend['time'] . " heures pour répondre !";
                } else {
                echo "le sondage est terminé...";
                }  ?></h4><br> <hr>
                <p id="q">Question : <?= $friend['question'] ?></p>
  
                <p>Choix 1 : <?= $friend['choice1'] ?></p> 
  
                <p>Choix 2 : <?= $friend['choice2'] ?></p> <br>
  
                <a href="?page=answer&id=<?= $friend['sondage_id'] ?>">Répondre</a> <br><br>
                <a href="?page=result&id=<?= $friend['sondage_id'] ?>">Voir les résultats</a>
              </div>
  
            <?php } } ?>
                     
        </div>

      </article>
    </section>

  </main>

  <?php require('inc/footer.php') ;?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../public/js/main.js"></script>
</body>

</html>