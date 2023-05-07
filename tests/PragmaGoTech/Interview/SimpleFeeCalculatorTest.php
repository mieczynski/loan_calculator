<?php

namespace PragmaGoTech\Interview;

use Exception;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Bounds\ProposalBounds;
use PragmaGoTech\Interview\Providers\FeeCalculationProposal;
use PragmaGoTech\Interview\Providers\LoanProposal;

class SimpleFeeCalculatorTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testIfCalculationResultExist()
    {
//        given
        $calculator = new SimpleFeeCalculator();
//        when
        $result = $calculator->calculate(new LoanProposal(1999));
//        then

        $this->assertInstanceOf(FeeCalculationProposal::class, $result);

    }


    /**
     * @throws Exception
     * @dataProvider validLoanProposalCases
     */
    public function testIfLoanProposalIsValid(LoanProposal $loanProposal)
    {
//        given
        $calculator = new SimpleFeeCalculator();
//        when
        $result = $calculator->calculate($loanProposal);
//        then

        $this->assertInstanceOf(FeeCalculationProposal::class, $result);

    }

    /**
     * @throws Exception
     * @dataProvider notValidLoanProposalCases
     */
    public function testIfLoanProposalIsNotValid(LoanProposal $loanProposal)
    {
//        given
        $calculator = new SimpleFeeCalculator();
//        when
        $this->expectException(Exception::class);
        $result = $calculator->calculate($loanProposal);
//        then

    }

    /**
     * @throws Exception
     * @dataProvider correctLoanProposalCases
     */
    public function testIfFeeCalculationProposalIsCorrect(LoanProposal           $loanProposal,
                                                          FeeCalculationProposal $feeCalculationProposal)
    {
//        given
        $calculator = new SimpleFeeCalculator();
//        when
        $result = $calculator->calculate($loanProposal);
//        then

        $this->assertEquals($feeCalculationProposal, $result);

    }


    public static function correctLoanProposalCases(): array
    {
        return [
            [new LoanProposal(1000), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(50))],
            [new LoanProposal(1300), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(62))],
            [new LoanProposal(1600), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(74))],
            [new LoanProposal(1666), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(76.64))],
            [new LoanProposal(2000), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(90))],
            [new LoanProposal(2001), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(90))],
            [new LoanProposal(2500), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(90))],
            [new LoanProposal(2999), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(90))],
            [new LoanProposal(3000), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(90))],
            [new LoanProposal(3600), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(105))],
            [new LoanProposal(4200), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(112))],
            [new LoanProposal(4500), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(107.5))],
            [new LoanProposal(4800), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(103))],
            [new LoanProposal(6500), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(130))],
            [new LoanProposal(10200), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(202))],
            [new LoanProposal(19250), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(385))],
            [new LoanProposal(19175), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(383.5))],

        ];
    }

    public static function validLoanProposalCases(): array
    {
        return [
            [new LoanProposal(1000)],
            [new LoanProposal(15000)],
            [new LoanProposal(9999)],
            [new LoanProposal(20000)],

        ];
    }

    public static function notValidLoanProposalCases(): array
    {
        return [
            [new LoanProposal(0)],
            [new LoanProposal(-1000)],
            [new LoanProposal(999)],
            [new LoanProposal(20001)],
            [new LoanProposal(20000000000000)]

        ];
    }

    public static function successfulFindingProposalBoundsCases(): array
    {
        return [
            [new LoanProposal(1400), new ProposalBounds(1000, 2000)],
            [new LoanProposal(1800), new ProposalBounds(1000, 2000)],
            [new LoanProposal(2000), new ProposalBounds(2000, 2000)],
            [new LoanProposal(19999), new ProposalBounds(19000, 20000)],

        ];
    }
}
