<?php

$title = 'cart';

ob_start();
?>
<?php $pageTitle = "Panier" ?>
<div>
    <?php if($emptyCart == null) :?>
        <div class="empty-page">
            <h3>Panier vide</h3>
            <a href="index.php?action=shop" class="boxed-btn">Accéder à la boutique</a>
        </div>
    <?php else : ?>
    <form action="index.php?action=validCart" method="POST">
        <?php foreach($produits as $produit): ?>
        <div id="cart-list">
            <ul>
                <li class="list-biscuit"><img src="image\cookie.jpg" height="100px"></li>
                <li class="list-biscuit">Nom : <?=$produit['name']?></li>
                <li class="list-biscuit">Prix unitaire : <?=$produit['price']?> CHF</li>
                <li class="list-biscuit">Quantité : <?=$produit['quantity']?></li>
                <li class="list-biscuit"><a href="index.php?action=increaseQuantity&id=<?=$produit['id']?>">+</a></li>
                <li class="list-biscuit"><a href="index.php?action=decreaseQuantity&id=<?=$produit['id']?>">-</a></li>
                <li class="list-biscuit">Prix total : <?=$produit['price'] * $produit['quantity']?> CHF</li>
                <?php $total += $produit['price'] * $produit['quantity'] ?>
                <li class="list-biscuit"><a href="index.php?action=deleteBiscuit&id=<?=$produit['id']?>">Supprimer</a></li>
            </ul>
        </div>
            <input type="hidden" name="product_ids[]" value="<?=$produit['id']?>">
            <input type="hidden" name="product_quantities[]" value="<?=$produit['quantity']?>">
            <input type="hidden" name="product_totalPrice" value="<?=$total?>">
            <input type="hidden" name="product_totalQuantity[]" value="<?=$produit['id']?>">
        <?php endforeach ; ?>
        <div id="cart-footer">
            <p>Prix total : <?=$total ?> CHF </p>
            <button type="submit">Valider la commande</button>
            <p></p>
        </div>
    </form>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>