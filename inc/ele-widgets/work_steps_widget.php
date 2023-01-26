<?php
class Elementor_Work_Steps_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_work_steps_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Work Steps', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-editor-list-ul';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'work_steps'];
    }

    protected function register_controls()
    {

        // Content Tab Start


        $this->start_controls_section(
            'egens_work_steps_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'egens_work_steps_title',
            [
                'label' => esc_html__('Work Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Personaluthyrning', 'egenslab'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'egens_work_steps_desc',
            [
                'label' => esc_html__('Work Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Sjukdom, semester eller glapp mellan anställningar – ibland behövs det hjälp direkt. Personaluthyrning, eller bemanning, täcker upp luckorna som får företaget att flyta på som vanligt. Vare sig det gäller en kortare eller längre tid. Vi hjälper dig direkt och har en person på plats till nästa dag!', 'egenslab'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'egens_work_steps_image',
            [
                'label' => esc_html__('Image', 'egenslab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'egens_work_steps_list',
            [
                'label' => esc_html__('Jobs List', 'egenslab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'egens_work_steps_title' => esc_html__('Personaluthyrning', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_work_steps_title' => esc_html__('Bemanningspool', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_work_steps_title' => esc_html__('Studentbemanning', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_work_steps_title' => esc_html__('Bemanning av större projekt / In-house', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_work_steps_title' => esc_html__('Tester', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_work_steps_title' => esc_html__('Second opinion', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_work_steps_title' => esc_html__('Uniflex Digital Search – UDS', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_work_steps_title' => esc_html__('Hyr först – anställ sedan', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_work_steps_title' => esc_html__('Rekrytering', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                ],
                'title_field' => '{{{ egens_work_steps_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content Tab End

        // Content Style Tab Start

        $this->start_controls_section(
            'egens_work_steps_two_title_style_section',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'egens_work_steps_two_title_style_typography',
				'selector' => '{{WRAPPER}} .component-text-with-image .entry-content h2',
			]
		);

        $this->end_controls_section();

         $this->start_controls_section(
            'egens_work_steps_two_description_style_section',
            [
                'label' => esc_html__('Description', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'egens_work_steps_two_description_style_typography',
				'selector' => '{{WRAPPER}} .component-text-with-image .entry-content p',
			]
		);

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['egens_work_steps_list']
?>
        <?php foreach ($data  as $item) : ?>
            <section class="component component-text-with-image default-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6">
                            <div class="img--container">
                                <img width="650" height="434" src="<?php echo (!empty($item['egens_work_steps_image']['url']) ? esc_url($item['egens_work_steps_image']['url']) : '') ?>" class="attachment-image-with-text size-image-with-text" alt="Uniflex Bemanning - Logistik" decoding="async" loading="lazy" sizes="(max-width: 650px) 100vw, 650px" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="entry-content">
                                <h2><?php echo (!empty($item['egens_work_steps_title']) ? esc_html__($item['egens_work_steps_title'], 'egenslab') : '') ?></h2>
                                <p><?php echo (!empty($item['egens_work_steps_desc']) ? wp_kses($item['egens_work_steps_desc'], wp_kses_allowed_html('post')) : '') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach ?>


<?php
    }
}
