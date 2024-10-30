<?php
require_once 'modele_contacts.php';
require_once 'vue_contacts.php';

class ContContacts {
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleContacts();
        $this->vue = new VueContacts();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'afficher_formulaire';
    }

    public function afficherFormulaire() {
        $this->vue->afficherFormulaireMessage();
    }

    public function envoyerMessage() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && isset($_POST['message'])) {
            $email = $_POST['email'];
            $message = $_POST['message'];
            
            $enregistrementReussi = $this->modele->enregistrerMessage($email, $message);
            
            if ($enregistrementReussi) {
                header('Location: index.php?module=debut');
                die('Votre message à été envoyé !');
            } else {
                die('Erreur lors de l\'envoie !');
            }
        } else {
            die('Erreur lors de l\'envoie !');
        }
    }

    public function exec() {
        switch ($this->action) {
            case 'afficher_formulaire':
                $this->afficherFormulaire();
                break;
            case 'envoyer_message':
                $this->envoyerMessage();
                break;
            default:
            die('Erreur lors de l\'envoie !');
                break;
        }
    }
}
?>
