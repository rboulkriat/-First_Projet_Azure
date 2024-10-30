<?php
include('modele_regles.php');
include('vue_regles.php');

class ContRegles {

    private $vue;
    private $action;
    private $modele;

     function __construct() {
        $this->vue = new VueRegles(); 
        $this->modele = new ModeleRegles();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'regles';  
    }

    public function exec() {
        switch ($this->action) {  
            case 'regles':
                $regles = $this->modele->recupererRegles();
                $this->vue->afficherRegles($regles);
                break;
        }
    }
}

?>
