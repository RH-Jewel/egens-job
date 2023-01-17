<?php

$query = new \WP_Query(
    array(
        'post_type'      => 'post',
        'offset'         => 0,
        'post_status'    => 'publish'
    )
);


/**
 * For blog single page.
 */
if (is_single()) : ?>

    <article class="entry-content">
        <div class="col-12">
            <div class="post--meta text-center">
                <?php echo get_the_date('d M, Y'); ?> | <?php echo esc_html(get_the_author()); ?>
            </div>
            <h1 class="text-center"><?php the_title() ?></h1>

            <div class="text-center primary-color-text-color d-flex justify-content-center align-items-center share-page">
                <?php echo esc_html__('Dela sida', 'egenslab') ?>
                <div class="icon-circle">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                        <i class="icon-facebook"></i>
                    </a>
                </div>
                <div class="icon-circle">
                    <a href="https://twitter.com/home?status=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                        <i class="icon-twitter"></i>
                    </a>
                </div>
                <div class="icon-circle">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                        <i class="icon-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php if (has_post_thumbnail()) : ?>
            <div class="col-12 single-post__thumbnail">
                <?php the_post_thumbnail() ?>
            </div>
        <?php endif; ?>

        <div class="col-12 col-md-9 mx-auto">
            <?php the_content() ?>
            <div class="single-post__share-buttons">
                <div class="text-center primary-color-text-color d-flex justify-content-center align-items-center share-page">
                    <?php echo esc_html__('Dela sida', 'egenslab') ?>
                    <div class="icon-circle">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                            <i class="icon-facebook"></i>
                        </a>
                    </div>
                    <div class="icon-circle">
                        <a href="https://twitter.com/home?status=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                            <i class="icon-twitter"></i>
                        </a>
                    </div>
                    <div class="icon-circle">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </article>

<?php endif;

/**
 * For blog index.
 */
if (!is_single()) : ?>


    <div class="container container-lg">
        <div class="row">
            <div class="col-12 md-margin no-margin text-center col-md-10 col-lg-8 medium-column mx-auto">
                <h1><?php echo esc_html__('Uniflex blogg', 'egenslab') ?></h1>
                <div class="entry-content mx-auto">
                    <p><?php echo esc_html__('Hur ser landskapet ut för jobbsökande? Vad trendar inom rekrytering, bemanning och HR? Och hur ser en vanlig dag ut för våra anställda? Klicka runt på vår blogg och lär dig mer om bemanning, rekrytering och framtidens medarbetare.', 'egenslab') ?></p>
                </div>
            </div>
        </div>
    </div>

    <section class="component component-blog-posts" data-category="0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-3">
                    <div class="js-posts-filters">
                        <div class="d-xl-none blog-posts-select">
                            <div class="custom-select position-relative is-hidden entry-content">
                                <span class="active-li js-active-li">
                                    <span class="js-current-office"> Alla kategorier </span> <i class="bi bi-chevron-down"></i>
                                </span>
                                <ul>
                                    <?php $blog_cat = get_terms('category'); ?>

                                    <?php foreach ($blog_cat as $key => $cat) : ?>
                                        <li> <a href="#" data-term-id="<?php echo $cat->slug ?>" class="<?php echo ($key == 0) ? "is-active" : ""; ?>"> <?php echo $cat->name ?> </a> </li>
                                    <?php $key++;
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="posts-filters d-none d-xl-block">

                            <?php foreach ($blog_cat as $key => $cat) : ?>

                                <div> <span class="<?php echo ($key == 0) ? "is-active" : ""; ?>" data-term-id="<?php echo $cat->slug ?>"><?php echo $cat->name ?></span>
                                </div>
                            <?php $key++;
                            endforeach; ?>


                        </div>
                    </div>
                </div>
                <div class="col-12 js-ajax-posts posts-outer-container col-xl-9">
                    <div class="js-spinner text-center d-none">
                        <div class="spinner"></div>
                    </div>
                    <?php foreach ($blog_cat as $key => $value) : ?>
                        <div class="row blog-post-list js-posts-container">
                            <?php
                            $blog_cat = get_posts(
                                array(
                                    'showposts' => -1, //add -1 if you want to show all posts
                                    'post_type' => 'post',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field' => 'slug',
                                            'terms' => $value->slug //pass your term name here
                                        )
                                    )
                                )
                            );
                            ?>

                            <div class="col-12 col-sm-6">
                                <div class="blog-post-list__item">
                                    <div class="post--meta">
                                        <?php echo get_the_date('d M, Y'); ?> • <?php echo esc_html(get_the_author()); ?>
                                    </div>
                                    <div class="entry-content">
                                        <a href="<?php the_permalink() ?>">
                                            <h3 class="black-text-color"><?php the_title() ?></h3>
                                        </a>
                                        <p> <?php
                                            echo substr(get_the_excerpt(), '0', '100');
                                            if (strlen(get_the_excerpt()) > 100) {
                                                echo '…';
                                            }
                                            ?></p>
                                        <a href="<?php the_permalink() ?>" class="link--arrow"><?php echo esc_html__('Läs mer', 'egenslab') ?></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php $key++;
                    endforeach ?>
                    <div class="row js-get-posts-container">
                        <div class="col-12 text-center"> <button class="btn btn--black js-get-posts"><?php echo esc_html__('Visa fler blogginlägg', 'egenslab') ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>