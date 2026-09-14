<?php



$blog_id = get_option('page_for_posts');

if ($blog_id) {
    $blog_page = get_post($blog_id);
    if ($blog_page) {
        setup_postdata($blog_page);

        the_content();
        wp_reset_postdata();
    }
}
