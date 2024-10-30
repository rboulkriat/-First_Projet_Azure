<?php
include('modele_parametre.php');
include('vue_parametre.php');

class ControleurParametre {
    
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleParametre();
        $this->vue = new VueParametre();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'modifier';  
    }

    public function modifier() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ancienPassword']) && isset($_POST['newPassword']) && isset($_POST['password_confirm']) && isset($_POST['login']) && isset($_POST['email'])) {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $this->vue->afficherAlerte("Erreur de validation CSRF.");
            }

            $ancienPassword = $_POST['ancienPassword'];
            $newPassword = $_POST['newPassword'];
            $password_confirm = $_POST["password_confirm"];
            $newEmail = $_POST['email'];
            $login = $_SESSION['login'];

            if (strlen($newPassword) < 10) {
                $this->vue->afficherAlerte("Mot de passe trop court (minimum 10 caractères).");
            }
            if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).*$/', $newPassword)) {
                $this->vue->afficherAlerte("Mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.");         
            }
            if ($newPassword === $ancienPassword) {
                $this->vue->afficherAlerte("Le nouveau mot de passe ne peut pas être similaire à l'ancien.");         
            }
            if ($newPassword === $password_confirm && $this->modele->verifierMotDePasse($login, $ancienPassword)) {
                if (isset($_FILES['profil_image']) && $_FILES['profil_image']['error'] === UPLOAD_ERR_OK) {
                    $logo = $_FILES['profil_image']['name'];
                    $cheminDestination = 'modules/mod_parametre/logos/' . $logo;
                    
                    if (move_uploaded_file($_FILES['profil_image']['tmp_name'], $cheminDestination)) {
                        $this->modele->modifierParametre($login, $newPassword, $newEmail, $cheminDestination);
                        $this->vue->afficherAlerte("Paramètres mis à jour avec succès.");
                    } else {
                        $this->vue->afficherAlerte("Erreur lors du téléchargement de l'image de profil.");
                    }
                } else {
                    $this->vue->afficherAlerte("Veuillez sélectionner une image de profil valide.");
                }
            } else {
                $this->vue->afficherAlerte("Mot de passe incorrect ou les mots de passe ne correspondent pas.");
            }
        }
    }

    public function exec() {
        switch ($this->action) {
            case 'modifier':
                $this->vue->form_modification();
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
                        $this->vue->afficherAlerte("Erreur de validation csrf, mais qui êtes vous ? ");
                    }
                    $this->modifier();
                }
                break;
        }
    }
}
?>
