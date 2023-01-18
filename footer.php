<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package egenslab
 */

// Get theme options value
$options = get_option('egns_theme_options');
?>

<section class="site-footer black-bg white-text-color">
	<div class="container container-lg">
		<div class="row">
			<div class="col-12 col-lg-9">
				<ul id="menu-sidfotsmeny" class="menu d-flex flex-column flex-lg-row">

					<?php if (is_active_sidebar('footer-1')) : ?>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1178">
							<?php dynamic_sidebar('footer-1') ?>
						</li>
					<?php endif; ?>

					<?php if (is_active_sidebar('footer-2')) : ?>
						<li id="menu-item-1304" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1304">
							<?php dynamic_sidebar('footer-2') ?>
						</li>
					<?php endif; ?>

					<?php if (is_active_sidebar('footer-3')) : ?>
						<li id="menu-item-1308" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1308">
							<?php dynamic_sidebar('footer-3') ?>
						</li>
					<?php endif; ?>


					<?php if (is_active_sidebar('footer-4')) : ?>
						<li id="menu-item-2524" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2524">
							<?php dynamic_sidebar('footer-4') ?>
						</li>
					<?php endif; ?>

				</ul>
			</div>
			<div class="col-12 col-lg-3">
				<?php if (is_active_sidebar('footer-5')) : ?>
					<?php dynamic_sidebar('footer-5') ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container container-lg site-footer__social-media">
		<div class="row">
			<div class="col-12 col-lg-4">

				<?php if (!empty($options['social_media'])) : ?>
					<?php foreach ((array) $options['social_media'] as $icon) : ?>
						<a href="<?php echo esc_url($icon['social_link']) ?>">
							<i class="<?php echo $icon['social_icon'] ?>"></i>
						</a>
				<?php endforeach;
				endif;  ?>

				<?php if (!empty($options['copy_txt'])) : ?>
					<div class="copyright-text">
						<span><?php echo $options['copy_txt'] ?></span>
					</div>
				<?php endif;  ?>

			</div>

			<div class="col-12 col-lg-8">
				<div class="footer-logos text-center text-lg-right mt-4 mt-lg-0">
					<div class="row justify-content-center justify-content-lg-end">

						<?php if (!empty($options['footer_logo'])) : ?>
							<?php foreach ((array) $options['footer_logo'] as $single_logo) : ?>
								<img src="<?php echo $single_logo['client_logo']['url'] ?>">
						<?php endforeach;
						endif;  ?>

					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<!-- Modal -->
<div class="modal fade likebar-modal" id="likebar" tabindex="-1" role="dialog" aria-labelledby="likebar" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body js-likebar-body"></div>
		</div>
	</div>
</div>
<script type='text/javascript' id='app-js-extra'>
	/* <![CDATA[ */
	var theme = {
		"ajaxurl": "https:\/\/www.uniflex.se\/wp-json\/theme\/v1\/ajax",
		"assetsurl": "https:\/\/www.uniflex.se\/wp-content\/themes\/uniflex\/assets",
		"job_slug": "\/jobb\/",
		"saved_jobs": "Sparade jobb",
		"saved_searches": "Sparade s\u00f6kningar"
	};
	/* ]]> */
</script>

<?php wp_footer(); ?>

</body>

</html>