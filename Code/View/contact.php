<?php

$title = 'contact';

ob_start();
?>



<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>