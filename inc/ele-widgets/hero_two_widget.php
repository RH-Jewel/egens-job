<?php
class Elementor_Hero_Two_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_hero_two_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Hero Two', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'hero'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_hero_two_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_hero_two_img',
            [
                'label' => esc_html__('Image', 'egenslab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'egens_hero_two_title',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Hitta & sök jobb', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_hero_two_desc',
            [
                'label' => esc_html__('Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Vill du jobba inom lager, industri, bygg, kundtjänst, administration, försäljning eller kontor? Vi söker alltid nya medarbetare med olika kompetenser! Hos oss behövs du. Hos oss behövs alla.', 'egenslab'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <section class="page-hero">
            <div class="content d-flex flex-column flex-xl-row align-items-xl-center">
                <div class="img-container">
                    <div class="img-container--inner">
                        <img width="970" height="720" src="<?php echo (!empty($settings['egens_hero_two_img']['url']) ? esc_url($settings['egens_hero_two_img']['url']) : '') ?>" class="hero-bg wp-post-image" alt="<?php echo esc_attr__('Uniflex Bemanning - Lediga jobb', 'egenslab') ?>">
                    </div>
                </div>
                <div class="container container-lg">
                    <div class="row">
                        <div class="col-12 md-margin no-margin text-center small-column text-xl-left">
                            <h1><?php echo (!empty($settings['egens_hero_two_title']) ? wp_kses($settings['egens_hero_two_title'],wp_kses_allowed_html('post')) : '') ?></h1>
                            <div class="entry-content">
                                <?php if (!empty($settings['egens_hero_two_desc'])) : ?>
                                    <p><?php echo wp_kses($settings['egens_hero_two_desc'], wp_kses_allowed_html('post')) ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
