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
<h1>Formulaire de contact</h1>

<form action="" method="post">

    <div id="name">
        <label for="NomID">Nom</label>
        <input type="text" id="NomID" name="nom" placeholder="Entrez votre nom" required>
        <span class="error-message" id="NomError"></span>
    </div>

    <div id="prenom">
        <label for="prenomID">Prénom</label>
        <input type="text" id="prenomID" name="prenom" placeholder="Entrez votre prénom" required>
        <span class="error-message" id="PrenomError"></span>
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


if (empty($articles)) {?>
  <h1>pas de message</h1>
<?php } else { ?>
    <div id='containerTable' class='containerTable'>
    <h1>Liste des messages</h1>
    <h3 id="error"></h3>
    <div id="tableau">
        
    
        

        <?php foreach ($articles as $article): ?>
            

            <div class="article">
                <h3><?= htmlspecialchars($article['nom']) ?></h3>
               <h3> <?= htmlspecialchars($article['prenom']) ?></h3>
                <h3><?= htmlspecialchars($article['email']) ?></h3>
                <h3><?= htmlspecialchars($article['telephon']) ?></h3>
                <h3><?= htmlspecialchars($article['message']) ?></h3>
                <br

            </div>
        <?php endforeach; ?>
    </div>
   
</div>
<?php } ?>
<script>
function verificationDeInput() {
    const btn = document.getElementById("btn");

    const nomError = document.getElementById("NomError");
    const prenomError = document.getElementById("PrenomError");
    const emailError = document.getElementById("EmailError");
    const telephoneError = document.getElementById("TelephoneError");
    const messageError = document.getElementById("MessageError");

    const nameRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/;
    const prenomRegex = /^[A-Za-zÀ-ÿ\s'-]{2,50}$/;
    const emailRegex = /^[\w.-]+@[\w.-]+\.\w{2,}$/;
    const telRegex = /^(?:\+32|0)[1-9]\d{7,8}$/;
    const messageRegex = /^.{5,1000}$/;

    btn.addEventListener('click', function (e) {
        let isValid = true;

        const inputName = document.querySelector("#NomID").value.trim();
        const inputPrenom = document.querySelector("#prenomID").value.trim();
        const inputEmail = document.getElementById("emailID").value.trim();
        const inputTel = document.querySelector("#telephoneID").value.trim();
        const inputMessage = document.querySelector("#messageID").value.trim();

        // Nom
        if (inputName == "") {
            nomError.textContent = "Nom est vide";
            nomError.style.color = "red";
            isValid = false;
        } else if (!nameRegex.test(inputName)) {
            nomError.textContent = "Nom n'est pas valide";
            nomError.style.color = "red";
            isValid = false;
        } else {
            nomError.textContent = "";
        }

        // Prénom
        if (inputPrenom == "") {
            prenomError.textContent = "Prénom est vide";
            prenomError.style.color = "red";
            isValid = false;
        } else if (!prenomRegex.test(inputPrenom)) {
            prenomError.textContent = "Prénom n'est pas valide";
            prenomError.style.color = "red";
            isValid = false;
        } else {
            prenomError.textContent = "";
        }

        // Email
        if (inputEmail == "") {
            emailError.textContent = "Email est vide";
            emailError.style.color = "red";
            isValid = false;
        } else if (!emailRegex.test(inputEmail)) {
            emailError.textContent = "Email n'est pas valide";
            emailError.style.color = "red";
            isValid = false;
        } else {
            emailError.textContent = "";
        }

        // Téléphone
        if (inputTel == "") {
            telephoneError.textContent = "Téléphone est vide";
            telephoneError.style.color = "red";
            isValid = false;
        } else if (!telRegex.test(inputTel)) {
            telephoneError.textContent = "Téléphone n'est pas valide";
            telephoneError.style.color = "red";
            isValid = false;
        } else {
            telephoneError.textContent = "";
        }

        // Message
        if (inputMessage == "") {
            messageError.textContent = "Message est vide";
            messageError.style.color = "red";
            isValid = false;
        } else if (!messageRegex.test(inputMessage)) {
            messageError.textContent = "Message n'est pas valide";
            messageError.style.color = "red";
            isValid = false;
        } else {
            messageError.textContent = "";
        }

        if (!isValid) {
            e.preventDefault(); 
        }
    });
}

verificationDeInput();
</script>


</body>
</html>
