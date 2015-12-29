<?php
/*
Plugin Name: Devaloka Query Exporter
Description: Exports WP_Query's query variables to front-end as JSON
Version: 0.1.1
Author: Whizark
Author URI: http://whizark.com
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: devaloka-query-exporter
Domain Path: /devaloka-query-exporter/languages
Network: true
*/

if (!defined('ABSPATH')) {
    exit;
}

require WPMU_PLUGIN_DIR . '/devaloka-query-exporter/devaloka-query-exporter.php';
