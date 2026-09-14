<?php
if (! defined('ABSPATH')) exit;
$our_team_section_var = get_fields();



?>

<!-- Team Section -->
<section id="team" class="team section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?php echo esc_html($our_team_section_var['team_title'])  ?></h2>
        <p><?php echo esc_html($our_team_section_var['team_description']) ?></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <?php
            if ($our_team_section_var['people'] != false) {
                foreach ($our_team_section_var['people'] as $person) {
            ?>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="<?php echo esc_attr($person['member_image']['url'] ?? '') ?>" class="img-fluid" alt="<?php echo esc_attr($person['member_image']['alt'] ?? '') ?>">
                                <div class="social">
                                    <?php
                                    if (!empty($person['x_link'])) {
                                    ?>
                                        <a href="<?php echo esc_attr($person['x_link']['url'] ?? '') ?>"><i class="bi bi-twitter-x"></i></a>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (!empty($person['facebook_link'])) {
                                    ?>
                                        <a href="<?php echo esc_attr($person['facebook_link']['url'] ?? '') ?>"><i class="bi bi-facebook"></i></a>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (!empty($person['instagram_link'])) {
                                    ?>
                                        <a href="<?php echo esc_attr($person['instagram_link']['url'] ?? '') ?>"><i class="bi bi-instagram"></i></a>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (!empty($person['linkedin_link'])) {
                                    ?>
                                        <a href="<?php echo esc_attr($person['linkedin_link']['url'] ?? '') ?>"><i class="bi bi-linkedin"></i></a>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="member-info">
                                <h4><?php echo esc_html($person['full_name']) ?></h4>
                                <span><?php echo esc_html($person['position']) ?></span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->


            <?php
                }
            }



            ?>








        </div>

    </div>

</section><!-- /Team Section -->