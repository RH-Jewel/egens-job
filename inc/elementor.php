<?php 

function register_egens_widget( $widgets_manager ) {

	require_once( __DIR__ . '/ele-widgets/hero_widget.php' );

	$widgets_manager->register( new \Elementor_Hero_Widget() );

}
add_action( 'elementor/widgets/register', 'register_egens_widget' );