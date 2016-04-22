<?php

namespace Sfynx\CurrencyBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

class SfynxCurrencyBundleExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        //load config for cache_dir
        $definition = $container->getDefinition('sfynx.currency.manager');
        $definition->addMethodCall('loadConfig', [$config['cache_dir'], $config['cache_ttl']]);
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'sfynx_currency';
    }
}
