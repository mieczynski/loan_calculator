<?php

namespace PragmaGoTech\Interview\Bounds;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Exception;
use PragmaGoTech\Interview\Bounds\ProposalBounds;

class ProposalBoundsTest extends TestCase
{


    /**
     * @throws Exception
     */
    public function testIfProposalBoundsExist()
    {
//        given
        //
        $proposalBounds = new ProposalBounds(1001, 10002);

//        when
        $proposalBounds->getMaxBound();
//        then

        $this->assertInstanceOf(ProposalBounds::class, $proposalBounds);

    }

    /**
     * @throws Exception
     */
    public function testIfProposalBoundsReturnValidBound()
    {
//        given
        //
        $proposalBounds = new ProposalBounds(1001, 10002);

//        when
        $result[] = $proposalBounds->getMinBound();
        $result[] = $proposalBounds->getMaxBound();

//        then

        $this->assertEquals([1001, 10002], $result);

    }

}
