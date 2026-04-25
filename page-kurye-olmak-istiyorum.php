<?php
/**
 * Template Name: Kurye Olmak İstiyorum
 */
get_header();
?>

<main id="primary" class="site-main form-page-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/team-2.jpeg');">
    <div class="form-page-overlay"></div>
    <div class="container form-container">
        
        <div class="glass-card gs-reveal" data-tilt data-tilt-max="3" data-tilt-speed="400" data-tilt-perspective="1500" data-tilt-glare data-tilt-max-glare="0.1">
            <h1>Kurye Ekibimize Katılın</h1>
            <p class="subtitle">DNZ Express'in hızına hız katmak ve profesyonel ekibimizde yer almak için başvurun.</p>
            
            <form id="dnz-kurye-form" class="dnz-ajax-form">
                <?php wp_nonce_field( 'dnz_form_action', 'dnz_nonce' ); ?>
                <input type="hidden" name="form_type" value="kurye">
                <input type="text" name="bot_field" style="display:none !important;" tabindex="-1" autocomplete="off">
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group gs-reveal-up">
                        <label for="kurye-name">Ad Soyad *</label>
                        <input type="text" id="kurye-name" name="name" class="form-control" required placeholder="Adınız Soyadınız">
                    </div>
                    <div class="form-group gs-reveal-up">
                        <label for="kurye-age">Yaş *</label>
                        <input type="number" id="kurye-age" name="age" class="form-control" required min="18" max="65" placeholder="Yaşınız">
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group gs-reveal-up">
                        <label for="kurye-phone">Telefon *</label>
                        <input type="tel" id="kurye-phone" name="phone" class="form-control" required placeholder="05XX XXX XX XX">
                    </div>
                    <div class="form-group gs-reveal-up">
                        <label for="kurye-email">E-posta *</label>
                        <input type="email" id="kurye-email" name="email" class="form-control" required placeholder="ornek@email.com">
                    </div>
                </div>
                
                <div class="form-group gs-reveal-up">
                    <label for="kurye-experience">İş Tecrübesi *</label>
                    <textarea id="kurye-experience" name="experience" class="form-control" rows="4" required placeholder="Daha önce kuryelik veya teslimat işi yaptınız mı? Kaç yıl tecrübeniz var? Detaylı yazınız..."></textarea>
                </div>
                
                <button type="submit" class="btn submit-btn gs-reveal-up">
                    <span class="btn-text">Başvuruyu Gönder</span>
                    <span class="btn-moto"><i class="fa-solid fa-motorcycle"></i></span>
                </button>
                <div class="form-response"></div>
            </form>
        </div>

    </div>
</main>

<?php get_footer(); ?>
