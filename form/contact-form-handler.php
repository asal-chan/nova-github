<?php

// جلوگیری از دسترسی مستقیم به فایل
if (!defined('ABSPATH')) {
    exit;
}


// اجرای handler وقتی فرم ارسال می‌شود
function handle_contact_form()
{

    // بررسی nonce برای امنیت فرم
    if (
        !isset($_POST['contact_form_nonce']) ||
        !wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')
    ) {
        wp_die('درخواست نامعتبر است.');
    }


    // گرفتن اطلاعات فرم
    $name = isset($_POST['name'])
        ? sanitize_text_field($_POST['name'])
        : '';

    $email = isset($_POST['email'])
        ? sanitize_email($_POST['email'])
        : '';

    $subject = isset($_POST['subject'])
        ? sanitize_text_field($_POST['subject'])
        : '';

    $message = isset($_POST['message'])
        ? sanitize_textarea_field($_POST['message'])
        : '';


    $redirect = esc_url_raw($_POST['redirect_to']);

    $_SESSION['contact_form_data'] = [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ];



    // بررسی اینکه فیلدها خالی نباشند
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        // wp_redirect(add_query_arg('status', 'error', wp_get_referer()));
        wp_safe_redirect(add_query_arg('status', 'error', $redirect));
        exit;
    }


    // بررسی معتبر بودن ایمیل
    if (!is_email($email)) {
        wp_die('لطفاً یک ایمیل معتبر وارد کنید.');
    }


    // ایمیل ادمین سایت  
    $company_informations = get_field('company_informations', 'option');
    //   $admin_email = $company_informations['company_email'];
    $admin_email = $company_informations['company_email_section']['company_email'];


    // محتوای ایمیل
    $email_body = "نام: " . $name . "\n";
    $email_body .= "ایمیل: " . $email . "\n\n";
    $email_body .= "پیام:\n";
    $email_body .= $message;


    // ارسال ایمیل
    $sent = wp_mail(
        $admin_email,
        $subject,
        $email_body,
        array(
            'Reply-To: ' . $name . ' <' . $email . '>'
        )
    );



    // برگشت به صفحه تماس
    if ($sent) {

        wp_safe_redirect(
            add_query_arg(
                'status',
                'success',
                wp_get_referer()
            )
        );
    } else {

        wp_safe_redirect(
            add_query_arg(
                'status',
                'mail_error',
                wp_get_referer()
            )
        );
    }

    exit;
}


// ثبت handler برای کاربران لاگین‌کرده
add_action('admin_post_contact_form', 'handle_contact_form');

// ثبت handler برای کاربران مهمان
add_action('admin_post_nopriv_contact_form', 'handle_contact_form');
