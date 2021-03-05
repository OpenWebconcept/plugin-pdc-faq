<?php

return [

    'faq' => [
        'id'         => 'pdc_faqdata',
        'title'      => __('Frequently asked questions', 'pdc-faq'),
        'post_types' => ['pdc-item'],
        'context'    => 'normal',
        'priority'   => 'high',
        'autosave'   => true,
        'revision'   => true,
        'fields'     => [
            'faqs' => [
                'group' => [
                    'id'         => 'pdc_faq_group',
                    'type'       => 'group',
                    'clone'      => true,
                    'sort_clone' => true,
                    'add_button' => __('Add new faq', 'pdc-faq'),
                    'fields'     => [
                        [
                            'id'   => 'pdc_faq_question',
                            'name' => __('Question', 'pdc-faq'),
                            'type' => 'text',
                        ],
                        [
                            'id'      => 'pdc_faq_answer',
                            'name'    => __('Answer', 'pdc-faq'),
                            'desc'    => __('Use of HTML is allowed', 'pdc-faq'),
                            'type'    => 'wysiwyg',
                            // Editor settings, see https://codex.wordpress.org/Function_Reference/wp_editor
                            'options' => [
                                'textarea_rows' => 4,
                                'teeny'         => false,
                            ],
                        ],
                        [
                            'id'   => 'pdc_faq_scheduled',
                            'name' => __('Aangepaste publicatie', 'pdc-faq'),
                            'type' => 'checkbox',
                        ],
                        [
                            'name'       => __('Begindatum', 'pdc-faq'),
                            'id'         => 'pdc_faq_startdate',
                            'type'       => 'datetime',
                            'visible'   => ['pdc_faq_scheduled', '=', true],
                            'js_options' => array(
                                'stepMinute'      => 15,
                                'showTimepicker'  => true,
                                'controlType'     => 'select',
                                'showButtonPanel' => false,
                                'oneLine'         => true,
                            ),
                            'inline'     => false,
                            'timestamp'  => false,
                        ],
                        [
                            'name'       => __('Einddatum', 'pdc-faq'),
                            'id'         => 'pdc_faq_enddate',
                            'type'       => 'datetime',
                            'visible'   => ['pdc_faq_scheduled', '=', true],
                            'js_options' => array(
                                'stepMinute'      => 15,
                                'showTimepicker'  => true,
                                'controlType'     => 'select',
                                'showButtonPanel' => false,
                                'oneLine'         => true,
                            ),
                            'inline'     => false,
                            'timestamp'  => false,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
