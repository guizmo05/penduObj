<?php

declare(strict_types=1);

namespace App\controller\game;

use App\Domain\Game\Game;
use App\Domain\Game\LetterProposal;
use App\Domain\Game\WordProposal;

/* Init a new game, if $_SESSION['word'] is not set */
if (!isset( $_SESSION['game'])) {
    $game = initGame();
    $_SESSION['game'] = serialize($game);
}

if (isset($_POST['letter'])) {
    letterProposition(strtoupper($_POST['letter']))->checkProposal();
}
if (isset($_POST['word'])) {
    wordProposition(strtoupper($_POST['word']))->checkProposal();
}

function initGame() {
    $game = new Game();
    return $game;
}

function letterProposition(string $letter) : letterProposal {
    return new letterProposal($letter);
}

function wordProposition(string $word) : wordProposal {
    return new wordProposal($word);
}

function gameForm(): string {
    ob_start();
    require(DIR_TEMPLATES . '/game/game.html.php');
    return ob_get_clean();
}

function displayGame()
{
    ob_start();
    require(DIR_TEMPLATES . '/game/game.html.php');
    return ob_get_clean();
}
echo displayGame();

/* Ending game conditions */
if (isset($_SESSION['game'])) {
    $game = unserialize($_SESSION['game']);

    if ($game->getTry() === 0) {
        header('Location: /lose');
    }

    if ($game->getWord()->getWord() === $game->getWord()->getMaskedWord()) {
        header('Location: /win');
    }
}



?>


