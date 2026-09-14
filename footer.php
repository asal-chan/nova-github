<?php
if (! defined('ABSPATH')) exit;
$company_info = get_field('company_informations', 'option');
$footer_first_col = get_field('first_column', 'option');
$footer_second_col = get_field('second_column', 'option');
$company_social_networks = get_field('company_social_networks', 'option');
?>

<footer id="footer" class="footer light-background">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename"><?php bloginfo('name'); ?></span>
                    </a>
                    <p><?php echo nl2br(esc_html($company_info['company_description'])); ?></p>
                    <div class="social-links d-flex mt-4">

                        <?php if (!empty($company_social_networks)) {
                            foreach ($company_social_networks as $company_social_network) {
                        ?>

                                <a
                                    href="<?php echo esc_url($company_social_network['social_media_link']['url'] ?? ''); ?>"
                                    title="<?php echo esc_attr($company_social_network['social_media_link']['title'] ?? ''); ?>"
                                    target="<?php echo esc_attr($company_social_network['social_media_link']['target'] ?? ''); ?>">
                                    <i class="bi bi-<?php echo esc_attr($company_social_network['icon'] ?? ''); ?>"></i>
                                </a>

                        <?php
                            }
                        } ?>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <?php if ($footer_first_col) {
                    ?>
                        <h4><?php echo esc_html($footer_first_col['title']); ?></h4>
                    <?php
                    }
                    ?>

                    <ul>
                        <?php if ($footer_first_col['links']) {
                            foreach ($footer_first_col['links'] as $link) {
                        ?>
                                <li><a
                                        href="<?php echo esc_url($link['useful_links']['url']) ?>"><?php echo esc_html($link['useful_links']['title']) ?></a></li>
                        <?php
                            }
                        } ?>


                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4><?php echo esc_html($footer_second_col['title']) ?></h4>
                    <ul>
                        <?php if (! empty($footer_second_col['links'])) {
                            foreach ($footer_second_col['links'] as $item) {
                                $link = $item['portfolio_link'];

                        ?>
                                <li><a
                                        href="<?php echo esc_url($link['url']) ?? '' ?>">
                                        <?php echo $link['title'] ?? '' ?></a></li>
                        <?php
                            }
                        } ?>


                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4><?php echo esc_html($company_info['title']) ?></h4>
                    <p><?php echo nl2br(esc_html($company_info['address_section']['company_address'])); ?></p>
                    <p class="mt-4"><strong>شماره تماس:</strong> <a
                            href="tel:<?php echo esc_attr($company_info['phone_number_section']['company_phone_number']); ?>">
                            <?php echo esc_html($company_info['phone_number_section']['company_phone_number']); ?>
                        </a></p>
                    <p><strong>ایمیل:</strong><a href="mailto:<?php echo esc_attr($company_info['company_email_section']['company_email']); ?>">
                            <?php echo esc_html($company_info['company_email_section']['company_email']); ?>
                        </a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="container copyright text-center">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"><?php echo esc_html(get_bloginfo('name')); ?></strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://hardworker.ir">hardworker.ir</a>
        </div>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?php echo get_template_directory_uri()   ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri()   ?>/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo get_template_directory_uri()   ?>/assets/vendor/aos/aos.js"></script>
<script src="<?php echo get_template_directory_uri()   ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo get_template_directory_uri()   ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri()   ?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri()   ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
<script src="<?php echo get_template_directory_uri()   ?>/assets/js/main.js"></script>

</body>
<?php wp_footer();  ?>

</html>