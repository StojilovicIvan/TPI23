<?php

$title = 'detailBiscuit';

ob_start();
?>
<?php $pageTitle = "Boutique" ?>
<div class="detail">
    <div class="detail-grid">
        <div id="detailImg">
            <a><img src="image/cookie.jpg" width="400px"></a>
        </div>
        <div>
            <h2><?=$detail['name']; ?></h2>
            <?php if($detail['weight'] != "Choix") : ?>
                <h2><?=$detail['weight']; ?>g</h2>
            <?php else : ?>
                <h2>Poids au choix</h2>
            <?php endif; ?>
            <h2><?=$detail['price']; ?> CHF</h2>
            <h3>Quantité disponible :<?=$detail['stock']; ?></h3>
            <?php if($detail['stock'] != 0) : ?>
                <?php if(isset($_SESSION['email'])) : ?>
                <h3><a href="index.php?action=addToCart&id=<?=$detail['id']; ?>"><button>Ajouter au panier</button></a></h3>
                <?php else : ?>
                <h3><a href="index.php?action=login"><button>Connectez-vous d'abord</button></a></h3>
                <?php endif; ?>
            <?php else : ?>
                <h2><a href="index.php?action=shop"><button>Actuellement hors stock</button></h2>
            <?php endif; ?>
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
                <?php foreach($allergies as $allergy) : ?>
                    <li><?=$allergy['name']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>
