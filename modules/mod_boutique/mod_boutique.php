<?php
require_once 'cont_boutique.php';
        
class ModBoutique{

    private $controleur;

    function __construct(){
        $this->controleur = new ContBoutique();
    }
    
    public function exec() {
        $this->controleur->exec();
    }
}
?>
