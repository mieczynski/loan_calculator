<?php

namespace PragmaGoTech\Interview\Algorithms;

use PragmaGoTech\Interview\Providers\LoanProposal;
use PragmaGoTech\Interview\Bounds\ProposalBounds;
use PragmaGoTech\Interview\Bounds\FeeBounds;
use PragmaGoTech\Interview\Providers\FeeCalculationProposal;

class DefaultAlgorithm implements Algorithm
{

    public function __invoke(ProposalBounds $proposalBounds, FeeBounds $feeBounds, LoanProposal $loanProposal): FeeCalculationProposal
    {
        return new FeeCalculationProposal(abs(($proposalBounds->getMinBound() - $loanProposal->getAmount()) / ($proposalBounds->getMaxBound() - $proposalBounds->getMinBound())) * ($feeBounds->getMaxFeeBound() - $feeBounds->getMinFeeBound()) + $feeBounds->getMinFeeBound());
    }
}