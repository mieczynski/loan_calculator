<?php

namespace PragmaGoTech\Interview\Bounds;

class ProposalBounds
{
    private float $minBound = 0;
    private float $maxBound = 0;

    /**
     * @return float
     */
    public function getMinBound(): float
    {
        return $this->minBound;
    }

    /**
     * @param float $minBound
     */
    public function setMinBound(float $minBound): void
    {
        $this->minBound = $minBound;
    }

    /**
     * @return float
     */
    public function getMaxBound(): float
    {
        return $this->maxBound;
    }

    /**
     * @param float $maxBound
     */
    public function setMaxBound(float $maxBound): void
    {
        $this->maxBound = $maxBound;
    }

    /**
     * @param float|int $minBound
     * @param float|int $maxBound
     */
    public function __construct(float $minBound, float $maxBound)
    {
        $this->minBound = $minBound;
        $this->maxBound = $maxBound;
    }

}
