<?php
require_once 'vue_generique.php';

class VueInscriptions extends VueGenerique {

    public function form_inscription() {
?>
        <link rel="stylesheet" type="text/css" href="css/style_connexion.css">
        <div class="animated-background"></div>

        <div class="welcome-message">
            <p>"Chaque grand voyage commence par un petit pas."</p>
        </div>

        <h3>Votre légende commence ici !</h3>
        <div class="form-container">
            <form class="container" action="index.php?module=inscription&action=inscription" method="POST" onsubmit="return verifierMotsDePasse();">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="input-container">
                    <div class="input-content">
                        <div class="input-dist">
                            <div class="input-type">
                                <input class="input-is" type="text" name="login" required placeholder="Nom d'utilisateur" />
                                <input class="input-is" type="email" name="email" required placeholder="Adresse e-mail" />
                                <input class="input-is" type="password" name="password" required placeholder="Mot de Passe" />
                                <input class="input-is" type="password" name="password_confirm" required placeholder="Confirmer le mot de passe" />
                                <button class="submit" type="submit">S'inscrire</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <p>Pour vous connecter, <a href="index.php?module=connexion">cliquer ici</a></p>

        </div>
        <script src="js/script_champ_manquant.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="js/script_erreur_mp.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/script_mail.js"></script>
<?php
    }
    public function message($message){
        ?>
            <script>alert('<?php echo addslashes($message); ?>');</script>
        <?php
            }
}
?>
