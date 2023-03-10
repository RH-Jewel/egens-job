<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package egenslab
 */

get_header();
session_start();
$_SESSION["save_job_array"] = [];
// Get theme options value
$options = get_option('egns_theme_options');

?>

<!DOCTYPE html>
<html lang="sv-SE">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon-16x16.png">
	<link rel="manifest" href="https://www.uniflex.se/wp-content/themes/uniflex/assets/img/favicons/site.webmanifest">
	<link rel="mask-icon" href="assets/icon/safari-pinned-tab.svg" color="#ff7200">
	<meta name="msapplication-TileColor" content="#ff7200">
	<meta name="theme-color" content="#ffffff">
	<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
	<link rel='dns-prefetch' href='//wwwuniflexse.cdn.triggerfish.cloud' />

	<link rel='shortlink' href='https://www.uniflex.se/' />
	<link rel="alternate" type="application/json+oembed" href="https://www.uniflex.se/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.uniflex.se%2F">
	<link rel="alternate" type="text/xml+oembed" href="https://www.uniflex.se/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.uniflex.se%2F&amp;format=xml">
	<!-- Analytics by WP Statistics v13.2.7 - https://wp-statistics.com/ -->
	<?php wp_head() ?>
</head>

<body <?php body_class('home page-template-default page page-id-869') ?>>
	<?php wp_body_open(); ?>

	<header class="site-header">
		<div class="row h-100 no-gutters">
			<div class="d-flex col justify-content-between h-100">

				<?php if (!empty($options['header_logo']['url'])) : ?>
					<div class="px-3 site-logo px-sm-4 d-flex align-items-center primary-color-bg">
						<a href="<?php echo esc_url(home_url('/')); ?>" title="Uniflex" rel="home">
							<img src="<?php echo $options['header_logo']['url'] ?>" alt="Uniflex">
						</a>
					</div>
				<?php endif; ?>

				<div class="flex-row main-nav-container d-flex primary-color-bg align-items-center justify-content-end">
					<nav class="px-4 d-none d-xl-flex site-header__navigation">

						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'top_menu',
								'container_class' => '',
								'link_before'     => '',
								'link_after'      => '',
								'container_id'    => '',
								'menu_class'      => 'menu d-flex flex-row',
								'fallback_cb'     => '',
								'menu_id'         => 'menu-huvudmeny',
								'depth'           => 3,
							)
						);

						?>
					</nav>

					<div class="px-3 px-sm-4 pl-sm-0 d-flex align-items-center position-relative js-like-menu-choice">
						<a href="#" class="white-text-color" data-toggle="modal" data-target=".modalLike">
							<i class="bi bi-suit-heart position-relative">
								<i class="circle-indicator circle-indicator-count">0</i>
							</i>
						</a>
						<div class="js-likebar likebar position-absolute d-none"></div>
					</div>

					<?php if (!empty($options['register_btn'])) : ?>
						<div class="d-none d-xl-flex primary-color-bg h-100 align-items-center white-text-color">
							<a href="<?php echo esc_url($options['register_btn_link']) ?>" class="px-4 white-text-color d-flex h-100 w-100 align-items-center justify-content-center login-btn">
								<?php echo $options['register_btn'] ?></a>
						</div>
					<?php endif; ?>

					<div class="d-flex align-items-center h-100 hamburger-container">
						<span class="phone-number"><?php echo $options['phn_number'] ?? '' ?></span>
						<a class="px-4 hamburger d-flex align-items-center ml-md-auto js-toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="hamburger__icon d-block"></span>
						</a>
					</div>
				</div>

			</div>
		</div>
	</header>
	<div class="off-canvas position-fixed primary-color-bg d-flex flex-column justify-content-between">
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary_menu',
				'container_class' => 'off-canvas-menu w-100',
				'link_before'     => '',
				'link_after'      => '',
				'after'			  => '',
				'container_id'    => 'menu-off-canvasmeny',
				'menu_class'      => 'menu-item',
				'fallback_cb'     => '',
				'menu_id'         => '',
				'depth'           => 3,
			)
		);

		?>
		<?php if (!empty($options['register_btn'])) : ?>
			<div class="d-flex d-xl-none flex-column">
				<a href="<?php echo esc_url($options['register_btn_link']) ?>" class="white-text-color menu-btn">
					<?php echo $options['register_btn'] ?> </a>
			</div>
		<?php endif; ?>
	</div>

	<!-- <div class="modal fade likebar-modal show" id="likebar" tabindex="-1" role="dialog" aria-labelledby="likebar" style="padding-right: 17px; display: block;">

	</div> -->
	<div class="modal fade modalLike" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body js-likebar-body">	
					<div class="panels__wrapper">
						<div class="panel-column-header d-flex">
							<div class="panel-column-header--item d-flex align-items-center justify-content-center js-toggle-panel-item is-active" data-panel-content-id="0">
								<h3>
								<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Saved jobs (</font></font><span class="js-panel-counter"><font style="vertical-align: inherit;"><font class="circle-indicator-count" style="vertical-align: inherit;">0</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> st )</font></font>
							</h3>
							</div>

							<div class="panel-column-header--item d-flex align-items-center justify-content-center js-toggle-panel-item" data-panel-content-id="1">
								<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Saved searches ( 0 pcs )</font></font></h3>
							</div>
						</div>
						<div class="panel-column-content is-visible" id="modalLikeContent" data-panel-content-id="0">
							
						</div>
					</div>
				</div>
				<div class="circle-loader"></div>
			</div>
		</div>
	</div>
	<script>
		var job_data = localStorage.getItem("job_data");
		console.log( job_data );
	</script>
	<style>
		.modal-backdrop.show {
			opacity: 0.8;
		}
	</style>