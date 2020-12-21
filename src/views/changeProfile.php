<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/changeProfile.css">
    <link rel="stylesheet" href="../public/style/header.css">
   
    <title>Profil</title>
</head>
<body>
<?php require('inc/header.php') ;?>

<h1>Modifier les infos du profil</h1>

<main class="modifprofil">

    <form action="?page=changed" method="POST" class="modif">
            <input type="text" placeholder="pseudo" name="pseudo" class="btn" value="<?= $_SESSION["pseudo"] ?>">
            <input type="text" placeholder="nom" name="lastname" class="btn" value="<?= $_SESSION["lastname"] ?>">
            <input type="text" placeholder="prenom" name="firstname" class="btn" value="<?= $_SESSION["firstname"] ?>">
            <input type="email" placeholder="email" name="email" class="btn" value="<?= $_SESSION["email"] ?>">
            <input type="password" placeholder="Nouveau mot de passe (remettez le même si vous ne voulez pas changer)" name="password" class="btn">
            <input type="password" placeholder="Mot de passe" name="exPassword" class="btn">
            <button class="menu" name="changeProfile">VALIDER LES MODIFICATIONS</button>
            <button class="menu" name="cancelProfile" id="btnEnd">ANNULER LES MODIFICATIONS</button>
    </form>

</main>

<?php require('inc/footer.php') ;?>
</body>
</html>