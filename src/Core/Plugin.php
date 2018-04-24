<?php

namespace OWC_PDC_FAQ\Core;

use OWC_PDC_FAQ\Core\Plugin\BasePlugin;
use OWC_PDC_FAQ\Core\Admin\Admin;

class Plugin extends BasePlugin
{

    /**
     * Name of the plugin.
     *
     * @var string
     */
    const NAME = 'pdc-faq';

    /**
     * Version of the plugin.
     * Used for setting versions of enqueue scripts and styles.
     *
     * @var string
     */
    const VERSION = '0.1';

    /**
     * Boot the plugin.
     * Called on plugins_loaded event
     */
    public function boot()
    {
	    $this->config->setPluginName(self::NAME);
	    $this->config->setFilterExceptions(['admin','core']);
	    $this->config->boot();

	    $this->bootServiceProviders();

	    if ( is_admin() ) {
		    $admin = new Admin($this);
		    $admin->boot();
	    }

	    $this->loader->addAction( 'init', $this->config, 'filter', 9);
	    $this->loader->register();
    }
}