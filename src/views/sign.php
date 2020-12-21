<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/sign.css">
    <link rel="stylesheet" href="../public/style/header.css">
   
    <title>Inscription</title>
</head>
<body>
<?php require('inc/header.php') ;?>

<main>
<div id="fond">
    <div class="page">
        <h1>NEW ACCOUNT</h1>
        <div class="form">
            <form action="?page=signed" method="POST">
                <input type="text" placeholder="Nom" name="lastname" class="btn" required>
                <input type="text" placeholder="Prenom" name="firstname" class="btn" required>
                <input type="email" placeholder="Email" name="email" class="btn" required>
                <input type="text" name="pseudo" placeholder="Pseudo" class="btn" required>
                <input type="password" placeholder="Password" name="password" class="btn" required>
                <input type="submit" name="signup" value="S'inscrire" id="signIn" class="menu">
            </form>
            
        </div>
        <img src="../public/img/connect.svg" id="connect">
    </div>
    </div>
</main>

    
<?php require('inc/footer.php') ;?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>
</html>