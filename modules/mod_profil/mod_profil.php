<?php
require_once 'cont_profil.php';
        
class ModProfil{

    private $controleur;

    function __construct(){
        $this->controleur = new ContProfil();

    }
    
    public function exec() {
        $this->controleur->exec();
    }
}


?>
