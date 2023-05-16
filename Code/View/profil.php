<?php

$title = 'profil';

ob_start();
?>

<div id="profil">
    <div>
        <h3>Informations pesonnelles</h3>
        <a>Nom : <?=$detail['lastname']; ?></a><br>
        <a>Prénom : <?=$detail['firstname']; ?></a><br>
        <a>Téléphone : <?=$detail['phoneNumber']; ?></a><br>
        <a>Email : <?=$detail['email']; ?></a>
    </div>
    <div>
        <h3>Adresse</h3>
        <a>Rue : <?=$detail['street']; ?></a><br>
        <a>Numéro : <?=$detail['number']; ?></a><br>
        <a>Code postal : <?=$detail['postalCode']; ?></a><br>
        <a>Ville : <?=$detail['city']; ?></a>
    </div>
    <div>
        <h3>Allergies</h3>
        <?php foreach ($allergies as $allergy) : ?>
            <a><?=$allergy['name']; ?></a><br>
        <?php endforeach; ?>
    </div>
    <a href="index.php?action=modifUserForm"><button>Modifier les informations</button></a><br><br>
    <!--<a href="index.php?action=order"><button>Afficher mes commandes</button></a>-->
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>
