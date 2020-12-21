<?php if($_SESSION['id'] === $sondage->user_id) {
    echo 'Vous ne pouvez pas répondre a votre propre sondage';
    die();
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/answer.css">
  <link rel="stylesheet" href="../public/style/header.css">

  <title>Accueil</title>
</head>

<body>
<?php include 'inc/header.php' ?>
  <main id="sondageqst">
  <h3 id="rep">Répondre au sondage de <?= $sondage->pseudo ?></h3>
  <div class="form">
            
            <h1 id="reph1">Question : <?= $sondage->question ?></h1>

            <form>
                <div id="centerInput">
                    <input type="submit" value="<?= $sondage->choice1 ?>" name="choice1" id="choice1" class="btn"><br>

                    <input type="submit" value="<?= $sondage->choice2 ?>" name="choice2" id="choice2" class="btn"> <br>
                </div>
                

                <input type="hidden" value="<?= $sondage->sondage_id ?>" name="sondage_id" id="sondage_id">

                <input type="hidden" value="<?= $_SESSION['id'] ?>" name="user_id" id="user_id">
            </form>
           
            <div id="voted"></div>
  </div>

  <div id="image">
    <img src="../public/img/resultat.jpg" alt="Répondre">
  </div>

    </main>
    <?php include 'inc/footer.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../public/js/rep.js" type="text/javascript"></script>
</body>

</html>
