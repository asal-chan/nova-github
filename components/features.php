  <?php
    $feature_section_var = get_fields();



    ?>



  <!-- Features Section -->
  <section id="features" class="features section">

      <div class="container">
          <div class="row">
              <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="mb-0"><?php echo nl2br(esc_html($feature_section_var['title']), false); ?></h3>


                  <div class="row gy-4">

                      <?php
                        if ($feature_section_var['items'] != null) {
                            foreach ($feature_section_var['items'] as $item) {
                        ?>

                              <div class="col-md-6">
                                  <div class="icon-list d-flex">
                                      <i class="bi bi-<?php echo esc_attr($item['icon']) ?>" style="color: <?php echo $item['icon_color']  ?>;"></i>
                                      <span><?php echo esc_html($item['feature'])  ?></span>
                                  </div>
                              </div><!-- End Icon List Item-->



                      <?php
                            }
                        }

                        ?>
                  </div>
              </div>
              <div class="col-lg-5 position-relative" data-aos="zoom-out" data-aos-delay="200">
                  <div class="phone-wrap">
                      <img src="<?php echo esc_url($feature_section_var['img_features']['url']) ?? '' ?>" alt="<?php echo $feature_section_var['img_features']['alt'] ?? '' ?>" class="img-fluid">
                  </div>
              </div>
          </div>

      </div>

      <div class="details">
          <div class="container">
              <div class="row">
                  <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                      <h4><?php echo esc_html($feature_section_var['second_title']) ?></h4>
                      <p><?php echo esc_html($feature_section_var['description']) ?></p>
                      <a href="<?php echo $feature_section_var['btn_link']['url'] ?? '' ?>" class="btn-get-started"><?php echo $feature_section_var['btn_link']['title'] ?? '' ?></a>
                  </div>
              </div>
          </div>
      </div>

  </section><!-- /Features Section -->