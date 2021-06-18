<?php

declare(strict_types=1)
;

use App\core\Tools;

$game = unserialize($_SESSION['game']);
echo 'Bravo, vous avez trouvé le mot "'.$game->getWord()->getWord().'".<br/>';
echo 'Il vous restait '.$game->getTry().' essai'.($game->getTry()>1?'s':'').'.<br/>';

unset($_SESSION['game']);

echo Tools::getLink('/').'<br/>';

