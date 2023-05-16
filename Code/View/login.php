<?php

$title = 'login';

ob_start();
?>

<div id="form-login">
    <div>
        <h2>Connexion</h2>
    </div>
    <div>
        <form action="../index.php?action=login" method="post">
            <div>
                <label for="email">Identifiant</label><br>
                <input class="input" type="email" id="email" name="email">
            </div>
            <div>
                <label for="lastname">Mot de passe</label><br>
                <input class="input" type="password" id="password" name="password">
            </div>
            <div>
                <?=$loginErrorMessage?>
            </div>
            <div>
                <button class="button" type="submit">Se connecter</button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>
