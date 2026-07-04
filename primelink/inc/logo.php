<?php
/**
 * PrimeLink – Logo Renderer
 */
defined( 'ABSPATH' ) || exit;

/**
 * Path to the cropped brand logo (generated from canva-logo.png).
 */
function primelink_brand_logo_path() {
    $dir = get_stylesheet_directory() . '/assets/images/';
    $cropped = $dir . 'logo-brand.png';
    if ( file_exists( $cropped ) ) {
        return $cropped;
    }
    $source = $dir . 'canva-logo.png';
    if ( file_exists( $source ) ) {
        return $source;
    }
    return $dir . 'canva logo.png';
}

/**
 * Brand logo image URL with cache-busting version query.
 */
function primelink_brand_logo_url() {
    $path = primelink_brand_logo_path();
    $rel  = str_replace( get_stylesheet_directory(), '', $path );
    $url  = get_stylesheet_directory_uri() . $rel;

    if ( file_exists( $path ) ) {
        $url .= '?v=' . filemtime( $path );
    }

    return $url;
}

/**
 * Output the site logo — always uses the theme Canva PNG (blue text).
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
