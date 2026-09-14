<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Nova Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?php echo get_template_directory_uri()   ?>/assets/img/favicon.png" rel="icon">
    <link href="<?php echo get_template_directory_uri()   ?>/assets/img/apple-touch-icon2.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo get_template_directory_uri()   ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri()   ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri()   ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri()   ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri()   ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?php echo get_template_directory_uri()   ?>/assets/css/main-rtl.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Nova
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <?php wp_head(); ?>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename"><?php echo esc_attr(bloginfo('name')) ?></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <?php

                $menu_name = 'main-menu'; // نام یا مکان فهرست
                $locations = get_nav_menu_locations();
                $menu_id = $locations[$menu_name];


                $menu_items = wp_get_nav_menu_items($menu_id);





                if ($menu_items) {
                    // ایجاد یک آرایه برای نگهداری آیتم‌ها بر اساس والد
                    $menu_tree = [];

                    // سازماندهی آیتم‌ها در آرایه‌ای بر اساس والدشان

                    foreach ($menu_items as $item) {
                        $menu_tree[$item->menu_item_parent][] = $item;
                    }




                    // تابع بازگشتی برای ساختن منو
                    function build_menu($parent_id, $menu_tree)
                    {

                        echo '<ul>';

                        foreach ($menu_tree[$parent_id] as $item) {

                            $activclass = "";

                            if ($item->url == get_permalink()) {
                                $activclass = "active";
                            }


                            if (isset($menu_tree[$item->ID])) {
                                echo '<li  class="dropdown"><a class="' . $activclass . '"  href="' . $item->url . '"><i class="bi bi-chevron-down toggle-dropdown"></i>' . $item->title . '</a>';
                                build_menu($item->ID, $menu_tree);
                            } else {
                                echo '<li><a class="' . $activclass . '"  href="' . $item->url . '">' . $item->title . '</a>';
                            }

                            // اگر این آیتم فرزند دارد، تابع را دوباره اجرا کن

                            echo '</li>';
                        }
                        echo '</ul>';
                    }

                    // ساخت منوی اصلی (والدهای سطح بالا)

                    build_menu(0, $menu_tree); // سطح والد 0 یعنی آیتم‌های اصلی

                } else {
                    echo 'فهرستی یافت نشد.';
                }

                ?>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

</body>

</html>