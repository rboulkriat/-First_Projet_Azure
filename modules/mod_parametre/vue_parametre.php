<?php
require_once 'vue_generique.php';

class VueParametre extends VueGenerique {

    public function form_modification() {
?>
        <link rel="stylesheet" type="text/css" href="css/style_parametre.css">
        <div class="animated-background"></div>

        <section class="container1">
            <header>Modifier vos paramètres ici :</header>
            <form id="votreFormulaire" class="form" action="index.php?module=parametre&action=modifier" method="POST" enctype="multipart/form-data" onsubmit="return verifierMotsDePasse();">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="profil-image-preview">
                    <?php if (!empty($_SESSION['profil_image'])): ?>
                        <div class="profile-image-container">
                            <img src="<?php echo $_SESSION['profil_image']; ?>" alt="Image de profil">
                            <label for="profil_image" class="profil-image-upload-button">+</label>
                            <input id="profil_image" type="file" name="profil_image" accept="image/*" style="display: none;" />
                        </div>
                    <?php else: ?>
                        <label for="profil_image" class="profil-image-upload-button">
                            <img src="" alt="">
                            +
                        </label>
                        <input id="profil_image" type="file" name="profil_image" accept="image/*" style="display: none;" />
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <label for="login">Nom d'utilisateur</label>
                    <input id="login" type="text" name="login" placeholder="Nom d'utilisateur" value="<?php echo $_SESSION['login']; ?>" required>
                </div>

                <div class="input-box">
                    <label for="email">Adresse e-mail</label>
                    <input id="email" type="email" name="email" placeholder="Adresse e-mail" value="<?php echo $_SESSION['email']; ?>" required>
                </div>

                <div class="input-box">
                    <label for="ancienPassword">Ancien Mot de passe</label>
                    <input id="ancienPassword" type="password" name="ancienPassword" placeholder="Mot de passe" required>
                </div>

                <div class="input-box">
                    <label for="newPassword">Nouveau Mot de passe</label>
                    <input id="newPassword" type="password" name="newPassword" placeholder="Mot de passe" required>
                </div>

                <div class="input-box">
                    <label for="password_confirm">Confirmer le mot de passe</label>
                    <input id="password_confirm" type="password" name="password_confirm" required placeholder="Confirmer le mot de passe" />
                </div>

                <button class="submit" type="submit">Modifier</button>
            </form>
        </section>
<?php
    }
    
    public function afficherAlerte($message) {
        echo "<script>alert('" . addslashes($message) . "');</script>";
    }
}
?>
