<?php

/**
 * Plugin Name:       PDC FAQ
 * Plugin URI:        https://www.openwebconcept.nl/
 * Description:       Plugin to create the frequently asked questions section for a PDC item.
 * Version:           3.1.1
 * Author:            Yard Digital Agency
 * Author URI:        https://www.yard.nl/
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       pdc-faq
 * Domain Path:       /languages
 */

use OWC\PDC\FAQ\Autoloader;
use OWC\PDC\FAQ\Foundation\Plugin;

/**
 * If this file is called directly, abort.
 */
if (!defined('WPINC')) {
    die;
}

// Don't boot if base plugin is not active.
if (!function_exists('is_plugin_active')) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
if (!is_plugin_active('pdc-base/pdc-base.php')) {
    return;
}

/**
 * Manual loaded file: the autoloader.
 */
if (!class_exists(\OWC\PDC\FAQ\Foundation\Plugin::class)) {
    if (file_exists(__DIR__ . '/vendor/autoload.php')) {
        require_once __DIR__ . '/vendor/autoload.php';
    } else {
        require_once __DIR__ . '/autoloader.php';
        $autoloader = new Autoloader();
    }
}

/**
 * Begin execution of the plugin
 *
 * This hook is called once any activated plugins have been loaded. Is generally used for immediate filter setup, or
 * plugin overrides. The plugins_loaded action hook fires early, and precedes the setup_theme, after_setup_theme, init
 * and wp_loaded action hooks.
 */
add_action('plugins_loaded', function () {
    if (! class_exists('OWC\PDC\Base\Foundation\Plugin')) {
        add_action('admin_notices', function () {
            $list = '<p>' . __(
                    'The following plugins are required to use the PDC FAQ:',
                    'pdc-faq'
                ) . '</p><ol><li>OpenPDC Base (version >= 3.0.0)</li></ol>';

            printf('<div class="notice notice-error"><p>%s</p></div>', $list);
        });

        \deactivate_plugins(\plugin_basename(__FILE__));

        return;
    }

    add_action('after_setup_theme', function () {
        (new Plugin(__DIR__))->boot();
    });
}, 10);


/**
 * Partial fix for metabox group plugin.
 * Issue: using sort clone, the wysiwyg field content does not display after moving.
 */
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('metabox-fix', plugins_url() . '/pdc-faq/metabox-fix.css');
});
