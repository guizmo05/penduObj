<?php

declare(strict_types=1);

namespace App\Domain\Word;

use App\core\Tools;
use PDO;

class Word
{
    private string $word;
    private string $maskedWord;

    function __construct() {
        $this->getRandomWord();
        $this->setMaskedWord();
    }

    public function getWord(): string
    {
        return $this->word;
    }
    public function getMaskedWord(): string
    {
        return $this->maskedWord;
    }

    private function getRandomWord() : void {
        $pdo = Tools::getPDO();

        $words = $pdo->query('SELECT * FROM words order by rand() LIMIT 1');
        $words->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($words as $word) {
            $this->word =  strtoupper($word['word']);
        }
    }

    public function setMaskedWord(string $maskedWord = '') : void {
        $this->maskedWord = $maskedWord;

        if ($this->maskedWord === '') {
            foreach (str_split($this->word) as $letter) {
                $this->maskedWord .= '*';
            }
        }
    }

    public function updateMaskedWord(string $letter) : void {
        // on évite l'usage de fonction dans le second argument d'un for car elle est appelée à chaque tour
        for($i=0;$i<strlen($this->word);$i++ ) {
            if ($this->word[$i] === $letter) {
                $this->maskedWord[$i] = $letter;
            }
        }
    }
}
