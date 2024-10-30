<?php
require_once 'Connexion.php';

class ModeleContacts extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function enregistrerMessage($email, $message) {
        try {
            $query = $this->getBdd()->prepare('INSERT INTO messages_joueurs (email, message) VALUES (:email, :message)');
            
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':message', $message, PDO::PARAM_STR);
            
            $query->execute();
            
            
            return true;
        } catch (PDOException $e) {
            
            return false; 
        }
    }
}
?>