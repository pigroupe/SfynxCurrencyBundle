<?php

namespace Sfynx\CurrencyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sfynx_currency');

        $this->addConfig($rootNode);

        return $treeBuilder;
    }

    /**
     * cache ttl and cache directory where service states are stored
     * the value must finish with "/"
     *
     * @access private
     * @param ArrayNodeDefinition $node
     * @return void
     */
    private function addConfig(ArrayNodeDefinition $node)
    {
        $node
            ->children()
            ->scalarNode('cache_dir')->isRequired()
            ->end()
            ->scalarNode('cache_ttl')->defaultValue(3600)->isRequired()
            ->end()
        ;
    }
}
