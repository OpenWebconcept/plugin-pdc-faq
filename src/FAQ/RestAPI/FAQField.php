<?php
/**
 * Ammends the FAQ field to a PDC item.
 */
namespace OWC\PDC\FAQ\RestAPI;

use OWC\PDC\Base\Support\CreatesFields;
use WP_Post;

/**
 * Ammends the FAQ field to a PDC item.
 */
class FAQField extends CreatesFields
{

    /**
     * Create an additional field on an array.
     *
     * @param WP_Post $post
     *
     * @return array
     */
    public function create(WP_Post $post): array
    {
        return array_map(function ($faq) {
            return [
                'question' => $faq['pdc_faq_question'] ?: '',
                'answer'   => isset($faq['pdc_faq_answer']) ? apply_filters('the_content', $faq['pdc_faq_answer']) : ''
            ];
        }, $this->getFAQ($post));
    }

    /**
     * Get faqs of a post.
     *
     * @param WP_Post $post
     *
     * @return array
     */
    private function getFAQ(WP_Post $post)
    {
        $faqs = array_filter(get_post_meta($post->ID, '_owc_pdc_faq_group', true) ?: [], function ($faq) {
            return ! empty($faq['pdc_faq_question']) && ! empty($faq['pdc_faq_answer']);
        });

        $faqs = $this->filterScheduledFaqs($faqs);

        return $faqs;
    }

    private function filterScheduledFaqs(array $faqs): array
    {
        return array_filter($faqs, function ($faq) {
            if (empty($faq['pdc_faq_scheduled'])) {
                return true;
            }

            if ($faq['pdc_faq_scheduled'] !== '1') {
                return true;
            }

            return false;
        });
    }
}
