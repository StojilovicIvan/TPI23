<?php

$title = 'detailBiscuit';

ob_start();
?>
<div class="detail">
    <div class="detail-grid">
        <div id="detailImg">
            <a><img src="image/cookie.jpg" width="400px"></a>
        </div>
        <div>
            <h2><?=$detail['name']; ?></h2>
            <h2><?=$detail['price']; ?> CHF</h2>
            <h3><a href="action=addToCart?id=<?=$detail['id']; ?>"><button>Ajouter au panier</button></a></h3>
        </div>
    </div>
    <div class="detail-grid" id="info">
        <div id="desc">
            <h3>Descriptif</h3>
            <ul>
                <li>Energie : <?=$detail['energy']; ?> kcal</li>
                <li>Graisse : <?=$detail['fat']; ?> g</li>
                <li>Glucides : <?=$detail['carbohydrate']; ?> g</li>
                <li>Fibres : <?=$detail['fiber']; ?> g</li>
                <li>Sel : <?=$detail['salt']; ?> g</li>
            </ul>
        </div>
        <div>
            <h3>Allergies</h3>
            <ul>
                <li>Auncune allergie</li>
            </ul>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>
