<?php
$service_section_var = get_fields();

?>


<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $service_section_var['title']  ?></h2>
        <p><?php echo $service_section_var['description'] ?></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            <?php
            $services_query = new WP_Query([
                'post_type' => 'service',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'no_found_rows' => true,
            ]);

            if ($services_query->have_posts()) {
                while ($services_query->have_posts()) {
                    $services_query->the_post();
                    $service_fields = get_fields(get_the_ID()) ?: [];


            ?>

                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <?php
                        $service_icon = $service_fields['icon'] ?? '';
                        $service_icon_color = sanitize_hex_color($service_fields['icon_color'] ?? '') ?: '#f57813';
                        ?>
                        <div class="icon flex-shrink-0"><i class="bi bi-<?php echo esc_attr($service_icon); ?>" style="color: <?php echo esc_attr($service_icon_color); ?>;"></i></div>
                        <div>
                            <h4 class="title"><?php the_title();  ?></h4>
                            <p class="description"><?php the_excerpt();  ?></p>
                            <a href="<?php the_permalink();  ?>" class="readmore stretched-link"><span><?php echo $service_section_var['btn_more'] ?></span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>




            <?php    }

                wp_reset_postdata();
            }

            ?>









        </div>

    </div>

</section><!-- /Services Section -->