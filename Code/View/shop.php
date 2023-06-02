<?php

$title = 'shop';

ob_start();
?>
<?php $pageTitle = "Boutique" ?>
<div class="margin">
    <div id="filtre">
        <form action="../index.php?action=filter" method="post">
            <div>
                <h3>Filtre</h3>
            </div>
            <div>
                <label>
                    <input type="radio" name="filter" value="all" <?php if($filtre == "all" || $filtre == null) : ?>  checked <?php endif; ?>> Tous les produits
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="filter" value="1" <?php if($filtre == "1") : ?>  checked <?php endif; ?> > Sucré
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="filter" value="2" <?php if($filtre == "2") : ?>  checked <?php endif; ?> > Salé
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="filter" value="3" <?php if($filtre == "3") : ?>  checked <?php endif; ?> > Sans gluten
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="filter" value="4" <?php if($filtre == "4") : ?>  checked <?php endif; ?> > Végan
                </label>
            </div>
            <button type="submit">Afficher les biscuits</button>
        </form>
    </div>
    <div id="shop">

            <?php foreach ($biscuits as $biscuit) : ?>
            <div>
                <div><img src="image\<?=$biscuit['image']; ?>" ></div>
                <div><tr>
                        <?php if($biscuit['weight'] != "Choix") : ?>
                            <td><h3><?=$biscuit['name']; ?> <?=$biscuit['weight']; ?>g</h3></td>
                        <?php else : ?>
                            <td><h3><?=$biscuit['name']; ?></h3></td>
                        <?php endif; ?>
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