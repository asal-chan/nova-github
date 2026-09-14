<?php
if (! defined('ABSPATH')) exit;

if (post_password_required()) {
    return;
}

if (comments_open()) {

    get_template_part('/parts/comment-form');
} else {
?>

    <p class="no_comments">ارسال دیدگاه بسته است</p>

<?php
}
?>

<!-- Comment Form Section -->
<section id="comment-form" class="comment-form section">
    <div class="container">
        <?php
        if (comments_open()) {
        ?>
            <form action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post" id="commentform">

                <h4>ارسال دیدگاه</h4>
                <p>ایمیل شما منتشر نمیشود. مقادیری که با ستاره مشخص شده را پر کنید.</p>
                <?php
                if (is_user_logged_in()) {
                ?>
                    <p class="mb-4">
                        شما به عنوان <a href="<?php echo get_edit_user_link(); ?>"><?php echo wp_get_current_user()->display_name; ?></a>
                        <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account" class="text_danger">برای خارج شدن از حساب کاربری اینجا کلیک کنید</a>
                    </p>
                <?php
                } else {
                ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="author" type="text" class="form-control" placeholder="Your Name*">
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="email" type="text" class="form-control" placeholder="Your Email*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <input name="url" type="text" class="form-control" placeholder="Your Website">
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="row">
                    <div class="col form-group">
                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Post Comment</button>
                </div>
                <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" id="comment_psot_ID">
                <input type="hidden" name="comment_parent" value="0" id="comment_parent">


                <?php
                wp_nonce_field('comment_form', '_wpnonce');
                do_action('comment_form', get_the_ID());
                ?>

            </form>
        <?php
        } else {
        ?>
            <p class="no_comments">ارسال دیدگاه بسته است</p>
        <?php
        }
        ?>


    </div>
</section><!-- /Comment Form Section -->