<?php
class Elementor_Blog_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_blog_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Blog', 'egenslab');
    }

    public function get_icon()
    {
        return ' eicon-post-list';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'blog'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_blog_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );




        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <section class="component component-blog-posts" data-category="0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-3">
                        <div class="js-posts-filters">
                            <div class="d-xl-none blog-posts-select">
                                <div class="custom-select position-relative is-hidden entry-content">
                                    <span class="active-li js-active-li">
                                        <span class="js-current-office"><?php echo esc_html__('Alla kategorier', 'egenslab') ?></span>
                                        <i class="bi bi-chevron-down"></i>
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
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } ?>
                                        <div class="post--meta">
                                            <?php echo get_the_date('d M, Y'); ?> • <?php echo esc_html(get_the_author()); ?> </div>
                                        <div class="entry-content">
                                            <a href="../nyheter/veckans-medarbetare-246/index.html">
                                                <h3 class="black-text-color"><?php the_title() ?></h3>
                                            </a>
                                            <p>
                                                <?php echo substr(get_the_excerpt(), '0', '100');
                                                if (strlen(get_the_excerpt()) > 100) {
                                                    echo '…';
                                                }
                                                ?>
                                            </p>
                                            <a href="<?php the_permalink() ?>" class="link--arrow"><?php echo esc_html__('Läs mer', 'egenslab') ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php $key++;
                        endforeach ?>
                            </div>
                            <div class="row js-get-posts-container">
                                <div class="col-12 text-center">
                                    <button class="btn btn--black js-get-posts"><?php echo esc_html__('Visa fler blogginlägg', 'egenslab') ?></button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>



<?php
    }
}
