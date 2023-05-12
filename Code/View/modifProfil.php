<?php

$title = 'profil';

ob_start();
?>

<div>
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
                <input class="phoneNumber" type="number" id="phoneNumber" name="phoneNumber" value="<?=$detail['phoneNumber']; ?>">
            </div>
            <div>
                <label for="street">Rue</label><br>
                <input class="input" type="text" id="street" name="street" value="<?=$detail['street']; ?>">
            </div>
            <div>
                <label for="number">Numéro</label><br>
                <input class="input" type="texte" id="number" name="number" value="<?=$detail['number']; ?>">
            </div>
            <div>
                <label for="postalCode">Code postal</label><br>
                <input class="postalCode" type="number" id="postalCode" name="postalCode" value="<?=$detail['postalCode']; ?>">
            </div>
            <div>
                <label for="city">Ville</label><br>
                <input class="city" type="text" id="city" name="city" value="<?=$detail['city']; ?>">
            </div>
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
