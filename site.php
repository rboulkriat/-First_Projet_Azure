<?php

class Site {

    private $module_name;
    private $module;
    
    public function __construct() {
        
        $this->module_name = isset($_GET['module']) ? $_GET['module'] : "debut"; 

        switch ($this->module_name) {
            case "connexion":
                require_once "modules/mod_connexion/mod_connexion.php";
            break;
            case "inscription":
                require_once "modules/mod_inscription/mod_inscription.php";
            break;
            case "debut":
                require_once "modules/mod_debut/mod_debut.php";
            break;
            case "profil":
                require_once "modules/mod_profil/mod_profil.php";
            break;  
            case "parametre":
                require_once "modules/mod_parametre/mod_parametre.php";
                break; 
            case "regles":
                require_once "modules/mod_regles/mod_regles.php";
                break; 
            case "boutique":
                require_once "modules/mod_boutique/mod_boutique.php";
                break; 
            case "ennemi":
                require_once "modules/mod_ennemi/mod_ennemi.php";
                break; 
            case "tours":
                require_once "modules/mod_tours/mod_tours.php";
                break; 
            case "aPropos":
                require_once "modules/mod_aPropos/mod_aPropos.php";
            break; 
            case "contacts":
                require_once "modules/mod_contacts/mod_contacts.php";
            break;
            default:
                die("Module inexistant");
        }
    }

    public function exec_module() {
        $module_class = "Mod" . ucfirst($this->module_name);
        $this->module = new $module_class();
        $this->module->exec();
    }

    public function get_module() {
        return $this->module;
    }
}
