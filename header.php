<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dnz-express' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="container header-container">
            <div class="site-branding">
                <div class="site-logo">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="DNZ Express Logo">
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <nav id="site-navigation" class="main-navigation">
                <?php
                if ( has_nav_menu( 'menu-1' ) ) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        )
                    );
                } else {
                    // Fallback menu if no WordPress menu is set
                    ?>
                    <ul id="primary-menu">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Ana Sayfa</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/hizmetlerimiz' ) ); ?>">Hizmetlerimiz</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/bize-ulasin' ) ); ?>">Bize Ulaşın</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/kurye-olmak-istiyorum' ) ); ?>" class="nav-cta">Kurye Ol</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/is-ortagi-ol' ) ); ?>" class="nav-cta">İş Ortağı Ol</a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>
        </div>
    </header>
