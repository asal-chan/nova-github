  <?php
    if (! defined('ABSPATH')) exit;
    $service_cards_section_var = get_fields();

    ?>



  <!-- Service Cards Section -->

  <section id="service-cards" class="service-cards section">

      <div class="container-fluid">

          <div class="row gy-4">
              <?php

                foreach ($service_cards_section_var['cards'] as $card) {
                ?>


                  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                      <div class="card-item">
                          <div class="row">
                              <div class="col-xl-5">
                                  <div class="card-bg"><img src="<?php echo esc_attr($card['card_image']['url'] ?? '') ?>" alt="<?php echo esc_attr($card['card_image']['alt'] ?? '') ?>"></div>
                              </div>
                              <div class="col-xl-7 d-flex align-items-center">
                                  <div class="card-body">
                                      <h4 class="card-title"><?php echo esc_html($card['card_title']) ?></h4>
                                      <p><?php echo esc_html($card['card_description']) ?></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!-- End Card Item -->

              <?php
                }



                ?>







          </div>

      </div>

  </section><!-- /Service Cards Section -->