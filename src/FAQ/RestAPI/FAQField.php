<?php

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
     */
    public function create(WP_Post $post): array
    {
        return array_map(function ($faq) {
            return [
                'question' => $faq['pdc_faq_question'] ?: '',
                'answer'   => ! empty($faq['pdc_faq_answer']) ? \apply_filters('the_content', $this->filterContent($faq['pdc_faq_answer'])) : ''
            ];
        }, $this->getFAQ($post));
    }

    /**
     * Get faqs of a post.
     */
    private function getFAQ(WP_Post $post): array
    {
        return array_filter(\get_post_meta($post->ID, '_owc_pdc_faq_group', true) ?: [], function ($faq) {
            return ! empty($faq['pdc_faq_question']) && ! empty($faq['pdc_faq_answer']);
        });
    }

    /**
     * Add no cookie to YouTube URL.
     * Disable YouTube oembed.
     * Remove no cookie from YouTube channel url.
     */
    protected function filterContent(string $content): string
    {
        $content = str_replace('youtube.com', 'youtube-nocookie.com', $content);
        $content = str_replace('?feature=oembed', '?feature=oembed&disablekb=1', $content);
        $content = str_replace('youtube-nocookie.com/channel', 'youtube.com/channel', $content);

        return $content;
    }
}
