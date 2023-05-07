<?php

namespace PragmaGoTech\Interview\Bounds;

use PragmaGoTech\Interview\Providers\LoanProposal;

class SimpleBoundsGenerator implements BoundsGenerator
{
    public static function findingProposalBounds(LoanProposal $proposal): ProposalBounds
    {
        $proposalBounds = self::findBoundAlgorithm($proposal->getAmount());

        return new ProposalBounds($proposalBounds['minBound'], $proposalBounds['maxBound']);
    }

    public static function findingFeeBounds(ProposalBounds $proposalBounds): FeeBounds
    {
        return new FeeBounds($proposalBounds);
    }

    private static function findBoundAlgorithm($amount): array
    {
        $value = 1000;
        $amount = $amount / $value;
        $minBound = floor($amount) * $value;
        $maxBound = ceil($amount) * $value;
        return ['minBound' => self::roundToThousand($minBound), 'maxBound' => self::roundToThousand($maxBound)];
    }

    private static function roundToThousand($value): float
    {
        return round($value, 3);
    }

}