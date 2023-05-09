<?php

$title = 'home';

ob_start();
?>

<div>
    <div>
        <img>
    </div>
    <div>
        <img>
    </div>
    <div>
        <img>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>