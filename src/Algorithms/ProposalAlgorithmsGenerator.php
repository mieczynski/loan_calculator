<?php

namespace PragmaGoTech\Interview\Algorithms;

use PragmaGoTech\Interview\Bounds\ProposalBounds;

class ProposalAlgorithmsGenerator implements AlgorithmsGenerator
{

    public static function algorithmChoosing(ProposalBounds $proposalBound): string
    {
        switch ($proposalBound) {
            case $proposalBound->getMinBound() == 2000 && $proposalBound->getMaxBound() == 3000:
            case $proposalBound->getMinBound() == $proposalBound->getMaxBound():
                return EqualAlgorithm::class;
            default:
                return DefaultAlgorithm::class;
        }
    }


}