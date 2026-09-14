   <?php

    $call_secrion_var = get_fields();
    //var_dump($call_secrion_var);


    ?>


   <!-- Call To Action Section -->
   <section id="call-to-action" class="call-to-action section dark-background">

       <img src="<?php echo $call_secrion_var['img_call']['url'] ?? '' ?>" alt="<?php echo $call_secrion_var['img_call']['alt'] ?? '' ?>">

       <div class="container">
           <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
               <div class="col-xl-10">
                   <div class="text-center">
                       <h3><?php echo $call_secrion_var['title'];  ?></h3>
                       <p><?php echo $call_secrion_var['description']; ?></p>
                       <a class="cta-btn" href="<?php echo $call_secrion_var['btn_link']['url'] ?? '' ?>"><?php echo $call_secrion_var['btn_link']['title'] ?? '' ?></a>
                   </div>
               </div>
           </div>
       </div>

   </section><!-- /Call To Action Section -->