<?php

$title = 'profil';

ob_start();
?>
<?php $pageTitle = "Profil" ?>
<div id="profil">
    <div>
        <h3>Informations pesonnelles</h3>
        <p>Nom : <?=$detail['lastname']; ?></p>
        <p>Prénom : <?=$detail['firstname']; ?></p>
        <p>Téléphone : <?=$detail['phoneNumber']; ?></p>
        <p>Email : <?=$detail['email']; ?></p>
    </div><br>
    <div>
        <h3>Adresse</h3>
        <p>Rue : <?=$detail['street']; ?></p>
        <p>Numéro : <?=$detail['number']; ?></p>
        <p>Code postal : <?=$detail['postalCode']; ?></p>
        <p>Ville : <?=$detail['city']; ?></p>
    </div><br>
    <div>
        <h3>Allergies</h3>
        <?php foreach ($allergies as $allergy) : ?>
            <a><?=$allergy['name']; ?></a><br>
        <?php endforeach; ?>
    </div><br>
    <a href="index.php?action=modifUserForm"><button>Modifier les informations</button></a><br><br>
    <a href="index.php?action=order&id=<?=$detail['id']; ?>"><button>Afficher mes commandes</button></a>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>
