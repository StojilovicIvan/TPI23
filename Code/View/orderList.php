<?php

$title = 'orderList';

ob_start();
?>
<?php $pageTitle = "Listes de commandes" ?>
<?php $id=null; ?>
<div>
    <?php if($orders != null) : ?>
        <div class="order-list">
            <ul>
                <li class="order-style-title">Image</li>
                <li class="order-style-title">Nom</li>
                <li class="order-style-title">Quantité</li>
                <li class="order-style-title">Prix</li>
                <li class="order-style-title">||</li>
                <li class="order-style-title">Quantité</li>
                <li class="order-style-title">Date</li>
                <li class="order-style-title">Prix</li>
            </ul>
        </div>
        <?php foreach ($orders as $order) : ?>
            <div class="order-list">
                <?php if($id != null && $order['id'] == $id) : ?>
                    <ul>
                        <li class="order-style"><img src="image\<?=$order['image']; ?>" width="40px"></li>
                        <li class="order-style"><?=$order['name']; ?></li>
                        <li class="order-style"><?=$order['quantity']; ?></li>
                        <li class="order-style"><?=$order['price']; ?></li>
                        <li class="order-style">||</li>
                        <li class="order-style"><?=$order['totalQuantity']; ?></li>
                        <li class="order-style"><?=$order['date']; ?></li>
                        <li class="order-style"><?=$order['totalPrice']; ?></li>
                    </ul>
                <?php elseif($id != null && $order['id'] != $id) : ?>
                    <?php $id = $order['id']?>
                    <p>_____________________________________</p>
                    <ul>
                        <li class="order-style"><img src="image\<?=$order['image']; ?>" width="40px"></li>
                        <li class="order-style"><?=$order['name']; ?></li>
                        <li class="order-style"><?=$order['quantity']; ?></li>
                        <li class="order-style"><?=$order['price']; ?></li>

                        <li class="order-style">||</li>
                        <li class="order-style"><?=$order['totalQuantity']; ?></li>
                        <li class="order-style"><?=$order['date']; ?></li>
                        <li class="order-style"><?=$order['totalPrice']; ?></li>
                    </ul>
                <?php else :?>
                    <?php $id = $order['id']?>
                    <ul>
                        <li class="order-style"><img src="image\<?=$order['image']; ?>" width="40px"></li>
                        <li class="order-style"><?=$order['name']; ?></li>
                        <li class="order-style"><?=$order['quantity']; ?></li>
                        <li class="order-style"><?=$order['price']; ?></li>
                        <li class="order-style">||</li>
                        <li class="order-style"><?=$order['totalQuantity']; ?></li>
                        <li class="order-style"><?=$order['date']; ?></li>
                        <li class="order-style"><?=$order['totalPrice']; ?></li>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="empty-page">
            <h3>Auncune commande n'a été effectuée pour le moment.</h3>
            <a href="index.php?action=shop" class="boxed-btn">Accéder à la boutique</a>
        </div>
    <?php endif; ?>

</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>