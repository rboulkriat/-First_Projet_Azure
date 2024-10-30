<?php
require_once 'vue_generique.php';

class VueDebut extends VueGenerique {

    public function afficherAccueil() {
?>
        <link rel="stylesheet" href="css/style_accueil.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo+2&display=swap">
        <div>
            <h1 class="heading" id="typed-title"></h1>

            <p class="description">Découvrez un monde d'aventures extraordinaires.</p>

            <div class="grid-container">
                <img id="imageProfil" src="images/ennemis.png" alt="Description des aliens" class="img-profil">
                <div>
                    <h2 class="description">Les Forces Hostiles : Ennemis à Connaître</h2>
                    <br>
                    <p class="image-description">Préparez-vous à affronter des adversaires redoutables et découvrez les mystères des créatures intergalactiques qui peuplent notre univers !
                        Des hordes d'ennemis extraterrestres n'attendent que vous pour tester votre courage et vos compétences. Explorez des mondes hostiles, déjouez des stratégies machiavéliques, et devenez le héros de votre propre aventure spatiale.
                        Plongez dans l'inconnu, affrontez des défis épiques, et forgez votre destin dans un univers où chaque rencontre est une opportunité de grandeur. Êtes-vous prêt à relever le défi ?</p>
                    <br>
                    <a href="index.php?module=ennemi&action=ennemi"><button class="learn-more"><span class="circle" aria-hidden="true"><span class="icon arrow"></span></span><span class="button-text">Découvrir</span></button></a>
                </div>
            </div>

            <div class="grid-container">
                <div>
                    <h2 class="description">Découvrez Notre Arsenal de Défense</h2>
                    <br>
                    <p class="image-description">Explorez nos tours de défense stratégiques, chacune dotée de capacités uniques pour protéger votre royaume numérique. Relevez le défi de la sécurité en ligne avec nos tours de défense exceptionnelles. Explorez chaque type de défense pour trouver celle qui correspond le mieux à vos besoins.</p>
                    <br>
                    <a href="index.php?module=tours&action=tours"><button class="learn-more"><span class="circle" aria-hidden="true"><span class="icon arrow"></span></span><span class="button-text">Découvrir</span></button></a>
                </div>
                <img src="images/tours.png" alt="Description des aliens" class="img-profil">
            </div>

            <div class="grid-container">
                <img src="images/boutique.png" alt="Description des aliens" class="img-profil">
                <div>
                    <h2 class="description">Explorez Notre Collection d'Objets de Défense Innovants</h2>
                    <br>
                    <p class="image-description"> Parcourez notre collection exclusive d'objets de défense soigneusement sélectionnés pour garantir la sécurité de votre royaume numérique. Des armures cybernétiques aux outils de cryptage, chaque objet est une pièce essentielle pour renforcer vos défenses en ligne. Découvrez notre gamme complète et équipez-vous pour faire face à toute menace qui se présente.</p>
                    <br>
                    <a href="index.php?module=boutique&action=boutique"><button class="learn-more"><span class="circle" aria-hidden="true"><span class="icon arrow"></span></span><span class="button-text">Découvrir</span></button></a>
                </div>
            </div>

            <p class="description">Rejoignez la communauté des joueurs passionnés.</p>
            <br>
            <a href="https://github.com/DUT-Info-Montreuil/SAE---devWeb.git" class="style_bouton">Commencer l'aventure</a>

            <div class="paragraphe">
                <p>Vous êtes prêt pour l'action ?</p>
                <p>Relevez des défis, gagnez des récompenses et explorez des mondes fascinants !</p>
            </div>
        </div>

        <script src="js/annimation.js"></script>
        <script>
            var imageProfil = document.getElementById('imageProfil');
            imageProfil.classList.add('show');
        </script>
<?php
    }

    public function message($message){
?>
        <script>alert('<?php echo addslashes($message); ?>');</script>
<?php
    }
}
?>
