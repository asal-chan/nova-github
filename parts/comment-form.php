  <section id="comment-form" class="comment-form section">
      <div class="container">
          <?php
            global $req;
            $req = get_option('require_name_email');
            function comment_author_field()
            {
                ob_start();
                global $req;
                $name = "نام شما";
                if ($req) $name .= "*";
            ?>
              <div class="row">
                  <div class="col-md-6 form-group">
                      <input
                          name="author"
                          type="text"
                          class="form-control"
                          placeholder="<?php
                                        if ($req) {
                                            echo esc_attr($name);
                                        }
                                        if (! $req) {
                                            echo esc_attr($name);
                                        }

                                        ?>"
                          required
                          <?php echo $req ? 'required' : ''; ?>>
                      <div class="invalid-feedback">
                          لطفا نام خود را وارد کنید.
                      </div>

                  </div>
              <?php
                return ob_get_clean();
            }

            function comment_email_field()
            {
                ob_start();

                ?>

                  <div class="col-md-6 form-group">
                      <input
                          name="email"
                          type="email"
                          class="form-control"
                          placeholder="Your Email*"
                          required>
                      <div class="invalid-feedback">
                          لطفاً یک ایمیل معتبر وارد کنید.
                      </div>

                  </div>
              </div>


          <?php
                return ob_get_clean();
            }


            function comment_url_field()
            {
                ob_start();
            ?>
              <div class="row">
                  <div class="col form-group">
                      <input
                          name="url"
                          type="text"
                          class="form-control"
                          placeholder="Your Website">
                  </div>
              </div>
          <?php
                return ob_get_clean();
            }
            ?>




          <?php
            $comment_fields = [
                'author' => comment_author_field(),



                'email' => comment_email_field(),



                'url' => comment_url_field()


            ];

            function comment_txt_field()
            {
                ob_start();
            ?>
              <div class="row">
                  <div class="col form-group">
                      <textarea
                          name="comment"
                          class="form-control"
                          placeholder="Your Comment*"
                          required
                          minlength="20"
                          maxlength="400"></textarea>
                      <div class="invalid-feedback">
                          کامنت شما باید بین 20 تا 400 کاراکتر باشد.
                      </div>
                  </div>
              </div>
          <?php
                return ob_get_clean();
            }


            $comment_args = [
                'class_form' => 'comment_form needs-validation',
                'title_reply' => '',
                'comment_notes_before' => '<h4>Post Comment</h4>
                <p>ایمیل شما منتشر نخواهد شد! مقادیری که با ستاره مشخص شده است را پر کنید. * </p>',
                'fields' => $comment_fields,
                'comment_field' => comment_txt_field(),
                'submit_button' => ' <div class="text-center">
                  <button type="submit" class="btn btn-primary">Post Comment</button>
                </div>'

            ];




            comment_form($comment_args);





            ?>


      </div>
  </section><!-- /Comment Form Section -->