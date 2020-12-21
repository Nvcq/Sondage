<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/error.css">
    <link rel="stylesheet" href="../public/style/header.css">
   
    <title>Erreur</title>
</head>
<body>
<?php require('header.php') ;?>

<main id="error">
    <h1> <?= $msgError ?></h1>
    <div id="image">
        <img src="../public/img/error.jpg" alt="Erreur">
    </div>
    
</main>
<?php require('footer.php') ;?>
</body>
</html>