<?php
/**
 * DNZ Express Front Page Template
 */

get_header();

$hero_title    = get_theme_mod( 'dnz_hero_title', 'Hızlı, Güvenilir, Yanınızda.' );
$hero_subtitle = get_theme_mod( 'dnz_hero_subtitle', 'DNZ Express ile gönderileriniz anında kapınızda. Profesyonel ekibimiz ve geniş motor ağımızla İstanbul\'un her noktasına en hızlı çözümü sunuyoruz.' );
$hero_bg       = get_theme_mod( 'dnz_hero_image', get_template_directory_uri() . '/assets/img/hero-bg-2.jpeg' );
?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section id="hero" class="hero-section" style="<?php if($hero_bg) echo 'background-image: url(' . esc_url($hero_bg) . ');'; ?>">
        <canvas id="hero-3d-canvas"></canvas>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge"><span class="pulse-dot"></span> 7/24 Kesintisiz Hizmet</div>
                <h1><?php echo esc_html( $hero_title ); ?></h1>
                <p><?php echo esc_html( $hero_subtitle ); ?></p>
                <div class="hero-buttons">
                    <a href="<?php echo esc_url( home_url( '/kurye-olmak-istiyorum' ) ); ?>" class="btn">Kurye Ol <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></a>
                    <a href="<?php echo esc_url( home_url( '/hizmetlerimiz' ) ); ?>" class="btn btn-outline">Hizmetlerimizi İncele</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="services-section" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg-2.jpeg') center/cover; position: relative;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at center, rgba(11,12,16,0.85) 0%, rgba(11,12,16,0.98) 100%); z-index: 1;"></div>
        <div class="container" style="position: relative; z-index: 2;">
            <h2 class="section-title gs-reveal-up">Profesyonel Çözümler</h2>
            <div class="services-grid" style="perspective: 1500px;">
                <div class="glass-card service-card-3d gs-reveal-up" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
                    <div class="service-icon"><i class="fa-solid fa-motorcycle"></i></div>
                    <h3>Moto Kurye</h3>
                    <p>Gün içi acil evrak ve paket teslimatlarınız için hızlı, güvenilir ve ekonomik moto kurye hizmeti. Trafiğe takılmadan zamanında teslimat garantisi.</p>
                </div>
                <div class="glass-card service-card-3d gs-reveal-up" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2" style="transition-delay: 0.1s;">
                    <div class="service-icon"><i class="fa-solid fa-bolt"></i></div>
                    <h3>Express VIP</h3>
                    <p>Vakit kaybına tahammülünüz yoksa express hizmetimizle dakikalar içinde kapınızdayız. Noktadan noktaya sadece size özel atanan kurye ayrıcalığı.</p>
                </div>
                <div class="glass-card service-card-3d gs-reveal-up" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2" style="transition-delay: 0.2s;">
                    <div class="service-icon"><i class="fa-solid fa-box-open"></i></div>
                    <h3>E-Ticaret Dağıtımı</h3>
                    <p>İşletmenizin siparişlerini güvenle müşterilerinize ulaştırıyoruz. Esnek teslimat modelleriyle e-ticaret sitenizin gücüne güç katın.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number" data-target="10000" data-suffix="+">0</div>
                    <div class="stat-text">Aylık Teslimat</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="150" data-suffix="+">0</div>
                    <div class="stat-text">Mutlu İş Ortağı</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="35" data-suffix="+">0</div>
                    <div class="stat-text">Uzman Kurye</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="99" data-prefix="%">0</div>
                    <div class="stat-text">Zamanında Teslim</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <h2 class="section-title">Sahadan Kareler</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team-1.jpeg" alt="DNZ Express Sahada">
                    <div class="gallery-overlay">
                        <h4>Modern Filo</h4>
                        <p>Tüm motosikletlerimiz düzenli bakımlı ve yeni nesil.</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team-2.jpeg" alt="DNZ Express Ekip">
                    <div class="gallery-overlay">
                        <h4>Güvenli Taşıma</h4>
                        <p>Özel korumalı çantalar ile gönderileriniz zarar görmez.</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team-3.jpeg" alt="DNZ Express Kurye">
                    <div class="gallery-overlay">
                        <h4>Profesyonel Ekip</h4>
                        <p>Güler yüzlü ve deneyimli sürücülerle her an yanınızdayız.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Split Section -->
    <section class="cta-split-section">
        <a href="<?php echo esc_url( home_url( '/kurye-olmak-istiyorum' ) ); ?>" class="cta-split-card cta-split-kurye gs-reveal-up">
            <div class="cta-split-icon"><i class="fa-solid fa-motorcycle"></i></div>
            <div class="cta-split-content">
                <h3>Kurye Olmak İstiyorum</h3>
                <p>Ekibimize katıl, esnek çalış, kazanmaya başla. Hemen başvuru formunu doldur.</p>
                <span class="cta-split-btn">Başvur <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <div class="cta-split-glow"></div>
        </a>
        <a href="<?php echo esc_url( home_url( '/is-ortagi-ol' ) ); ?>" class="cta-split-card cta-split-isortagi gs-reveal-up">
            <div class="cta-split-icon"><i class="fa-solid fa-handshake"></i></div>
            <div class="cta-split-content">
                <h3>İş Ortağı Ol</h3>
                <p>İşletmeni büyüt, teslimatlarını bize bırak. Kurumsal çözümlerimizi keşfet.</p>
                <span class="cta-split-btn">İletişime Geç <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <div class="cta-split-glow"></div>
        </a>
    </section>

</main>

<?php get_footer(); ?>
