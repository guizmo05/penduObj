<?php

declare(strict_types=1);

// ce fichier devrait être dans un sous-répertoire

session_start();
spl_autoload_register();

use App\Domain\Player\Player;
use App\core\Tools;

require_once('config/config.php');

// ce n'est pas le role de ce fichier de créer un utilisateur.
$player = new Player(1, 'toto', 'toto');

// ce n'est pas le role de ce fichier d'aller chercher un template
Tools::displayTemplates('player/authentPlayer.html.php');

// ce bloc ne devrait pas être là, c'est le rôle du bloc ligne 30.
try {
    include(Tools::getControllerByPath('/home'));
} catch (Exception $e) {
    echo $e->getMessage();
}

// ça n'a pas sa place ici :)
// C'est aux templates de gérer cet affichage.
if (!isset($_SESSION['game']) && isset($_SESSION['user'])) {
    echo Tools::getLink('/game');
}

// Cette condition n'a pas lieu d'être, elle devrait être gérée au sine de getControllerByServerPath
// d'ailleurs il manque une paire de parenthèse pour encapsuler la condition de gauche.
if ($_SERVER['PATH_INFO']??'/'!=='/') {
    try {
        include(Tools::getControllerByServerPath());
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

