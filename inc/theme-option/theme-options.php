<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'egns_theme_options';


    // Create options
    CSF::createOptions($prefix, array(
        'menu_title'      => esc_html__('Theme Options', 'egenslab'),
        'menu_slug'       => esc_html__('theme options', 'egenslab'),
        'menu_position'   => 60,
        'description'     => 'Thank you for creating with Codestar',
    ));

    // Create a header section
    CSF::createSection($prefix, array(
        'title'  => esc_html__('Header Options', 'egenslab'),
        'fields' => array(

            // A text field
            array(
                'id'    => 'opt-text',
                'type'  => 'text',
                'title' => 'Simple Text',
            ),

        )
    ));


    // Create a footer section
    CSF::createSection($prefix, array(
        'title'  => esc_html__('Footer Options', 'egenslab'),
        'fields' => array(

            // A textarea field
            array(
                'id'    => 'opt-textarea',
                'type'  => 'textarea',
                'title' => 'Simple Textarea',
            ),

        )
    ));


    // Create a footer section
    CSF::createSection($prefix, array(
        'title'  => esc_html__('Custom Code', 'egenslab'),
        'fields' => array(

            array(
                'id'       => 'opt-code-editor-3',
                'type'     => 'code_editor',
                'title'    => 'CSS Editor',
                'settings' => array(
                    'theme'  => 'mbo',
                    'mode'   => 'css',
                ),
                'default'  => '',
                'sanitize' => true,
            ),
            array(
                'id'       => 'opt-code-editor-4',
                'type'     => 'code_editor',
                'title'    => 'Javascript Editor',
                'settings' => array(
                    'theme'  => 'monokai',
                    'mode'   => 'javascript',
                ),
                'default'  => '',
                'sanitize' => true,
            ),

        )
    ));
}
