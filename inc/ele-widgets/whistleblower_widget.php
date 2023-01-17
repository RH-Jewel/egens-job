<?php
class Elementor_Whistleblower_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_whistleblower_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Whistleblower', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-pojome';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'whistleblower'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_whistleblower_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_whistleblower_heading_title',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Välj ditt språk', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_whistleblower_language_one',
            [
                'label' => esc_html__('Language One', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('English', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_whistleblower_language_two',
            [
                'label' => esc_html__('Language Two', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Svenska', 'egenslab'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'egens_whistleblower_language_one_link',
            [
                'label' => esc_html__('Language Link One', 'egenslab'),
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
            'egens_whistleblower_language_one_image',
            [
                'label' => esc_html__('Language Image One', 'egenslab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'egens_whistleblower_language_two_link',
            [
                'label' => esc_html__('Language Link Two', 'egenslab'),
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
            'egens_whistleblower_language_two_image',
            [
                'label' => esc_html__('Language Image Two', 'egenslab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>


        <main class="main">
            <div class="content">
                <div class="row gx-5 mx-0">
                    <div class="col-12">
                        <div class="QW-card QW-language-page">
                            <div class="row">
                                <div class="col-md-12 QW-language-page__section">
                                    <svg class="QW-language-page__whistle" version="1.1" id="Lager_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1081 717.93" style="enable-background:new 0 0 1081 717.93;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #ED6A53;
                                            }

                                            .st1 {
                                                fill: #448485;
                                            }

                                            .st2 {
                                                fill: #F6F5F3;
                                            }

                                            .st3 {
                                                fill: #E4E4E2;
                                            }

                                            .st4 {
                                                clip-path: url(#SVGID_2_);
                                            }
                                        </style>
                                        <g>
                                            <polygon class="st0" points="600.68,52.52 648.82,147.96 587.24,160.66 648.12,262.22 733.69,244.27 682.78,185.71 754.92,170.83"></polygon>
                                            <g>
                                                <path class="st1" d="M89.91,328.59c25.3-34.28,65.14-59.69,115.21-73.5c46.43-12.8,99.66-14.68,154.99-5.57
			c7.13,0.69,14.37,2.08,21.66,4.17l-13.26,53.45c-5.05-1.06-10.08-2.02-15.09-2.87c-12.43-0.86-23.75,2.59-34.32,10.42
			c-27.2,20.14-42.77,63.46-43.13,85.71c-0.63,38.28-7.31,92.42-57.82,120.4c-48.48,26.85-109.76,9.26-136.61-39.22
			C53.05,430.16,56.1,374.39,89.91,328.59z M220.45,302.01c-37.51,10.34-72.41,30.52-90.05,54.42
			c-20.79,28.16-28.63,71.03-11.32,103.49c5.92,11.11,18.64,22.07,33.32,26.12c14.68,4.05,31.31,1.19,43.16-3.03
			c23.23-8.27,35.78-32.56,37-73.52c0.06-1.95,4.01-28.43,4.3-29.69c6.31-26.7,13.67-53.21,36.71-84.93
			C260.85,296.42,232.13,298.79,220.45,302.01z">
                                                </path>
                                                <polygon class="st2" points="514.67,433.03 737.58,433.03 1043.58,347.41 1043.58,210.84 514.67,210.84"></polygon>
                                                <path class="st3" d="M514.67,656.68c122.92,0,222.92-100,222.92-222.91c0-122.92-100-222.92-222.92-222.92
			s-222.91,100-222.91,222.92C291.75,556.67,391.75,656.68,514.67,656.68z"></path>

                                                <path class="st2" d="M517.48,587.89c83.34,0,151.14-67.8,151.14-151.14c0-83.34-67.8-151.14-151.14-151.14
			s-151.14,67.8-151.14,151.14C366.35,520.09,434.15,587.89,517.48,587.89z"></path>
                                            </g>
                                            <g>
                                                <defs>
                                                    <path id="SVGID_1_" d="M478.44,437.52c0,22.08,17.9,39.98,39.98,39.98c22.09,0,39.99-17.9,39.99-39.98
				c0-22.09-17.9-39.99-39.99-39.99C496.34,397.53,478.44,415.44,478.44,437.52"></path>
                                                </defs>
                                                <use xlink:href="#SVGID_1_" style="overflow:visible;fill:#E4E4E2;"></use>

                                                <clipPath id="SVGID_2_">
                                                    <use xlink:href="#SVGID_1_" style="overflow:visible;"></use>
                                                </clipPath>
                                                <g class="st4">
                                                    <defs>
                                                        <rect id="SVGID_3_" x="476.31" y="395.26" width="84.23" height="84.53"></rect>
                                                    </defs>
                                                    <use xlink:href="#SVGID_3_" style="overflow:visible;fill:#E4E4E2;"></use>
                                                    <clipPath id="SVGID_4_">
                                                        <use xlink:href="#SVGID_3_" style="overflow:visible;"></use>
                                                    </clipPath>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 QW-language-page__section">
                                    <h1><?php echo (!empty($settings['egens_whistleblower_heading_title']) ? esc_html__($settings['egens_whistleblower_heading_title'], 'egenslab') : '') ?></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="QW-language-page__flags-container">
                                    <div class="QW-language-page__flag-container"><a href="<?php echo (!empty($settings['egens_whistleblower_language_one_link']['url']) ? esc_url($settings['egens_whistleblower_language_one_link']['url']) : '') ?>" __internal_preventDefault_onclick class="QW-language-page__inner-flag-container"><span class="QW-language-page__name my-1"><?php echo (!empty($settings['egens_whistleblower_language_one']) ? esc_html__($settings['egens_whistleblower_language_one'], 'egenslab') : '') ?></span>
                                            <div class="QW-language-page__flag fib fi-gb-fis" style="background-image: url(<?php echo (!empty($settings['egens_whistleblower_language_one_image']['url']) ? esc_url($settings['egens_whistleblower_language_one_image']['url']) : '') ?>);"></div>
                                        </a>
                                    </div>
                                    <div class="QW-language-page__flag-container"><a href="<?php echo (!empty($settings['egens_whistleblower_language_two_link']['url']) ? esc_url($settings['egens_whistleblower_language_two_link']['url']) : '') ?>" __internal_preventDefault_onclick class="QW-language-page__inner-flag-container"><span class="QW-language-page__name my-1"><?php echo (!empty($settings['egens_whistleblower_language_two']) ? esc_html__($settings['egens_whistleblower_language_two'], 'egenslab') : '') ?></span>
                                            <div class="QW-language-page__flag fib fi-se-fis" style="background-image: url(<?php echo (!empty($settings['egens_whistleblower_language_two_image']['url']) ? esc_url($settings['egens_whistleblower_language_two_image']['url']) : '') ?>);"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php
    }
}
