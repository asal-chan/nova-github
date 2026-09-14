 <?php
    if (! defined('ABSPATH')) exit;
    $testimonials_section_var = get_fields();



    ?>


 <!-- Testimonials Section -->
 <section id="testimonials" class="testimonials section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
         <h2><?php echo esc_html($testimonials_section_var['testimonials_title']) ?></h2>
         <p><?php echo esc_html($testimonials_section_var['testimonials_description']) ?></p>
     </div><!-- End Section Title -->

     <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="swiper init-swiper">
             <script type="application/json" class="swiper-config">
                 {
                     "loop": true,
                     "speed": 600,
                     "autoplay": {
                         "delay": 5000
                     },
                     "slidesPerView": "auto",
                     "pagination": {
                         "el": ".swiper-pagination",
                         "type": "bullets",
                         "clickable": true
                     },
                     "breakpoints": {
                         "320": {
                             "slidesPerView": 1,
                             "spaceBetween": 40
                         },
                         "1200": {
                             "slidesPerView": 3,
                             "spaceBetween": 1
                         }
                     }
                 }
             </script>
             <div class="swiper-wrapper">

                 <?php
                    if (! empty($testimonials_section_var['testimonials'])) {
                        foreach ($testimonials_section_var['testimonials'] as $testimonial) {
                    ?>

                         <div class="swiper-slide">
                             <div class="testimonial-item">
                                 <div class="stars">
                                     <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                 </div>
                                 <p>
                                     <?php echo esc_html($testimonial['quote']) ?>
                                 </p>
                                 <div class="profile mt-auto">
                                     <img src="<?php echo esc_html($testimonial['image']['url'] ?? '') ?>" class="testimonial-img" alt="<?php echo esc_html($testimonial['image']['alt'] ?? '') ?>">
                                     <h3><?php echo esc_html($testimonial['full_name']) ?> </h3>
                                     <h4><?php echo esc_html($testimonial['postition']) ?></h4>
                                 </div>
                             </div>
                         </div><!-- End testimonial item -->
                 <?php
                        }
                    }
                    ?>


             </div>
             <div class="swiper-pagination"></div>
         </div>

     </div>

 </section><!-- /Testimonials Section -->