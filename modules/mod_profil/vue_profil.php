<?php
require_once 'vue_generique.php';

class VueProfil extends VueGenerique { 

    public function afficherCartes() {
        ?>
            <div class="cartes-container">
                <link rel="stylesheet" type="text/css" href="css/style_profil.css">
                
        <?php
            $cartes = [
                ['MES PARTIES JOUÉES', 'index.php?module=profil&action=partie','images/profil/partie.png'],
                ['MES ENNEMIS TUÉS', 'index.php?module=profil&action=ennemis_tues', 'images/profil/ennemis_tues.png'],
                ['LES ENNEMIS PARTIE', 'index.php?module=profil&action=ennemis_partie', 'images/profil/ennemis.png'],
                ['MES TOURS PLACÉS', 'index.php?module=profil&action=tours', 'images/profil/tours.png'],
                ['CLASSEMENT', 'index.php?module=profil&action=classement', 'images/profil/classement.png'],
                ['AMI', 'index.php?module=profil&action=ami', 'images/profil/ami.png'],
            ];
        
            foreach ($cartes as $carte) {
        ?>
                <div class="card" data-url="<?php echo $carte[1]; ?>">
                    <img src="<?php echo $carte[2]; ?>" alt="<?php echo $carte[0]; ?>">
                    <?php echo $carte[0]; ?>
                </div>
        <?php
            }
        ?>
            </div>
            <script src="js/script_click_profil.js"></script>
        <?php
        }
        
    
/* PROFIL PARTIEE */
public function afficherTableauParties($donnees) {
    ?>
        <link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">
        <?php if ($donnees): ?>
            <div class="parties-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID Partie</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Score</th>
                            <th>Temps</th>
                            <th>ID Joueur</th>
                            <th>ID Terrain</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donnees as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['idPartie']) ?></td>
                                <td><?= htmlspecialchars($row['date']) ?></td>
                                <td><?= htmlspecialchars($row['heure']) ?></td>
                                <td><?= htmlspecialchars($row['score']) ?></td>
                                <td><?= htmlspecialchars($row['temps']) ?></td>
                                <td><?= htmlspecialchars($row['id_joueur']) ?></td>
                                <td><?= htmlspecialchars($row['id_terrain']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php $this->afficherGraphiquePartiesSimplifie($donnees); ?>
            </div>
        <?php endif;
    }
    
    public function afficherGraphiquePartiesSimplifie($donnees) {
    ?>
        <canvas id="partiesChart" width="200" height="200"></canvas>
        <script>
            var ctx = document.getElementById("partiesChart").getContext("2d");
            var partiesData = <?= json_encode($donnees) ?>;
            var labels = partiesData.map(function(partie) { return partie.idPartie; });
            var scores = partiesData.map(function(partie) { return partie.score; });
            var chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Scores des parties",
                        data: scores,
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        borderColor: "rgba(75, 192, 192, 1)",
                        borderWidth: 1
                    }]
                }
            });
        </script>
    <?php
    }
    
    public function afficherExplicationTableau() {
    ?>
        <link rel="stylesheet" type="text/css" href="css/style_profil.css">
        <div class="explication-tableau">
            <h2>Graphique des Scores</h2>
            <p>Bienvenue sur votre tableau des scores, un aperçu visuel de votre performance dans différentes parties du jeu. Ce graphique présente un résumé des scores obtenus au fil des parties.</p>
            <p><strong>Comment lire le tableau :</strong></p>
            <ul>
                <li><strong>ID Partie :</strong> Identifiant unique de chaque partie enregistrée.</li>
                <li><strong>Date et Heure :</strong> Le moment précis où la partie a été jouée.</li>
                <li><strong>Score :</strong> Le score total obtenu dans cette partie.</li>
                <li><strong>Temps :</strong> La durée totale de la partie.</li>
                <li><strong>ID Joueur :</strong> Votre identifiant unique associé à cette partie.</li>
                <li><strong>ID Terrain :</strong> L'identifiant du terrain sur lequel la partie a eu lieu.</li>
            </ul>
            <p>Explorez ce tableau interactif pour analyser les tendances, repérer les performances exceptionnelles, et suivre l'évolution des scores au fil du temps.</p>
            <p>Prenez le contrôle de votre progression et aspirez à de nouveaux sommets. Bonne exploration ! 🚀🎮</p>
        </div>
    
        <div style="margin-bottom: 80px;"></div>
    <?php
    }    
      
