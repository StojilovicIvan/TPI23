<?php

$title = 'formBiscuit';

ob_start();
?>
<?php $pageTitle = "Ajout d'un biscuit" ?>
<div id="form-biscuit">
    <form action="index.php?action=addBiscuit" method="POST">
        <div>
            <label for="name">Nom du biscuit*</label>
            <input class="input" type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="price">Prix du biscuit*</label>
            <input class="input" type="number" id="price" name="price" step=".01" required>
        </div>
        <div>
            <label for="energy">Energie*</label>
            <input class="input" type="number" id="energy" name="energy" required>
        </div>
        <div>
            <label for="fat">Matière grasse*</label>
            <input class="input" type="number" id="fat" name="fat" step=".1" required>
        </div>
        <div>
            <label for="carbohydrate">Glucide*</label>
            <input class="input" type="number" id="carbohydrate" name="carbohydrate" step=".1" required>
        </div>
        <div>
            <label for="fiber">Fibre*</label>
            <input class="input" type="number" id="fiber" name="fiber" step=".1" required>
        </div>
        <div>
            <label for="salt">Sel*</label>
            <input class="input" type="number" id="salt" name="salt" step=".1" required>
        </div>
        <div>
            <label for="image">Lien de l'image*</label>
            <input class="input" type="text" id="image" name="image" required>
        </div>
        <div>
            <button class="button" type="submit">Ajouter le biscuit</button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>
