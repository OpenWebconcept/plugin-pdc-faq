<?php

/**
 * The base of the plugin.
 */

namespace OWC\PDC\FAQ\Foundation;

use OWC\PDC\Base\Foundation\Plugin as BasePlugin;
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

/**
 * Sets the name and version of the plugin.
 */
class Plugin extends BasePlugin
{
    /**
     * Name of the plugin.
     *
     * @const string NAME
     */
    const NAME = 'pdc-faq';

    /**
     * Version of the plugin.
     * Used for setting versions of enqueue scripts and styles.
     *
     * @const string VERSION
     */
    const VERSION = '3.1.4';

    protected function checkForUpdate()
    {
        if (! class_exists(PucFactory::class) || $this->isExtendedClass()) {
            return;
        }

        try {
            $updater = PucFactory::buildUpdateChecker(
                'https://github.com/OpenWebconcept/plugin-pdc-faq/',
                $this->rootPath . '/pdc-faq.php',
                self::NAME
            );

            $updater->getVcsApi()->enableReleaseAssets();
        } catch (\Throwable $e) {
            error_log($e->getMessage());
        }
    }
}
