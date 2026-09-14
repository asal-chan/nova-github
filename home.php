<?php
get_header();

echo get_template_part('/parts/pageheader');
?>

<div class="container">
    <div class="row">

        <div class="col-lg-8" style="direction: rtl; text-align: right;">

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">

                <div class="container">
                    <div class="row gy-4">

                        <?php

                        if (have_posts()) {
                            while (have_posts()) {

                                the_post();
                        ?>
                                <div class="col-lg-6">
                                    <article>

                                        <div class="post-img">
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" alt="<?php echo img_alt(get_the_ID()) ?>" class="img-fluid">
                                        </div>
                                        <?php

                                        $categories = get_the_category();
                                        $cat_names = [];
                                        if ($categories) {
                                            foreach ($categories as $cat)
                                                $cat_names[] = $cat->name;
                                        }

                                        $writerid = get_the_author_meta('ID');
                                        $author_image = get_field('user_image', 'user_' . $writerid);

                                        ?>
                                        <p class="post-category"><?php echo esc_html(implode(',', $cat_names)) ?></p>

                                        <h2 class="title">
                                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                        </h2>
                                        <p>
                                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                        </p>

                                        <div class="d-flex align-items-center">
                                            <?php if (get_post_type() == 'post') { ?>
                                                <img src="<?php echo esc_url($author_image['url'] ?? '') ?>" alt="<?php echo esc_attr($author_image['alt'] ?? '') ?>" class="img-fluid post-author-img flex-shrink-0">

                                                <div class="post-meta">
                                                    <p class="post-author"><?php the_author() ?></p>
                                                    <p class="post-date">
                                                        <time datetime="<?php echo get_the_date('c') ?>"><?php echo get_the_date() ?></time>
                                                    </p>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->

                            <?php

                            }
                        } else {
                            ?>
                            <p>نتیجه ای یافت نشد</p>
                            <br>
                            <br>
                            <a class="btn btn-primary" href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">بازگشت</a>
                        <?php
                        }


                        ?>






                    </div>
                </div>

            </section><!-- /Blog Posts Section -->

            <!-- Blog Pagination Section -->
            <section id="blog-pagination" class="blog-pagination section">

                <div class="container">
                    <div class="d-flex justify-content-center">
                        <ul>
                            <?php custom_pagination(); ?>
                        </ul>
                    </div>
                </div>

            </section><!-- /Blog Pagination Section -->

        </div>

        <?php echo get_template_part('/parts/sidebar') ?>

    </div>
</div>

<?php
get_footer();
?>