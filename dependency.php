<?php
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.rtl.min.css',
        [],
        filemtime(get_template_directory() . '/assets/vendor/bootstrap/css/bootstrap.min.css'),
    );


    wp_enqueue_style(
        'booststrap-icons',
        get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css',
        [],
        filemtime(get_template_directory() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css'),
    );

    wp_enqueue_style(
        'aos',
        get_template_directory_uri() . '/assets/vendor/aos/aos.css',
        [],
        filemtime(get_template_directory() . '/assets/vendor/aos/aos.css'),
    );


    wp_enqueue_style(
        'glightbox',
        get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css',
        [],
        filemtime(get_template_directory() . '/assets/vendor/glightbox/css/glightbox.min.css'),
    );


    wp_enqueue_style(
        'swiper-bundle',
        get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css',
        [],
        filemtime(get_template_directory() . '/assets/vendor/swiper/swiper-bundle.min.css'),
    );



    wp_enqueue_style(
        'main-rtl',
        get_template_directory_uri() . '/assets/css/main-rtl.css',
        [],
        filemtime(get_template_directory() . '/assets/css/main-rtl.css'),
    );

    wp_enqueue_style('dashicons');

    wp_enqueue_script(
        'bootstrap-bundle',
        get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
        [],
        filemtime(get_template_directory() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'),
        true,
    );


    // wp_enqueue_script(
    //     'validate',
    //     get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js',
    //     [],
    //     filemtime(get_template_directory() . '/assets/vendor/php-email-form/validate.js'),
    //     true,
    // );



    wp_enqueue_script(
        'form-validation-js',
        get_template_directory_uri() . '/assets/js/form-validation.js',
        [],
        filemtime(get_template_directory() . '/assets/js/form-validation.js'),
        true,
    );




    wp_enqueue_script(
        'aos-js',
        get_template_directory_uri() . '/assets/vendor/aos/aos.js',
        [],
        filemtime(get_template_directory() . '/assets/vendor/aos/aos.js'),
        true,
    );


    wp_enqueue_script(
        'glightbox-js',
        get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js',
        [],
        filemtime(get_template_directory() . '/assets/vendor/glightbox/js/glightbox.min.js'),
        true,
    );





    wp_enqueue_script(
        'imagesloaded',
        get_template_directory_uri() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js',
        [],
        filemtime(get_template_directory() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js'),
        true,
    );



    wp_enqueue_script(
        'isotope',
        get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js',
        [],
        filemtime(get_template_directory() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js'),
        true,
    );


    wp_enqueue_script(
        'swiper-bundle-js',
        get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js',
        [],
        filemtime(get_template_directory() . '/assets/vendor/swiper/swiper-bundle.min.js'),
        true,
    );



    wp_enqueue_script(
        'theme-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true,
    );
});


// add_action('enqueue_block_assets', function () { // for both sides

//     wp_enqueue_style(
//         'swiper-bundle',
//         get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css',
//         [],
//         filemtime(get_template_directory() . '/assets/vendor/swiper/swiper-bundle.min.css'),
//     );



//     wp_enqueue_style(
//         'main',
//         get_template_directory_uri() . '/assets/css/main.css',
//         [],
//         filemtime(get_template_directory() . '/assets/css/main.css'),
//     );


//     wp_enqueue_script(
//         'swiper-bundle-js',
//         get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js',
//         [],
//         filemtime(get_template_directory() . '/assets/vendor/swiper/swiper-bundle.min.js'),
//         true,
//     );
// });

// add_action('enqueue_block_editor_assets', function () {
//     wp_enqueue_script(
//         'main-novaeditor',
//         get_template_directory_uri() . '/assets/editor/editor.js',
//         [],
//         filemtime(get_template_directory() . '/assets/editor/editor.js'),
//         true,
//     );
// });
