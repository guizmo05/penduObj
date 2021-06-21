<?php

declare(strict_types=1)
;

namespace App\Domain\Game;

// j'aime l'idée de cette interface
interface ProposalInterface
{
    public function checkProposal(): bool;
}
