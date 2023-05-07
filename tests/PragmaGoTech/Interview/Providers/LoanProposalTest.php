<?php

namespace PragmaGoTech\Interview\Providers;

use Exception;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Providers\LoanProposal;
use PragmaGoTech\Interview\Providers\LoanProposalValidator;

class LoanProposalTest extends TestCase
{


    /**
     * @throws Exception
     */
    public function testIfLoanProposalExist()
    {
//        given
        //
        $loanProposal = new LoanProposal(1001);

//        when
        $loanProposal->getAmount();
//        then

        $this->assertInstanceOf(LoanProposal::class, $loanProposal);

    }

    /**
     * @throws Exception
     */
    public function testIfLoanProposalReturnAmount()
    {
//        given
        //
        $loanProposal = new LoanProposal(1001);

//        when
        $result = $loanProposal->getAmount();
//        then

        $this->assertEquals(1001, $result);

    }

    /**
     * @throws Exception
     * @dataProvider successfulLoanProposalCases
     */
    public function testIfLoanProposalValidSuccessful(
        LoanProposal $loanProposal
    )
    {
//        given
        $loanProposalValidator = new LoanProposalValidator($loanProposal);
//        when
        $result = $loanProposalValidator();
//        then
        $this->assertTrue($result);

    }

    public static function successfulLoanProposalCases(): array
    {
        return [
            [new LoanProposal(1000)],
            [new LoanProposal(10000)],
            [new LoanProposal(20000)]
        ];

    }

    /**
     * @throws Exception
     * @dataProvider failureLoanProposalCases
     */
    public function testIfLoanProposalValidFailure(
        LoanProposal $loanProposal
    )
    {
//        given
        $loanProposalValidator = new LoanProposalValidator($loanProposal);
//        when
        $this->expectException(Exception::class);
        $result = $loanProposalValidator();
//        then

    }

    public static function failureLoanProposalCases(): array
    {
        return [
            [new LoanProposal(0)],
            [new LoanProposal(-1000)],
            [new LoanProposal(999)],
            [new LoanProposal(20001)],
            [new LoanProposal(20000000000000)]

        ];
    }
}
