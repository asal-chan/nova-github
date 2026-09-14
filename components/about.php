 <?php
    if (! defined('ABSPATH')) exit;
    $about2_section_var = get_fields();






    ?>


 <!-- About Section -->
 <section id="about" class="about section">

     <div class="container">

         <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
             <div class="col-lg-5">
                 <img src="<?php echo esc_attr($about2_section_var['image']['url'] ?? '') ?>" class="img-fluid" alt="<?php echo esc_attr($about2_section_var['image']['alt'] ?? '') ?>">
             </div>
             <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                 <div class="content">
                     <h3><?php echo esc_html($about2_section_var['title']) ?></h3>
                     <p>
                         <?php echo esc_html($about2_section_var['description']) ?>
                     </p>
                     <ul>
                         <?php
                            foreach ($about2_section_var['items'] as $item) {
                            ?>
                             <li><i class="bi bi-<?php echo esc_attr($about2_section_var['icons']) ?>"></i> <span><?php echo esc_html($item['subtitle']) ?></span></li>

                         <?php
                            }
                            ?>




                     </ul>
                 </div>
             </div>
         </div>

     </div>

 </section><!-- /About Section -->