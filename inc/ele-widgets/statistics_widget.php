<?php
class Elementor_Statistics_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_statistics_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Statistics', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-counter';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'statistics'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_statistics_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_statistics_heading',
            [
                'label' => esc_html__('Statisctics Heading', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Uniflex kortfattat', 'egenslab'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'egens_statistics_stat_title',
            [
                'label' => esc_html__('Job Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('lediga jobb', 'egenslab'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'egens_statistics_stat_number',
            [
                'label' => esc_html__('Job Number', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('246', 'egenslab'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'egens_statistics_jobs_list',
            [
                'label' => esc_html__('Jobs List', 'egenslab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'egens_statistics_stat_title' => esc_html__('kontor', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_statistics_stat_title' => esc_html__('konsulter i vårt nätverk', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_statistics_stat_title' => esc_html__('nya kandidater varje månad', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_statistics_stat_title' => esc_html__('lediga jobb', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                ],
                'title_field' => '{{{ egens_statistics_stat_title }}}',
            ]
        );


        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['egens_statistics_jobs_list'];
?>

        <section class="component-statistics">
            <div class="container d-block d-md-none">
                <div class="row">
                    <div class="col d-flex flex-column justify-content-center">
                        <div class="statistics-block-heading">
                            <div class="entry-content">
                                <h2 class="h2--xl"><?php echo (!empty($settings['egens_statistics_heading']) ? esc_html__($settings['egens_statistics_heading'], 'egenslab') : '') ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters js-statistics-slider statistics-row">
                <div class="col-md-12 col-lg-6 flex-column justify-content-center d-none d-md-flex">
                    <div class="statistics-block-heading">
                        <div class="entry-content">
                            <h2 class="h2--xl"><?php echo (!empty($settings['egens_statistics_heading']) ? esc_html__($settings['egens_statistics_heading'], 'egenslab') : '') ?></h2>
                        </div>
                    </div>
                </div>
                <?php foreach ($data as $item) : ?>
                    <div class="col-md-6 col-lg-3 d-inline-block d-md-flex statistics-block flex-column align-items-start align-items-md-center justify-content-start justify-content-md-center js-slick-slide">
                        <div class="statistics-wrapper primary-color-bg white-text-color d-flex justify-content-center align-items-center">
                            <div class="statistics-content d-flex align-items-center">
                                <div class="entry-content d-flex flex-column text-center"> <span class="statistics-block__heading"><?php echo (!empty($item['egens_statistics_stat_number']) ? esc_html__($item['egens_statistics_stat_number'], 'egenslab') : '') ?></span>
                                    <p><?php echo (!empty($item['egens_statistics_stat_title']) ? esc_html__($item['egens_statistics_stat_title'], 'egenslab') : '') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>

<?php
    }
}
