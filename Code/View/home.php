<?php

$title = 'home';

ob_start();
?>
<?php $pageTitle = "Accueil" ?>
<div>
    <div id="home">

        <?php foreach ($biscuits as $biscuit) :  ?>
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