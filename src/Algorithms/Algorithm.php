<?php

namespace PragmaGoTech\Interview\Algorithms;

use PragmaGoTech\Interview\Providers\LoanProposal;
use PragmaGoTech\Interview\Bounds\ProposalBounds;
use PragmaGoTech\Interview\Bounds\FeeBounds;
use PragmaGoTech\Interview\Providers\FeeCalculationProposal;


interface Algorithm
{
    public function __invoke(ProposalBounds $proposalBounds, FeeBounds $feeBounds, LoanProposal $loanProposal): FeeCalculationProposal;
}