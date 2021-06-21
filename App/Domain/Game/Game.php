<?php

declare(strict_types=1);

namespace App\Domain\Game;

use App\Domain\Word\Word;

class Game
{
    private Word $word;
    private string $letters = '';
    private int $try = MAX_TRY;

    public function __construct() {
        $this->word = new Word();
    }

    public function decreaseTry () {
        $this->try --;
    }

    public function getTry (): int {
        return $this->try;
    }

    public function setTry (int $try) {
        $this->try = $try;
    }

    public function getWord(): Word
    {
        return $this->word;
    }

    // cette méthode n'est jamais appelée.
    public function setWord(Word $word): void
    {
        $this->word = $word;
    }

    public function getLetters(): string
    {
        return $this->letters;
    }

    // addLetters serait plus approprié. setLetters sous-entends qu'on écrase la valeur, or ici on concatène;
    public function setLetters(string $letters): void
    {
        $this->letters .= $letters;
    }
}
