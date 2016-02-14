<?php

namespace Sfynx\CurrencyBundle\Currency\Strategy\Generalisation;

interface CurrencyApiStrategyInterface
{
    public function getLatestRatioByCurrency($currency);
}
