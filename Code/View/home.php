<?php

$title = 'home';

ob_start();
?>
<?php $pageTitle = "Accueil" ?>
<div>
    <div id="home">

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