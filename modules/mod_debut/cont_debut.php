<?php
include('modele_debut.php');
include('vue_debut.php');

class ContDebut {

    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleDebut();
        $this->vue = new VueDebut();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'pagePrincipale';  
    }

    public function traiter() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
            $email = $_POST['email'];
            $message = $this->modele->souscrire($email);
            $this->vue->message($message);
        }
    }
    
    public function exec() {
        switch ($this->action) {
            case 'pagePrincipale':
                $this->vue->afficherAccueil();
                break;
            case 'souscrire':
                $this->vue->afficherAccueil();
                $this->traiter();   
                break;       
        }
    }
}
?>
