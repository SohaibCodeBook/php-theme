<?php
/**
 * PrimeLink – Logo Renderer
 */
defined( 'ABSPATH' ) || exit;

/**
 * Brand logo image URL (cropped from theme assets).
 */
function primelink_brand_logo_url() {
    return get_template_directory_uri() . '/assets/images/logo-brand.png';
}

/**
 * Output the site logo — always uses the theme brand PNG (blue text).
 *
 * @param string $context 'header' | 'footer'
 */
function primelink_the_logo( $context = 'header' ) {
    $class = 'pl-brand-logo pl-brand-logo--' . esc_attr( $context );
    $alt   = esc_attr( get_bloginfo( 'name' ) );

    printf(
        '<img src="%s" alt="%s" class="%s" loading="eager" decoding="async">',
        esc_url( primelink_brand_logo_url() ),
        $alt,
        esc_attr( $class )
    );
}
