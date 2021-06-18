<?php

declare(strict_types=1);
namespace App\templates;

?>

    <h1>Bienvenue sur le Pendu</h1>

<?php
use  App\core\Tools;

echo Tools::displayTemplates('player/authentPlayer.html.php');
