<?php

declare(strict_types=1)
;

use App\core\Tools;

$game = unserialize($_SESSION['game']);
echo 'Que dire... Dommage, pourtant pas bien compliqué de trouver le mot "'.$game->getWord()->getWord().'".<br/>';

unset($_SESSION['game']);

echo Tools::getLink('/').'<br/>';
