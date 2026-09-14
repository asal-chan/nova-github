<?php
if (! defined('ABSPATH')) exit;

$portfolio_detail_var = get_fields();

?>
<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper init-swiper">

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
                            }
                        }
                    </script>

                    <div class="swiper-wrapper align-items-center">
                        <?php
                        if (! empty($portfolio_detail_var)) {
                            foreach ($portfolio_detail_var['project_images'] as $item) {
                        ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url($item['image']['url']) ?>" alt="<?php echo esc_attr($item['image']['alt']) ?>">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                    <h3><?php echo esc_html($portfolio_detail_var['project_information']['title']); ?></h3>
                    <ul>
                        <?php

                        if (!empty($portfolio_detail_var['project_information']['project_details'])) {

                            foreach ($portfolio_detail_var['project_information']['project_details'] as $item) {
                        ?>

                                <li>
                                    <strong><?php echo esc_html($item['label']); ?></strong>:

                                    <?php if ($item['type_of_field'] === 'link') : ?>

                                        <a href="<?php echo esc_url($item['value']); ?>">
                                            <?php echo esc_html($item['value']); ?>
                                        </a>

                                    <?php elseif ($item['type_of_field'] === 'date') : ?>

                                        <?php echo esc_html($item['value']); ?>

                                    <?php else : ?>

                                        <?php echo esc_html($item['value']); ?>

                                    <?php endif; ?>

                                </li>

                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                    <h2><?php echo esc_html($portfolio_detail_var['project_description']['title']); ?></h2>
                    <p>
                        <?php echo esc_html($portfolio_detail_var['project_description']['description']); ?>
                    </p>
                </div>
            </div>

        </div>

    </div>

</section><!-- /Portfolio Details Section -->