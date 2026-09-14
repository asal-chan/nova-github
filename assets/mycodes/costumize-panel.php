<?php
function nova_customize_register($wp_customize)
{
    $fonts_list = [
        'Vazir'     => 'وزیر',
        'Roboto'    => 'روبوتو',
        'Montserrat' => 'Montserrat',
        'bKoodak'     => 'بی‌کودک',
        'nastaliq' => 'نستعلیق',
    ];

    $wp_customize->add_section('site_fonts', array(
        'title'    => 'فونت سایت',
        'priority' => 30,
    ));


    $wp_customize->add_setting('site_font', array(
        'default'           => 'Vazir',
        'sanitize_callback' => 'sanitize_text_field',
    ));


    $wp_customize->add_control('site_font', array(
        'label'   => 'فونت اصلی سایت',
        'section' => 'site_fonts',
        'type'    => 'select',
        'choices' => $fonts_list,
    ));

    $wp_customize->add_setting('heading_font', array(
        'default'           => 'Vazir',
        'sanitize_callback' => 'sanitize_text_field',
    ));


    $wp_customize->add_control('heading_font', array(
        'label'   => 'فونت تیتر‌ها ',
        'section' => 'site_fonts',
        'type'    => 'select',
        'choices' => $fonts_list,
    ));

    $wp_customize->add_setting('menu_font', array(
        'default'           => 'Vazir',
        'sanitize_callback' => 'sanitize_text_field',
    ));


    $wp_customize->add_control('menu_font', array(
        'label'   => 'فونت منو‌ها ',
        'section' => 'site_fonts',
        'type'    => 'select',
        'choices' => $fonts_list,
    ));
}

function nova_custom_font_css()
{

    $site_font = get_theme_mod('site_font', 'Vazir');
    $heading_site_font = get_theme_mod('heading_font', 'Vazir');
    $nav_site_font = get_theme_mod('menu_font', 'Vazir');

?>

    <style>
        :root {
            --site-font: "<?php echo esc_attr($site_font); ?>";
            --heading-site-font: "<?php echo esc_attr($heading_site_font); ?>";
            --nav-site-font: "<?php echo esc_attr($nav_site_font); ?>";
        }
    </style>

<?php
}


add_action('customize_register', 'nova_customize_register');
add_action('wp_head', 'nova_custom_font_css');
