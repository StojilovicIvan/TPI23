<?php

$title = 'cart';

ob_start();
?>

<div>
    <form action="index.php?action=validCart" method="POST">
        <?php foreach($produits as $produit): ?>
        <div id="cart-list">
            <ul>
                <li class="list-biscuit"><img src="image\cookie.jpg" height="100px"></li>
                <li class="list-biscuit">Nom : <?=$produit['name']?></li>
                <li class="list-biscuit">Prix unitaire : <?=$produit['price']?> CHF</li>
                <li class="list-biscuit">Quantité : <?=$produit['quantity']?></li>
                <!--<li class="listBiscuit">
                    <button>+</button>
                    <button>-</button>
                </li>-->
                <li class="list-biscuit">Prix total : <?=$produit['price'] * $produit['quantity']?> CHF</li>
                <?php $total += $produit['price'] * $produit['quantity'] ?>
            </ul>
        </div>
            <input type="hidden" name="product_ids[]" value="<?=$id?>">
            <input type="hidden" name="product_quantities[]" value="<?=$produit['quantity']?>">
        <?php endforeach ; ?>
        <div id="cart-footer">
            <p>Prix total : <?=$total ?> CHF </p>
            <button type="submit">Valider la commande</button>
            <p></p>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>