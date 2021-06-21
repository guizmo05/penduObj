<?php

declare(strict_types=1);

namespace App\Domain\Game;

class WordProposal extends Proposal implements ProposalInterface
{
    private string $word;
    public function __construct(string $word) {
        $this->word = $word;
    }
    public function checkProposal() : bool {
        /** @var Game $game */
        $game = unserialize($_SESSION['game']);

        // violation de la loi de déméter. getWord de Game devrait retourner immédiatement le mot.
        if ($game->getWord()->getWord() !== $this->word) {
            $game->setTry(0);
            $_SESSION['game'] = serialize($game);
            return false;
        }

        // pareil ici.
        $game->getWord()->setMaskedWord($this->word);
        $_SESSION['game'] = serialize($game);
        return true;
    }

}
