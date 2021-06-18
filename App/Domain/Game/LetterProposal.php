<?php

declare(strict_types=1);


namespace App\Domain\Game;


class LetterProposal extends Proposal implements ProposalInterface
{
    public string $letter;
    public function __construct(string $letter) {
        $this->letter = $letter;
    }
    public function checkProposal() : bool {
        $game = unserialize($_SESSION['game']);

        if (is_int(strpos($game->getLetters(), $this->letter))) {
            $game->decreaseTry();
            $_SESSION['game'] = serialize($game);
            return false;
        }

        if (strpos($game->getWord()->getWord(), $this->letter) !== false) {
            $game->setLetters($this->letter);
            $game->getWord()->updateMaskedWord($this->letter);
            $_SESSION['game'] = serialize($game);
            return true;
        }

        $game->setLetters($this->letter);
        $game->decreaseTry();
        $_SESSION['game'] = serialize($game);
        return false;
    }

}