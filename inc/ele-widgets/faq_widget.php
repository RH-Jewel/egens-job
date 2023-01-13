<?php
class Elementor_Faq_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_faq_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg FAQ', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-help';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'faq'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_faq_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_faq_image',
            [
                'label' => esc_html__('Image', 'egenslab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'egens_faq_question',
            [
                'label' => esc_html__('Question Text', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Hur söker jag lediga jobb och extrajobb hos Uniflex?', 'egenslab'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'egens_faq_answer',
            [
                'label' => esc_html__('Answer Text', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Uniflex har lediga heltidsjobb och extrajobb inom bemanning och rekrytering. För att söka våra lediga jobb och extrajobb registrera du ditt CV hos Uniflex eller söker det lediga jobbet direkt genom att bifoga ett fullständigt CV och personligt brev.', 'egenslab'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'egens_faq_list',
            [
                'label' => esc_html__('FAQ List', 'egenslab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'egens_faq_question' => esc_html__(' Hur söker jag lediga jobb och extrajobb hos Uniflex? ', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_faq_question' => esc_html__('Hur söker jag lediga jobb och extrajobb?', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],

                ],
                'title_field' => '{{{ egens_faq_question }}}',
            ]
        );
        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['egens_faq_list'];
?>


        <section class="component component-faq default-bg">
            <div class="bg-image-wrapper">
                <img width="900" height="762" src="<?php echo (!empty($settings['egens_faq_image']['url']) ? esc_url($settings['egens_faq_image']['url']) : '') ?>" class="<?php echo esc_attr__('attachment-faq size-faq','egenslab') ?>">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="questions primary-color-bg">
                            <?php foreach ($data as $item) : ?>
                                <div class="questions__item">
                                    <div class="questions__item--question d-flex justify-content-between align-items-center js-toggle-question">
                                    <?php echo (!empty($item['egens_faq_question']) ? esc_html__($item['egens_faq_question'], 'egenslab') : '') ?> <i class="icon-arrow-down"></i>
                                    </div>
                                    <div class="questions__item--answer">
                                        <div class="entry-content">
                                            <p><?php echo (!empty($item['egens_faq_answer']) ? wp_kses($item['egens_faq_answer'], wp_kses_allowed_html('post')) : '') ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
