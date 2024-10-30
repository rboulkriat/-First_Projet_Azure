<?php
require_once 'vue_generique.php';

class VueAPropos extends VueGenerique { 

    public function afficherAPropos() {
?>
<link rel="stylesheet" href="css/style_aPropos.css">
<div class="container1">
    <h3>À propos de Nous</h3>
    <p>
        Bienvenue sur notre site web ! Nous sommes une équipe d'étudiants dynamiques en deuxième année de BUT Informatique, passionnés par le monde numérique et le développement web. Notre équipe se compose de talents variés, chacun apportant sa créativité et ses compétences uniques à ce projet excitant.
    </p>
    <p>
        Rencontrez notre équipe :
    </p>
    <ul>
        <li><strong>Mehdi ISAF :</strong> Le visionnaire. Mehdi apporte une perspective innovante au projet, cherchant constamment des moyens de rendre l'expérience utilisateur exceptionnelle.</li>
        <li><strong>Rabab BOULKRIAT :</strong> L'architecte du code. Rabab excelle dans la logique et la structure du code, garantissant que notre site fonctionne de manière fluide et efficace.</li>
        <li><strong>Yoann LEHONG CHEFFSON :</strong> Le maître du design. Yoann donne vie à nos idées avec son talent artistique, créant une esthétique visuelle qui captive l'attention.</li>
        <li><strong>Elsa HADJADJ :</strong> La stratège. Elsa veille à ce que notre projet réponde aux objectifs fixés, tout en assurant une cohérence globale et une expérience utilisateur optimale.</li>
    </ul>
    <p>
        Nous avons uni nos forces pour concevoir et développer ce site web dans le cadre de notre projet SAE de développement web. Notre objectif est de mettre en pratique les connaissances acquises au cours de notre formation et de créer quelque chose d'exceptionnel.
    </p>
    <p>
        N'hésitez pas à explorer notre site et à découvrir les résultats de notre collaboration. Si vous avez des questions, des commentaires ou simplement envie de dire bonjour, n'hésitez pas à nous contacter. Merci de faire partie de notre aventure !
    </p>
    <p>
        <strong>L'équipe de développement :</strong><br>
        Mehdi ISAF, Rabab BOULKRIAT, Yoann LEHONG CHEFFSON, Elsa HADJADJ
    </p>
</div>
<?php
    }
}
?>
