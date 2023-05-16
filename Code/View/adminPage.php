<?php

$title = 'adminPage';

ob_start();
?>
<div>
    <div>
        <?php foreach ($biscuits as $biscuit) : ?>
            <div>
                <ul id="adminList">
                    <li class="adminBiscuit"><img src="image/<?=$biscuit['image']; ?>" width="100px"></li>
                    <li class="adminBiscuit"><?=$biscuit['id']; ?></li>
                    <li class="adminBiscuit"><?=$biscuit['price']; ?></li>
                    <li class="adminBiscuit"><?=$biscuit['energy']; ?></li>
                    <li class="adminBiscuit"><?=$biscuit['fat']; ?></li>
                    <li class="adminBiscuit"><?=$biscuit['carbohydrate']; ?></li>
                    <li class="adminBiscuit"><?=$biscuit['fiber']; ?></li>
                    <li class="adminBiscuit"><?=$biscuit['salt']; ?></li>
                    <li class="adminBiscuit"><a href="index.php?action=formModifBiscuit&id=<?=$biscuit['id']; ?>"><button >Modifier</button></a></li>
                    <li class="adminBiscuit"><button href="index.php?action=deleteBiscuit&id=<?=$biscuit['id']; ?>">Supprimer</button></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div>
    <a href="index.php?action=formBiscuit"><button>Ajouter un biscuit</button></a>
</div>


<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>