<?php

namespace PragmaGoTech\Interview;

use PragmaGoTech\Interview\Algorithms\EqualAlgorithm;
use PragmaGoTech\Interview\Algorithms\ProposalAlgorithmsGenerator;
use PragmaGoTech\Interview\Algorithms\DefaultAlgorithm;
use PragmaGoTech\Interview\Bounds\ProposalBounds;
use PragmaGoTech\Interview\Bounds\SimpleBoundsGenerator;
use PragmaGoTech\Interview\Providers\FeeCalculationProposal;
use PragmaGoTech\Interview\Providers\LoanProposal;
use PragmaGoTech\Interview\Providers\LoanProposalValidator;

class SimpleFeeCalculator implements FeeCalculator
{

    /**
     * @throws \Exception
     */
    private function loanValidation(LoanProposal $loanProposal): bool
    {
        $loanProposalValidator = new LoanProposalValidator($loanProposal);
        return $loanProposalValidator();
    }

    private function generateBounds(LoanProposal $loanProposal): array
    {
        $boundsGenerator = new SimpleBoundsGenerator();
        $proposalBounds = $boundsGenerator::findingProposalBounds($loanProposal);
        $feeBounds = $boundsGenerator::findingFeeBounds($proposalBounds);

        return array($proposalBounds, $feeBounds);
    }

    private function getAlgorithm(ProposalBounds $proposalBounds)
    {
        $algorithmGenerator = new ProposalAlgorithmsGenerator();
        $algorithmClass = $algorithmGenerator::algorithmChoosing($proposalBounds);
        return new $algorithmClass();
    }

    /**
     * @throws \Exception
     */
    public function calculate(LoanProposal $loanProposal): FeeCalculationProposal
    {
        try {
            if ($this->loanValidation($loanProposal)) {
                list($proposalBounds, $feeBounds) = $this->generateBounds($loanProposal);
                /** @var DefaultAlgorithm|EqualAlgorithm $algorithm */
                $algorithmObj = $this->getAlgorithm($proposalBounds);
                $feeCalculation = $algorithmObj($proposalBounds, $feeBounds, $loanProposal);
                return FeeCalculationProposal::roundingFeeCalculationProposal($feeCalculation);
            }
        } catch (\Exception $e) {
            throw new $e;
        }
        return new FeeCalculationProposal(0);
    }
}