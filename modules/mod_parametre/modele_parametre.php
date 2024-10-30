<?php
require_once 'Connexion.php';

class ModeleParametre extends Connexion {

    private $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function modifierParametre($login, $newPassword, $newEmail, $logo) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $query = $this->connexion->getBdd()->prepare('UPDATE joueur SET logo=?, mot_de_passe=?, email=? WHERE Nom_joueur=?');
        $result = $query->execute(array($logo, $hashedPassword, $newEmail, $login));

        if ($result) {
            header('Location: index.php?module=debut');
            exit(); 
        } else {
            echo "<script>alert('" . addslashes('Erreur lors de la mise à jour des paramètres.') . "');</script>";
        }
    }

    public function verifierMotDePasse($login, $motDePasse) {
        $query = $this->connexion->getBdd()->prepare('SELECT mot_de_passe FROM joueur WHERE Nom_joueur = ?');
        $query->execute(array($login));
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            $motDePasseStocke = $result['mot_de_passe'];
            return password_verify($motDePasse, $motDePasseStocke);
        }
    
        return false;
    }
}
?>
