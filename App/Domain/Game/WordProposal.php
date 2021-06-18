<?php

declare(strict_types=1);


namespace App\Domain\Game;


class WordProposal extends Proposal implements ProposalInterface
{
    public string $word;
    public function __construct(string $word) {
        $this->word = $word;
    }
    public function checkProposal() : bool {
        $game = unserialize($_SESSION['game']);

        if ($game->getWord()->getWord() !== $this->word) {
            $game->setTry(0);
            $_SESSION['game'] = serialize($game);
            return false;

        }
        $game->getWord()->setMaskedWord($this->word);
        $_SESSION['game'] = serialize($game);
        return true;
    }

}