<?php
class Elementor_Button_With_Job_Count extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_button_with_job_count';
    }

    public function get_title()
    {
        return esc_html__('Eg Button With Job Count', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_button_with_job_count',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'egens_button_with_job_count_text',
			[
				'label' => esc_html__( 'Button Text', 'egenslab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'jobb', 'egenslab' ),
			]
		);
        $this->add_control(
			'egens_button_with_job_count_link',
			[
				'label' => esc_html__( 'Button Link', 'egenslab' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'egenslab' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);
        $this->add_control(
			'egens_button_with_job_count_options',
			[
				'label' => esc_html__( 'Select City', 'egenslab' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => get_all_sweden_city_array()
			]
		);
        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $response = get_all_job_post();
        $response = json_decode(json_encode($response), true);
        $get_selected_city_id = $settings['egens_button_with_job_count_options'];

        $new_arr = array_filter($response['data'], function ($var) use ($get_selected_city_id) {
			return $var['cityId'] == $get_selected_city_id;
		});
        $city_count = count( $new_arr );
    ?>
            <a href="<?php echo $settings['egens_button_with_job_count_link']['url'] ?>" class="btn btn__find-jobs">
                <?php echo $city_count ?> <?php echo $settings['egens_button_with_job_count_text'] ?><i class="bi bi-chevron-right"></i>
            </a>
<?php
    }
}
