<?php
class Elementor_Hello_World_Widget_1 extends \Elementor\Widget_Base
{


	public function get_name()
	{
		return 'hello_world_widget_2';
	}

	public function get_title()
	{
		return esc_html__('Hello World 2', 'elementor-addon');
	}

	public function get_icon()
	{
		return 'eicon-code';
	}

	public function get_categories()
	{
		return ['basic'];
	}

	public function get_keywords()
	{
		return ['hello', 'world'];
	}

	protected function register_controls()
	{

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Hello world', 'elementor-addon'),
			]
		);

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Text Color', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
?>

		<section class="component component-hero no-padding">
			<div class="row no-gutters">
				<div class="hero-slideshow align-self-start col-6 slider-left slick-initialized slick-slider slick-vertical">
					<div class="slick-list draggable" style="height: 440px;">
						<div class="slick-track" style="opacity: 1; height: 11000px; transform: translate3d(0px, -1760px, 0px);">
							<div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/13.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="0" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-44-hero.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/18.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-54.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-current slick-active" data-slick-index="3" aria-hidden="false" style="width: 843px;">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/14.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-36.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/8.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="6" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-22.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="7" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-33.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="8" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/10.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="9" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-25.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="10" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/19.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="11" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/13.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="12" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-44-hero.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="13" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/18.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="14" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-54.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="15" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/14.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="16" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-36.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="17" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/8.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="18" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-22.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="19" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-33.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="20" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/10.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="21" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-25.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="22" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/19.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="23" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/13.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="hero-slideshow align-self-start col-6 slider-right slick-initialized slick-slider slick-vertical">
					<div class="slick-list draggable" style="height: 388px;">
						<div class="slick-track" style="opacity: 1; height: 11252px; transform: translate3d(0px, -5044px, 0px);">
							<div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/25.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="0" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-60.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/26.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/31.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-el-tele-94.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-57.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/27.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="6" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/29.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="7" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-65.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="8" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/23.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="9" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/20.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="10" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-66.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="11" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-71.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-current slick-active" data-slick-index="12" aria-hidden="false" style="width: 843px;">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/22.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="13" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/25.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="14" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-60.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="15" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/26.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="16" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/31.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="17" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-el-tele-94.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="18" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-57.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="19" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/27.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="20" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/29.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="21" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-65.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="22" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/23.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="23" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/20.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="24" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-66.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="25" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-lagerpersonal-71.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="26" aria-hidden="true" style="width: 843px;" tabindex="-1">
								<div>
									<div class="hero-slideshow__item" style="background-image: url(&quot;https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2019/02/22.jpg&quot;); width: 100%; display: inline-block;">
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="27" aria-hidden="true" style="width: 843px;" tabindex="-1">
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
