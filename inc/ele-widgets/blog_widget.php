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
        return 'eicon-posts-grid';
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
                                        <span class="js-current-office">Alla kategorier</span>
                                        <i class="icon-arrow-down"></i>
                                    </span>
                                    <ul>
                                        <li>
                                            <a href="#" data-term-id="null">
                                                Alla kategorier </a>
                                        </li>
                                        <li>
                                            <a href="#" data-term-id="203">
                                                Ansökningstips </a>
                                        </li>
                                        <li>
                                            <a href="#" data-term-id="199">
                                                Bemanningsbranchen </a>
                                        </li>
                                        <li>
                                            <a href="#" data-term-id="200">
                                                Jobba på Uniflex </a>
                                        </li>
                                        <li>
                                            <a href="#" data-term-id="1">
                                                Nyheter </a>
                                        </li>
                                        <li>
                                            <a href="#" data-term-id="201">
                                                Rekryteringstips </a>
                                        </li>
                                        <li>
                                            <a href="#" data-term-id="434">
                                                Våra kontor </a>
                                        </li>
                                        <li>
                                            <a href="#" data-term-id="202">
                                                Våra medarbetare </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="posts-filters d-none d-xl-block">
                                <div>
                                    <span class="is-active" data-term-id="null">Alla kategorier</span>
                                </div>
                                <div>
                                    <span class="" data-term-id="203">
                                        Ansökningstips </span>
                                </div>
                                <div>
                                    <span class="" data-term-id="199">
                                        Bemanningsbranchen </span>
                                </div>
                                <div>
                                    <span class="" data-term-id="200">
                                        Jobba på Uniflex </span>
                                </div>
                                <div>
                                    <span class="" data-term-id="1">
                                        Nyheter </span>
                                </div>
                                <div>
                                    <span class="" data-term-id="201">
                                        Rekryteringstips </span>
                                </div>
                                <div>
                                    <span class="" data-term-id="434">
                                        Våra kontor </span>
                                </div>
                                <div>
                                    <span class="" data-term-id="202">
                                        Våra medarbetare </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 js-ajax-posts posts-outer-container col-xl-9">
                        <div class="js-spinner text-center d-none">
                            <div class="spinner"></div>
                        </div>
                        <div class="row blog-post-list js-posts-container">

                            <div class="col-12 col-sm-6">

                                <div class="blog-post-list__item">
                                    <img width="480" height="350" src="../../wwwuniflexse.cdn.triggerfish.cloud/uploads/2023/01/veckans-isak-e1673611574622-480x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" />
                                    <div class="post--meta">
                                        13 jan, 2023 • Nyheter </div>
                                    <div class="entry-content">
                                        <a href="../nyheter/veckans-medarbetare-246/index.html">
                                            <h3 class="black-text-color">Veckans medarbetare</h3>
                                        </a>
                                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i&#8230;</p>
                                        <a href="../nyheter/veckans-medarbetare-246/index.html" class="link--arrow">Läs mer</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">

                                <div class="blog-post-list__item">

                                    <div class="post--meta">
                                        05 jan, 2023 • Nyheter </div>
                                    <div class="entry-content">
                                        <a href="../nyheter/veckans-medarbetare-245/index.html">
                                            <h3 class="black-text-color">Veckans medarbetare</h3>
                                        </a>
                                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i&#8230;</p>
                                        <a href="../nyheter/veckans-medarbetare-245/index.html" class="link--arrow">Läs mer</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="blog-post-list__item">
                                    <img width="480" height="350" src="../../wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/lamija-002veckans-e1671692112661-480x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy" />
                                    <div class="post--meta">
                                        22 dec, 2022 • Nyheter </div>
                                    <div class="entry-content">
                                        <a href="../nyheter/veckans-medarbetare-244/index.html">
                                            <h3 class="black-text-color">Veckans medarbetare</h3>
                                        </a>
                                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i&#8230;</p>
                                        <a href="../nyheter/veckans-medarbetare-244/index.html" class="link--arrow">Läs mer</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">

                                <div class="blog-post-list__item">
                                    <img width="480" height="350" src="../../wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckans-v50-e1671115659396-480x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy" srcset="https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckans-v50-e1671115659396-480x350.jpg 480w, https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckans-v50-e1671115659396-780x570.jpg 780w" sizes="(max-width: 480px) 100vw, 480px" />
                                    <div class="post--meta">
                                        16 dec, 2022 • Nyheter </div>
                                    <div class="entry-content">
                                        <a href="../nyheter/veckans-medarbetare-243/index.html">
                                            <h3 class="black-text-color">Veckans medarbetare</h3>
                                        </a>
                                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i&#8230;</p>
                                        <a href="../nyheter/veckans-medarbetare-243/index.html" class="link--arrow">Läs mer</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">

                                <div class="blog-post-list__item">
                                    <img width="369" height="350" src="../../wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckansmedarbetare-v49-e1670585139214-369x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy" />
                                    <div class="post--meta">
                                        09 dec, 2022 • Nyheter </div>
                                    <div class="entry-content">
                                        <a href="../nyheter/veckans-medarbetare-242/index.html">
                                            <h3 class="black-text-color">Veckans medarbetare</h3>
                                        </a>
                                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i&#8230;</p>
                                        <a href="../nyheter/veckans-medarbetare-242/index.html" class="link--arrow">Läs mer</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">

                                <div class="blog-post-list__item">
                                    <img width="480" height="350" src="../../wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckansmedarbetare-v48-e1669970410628-480x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy" />
                                    <div class="post--meta">
                                        02 dec, 2022 • Nyheter </div>
                                    <div class="entry-content">
                                        <a href="../nyheter/veckans-medarbetare-241/index.html">
                                            <h3 class="black-text-color">Veckans medarbetare</h3>
                                        </a>
                                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i&#8230;</p>
                                        <a href="../nyheter/veckans-medarbetare-241/index.html" class="link--arrow">Läs mer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row js-get-posts-container">
                            <div class="col-12 text-center">
                                <button class="btn btn--black js-get-posts">Visa fler blogginlägg</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



<?php
    }
}
