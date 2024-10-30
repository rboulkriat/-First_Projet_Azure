<?php
require_once 'Connexion.php';
class ModeleInscriptions extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function verifierEmailExistant($email) {
            $query = $this->connexion->getBdd()->prepare('SELECT COUNT(*) AS count FROM joueur WHERE email = ?');
            $query->execute(array($email));
            $row = $query->fetch(PDO::FETCH_ASSOC);
    
            // Si count est supérieur à 0, cela signifie que l'email existe déjà
            return $row['count'] > 0;
    }
    

    function ajoutInscription($login, $password,  $email) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->connexion->getBdd()->prepare('INSERT INTO joueur (Nom_joueur, mot_de_passe, email) VALUES (?,?,?)');
        $result = $query->execute(array($login, $hashedPassword, $email));
        
        if ($result) {
            die('Vous êtes désormais inscrit !');
            header('Location: index.php?module=connexion');
            exit(); 
        } else {
            die('Inscription impossible !');
        }
    }
}

?>
