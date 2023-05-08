<?php

$title = 'shop';

ob_start();
?>
<div class="margin">
    <div id="biscuit" class="cookie-menu">
        <?php foreach ($biscuits as $biscuit) : ?>
        <div>
            <div id="left"><img src="image/cookie.jpg" width="250px"></div>
            <div><tr>
                    <td><h3><strong><?=$biscuit['name']; ?></strong></h3></td>
                    <td><br><h4><?=$biscuit['price']; ?> CHF</h4></td>
                    <td><br><a href="index.php?action=detailBiscuit&id=<?=$biscuit['id']; ?>">Plus de détail</a></td>
                </tr></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>