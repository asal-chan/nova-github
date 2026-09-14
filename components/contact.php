  <?php
    if (! defined('ABSPATH')) exit;
    $contact_form_var = get_fields();
    $company_informations = get_field('company_informations', 'option');

    $status = $_GET['status'] ?? '';

    $form_data = $_SESSION['contact_form_data'] ?? [];

    $name = esc_attr($form_data['name'] ?? '');
    $email = esc_attr($form_data['email'] ?? '');
    $subject = esc_attr($form_data['subject'] ?? '');
    $message = $form_data['message'] ?? '';

    unset($_SESSION['contact_form_data']);

    ?>
  <!-- Contact Section -->
  <section id="contact" class="contact section">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

              <div class="col-lg-5">
                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                      <i class="bi bi-<?php echo esc_attr($company_informations['address_section']['icon_address']) ?> flex-shrink-0"></i>
                      <div>
                          <h3>آدرس شرکت</h3>
                          <p><?php echo esc_html($company_informations['address_section']['company_address']) ?></p>
                      </div>
                  </div><!-- End Info Item -->

                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                      <i class="bi bi-<?php echo esc_attr($company_informations['phone_number_section']['phone_icon']) ?> flex-shrink-0"></i>
                      <div>
                          <h3>با ما تماس بگیرید</h3>
                          <p><?php echo esc_html($company_informations['phone_number_section']['company_phone_number']) ?></p>
                      </div>
                  </div><!-- End Info Item -->

                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-<?php echo esc_attr($company_informations['company_email_section']['email_icon']) ?> flex-shrink-0"></i>
                      <div>
                          <h3>ایمیل شرکت</h3>
                          <p><?php echo esc_html($company_informations['company_email_section']['company_email']) ?></p>
                      </div>
                  </div><!-- End Info Item -->

              </div>

              <div class="col-lg-7">
                  <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                      <div class="alert alert-success fade show mb-4" role="alert">
                          <strong><?php echo esc_html('Success!'); ?></strong> <?php echo esc_html('پیام شما ثبت شد.'); ?>
                      </div>
                  <?php endif; ?>
                  <?php if (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
                      <div class="alert alert-warning fade show mb-4" role="alert">
                          <strong><?php echo esc_html('Warning!'); ?></strong> <?php echo esc_html('لطفا مقادیر معتبر در فرم وارد کنید.'); ?>
                      </div>
                  <?php endif; ?>
                  <?php if (isset($_GET['status']) && $_GET['status'] == 'mail_error'): ?>
                      <div class="alert alert-danger fade show mb-4" role="alert">
                          <strong><?php echo esc_html('Error!'); ?></strong> <?php echo esc_html('پیام ثبت نشد. دقایقی دیگر مجددا امتحان کنید.'); ?>
                      </div>
                  <?php endif; ?>



                  <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="needs-validation" novalidate data-aos="fade-up" data-aos-delay="500">
                      <input type="hidden" name="redirect_to" value="<?php echo esc_url(get_permalink()); ?>">
                      <input type="hidden" name="action" value="contact_form">

                      <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>

                      <div class="row gy-4">

                          <div class="col-md-6">
                              <input
                                  type="text"
                                  name="name"
                                  class="form-control"
                                  value="<?php echo $name; ?>"
                                  placeholder="<?php echo esc_attr($contact_form_var['name_title']); ?>"
                                  required
                                  maxlength="30"
                                  minlength="3">
                              <div class="invalid-feedback">
                                  نام و نام‌خانوادگی باید بین 3 تا 30 کاراکتر باشد.
                              </div>
                          </div>

                          <div class="col-md-6 ">
                              <input
                                  type="email"
                                  class="form-control"
                                  name="email"
                                  value="<?php echo $email; ?>"
                                  placeholder="<?php echo esc_attr($contact_form_var['email_title']); ?>"
                                  required>
                              <div class="invalid-feedback">
                                  لطفاً یک ایمیل معتبر وارد کنید.
                              </div>
                          </div>

                          <div class="col-md-12">
                              <input
                                  type="text"
                                  class="form-control"
                                  name="subject"
                                  value="<?php echo $subject; ?>"
                                  placeholder="<?php echo esc_attr($contact_form_var['subject_text']); ?>"
                                  required
                                  maxlength="50"
                                  minlength="5">
                              <div class="invalid-feedback">
                                  موضوع باید بین 5 تا 50 کاراکتر باشد.
                              </div>
                          </div>

                          <div class="col-md-12">
                              <textarea
                                  class="form-control"
                                  name="message" rows="6"
                                  placeholder="<?php echo esc_attr($contact_form_var['message_text']); ?>"
                                  required
                                  maxlength="500"
                                  minlength="10"><?php echo esc_textarea($message); ?></textarea>
                              <div class="invalid-feedback">
                                  پیام باید بین 10 تا 500 کاراکتر باشد.
                              </div>
                          </div>

                          <div class="col-md-12 text-center">







                              <button type="submit"><?php echo esc_html($contact_form_var['send_message_btn']); ?></button>
                          </div>

                      </div>
                  </form>
              </div><!-- End Contact Form -->

          </div>

      </div>

  </section><!-- /Contact Section -->