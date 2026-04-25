<?php
/**
 * DNZ Express Theme Customizer
 */

function dnz_express_customize_register( $wp_customize ) {

    // Panel: Theme Settings
    $wp_customize->add_panel( 'dnz_theme_options', array(
        'priority'       => 30,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Tema Ayarları', 'dnz-express' ),
        'description'    => __( 'DNZ Express teması için özel ayarlar.', 'dnz-express' ),
    ) );

    // Section: İletişim Bilgileri
    $wp_customize->add_section( 'dnz_contact_section', array(
        'title'    => __( 'İletişim Bilgileri', 'dnz-express' ),
        'panel'    => 'dnz_theme_options',
        'priority' => 10,
    ) );

    // Setting: Phone
    $wp_customize->add_setting( 'dnz_phone_number', array(
        'default'           => '0534 496 17 75',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dnz_phone_number', array(
        'label'   => __( 'Telefon Numarası', 'dnz-express' ),
        'section' => 'dnz_contact_section',
        'type'    => 'text',
    ) );

    // Setting: WhatsApp
    $wp_customize->add_setting( 'dnz_whatsapp_number', array(
        'default'           => '905344961775',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dnz_whatsapp_number', array(
        'label'   => __( 'WhatsApp Numarası (Uluslararası formatta, + olmadan)', 'dnz-express' ),
        'section' => 'dnz_contact_section',
        'type'    => 'text',
    ) );

    // Section: Renkler
    $wp_customize->add_section( 'dnz_colors_section', array(
        'title'    => __( 'Tema Renkleri', 'dnz-express' ),
        'panel'    => 'dnz_theme_options',
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'dnz_primary_color', array(
        'default'           => '#FF6B00',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dnz_primary_color', array(
        'label'   => __( 'Ana Renk (Turuncu)', 'dnz-express' ),
        'section' => 'dnz_colors_section',
    ) ) );

    $wp_customize->add_setting( 'dnz_primary_hover', array(
        'default'           => '#FF8C00',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dnz_primary_hover', array(
        'label'   => __( 'Hover Rengi', 'dnz-express' ),
        'section' => 'dnz_colors_section',
    ) ) );

    // Section: Ana Sayfa Hero
    $wp_customize->add_section( 'dnz_hero_section', array(
        'title'    => __( 'Ana Sayfa Karşılama (Hero)', 'dnz-express' ),
        'panel'    => 'dnz_theme_options',
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'dnz_hero_title', array(
        'default'           => 'Hızlı, Güvenilir, Yanınızda',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dnz_hero_title', array(
        'label'   => __( 'Karşılama Başlığı', 'dnz-express' ),
        'section' => 'dnz_hero_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'dnz_hero_subtitle', array(
        'default'           => 'DNZ Express ile gönderileriniz anında kapınızda.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dnz_hero_subtitle', array(
        'label'   => __( 'Alt Başlık', 'dnz-express' ),
        'section' => 'dnz_hero_section',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'dnz_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dnz_hero_image', array(
        'label'   => __( 'Arka Plan Görseli', 'dnz-express' ),
        'section' => 'dnz_hero_section',
    ) ) );

}
add_action( 'customize_register', 'dnz_express_customize_register' );
