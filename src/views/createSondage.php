<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/createSondage.css">
    <link rel="stylesheet" href="../public/style/header.css">
    <title>Créer votre sondage</title>
</head>
<body>
<?php require('inc/header.php') ;?>
    <main>

    <div id="fond">
    <div class="page">
        <h1>AJOUTER UN SONDAGE</h1>
        <div class="form">
             <form action="?page=creating" method="POST">
               <input type="text" placeholder="QUESTION" name="question" class="btn" id="Question" required> <br>
               <input type="text" placeholder="Choix 1" name="choice1" class="btn" id="Choix1" required> <br>
               <input type="text" placeholder="Choix 2" name="choice2" class="btn" id="Choix2" required> <br>
               
               <label for="ending_date" class="label">Clôture du sondage:</label> <br>
               <input type="datetime-local" name="ending_date" class="btn"> <br>

               
               <button name="create" id="signIn" class="menu">PUBLIER</button>
             </form>
            
        </div>
    </div>
    </div>

    </main>
    
    <?php require('inc/footer.php') ;?>
</body>
</html>