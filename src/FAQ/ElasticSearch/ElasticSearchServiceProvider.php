<?php
/**
 * Provider which setups up the syncronasation of the FAQ items in ElasticSearch
 */

namespace OWC\PDC\FAQ\ElasticSearch;

use OWC\PDC\Base\Foundation\ServiceProvider;

/**
 * Provider which setups up the syncronasation of the FAQ items in ElasticSearch
 */
class ElasticSearchServiceProvider extends ServiceProvider
{

    /**
     * Registers the filters.
     */
    public function register()
    {
        $this->plugin->loader->addFilter(
            'owc/pdc-elasticsearch/elasticpress/postargs/meta',
            $this,
            'registerElasticSearchMetaData',
            10,
            2
        );
    }

    /**
     * Register metaboxes for settings page.
     *
     * @param $additionalPreparedMeta
     * @param $postId
     *
     * @return array
     */
    public function registerElasticSearchMetaData($additionalPreparedMeta, $postId)
    {
        if ('pdc-item' != get_post_type($postId)) {
            return $additionalPreparedMeta;
        }

        $metadata = $this->getFaqsForElasticSearch($postId);

        if (! empty($metadata)) {
            $additionalPreparedMeta['faq_group']['value'] = $metadata;
        }

        return $additionalPreparedMeta;
    }

    /**
     * Get configured FAQs for a given post.
     *
     * @param $postId
     *
     * @return string
     */
    public function getFaqsForElasticSearch($postId)
    {
        $metadata = '';

        $faqs = get_post_meta($postId, '_owc_pdc_faq_group', true);

        if (empty($faqs)) {
            return '';
        }

        foreach ($faqs as $faq) {
            $metadata .= $faq['pdc_faq_answer'];
        }

        return $metadata;
    }
}
