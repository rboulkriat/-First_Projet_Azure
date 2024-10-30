<?php
require_once 'cont_ennemi.php';

class ModEnnemi{

    private $controleur;

    function __construct(){
        $this->controleur = new ContEnnemi();

    }
    
    public function exec() {
        $this->controleur->exec();
    }
}


?>
