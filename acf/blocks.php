<?php

add_action('acf/init', function () {
    $blocks = [
        [
            'name' => 'banner',
            'title' => 'بنر',
            'desc' => 'id=hero',
            'icon' => 'performance',
            'template_file' => 'banner' // this was not told by teacher
        ],
        [
            'name' => 'why',
            'title' => 'چرا ما',
            'desc' => 'id=why-us',
            'icon' => 'visibility',
            'template_file' => 'why' // this was not told bt teacher
        ],
        [
            'name' => 'service',
            'title' => 'سرویسها',
            'desc' => 'id=services',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'call-to-action',
            'title' => 'فراخوانی',
            'desc' => 'id=call-to-action',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'features',
            'title' => 'ویژگی‌ها',
            'desc' => 'id=features',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'recent-posts',
            'title' => 'آخرین بلاگ‌ها',
            'desc' => 'id=recent-posts',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'page-title',
            'title' => 'هدر اصلی صفحات',
            'desc' => '',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'about',
            'title' => 'درباره ما',
            'desc' => 'id = about',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'our-team',
            'title' => 'تیم ما',
            'desc' => 'id = team',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'service-cards',
            'title' => 'کارت سرویسها',
            'desc' => 'id = service-cards',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'testimonials',
            'title' => 'نظرات',
            'desc' => 'id = testimonials',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'portfolio',
            'title' => 'نمونه‌کار',
            'desc' => 'id = portfolio',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'service-details',
            'title' => 'جزئیات خدمت',
            'desc' => 'id = service-details',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'contact',
            'title' => 'تماس با ما',
            'desc' => 'id = contact',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],
        [
            'name' => 'portfolio-details',
            'title' => 'جزئیات نمونه‌کار',
            'desc' => 'id = portfolio-details',
            'icon' => 'performance',
            //'template_file' => 'service' // this was not told bt teacher
        ],



    ];


    foreach ($blocks as $block) {
        acf_register_block_type([
            'name' => $block['name'],
            'title' => $block['title'],
            'description' => $block['desc'],
            'render_template' => get_template_directory() . '/components/' . ($block['template_file'] ?? $block['name']) . '.php',
            'category' => 'layout',
            'icon' => $block['icon'],
            'supports' => [
                'align' => ['wide', 'full'],
                'jsx'   => false, // important for IIS
            ],
        ]);
    }
});
