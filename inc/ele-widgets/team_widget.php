<?php
class Elementor_Team_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'eg_team_widget';
    }

    public function get_title()
    {
        return esc_html__('Eg Team Card', 'egenslab');
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    public function get_categories()
    {
        return ['egens_widgets'];
    }

    public function get_keywords()
    {
        return ['eg', 'team'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'egens_team_general_section',
            [
                'label' => esc_html__('General', 'egenslab'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'egens_team_member_name',
            [
                'label' => esc_html__('Name', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Eskilstuna', 'egenslab'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'egens_team_member_designation',
            [
                'label' => esc_html__('Designation', 'egenslab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'egenslab'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'egens_team_link',
            [
                'label' => esc_html__('Link', 'egenslab'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'egenslab'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => 'https://uniflex.recman.no/register.php ',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'egens_team_member_image',
            [
                'label' => esc_html__('Image', 'egenslab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'egens_team_list',
            [
                'label' => esc_html__('Member List', 'egenslab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'egens_team_member_name' => esc_html__('Borås', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_team_member_name' => esc_html__('Enköping', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_team_member_name' => esc_html__('Eskilstuna', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                    [
                        'egens_team_member_name' => esc_html__('Gävle', 'egenslab'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'egenslab'),
                    ],
                ],
                'title_field' => '{{{ egens_team_member_name }}}',
            ]
        );


        $this->end_controls_section();

        // Content Tab End


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['egens_team_list'];
?>

        <section class="component component-blurbs default-bg">
            <div class="container">
                <div class="row">
                    <?php foreach ($data as $item) : ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 card-wrapper"> <a href="<?php echo (!empty($item['egens_team_link']['url']) ? esc_url($item['egens_team_link']['url']) : '') ?>" title="Helsingborg" class="card d-flex flex-column" target="_blank">
                                <figure class="img-rectangular ratio-container ratio-container-card w-100">
                                    <img width="1600" height="1067" src="<?php echo (!empty($item['egens_team_member_image']['url']) ? esc_url($item['egens_team_member_image']['url']) : '') ?>" class="img-responsive" alt="<?php echo esc_attr__('card-image', 'egenslab') ?>">
                                </figure>
                                <div class="card-body entry-content">
                                    <h3 class="card-title"><?php echo (!empty($item['egens_team_member_name']) ? esc_html__($item['egens_team_member_name'], 'egenslab') : '') ?></h3>
                                    <p><?php echo (!empty($item['egens_team_member_designation']) ? esc_html__($item['egens_team_member_designation'], 'egenslab') : '') ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>



<?php
    }
}
