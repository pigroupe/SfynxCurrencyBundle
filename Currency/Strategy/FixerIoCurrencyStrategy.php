<?php

namespace Sfynx\CurrencyBundle\Currency\Strategy;

use Sfynx\CurrencyBundle\Currency\Strategy\Generalisation\AbstractCurrencyStrategy;

class FixerIoCurrencyStrategy extends AbstractCurrencyStrategy
{
    const URI = 'api.fixer.io';

    protected $protocol = 'http';

    protected $period = 'latest';

    public function getLatestRatioByCurrency($currency)
    {
        $method = 'GET';
        $params = sprintf(
            '%s?symbols=%s,%s',
            $this->period,
            $this->baseCurrency,
            $currency
        );

        $url = sprintf(
            '%s://%s/%s',
            $this->protocol,
            self::URI,
            $params
        );

        $result = $this->httpClient->request($method, $url, []);

        if ((string) $result->getStatusCode() !== '200') {
            throw new \Exception(
                sprintf('Currency Api doesn\'t work and return code %s', $result->getStatusCode())
            );
        }

        return json_decode((string) $result->getBody());
    }
}
