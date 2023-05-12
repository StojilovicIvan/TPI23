<?php

$title = 'cart';

ob_start();
?>

<?php
$ids = array_keys($_SESSION['panier']);
if(empty($ids)){
    echo "Votre panier est vide";
}
else{
    require "data/dbconnector.php";

    $pdo = dbConnect();

    $produits = array();
    foreach($ids as $id) {
        $stmt = $pdo->prepare("SELECT name, price FROM biscuits WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);
        $produit['quantity'] = $_SESSION['panier'][$id];
        $produits[] = $produit;
    }

    foreach($produits as $produit):
        ?>

        <tr>
            <td><?=$produit['name']?></td>
            <td><?=$produit['price']?></td>
            <td><?=$produit['quantity']?></td>
        </tr>

    <?php endforeach ; } ?>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>