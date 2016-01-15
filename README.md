# Devaloka Query Exporter Plugin

[![Latest Stable Version][stable-image]][stable-url]
[![Latest Unstable Version][unstable-image]][unstable-url]
[![License][license-image]][license-url]
[![Build Status][travis-image]][travis-url]

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

[stable-image]: https://poser.pugx.org/devaloka/devaloka-query-exporter/v/stable
[stable-url]: https://packagist.org/packages/devaloka/devaloka-query-exporter

[unstable-image]: https://poser.pugx.org/devaloka/devaloka-query-exporter/v/unstable
[unstable-url]: https://packagist.org/packages/devaloka/devaloka-query-exporter

[license-image]: https://poser.pugx.org/devaloka/devaloka-query-exporter/license
[license-url]: https://packagist.org/packages/devaloka/devaloka-query-exporter

[travis-image]: https://travis-ci.org/devaloka/devaloka-query-exporter.svg?branch=master
[travis-url]: https://travis-ci.org/devaloka/devaloka-query-exporter
