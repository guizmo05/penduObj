<?php

declare(strict_types=1);
const PROJECT_DIR = __DIR__.'/..';

const DIR_CONTROLLER = PROJECT_DIR.'/App/controller/';

const DIR_CORE = PROJECT_DIR.'/App/core/';

const DIR_TEMPLATES = PROJECT_DIR.'/App/templates/';

const MAX_TRY = 11;

const ROUTES = [
    [
        'path' => '/',
         'controller' => DIR_TEMPLATES.'home.html.php',
         'label' => 'Accueil',
         'isMenuItem' => true,
    ],
    [
        'path' => '/game',
         'controller' => DIR_CONTROLLER.'game/gameController.php',
         'label' => 'Lancer une partie',
         'isMenuItem' => false,
    ],
    [
        'path' => '/login',
         'controller' => DIR_CONTROLLER.'player/loginController.php',
         'label' => 'Se connecter',
         'isMenuItem' => false,
    ],
    [
        'path' => '/logout',
         'controller' => DIR_CONTROLLER.'player/logoutController.php',
         'label' => 'Se déconnecter',
         'isMenuItem' => false,
    ],
    [
        'path' => '/signIn',
         'controller' => DIR_CONTROLLER.'player/signinController.php',
         'label' => 's\'inscrire',
         'isMenuItem' => false,
    ],
    [
        'path' => '/connection',
         'controller' => DIR_CONTROLLER.'player/connectionController.php',
         'label' => 'Connexion',
         'isMenuItem' => false,
    ],
    [
        'path' => '/win',
         'controller' => DIR_TEMPLATES.'game/win.html.php',
         'label' => 'Victoire',
         'isMenuItem' => false,
    ],
    [
        'path' => '/lose',
         'controller' => DIR_TEMPLATES.'game/lose.html.php',
         'label' => 'Défaite',
         'isMenuItem' => false,
    ],
    [
        'path' => '/giveUp',
        'controller' => DIR_TEMPLATES.'game/giveUp.html.php',
        'label' => 'Abandon',
        'isMenuItem' => false,
    ],
    [
        'path' => '/authentPlayer',
        'controller' => DIR_TEMPLATES.'player/authentPlayer.html.php',
        'label' => 'Way to authentify',
        'isMenuItem' => false,
    ],
    [
        'path' => '/home',
        'controller' => DIR_TEMPLATES.'home.html.php',
        'label' => 'Home page template',
        'isMenuItem' => false,
    ],
];

