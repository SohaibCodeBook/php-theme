<?php
/**
 * PrimeLink – Search / SEO meta (title + description for Google).
 * Theme controls homepage search title — not WordPress Settings → Site Title.
 */
defined( 'ABSPATH' ) || exit;

/**
 * Default SEO strings (source of truth for Google homepage results).
 */
function primelink_seo_defaults() {
    return [
        'title'       => 'Ceylon primelink holdings',
        'description' => 'Ceylon PrimeLink Holdings is a Sri Lankan multi-sector company delivering engineering, geotechnical, GIS, construction, software, and IT solutions.',
    ];
}

function primelink_seo_title() {
    return get_theme_mod( 'primelink_seo_title', primelink_seo_defaults()['title'] );
}

function primelink_seo_description() {
    return get_theme_mod( 'primelink_seo_description', primelink_seo_defaults()['description'] );
}

function primelink_is_seo_homepage() {
    return is_front_page() && ! is_paged();
}

/**
 * Register SEO fields in the Customizer.
 */
function primelink_seo_customizer( $wp_customize ) {
    $defaults = primelink_seo_defaults();

    $wp_customize->add_section( 'primelink_seo', [
        'title'       => __( 'Search Appearance (Google)', 'primelink' ),
        'priority'    => 25,
        'description' => __( 'This controls what Google shows for your homepage. It is separate from Settings → General → Site Title.', 'primelink' ),
    ] );

    $wp_customize->add_setting( 'primelink_seo_title', [
        'default'           => $defaults['title'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'primelink_seo_title', [
        'label'       => __( 'Homepage search title', 'primelink' ),
        'description' => __( 'Exact spelling for Google, e.g. Ceylon primelink holdings (capital C).', 'primelink' ),
        'section'     => 'primelink_seo',
        'type'        => 'text',
    ] );

    $wp_customize->add_setting( 'primelink_seo_description', [
        'default'           => $defaults['description'],
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'primelink_seo_description', [
        'label'       => __( 'Homepage search description', 'primelink' ),
        'description' => __( 'Short summary under the title in Google (about 150–160 characters).', 'primelink' ),
        'section'     => 'primelink_seo',
        'type'        => 'textarea',
    ] );
}
add_action( 'customize_register', 'primelink_seo_customizer', 20 );

/**
 * Force homepage <title> from theme (overrides WordPress site title).
 */
function primelink_force_homepage_document_title( $title ) {
    if ( primelink_is_seo_homepage() ) {
        return primelink_seo_title();
    }
    return $title;
}
add_filter( 'pre_get_document_title', 'primelink_force_homepage_document_title', 9999 );

function primelink_document_title_parts( $parts ) {
    if ( primelink_is_seo_homepage() ) {
        return [ 'title' => primelink_seo_title() ];
    }
    return $parts;
}
add_filter( 'document_title_parts', 'primelink_document_title_parts', 9999 );

/**
 * Override popular SEO plugins on the homepage (they often store lowercase titles).
 */
function primelink_override_seo_plugins() {
    if ( ! primelink_is_seo_homepage() ) {
        return;
    }

    $title = primelink_seo_title();
    $desc  = primelink_seo_description();

    // Yoast SEO
    add_filter( 'wpseo_title', fn() => $title, 9999 );
    add_filter( 'wpseo_metadesc', fn() => $desc, 9999 );
    add_filter( 'wpseo_opengraph_title', fn() => $title, 9999 );
    add_filter( 'wpseo_opengraph_desc', fn() => $desc, 9999 );
    add_filter( 'wpseo_twitter_title', fn() => $title, 9999 );
    add_filter( 'wpseo_twitter_description', fn() => $desc, 9999 );

    // Rank Math
    add_filter( 'rank_math/frontend/title', fn() => $title, 9999 );
    add_filter( 'rank_math/frontend/description', fn() => $desc, 9999 );
    add_filter( 'rank_math/opengraph/facebook/title', fn() => $title, 9999 );
    add_filter( 'rank_math/opengraph/facebook/description', fn() => $desc, 9999 );

    // All in One SEO
    add_filter( 'aioseo_title', fn() => $title, 9999 );
    add_filter( 'aioseo_description', fn() => $desc, 9999 );
}
add_action( 'wp', 'primelink_override_seo_plugins', 1 );

/**
 * Meta description + Open Graph (theme fallback + reinforcement for Google).
 */
function primelink_meta_tags() {
    $title = '';
    $desc  = '';

    if ( primelink_is_seo_homepage() ) {
        $title = primelink_seo_title();
        $desc  = primelink_seo_description();
    } elseif ( is_singular() ) {
        $post = get_queried_object();
        if ( $post instanceof WP_Post ) {
            $title = get_the_title( $post );
            $desc  = has_excerpt( $post )
                ? get_the_excerpt( $post )
                : wp_trim_words( wp_strip_all_tags( $post->post_content ), 28, '…' );
        }
    }

    $desc = trim( wp_strip_all_tags( $desc ) );
    if ( $desc !== '' ) {
        printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
    }

    if ( primelink_is_seo_homepage() && $title !== '' ) {
        printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
        printf( '<meta name="twitter:title" content="%s">' . "\n", esc_attr( $title ) );
    }
    if ( $desc !== '' ) {
        printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $desc ) );
        printf( '<meta name="twitter:description" content="%s">' . "\n", esc_attr( $desc ) );
    }
}
add_action( 'wp_head', 'primelink_meta_tags', 1 );

/**
 * JSON-LD — helps Google understand the correct site / organization name.
 */
function primelink_json_ld() {
    if ( ! primelink_is_seo_homepage() ) {
        return;
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'       => 'WebSite',
                '@id'         => home_url( '/#website' ),
                'url'         => home_url( '/' ),
                'name'        => primelink_seo_title(),
                'description' => primelink_seo_description(),
            ],
            [
                '@type' => 'Organization',
                '@id'   => home_url( '/#organization' ),
                'name'  => primelink_seo_title(),
                'url'   => home_url( '/' ),
            ],
        ],
    ];

    if ( function_exists( 'pl_site' ) && pl_site( 'email' ) ) {
        $schema['@graph'][1]['email'] = pl_site( 'email' );
    }

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'primelink_json_ld', 5 );

/**
 * Seed theme SEO + sync WordPress database (no plugin required).
 */
function primelink_seed_seo_defaults() {
    $defaults = primelink_seo_defaults();

    if ( ! get_theme_mod( 'primelink_seo_title' ) ) {
        set_theme_mod( 'primelink_seo_title', $defaults['title'] );
    }
    if ( ! get_theme_mod( 'primelink_seo_description' ) ) {
        set_theme_mod( 'primelink_seo_description', $defaults['description'] );
    }
}

/**
 * One-time sync: push theme SEO title/description into WordPress core options.
 * WordPress uses blogname + blogdescription for the <title> tag when no SEO plugin is active.
 */
function primelink_sync_wordpress_identity() {
    $sync_version = '1';
    if ( get_option( 'primelink_seo_sync_version' ) === $sync_version ) {
        return;
    }

    primelink_seed_seo_defaults();

    update_option( 'blogname', primelink_seo_title() );
    update_option( 'blogdescription', primelink_seo_description() );
    update_option( 'primelink_seo_sync_version', $sync_version );
}
add_action( 'after_switch_theme', 'primelink_sync_wordpress_identity' );

add_action( 'init', function () {
    if ( current_user_can( 'manage_options' ) ) {
        primelink_sync_wordpress_identity();
    }
} );
