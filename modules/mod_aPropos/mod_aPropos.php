<?php
require_once 'cont_aPropos.php';
        
class ModAPropos{

    private $controleur;

    function __construct(){
        $this->controleur = new ContAPropos();

    }
    
    public function exec() {
        $this->controleur->exec();
    }
}


?>
