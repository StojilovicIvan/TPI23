<?php

$title = 'shop';

ob_start();
?>
<?php $pageTitle = "Boutique" ?>
<div class="margin">
    <div id="filtre">
        <form>
            <div>
                <label>Filtre</label>
            </div>
            <div>
                <label for="allBiscuits">Tout afficher</label>
                <input type="checkbox" id="allBiscuits" name="allBiscuits" value="allBiscuits">
            </div>
            <div>
                <label for="sweet">Sucré</label>
                <input type="checkbox" id="sweet" name="sweet" value="sweet">
            </div>
            <div>
                <label for="salt">Salé</label>
                <input type="checkbox" id="salt" name="salt" value="salt">
            </div>
            <div>
                <label for="glutenfree">Sans Gluten</label>
                <input type="checkbox" id="glutenfree" name="glutenfree" value="glutenfree">
            </div>
            <div>
                <label for="vegan">Végan</label>
                <input type="checkbox" id="vegan" name="vegan" value="vegan">
            </div>
        </form>
    </div>
    <div id="shop">

        <?php foreach ($biscuits as $biscuit) : ?>
        <div>
            <div><img src="image/cookie.jpg" width="250px"></div>
            <div><tr>
                    <td><h3><strong><?=$biscuit['name']; ?></strong></h3></td>
                    <td><h4><?=$biscuit['price']; ?> CHF</h4></td>
                    <td><a href="index.php?action=detailBiscuit&id=<?=$biscuit['id']; ?>">Plus de détail</a></td>
                </tr></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>