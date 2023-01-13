<?php
class Elementor_Jobs_Banner_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_jobs_banner_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Jobs Banner', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-post-title';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'banner'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_job_banner_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_job_banner_title',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Redo för ditt nya jobb?', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_job_banner_desc',
            [
                'label' => esc_html__('Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Registrera ditt CV redan idag!', 'egenslab'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'egens_job_banner_button_title',
            [
                'label' => esc_html__('Button Text', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Registrera CV', 'egenslab'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'egens_job_banner_button_link',
            [
                'label' => esc_html__('Link', 'egenslab'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'egenslab'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'egens_job_banner_button_list',
            [
                'label' => esc_html__('Employee List', 'egenslab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'egens_job_banner_button_title' => esc_html__('Investor Relations', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_job_banner_button_title' => esc_html__('Bolagsstyrning', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_job_banner_button_title' => esc_html__('Pressreleaser', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],

                ],
                'title_field' => '{{{ egens_job_banner_button_title }}}',
            ]
        );


        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['egens_job_banner_button_list'];
?>

        <section class="component component-image-block no-padding has-shape has-margin-left">
            <div class="content" style="background-image: url(''); background-size: cover;">
                <div class="row no-gutters h-100">
                    <div class="col">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="entry-content white-text-color">
                                <h2 class="h2--xl" style="text-align: center;"><?php echo (!empty($settings['egens_job_banner_title']) ? esc_html__($settings['egens_job_banner_title'], 'egenslab') : '') ?></h2>
                                <p class="font-size-large" style="text-align: center;"><?php echo (!empty($settings['egens_job_banner_desc']) ? esc_html__($settings['egens_job_banner_desc'], 'egenslab') : '') ?></p>
                                <p style="text-align: center;">
                                    <?php foreach ($data as $item) : ?>
                                        <a class="btn btn--small" href="<?php echo (!empty($item['egens_job_banner_button_link']['url']) ? esc_url($item['egens_job_banner_button_link']['url']) : '') ?>"><?php echo (!empty($item['egens_job_banner_button_title']) ? esc_html__($item['egens_job_banner_button_title'], 'egenslab') : '') ?></a>
                                    <?php endforeach ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
