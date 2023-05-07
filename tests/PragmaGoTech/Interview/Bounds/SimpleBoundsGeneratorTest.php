<?php

namespace PragmaGoTech\Interview\Bounds;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Providers\LoanProposal;

class SimpleBoundsGeneratorTest extends TestCase
{
    /**
     * @throws Exception
     * @dataProvider successfulFindingProposalBoundsCases
     */
    public function testFindingProposalBounds(
        LoanProposal   $loanProposal,
        ProposalBounds $validProposalBounds
    )
    {
        //        given
        $simpleBoundsGenerator = new SimpleBoundsGenerator();
//        when
        $resultProposalBounds = $simpleBoundsGenerator::findingProposalBounds($loanProposal);
//        then
        $this->assertInstanceOf(ProposalBounds::class, $resultProposalBounds);

        $this->assertEquals([$validProposalBounds->getMinBound(), $validProposalBounds->getMaxBound()], [$resultProposalBounds->getMinBound(), $resultProposalBounds->getMaxBound()]);

    }

    /**
     * @throws Exception
     * @dataProvider successfulFindingFeeBoundsCases
     */
    public function testFindingFeeBounds(
        ProposalBounds $proposalBounds,
                       $validFeeBoundsAmount
    )
    {
//        given
        $simpleBoundsGenerator = new SimpleBoundsGenerator();
//        when
        $resultFeeBounds = $simpleBoundsGenerator::findingFeeBounds($proposalBounds);
//        then
        $this->assertInstanceOf(FeeBounds::class, $resultFeeBounds);

        $this->assertEquals($validFeeBoundsAmount, $resultFeeBounds->getGeneratedBounds());

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

    public static function successfulFindingFeeBoundsCases(): array
    {
        return [
            [new ProposalBounds(6000, 7000), [120, 140]],
            [new ProposalBounds(1000, 0), [50, 0]],
            [new ProposalBounds(19000, 20000), [380, 400]],

        ];
    }

}
