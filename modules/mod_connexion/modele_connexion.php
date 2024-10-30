<?php
require_once 'Connexion.php';
class ModeleConnexions extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function verifierUtilisateur($email, $password) {
        $query = $this->connexion->getBdd()->prepare('SELECT id_joueur, Nom_joueur, logo, mot_de_passe FROM joueur WHERE email = :email');
        $query->execute(array(':email' => $email));
    
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($result && password_verify($password, $result['mot_de_passe'])) {
            return array(true, $result['id_joueur'], $result['Nom_joueur'], $result['logo']);
        } else {
            return array(false, null, null, null);
        }
    }    
}
?>
