<?php

$title = 'orderList';

ob_start();
?>
<?php $id=null; ?>
<div>
    <div class="order-list">
        <ul>
            <li class="orderListTitre">Image</li>
            <li class="orderListTitre">Nom</li>
            <li class="orderListTitre">Quantité</li>
            <li class="orderListTitre">Prix</li>
            <li class="orderListTitre">QT</li>
            <li class="orderListTitre">||</li>
        </ul>
    </div>
    <?php foreach ($orders as $order) : ?>
        <div class="order-list">
            <?php if($id != null && $order['id'] == $id) : ?>
            <ul>
                <li class="orderList"><img src="image\<?=$order['image']; ?>" width="40px"></li>
                <li class="orderList"><?=$order['name']; ?></li>
                <li class="orderList"><?=$order['quantity']; ?></li>
                <li class="orderList"><?=$order['price']; ?></li>
                <li class="orderList"><?=$order['totalQuantity']; ?></li>
                <li class="orderList">||</li>
            </ul>
            <?php elseif($id != null && $order['id'] != $id) : ?>
                <?php $id = $order['id']?>
                <p>_____________________________________</p>
                <ul>
                    <li class="orderList"><img src="image\<?=$order['image']; ?>" width="40px"></li>
                    <li class="orderList"><?=$order['name']; ?></li>
                    <li class="orderList"><?=$order['quantity']; ?></li>
                    <li class="orderList"><?=$order['price']; ?></li>
                    <li class="orderList"><?=$order['totalQuantity']; ?></li>
                    <li class="orderList">||</li>
                </ul>
            <?php else :?>
                <?php $id = $order['id']?>
                <ul>
                    <li class="orderList"><img src="image\<?=$order['image']; ?>" width="40px"></li>
                    <li class="orderList"><?=$order['name']; ?></li>
                    <li class="orderList"><?=$order['quantity']; ?></li>
                    <li class="orderList"><?=$order['price']; ?></li>
                    <li class="orderList"><?=$order['totalQuantity']; ?></li>
                    <li class="orderList">||</li>
                </ul>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>