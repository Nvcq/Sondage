<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/profile.css">
    <link rel="stylesheet" href="../public/style/header.css">

    <title>Profil</title>
</head>
<body>
<?php require('inc/header.php') ;?>

<main>

    <h1>Bienvenue sur le profil</h1>


<section class="profil">

    <article class="infoProfil">
        <h3>Infos du profil</h3>
        <p>Pseudo : <?= $_SESSION['pseudo'] ?></p>
        <p>Nom : <?= $_SESSION['lastname'] ?></p>
        <p>Prénom : <?= $_SESSION['firstname'] ?></p>
        <p>Email : <?= $_SESSION['email'] ?></p> <br>
        <a href="?page=changeProfile" id="aBtn">Modifier</a>
    </article>
</section>

<div id="image">
     <img src="../public/img/profil.jpg" alt="Profile">
 </div>
</main>

<?php require('inc/footer.php') ;?>
</body>
</html>