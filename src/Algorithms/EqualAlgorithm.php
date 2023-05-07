<?php

namespace PragmaGoTech\Interview\Algorithms;

use PragmaGoTech\Interview\Bounds\FeeBounds;
use PragmaGoTech\Interview\Bounds\ProposalBounds;
use PragmaGoTech\Interview\Providers\FeeCalculationProposal;
use PragmaGoTech\Interview\Providers\LoanProposal;

class EqualAlgorithm implements Algorithm
{

    public function __invoke(ProposalBounds $proposalBounds, FeeBounds $feeBounds, LoanProposal $loanProposal): FeeCalculationProposal
    {
        return new FeeCalculationProposal($feeBounds->getMaxFeeBound());
    }
}