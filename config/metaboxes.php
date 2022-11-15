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
                            'id'   => 'pdc_faq_usage',
                            'name' => __('Usage', 'pdc-faq'),
                            'type' => 'checkbox_list',
                            'inline' => true,
                            'multiple' => true,
                            'options' => [
                                'website' => __('Website', 'pdc-faq'),
                                'sdg' => __('SDG', 'pdc-faq')
                            ],
                            'std' => ['website'],
                        ],
                        [
                            'id'   => 'pdc_faq_connect_sdq_faq',
                            'name' => __('Connect with SDG FAQ', 'pdc-faq'),
                            'desc' => __('When a selection has been made the answer of this question will be send to the SDG input facility. The next field contains the default text written by the SDG.', 'pdc-faq'),
                            'type' => 'select',
                            'options' => [
                                '0' => __('No connection', 'pdc-faq'),
                                'enrichment_procedure_desc' => __('Procedure description', 'pdc-faq'),
                                'enrichment_proof' => __('Proof', 'pdc-faq'),
                                'enrichment_requirements' => __('Requirements', 'pdc-faq'),
                                'enrichment_object_and_appeal' => __('Object and Appeal', 'pdc-faq'),
                                'enrichment_payment_methods' => __('Payment methods', 'pdc-faq'),
                                'enrichment_deadline' => __('Deadline', 'pdc-faq'),
                                'enrichment_action_when_no_reaction' => __('Action when to reaction', 'pdc-faq'),
                            ],
                            'visible' => ['pdc_faq_usage', 'contains', 'sdg']
                        ],
                        [
                            'name' => __('Default SDG text', 'pdc-faq'),
                            'id'   => 'pdc_faq_enrichment_procedure_desc_default',
                            'type' => 'wysiwyg',
                            'options' => [
                                'textarea_rows' => 4,
                                'quicktags' => false,
                                'teeny' => true,
                                'media_buttons' => false,
                            ],
                            'hidden' => [ 'pdc_faq_connect_sdq_faq', '!=', 'enrichment_procedure_desc' ]
                        ],
                        [
                            'name' => __('Default SDG text', 'pdc-faq'),
                            'id'   => 'pdc_faq_enrichment_proof_default',
                            'type' => 'wysiwyg',
                            'options' => [
                                'textarea_rows' => 4,
                                'quicktags' => false,
                                'teeny' => true,
                                'media_buttons' => false,
                            ],
                            'hidden' => [ 'pdc_faq_connect_sdq_faq', '!=', 'enrichment_proof' ]
                        ],
                        [
                            'name' => __('Default SDG text', 'pdc-faq'),
                            'id'   => 'pdc_faq_enrichment_requirements_default',
                            'type' => 'wysiwyg',
                            'options' => [
                                'textarea_rows' => 4,
                                'quicktags' => false,
                                'teeny' => true,
                                'media_buttons' => false,
                            ],
                            'hidden' => [ 'pdc_faq_connect_sdq_faq', '!=', 'enrichment_requirements' ]
                        ],
                        [
                            'name' => __('Default SDG text', 'pdc-faq'),
                            'id'   => 'pdc_faq_enrichment_object_and_appeal_default',
                            'type' => 'wysiwyg',
                            'options' => [
                                'textarea_rows' => 4,
                                'quicktags' => false,
                                'teeny' => true,
                                'media_buttons' => false,
                            ],
                            'hidden' => [ 'pdc_faq_connect_sdq_faq', '!=', 'enrichment_object_and_appeal' ]
                        ],
                        [
                            'name' => __('Default SDG text', 'pdc-faq'),
                            'id'   => 'pdc_faq_enrichment_payment_methods_default',
                            'type' => 'wysiwyg',
                            'options' => [
                                'textarea_rows' => 4,
                                'quicktags' => false,
                                'teeny' => true,
                                'media_buttons' => false,
                            ],
                            'hidden' => [ 'pdc_faq_connect_sdq_faq', '!=', 'enrichment_payment_methods' ]
                        ],
                        [
                            'name' => __('Default SDG text', 'pdc-faq'),
                            'id'   => 'pdc_faq_enrichment_deadline_default',
                            'type' => 'wysiwyg',
                            'options' => [
                                'textarea_rows' => 4,
                                'quicktags' => false,
                                'teeny' => true,
                                'media_buttons' => false,
                            ],
                            'hidden' => [ 'pdc_faq_connect_sdq_faq', '!=', 'enrichment_deadline' ]
                        ],
                        [
                            'name' => __('Default SDG text', 'pdc-faq'),
                            'id'   => 'pdc_faq_enrichment_action_when_no_reaction_default',
                            'type' => 'wysiwyg',
                            'options' => [
                                'textarea_rows' => 4,
                                'quicktags' => false,
                                'teeny' => true,
                                'media_buttons' => false,
                            ],
                            'hidden' => [ 'pdc_faq_connect_sdq_faq', '!=', 'enrichment_action_when_no_reaction' ]
                        ],
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
                    ],
                ],
            ],
        ],
    ],
];
