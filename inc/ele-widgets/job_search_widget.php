<?php
class Elementor_Job_Search_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_job_search_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Job Search', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-search';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'office'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_job_search_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'egens_job_search_heading_title',
            [
                'label' => esc_html__('Title', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Redo att söka lediga jobb?', 'egenslab'),
                'label_block' => true,
            ]
        );

       
        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <section class="component component-columns primary-color-bg skew-bg">
            <div class="container">
                <div class="row js-content-row">
                    <div class="component-column col-12 medium-column">
                        <div class="column-type-wysiwyg">
                            <div class="entry-content">
                                <h2 class="h2--xl" style="text-align: center;"><?php echo (!empty($settings['egens_job_search_heading_title']) ? esc_html__($settings['egens_job_search_heading_title'], 'egenslab') : '') ?></h2>
                                <form role="search" method="get" class="search-form" action="https://www.uniflex.se/jobb/">
                                    <input type="search" name="q" placeholder="Sök på ort, stad eller yrke ..."> <button type="submit"> <i class="icon-search"></i> <span> <b>259</b> jobb </span> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
