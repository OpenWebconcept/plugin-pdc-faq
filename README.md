# README #

This README documents whatever steps are necessary to get this plugin up and running.

### How do I get set up? ###
     
* Unzip and/or move all files to the /wp-content/plugins/pdc-faq directory
* Log into WordPress admin and activate the ‘PDC FAQ’ plugin through the ‘Plugins’ menu

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

### SDG ###

This plugin integrates the single digital gateway (SDG). More information can be found on: https://www.digitaleoverheid.nl/overzicht-van-alle-onderwerpen/europa/single-digitale-gateway/
PDC-FAQ questions can be send to the SDG input facility, for this to achieve there is a possibility to connect PDC-FAQ questions with the FAQ questions from the SDG.
Existing PDC-FAQ questions which are connected to a FAQ question from the SDG will be used and will overwrite the FAQ question from the SDG. 
After a push to the SDG or a pull by the SDG these overwrites will be part of the new product version in the SDG, based on the current PDC-item.

PLEASE TAKE NOTICE
Before using the SDG you must run a simple terminal command 'wp owc-set-default-metabox-values-sdg'. 
When the enrichment module is enabled it comes with a 'Usage' metabox field. 
Existing posts without this meta field should have a default value, otherwise the FAQ group is excluded from the API.
Default value 'website' will be set if there a no values set.


### Translations ###

If you want to use your own set of labels/names/descriptions and so on you can do so. 
All text output in this plugin is controlled via the gettext methods.

Please use your preferred way to make your own translations from the /wp-content/plugins/pdc-faq/languages/pdc-faq.pot file

Be careful not to put the translation files in a location which can be overwritten by a subsequent update of the plugin, theme or WordPress core.

We recommend using the 'Loco Translate' plugin. 
https://wordpress.org/plugins/loco-translate/

This plugin provides an easy interface for custom translations and a way to store these files without them getting overwritten by updates.

For instructions how to use the 'Loco Translate' plugin, we advice you to read the Beginners's guide page on their website: https://localise.biz/wordpress/plugin/beginners
or start at the homepage: https://localise.biz/wordpress/plugin

### Running tests ###
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

### Contribution guidelines ###

##### Writing tests
Have a look at the code coverage reports to see where more coverage can be obtained. 
Write tests
Create a Pull request to the OWC repository

### Who do I talk to? ###

If you have questions about or suggestions for this plugin, please contact <a href="mailto:hpeters@Buren.nl">Holger Peters</a> from Gemeente Buren.
