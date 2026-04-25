    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-widget">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="DNZ Express Logo" style="max-height: 40px; margin-bottom: 20px;">
                    <p><?php echo get_theme_mod( 'dnz_hero_subtitle', 'Müşterilerimize en hızlı, en güvenilir ve en teknolojik kurye deneyimini yaşatmak için 7/24 sahadayız.' ); ?></p>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

                <div class="footer-widget">
                    <h3>Hızlı Menü</h3>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </div>

                <div class="footer-widget">
                    <h3>Bize Ulaşın</h3>
                    <ul class="contact-info">
                        <li><i class="fa-solid fa-phone"></i> <?php echo esc_html( get_theme_mod( 'dnz_phone_number', '0534 496 17 75' ) ); ?></li>
                        <li><i class="fa-solid fa-envelope"></i> info@dnzexpress.com</li>
                        <li><i class="fa-solid fa-location-dot"></i> Merkez Mah. Kurye Sok. No:1, İstanbul</li>
                    </ul>
                </div>
            </div>

            <div class="site-info" style="display: flex; justify-content: center; align-items: center; gap: 10px; flex-wrap: wrap;">
                <span>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. Tüm Hakları Saklıdır.</span>
                <span style="color: rgba(255,255,255,0.2);">|</span>
                <a href="https://github.com/themafis" target="_blank" rel="noopener noreferrer" style="color: var(--primary-color); font-weight: 500; text-transform: lowercase;">powered by themafis</a>
            </div>
        </div>
    </footer>

    <?php 
    $whatsapp = get_theme_mod( 'dnz_whatsapp_number', '905344961775' ); 
    if ( $whatsapp ) :
    ?>
    <a href="https://wa.me/<?php echo esc_attr( $whatsapp ); ?>" class="floating-whatsapp" target="_blank" rel="noopener noreferrer">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
