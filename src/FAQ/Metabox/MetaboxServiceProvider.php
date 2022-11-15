<?php
/**
 * Registers the metabox field.
 */

namespace OWC\PDC\FAQ\Metabox;

use OWC\PDC\Base\Foundation\Plugin;
use OWC\PDC\Base\Foundation\ServiceProvider;

/**
 * Registers the metabox field.
 *
 * This is achieved based on the config key "metaboxes.faq".
 */
class MetaboxServiceProvider extends ServiceProvider
{
    /**
     * Register metaboxes for faq.
     */
    public function register()
    {
        $this->plugin->loader->addAction('owc/pdc-base/plugin', $this, 'registerMetaboxes', 10, 1);
    }

    /**
     * Register metaboxes for settings page into pdc-base plugin.
     *
     * @param Plugin $basePlugin
     */
    public function registerMetaboxes(Plugin $basePlugin)
    {
        $configMetaboxes = $this->plugin->config->get('metaboxes');

        if (! $this->plugin->settings->useEnrichment()) {
            $configMetaboxes = $this->removeInputFacilityMetaboxes($configMetaboxes);
        }

        $basePlugin->config->set('metaboxes.faq', $configMetaboxes['faq']);
    }

    protected function removeInputFacilityMetaboxes(array $configMetaboxes): array
    {
        $metaboxesToRemove = [
            'pdc_faq_connect_sdq_faq',
            'pdc_faq_usage'
        ];

        $groupFields = $configMetaboxes['faq']['fields']['faqs']['group']['fields'];
        $groupFields = array_filter($groupFields, function ($field) use ($metaboxesToRemove) {
            return ! in_array($field['id'], $metaboxesToRemove);
        });

        $configMetaboxes['faq']['fields']['faqs']['group']['fields'] = array_values($groupFields);

        return $configMetaboxes;
    }
}
