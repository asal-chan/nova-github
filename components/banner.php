 <?php

    $hero_section_var = get_fields();


    ?>




 <!-- Hero Section -->
 <section id="hero" class="hero section dark-background">

     <img src="<?php echo $hero_section_var['banner_img']['url']  ?>" alt="" data-aos="fade-in">

     <div class="container">
         <div class="row">
             <div class="col-xl-4">
                 <h1 data-aos="fade-up"><?php echo $hero_section_var['title']   ?></h1>
                 <blockquote data-aos="fade-up" data-aos-delay="100">
                     <p><?php echo $hero_section_var['description']   ?></p>
                 </blockquote>
                 <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                     <a href="<?php echo $hero_section_var['start_btn_link']['url'] ?>" class="btn-get-started"><?php echo $hero_section_var['start_btn_link']['title']    ?></a>
                     <a href="<?php echo $hero_section_var['video_link_address']['url']   ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span><?php echo $hero_section_var['video_link_address']['title']   ?></span></a>
                 </div>
             </div>
         </div>
     </div>

 </section><!-- /Hero Section -->