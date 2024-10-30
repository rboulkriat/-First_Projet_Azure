<?php
require_once 'vue_generique.php';

class VueContacts extends VueGenerique {
    public function afficherFormulaireMessage() {
        ?>
            <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Formulaire de Contact</title>
            <link rel="stylesheet" type="text/css" href="css/style_contacts.css">
        </head>
        <body>
        <div class="form-container">
            <h2>Contactez-nous !</h2>
            <form action="index.php?module=contacts&action=envoyer_message" method="POST" class="form">
                
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                
                <button type="submit" class="form-submit-btn">Envoyer</button>
            </form>
        </div>
        <?php
    }
}
?>
