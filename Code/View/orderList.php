<?php

$title = 'orderList';

ob_start();
?>

<?=$panier ?>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>
