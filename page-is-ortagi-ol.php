<?php
/**
 * Template Name: İş Ortağı Ol
 */
get_header();
?>

<main id="primary" class="site-main form-page-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/team-3.jpeg');">
    <div class="form-page-overlay"></div>
    <div class="container form-container">
        
        <div class="glass-card gs-reveal" data-tilt data-tilt-max="3" data-tilt-speed="400" data-tilt-perspective="1500" data-tilt-glare data-tilt-max-glare="0.1">
            <h1>İş Ortağı Olun</h1>
            <p class="subtitle">E-ticaret ve kurumsal dağıtım çözümleri için DNZ Express güvencesi. Formu doldurun, size özel teklif sunalım.</p>
            
            <form id="dnz-isortagi-form" class="dnz-ajax-form">
                <?php wp_nonce_field( 'dnz_form_action', 'dnz_nonce' ); ?>
                <input type="hidden" name="form_type" value="isortagi">
                <input type="text" name="bot_field" style="display:none !important;" tabindex="-1" autocomplete="off">
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group gs-reveal-up">
                        <label for="partner-company">Firma Adı *</label>
                        <input type="text" id="partner-company" name="company" class="form-control" required placeholder="Firma Adınız">
                    </div>
                    <div class="form-group gs-reveal-up">
                        <label for="partner-name">Yetkili Kişi *</label>
                        <input type="text" id="partner-name" name="name" class="form-control" required placeholder="Ad Soyad">
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group gs-reveal-up">
                        <label for="partner-phone">Telefon *</label>
                        <input type="tel" id="partner-phone" name="phone" class="form-control" required placeholder="05XX XXX XX XX">
                    </div>
                    <div class="form-group gs-reveal-up">
                        <label for="partner-email">E-posta</label>
                        <input type="email" id="partner-email" name="email" class="form-control" placeholder="ornek@email.com">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div class="form-group gs-reveal-up">
                        <label for="partner-sector">Faaliyet Sektörü *</label>
                        <input type="text" id="partner-sector" name="sector" class="form-control" required placeholder="Ör: E-ticaret, Gıda, Hukuk...">
                    </div>
                    <div class="form-group gs-reveal-up">
                        <label for="partner-volume">Günlük Ortalama Gönderi Hacmi *</label>
                        <select id="partner-volume" name="volume" class="form-control" required>
                            <option value="">Seçiniz...</option>
                            <option value="1-10">1-10 Adet</option>
                            <option value="11-50">11-50 Adet</option>
                            <option value="51-100">51-100 Adet</option>
                            <option value="100+">100+ Adet</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group gs-reveal-up">
                    <label for="partner-message">Talepleriniz & Mesajınız</label>
                    <textarea id="partner-message" name="message" class="form-control" rows="4" placeholder="Detaylı bilgi ve taleplerinizi yazınız..."></textarea>
                </div>
                
                <button type="submit" class="btn submit-btn gs-reveal-up">
                    <span class="btn-text">Kurumsal Başvuruyu Gönder</span>
                    <span class="btn-moto"><i class="fa-solid fa-motorcycle"></i></span>
                </button>
                <div class="form-response"></div>
            </form>
        </div>

    </div>
</main>

<?php get_footer(); ?>
