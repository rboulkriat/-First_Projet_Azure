<?php
require_once 'Connexion.php';
class ModeleDebut extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function verifierAbonnement($email) {
        $query = $this->connexion->getBdd()->prepare('SELECT abonnement FROM joueur WHERE email = :email');
        $query->execute([':email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function souscrire($email) {
        $utilisateur = $this->verifierAbonnement($email);

        if ($utilisateur) {
            if ($utilisateur['abonnement']) {
                return "Vous êtes déjà abonné.";
            } else {
                $query = $this->connexion->getBdd()->prepare('UPDATE joueur SET abonnement = 1 WHERE email = :email');
                $query->execute([':email' => $email]);
                return "Vous êtes désormais abonné.";
            }
        } else {
            session_unset();
            session_destroy();
            header('Location: index.php?module=inscription');
            return "Merci de vous être abonné à notre newsletter.";
        }
    }    
}
?>
