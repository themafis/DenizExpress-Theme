<?php
/**
 * AJAX Form Handlers for DNZ Express
 * Handles Contact, Courier Application, and Business Partner forms
 * Security: Nonce verification + Honeypot field
 */

function dnz_process_contact_form() {
    // Nonce security check
    if ( ! isset( $_POST['dnz_nonce'] ) || ! wp_verify_nonce( $_POST['dnz_nonce'], 'dnz_form_action' ) ) {
        wp_send_json_error( array( 'message' => 'Güvenlik doğrulaması başarısız.' ) );
    }

    // Honeypot spam check
    if ( ! empty( $_POST['bot_field'] ) ) {
        wp_send_json_error( array( 'message' => 'Spam algılandı.' ) );
    }

    // Rate limiting (simple: 1 submission per 30 seconds per IP)
    $ip = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '' );
    $transient_key = 'dnz_form_' . md5( $ip );
    if ( get_transient( $transient_key ) ) {
        wp_send_json_error( array( 'message' => 'Çok fazla istek gönderdiniz. Lütfen 30 saniye bekleyip tekrar deneyin.' ) );
    }

    // Common fields
    $name      = sanitize_text_field( $_POST['name'] ?? '' );
    $email     = sanitize_email( $_POST['email'] ?? '' );
    $phone     = sanitize_text_field( $_POST['phone'] ?? '' );
    $message   = sanitize_textarea_field( $_POST['message'] ?? '' );
    $form_type = sanitize_text_field( $_POST['form_type'] ?? 'contact' );

    // Validation
    if ( empty( $name ) || empty( $phone ) ) {
        wp_send_json_error( array( 'message' => 'Lütfen zorunlu alanları doldurun.' ) );
    }

    $to = get_option( 'admin_email' );
    $subject = '';
    $body = '';

    // ====================================================
    // CONTACT FORM (Bize Ulaşın)
    // Fields: name, phone, email, message
    // ====================================================
    if ( $form_type === 'contact' ) {
        if ( empty( $message ) ) {
            wp_send_json_error( array( 'message' => 'Lütfen talebinizi / mesajınızı yazınız.' ) );
        }
        $subject = '📩 Yeni İletişim Formu - ' . $name;
        $body  = "━━━━━━━━━━━━━━━━━━━━━━\n";
        $body .= "  YENİ İLETİŞİM FORMU\n";
        $body .= "━━━━━━━━━━━━━━━━━━━━━━\n\n";
        $body .= "Ad Soyad: $name\n";
        $body .= "Telefon: $phone\n";
        $body .= "E-posta: $email\n\n";
        $body .= "Mesaj:\n$message\n";
    }

    // ====================================================
    // COURIER APPLICATION (Kurye Olmak İstiyorum)
    // Fields: name, age, phone, email, experience
    // ====================================================
    elseif ( $form_type === 'kurye' ) {
        $age        = sanitize_text_field( $_POST['age'] ?? '' );
        $experience = sanitize_textarea_field( $_POST['experience'] ?? '' );

        if ( empty( $age ) || empty( $email ) || empty( $experience ) ) {
            wp_send_json_error( array( 'message' => 'Lütfen tüm zorunlu alanları doldurun.' ) );
        }

        $subject = '🏍️ Yeni Kurye Başvurusu - ' . $name;
        $body  = "━━━━━━━━━━━━━━━━━━━━━━\n";
        $body .= "  YENİ KURYE BAŞVURUSU\n";
        $body .= "━━━━━━━━━━━━━━━━━━━━━━\n\n";
        $body .= "Ad Soyad: $name\n";
        $body .= "Yaş: $age\n";
        $body .= "Telefon: $phone\n";
        $body .= "E-posta: $email\n\n";
        $body .= "İş Tecrübesi:\n$experience\n";
    }

    // ====================================================
    // BUSINESS PARTNER (İş Ortağı Ol)
    // Fields: company, name, phone, email, sector, volume, message
    // ====================================================
    elseif ( $form_type === 'isortagi' ) {
        $company = sanitize_text_field( $_POST['company'] ?? '' );
        $sector  = sanitize_text_field( $_POST['sector'] ?? '' );
        $volume  = sanitize_text_field( $_POST['volume'] ?? '' );

        if ( empty( $company ) || empty( $sector ) || empty( $volume ) ) {
            wp_send_json_error( array( 'message' => 'Lütfen tüm zorunlu alanları doldurun.' ) );
        }

        $subject = '🤝 Yeni İş Ortağı Başvurusu - ' . $company;
        $body  = "━━━━━━━━━━━━━━━━━━━━━━━━\n";
        $body .= "  YENİ İŞ ORTAĞI BAŞVURUSU\n";
        $body .= "━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
        $body .= "Firma Adı: $company\n";
        $body .= "Yetkili Kişi: $name\n";
        $body .= "Telefon: $phone\n";
        $body .= "E-posta: $email\n";
        $body .= "Sektör: $sector\n";
        $body .= "Günlük Gönderi Hacmi: $volume\n\n";
        $body .= "Mesaj:\n$message\n";
    }
    else {
        wp_send_json_error( array( 'message' => 'Geçersiz form türü.' ) );
    }

    // Email headers
    $headers = array( 'Content-Type: text/plain; charset=UTF-8' );
    if ( ! empty( $email ) && is_email( $email ) ) {
        $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    }

    // Send email
    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        // Set rate limit
        set_transient( $transient_key, true, 30 );
        wp_send_json_success( array( 'message' => 'Mesajınız başarıyla gönderildi! En kısa sürede dönüş yapacağız. 🚀' ) );
    } else {
        wp_send_json_error( array( 'message' => 'Bir hata oluştu, lütfen daha sonra tekrar deneyin.' ) );
    }
}
add_action( 'wp_ajax_dnz_process_form', 'dnz_process_contact_form' );
add_action( 'wp_ajax_nopriv_dnz_process_form', 'dnz_process_contact_form' );
