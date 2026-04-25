<?php
/**
 * Template Name: Hizmetlerimiz
 */
get_header();
?>

<main id="primary" class="site-main">
    
    <section class="form-page-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg-2.jpeg'); min-height: auto; padding: 160px 0 60px;">
        <div class="form-page-overlay"></div>
        <div class="container" style="position: relative; z-index: 2;">
            <h1 class="section-title gs-reveal-up" style="color: #fff; margin-bottom: 20px;">Tüm Hizmetlerimiz</h1>
            <p class="gs-reveal-up" style="max-width: 600px; margin: 0 auto; color: var(--text-muted); font-size: 1.2rem; text-align: center;">
                Sizin için en uygun kurye çözümünü seçin. Hızlı, güvenli ve teknolojik altyapımızla hizmetinizdeyiz.
            </p>
        </div>
    </section>

    <section class="services-section" style="padding-top: 80px;">
        <div class="container">
            
            <!-- WordPress'ten gelen içerik (varsa) -->
            <?php
            while ( have_posts() ) :
                the_post();
                $content = get_the_content();
                if ( ! empty( trim( $content ) ) ) :
            ?>
                <div class="wp-content-area gs-reveal-up" style="margin-bottom: 60px; color: var(--text-muted); font-size: 1.1rem; line-height: 1.8;">
                    <?php the_content(); ?>
                </div>
            <?php 
                endif;
            endwhile;
            ?>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; perspective: 1500px;">
                
                <div class="glass-card service-card-3d gs-reveal-up" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
                    <div class="service-icon"><i class="fa-solid fa-motorcycle"></i></div>
                    <h3>Moto Kurye</h3>
                    <p>İstanbul içi tüm gönderileriniz için hızlı, güvenilir ve ekonomik moto kurye çözümleri. Trafik sorunlarına takılmadan evrak ve paketlerinizi tam zamanında teslim ediyoruz.</p>
                </div>

                <div class="glass-card service-card-3d gs-reveal-up" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2" style="transition-delay: 0.1s;">
                    <div class="service-icon"><i class="fa-solid fa-bolt"></i></div>
                    <h3>Express VIP Kurye</h3>
                    <p>Sadece sizin gönderinize özel atanan kuryemizle express hizmet. Noktadan noktaya en hızlı teslimat garantisi.</p>
                </div>

                <div class="glass-card service-card-3d gs-reveal-up" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2" style="transition-delay: 0.2s;">
                    <div class="service-icon"><i class="fa-solid fa-box-open"></i></div>
                    <h3>E-Ticaret Dağıtımı</h3>
                    <p>E-ticaret sitenizin siparişlerini müşterilerinize aynı gün veya ertesi gün sorunsuz teslim. Kapıda ödeme ve iade toplama desteği.</p>
                </div>

                <div class="glass-card service-card-3d gs-reveal-up" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2" style="transition-delay: 0.3s;">
                    <div class="service-icon"><i class="fa-solid fa-file-contract"></i></div>
                    <h3>Evrak & Sözleşme</h3>
                    <p>Kurumsal firmalar arası ıslak imzalı evrak, sözleşme, fatura ve gümrük belgelerinin güvenli taşınması.</p>
                </div>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
