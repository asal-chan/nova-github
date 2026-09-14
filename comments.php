 <?php
    if (! defined('ABSPATH')) exit;
    ?>

 <!-- Blog Comments Section -->
 <section id="blog-comments" class="blog-comments section">

     <div class="container">

         <h4 class="comments-count"><?php echo esc_html(get_comments_number()); ?> دیدگاه</h4>

         <?php
            global $post;
            $post_id = $post->ID;

            $args = array(
                'post_id' => $post_id,
                'status' => 'approve',
            );
            $comments_query = new WP_Comment_Query();
            $comments = $comments_query->query($args);

            if (! empty($comments)) {
                $user_img = get_field('user_avatar', 'option');
                foreach ($comments as $comment) {
                    if ($comment->comment_parent == 0) {
            ?>
                     <div id="comment-1" class="comment">
                         <div class="d-flex">
                             <div class="comment-img"><img src="<?php echo esc_url($user_img) ?? '' ?>" alt=""></div>
                             <div>
                                 <h5><a href=""><?php echo esc_html($comment->comment_author); ?></a></h5>
                                 <time datetime="<?php echo esc_html($comment->comment_date); ?>"><?php echo esc_html($comment->comment_date); ?></time>
                                 <p>
                                     <?php echo esc_html($comment->comment_content); ?>
                                 </p>
                             </div>
                         </div>
                     </div><!-- End comment #1 -->


                     <?php




                    }

                    $args = array(
                        'parent' => $comment->comment_ID,
                        'status' => 'approve'
                    );

                    $replies = get_comments($args);

                    if ($replies) {
                        foreach ($replies as $reply) {
                        ?>

                         <div id="comment-reply-1" class="comment comment-reply">
                             <div class="d-flex">
                                 <div class="comment-img"><img src="<?php echo esc_url(get_field('user_image', 'user_' . $reply->user_id)['url']) ?? '' ?>" alt=""></div>
                                 <div>
                                     <h5><a href=""><?php echo esc_html($reply->comment_author); ?></a></h5>
                                     <time datetime="<?php echo esc_attr($reply->comment_date); ?>"><?php echo esc_html($reply->comment_date); ?></time>
                                     <p>
                                         <?php echo esc_html($reply->comment_content); ?>
                                     </p>
                                     </p>
                                 </div>
                             </div>


             <?php
                        }
                    }
                }
            }



                ?>
                         </div>
 </section><!-- /Blog Comments Section -->