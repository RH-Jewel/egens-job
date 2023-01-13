<?php
class Elementor_Feature_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_feature_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Feature', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-featured-image';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'feature'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_feature_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_feature_title',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Uniflexfamiljen', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_feature_desc',
            [
                'label' => esc_html__('Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Vi vore ingenting utan våra kunder och konsulter. Därför är vår affärsidé tydlig: det ska vara enkelt att jobba med oss och hos oss – det ska vara enkelt att hitta rätt person till rätt jobb. Välkommen till Uniflexfamiljen!', 'egenslab'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'egens_feature_button_title',
            [
                'label' => esc_html__('Button Text', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Att arbeta på Uniflex', 'egenslab'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'egens_feature_button_link',
            [
                'label' => esc_html__('Button Link', 'egenslab'),
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


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'egens_feature_employee_name',
            [
                'label' => esc_html__('Employee Name', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Johan', 'egenslab'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'egens_feature_employee_image',
            [
                'label' => esc_html__('Employee Image', 'egenslab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'egens_feature_employee_video_link',
            [
                'label' => esc_html__('Video Link', 'egenslab'),
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
            'egens_feature_employee_list',
            [
                'label' => esc_html__('Employee List', 'egenslab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'egens_feature_employee_name' => esc_html__('Hanna', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_feature_employee_name' => esc_html__('Johan', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_feature_employee_name' => esc_html__('Dave', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_feature_employee_name' => esc_html__('Pernilla', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                ],
                'title_field' => '{{{ egens_feature_employee_name }}}',
            ]
        );


        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['egens_feature_employee_list'];
?>

        <section class="component component-featured-employees skew-bg primary-color-bg">
            <div class="row no-gutters align-items-center">
                <div class="col-12 col-lg-6 order-lg-1 white-text-color px-4">
                    <div class="entry-content mx-auto">
                        <h2 class="h2--xl"><?php echo (!empty($settings['egens_feature_title']) ? esc_html__($settings['egens_feature_title'], 'egenslab') : '') ?></h2>
                        <p><?php echo (!empty($settings['egens_feature_desc']) ? wp_kses($settings['egens_feature_desc'], wp_kses_allowed_html('post')) : '') ?></p>
                        <p><a class="btn btn--black" href="<?php echo (!empty($settings['egens_feature_button_link']['url']) ? esc_url($settings['egens_feature_button_link']['url']) : '') ?>"><?php echo (!empty($settings['egens_feature_button_title']) ? esc_html__($settings['egens_feature_button_title'], 'egenslab') : '') ?></a></p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-lg-0">
                    <div class="employees">
                        <?php foreach ($data as $item) : ?>
                            <div class="employee">
                                <img width="400" height="470" src="<?php echo (!empty($item['egens_feature_employee_image']['url']) ? esc_url($item['egens_feature_employee_image']['url']) : '') ?>" class="employee--image" alt="Uniflex Bemanning" decoding="async" loading="lazy">
                                <div class="employee-content">
                                    <div class="employee-content--name w-100"> <a href="<?php echo (!empty($item['egens_feature_employee_video_link']['url']) ? esc_url($item['egens_feature_employee_video_link']['url']) : '') ?>" data-featherlight="iframe" data-featherlight-iframe-width="960" data-featherlight-iframe-height="540">
                                            <div class="d-flex justify-content-start align-items-center"> <span class="name white-text-color"><?php echo (!empty($item['egens_feature_employee_name']) ? esc_html__($item['egens_feature_employee_name'], 'egenslab') : '') ?></span> <i class="icon-triangle-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>

        
<?php
    }
}
