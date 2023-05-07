<?php

namespace PragmaGoTech\Interview\Bounds;

use PragmaGoTech\Interview\Providers\LoanProposal;

interface BoundsGenerator
{
    public static function findingProposalBounds(LoanProposal $proposal): ProposalBounds;

    public static function findingFeeBounds(ProposalBounds $proposalBounds): FeeBounds;


}