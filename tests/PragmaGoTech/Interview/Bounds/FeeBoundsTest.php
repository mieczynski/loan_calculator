<?php

namespace PragmaGoTech\Interview\Bounds;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Exception;
use PragmaGoTech\Interview\Bounds\FeeBounds;
use PragmaGoTech\Interview\Bounds\ProposalBounds;

class FeeBoundsTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testIfFeeBoundsExist()
    {
//        given

        $feeBounds = new FeeBounds(new ProposalBounds(1000, 10000));

//        when

//        then

        $this->assertInstanceOf(FeeBounds::class, $feeBounds);

    }

    /**
     * @throws Exception
     * @dataProvider proposalBoundsCases
     */
    public function testIfFeeBoundsGenerateValidValue(
        ProposalBounds $proposalBounds,
                       $validResult
    )
    {
//        given

        $feeBounds = new FeeBounds($proposalBounds);

//        when
        $result = $feeBounds->getGeneratedBounds();
//        then

        $this->assertEquals($validResult, $result);

    }

    public static function proposalBoundsCases(): array
    {
        return [
            [new ProposalBounds(1000, 2000), [50, 90]],
            [new ProposalBounds(10000, 20000), [200, 400]],
            [new ProposalBounds(1400, 15000), [0, 300]],
        ];
    }
}
