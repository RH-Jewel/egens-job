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

?>

<section class="site-footer black-bg white-text-color">
	<div class="container container-lg">
		<div class="row">
			<div class="col-12 col-lg-9">
				<ul id="menu-sidfotsmeny" class="menu d-flex flex-column flex-lg-row">

					<?php if (is_active_sidebar('footer-1')) : ?>
						<li>
							<?php dynamic_sidebar('footer-1') ?>
						</li>
					<?php endif; ?>

					<li id="menu-item-1304" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1304">
						<a href="hitta-konsulter.html">Hitta konsult</a>
						<ul class="sub-menu">
							<li id="menu-item-1305" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1305"><a href="bemanning-och-rekrytering.html">Bemanning
									&#038; Rekrytering</a></li>
							<li id="menu-item-1307" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1307"><a href="yrkesomraden.html">Yrkesområden</a>
							</li>
							<li id="menu-item-1306" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1306"><a href="sa-gar-det-till.html">Så går det
									till</a></li>
						</ul>
					</li>
					<li id="menu-item-1308" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1308">
						<a href="om-uniflex.html">Om Uniflex</a>
						<ul class="sub-menu">
							<li id="menu-item-1312" class="menu-item menu-item-type-post_type_archive menu-item-object-office menu-item-1312">
								<a href="kontor.html">Våra kontor</a>
							</li>
							<li id="menu-item-1309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1309"><a href="kontakt.html">Kontakta oss</a></li>
							<li id="menu-item-1311" class="show-as-heading menu-item menu-item-type-post_type menu-item-object-page menu-item-1311">
								<a href="uniflex-blogg.html">Bloggen</a>
							</li>
						</ul>
					</li>
					<li id="menu-item-2524" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2524">
						<a>För medarbetare</a>
						<ul class="sub-menu">
							<li id="menu-item-2517" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2517"><a target="_blank" rel="noopener noreferrer" rel="noopener" href="https://uniflex-se.on.intelliplan.eu/">Tidrapportering</a></li>
							<li id="menu-item-2525" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2525"><a href="personalhandbok.html">Personalhandbok</a></li>
							<li id="menu-item-2526" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2526"><a target="_blank" rel="noopener noreferrer" rel="noopener" href="https://outlook.office.com">Webmail</a></li>
							<li id="menu-item-7222" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7222"><a href="mailto:support@uniflex.se">support@uniflex.se</a></li>
							<li id="menu-item-47003" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-47003"><a href="https://whistle.qnister.com/uniflex">Visselblåsa</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="col-12 col-lg-3">
				<div class="entry-content text-center text-lg-left mb-4 mb-lg-0 footer-contact-content">
					<h4>HUVUDKONTOR</h4>
					<p>Arenavägen 41</p>
					<p>121 07 Stockholm-Globen</p>
					<p><a href="tel:08-55536800">08-555 368 00</a></p>
					<p><a style="color: white;" href="mailto:info@uniflex.se">info@uniflex.se</a></p>
					<p>POSTADRESS</p>
					<p>Box 7014</p>
					<p>121 07 Stockholm-Globen</p>
					<p><a href="http://www.uniflex.fi/">Uniflex Finland | </a><a href="http://www.uniflex.no/">Uniflex Norge | </a><a href="polen.html">Uniflex Polen
						</a><!-- OneTrust Cookies Settings button start --><br />
						<!-- OneTrust Cookies Settings button end -->
					</p>
					<p><a href="https://www.poolia.se/">Poolia Sverige</a> | <a href="https://www.qrios.se/">QRIOS</a> | <a href="https://www.piongroup.se/">PION
							Group</a></p>
					<h4><strong><a href="cookie-policy.html" target="_blank" rel="noopener noreferrer" rel="noopener">Cookiepolicy</a> | <a href="https://www.uniflex.se/integritetspolicy/">Integritetspolicy</a></strong></h4>
				</div>
			</div>
		</div>
	</div>

	<div class="container container-lg site-footer__social-media">
		<div class="row">
			<div class="col-12 col-lg-4">

				<a href="https://sv-se.facebook.com/" target="_blank">
					<i class="icon-facebook"></i>
				</a>


				<a href="https://www.linkedin.com/" target="_blank">
					<i class="icon-linkedin"></i>
				</a>


				<a href="https://www.instagram.com/" target="_blank">
					<i class="icon-instagram"></i>
				</a>


				<a href="https://www.youtube.com/" target="_blank">
					<i class="icon-youtube-play"></i>
				</a>

				<div class="copyright-text">
					<span>© 2023 Uniflex Bemanning AB. All rights reserved</span>
				</div>
			</div>

			<div class="col-12 col-lg-8">
				<div class="footer-logos text-center text-lg-right mt-4 mt-lg-0">
					<div class="row justify-content-center justify-content-lg-end">

						<img src="<?php echo get_template_directory_uri() ?>/assets/images/iso-9001-300x300.png">

						<img src="<?php echo get_template_directory_uri() ?>/assets/images/iso-14001-300x300.png">

						<img src="<?php echo get_template_directory_uri() ?>/assets/images/iso-45001-png-300x300.png">

						<img src="<?php echo get_template_directory_uri() ?>/assets/images/bemanningnyy.png">

						<img src="<?php echo get_template_directory_uri() ?>/assets/images/ar2.png">

						<img src="<?php echo get_template_directory_uri() ?>/assets/images/barncancer-png-300x300.png">
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