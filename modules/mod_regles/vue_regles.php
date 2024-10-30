<?php
require_once 'vue_generique.php';

class VueRegles extends VueGenerique { 

    public function afficherRegles($regles) {
?>
        <link rel="stylesheet" href="css/styles_tours_ennemi_boutique.css">
        <div class="content-container"> 
            <p class="intro">Bienvenue dans le monde passionnant de notre jeu de Tower Defense !</p>
            <p>Nous avons créé des règles uniques pour rendre votre expérience de jeu encore plus captivante.</p>
            <p>Explorez ces règles fondamentales et préparez-vous à affronter les défis du champ de bataille :</p>

            <?php
                $reglesParCategorie = [];
                foreach ($regles as $regle) {
                    $reglesParCategorie[$regle['categorie']][] = $regle;
                }
            ?>

            <div class="card-container">
                <?php foreach ($reglesParCategorie as $categorie => $reglesDansCategorie): ?>
                    <div class="card-boutique">
                        <h2><?= htmlspecialchars("Consigne " . $categorie) ?></h2> 
                        <div class="carte-details">
                            <?php foreach ($reglesDansCategorie as $regle): ?>
                                <p>
                                    <?= htmlspecialchars($regle['ID']) ?>&nbsp;<?= htmlspecialchars($regle['description']) ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div> 
                <?php endforeach; ?>
            </div>

            <br>
            <p class="intro">Voici votre consigne :</p>
            <div class="rules-container">
                <p>🛡️ Protégez la base en empêchant les ennemis d'atteindre son emplacement. Assurez-vous que la base ne subisse aucun dommage.</p>
                <p>Le terrain de jeu représente l'univers. Utilisez cet environnement à votre avantage pour positionner vos tours de défense de manière stratégique.</p>
                <p>🏹 Affrontez trois types d'ennemis redoutables : les Ballistes, les Scavengers et les Behemoths. Chacun d'eux possède ses propres capacités et points faibles, alors étudiez-les attentivement pour adapter votre stratégie de défense.</p>
                <p>Disposez de trois types de tours de défense, correspondant aux caractéristiques des ennemis. Consultez votre inventaire pour en savoir plus sur les spécificités de chaque tour.</p>
                <p>🤔 Choisissez judicieusement les tours à utiliser en fonction des vagues d'ennemis à venir.</p>
                <p>Sois conscient que le temps joue un rôle crucial dans ta défense. Les vagues d'ennemis arrivent à intervalles réguliers, alors assure-toi de prévoir et de préparer tes tours à temps.</p>
                <p>❌ Ne laissez pas les ennemis approcher la base sans défense !</p>
                <p>En plus des tours de défense, tu disposes également d'autres objets spéciaux qui peuvent t'aider dans la bataille. Utilise-les avec parcimonie et stratégie pour maximiser leur effet sur les ennemis.</p>
                <p>🚀 Au fur et à mesure que tu progresses, tu auras peut-être la possibilité d'améliorer tes tours de défense.</p>
                <p>Gère efficacement tes ressources pour renforcer ta défense et faire face à des vagues d'ennemis de plus en plus coriaces.</p>
                <p>🔄 Anticipe les mouvements des ennemis et ajuste ta stratégie en conséquence. Expérimente différentes configurations de tours et d'objets spéciaux pour trouver celle qui te convient le mieux.</p>
                <p>Reste vigilant et réactif ! Tu devras peut-être ajuster ta défense en temps réel pour faire face à des situations inattendues ou à des ennemis particulièrement résistants.</p>
            </div>
            <br>
            <p>Préparez-vous à une bataille spatiale épique dans notre Tower Defense à thème de l'univers. Faites preuve de stratégie, de précision et de rapidité pour protéger la base et sauver l'univers !</p>
            <p class="intro">Bonne chance !</p>
        </div>

        <script src="js/script_regles_categorie.js"></script>
<?php
    }
}
?>
