<?php

namespace Sfynx\CurrencyBundle\Currency\Strategy\Generalisation;

use GuzzleHttp;

abstract class AbstractCurrencyStrategy implements CurrencyApiStrategyInterface
{
    protected $httpClient;

    public $baseCurrency;

    abstract public function getLatestRatioByCurrency($currency);

    public function setHttpClient(GuzzleHttp\Client $client)
    {
        $this->httpClient = $client;
    }
}
