<?php

namespace OWC\PDC\FAQ\Commands;

use OWC\PDC\Base\Foundation\ServiceProvider;

class CommandsServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (! $this->plugin->settings->useEnrichment()) {
            return;
        }

        if (class_exists('\WP_CLI')) {
            \WP_CLI::add_command('owc-set-default-metabox-values-sdg', [DefaultMetaboxValuesSDG::class, 'execute'], ['shortdesc' => 'Set default SDG metabox values for existing FAQ groups.']);
        }
    }
}
