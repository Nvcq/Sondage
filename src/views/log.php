<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/log.css">
    <link rel="stylesheet" href="../public/style/header.css">
   
    <title>Accueil</title>
</head>
<body>
<?php require('inc/header.php') ;?>

<main>
<div id="fond">
    <div class="page">
        <h1>SIGN IN</h1>
        <div class="form">
            <form action="?page=logged" method="POST">
                <input type="email" placeholder="Email" name="email" class="btn">
                <input type="password" placeholder="Password" name="password" class="btn">
                <input type="submit" name="login" id="signIn" value="SIGN IN" class="menu">
            </form>
            
        </div>
    </div>
</div>

<div id="image">
    <img src="../public/img/connect.jpg">
</div>

</main>
    
<?php require('inc/footer.php') ;?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>
</html>