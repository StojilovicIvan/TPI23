<?php

$title = 'register';

ob_start();
?>
<?php $pageTitle = "Inscription" ?>
<div id="form-register">
    <div>
        <h2>Inscription</h2>
    </div>
    <div>
        <form class="form" action="../index.php?action=register" method="post">
            <h3>Informations personnelles</h3>
            <div>
                <label for="firstname">Prénom*</label><br>
                <input class="input" type="text" id="firstname" name="firstname" required>
            </div>
            <div>
                <label for="lastname">Nom*</label><br>
                <input class="input" type="text" id="lastname" name="lastname" required>
            </div>
            <div>
                <label for="phoneNumber">Numéro de téléphone*</label><br>
                <input class="input" type="text" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required>
            </div>
            <div>
                <label for="email">Email*</label><br>
                <input class="email" type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Mot de passe*</label><br>
                <input class="password" type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="passVerif">Confirmer votre mot de passe*</label><br>
                <input class="passVerif" type="password" id="passVerif" name="passVerif" required>
            </div>
            <div>
                <label for="street">Rue*</label><br>
                <input class="input" type="text" id="street" name="street" required>
            </div>
            <div>
                <label for="number">Numéro*</label><br>
                <input class="input" type="text" id="number" name="number" required>
            </div>
            <div>
                <label for="postalCode">Code postal*</label><br>
                <input class="postalCode" type="text" id="postalCode" name="postalCode" pattern="[0-9]{4}" required>
            </div>
            <div>
                <label for="city">Ville*</label><br>
                <input class="city" type="text" id="city" name="city" required>
            </div>
            <div>
                <label for="allergies">Allergies</label><br>
                <input type="checkbox" id="gluten" name="allergies[]" value="1">
                <label for="gluten">Gluten</label><br>
                <input type="checkbox" id="orange" name="allergies[]" value="2">
                <label for="orange">Orange</label><br>
                <input type="checkbox" id="fraise" name="allergies[]" value="3">
                <label for="fraise">Fraise</label><br>
                <input type="checkbox" id="arachide" name="allergies[]" value="4">
                <label for="arachide">Arachide</label><br>
            </div>
            <div>
                <?=$registerErrorMessage?>
            </div>
            <div>
                <button class="button" type="submit">S'inscrire</button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>

