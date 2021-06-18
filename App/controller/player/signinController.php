<?php

declare(strict_types=1);

use App\core\Tools;
use App\Domain\Player\Player;

/**
* @throws Exception Erreur authentification
* @throws PDOException Erreur BDD
*/
function signinPlayer(string $user, string $pwd): Player  {
    if ($user===''||$pwd==='') {
        throw new Exception( 'Création impossible!');

    }
    $pdo = Tools::getPDO();
    $preparation = $pdo->prepare('insert into users (user, pwd) values (:user, :pwd)');

    $pwd = password_hash($pwd, PASSWORD_ARGON2ID);

    $result = $preparation->execute(['user' => $user, 'pwd' => $pwd, ]);

    if (isset($result)) {
        return new Player((int) $pdo->lastInsertId(), $user, $pwd);
    }
}

if (isset($_POST['user']))
{
    // Vérification de l'inexistance du user et ajout
    try {
        $_SESSION['user'] = serialize(signinPlayer($_POST['user'], $_POST['pwd']));
        header ('Location: /');
    } catch (PDOException|Exception $e) {
        echo 'Création Impossible';
    }
}

function signinForm (): string {
    ob_start();
    require(DIR_TEMPLATES . '/player/signinForm.html.php');
    return ob_get_clean();
}

echo signinForm();

?>