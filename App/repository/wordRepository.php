<?php

declare(strict_types=1);

namespace App\repository;

use App\core\Tools;
use PDO;

// Ce fichier devrait contenir une classe

function getNewWord(): string {
    $pdo = Tools::getPDO();

    $words = $pdo->query('SELECT * FROM words order by rand() LIMIT 1');
    $words->setFetchMode(PDO::FETCH_ASSOC);

    return strtoupper($words[0]['word']);
}
