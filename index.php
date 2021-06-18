<?php

declare(strict_types=1);

session_start();
spl_autoload_extensions(".php");
spl_autoload_register();
use App\Domain\Player\Player;
use App\core\Tools;

require_once('config/config.php');

$player = new Player(1, 'toto', 'toto');

Tools::displayTemplates('player/authentPlayer.html.php');


try {
    include(Tools::getControllerByPath('/home'));
} catch (Exception $e) {
    echo $e->getMessage();
}

if (!isset($_SESSION['game']) && isset($_SESSION['user'])) {
    echo Tools::getLink('/game');
}

if ($_SERVER['PATH_INFO']??'/'!=='/') {
    try {
        include(Tools::getControllerByServerPath());
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

