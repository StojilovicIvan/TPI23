<?php

$title = 'profil';

ob_start();
?>
<?php $pageTitle = "Modifier votre profil" ?>
<div id="modif-profil">
    <div>
        <h3>Modifier mes informations</h3>
    </div>
    <div>
        <form action="index.php?action=modifUser" method="POST">
            <div>
                <label for="firstname">Prénom</label><br>
                <input class="input" type="text" id="firstname" name="firstname" value="<?=$detail['firstname']; ?>">
            </div>
            <div>
                <label for="lastname">Nom</label><br>
                <input class="input" type="text" id="lastname" name="lastname" value="<?=$detail['lastname']; ?>">
            </div>
            <div>
                <label for="phoneNumber">Numéro de téléphone</label><br>
                <input class="input" type="text" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" value="<?=$detail['phoneNumber']; ?>">
            </div>
            <div>
                <label for="street">Rue</label><br>
                <input class="input" type="text" id="street" name="street" value="<?=$detail['street']; ?>">
            </div>
            <div>
                <label for="number">Numéro</label><br>
                <input class="input" type="text" id="number" name="number" value="<?=$detail['number']; ?>">
            </div>
            <div>
                <label for="postalCode">Code postal</label><br>
                <input class="input" type="text" id="postalCode" name="postalCode" pattern="[0-9]{4}" value="<?=$detail['postalCode']; ?>">
            </div>
            <div>
                <label for="city">Ville</label><br>
                <input class="input" type="text" id="city" name="city" value="<?=$detail['city']; ?>">
            </div><br>
            <div>
                <button class="button" type="submit">Confirmer les modifications</button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>
