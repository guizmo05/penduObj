<?php

declare(strict_types=1);

namespace App\controller\player;

function disconnectPlayer() : void {
    session_destroy();
    header ('Location: /');
}

disconnectPlayer();