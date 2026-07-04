<?php
/**
 * PrimeLink – Search / SEO meta (title + description for Google).
 */
defined( 'ABSPATH' ) || exit;

/**
 * Default SEO strings used when WordPress options are empty or lowercase.
 */
function primelink_seo_defaults() {
    return [
        'title'       => 'Ceylon primelink holdings',
        'description' => 'Ceylon PrimeLink Holdings is a Sri Lankan multi-sector company delivering engineering, geotechnical, GIS, construction, software, and IT solutions.',
    ];
}

function primelink_seo_title() {
    $custom = get_theme_mod( 'primelink_seo_title', '' );
    if ( $custom !== '' ) {
        return $custom;
    }
    return primelink_seo_defaults()['title'];
}

function primelink_seo_description() {
    $custom = get_theme_mod( 'primelink_seo_description', '' );
    if ( $custom !== '' ) {
        return $custom;
    }
    return primelink_seo_defaults()['description'];
}

/**
 * Register SEO fields in the Customizer.
 */
function primelink_seo_customizer( $wp_customize ) {
    $wp_customize->add_section( 'primelink_seo', [
        'title'       => __( 'Search Appearance (Google)', 'primelink' ),
        'priority'    => 25,
        'description' => __( 'Controls the site title and description shown in Google search results. This is not the visible page content — it is the HTML title and meta description tags.', 'primelink' ),
    ] );

    $wp_customize->add_setting( 'primelink_seo_title', [
        'default'           => primelink_seo_defaults()['title'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'primelink_seo_title', [
        'label'       => __( 'Google search title (homepage)', 'primelink' ),
        'description' => __( 'Example: Ceylon primelink holdings — use the capital C you want Google to show.', 'primelink' ),
        'section'     => 'primelink_seo',
        'type'        => 'text',
    ] );

    $wp_customize->add_setting( 'primelink_seo_description', [
        'default'           => primelink_seo_defaults()['description'],
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'primelink_seo_description', [
        'label'       => __( 'Google search description (homepage)', 'primelink' ),
        'description' => __( 'Short summary under the title in search results (about 150–160 characters).', 'primelink' ),
        'section'     => 'primelink_seo',
        'type'        => 'textarea',
    ] );
}
add_action( 'customize_register', 'primelink_seo_customizer', 20 );

/**
 * Homepage <title> tag — use SEO title with correct capitalization.
 */
function primelink_document_title_parts( $parts ) {
    if ( is_front_page() && ! is_paged() ) {
        $parts['title'] = primelink_seo_title();
        $parts['tagline'] = '';
        $parts['site'] = '';
    }
    return $parts;
}
add_filter( 'document_title_parts', 'primelink_document_title_parts' );

/**
 * Output meta description when no SEO plugin handles it.
 */
function primelink_meta_description() {
    if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' ) ) {
        return;
    }

    $description = '';

    if ( is_front_page() && ! is_paged() ) {
        $description = primelink_seo_description();
    } elseif ( is_singular() ) {
        $post = get_queried_object();
        if ( $post instanceof WP_Post ) {
            $description = has_excerpt( $post ) ? get_the_excerpt( $post ) : wp_trim_words( wp_strip_all_tags( $post->post_content ), 28, '…' );
        }
    }

    $description = trim( wp_strip_all_tags( $description ) );
    if ( $description === '' ) {
        return;
    }

    printf(
        '<meta name="description" content="%s">' . "\n",
        esc_attr( $description )
    );
}
add_action( 'wp_head', 'primelink_meta_description', 1 );

/**
 * On theme setup, sync WordPress site title + tagline if still generic/lowercase.
 */
function primelink_sync_site_identity() {
    if ( get_option( 'primelink_seo_synced' ) ) {
        return;
    }

    $defaults = primelink_seo_defaults();
    $name     = get_option( 'blogname', '' );
    $tagline  = get_option( 'blogdescription', '' );

    if ( $name === '' || strtolower( $name ) === 'ceylon primelink holdings' || strtolower( $name ) === 'wordpress' ) {
        update_option( 'blogname', $defaults['title'] );
    }

    if ( $tagline === '' || stripos( $tagline, 'PrimeLink Group' ) !== false || $tagline === 'Just another WordPress site' ) {
        update_option( 'blogdescription', $defaults['description'] );
    }

    update_option( 'primelink_seo_synced', true );
}
add_action( 'after_switch_theme', 'primelink_sync_site_identity' );
add_action( 'init', function () {
    if ( current_user_can( 'manage_options' ) && ! get_option( 'primelink_seo_synced' ) ) {
        primelink_sync_site_identity();
    }
} );
