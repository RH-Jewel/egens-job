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

<body <?php body_class('home page-template-default page page-id-869') ?> >
	<?php wp_body_open(); ?>

	<header class="site-header">
		<div class="row h-100 no-gutters">
			<div class="d-flex col justify-content-between h-100">
				<div class="px-3 site-logo px-sm-4 d-flex align-items-center primary-color-bg">
					<a href="index.html" title="Uniflex" rel="home">
						<img src="<?php echo get_template_directory_uri() ?>/assets/icon/logo.svg" alt="Uniflex">
					</a>
				</div>

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
						<a href="#" class="white-text-color" data-target="#likebar">
							<i class="icon-heart js-like-count position-relative"></i>
						</a>
						<div class="js-likebar likebar position-absolute d-none"></div>
					</div>

					<div class="d-none d-xl-flex primary-color-bg h-100 align-items-center white-text-color">
						<a href="registrera-cv.html" class="px-4 white-text-color d-flex h-100 w-100 align-items-center justify-content-center login-btn">
							Registrera CV </a>
					</div>

					<div class="d-flex align-items-center h-100 hamburger-container">
						<span class="phone-number">Ring oss på 08-555 368 00</span>
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
				'container_id'    => 'menu-off-canvasmeny',
				'menu_class'      => 'menu-item',
				'fallback_cb'     => '',
				'menu_id'         => '',
				'depth'           => 3,
			)
		);

		?>
		<div class="d-flex d-xl-none flex-column">
			<a href="registrera-cv.html" class="white-text-color menu-btn">
				Registrera CV </a>
		</div>
	</div>