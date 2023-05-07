<?php

namespace PragmaGoTech\Interview\Providers;

use PragmaGoTech\Interview\Providers\FeeCalculationProposal;
use PHPUnit\Framework\TestCase;

class FeeCalculationProposalTest extends TestCase
{


    /**
     * @dataProvider roundingFeeCalculationProposalCases
     */
    public function testRoundingFeeCalculationProposal(
        FeeCalculationProposal $feeCalculationProposal,
        FeeCalculationProposal $feeCalculationProposalResult
    )
    {
//        given
//        when
        $result = FeeCalculationProposal::roundingFeeCalculationProposal($feeCalculationProposal);
//        then

        $this->assertEquals($feeCalculationProposalResult->getCalculatedProposal(), $result->getCalculatedProposal());
    }

    public function testGetCalculatedProposal()
    {
//        given
        $feeCalculationProposal = new FeeCalculationProposal(1000);
//        when
        $result = $feeCalculationProposal->getCalculatedProposal();
//        then

        $this->assertEquals(1000, $result);
    }

    public static function roundingFeeCalculationProposalCases(): array
    {
        return [
            [new FeeCalculationProposal(397), new FeeCalculationProposal(400)],
            [new FeeCalculationProposal(101.15), new FeeCalculationProposal(105)],
            [new FeeCalculationProposal(95.01), new FeeCalculationProposal(100)],
            [new FeeCalculationProposal(95), new FeeCalculationProposal(95)],

        ];
    }


}
