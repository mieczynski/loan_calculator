<?php

namespace PragmaGoTech\Interview\Providers;

interface FeeCalculation
{
    public function getCalculatedProposal();

    public static function roundingFeeCalculationProposal(FeeCalculationProposal $proposal): FeeCalculationProposal;

}