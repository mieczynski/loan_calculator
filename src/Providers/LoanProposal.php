<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Providers;

const MIN_PROPOSAL_BOUND = 1000;
const MAX_PROPOSAL_BOUND = 20000;
/**
 * A cut down version of a loan application containing
 * only the required properties for this test.
 */
class LoanProposal
{
    private float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    /**
     * Amount requested for this loan application.
     */
    public function getAmount(): float
    {
        return $this->amount;
    }


}
