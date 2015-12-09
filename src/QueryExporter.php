<?php
/**
 * Query Exporter
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 * @license GPL-2.0
 * @license GPL-3.0
 */

namespace Devaloka\Plugin\QueryExporter;

use Devaloka\DependencyInjection\ContainerAwareTrait;
use Devaloka\DependencyInjection\ContainerAwareInterface;
use Devaloka\Plugin\AbstractPlugin;
use Devaloka\Plugin\TranslatablePluginInterface;
use Devaloka\Plugin\TranslatablePluginTrait;

/**
 * Class QueryExporter
 *
 * @package Devaloka\Plugin\Site
 */
class QueryExporter extends AbstractPlugin implements ContainerAwareInterface, TranslatablePluginInterface
{
    use ContainerAwareTrait;
    use TranslatablePluginTrait;

    public function printScript()
    {
        $json = [
            'Query' => $this->getQuery(),
        ];
        $json = json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

        echo <<< JS
<script type="text/javascript">
    ;(function (window, document, undefined) {
        window.Devaloka                      = window.Devaloka || {};
        window.Devaloka.Plugin               = window.Devaloka.Plugin || {};
        window.Devaloka.Plugin.QueryExporter = window.Devaloka.Plugin.QueryExporter || {$json};
    }(window, window.document));
</script>
JS;
    }

    public function getQuery()
    {
        $query = [
            'isArchive'         => is_archive(),
            'isPostTypeArchive' => is_post_type_archive(),
            'isAttachment'      => is_attachment(),
            'isAuthor'          => is_author(),
            'isCategory'        => is_category(),
            'isTag'             => is_tag(),
            'isTaxonomy'        => is_tax(),
            'isCommentsPopup'   => is_comments_popup(),
            'isDate'            => is_date(),
            'isDay'             => is_day(),
            'isFeed'            => is_feed(),
            'isCommentFeed'     => is_comment_feed(),
            'isFrontPage'       => is_front_page(),
            'isHome'            => is_home(),
            'isMonth'           => is_month(),
            'isPage'            => is_page(),
            'isPaged'           => is_paged(),
            'isPreview'         => is_preview(),
            'isRobots'          => is_robots(),
            'isSearch'          => is_search(),
            'isSingle'          => is_single(),
            'isSingular'        => is_singular(),
            'isTime'            => is_time(),
            'isTrackback'       => is_trackback(),
            'isYear'            => is_year(),
            'is404'             => is_404(),
            'postType'          => is_singular() ? get_queried_object()->post_type : get_query_var('post_type', null),
            'attachmentId'      => is_attachment() ? get_queried_object()->ID : null,
            'authorId'          => is_author() ? get_queried_object()->ID : null,
            'categoryId'        => is_category() ? get_queried_object()->term_id : null,
            'tagId'             => is_tag() ? get_queried_object()->term_id : null,
            'taxonomy'          => is_tax() ? get_queried_object()->taxonomy : null,
            'termId'            => is_tax() ? get_queried_object()->term_id : null,
            'feed'              => is_feed() ? get_query_var('feed', null) : null,
            'postId'            => is_single() ? get_queried_object()->ID : null,
        ];

        return $query;
    }
}
