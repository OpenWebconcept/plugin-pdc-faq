<?php
/**
 * Adds the FAQs to the PDC-item.
 */

namespace OWC\PDC\FAQ\PostTypes;

/**
 * Adds the FAQs to the PDC-item.
 */
class PdcItem
{
    const faq_group_meta_key   = '_owc_pdc_faq_group';
    const faq_answer_meta_key  = 'pdc_faq_answer';

    /**
     * Returns the FAQ content to the API.
     *
     * @param $object
     * @param $field_name
     * @param $request
     *
     * @return mixed
     */
    public function getFaqsForRestAPI($object, $field_name, $request)
    {
        $faqs = get_post_meta($object['id'], self::faq_group_meta_key, true);

        $faqs = $this->filterFaqOnAvailability($faqs);

        return $faqs;
    }

    /**
     * Adds faq to Elasticsearch as parameters.
     *
     * @param int $postId
     */
    public function getFaqsForElasticSearch($postId)
    {
        $metadata = '';

        $faqs = get_post_meta($postId, self::faq_group_meta_key, true);

        if (! empty($faqs)) {
            foreach ($faqs as $faq) {
                $metadata .= $faq[ self::faq_answer_meta_key ];
            }
        }

        return $metadata;
    }

    private function filterFaqOnAvailability(array $faq): array
    {
        $faq = $faq;

        return [];
    }
}
