<?php 

function register_egens_widget( $widgets_manager ) {

	//Including all widgets file
	require_once( __DIR__ . '/ele-widgets/hero_widget.php' );
	require_once( __DIR__ . '/ele-widgets/hero_two_widget.php' );
	require_once( __DIR__ . '/ele-widgets/feature_widget.php' );
	require_once( __DIR__ . '/ele-widgets/statistics_widget.php' );
	require_once( __DIR__ . '/ele-widgets/our_office_widget.php' );
	require_once( __DIR__ . '/ele-widgets/faq_widget.php' );
	require_once( __DIR__ . '/ele-widgets/job_search_widget.php' );
	require_once( __DIR__ . '/ele-widgets/team_widget.php' );

	//registering widgets
	$widgets_manager->register( new \Elementor_Hero_Widget() );
	$widgets_manager->register( new \Elementor_Hero_Two_Widget() );
	$widgets_manager->register( new \Elementor_Feature_Widget() );
	$widgets_manager->register( new \Elementor_Statistics_Widget() );
	$widgets_manager->register( new \Elementor_Our_Office_Widget() );
	$widgets_manager->register( new \Elementor_Faq_Widget() );
	$widgets_manager->register( new \Elementor_Job_Search_Widget() );
	$widgets_manager->register( new \Elementor_Team_Widget() );

}

//register hook
add_action( 'elementor/widgets/register', 'register_egens_widget' );