/* PROFIL ENNEMIS */
public function afficherTableauEnnemisPartie($donnees) {
    ?>
        <link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">
        <?php if ($donnees): ?>
            <div class="parties-container">
                <div class="table-container">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>ID Ennemi</th>
                                <th>ID Partie</th>
                                <th>Vie Partie</th>
                                <th>Position X</th>
                                <th>Position Y</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donnees as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id_ennemi']) ?></td>
                                    <td><?= htmlspecialchars($row['idPartie']) ?></td>
                                    <td><?= htmlspecialchars($row['Vie_partie']) ?></td>
                                    <td><?= htmlspecialchars($row['position_X']) ?></td>
                                    <td><?= htmlspecialchars($row['position_Y']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
    
                <?php $this->afficherGraphiqueEnnemisPartie($donnees); ?>
    
            </div>
        <?php else: ?>
            Aucun ennemi tué trouvé pour le joueur connecté.
        <?php endif;
    }
    
    public function afficherGraphiqueEnnemisPartie($donnees) {
        // Filtrer les ennemis morts et vivants
        $ennemisMorts = array_filter($donnees, function ($ennemi) {
            return $ennemi['Vie_partie'] <= 0;
        });
    
        $ennemisVivants = array_filter($donnees, function ($ennemi) {
            return $ennemi['Vie_partie'] > 0;
        });
    
        // Nombre d'ennemis morts et vivants
        $nombreEnnemisMorts = count($ennemisMorts);
        $nombreEnnemisVivants = count($ennemisVivants);
    ?>
    
    <canvas id="ennemisChart" width="200" height="200"></canvas>
    <script>
        var ctx = document.getElementById("ennemisChart").getContext("2d");
        var ennemisData = {
            morts: <?= $nombreEnnemisMorts ?>,
            vivants: <?= $nombreEnnemisVivants ?>
        };
    
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Ennemis Morts", "Ennemis Vivants"],
                datasets: [{
                    label: "Nombre d'ennemis",
                    data: [ennemisData.morts, ennemisData.vivants],
                    backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(75, 192, 192, 0.2)"],
                    borderColor: ["rgba(255, 99, 132, 1)", "rgba(75, 192, 192, 1)"],
                    borderWidth: 1
                }]
            }
        });
    </script>
    
    <?php
    }
    
    public function afficherExplicationEnnemisPartie() {
    ?>
        <link rel="stylesheet" type="text/css" href="css/style_profil.css">
        <div class="explication-tableau">
            <h2>Graphique d'Ennemis</h2>
            <p>Bienvenue sur votre tableau des ennemis tués, un récapitulatif visuel de votre performance dans le jeu. Ce tableau présente des détails sur chaque ennemi que vous avez éliminé au cours des parties, accompagné d'un graphique pour une vue d'ensemble.</p>
            <p><strong>Comment lire le tableau :</strong></p>
            <ul>
                <li><strong>ID Ennemi :</strong> Identifiant unique de chaque ennemi.</li>
                <li><strong>ID Partie :</strong> Identifiant unique de la partie où l'ennemi a été tué.</li>
                <li><strong>Vie Partie :</strong> La vie totale de la partie.</li>
                <li><strong>Position X et Y :</strong> La position où l'ennemi a été tué.</li>
            </ul>
            <p>Explorez ce tableau interactif pour analyser vos performances contre chaque ennemi spécifique et comprenez les tendances générales.</p>
            <p>Le graphique à côté offre une visualisation plus complète des ennemis tués, vous permettant de comparer différentes parties et de suivre votre évolution. 🚀🎮</p>
        </div>
    
        <div style="margin-bottom: 80px;"></div>
    <?php
    }
    

    /* PROFIL ENNEMIS TUEES */
    public function afficherTableauEnnemisTues($donnees) {
        ?>
            <link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">
            <?php if ($donnees): ?>
                <div class="parties-container">
                    <div class="table-container">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>ID Ennemi</th>
                                    <th>Nom Ennemi</th>
                                    <th>Vie Ennemi</th>
                                    <th>Dégat</th>
                                    <th>Portée</th>
                                    <th>Contourner Mur</th>
                                    <th>Récompense</th>
                                    <th>ID Partie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($donnees as $row): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['id_ennemi']) ?></td>
                                        <td><?= htmlspecialchars($row['nom_ennemi']) ?></td>
                                        <td><?= htmlspecialchars($row['vie']) ?></td>
                                        <td><?= htmlspecialchars($row['degat']) ?></td>
                                        <td><?= htmlspecialchars($row['portee']) ?></td>
                                        <td><?= $row['contourner_mur'] ? 'Oui' : 'Non' ?></td>
                                        <td><?= htmlspecialchars($row['recompense']) ?></td>
                                        <td><?= htmlspecialchars($row['idPartie']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
        
                    <div class="graph-container">
                        <?php $this->afficherGraphiqueTypesEnnemisTues($donnees); ?>
                    </div>
                </div>
                <a href="index.php?module=profil" class="btn">Retour Page Profil</a>
            <?php endif;
        }
        
        public function afficherGraphiqueTypesEnnemisTues($donnees) {
            $typesEnnemis = [];
            foreach ($donnees as $ennemi) {
                $type = $ennemi['nom_ennemi'];
                if (!isset($typesEnnemis[$type])) {
                    $typesEnnemis[$type] = 1;
                } else {
                    $typesEnnemis[$type]++;
                }
            }
        ?>
            <canvas id="typesEnnemisChart" width="300" height="200"></canvas>
            <script>
                var ctx = document.getElementById("typesEnnemisChart").getContext("2d");
                var typesEnnemisData = <?= json_encode(array_values($typesEnnemis)) ?>;
                var labels = <?= json_encode(array_keys($typesEnnemis)) ?>;
                var chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: labels,
                        datasets: [{
                            label: "Nombre d'ennemis tués par type",
                            data: typesEnnemisData,
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1
                        }]
                    }
                });
            </script>
        <?php
        }
        
        public function afficherExplicationEnnemisTues() {
        ?>
            <link rel="stylesheet" type="text/css" href="css/style_profil.css">
            <div class="explication-tableau">
                <h2>Graphique d'Ennemis Tués</h2>
                <p>Bienvenue sur votre tableau des ennemis tués, un récapitulatif visuel de votre performance dans le jeu. Ce tableau présente des détails sur chaque ennemi que vous avez éliminé au cours des parties.</p>
                <p><strong>Comment lire le tableau :</strong></p>
                <ul>
                    <li><strong>ID Ennemi :</strong> Identifiant unique de chaque ennemi.</li>
                    <li><strong>Nom Ennemi :</strong> Le nom de l'ennemi éliminé.</li>
                    <li><strong>Vie Ennemi :</strong> La vie de l'ennemi.</li>
                    <li><strong>Dégât :</strong> Les dégâts infligés par l'ennemi.</li>
                    <li><strong>Portée :</strong> La portée de l'ennemi.</li>
                    <li><strong>Récompense :</strong> La récompense obtenue en éliminant cet ennemi.</li>
                    <li><strong>ID Partie :</strong> Identifiant unique de la partie où l'ennemi a été tué.</li>
                </ul>
                <p>Explorez ce tableau interactif pour analyser vos tactiques, découvrir vos ennemis les plus redoutables, et améliorer votre stratégie au fil du temps.</p>
                <p>Continuez à affiner vos compétences et devenez le maître du champ de bataille ! 🚀🎮</p>
            </div>
        
            <div style="margin-bottom: 80px;"></div>
        <?php
        }
        
    
