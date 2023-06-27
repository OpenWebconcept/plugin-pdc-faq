# README

This README documents whatever steps are necessary to get this plugin up and running.

### How do I get set up?
     
* Unzip and/or move all files to the /wp-content/plugins/pdc-faq directory
* Log into WordPress admin and activate the ‘PDC FAQ’ plugin through the ‘Plugins’ menu

## Getting started
### Installation

#### For users
1. Download the latest release from [the releases page](https://github.com/OpenWebconcept/plugin-pdc-faq/releases)
2. Unzip and move all files to the `/wp-content/plugins/pdc-faq` directory.
3. Log into the WordPress admin and activate the 'PDC FAQ' plugin through the 'plugins' menu

#### For developers
To contribute to this project, no dependencies are required. However, you will need to download [Composer](https://getcomposer.org/) to run tests or create an optimized build of the plugin.

1. Clone this repository to your machine and/or WordPress installation
2. Optionally use Composer (`composer install`) to install the dev dependencies

To create an optimized and zipped build, run the `composer run package` command. This requires `Composer`, `rsync` and `zip` to run.


### Filters & Actions

There are various [hooks](https://codex.wordpress.org/Plugin_API/Hooks), which allows for changing the output.

##### Action for changing main Plugin object.
```php
'owc/pdc-faq/plugin'
```

See OWC\PDC\FAQ\Config->set method for a way to change this plugins config.

Via the plugin object the following config settings can be adjusted
- metaboxes
- rest_api_fields


### Translations

If you want to use your own set of labels/names/descriptions and so on you can do so. 
All text output in this plugin is controlled via the gettext methods.

Please use your preferred way to make your own translations from the /wp-content/plugins/pdc-faq/languages/pdc-faq.pot file

Be careful not to put the translation files in a location which can be overwritten by a subsequent update of the plugin, theme or WordPress core.

We recommend using the 'Loco Translate' plugin. 
https://wordpress.org/plugins/loco-translate/

This plugin provides an easy interface for custom translations and a way to store these files without them getting overwritten by updates.

For instructions how to use the 'Loco Translate' plugin, we advice you to read the Beginners's guide page on their website: https://localise.biz/wordpress/plugin/beginners
or start at the homepage: https://localise.biz/wordpress/plugin

### Running tests
To run the Unit tests go to a command-line.
```bash
cd /path/to/wordpress/htdocs/wp-content/plugins/pdc-faq/
composer install
phpunit
```

For code coverage report, generate report with command line command and view results with browser.
```bash
phpunit --coverage-html ./tests/coverage
```

### Contribution guidelines

##### Writing tests
Have a look at the code coverage reports to see where more coverage can be obtained. 
Write tests
Create a Pull request to the OWC repository

### Who do I talk to?

If you have questions about or suggestions for this plugin, please contact <a href="mailto:hpeters@Buren.nl">Holger Peters</a> from Gemeente Buren.
