<?php
/**
 * 404 - Page Not Found
 */
get_header();
?>

<main id="primary" class="site-main">
    <section class="form-page-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg-2.jpeg'); min-height: 100vh; display: flex; align-items: center;">
        <div class="form-page-overlay"></div>
        <div class="container" style="position: relative; z-index: 2; text-align: center;">
            <div class="gs-reveal-up">
                <h1 style="font-size: 10rem; font-weight: 900; background: linear-gradient(135deg, var(--primary-color), var(--primary-hover)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; line-height: 1; margin-bottom: 10px;">404</h1>
                <h2 style="font-size: 2rem; color: #fff; margin-bottom: 20px;">Sayfa Bulunamadı</h2>
                <p style="font-size: 1.1rem; color: var(--text-muted); margin-bottom: 40px; max-width: 500px; margin-left: auto; margin-right: auto;">
                    Aradığınız sayfa silinmiş, adı değiştirilmiş veya geçici olarak ulaşılamıyor olabilir.
                </p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn" style="padding: 15px 40px; font-size: 1.1rem;">
                    <i class="fa-solid fa-house" style="margin-right: 10px;"></i> Ana Sayfaya Dön
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
