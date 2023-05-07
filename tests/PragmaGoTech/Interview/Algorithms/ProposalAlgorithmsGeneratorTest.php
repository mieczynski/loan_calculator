<?php

namespace PragmaGoTech\Interview\Algorithms;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Bounds\ProposalBounds;

class ProposalAlgorithmsGeneratorTest extends TestCase
{


    /**
     * @dataProvider algorithmChoosingCases
     */
    public function testAlgorithmChoosing(
        ProposalBounds $proposalBounds,
        string         $validResult
    )
    {
//        given
        $algorithmGenerator = new ProposalAlgorithmsGenerator();
//        when
        $result = $algorithmGenerator::algorithmChoosing($proposalBounds);
//        then

        $this->assertEquals($validResult, $result);
    }


    public static function algorithmChoosingCases(): array
    {
        return [
            [new ProposalBounds(6000, 7000), DefaultAlgorithm::class],
            [new ProposalBounds(3000, 4000), DefaultAlgorithm::class],
            [new ProposalBounds(2000, 3000), EqualAlgorithm::class],

        ];
    }


}
