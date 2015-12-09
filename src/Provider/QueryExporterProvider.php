<?php
/**
 * Query Exporter Provider
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Plugin\QueryExporter\Provider;

use Devaloka\Plugin\ActivatablePluginInterface;
use Pimple\Container;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Devaloka\Devaloka;
use Devaloka\Provider\ServiceProviderInterface;
use Devaloka\Provider\BootableProviderInterface;
use Devaloka\Provider\EventListenerProviderInterface;
use Devaloka\DependencyInjection\ContainerInterface;
use Devaloka\DependencyInjection\ContainerAwareInterface;
use Devaloka\Translation\TranslatorAwareInterface;
use Devaloka\Translation\TranslatableInterface;
use Devaloka\EventDispatcher\EventDispatcherAwareInterface;

/**
 * Class QueryExporterProvider
 *
 * @package Devaloka\Plugin\Site\Provider
 */
class QueryExporterProvider implements
    ServiceProviderInterface,
    BootableProviderInterface,
    EventListenerProviderInterface
{
    private $file;

    private $subscribe = true;

    public function __construct($file, $subscribe = true)
    {
        $this->file      = $file;
        $this->subscribe = $subscribe;
    }

    public function register(Devaloka $devaloka, ContainerInterface $container)
    {
        // Plugin
        $container->add('devaloka.plugin.query_exporter.file', $this->file);
        $container->add('devaloka.plugin.query_exporter.class', 'Devaloka\\Plugin\\QueryExporter\\QueryExporter');
        $container->add(
            'devaloka.plugin.query_exporter',
            function (Container $container) {
                $file   = $container['devaloka.plugin.query_exporter.file'];
                $plugin = new $container['devaloka.plugin.query_exporter.class']($file);

                if ($plugin instanceof ContainerAwareInterface) {
                    $plugin->setContainer($container['container']);
                }

                if ($plugin instanceof TranslatorAwareInterface) {
                    $plugin->setTranslator($container['translator']);
                }

                if ($plugin instanceof TranslatableInterface) {
                    $plugin->loadTextDomain();
                    $plugin->loadLocaleFile();
                }

                return $plugin;
            }
        );

        // Event Listener
        $container->add(
            'devaloka.plugin.query_exporter.query_exporter_listener.class',
            'Devaloka\\Plugin\\QueryExporter\\EventListener\\QueryExporterListener'
        );
        $container->add(
            'devaloka.plugin.query_exporter.query_exporter_listener',
            function (Container $container) {
                $plugin   = $container['devaloka.plugin.query_exporter'];
                $listener = new $container['devaloka.plugin.query_exporter.query_exporter_listener.class']($plugin);

                if ($listener instanceof EventDispatcherAwareInterface) {
                    $listener->setEventDispatcher($container['event_dispatcher']);
                }

                return $listener;
            }
        );
    }

    public function subscribe(Devaloka $devaloka, ContainerInterface $container, EventDispatcherInterface $dispatcher)
    {
        if (!$this->subscribe) {
            return;
        }

        $listener = $container->get('devaloka.plugin.query_exporter.query_exporter_listener');

        $dispatcher->addSubscriber($listener);
    }

    public function boot(Devaloka $devaloka, ContainerInterface $container)
    {
        $plugin = $container->get('devaloka.plugin.query_exporter');

        if ($plugin instanceof ActivatablePluginInterface) {
            $plugin->register();
        }

        $plugin->boot();
    }
}
