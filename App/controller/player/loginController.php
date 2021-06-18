<?php

declare(strict_types=1);

namespace App\controller\player;

use App\core\Tools;
use App\Domain\Player\Player;
use Exception;
use PDO;
use PDOException;

/**
* @throws Exception Erreur authentification
* @throws PDOException Erreur BDD
*/
function connectPlayer (string $user, string $pwd) : Player {
    if ($user==='' || $pwd==='')  {
     throw new Exception('Erreur authentification');
    }

    $pdo = Tools::getPDO();
    $preparation = $pdo->prepare('select * from users where user=:user');
    $preparation->execute(['user' => $user, ]);
    $users = $preparation->fetchAll(PDO::FETCH_ASSOC);

    if (!isset($users) ||
        !password_verify( $pwd, $users[0]['pwd'] ?? ''))
    {
        throw new Exception('Erreur authentification');
    }
    return new Player((int) $users[0]['id'], $users[0]['user'], $users[0]['pwd']);
}

if (isset($_POST['user']))
{
    try {
        $_SESSION['user'] = serialize(connectPlayer($_POST['user'], $_POST['pwd']));
        header ('Location: /');
    } catch (PDOException|Exception $e) {
        echo $e->getMessage();
    }
}

function connectForm(): string {
    ob_start();
    require(DIR_TEMPLATES . '/player/connectForm.html.php');
    return ob_get_clean();
}

echo connectForm()

?>