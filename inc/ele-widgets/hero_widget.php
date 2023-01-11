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
                'default' => esc_html__('238 lediga jobb', 'egenslab'),
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

        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <section class="component component-hero no-padding">
            <div class="row no-gutters">
                <div class="hero-slideshow align-self-start col-6 slick-slider">
                    <div class="slick-list">
                        <div class="slick-track">
                            <div class="slick-slide">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/13.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="hero-slideshow align-self-start col-6 slider-right slick-initialized slick-slider slick-vertical">
                    <div class="slick-list draggable" style="height: 260px;">
                        <div class="slick-track" style="opacity: 1; height: 7540px; transform: translate3d(0px, -2860px, 0px);">
                            <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/25.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="0" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-60.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/26.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/31.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-el-tele-94.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-57.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/27.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="6" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/29.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="7" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-65.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="8" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/23.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="9" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/20.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-current slick-active" data-slick-index="10" aria-hidden="false" style="width: 760px;">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-66.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="11" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-71.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="12" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/22.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide" data-slick-index="13" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/25.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="14" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-60.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="15" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/26.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="16" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/31.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="17" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-el-tele-94.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="18" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-57.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="19" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/27.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="20" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/29.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="21" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-65.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="22" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/23.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="23" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/20.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="24" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-66.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="25" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-71.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="26" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/22.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide slick-cloned" data-slick-index="27" aria-hidden="true" style="width: 760px;" tabindex="-1">
                                <div>
                                    <div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/25.jpg&quot;); width: 100%; display: inline-block;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid hero-content d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col">
                        <div class="entry-content white-text-color">
                            <h1 class="h1--xl">238 lediga jobb</h1>
                            <p class="font-size-large">Vi har lediga tjänster inom hela Sverige</p>
                            <form role="search" method="get" class="search-form" action="https://www.uniflex.se/jobb/">
                                <input type="search" name="q" placeholder="Sök på ort, stad eller yrke"> <button type="submit"> <i class="icon-search"></i> <span> <b>238</b> jobb </span> </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
