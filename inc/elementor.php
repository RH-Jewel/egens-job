<?php 

function register_egens_widget( $widgets_manager ) {

	//Including all widgets file
	require_once( __DIR__ . '/ele-widgets/hero_widget.php' );
	require_once( __DIR__ . '/ele-widgets/hero_two_widget.php' );
	require_once( __DIR__ . '/ele-widgets/feature_widget.php' );
	require_once( __DIR__ . '/ele-widgets/job_features_widget.php' );
	require_once( __DIR__ . '/ele-widgets/statistics_widget.php' );
	require_once( __DIR__ . '/ele-widgets/our_office_widget.php' );
	require_once( __DIR__ . '/ele-widgets/faq_widget.php' );
	require_once( __DIR__ . '/ele-widgets/job_search_widget.php' );
	require_once( __DIR__ . '/ele-widgets/jobs_widget.php' );
	require_once( __DIR__ . '/ele-widgets/jobs_banner_widget.php' );
	require_once( __DIR__ . '/ele-widgets/blog_widget.php' );
	require_once( __DIR__ . '/ele-widgets/whistleblower_widget.php' );
	require_once( __DIR__ . '/ele-widgets/work_steps_widget.php' );

	//registering widgets
	$widgets_manager->register( new \Elementor_Hero_Widget() );
	$widgets_manager->register( new \Elementor_Hero_Two_Widget() );
	$widgets_manager->register( new \Elementor_Feature_Widget() );
	$widgets_manager->register( new \Elementor_Job_Features_Widget() );
	$widgets_manager->register( new \Elementor_Statistics_Widget() );
	$widgets_manager->register( new \Elementor_Our_Office_Widget() );
	$widgets_manager->register( new \Elementor_Faq_Widget() );
	$widgets_manager->register( new \Elementor_Job_Search_Widget() );
	$widgets_manager->register( new \Elementor_Jobs_Widget() );
	$widgets_manager->register( new \Elementor_Jobs_Banner_Widget() );
	$widgets_manager->register( new \Elementor_Blog_Widget() );
	$widgets_manager->register( new \Elementor_Whistleblower_Widget() );
	$widgets_manager->register( new \Elementor_Work_Steps_Widget() );

}

//register hook
add_action( 'elementor/widgets/register', 'register_egens_widget' );


//registering custom category
function egens_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'egens_widgets',
		[
			'title' => esc_html__( 'EG Widgets', 'egenslab' ),
			'icon' => 'fa fa-plug',
		]
	);
	

}
add_action( 'elementor/elements/categories_registered', 'egens_widget_categories' );