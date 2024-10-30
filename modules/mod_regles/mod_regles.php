<?php
require_once 'cont_regles.php';
        
class ModRegles{

    private $controleur;

    function __construct(){
        $this->controleur = new ContRegles();

    }
    
    public function exec() {
        $this->controleur->exec();
    }
}


?>
