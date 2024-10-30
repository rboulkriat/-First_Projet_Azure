<?php

class Connexion {

    private static $bdd;

    public static function initConnexion(){
        $serveur = 'localhost';
        $utilisateur = 'root';
        $motDePasse = '';
        $baseDeDonnees = 'interstellarhavoc';

        try {
            self::$bdd = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);
        }catch (PDOException $e) {
            die("Erreur de connexion ! " . $e->getMessage());
        }
    }

    public function getBdd(){
        return self::$bdd;
    }
}

?>