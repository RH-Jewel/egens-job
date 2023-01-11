<?php
class Elementor_Hero_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_hero_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Hero', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['eg', 'hero'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_hero_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_hero_left_gallery',
            [
                'label' => esc_html__('Left Slider Images', 'egenslab'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );
        $this->add_control(
            'egens_hero_right_gallery',
            [
                'label' => esc_html__('Right Slider Images', 'egenslab'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );

        $this->add_control(
            'egens_hero_title',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('238 lediga job', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_hero_desc',
            [
                'label' => esc_html__('Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Vi har lediga tjänster inom hela Sverige', 'egenslab'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'egens_hero_jobs_number',
            [
                'label' => esc_html__('Total Jobs', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('<b>238</b> jobb',wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_hero_jobs_search_link',
            [
                'label' => esc_html__('Job Search Link', 'egenslab'),
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
        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <section class="component component-hero no-padding">
            <div class="row no-gutters">
                <div class="hero-slideshow align-self-start col-6 slider-left slick-initialized slick-slider slick-vertical">
                    <div class="slick-list draggable">
                        <div class="slick-track">
                            <?php foreach ($settings['egens_hero_left_gallery'] as $img) : ?>
                                <div class="slick-slide">
                                    <div>
                                        <div class="hero-slideshow__item" style="background-image: url(<?php echo (!empty($img['url']) ? esc_url($img['url']) : '') ?>); width: 100%; display: inline-block;">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="hero-slideshow align-self-start col-6 slider-right slick-initialized slick-slider slick-vertical">
                    <div class="slick-list draggable">
                        <div class="slick-track">
                            <?php foreach ($settings['egens_hero_right_gallery'] as $img2) : ?>
                                <div class="slick-slide">
                                    <div>
                                        <div class="hero-slideshow__item" style="background-image: url(<?php echo (!empty($img2['url']) ? esc_url($img2['url']) : '') ?>); width: 100%; display: inline-block;">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid hero-content d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col">
                        <div class="entry-content white-text-color">
                            <h1 class="h1--xl"><?php echo (!empty($settings['egens_hero_title']) ? esc_html__($settings['egens_hero_title'], 'egenslab') : '') ?></h1>
                            <?php if (!empty($settings['egens_hero_desc'])) : ?>
                                <p class="font-size-large"><?php echo wp_kses($settings['egens_hero_desc'], wp_kses_allowed_html('post')) ?></p>
                            <?php endif ?>
                            <form role="search" method="get" class="search-form" action="<?php echo (!empty($settings['egens_hero_jobs_search_link']['url'])? esc_url($settings['egens_hero_jobs_search_link']['url']) :'') ?>">
                                <input type="search" name="q" placeholder="<?php echo esc_attr__('Sök på ort, stad eller yrke','egenslab') ?>"> <button type="submit"> <i class="icon-search"></i> <span><?php echo (!empty($settings['egens_hero_jobs_number'])? wp_kses($settings['egens_hero_jobs_number'],wp_kses_allowed_html('post')): '') ?>  </span> </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
