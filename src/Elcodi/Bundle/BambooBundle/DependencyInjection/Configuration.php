<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\Bundle\BambooBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

use Elcodi\Bundle\CoreBundle\DependencyInjection\Abstracts\AbstractConfiguration;

/**
 * Class Configuration
 */
class Configuration extends AbstractConfiguration
{
    /**
     * Configure the root node
     *
     * @param ArrayNodeDefinition $rootNode
     */
    protected function setupTree(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('emails')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('defaults')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout')
                                    ->defaultValue('ElcodiBambooBundle:emails:layout.html.twig')
                                ->end()
                                ->scalarNode('sender_email')
                                    ->defaultValue('no-reply@elcodi.com')
                                ->end()
                            ->end()
                        ->end()

                        ->append($this->addEmailNode(
                            'customer_password_remember',
                            true,
                            'ElcodiBambooBundle:emails:customer_password_remember.html.twig'
                        ))

                        ->append($this->addEmailNode(
                            'customer_password_recover',
                            true,
                            'ElcodiBambooBundle:emails:customer_password_recover.html.twig'
                        ))
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Add a mapping node into configuration
     *
     * @param string  $nodeName    Node name
     * @param boolean $enabled     The email is enabled by default
     * @param string  $template    Path of the rendered template
     * @param string  $layout      Path of the extended layout
     * @param string  $senderEmail Sender email
     *
     * @return NodeDefinition Node
     */
    protected function addEmailNode(
        $nodeName,
        $enabled,
        $template,
        $layout = null,
        $senderEmail = null
    )
    {
        $builder = new TreeBuilder();
        $node = $builder->root($nodeName);

        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('enabled')
                    ->defaultValue($enabled)
                ->end()
                ->scalarNode('template')
                    ->defaultValue($template)
                ->end()
                ->scalarNode('layout')
                    ->defaultValue($layout)
                ->end()
                ->scalarNode('sender_email')
                    ->defaultValue($senderEmail)
                ->end()
            ->end()
        ->end();

        return $node;
    }
}
