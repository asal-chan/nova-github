<?php

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {

    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title' => 'تنظیمات عمومی',
            'menu_title' => 'تنظیمات عمومی',
            'menu_slug'  => 'theme-settings',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ));
    }
});
