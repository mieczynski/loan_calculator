<?php

namespace PragmaGoTech\Interview\Providers;

use Exception;

class LoanProposalValidator
{
    private LoanProposal $proposal;

    /**
     * @throws Exception
     */
    public function __invoke(): bool
    {
        return $this->validLoanProposal();
    }

    /**
     * @param LoanProposal $proposal
     */
    public function __construct(LoanProposal $proposal)
    {
        $this->proposal = $proposal;
    }

    /**
     * @throws Exception
     */
    private function checkIfAmountExist(): void
    {
        if (!$this->proposal->getAmount())
            throw new Exception('Amount doest exist');

    }

    /**
     * @throws Exception
     */
    private function checkIfAmountContainsInBound(): void
    {
        if ($this->proposal->getAmount() < MIN_PROPOSAL_BOUND || $this->proposal->getAmount() > MAX_PROPOSAL_BOUND)
            throw new Exception('Amount doest contains in bounds');

    }

    /**
     * @throws Exception
     */
    private function validLoanProposal(): bool
    {
        $this->checkIfAmountContainsInBound();
        $this->checkIfAmountExist();
        return true;
    }

}