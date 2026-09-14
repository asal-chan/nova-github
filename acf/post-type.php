<?php
add_action('init', function () {
    register_post_type('service', [
        'labels' => [
            'name' => 'خدمات',
            'singular_name' => 'خدمت',
            'add_new_item' => 'افزودن خدمت',
            'edit_item' => 'ویرایش خدمت',
            'menu_name' => 'خدمات'
        ],
        'public' => true,
        'menu_icon' => 'dashicons-admin-tools',
        'has_archive' => true,
        'rewrite' => ['slug' => 'services'],
        'supports' => ['title', 'thumbnail', 'editor', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_post_type('portfolio', [
        'labels' => [
            'name'          => 'نمونه کارها',
            'singular_name' => 'نمونه کار',
            'add_new_item'  => 'افزودن نمونه کار',
            'edit_item'     => 'ویرایش نمونه کار',
            'menu_name'     => 'نمونه کارها',

        ],

        'public'       => true,
        'menu_icon'    => 'dashicons-portfolio',
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'portfolios'],

        'supports'     => ['title', 'thumbnail', 'editor', 'excerpt'],
        'show_in_rest' => true,
        'taxonomies' => array('portfolio_category'),
    ]);
});

function create_portfolio_taxonomy()
{
    $labels = array(
        'name' => 'دسته‌بندی نمونه کار',
        'singular_name' => 'دسته نمونه کار',
        'search_items' => 'جستجوی دسته‌ها',
        'all_items' => 'همه دسته‌ها',
        'edit_item' => 'ویرایش دسته',
        'update_item' => 'بروزرسانی دسته',
        'add_new_item'      => 'افزودن دسته جدید',
        'new_item_name' => 'نام دسته جدید',
        'menu_name' => 'دسته‌بندی نمونه کار'
    );

    register_taxonomy('portfolio_category', array('portfolio'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio-category'),
        'show_in_rest' => true,
    ));
}

add_action('init', 'create_portfolio_taxonomy');

function create_service_taxonomy()
{
    $labels = array(
        'name' => 'دسته‌بندی خدمت ',
        'singular_name' => 'دسته خدمت ',
        'search_items' => 'جستجوی دسته‌ها',
        'all_items' => 'همه دسته‌ها',
        'edit_item' => 'ویرایش دسته',
        'update_item' => 'بروزرسانی دسته',
        'add_new_item'      => 'افزودن دسته جدید',
        'new_item_name' => 'نام دسته جدید',
        'menu_name' => 'دسته‌بندی  خدمات'
    );

    register_taxonomy('service_category', array('service'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service-category'),
        'show_in_rest' => true,
    ));
}

add_action('init', 'create_service_taxonomy');
