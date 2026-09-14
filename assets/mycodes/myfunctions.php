<?php
function img_alt($id)
{
    $thumbnail_id = get_post_thumbnail_id($id);
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    if (!$alt) {
        $alt = get_the_title();
    }

    return $alt;
}

function custom_pagination()
{
    global $wp_query;

    $big = 999999999; // عدد بزرگ برای جایگزینی لینک‌ها

    $links = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_text' => __('<'), // متن برای دکمه قبلی
        'next_text' => __('>'), // متن برای دکمه بعدی

    ));


    if (is_array($links)) {

        foreach ($links as $link) {
            $link = str_replace("span", "a", $link);
            $link = str_replace("page-numbers current", "page-numbers active", $link);

            echo "<li>$link</li>";
        }
    }
}

add_filter('comment_form_fields', 'nova_reorder_comment_fields');

function nova_reorder_comment_fields($fields)
{
    $new_fields = [];

    $new_fields['author']  = $fields['author'];
    $new_fields['email']   = $fields['email'];
    $new_fields['url']     = $fields['url'];
    $new_fields['comment'] = $fields['comment'];

    return $new_fields;
}

// add_action('pre_comment_on_post', function () {
//     if (empty($_POST['my_comment_nonce']) || !wp_verify_nonce($_POST['my_comment_nonce'], 'my_comment_form')) {
//         wp_die('security check failed.', 403);
//     }
// });

// add_action('pre_comment_on_post', function () {

//     var_dump($_POST);
//     exit;
// });

function theme_start_session()
{
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'theme_start_session', 1);

add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});
