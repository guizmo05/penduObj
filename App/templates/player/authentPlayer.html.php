<?php
    declare(strict_types=1);
    use App\core\Tools;

    echo '<div>';

    if (!isset($_SESSION['user'])) {
        echo 'Avant de pouvoir jouer, vous devez vous connecter ou vous inscrire!!<br/>';
        echo Tools::getLink('/login').'  -  '.Tools::getLink('/signIn');
    }

    if (isset($_SESSION['user'])) {
        $user = unserialize($_SESSION['user']);
        echo "Bienvenue {$user->getName()} (".Tools::getLink('/logout').")!<br/>";
    }
    echo '</div>';
?>