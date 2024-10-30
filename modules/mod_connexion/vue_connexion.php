<?php
require_once 'vue_generique.php';

class VueConnexions extends VueGenerique { 

    public function form_connexion() {
?>
        <link rel="stylesheet" type="text/css" href="css/style_connexion.css">
        <div class="animated-background"></div>

        <div class="welcome-message">
            <p>"Chaque grand voyage commence par un petit pas."</p>
        </div>
        <h3>Bienvenue de retour, aventurier !</h3>
            <div class="form-container">
                <form class="container" action="index.php?module=connexion&action=connexion" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div class="input-container">
                        <div class="input-content">
                            <div class="input-dist">
                                <div class="input-type">
                                    <input class="input-is" type="email" name="email" required placeholder="E-mail" />
                                    <input class="input-is" type="password" name="password" required placeholder="Mot de Passe" />
                                    <button class="submit" type="submit">Connexion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <p>Pour créer un compte, <a href="index.php?module=inscription&action=inscription">cliquer ici</a></p>
            </div>
            <script src="js/script_champ_manquant.js"></script>
<?php
    }
}
?>
