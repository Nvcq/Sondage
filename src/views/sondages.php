<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sondages.css">
    <link rel="stylesheet" href="../public/style/header.css">
   
    <title>Résultat</title>
</head>
<body>
<?php require('inc/header.php') ;?>

<main>
    <section class="section1">

    <h2>Résultats de mes derniers sondages</h2>

<article>

<div class="sondage">

    <p><?= $hasSondages ?></p>

    <?php foreach($sondages as $sondage): ?>

    <div class="questions">
        <p id="q">Question : <?= $sondage['question'] ?></p>

        <p>Choix 1 : <?= $sondage['choice1'] ?></p> 

        <p>Choix 2 : <?= $sondage['choice2'] ?></p> <br>

        <a href="?page=result&id=<?= $sondage['sondage_id'] ?>">Voir les réponses</a>
    </div>
 <?php endforeach ?>

<div id="image">
     <img src="../public/img/resultat.jpg" alt="resultat">
 </div>
 
  </div>
</div>

</article>
</section>

</main>
    
 <?php require('inc/footer.php') ;?>
</body>
</html>