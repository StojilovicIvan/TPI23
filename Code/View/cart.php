<?php

$title = 'cart';

ob_start();
?>
<?php
if(!isset($_SESSION['panier'])){
    echo "Le panier est vide";
}
else{
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
        $total = null;

        foreach($produits as $produit):
            ?>
            <div id="cartList">
                <ul>
                    <li class="listBiscuit"><img src="image\cookie.jpg" height="100px"></li>
                    <li class="listBiscuit">Nom : <?=$produit['name']?></li>
                    <li class="listBiscuit">Prix unitaire : <?=$produit['price']?> CHF</li>
                    <li class="listBiscuit">Quantité : <?=$produit['quantity']?></li>
                    <!--<li class="listBiscuit">
                        <button>+</button>
                        <button>-</button>
                    </li>-->
                    <li class="listBiscuit">Prix total : <?=$produit['price'] * $produit['quantity']?> CHF</li>
                    <?php $total += $produit['price'] * $produit['quantity'] ?>
                </ul>
            </div>

        <?php endforeach ; } ?>
    <div id="cartFooter">
        <a href="">Prix total : <?=$total ?> CHF <button>Valider la commande</button></a>
        <p></p>
    </div>
<?php } ?>





<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>