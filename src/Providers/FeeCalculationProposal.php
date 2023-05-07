<?php

namespace PragmaGoTech\Interview\Providers;

const MULTIPLE = 5;
class FeeCalculationProposal implements FeeCalculation
{
    private float $calculatedProposal = 0.0;

    public function __construct(float $calculatedProposal)
    {
        $this->calculatedProposal = $calculatedProposal;
    }

    public function getCalculatedProposal(): float
    {
        return $this->calculatedProposal;
    }

    public static function roundingFeeCalculationProposal(FeeCalculationProposal $proposal): FeeCalculationProposal
    {
        return new self(ceil($proposal->getCalculatedProposal() / MULTIPLE) * MULTIPLE);
    }
}