<?php

namespace Sfynx\CurrencyBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Sfynx\CurrencyBundle\DependencyInjection\SfynxCurrencyBundleExtension;

class SfynxCurrencyBundle extends Bundle
{
    public function boot()
    {
    }

//    public function build(ContainerBuilder $container)
//    {
//
//    }

    public function getContainerExtension()
    {
        return new SfynxCurrencyBundleExtension();
    }
}
