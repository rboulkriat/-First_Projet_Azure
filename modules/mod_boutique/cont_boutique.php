<?php
include('modele_boutique.php');
include('vue_boutique.php');

class ContBoutique {

    private $vue;
    private $action;

    public function __construct() {
        $this->vue = new VueBoutique();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'boutique';  
    }

    public function exec() {
        switch ($this->action) {
            case 'boutique':
                $this->vue->afficherBoutique();
            break;    
        }
    }
}
?>
