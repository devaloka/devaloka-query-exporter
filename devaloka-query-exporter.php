<?php
/*
Plugin Name: Devaloka Query Exporter
Description: Exports WP_Query's query variables to front-end as JSON
Version: 0.1.0
Author: Whizark
Author URI: http://whizark.com
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: devaloka-query-exporter
Domain Path: /languages
Network: true
*/

if (!defined('ABSPATH')) {
    exit;
}

use Devaloka\Plugin\QueryExporter\Provider\QueryExporterProvider;

// If a plugin with Devaloka isn't a Must-Use plugin but a normal plugin,
// the process of should be triggered at `after_setup_theme` hook and pull the
// Devaloka service from the global variable inside the function.
// When the plugin file is loaded, Devaloka hasn't been initialized and the
// dependencies haven't been resolved yet either.
add_action(
    'after_setup_theme',
    function () {
        /** @var Devaloka\Devaloka $devaloka */
        $devaloka  = $GLOBALS['devaloka'];
        $container = $devaloka->getContainer();

        /** @var Composer\Autoload\ClassLoader $loader */
        $loader = $container->get('loader');

        $loader->addPsr4('Devaloka\\Plugin\\QueryExporter\\', __DIR__ . '/src/', true);

        $devaloka->register(new QueryExporterProvider(__FILE__));
    }
);
