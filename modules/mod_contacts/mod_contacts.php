<?php
require_once 'cont_contacts.php';
require_once 'modele_contacts.php';
require_once 'vue_contacts.php';

class ModContacts {
    private $controleur;
    
    public function __construct() {
        $this->controleur = new ContContacts();
    }
    
    public function exec() {
        $this->controleur->exec();
    }
}
?>
