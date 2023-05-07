<?php

namespace PragmaGoTech\Interview\Algorithms;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Bounds\FeeBounds;
use PragmaGoTech\Interview\Providers\FeeCalculationProposal;
use PragmaGoTech\Interview\Providers\LoanProposal;
use PragmaGoTech\Interview\Bounds\ProposalBounds;

class EqualAlgorithmTest extends TestCase
{

    /**
     * @throws Exception
     * @dataProvider successfulEqualAlgorithmCases
     */
    public function testSuccessEqualAlgorithmFee(
        ProposalBounds         $proposalBounds,
        FeeBounds              $feeBounds,
        LoanProposal           $loanProposal,
        FeeCalculationProposal $feeCalculationProposal

    )
    {
//        given
        $algorithm = new EqualAlgorithm();
//        when
        $resultFeeCalculationProposal = $algorithm($proposalBounds, $feeBounds, $loanProposal);
//        then
        $this->assertInstanceOf(FeeCalculationProposal::class, $resultFeeCalculationProposal);

        $this->assertEquals($feeCalculationProposal->getCalculatedProposal(), $resultFeeCalculationProposal->getCalculatedProposal());

    }

    /**
     * @throws Exception
     * @dataProvider failureEqualAlgorithmCases
     */
    public function testFailureEqualAlgorithmFee(
        ProposalBounds         $proposalBounds,
        FeeBounds              $feeBounds,
        LoanProposal           $loanProposal,
        FeeCalculationProposal $feeCalculationProposal

    )
    {
//        given
        $algorithm = new EqualAlgorithm();
//        when
        $resultFeeCalculationProposal = $algorithm($proposalBounds, $feeBounds, $loanProposal);
//        then
        $this->assertInstanceOf(FeeCalculationProposal::class, $resultFeeCalculationProposal);

        $this->assertNotEquals($feeCalculationProposal->getCalculatedProposal(), $resultFeeCalculationProposal->getCalculatedProposal());

    }

    public static function successfulEqualAlgorithmCases(): array
    {
        return [
            [new ProposalBounds(2000, 3000), new FeeBounds(new ProposalBounds(2000, 3000)), new LoanProposal(2600), new FeeCalculationProposal(90)],
            [new ProposalBounds(2000, 3000), new FeeBounds(new ProposalBounds(2000, 3000)), new LoanProposal(2999), new FeeCalculationProposal(90)],

        ];
    }

    public static function failureEqualAlgorithmCases(): array
    {
        return [
            [new ProposalBounds(1000, 2000), new FeeBounds(new ProposalBounds(1000, 2000)), new LoanProposal(1500), new FeeCalculationProposal(50)],
            [new ProposalBounds(1000, 2000), new FeeBounds(new ProposalBounds(1000, 2000)), new LoanProposal(5000), new FeeCalculationProposal(50)],

        ];
    }
}
