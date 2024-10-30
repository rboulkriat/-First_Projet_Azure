<?php
include('modele_aPropos.php');
include('vue_aPropos.php');

class ContAPropos {

    private $vue;
    private $action;

    public function __construct() {
        $this->vue = new VueAPropos();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'aPropos';
    }

    public function exec() {
        switch ($this->action) {
            case 'aPropos':
                $this->vue->afficherAPropos();
            break;
        }
    }
}

?>
