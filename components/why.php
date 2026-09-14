  <!-- <?php

        $about_section_var = get_fields();


        ?> -->


  <!-- Why Us Section -->
  <section id="why-us" class="why-us section">

      <div class="container">

          <div class="row g-0">

              <div class="col-xl-5 img-bg" data-aos="fade-up" data-aos-delay="100">
                  <img src="<?php echo $about_section_var['why_us_img']['url'] ?>" alt="<?php echo $about_section_var['why_us_img']['alt']   ?>">
              </div>

              <div class="col-xl-7 slides position-relative" data-aos="fade-up" data-aos-delay="200">

                  <div class="swiper init-swiper">
                      <script type="application/json" class="swiper-config">
                          {
                              "loop": true,
                              "speed": 600,
                              "autoplay": {
                                  "delay": 5000
                              },
                              "slidesPerView": "auto",
                              "centeredSlides": true,
                              "pagination": {
                                  "el": ".swiper-pagination",
                                  "type": "bullets",
                                  "clickable": true
                              },
                              "navigation": {
                                  "nextEl": ".swiper-button-next",
                                  "prevEl": ".swiper-button-prev"
                              }
                          }
                      </script>
                      <div class="swiper-wrapper">

                          <?php
                            if ($about_section_var['slide'] != false) {
                                foreach ($about_section_var['slide'] as $slide) {
                            ?>
                                  <div class="swiper-slide">
                                      <div class="item">
                                          <h3 class="mb-3"><?php echo $slide['title']  ?></h3>
                                          <h4 class="mb-3"><?php echo $slide['subtitle']  ?></h4>
                                          <p><?php echo $slide['description']  ?></p>
                                      </div>
                                  </div><!-- End slide item -->
                          <?php
                                }
                            }


                            ?>














                      </div>
                      <div class="swiper-pagination"></div>
                  </div>

                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
              </div>

          </div>

      </div>

  </section><!-- /Why Us Section -->