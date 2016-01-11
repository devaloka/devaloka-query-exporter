# Devaloka Query Exporter Plugin [![Build Status][travis-image]][travis-url] [![Packagist][packagist-image]][packagist-url]

A WordPress Plugin that exports WP_Query's query variables to front-end as JSON.

## Requirements

*   [Devaloka](https://github.com/devaloka/devaloka)
*   [Devaloka Plugin Component](https://github.com/devaloka/devaloka-plugin)

## Installation (as a normal plugin)

1.  Install via Composer.

    ```sh
    composer require devaloka/devaloka-query-exporter
    ```

## Installation (as a Must-Use plugin)

1.  Install via Composer.

    ```sh
    composer require devaloka/devaloka-query-exporter
    ```

2.  Move `devaloka-query-exporter` directory into
    `<ABSPATH>wp-content/mu-plugins/`.

3.  Move `devaloka-query-exporter/loader/50-devaloka-query-exporter-loader.php`
    into `<ABSPATH>wp-content/mu-plugins/`.

[travis-image]: https://travis-ci.org/devaloka/devaloka-query-exporter.svg?branch=master
[travis-url]: https://travis-ci.org/devaloka/devaloka-query-exporter

[packagist-image]: https://img.shields.io/packagist/v/devaloka/devaloka-query-exporter.svg
[packagist-url]: https://packagist.org/packages/devaloka/devaloka-query-exporter
