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

    <div class="single-post-container">
        <div class="container">
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
                                <i class="bi bi-facebook"></i>
                            </a>
                        </div>
                        <div class="icon-circle">
                            <a href="https://twitter.com/home?status=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                        <div class="icon-circle">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                                <i class="bi bi-linkedin"></i>
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
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </div>
                            <div class="icon-circle">
                                <a href="https://twitter.com/home?status=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                                    <i class="bi bi-twitter"></i>
                                </a>
                            </div>
                            <div class="icon-circle">
                                <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </article>
        </div>
    </div>

<?php endif;

/**
 * For blog index.
 */
if (!is_single()) : ?>

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

<?php endif; ?>