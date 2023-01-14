<?php
class Elementor_Job_Features_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_job_features_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Job Features', 'egenslab');
    }

    public function get_icon()
    {
        return ' eicon-text-field';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'features'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_job_features_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_job_features_heading_title',
            [
                'label' => esc_html__('Heading Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Därför väljer man Uniflex', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_job_features_heading_desc',
            [
                'label' => esc_html__('Heading Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Fördelar med att vara anställd hos Uniflex Bemanning', 'egenslab'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'egens_job_features_title',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Garanterad lön', 'egenslab'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'egens_job_features_desc',
            [
                'label' => esc_html__('Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Vare sig du jobbar ett par timmar, är provanställd eller redan är inne på en tillsvidareanställning – din lön är alltid baserad på ditt kollektivavtal och anställningstid.', 'egenslab'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'egens_job_features_link',
            [
                'label' => esc_html__('Job Link', 'egenslab'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'egenslab'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => 'https://www.uniflex.se/sok-jobb/jobba-pa-uniflex/',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'egens_job_features_image',
            [
                'label' => esc_html__('Image', 'egenslab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'egens_job_features_list',
            [
                'label' => esc_html__('Feature List', 'egenslab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'egens_job_features_title' => esc_html__('Garanterad lön', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_job_features_title' => esc_html__('Schyssta förmåner', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_job_features_title' => esc_html__('Alltid lön efter kollektivavtal', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_job_features_title' => esc_html__('Jobb där du finns', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                ],
                'title_field' => '{{{ egens_job_features_title }}}',
            ]
        );


        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['egens_job_features_list'];
?>

        <section class="component component-slideshow default-bg slideshow-style-puffs">
            <div class="container component-header">
                <div class="row">
                    <div class="col medium-column">
                        <div class="entry-content">
                            <h2 class="h2--xl" style="text-align: center;"><?php echo (!empty($settings['egens_job_features_heading_title']) ? esc_html__($settings['egens_job_features_heading_title'], 'egenslab') : '') ?></h2>
                            <p class="font-size-large" style="text-align: center;"><?php echo (!empty($settings['egens_job_features_heading_desc']) ? wp_kses($settings['egens_job_features_heading_desc'], wp_kses_allowed_html('post')) : '') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row slideshow-row">
                <div class="col">
                    <div class="slideshow slideshow-style-puffs" data-slideshow-style="puffs">
                        <?php foreach ($data as $item) : ?>
                            <div class="slideshow--item">
                                <div class="entry-content">
                                    <p><img decoding="async" src="<?php echo (!empty($item['egens_job_features_image']['url']) ? esc_url($item['egens_job_features_image']['url']) : '') ?>" alt="<?php echo esc_attr__('Uniflex Bemanning - Logistik', 'egenslab') ?>" data-name="image"></p>
                                    <h3><a href="<?php echo (!empty($item['egens_job_features_link']['url']) ? esc_url($item['egens_job_features_link']['url']) : '') ?>"><?php echo (!empty($item['egens_job_features_title']) ? esc_html__($item['egens_job_features_title'], 'egenslab') : '') ?></a></h3>
                                    <p><?php echo (!empty($item['egens_job_features_desc']) ? wp_kses($item['egens_job_features_desc'], wp_kses_allowed_html('post')) : '') ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row slideshow-controllers">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="d-flex justify-content-center js-slick-dots"></div>
                            <div class="d-flex justify-content-end slick-custom-arrows"> <i class="icon-arrow-right icon-arrow-left js-slide-left"></i> <i class="icon-arrow-right js-slide-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php
    }
}