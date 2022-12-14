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
        $basePlugin->config->set('metaboxes.faq', $configMetaboxes['faq']);
    }
}
