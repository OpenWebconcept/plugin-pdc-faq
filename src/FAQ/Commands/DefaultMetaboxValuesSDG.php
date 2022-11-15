<?php

namespace OWC\PDC\FAQ\Commands;

class DefaultMetaboxValuesSDG
{
    public function execute()
    {
        $posts = $this->getPosts();

        foreach ($posts as $post) {
            $this->setDefaultValues($post);
        }
    }

    protected function getPosts()
    {
        $args = [
            'post_type' => 'pdc-item',
            'post_status' => 'any',
            'posts_per_page' => -1,
            'meta_query' => [
                [
                    'key' => '_owc_pdc_faq_group',
                    'compare' => 'EXISTS'
                ]
            ]
        ];

        return (new \WP_Query($args))->posts;
    }

    /**
     * When the enrichment module is enabled it comes with a 'Usage' metabox field.
     * Existing posts without this meta field should have a default value.
     * Otherwise the FAQ group is excluded from the API.
     * Set 'website' as default.
     */
    protected function setDefaultValues(\WP_Post $post)
    {
        $groupFAQ = get_post_meta($post->ID, '_owc_pdc_faq_group', true);

        if (empty($groupFAQ)) {
            return;
        }

        $validated = array_map(function ($group) {
            if (! empty($group['pdc_faq_usage'])) {
                return $group;
            }

            $group['pdc_faq_usage'] = ['website'];

            return $group;
        }, $groupFAQ);

        update_post_meta($post->ID, '_owc_pdc_faq_group', $validated);
    }
}
