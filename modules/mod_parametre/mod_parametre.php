<?php
require_once 'cont_parametre.php';
        
class ModParametre{

    private $controleur;

    function __construct(){
        $this->controleur = new ControleurParametre();

    }
    
    public function exec() {
        $this->controleur->exec();
    }
}

?>
