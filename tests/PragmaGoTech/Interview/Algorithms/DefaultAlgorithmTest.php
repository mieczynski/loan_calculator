<?php

namespace PragmaGoTech\Interview\Algorithms;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Bounds\FeeBounds;
use PragmaGoTech\Interview\Providers\FeeCalculationProposal;
use PragmaGoTech\Interview\Providers\LoanProposal;
use PragmaGoTech\Interview\Bounds\ProposalBounds;

class DefaultAlgorithmTest extends TestCase
{

    /**
     * @throws Exception
     * @dataProvider successfulDefaultAlgorithmCases
     */
    public function testSuccessDefaultAlgorithmFee(
        ProposalBounds         $proposalBounds,
        FeeBounds              $feeBounds,
        LoanProposal           $loanProposal,
        FeeCalculationProposal $feeCalculationProposal

    )
    {
//        given
        $algorithm = new DefaultAlgorithm();
//        when
        $resultFeeCalculationProposal = $algorithm($proposalBounds, $feeBounds, $loanProposal);
//        then
        $this->assertInstanceOf(FeeCalculationProposal::class, $resultFeeCalculationProposal);

        $this->assertEquals($feeCalculationProposal->getCalculatedProposal(), $resultFeeCalculationProposal->getCalculatedProposal());

    }

    /**
     * @throws Exception
     * @dataProvider failureDefaultAlgorithmCases
     */
    public function testFailureDefaultAlgorithmFee(
        ProposalBounds         $proposalBounds,
        FeeBounds              $feeBounds,
        LoanProposal           $loanProposal,
        FeeCalculationProposal $feeCalculationProposal

    )
    {
//        given
        $algorithm = new DefaultAlgorithm();
//        when
        $resultFeeCalculationProposal = $algorithm($proposalBounds, $feeBounds, $loanProposal);
//        then
        $this->assertInstanceOf(FeeCalculationProposal::class, $resultFeeCalculationProposal);

        $this->assertNotEquals($feeCalculationProposal->getCalculatedProposal(), $resultFeeCalculationProposal->getCalculatedProposal());

    }

    public static function successfulDefaultAlgorithmCases(): array
    {
        return [
            [new ProposalBounds(1000, 2000), new FeeBounds(new ProposalBounds(1000, 2000)), new LoanProposal(1500), new FeeCalculationProposal(70)],
            [new ProposalBounds(1000, 2000), new FeeBounds(new ProposalBounds(1000, 2000)), new LoanProposal(1666), new FeeCalculationProposal(76.64)],
            [new ProposalBounds(1000, 2000), new FeeBounds(new ProposalBounds(1000, 2000)), new LoanProposal(1800), new FeeCalculationProposal(82)],
            [new ProposalBounds(4000, 5000), new FeeBounds(new ProposalBounds(4000, 5000)), new LoanProposal(4500), new FeeCalculationProposal(107.5)],
            [new ProposalBounds(5000, 6000), new FeeBounds(new ProposalBounds(5000, 6000)), new LoanProposal(5500), new FeeCalculationProposal(110)],
            [new ProposalBounds(19000, 20000), new FeeBounds(new ProposalBounds(19000, 20000)), new LoanProposal(19100), new FeeCalculationProposal(382)],
            [new ProposalBounds(19000, 20000), new FeeBounds(new ProposalBounds(19000, 20000)), new LoanProposal(19175), new FeeCalculationProposal(383.5)],
            [new ProposalBounds(19000, 20000), new FeeBounds(new ProposalBounds(19000, 20000)), new LoanProposal(19250), new FeeCalculationProposal(385)],

        ];
    }

    public static function failureDefaultAlgorithmCases(): array
    {
        return [
            [new ProposalBounds(1000, 2000), new FeeBounds(new ProposalBounds(1000, 2000)), new LoanProposal(1500), new FeeCalculationProposal(73)],
            [new ProposalBounds(1000, 2000), new FeeBounds(new ProposalBounds(1000, 2000)), new LoanProposal(1666), new FeeCalculationProposal(76.65)],
            [new ProposalBounds(1000, 2000), new FeeBounds(new ProposalBounds(1000, 2000)), new LoanProposal(1800), new FeeCalculationProposal(89)],
            [new ProposalBounds(4000, 5000), new FeeBounds(new ProposalBounds(4000, 5000)), new LoanProposal(4500), new FeeCalculationProposal(108)],
            [new ProposalBounds(5000, 6000), new FeeBounds(new ProposalBounds(5000, 6000)), new LoanProposal(5500), new FeeCalculationProposal(112)],
            [new ProposalBounds(19000, 20000), new FeeBounds(new ProposalBounds(19000, 20000)), new LoanProposal(19100), new FeeCalculationProposal(381)],
            [new ProposalBounds(19000, 20000), new FeeBounds(new ProposalBounds(19000, 20000)), new LoanProposal(19175), new FeeCalculationProposal(390)],

        ];
    }
}
