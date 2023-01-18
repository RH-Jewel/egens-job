<?php

$post_cat = get_terms('category');

?>

<div class="col-12 col-xl-3">
	<div class="posts-filter-menu">
		<ul>
			<?php foreach ($post_cat as $key => $cat) : ?>
				<li class="<?php echo ($key == 0) ? "is-active" : ""; ?>"><?php echo $cat->name ?></li>
			<?php $key++;
			endforeach; ?>
		</ul>
	</div>
</div>

<div class="col-12 js-ajax-posts posts-outer-container col-xl-9">
	<div class="js-spinner text-center d-none">
		<div class="spinner"></div>
	</div>

	<div class="row blog-post-list js-posts-container">
		<?php if (have_posts()) :

			if (is_home() && !is_front_page()) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
		<?php endif;

			/* Start the Loop */
			while (have_posts()) :
				the_post();
				$format = get_post_format() ?: 'default';
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content', $format);

			endwhile;

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif; ?>
	</div>

	<div class="row js-get-posts-container">
		<div class="col-12 text-center"> <button class="btn btn--black js-get-posts">Visa fler blogginlägg</button>
		</div>
	</div>

</div>