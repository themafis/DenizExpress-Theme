<?php
/**
 * Template Name: Bize Ulaşın
 */
get_header();
?>

<main id="primary" class="site-main form-page-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg-2.jpeg');">
    <div class="form-page-overlay"></div>
    <div class="container form-container">
        
        <div class="glass-card gs-reveal" data-tilt data-tilt-max="5" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <h1>Bize Ulaşın</h1>
            <p class="subtitle">Sorularınız ve talepleriniz için formu doldurun, size en kısa sürede dönüş yapalım.</p>
            
            <form id="dnz-contact-form" class="dnz-ajax-form">
                <?php wp_nonce_field( 'dnz_form_action', 'dnz_nonce' ); ?>
                <input type="hidden" name="form_type" value="contact">
                <input type="text" name="bot_field" style="display:none !important;" tabindex="-1" autocomplete="off">
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group gs-reveal-up">
                        <label for="contact-name">Ad Soyad *</label>
                        <input type="text" id="contact-name" name="name" class="form-control" required placeholder="Adınız Soyadınız">
                    </div>
                    <div class="form-group gs-reveal-up">
                        <label for="contact-phone">Telefon *</label>
                        <input type="tel" id="contact-phone" name="phone" class="form-control" required placeholder="05XX XXX XX XX">
                    </div>
                </div>
                
                <div class="form-group gs-reveal-up">
                    <label for="contact-email">E-posta</label>
                    <input type="email" id="contact-email" name="email" class="form-control" placeholder="ornek@email.com">
                </div>
                
                <div class="form-group gs-reveal-up">
                    <label for="contact-message">Talebiniz / Mesajınız *</label>
                    <textarea id="contact-message" name="message" class="form-control" rows="5" required placeholder="Talebinizi detaylı şekilde yazınız..."></textarea>
                </div>
                
                <button type="submit" class="btn submit-btn gs-reveal-up">
                    <span class="btn-text">Gönder</span>
                    <span class="btn-moto"><i class="fa-solid fa-motorcycle"></i></span>
                </button>
                <div class="form-response"></div>
            </form>
            
            <div class="contact-footer-info gs-reveal-up">
                <div>
                    <i class="fa-solid fa-phone" style="color: var(--primary-color); margin-right: 10px;"></i>
                    <?php echo esc_html( get_theme_mod( 'dnz_phone_number', '0534 496 17 75' ) ); ?>
                </div>
                <div>
                    <i class="fa-solid fa-envelope" style="color: var(--primary-color); margin-right: 10px;"></i>
                    info@dnzexpress.com
                </div>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>
