<?php

declare(strict_types=1);

namespace App\core;

use Exception;
use PDO;

// Cette classe est un fourre-tout. elle gère l'affichage, le routing, des helpers, et la connection à la BDD
// c'est trop. SOLID -> S Single Responsibility / Concern Separation.
class Tools
{
    static function displayTemplates(string $template): string
    {
        ob_start();
        require(DIR_TEMPLATES . $template);
        return ob_get_clean();
    }

    /**
     * @return string
     * @throws Exception controleur absent
     */
    static function getControllerByPath(string $path): string
    {
        foreach (ROUTES as $route) {
            // la condition `$path ?? '/'` n'est jamais vraie, ?? vérifie si c'est null or l'argument de la méthode n'est pas nullable.
            if ($route['path'] === ($path ?? '/')) {
                return $route['controller'];
            }
        }
        throw new Exception('Controleur non trouvé');
    }

    static function getControllerByServerPath(): string
    {
        foreach (ROUTES as $route) {
            if ($route['path'] === ($_SERVER['PATH_INFO'] ?? '/')) {
                return $route['controller'];
            }
        }
        throw new Exception('Controleur non trouvé');
    }

    static function getLink($path): string
    {
        foreach (ROUTES as $route) {
            // ici c'est plutôt un name que tu souhaites comparer, plutôt que le path.
            if ($route['path'] === $path) {
                return '<a href=\'' . $route['path'] . '\'>' . $route['label'] . '</a>';
            }
        }
        throw new Exception('Controleur non trouvé');
    }

    static function getMenu(): void
    {
        echo '<div>';
        foreach (ROUTES as $route) {
            if ($route['isMenuItem']) {
                echo self::getLink($route['path']);
            }
        }
        echo '</div>';
    }

    static function getPDO() : PDO {
        // je ne devrais pas avoir changer de code pour me connecter à ma base de données.
        $pdo = new PDO('sqlite://db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
