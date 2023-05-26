<?php

$title = 'modifBiscuit';

ob_start();
?>
<?php $pageTitle = "Modifier un biscuit" ?>
<div>
    <div>
        <form action="index.php?action=modifyBiscuit" method="POST">
            <div>
                <input type="hidden" id="id" name="id" value="<?=$biscuit['id']; ?>">
            </div>
            <div>
                <label for="name">Nom du biscuit*</label>
                <input class="input" type="text" id="name" name="name" value="<?=$biscuit['name']; ?>" required>
            </div>
            <div>
                <label for="price">Prix du biscuit*</label>
                <input class="input" type="number" id="price" name="price" step=".01" value="<?=$biscuit['price']; ?>" required>
            </div>
            <div>
                <label for="energy">Energie*</label>
                <input class="input" type="number" id="energy" name="energy" value="<?=$biscuit['energy']; ?>" required>
            </div>
            <div>
                <label for="fat">Matière grasse*</label>
                <input class="input" type="number" id="fat" name="fat" step=".1" value="<?=$biscuit['fat']; ?>" required>
            </div>
            <div>
                <label for="carbohydrate">Glucide*</label>
                <input class="input" type="number" id="carbohydrate" name="carbohydrate" step=".1" value="<?=$biscuit['carbohydrate']; ?>" required>
            </div>
            <div>
                <label for="fiber">Fibre*</label>
                <input class="input" type="number" id="fiber" name="fiber" step=".1" value="<?=$biscuit['fiber']; ?>" required>
            </div>
            <div>
                <label for="salt">Sel*</label>
                <input class="input" type="number" id="salt" name="salt" step=".1" value="<?=$biscuit['salt']; ?>" required>
            </div>
            <div>
                <label for="image">Lien de l'image*</label>
                <input class="input" type="text" id="image" name="image" value="<?=$biscuit['image']; ?>" required>
            </div>
            <div>
                <button class="button" type="submit">Modifier le biscuit</button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>