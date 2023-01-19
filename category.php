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


<section class="component component-blog-posts" data-category="0">
	<div class="container">
		<div class="row">
        <?php
    
            $post_cat = get_terms('category');
            $obj = get_queried_object();
            $cat_slug = $obj->slug;
            $theCatId = get_term_by( 'slug', $cat_slug, 'category' );
            $theCatId = $theCatId->term_id;
            // run query
            query_posts(array( 
                'post_type' => 'post',
                'showposts' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'terms' => $theCatId,
                        'field' => 'term_id',
                    )
                ),
                'orderby' => 'title',
                'order' => 'ASC' 
                )
            );
            
            ?>
            
            <div class="col-12 col-xl-3">
            	<div class="posts-filter-menu">
            		<ul>
            			<?php foreach ($post_cat as $key => $cat) : ?>
            				<li class="<?php echo $cat->term_id == $theCatId ? 'is-active' : '' ?>"><a <?php echo $cat->term_id == $theCatId ? 'style="color:#fff;text-decoration:none;"' : '' ?> href="<?php echo home_url().'/category/'.$cat->slug ?>"><?php echo $cat->name ?></a></li>
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
            		<div class="col-12 text-center"> <button class="btn btn--black js-get-posts">Visa fler blogginl채gg</button>
            		</div>
            	</div>
            
            </div>
		</div>
	</div>
</section>

<?php
get_sidebar();
get_footer();
