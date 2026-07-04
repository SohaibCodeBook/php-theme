<?php
/**
 * PrimeLink – Setup Wizard
 * Runs on theme activation AND on every load if setup not complete.
 */
defined('ABSPATH') || exit;

/* ── Force-run on theme switch ── */
function primelink_after_switch_theme() {
    delete_option('primelink_setup_done'); // always re-run on activation
    primelink_run_setup();
}
add_action('after_switch_theme', 'primelink_after_switch_theme');

/* ── Also run on init as fallback (in case after_switch_theme missed) ── */
function primelink_init_setup() {
    if ( get_option('primelink_setup_done') ) return;
    if ( ! current_user_can('manage_options') ) return;
    primelink_run_setup();
}
add_action('init', 'primelink_init_setup');

function primelink_run_setup() {
    $pages = [
        'home' => [
            'title'    => 'Home',
            'template' => 'front-page.php',
            'content'  => '',
        ],
        'about-us' => [
            'title'    => 'About Us',
            'template' => 'page-about-us.php',
            'content'  => '',
        ],
        'services' => [
            'title'    => 'Services',
            'template' => 'page-services.php',
            'content'  => '',
        ],
        'engineering-solutions' => [
            'title'    => 'Engineering Solutions',
            'template' => 'page-engineering-solutions.php',
            'content'  => '',
        ],
        'outlets' => [
            'title'    => 'Outlets',
            'template' => 'page-outlets.php',
            'content'  => '',
        ],
        'it-services' => [
            'title'    => 'IT Services',
            'template' => 'page-it-services.php',
            'content'  => '',
        ],
        'contact' => [
            'title'    => 'Contact',
            'template' => 'page-contact.php',
            'content'  => '',
        ],
        'privacy-policy' => [
            'title'    => 'Privacy Policy',
            'template' => '',  // Uses default page.php
            'content'  => '<p>This Privacy Policy describes how Ceylon PrimeLink Holdings (Pvt) Ltd collects, uses, and protects information submitted through this website. We only collect information you voluntarily provide via our contact forms (name, email, phone, and message). This information is used solely to respond to your enquiry and is never shared with third parties. For questions, email info@primelink.com.lk.</p>',
        ],
    ];

    $home_id    = 0;
    $menu_items = [];

    foreach ( $pages as $slug => $data ) {
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            $page_id = $existing->ID;
            // Ensure published
            if ( $existing->post_status !== 'publish' ) {
                wp_update_post(['ID' => $page_id, 'post_status' => 'publish']);
            }
        } else {
            $page_id = wp_insert_post([
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_content' => wp_kses_post( $data['content'] ?? '' ),
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_author'  => 1,
            ]);
        }

        if ( $page_id && ! is_wp_error($page_id) ) {
            // Only set template if one is specified; leave blank for pages using page.php
            if ( ! empty( $data['template'] ) ) {
                update_post_meta( $page_id, '_wp_page_template', $data['template'] );
            }
        }

        if ( $slug === 'home' ) $home_id = $page_id;
        $menu_items[ $slug ] = $page_id;
    }

    // Set static front page
    update_option( 'show_on_front', 'page' );
    if ( $home_id ) {
        update_option( 'page_on_front', $home_id );
    }

    // Delete sample "Hello World" post
    $hello = get_page_by_title( 'Hello world!', OBJECT, 'post' );
    if ( $hello ) wp_delete_post( $hello->ID, true );

    // Delete "Sample Page"
    $sample = get_page_by_path( 'sample-page' );
    if ( $sample ) wp_delete_post( $sample->ID, true );

    // Create / update nav menu
    $existing_menu = wp_get_nav_menu_object('Primary Navigation');
    if ( $existing_menu ) {
        $menu_id = $existing_menu->term_id;
        // Clear existing items
        $items = wp_get_nav_menu_items( $menu_id );
        if ( $items ) foreach ($items as $item) wp_delete_post($item->ID, true);
    } else {
        $menu_id = wp_create_nav_menu('Primary Navigation');
    }

    if ( ! is_wp_error($menu_id) ) {
        $labels = [
            'home'                  => 'Home',
            'about-us'              => 'About Us',
            'services'              => 'Services',
            'engineering-solutions' => 'Engineering',
            'outlets'               => 'Outlets',
            'it-services'           => 'IT Services',
            'contact'               => 'Contact',
        ];
        $order = 1;
        foreach ( $labels as $slug => $label ) {
            if ( empty($menu_items[$slug]) ) continue;
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'     => $label,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $menu_items[$slug],
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
                'menu-item-position'  => $order++,
            ]);
        }
        $locations = get_theme_mod('nav_menu_locations', []);
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    update_option('primelink_setup_done', true);
}
