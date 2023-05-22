<?php

$title = 'orderList';

ob_start();
?>
<?php $id=null; ?>
<div>
    <div class="order-list">
        <ul>
            <li class="order-style-title">Image</li>
            <li class="order-style-title">Nom</li>
            <li class="order-style-title">Quantité</li>
            <li class="order-style-title">Prix</li>
            <li class="order-style-title">QT</li>
            <li class="order-style-title">||</li>
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
                <li class="order-style"><?=$order['totalQuantity']; ?></li>
                <li class="order-style">||</li>
            </ul>
            <?php elseif($id != null && $order['id'] != $id) : ?>
                <?php $id = $order['id']?>
                <p>_____________________________________</p>
                <ul>
                    <li class="order-style"><img src="image\<?=$order['image']; ?>" width="40px"></li>
                    <li class="order-style"><?=$order['name']; ?></li>
                    <li class="order-style"><?=$order['quantity']; ?></li>
                    <li class="order-style"><?=$order['price']; ?></li>
                    <li class="order-style"><?=$order['totalQuantity']; ?></li>
                    <li class="order-style">||</li>
                </ul>
            <?php else :?>
                <?php $id = $order['id']?>
                <ul>
                    <li class="order-style"><img src="image\<?=$order['image']; ?>" width="40px"></li>
                    <li class="order-style"><?=$order['name']; ?></li>
                    <li class="order-style"><?=$order['quantity']; ?></li>
                    <li class="order-style"><?=$order['price']; ?></li>
                    <li class="order-style"><?=$order['totalQuantity']; ?></li>
                    <li class="order-style">||</li>
                </ul>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>