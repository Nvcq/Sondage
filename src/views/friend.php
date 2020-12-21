<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/friend.css">
    <link rel="stylesheet" href="../public/style/header.css">
   
    <title>Mes amis</title>
</head>
<body>
<?php require('inc/header.php') ;?>

<main>
   
    <h3> MES AMIS </h3>

    <p><?= $hasFriends ?></p>

    <section class="ami">
   
        <article class="mesAmi">
<ul>
<?php foreach($friends as $friend) { ?>
    <li>
        <h1><?= $friend['pseudo'] ?></h1>
        <p id="mail"><?= $friend['email'] ?></p>
        <a href="?page=removeFriend&id=<?= $friend['friend_asked'] ?>" id='suppr'>SUPPRIMER</a>
    </li>
<?php } ?>
    
</ul>
        </article>
        <article class="ajoutAmi">
<form action="?page=addFriend" method="POST" class="plusami">
    <label>Ajouter un ami avec son email:</label>
    <input type="email" placeholder="John@doe.fr" name="email" class="btn">
    <input type="submit" name="addFriend" value="Ajouter" class="menu">
</form>
        </article>
    </section>
</main>
    
<?php require('inc/footer.php') ;?>
</body>
</html>