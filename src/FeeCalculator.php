<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview;

use PragmaGoTech\Interview\Providers\FeeCalculationProposal;
use PragmaGoTech\Interview\Providers\LoanProposal;

interface FeeCalculator
{
    public function calculate(LoanProposal $loanProposal): FeeCalculationProposal;
}
