<?php

return [
    /**
     * Service Providers.
     */
    'providers' => [
        /**
         * Global providers.
         */
        OWC\PDC\FAQ\RestAPI\RestAPIServiceProvider::class,
        OWC\PDC\FAQ\ElasticSearch\ElasticSearchServiceProvider::class,
        OWC\PDC\FAQ\Commands\CommandsServiceProvider::class,

        /**
         * Providers specific to the admin.
         */
        'admin'    => [
            OWC\PDC\FAQ\Metabox\MetaboxServiceProvider::class,
        ]
    ],

    'dependencies' => [
        [
            'type'    => 'plugin',
            'label'   => 'OpenPDC Base',
            'version' => '3.4.11',
            'file'    => 'pdc-base/pdc-base.php',
        ],
        [
            'type'    => 'plugin',
            'label'   => 'RWMB Meta Box Conditional Logic',
            'version' => '1.6.17',
            'file'    => 'metabox-conditional-logic/meta-box-conditional-logic.php'
        ]
    ]
];
