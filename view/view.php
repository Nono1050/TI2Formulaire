<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Formulaire</title>
</head>
<body>

<div class="container">
<h1>TI2 | Livre d'or</h1>
<img src="../img/sign-up-amico.png" alt="">

<form action="" method="post">

<div id="prenom">
        <label for="prenomID">Prénom</label>
        <input type="text" id="prenomID" name="prénom" placeholder="Entrez votre prénom" required>
        <span class="error-message" id="PrenomError"></span>
    </div>

    <div id="name">
        <label for="NomID">Nom</label>
        <input type="text" id="NomID" name="nom" placeholder="Entrez votre nom" required>
        <span class="error-message" id="NomError"></span>
    </div>

    <div id="email">
        <label for="emailID">Email</label>
        <input type="email" id="emailID" name="email" placeholder="Entrez votre email" required>
        <span class="error-message" id="EmailError"></span>
    </div>

    <div id="telephone">
        <label for="telephoneID">Téléphone</label>
        <input type="tel" id="telephoneID" name="telephone" placeholder="Entrez votre téléphone" required>
        <span class="error-message" id="TelephoneError"></span>
    </div>

    <div id="message">
        <label for="messageID">Message</label>
        <textarea id="messageID" name="message" rows="11" placeholder="Entrez votre message" required></textarea>
        <span class="error-message" id="MessageError"></span>
    </div>
    <button type="submit" id="btn">Envoyer</button>
    
        
    
</form>

</div>




<?php

$nbMessage = count($articles);
if(empty($nbMessage)): ?>
    <div class="nomessage">
        <h2>Pas de message</h2>
        <p>Veuillez consulter cette page plus tard</p>
    </div>
    <?php else:
         $pluriel = $nbMessage>1? "s" : "";
        ?>
    <div class="messages">
        <h2>Il y a <?=$nbMessage?> message<?=$pluriel?></h2>
      
    
        <?php foreach ($articles as $article): ?>
        <div class="article">
            <h3><?= htmlspecialchars($article['nom']) ?></h3>
            <h3><?= htmlspecialchars($article['prenom']) ?></h3>
            <h3><?= htmlspecialchars($article['email']) ?></h3>
            <h3><?= htmlspecialchars($article['telephon']) ?></h3>
            <h3><?= htmlspecialchars($article['message']) ?></h3>
            <br>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
<script src="script.js"></script>
</body>
</html>
