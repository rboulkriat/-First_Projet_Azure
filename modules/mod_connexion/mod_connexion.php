<?php
require_once 'cont_connexion.php';
        
class ModConnexion {

    private $controleur;

    function __construct() {
        $this->controleur = new ContConnexions();
    }

    public function exec() {
        $this->controleur->exec();
    }
}
?>
