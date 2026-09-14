<?php
get_header();

echo get_template_part('/parts/pageheader');

$author_id = get_post_field('post_author', get_the_ID());
$author_image = get_field('user_image', 'user_' . $author_id);
$author_image_url = is_array($author_image) && !empty($author_image['url']) ? $author_image['url'] : '';
$author_image_alt = is_array($author_image) && !empty($author_image['alt']) ? $author_image['alt'] : get_the_author();
$author_description = get_the_author_meta('description');
$author_social_links = get_field('social_links', 'user_' . $author_id);

?>

<div class="container">
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">

                    <article class="article">

                        <div class="post-img">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url() ?? '') ?>" alt="<?php echo esc_attr(img_alt(get_the_ID()) ?? '') ?>" class="img-fluid">
                        </div>

                        <h2 class="title"><?php echo esc_html(get_the_title()) ?></h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo esc_html(get_the_author()) ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?php echo esc_url(get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d'))); ?>"><time datetime="<?php echo esc_html(get_the_author('c')) ?>"><?php echo esc_html(get_the_date()) ?></time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html"><?php echo esc_html(get_comments_number()) ?> دیدگاه</a></li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <?php the_content() ?>
                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#"><?php the_category('، ') ?></a></li>
                            </ul>

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#"><?php the_tags('', '، ') ?></a></li>

                            </ul>
                        </div><!-- End meta bottom -->

                    </article>

                </div>
            </section><!-- /Blog Details Section -->

            <!-- Blog Author Section -->
            <section id="blog-author" class="blog-author section">

                <div class="container">
                    <div class="author-container d-flex align-items-center">
                        <img src="<?php echo esc_url($author_image_url) ?>" class="rounded-circle flex-shrink-0" alt="<?php echo esc_attr($author_image_alt) ?>">
                        <div>
                            <h4><?php echo esc_html(get_the_author()); ?></h4>
                            <div class="social-links">

                                <?php

                                if (!empty($author_social_links)) {
                                    foreach ($author_social_links as $link) { ?>
                                        <a href="<?php echo esc_attr($link['link']) ?>"><i class="bi bi-<?php echo esc_attr($link['icon']) ?>"></i></a>
                                <?php
                                    }
                                }




                                ?>


                            </div>
                            <p>
                                <?php echo esc_html($author_description); ?>
                            </p>
                        </div>
                    </div>
                </div>

            </section><!-- /Blog Author Section -->

            <?php comments_template();
            echo get_template_part('./form/comments');

            ?>





        </div>
        <?php echo get_template_part('/parts/sidebar') ?>
    </div>
</div>




<?php
get_footer();
?>