<?php
require_once 'cont_inscription.php';
        
class ModInscription{

    private $controleur;

    function __construct(){
        $this->controleur = new ContInscriptions();

    }
    
    public function exec() {
        $this->controleur->exec();
    }
}


?>