/* PROFIL TOURS */
public function afficherTableauToursPlacees($donnees) {
    ?>
        <link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">
        <?php if ($donnees): ?>
            <div class="parties-container">
                <div class="table-container">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>ID Tour Placée</th>
                                <th>ID Partie</th>
                                <th>Vie Partie</th>
                                <th>Position X</th>
                                <th>Position Y</th>
                                <th>Nom Tour</th>
                                <th>Vie Tour</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donnees as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id_tour']) ?></td>
                                    <td><?= htmlspecialchars($row['idPartie']) ?></td>
                                    <td><?= htmlspecialchars($row['Vie_partie']) ?></td>
                                    <td><?= htmlspecialchars($row['position_X']) ?></td>
                                    <td><?= htmlspecialchars($row['position_Y']) ?></td>
                                    <td><?= htmlspecialchars($row['nom_tour']) ?></td>
                                    <td><?= htmlspecialchars($row['vie']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
    
                <div class="graph-container">
                    <?php $this->afficherGraphiqueToursPlacees($donnees); ?>
                </div>
    
            </div>
        <?php else: ?>
            Aucune tour placée trouvée pour le joueur connecté.
        <?php endif;
    }
    
    public function afficherGraphiqueToursPlacees($donnees) {
    ?>
        <canvas id="toursChart" width="200" height="200"></canvas>
        <script>
            var ctx = document.getElementById("toursChart").getContext("2d");
            var toursData = <?= json_encode($donnees) ?>;
            var labels = toursData.map(function(tour) { return tour.nom_tour; });
            var vies = toursData.map(function(tour) { return tour.vie; });
            var chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Vie des Tours",
                        data: vies,
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        borderColor: "rgba(75, 192, 192, 1)",
                        borderWidth: 1
                    }]
                }
            });
        </script>
    <?php
    }
    
    public function afficherExplicationToursPlacees() {
    ?>
        <link rel="stylesheet" type="text/css" href="css/style_profil.css">
        <div class="explication-tableau">
            <h2>Graphique des Tours Placées</h2>
            <p>Bienvenue sur votre tableau des tours placées, un récapitulatif visuel de votre performance dans la construction de tours. Ce tableau présente des détails sur chaque tour que vous avez placée au cours des parties.</p>
            <p><strong>Comment lire le tableau :</strong></p>
            <ul>
                <li><strong>ID Partie :</strong> Identifiant unique de la partie où la tour a été placée.</li>
                <li><strong>Vie Partie :</strong> La vie totale de la partie.</li>
                <li><strong>Nom Tour :</strong> Le nom de la tour placée.</li>
                <li><strong>Vie Tour :</strong> La vie de la tour.</li>
            </ul>
            <p>Explorez ce tableau interactif pour analyser vos choix de construction, améliorer vos stratégies, et devenir un maître de la défense ! 🚀🎮</p>
        </div>
    
        <div style="margin-bottom: 80px;"></div>
    <?php
    }    
    
    /* PROFIL CLASSEMENT */
    public function afficherClassementParties($classement) {
        ?>
            <link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">
            <?php if ($classement): ?>
                <div class="parties-container">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Classement</th>
                                <th>ID Partie</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($classement as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['classement']) ?></td>
                                    <td><?= htmlspecialchars($row['idPartie']) ?></td>
                                    <td><?= htmlspecialchars($row['score']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
        
                    <div class="graph-container">
                        <?php $this->afficherGraphiqueClassementParties($classement); ?>
                    </div>
        
                </div>
            <?php else: ?>
                Aucune partie trouvée pour le joueur connecté.
            <?php endif;
        }
        
    public function afficherGraphiqueClassementParties($classement) {
    ?>
        <canvas id="classementChart" width="200" height="200"></canvas>
        <script>
            var ctx = document.getElementById("classementChart").getContext("2d");
            var classementData = <?= json_encode($classement) ?>;
            var labels = classementData.map(function(partie) { return partie.idPartie; });
            var scores = classementData.map(function(partie) { return partie.score; });
            var chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                            label: "Scores des parties",
                            data: scores,
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1
                    }]
                }
            });
        </script>
    <?php
        }
        
    public function afficherExplicationClassement() {
        ?>
            <link rel="stylesheet" type="text/css" href="css/style_profil.css">
            <div class="explication-tableau">
                <h2>Graphique de Classement</h2>
                <p>Bienvenue sur votre tableau de classement, une représentation visuelle de votre performance par rapport à d'autres parties. Ce graphique présente un résumé des classements obtenus au fil des parties.</p>
                <p><strong>Comment lire le tableau :</strong></p>
                <ul>
                    <li><strong>ID Partie :</strong> Identifiant unique de chaque partie enregistrée.</li>
                    <li><strong>Classement :</strong> Votre position dans le classement pour cette partie.</li>
                    <li><strong>Score :</strong> Le score total obtenu dans cette partie.</li>
                </ul>
                <p>Explorez ce tableau interactif pour analyser les tendances, repérer les performances exceptionnelles, et suivre l'évolution de votre classement au fil du temps.</p>
                <p>Prenez le contrôle de votre position et aspirez à atteindre le sommet du classement. Bonne compétition ! 🚀🏆</p>
            </div>
        
            <div style="margin-bottom: 80px;"></div>
        <?php
    }
        
    public function afficherResultatsRecherche($resultats) {
        if (!empty($resultats)) {
    ?>
            <link rel="stylesheet" type="text/css" href="css/style_ami_affichage.css">
            <div class="resultats-recherche">
    <?php
            foreach ($resultats as $joueur) {
    ?>
                <div class="joueur">
                    <span class="info-joueur"><strong>ID:</strong> <?= htmlspecialchars($joueur['id_joueur']) ?></span>
                    <span class="info-joueur"><strong>Nom:</strong> <?= htmlspecialchars($joueur['Nom_joueur']) ?></span>
                    <a href="index.php?module=profil&action=voir_stats_joueur&idJoueur=<?= htmlspecialchars($joueur['id_joueur']) ?>" class="lien-stats">Voir les statistiques</a>
                    <a href="index.php?module=profil&action=supprimerAmi&idJoueur=<?= htmlspecialchars($joueur['id_joueur']) ?>" class="lien-stats">Supprimer l'ami</a>
                </div>
    <?php
            }
    ?>
            </div>
    <?php
        } else {
            echo '<p>Aucun ami trouvé.</p>';
        }  
    }
    
    public function afficherButtonRechercheAmi() {
        ?>
            <link rel="stylesheet" type="text/css" href="css/style_profil.css">
            <div class="recherche-ami-container">
                <form action="index.php?module=profil&action=rechercher" method="POST">
                    <input type="text" name="recherche" placeholder="Rechercher un Joueur..." />
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    <button type="submit">Rechercher</button>
                </form>
            </div>
        <?php
        }  
        public function afficherResultatsRechercheAmi($resultats) {
            if (!empty($resultats)) {
        ?>
                <link rel="stylesheet" type="text/css" href="css/style_ami_affichage.css">
                <div class="resultats-recherche">
        <?php
                foreach ($resultats as $joueur) {
        ?>
                    <div class="joueur">
                        <span class="info-joueur"><strong>ID:</strong> <?= htmlspecialchars($joueur['id_joueur']) ?></span>
                        <span class="info-joueur"><strong>Nom:</strong> <?= htmlspecialchars($joueur['Nom_joueur']) ?></span>
                        <a href="index.php?module=profil&action=voir_stats_joueur&idJoueur=<?= htmlspecialchars($joueur['id_joueur']) ?>" class="lien-stats">Voir les statistiques</a>
                        <a href="index.php?module=profil&action=ajouterAmi&idJoueur=<?= htmlspecialchars($joueur['id_joueur']) ?>" class="lien-stats">Ajouter en tant qu'ami</a>
                    </div>
        <?php
                }
        ?>
                </div>
        <?php
            } else {
                echo '<p>Aucun ami trouvé.</p>';
            }  
        }
        public function demandeAmiEnvoyer() {
            ?>
            <div id="popupAmiEnvoye" class="popup-overlay">
                    <div class="popup-content">
                        <h2>Demande d'ami envoyée</h2>
                        <p>Votre demande d'ami a été envoyée avec succès.</p>
                    </div>
                  </div>
                  
        <?php
        }    
        public function SuppressionAmiEnvoyer() {
            ?>
            <div id="popupAmiEnvoye" class="popup-overlay">
                    <div class="popup-content">
                        <h2>Demande de suppression achevée</h2>
                        <p>Vous n'est plus ami avec cette personne</p>
                    </div>
                  </div>
        <?php
        }    
}
?>
