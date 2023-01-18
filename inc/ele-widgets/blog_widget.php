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

        $this->add_control(
            'egens_blog_heading_title',
            [
                'label' => esc_html__('Heading Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Uniflex blogg', 'egenslab'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'egens_blog_heading_description',
            [
                'label' => esc_html__('Heading Description', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hur ser landskapet ut för jobbsökande? Vad trendar inom rekrytering, bemanning och HR? Och hur ser en vanlig dag ut för våra anställda? Klicka runt på vår blogg och lär dig mer om bemanning, rekrytering och framtidens medarbetare.', 'egenslab'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $query = new \WP_Query(
            array(
                'post_type'      => 'post',
                'post_status'    => 'publish'
            )
        );

        $post_cat = get_terms('category');
?>

        <div class="container container-lg">
            <div class="row">
                <div class="col-12 md-margin no-margin text-center col-md-10 col-lg-8 medium-column mx-auto">
                    <h1><?php echo (!empty($settings['egens_blog_heading_title']) ? esc_html__($settings['egens_blog_heading_title'], 'egenslab') : '') ?></h1>
                    <div class="entry-content mx-auto">
                        <p><?php echo (!empty($settings['egens_blog_heading_description']) ? wp_kses($settings['egens_blog_heading_description'], wp_kses_allowed_html('post')) : '') ?></p>
                    </div>
                </div>
            </div>
        </div>

        <section class="component component-blog-posts" data-category="0">
            <div class="container">
                <div class="row">
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
                            <?php if ($query->have_posts()) :

                                /* Start the Loop */
                                while ($query->have_posts()) :
                                    $query->the_post(); ?>

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

                            <?php endwhile;
                                wp_reset_postdata();
                            else :

                                echo "No post";

                            endif; ?>
                        </div>

                        <div class="row js-get-posts-container">
                            <div class="col-12 text-center"> <button class="btn btn--black js-get-posts">Visa fler blogginlägg</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>



<?php
    }
}
