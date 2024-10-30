<?php
require_once 'Connexion.php';
class ModeleProfil extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function recupererPartiesJoueurConnecte() {
        $donnees = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT * FROM partie WHERE id_joueur = $idJoueur";
            $resultat =  $this->connexion->getBdd()->query($requete);
    
            if ($resultat) {
                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                    $donnees[] = $row;
                }
                return $donnees;
            } else {
                return null; 
            }
        } else {
            return null; 
        }
    }

    public function recupererEnnemisPartieParJoueurConnecte() {
        $donnees = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT * FROM ennemi_partie WHERE idPartie IN (SELECT idPartie FROM partie WHERE id_joueur = :idJoueur)";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $donnees[] = $row;
                }
                return $donnees;
            } else {
                return null; 
            }
        } else {
            return null; 
        }
    }

    public function recupererEnnemisTuesParJoueurConnecte() {
        $donnees = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT e.*, ep.* 
                        FROM ennemi_partie ep
                        INNER JOIN ennemi e ON ep.id_ennemi = e.id_ennemi
                        WHERE ep.idPartie IN (SELECT idPartie FROM partie WHERE id_joueur = :idJoueur) 
                        AND ep.Vie_partie = 0";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $donnees[] = $row;
                }
                return $donnees;
            } else {
                return null; 
            }
        } else {
            return null; 
        }
    }

    public function recupererToursPlaceesParJoueurConnecte() {
        $donnees = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT tp.*, t.* 
                        FROM tour_partie tp
                        INNER JOIN tour t ON tp.id_tour = t.id_tour
                        WHERE tp.idPartie IN (SELECT idPartie FROM partie WHERE id_joueur = :idJoueur)";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $donnees[] = $row;
                }
                return $donnees;
            } else {
                return null; 
            }
        } else {
            return null; 
        }
    }

    public function recupererClassementPartiesJoueurConnecte() {
        $classement = [];
    
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
    
            $requete = "SELECT idPartie, score FROM partie WHERE id_joueur = :idJoueur";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $classement[] = $row;
                }
                usort($classement, function($a, $b) {
                    return $b['score'] - $a['score'];
                });
                $classementAvecClassement = [];
                $classementCounter = 1;
                foreach ($classement as $partie) {
                    $partie['classement'] = $classementCounter++;
                    $classementAvecClassement[] = $partie;
                }
    
                return $classementAvecClassement;
            } else {
                return null; 
            }
        } else {
            return null;
        }
    }
    
    public function recupererAmisJoueurConnecte() {
        $amis = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT j.* FROM joueur j
                        INNER JOIN amis a ON j.id_joueur = a.idJoueur2
                        WHERE a.idJoueur1 = :idJoueur AND a.statutAmi = 'accepte'";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $amis[] = $row;
                }
                return $amis;
            } else {
                return null; 
            }
        } else {
            return null; 
        }
    }

    public function rechercherJoueur($recherche) {
        $resultats = [];
        $requete = is_numeric($recherche) ? 
            "SELECT * FROM joueur WHERE id_joueur = :recherche" :
            "SELECT * FROM joueur WHERE nom_joueur LIKE :recherche";
        $stmt = $this->connexion->getBdd()->prepare($requete);
        $param = is_numeric($recherche) ? $recherche : "%$recherche%";
        $stmt->bindParam(':recherche', $param, PDO::PARAM_STR);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resultats[] = $row;
            }
        }
        return $resultats;
    }
    
    public function AmiRecupererEnnemisTues($idJoueur) {
        $donnees = [];
        $requete = "SELECT e.*, ep.* 
                    FROM ennemi_partie ep
                    INNER JOIN ennemi e ON ep.id_ennemi = e.id_ennemi
                    WHERE ep.idPartie IN (SELECT idPartie FROM partie WHERE id_joueur = :idJoueur) 
                    AND ep.Vie_partie = 0";
        $stmt = $this->connexion->getBdd()->prepare($requete);
        $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $donnees[] = $row;
            }
            return $donnees;
        } else {
            return null;
        }
    }
    public function ajouterAmi($idJoueur1, $idJoueur2) {
        $requete = "INSERT INTO amis (idJoueur1, idJoueur2, statutAmi) VALUES (?, ?, 'Accepte')";
        $stmt = $this->connexion->getBdd()->prepare($requete);
        $stmt->bindParam(1, $idJoueur1, PDO::PARAM_INT); 
        $stmt->bindParam(2, $idJoueur2, PDO::PARAM_INT); 
        $stmt->execute();   
        $stmt->closeCursor(); 
        
    }
    public function supprimerAmi($idUtilisateur, $idAmi) {
        $requete = "DELETE FROM amis WHERE (idJoueur1 = ? AND idJoueur2 = ?) OR (idJoueur1 = ? AND idJoueur2 = ?)";
        $stmt = $this->connexion->getBdd()->prepare($requete);
        $stmt->bindParam(1, $idUtilisateur, PDO::PARAM_INT);
        $stmt->bindParam(2, $idAmi, PDO::PARAM_INT);
        $stmt->bindParam(3, $idAmi, PDO::PARAM_INT);
        $stmt->bindParam(4, $idUtilisateur, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->closeCursor();
    }
    
}

?>
