    <div class="col-lg-4 sidebar">
        <?php
        $post_type = get_query_var('post_type');
        ?>
        <div class="widgets-container">

            <!-- Search Widget -->
            <div class="search-widget widget-item">

                <h3 class="widget-title">جستجو</h3>
                <form action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
                    <input type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>">
                    <input type="hidden" name="post_type" value="<?php echo esc_attr($post_type); ?>">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>

            </div><!--/Search Widget -->

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

                <h3 class="widget-title">دسته‌بندی‌ها</h3>
                <ul class="mt-3">
                    <?php

                    if (is_home() || is_singular('post') || is_category()) {

                        $taxonomy = 'category';
                    } elseif ($post_type === 'service') {

                        $taxonomy = 'service_category';
                    } elseif ($post_type === 'portfolio') {

                        $taxonomy = 'portfolio_category';
                    } else {

                        $taxonomy = '';
                    }


                    if ($taxonomy) {

                        $categories_list = get_terms(array(
                            'taxonomy'   => $taxonomy,
                            'orderby'    => 'name',
                            'order'      => 'DESC',
                            'hide_empty' => true,
                        ));

                        if (!is_wp_error($categories_list) && !empty($categories_list)) {

                            foreach ($categories_list as $cat) {

                    ?>

                                <li>
                                    <a href="<?php echo esc_url(get_term_link($cat)); ?>">
                                        <?php echo esc_html($cat->name); ?>
                                        <span>(<?php echo esc_html($cat->count); ?>)</span>
                                    </a>
                                </li>

                    <?php

                            }
                        }
                    }
                    ?>
                </ul>

            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

                <h3 class="widget-title">پست‌های اخیر</h3>
                <?php
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 5,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($recent_posts->have_posts()) {
                    while ($recent_posts->have_posts()) {
                        $recent_posts->the_post();
                ?>
                        <div class="post-item">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url() ?? '') ?>" alt="<?php echo esc_url(img_alt(get_the_ID())) ?>" class="flex-shrink-0">
                            <div>
                                <h4><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo esc_html(get_the_title()) ?></a></h4>
                                <time datetime="<?php echo esc_html(get_the_date('c')) ?>"><?php echo esc_html(get_the_date()) ?></time>
                            </div>
                        </div><!-- End recent post item-->

                <?php
                    }
                }
                ?>



            </div><!--/Recent Posts Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

                <h3 class="widget-title">Tags</h3>
                <ul>
                    <?php

                    $tags = get_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                    ?>
                            <li><a href="<?php echo esc_url(get_tag_link($tag->term_id)) ?>"><?php echo esc_html($tag->name) ?></a></li>
                    <?php
                        }
                    }


                    ?>


                </ul>

            </div><!--/Tags Widget -->

        </div>

    </div>