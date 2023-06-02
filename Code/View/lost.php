<?php

$title = 'lost';

ob_start();
?>
<?php $pageTitle = "Erreur 404" ?>
    <div class="full-height-section error-section">
        <div class="full-height-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="error-text">
                            <i class="far fa-sad-cry"></i>
                            <h1>Oops! Erreur 404.</h1>
                            <p>La page demandée est introuvable.</p>
                            <a href="index.php?action=home" class="boxed-btn">Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>