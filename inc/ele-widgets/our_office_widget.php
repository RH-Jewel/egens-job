<?php
class Elementor_Our_Office_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_our_office_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Our Office', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-google-maps';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['eg', 'office'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_our_office_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_our_office_heading_title',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Hitta ett kontor nära dig', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_our_office_heading_desc',
            [
                'label' => esc_html__('Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Uniflex Bemanning finns i hela Sverige', 'egenslab'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'egens_our_office_current_office',
            [
                'label' => esc_html__('Current Office', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Välj kontor', 'egenslab'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'egens_our_office_location',
            [
                'label' => esc_html__('Location Name', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Arvika', 'egenslab'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'egens_our_office_location_id',
            [
                'label' => esc_html__('Location ID', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Värmland', 'egenslab'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'egens_our_office_location_link',
            [
                'label' => esc_html__('Location Link', 'egenslab'),
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
            'egens_our_office_location_list',
            [
                'label' => esc_html__('Office List', 'egenslab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'egens_our_office_location' => esc_html__(' Arvika ', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_our_office_location' => esc_html__('Borlänge', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],

                ],
                'title_field' => '{{{ egens_our_office_location }}}',
            ]
        );
        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['egens_our_office_location_list'];
?>

        <section class="component component-columns primary-color-bg ">
            <div class="container">
                <div class="row js-content-row">
                    <div class="component-column col-12 medium-column">
                        <div class="column-type-select">
                            <div class="entry-content">
                                <h2 class="h2--xl" style="text-align: center"><?php echo (!empty($settings['egens_our_office_heading_title']) ? esc_html__($settings['egens_our_office_heading_title'], 'egenslab') : '') ?></h2>
                                <p class="font-size-large" style="text-align: center"><?php echo (!empty($settings['egens_our_office_heading_desc']) ? wp_kses($settings['egens_our_office_heading_desc'], wp_kses_allowed_html('post')) : '') ?></p>
                                <div class="custom-select position-relative is-hidden"> <span class="active-li js-active-li"> <span class="js-current-office"><?php echo (!empty($settings['egens_our_office_current_office']) ? esc_html__($settings['egens_our_office_current_office'], 'egenslab') : '') ?></span> <i class="icon-arrow-down"></i> </span>
                                    <ul>
                                        <?php foreach ($data as $item) : ?>
                                            <li>
                                                <a href="<?php echo (!empty($item['egens_our_office_location_link']['url']) ? esc_url($item['egens_our_office_location_link']['url']) : '') ?>" data-county-name="<?php echo esc_attr__(!empty($item['egens_our_office_location_id']) ? esc_html__($item['egens_our_office_location_id'], 'egenslab') : '') ?>"> </a>
                                                <?php echo (!empty($item['egens_our_office_location']) ? esc_html__($item['egens_our_office_location'], 'egenslab') : '') ?>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
