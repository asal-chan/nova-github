   <?php
    if (! defined('ABSPATH')) exit;

    $service_detail_var = get_fields();
    $service_group = get_field('sevice_page_information', 'option');

    ?>

   <!-- Service Details Section -->
   <section id="service-details" class="service-details section">

       <div class="container">

           <div class="row gy-5">

               <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

                   <div class="service-box">
                       <h4><?php echo esc_html($service_detail_var['feature_title'] ?? '') ?></h4>
                       <div class="services-list">
                           <?php

                            if (! empty($service_detail_var['service_feature'])) {
                                foreach ($service_detail_var['service_feature'] as $feature) {
                            ?>

                                   <a href="#" class=""><i class="bi bi-arrow-right-circle"></i><span><?php echo esc_html($feature['feature']) ?></span></a>


                           <?php
                                }
                            }

                            ?>

                       </div>
                   </div><!-- End Services List -->

                   <div class="service-box">
                       <h4><?php echo esc_html($service_detail_var['download_title']) ?></h4>
                       <div class="download-catalog">
                           <?php
                            if (! empty($service_detail_var['download_files'])) {
                                foreach ($service_detail_var['download_files'] as $file) {
                            ?>
                                   <a href="<?php echo esc_url($file['download_file_name']['url']) ?>"><i class="bi bi-<?php echo esc_attr($file['icon']) ?>"></i><span><?php echo esc_html($file['download_file_name']['title']) ?></span></a>
                           <?php
                                }
                            }
                            ?>

                       </div>
                   </div><!-- End Services List -->


                   <div class="help-box d-flex flex-column justify-content-center align-items-center">
                       <i class="bi bi-<?php echo esc_attr($service_group['icon']) ?> help-icon"></i>
                       <h4><?php echo esc_html($service_group['title']) ?></h4>
                       <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span><?php echo esc_html($service_group['phone_number']) ?></span></p>
                       <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="<?php echo esc_url($service_group['email']) ?>"><?php echo esc_html($service_group['email']) ?></a></p>
                   </div>

               </div>

               <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
                   <img src="<?php echo esc_url(get_the_post_thumbnail_url() ?? ''); ?>" alt="<?php echo esc_attr(img_alt(get_the_ID()) ?? ''); ?>" class="img-fluid services-img">
                   <h3><?php echo esc_html($service_detail_var['title']) ?></h3>
                   <p><?php echo wp_kses_post($service_detail_var['description']); ?></p>

               </div>

           </div>
           <div style="margin: 20px 0;">
               <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-primary">
                   همه خدمات
               </a>
           </div>

       </div>

   </section><!-- /Service Details Section -->