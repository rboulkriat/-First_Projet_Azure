<?php
require_once 'Connexion.php';
class ModeleRegles extends Connexion {
    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function recupererRegles() {
        $regles = [];
        try {
            $requete = $this->connexion->getBdd()->prepare("SELECT * FROM regles");
            $requete->execute();
            $regles = $requete->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
        return $regles;
    }
}

?>
