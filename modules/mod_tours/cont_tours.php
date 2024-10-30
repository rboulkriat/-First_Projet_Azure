<?php
include('modele_tours.php');
include('vue_tours.php');

class ContTours {

    private $vue;
    private $action;

    public function __construct() {
        $this->vue = new VueTours();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'tours';
    }

    public function exec() {
        switch ($this->action) {
            case 'tours':
                $this->vue->afficherTours();
            break;
        }
    }
}

?>
