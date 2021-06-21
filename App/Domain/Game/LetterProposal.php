<?php

declare(strict_types=1);


namespace App\Domain\Game;


class LetterProposal extends Proposal implements ProposalInterface
{
    private string $letter;
    public function __construct(string $letter) {
        $this->letter = $letter;
    }
    public function checkProposal() : bool {
        /** @var Game $game */
        $game = unserialize($_SESSION['game']);

        if (is_int(strpos($game->getLetters(), $this->letter))) {
            $game->decreaseTry();
            $_SESSION['game'] = serialize($game);
            return false;
        }

        // meme remarque pour la loi de demeter ici.
        // pourquoi ne pas avoir homogénéisé avec is_int ou !== false dans les 2 conditions ?
        if (strpos($game->getWord()->getWord(), $this->letter) !== false) {
            $game->setLetters($this->letter);
            // meme remarque pour la loi de demeter ici.
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
