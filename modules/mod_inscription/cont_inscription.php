<?php
include('modele_inscription.php');
include('vue_inscription.php');

class ContInscriptions {
    
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleInscriptions();
        $this->vue = new VueInscriptions();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'inscription';  
    }

    public function traiterSoumissionFormulaire() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $this->vue->message('Erreur CSRF : Qui es-tu ?');
                exit;
            }
            $login = $_POST["login"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_confirm = $_POST["password_confirm"];
            if (strlen($password) < 10) {
                $this->vue->message('Mot de passe trop court (minimum 10 caractères).');
            }
            if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).*$/', $password)) {
                $this->vue->message('Mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.');           
            }
            if ($password === $password_confirm) {
                // Vérifiez si l'email n'est pas déjà présent dans la base de données
                $emailExiste = $this->modele->verifierEmailExistant($email);
    
                if (!$emailExiste) {
                    // L'email n'existe pas, ajoutez l'inscription
                    $this->modele->ajoutInscription($login, $password, $email);
                    header('Location: index.php?module=debut');
                    exit();
                }
                else {
                    $this->vue->message('L\'email existe déjà.'); 
                }
            }
        }
    }
    

    public function exec() {
        switch ($this->action) {
            case 'inscription':
                $this->vue->form_inscription();
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
                        die('Erreur de validation csrf, mais qui êtes vous ? ');
                    }
                    $this->traiterSoumissionFormulaire();
                }
                break;
        }
    }
}

?>
