<?php
require_once 'cont_tours.php';
        
class ModTours{

    private $controleur;

    function __construct(){
        $this->controleur = new ContTours();

    }
    
    public function exec() {
        $this->controleur->exec();
    }
}


?>
