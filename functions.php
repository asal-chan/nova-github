<?php

require_once get_template_directory() . '/assets/mycodes/speed.php';

if (! defined('ABSPATH')) exit;


require_once get_template_directory() . '/acf/blocks.php';
require_once get_template_directory() . '/acf/post-type.php';
require_once get_template_directory() . '/acf/option-pages.php';


require_once get_template_directory() . '/dependency.php';

register_nav_menu('main-menu', 'منو اصلی');

add_theme_support('post-thumbnails');

add_action('acf/include_field_types', function () {
    require_once get_template_directory() . '/acf/fields/bootstrap-icons.php';
});

require_once get_template_directory() . '/assets/mycodes/myfunctions.php';

require_once get_template_directory() . '/form/contact-form-handler.php';

require_once get_template_directory() . '/assets/mycodes/costumize-panel.php';
