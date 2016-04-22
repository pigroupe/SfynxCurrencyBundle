<?php

namespace Sfynx\CurrencyBundle\Currency\Manager;

use Sfynx\CurrencyBundle\Currency\Strategy\Generalisation\CurrencyApiStrategyInterface;
use Sfynx\CacheBundle\Builder\CacheInterface;

class CurrencyManager
{
    protected $strategy;

    protected $cacheFactory;

    protected $cacheDir;

    protected $cacheTtl;

    public function __construct(CurrencyApiStrategyInterface $strategy, CacheInterface $cacheFactory)
    {
        $this->strategy = $strategy;
        $this->cacheFactory = $cacheFactory;
    }

    /**
     * Strategy method
     *
     * @param $currency
     * @return mixed
     * @throws \Exception
     */
    public function getLatestRatioByCurrency($currency)
    {
        $value = $this->client->get($currency);
        // create cachefile if not exist
        if (!$value) {
            $value = $this->strategy->getLatestRatioByCurrency($currency);
            $this->client->set($currency, $value, $this->cacheTtl);
        }

        return $value;
    }

    /**
     * load config from config.yml. It is used in dependencyInjection
     *
     * @access public
     * @param string $cacheDir Directory where cache files are stored
     * @return void
     * @throws \Exception
     */
    public function loadConfig($cacheDir, $cacheTtl)
    {
        $this->cacheTtl = $cacheTtl;
        $this->cacheDir = $cacheDir;
        $this->client = $this->cacheFactory->getClient();
        if (!$this->client->setPath($this->cacheDir)) {
            throw new \Exception('SfynxCache, invalid cache directory');
        }
    }
}
