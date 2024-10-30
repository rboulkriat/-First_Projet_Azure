<?php
require_once 'vue_generique.php';

class VueEnnemi extends VueGenerique {

    public function afficherEnnemi() {
?>
        <link rel="stylesheet" href="css/styles_tours_ennemi_boutique.css">
        <div class="content-container">
            <div class="card-container">

                <!-- Ennemi Balliste -->
                <div class="card-boutique">
                    <img src="images/Ennemie/Balliste.png" alt="Ennemi Balliste" class="card-image">
                    <div class="card-content">
                        <h2>Ennemi Balliste</h2>
                        <p>Le Balliste est un ennemi rapide avec une portée d'attaque de 30. Il a 20 points de vie, une puissance d'attaque de 5 et se déplace à 0,3 pixel/seconde. Vous gagnerez 50 points en le vainquant.</p>
                    </div>
                </div>

                <!-- Ennemi Behemoth -->
                <div class="card-boutique">
                    <img src="images/Ennemie/Behemoth.png" alt="Ennemi Behemoth" class="card-image">
                    <div class="card-content">
                        <h2>Ennemi Behemoth</h2>
                        <p>Le Behemoth est un ennemi robuste avec une portée d'attaque de 50. Il a 100 points de vie, une puissance d'attaque de 20 et se déplace à 0,3 pixel/seconde. Vous obtiendrez 200 points en le vainquant. Utilisez la bobine Oppenheimer pour une efficacité maximale contre lui.</p>
                    </div>
                </div>

                <!-- Ennemi Scavenger -->
                <div class="card-boutique">
                    <img src="images/Ennemie/Scavenger.png" alt="Ennemi Scavenger" class="card-image">
                    <div class="card-content">
                        <h2>Ennemi Scavenger</h2>
                        <p>Le Scavenger a une portée d'attaque de 40, 50 points de vie, une puissance d'attaque de 10 et se déplace à 0,3 pixel/seconde. Il résiste à la bobine Nikola et parfois à la tour Edison. Vaincre un Scavenger vous rapporte 100 points. Utilisez d'autres tours pour infliger plus de dégâts.</p>
                    </div>
                </div>

            </div>
        </div>
<?php
    }
}
?>
