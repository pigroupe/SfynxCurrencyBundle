<?php

namespace Sfynx\CurrencyBundle\Currency\Manager;

use Sfynx\CurrencyBundle\Currency\Strategy\Generalisation\CurrencyApiStrategyInterface;

class CurrencyManager
{
    protected $strategy;

    public function __construct(CurrencyApiStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getLatestRatioByCurrency($currency)
    {
        return $this->strategy->getLatestRatioByCurrency($currency);
    }
}
