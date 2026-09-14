<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">همه</li>

                <?php
                $terms = get_terms([
                    'taxonomy' => 'portfolio_category',
                    'hide_empty' => false,
                ]);

                if ($terms && ! is_wp_error($terms)) {
                    foreach ($terms as $term) {
                ?>
                        <li data-filter=".filter-<?php echo esc_attr($term->name); ?>"><?php echo esc_html($term->name); ?></li>
                <?php
                    }
                }
                ?>
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                <?php
                $porto = new WP_Query([
                    'post_type' => 'portfolio',
                    'posts_per_page' => -1,
                ]);

                if ($porto->have_posts()) {
                    while ($porto->have_posts()) {
                        $porto->the_post();
                        $thumbnail_id = get_post_thumbnail_id();
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        if (!$alt) {
                            $alt = get_the_title();
                        }

                        $portfolio_cat = get_the_terms(get_the_ID(), 'portfolio_category');
                        $filter_class = '';
                        if ($portfolio_cat && ! is_wp_error($portfolio_cat)) {
                            foreach ($portfolio_cat as $cat) {
                                $filter_class .= 'filter-' . $cat->name . ' ';
                            }
                        }
                ?>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?php echo esc_attr($filter_class); ?>">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" class="img-fluid" alt="<?php echo esc_attr($alt); ?>">
                            <div class="portfolio-info">
                                <h4><?php echo esc_html(get_the_title()); ?></h4>
                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" title="<?php echo esc_attr(get_the_title()); ?>" class="glightbox-single preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                <?php
                    }
                    wp_reset_postdata();
                }
                ?>

            </div><!-- End Portfolio Container -->

        </div>

    </div>

</section><!-- /Portfolio Section -->