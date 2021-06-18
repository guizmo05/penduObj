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
        self::getRandomWord();
        self::setMaskedWord();
    }

    public function getWord(): string
    {
        return $this->word;
    }
    public function getMaskedWord(): string
    {
        return $this->maskedWord;
    }

    function getRandomWord() : void {
        $pdo = Tools::getPDO();

        $words = $pdo->query('SELECT * FROM words order by rand() LIMIT 1');
        $words->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($words as $word) {
            $this->word =  strtoupper($word['word']);
        }
    }

    function setMaskedWord(string $maskedWord = '') : void {
        $this->maskedWord = $maskedWord;

        if ($this->maskedWord === '') {
            foreach (str_split($this->word) as $letter) {
                $this->maskedWord .= '*';
            }
        }
    }

    function updateMaskedWord(string $letter) : void {
        for($i=0;$i<strlen($this->word);$i++ ) {
            if ($this->word[$i] === $letter) {
                $this->maskedWord[$i] = $letter;
            }
        }
    }
}