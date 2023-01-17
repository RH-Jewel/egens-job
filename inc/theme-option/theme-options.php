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
        'id'    => 'header_options',
        'title' => esc_html__('Header Options', 'egenslab'),
        'icon'  => 'fa fa-rss'
    ));

    CSF::createSection($prefix, array(
        'parent' => 'header_options',
        'title'  => esc_html__('Header', 'egenslab'),
        'id'     => 'theme_header_options',
        'icon'   => 'fa fa-id-card-o',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Header Options', 'egenslab') . '</h3>'
            ),
            array(
                'id'    => 'header_logo',
                'type'  => 'media',
                'title'   => esc_html__('Upload Header Logo', 'egenslab'),
                'default'    => array(
                    'url'         => esc_url(get_template_directory_uri() . '/assets/icon/logo.svg'),
                    'id'          => 'logo',
                    'thumbnail'   => esc_url(get_template_directory_uri() . '/assets/icon/logo.svg'),
                    'alt'         => esc_attr('logo'),
                    'title'       => esc_html('Logo'),
                ),
            ),
            array(
                'id'    => 'register_btn',
                'type'  => 'text',
                'title' => esc_html__('Register Button', 'egenslab'),
                'default' => esc_html__('Registrera CV', 'egenslab'),
            ),
            array(
                'id'     => 'register_btn_link',
                'type'   => 'text',
                'title'  => esc_html__('Button link', 'egenslab'),
                'default' => '#',
            ),
            array(
                'id'    => 'phn_number',
                'type'  => 'text',
                'title' => esc_html__('Phone Number', 'egenslab'),
                'default' => esc_html__('Ring oss på 08-555 368 00', 'egenslab'),
            ),
        )
    ));




    // Create a footer section
    CSF::createSection($prefix, array(
        'id'    => 'footer_options',
        'title' => esc_html__('Footer Options', 'egenslab'),
        'icon'  => 'fa fa-rss'
    ));

    CSF::createSection($prefix, array(
        'parent' => 'footer_options',
        'title'  => esc_html__('Footer Social Icon', 'egenslab'),
        'id'     => 'social_footer_options',
        'icon'   => 'fa fa-id-card-o',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Social', 'egenslab') . '</h3>'
            ),
            array(
                'id'     => 'social_media',
                'type'   => 'repeater',
                'title'  => 'Repeater',
                'fields' => array(
                    array(
                        'id'      => 'social_icon',
                        'type'    => 'icon',
                        'title'   => 'Icon',
                        'default' => 'fa fa-heart'
                    ),
                    array(
                        'id'      => 'social_link',
                        'type'    => 'text',
                        'title'   => esc_html__('Icon Link', 'egenslab'),
                        'default' => '#'
                    ),

                ),
            ),

        )
    ));

    CSF::createSection($prefix, array(
        'parent' => 'footer_options',
        'title'  => esc_html__('Footer Client Logo', 'egenslab'),
        'id'     => 'footer_logo_options',
        'icon'   => 'fa fa-id-card-o',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Logo', 'egenslab') . '</h3>'
            ),
            array(
                'id'     => 'footer_logo',
                'type'   => 'repeater',
                'title'  => 'Repeater',
                'fields' => array(
                    array(
                        'id'    => 'client_logo',
                        'type'  => 'media',
                        'title' => 'Media',
                        'default'    => array(
                            'url'         => esc_url(get_template_directory_uri() . '/assets/img/iso-9001-300x300.png'),
                            'id'          => 'logo',
                            'thumbnail'   => esc_url(get_template_directory_uri() . '/assets/img/iso-9001-300x300.png'),
                            'alt'         => esc_attr('logo'),
                            'title'       => esc_html('Logo'),
                        ),
                    ),

                ),
            ),

        )
    ));

    CSF::createSection($prefix, array(
        'parent' => 'footer_options',
        'title'  => esc_html__('Footer CopyRight', 'egenslab'),
        'id'     => 'footer_copyright_options',
        'icon'   => 'fa fa-id-card-o',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Footer CopyRight Text', 'egenslab') . '</h3>'
            ),
            array(
                'id'      => 'copy_txt',
                'type'    => 'textarea',
                'title'   => esc_html__('CopyRight Text', 'egenslab'),
                'default' => esc_html__('© 2023 Uniflex Bemanning AB. All rights reserved', 'egenslab'),
            ),

        )
    ));



    // Create a Code section
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
