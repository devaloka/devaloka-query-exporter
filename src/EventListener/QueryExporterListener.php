<?php
/**
 * Query Exporter Listener
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Plugin\QueryExporter\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Devaloka\EventDispatcher\EventDispatcherAwareInterface;
use Devaloka\EventDispatcher\EventDispatcherAwareTrait;
use Devaloka\Plugin\PluginInterface;

/**
 * Class QueryExporterListener
 *
 * @package Devaloka\Plugin\Site\EventListener
 */
class QueryExporterListener implements EventSubscriberInterface, EventDispatcherAwareInterface
{
    use EventDispatcherAwareTrait;

    /**
     * @var PluginInterface
     */
    protected $plugin;

    /**
     * @param PluginInterface $plugin
     */
    public function __construct(PluginInterface $plugin)
    {
        $this->plugin = $plugin;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'wp_print_scripts' => ['onWpPrintScripts', ~PHP_INT_MAX],
        ];
    }

    public function onWpPrintScripts()
    {
        $this->plugin->printScript();
    }
}
