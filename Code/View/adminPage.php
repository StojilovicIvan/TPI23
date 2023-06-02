<?php

$title = 'adminPage';

ob_start();
?>
<?php $pageTitle = "Administration" ?>
<div>
    <div id="admin-add">
        <a href="index.php?action=formBiscuit"><button>Ajouter un biscuit</button></a>
    </div>
    <div>
        <?php foreach ($biscuits as $biscuit) : ?>
            <div id="admin-biscuits-list">
                <ul id="admin-list">
                    <li class="admin-biscuit"><img src="image/<?=$biscuit['image']; ?>" width="100px"></li>
                    <li class="admin-biscuit">ID<br><?=$biscuit['id']; ?></li>
                    <li class="admin-biscuit">Prix<br><?=$biscuit['price']; ?></li>
                    <li class="admin-biscuit">Energie<br><?=$biscuit['energy']; ?></li>
                    <li class="admin-biscuit">Matière grasse<br><?=$biscuit['fat']; ?></li>
                    <li class="admin-biscuit">Glucides<br><?=$biscuit['carbohydrate']; ?></li>
                    <li class="admin-biscuit">Fibres<br><?=$biscuit['fiber']; ?></li>
                    <li class="admin-biscuit">Sel<br><?=$biscuit['salt']; ?></li>
                    <li class="admin-biscuit">Stock<br><?=$biscuit['stock']; ?></li>
                    <?php if($biscuit['activ'] == 1) : ?>
                        <li class="admin-biscuit">Activé</li>
                        <li class="admin-biscuit"><a href="index.php?action=disableBiscuit&id=<?=$biscuit['id']; ?>"><button>Désactiver</button></a></li>
                    <?php else : ?>
                        <li class="admin-biscuit">Désactivé</li>
                        <li class="admin-biscuit"><a href="index.php?action=enableBiscuit&id=<?=$biscuit['id']; ?>"><button>Activer</button></a></li>
                    <?php endif; ?>
                    <li class="admin-biscuit"><a href="index.php?action=formModifBiscuit&id=<?=$biscuit['id']; ?>"><button >Modifier</button></a></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>