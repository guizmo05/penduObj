<?php

declare(strict_types=1)
;

namespace App\Domain\Game;

interface ProposalInterface
{
    public function checkProposal(): bool;
}
