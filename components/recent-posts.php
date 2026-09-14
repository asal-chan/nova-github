 <?php
    if (! defined('ABSPATH')) exit;
    $recent_posts_section_var = get_fields();






    ?>


 <!-- Recent Posts Section -->
 <section id="recent-posts" class="recent-posts section">
     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
         <h2><?php echo esc_html($recent_posts_section_var['title'])  ?></h2>

     </div><!-- End Section Title -->

     <div class="container">

         <div class="row gy-5">
             <?php

                $recent_posts = new wp_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'post_status' => 'publish'
                ]);

                if ($recent_posts->have_posts()) {
                    while ($recent_posts->have_posts()) {
                        $recent_posts->the_post();


                        $thumbnail_id = get_post_thumbnail_id();
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        if (!$alt) {
                            $alt = get_the_title();
                        }
                ?>
                     <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                         <div class="post-box">
                             <div class="post-img"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="img-fluid" alt="<?php echo esc_attr($alt)  ?>"></div>
                             <div class="meta">
                                 <span class="post-date"><?php echo get_the_date() ?></span>
                                 <span class="post-author"> / <?php the_author() ?></span>
                             </div>
                             <h3 class="post-title"><?php the_title() ?></h3>
                             <p><?php the_excerpt() ?></p>
                             <a href="<?php the_permalink() ?>" class="readmore stretched-link"><span><?php echo $recent_posts_section_var['btn_more'] ?></span><i
                                     class="bi bi-arrow-right"></i></a>
                         </div>
                     </div>
             <?php
                    }
                    wp_reset_postdata();
                }






                ?>







         </div>

     </div>

 </section><!-- /Recent Posts Section -->