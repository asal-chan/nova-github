 <?php
    if (! defined('ABSPATH')) exit;
    $page_title_section_var = get_fields();

    ?>


 <!-- Page Title -->
 <div class="page-title dark-background" data-aos="fade" style="background-image: url(<?php echo esc_url($page_title_section_var['image']) ?>);">
     <div class="container">
         <h1><?php echo esc_html(get_the_title()); ?></h1>
     </div>
 </div><!-- End Page Title -->