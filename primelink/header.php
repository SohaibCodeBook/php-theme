<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content">Skip to main content</a>

<!-- ============================================================
     HEADER
     ============================================================ -->
<header id="site-header" role="banner">
  <div class="container">
    <nav class="pl-navbar" aria-label="<?php esc_attr_e( 'Main navigation', 'primelink' ); ?>">

      <!-- Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="pl-logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> – Home">
        <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        if ( $custom_logo_id ) {
            $logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
            echo '<img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="pl-custom-logo" height="42" loading="eager">';
        } else {
            primelink_logo_svg( 'default' );
        }
        ?>
      </a>

      <!-- Desktop nav — uses WordPress menu system -->
      <?php
      wp_nav_menu( [
          'theme_location'  => 'primary',
          'container'       => false,
          'menu_class'      => 'pl-nav-links',
          'fallback_cb'     => 'primelink_nav_fallback',
          'items_wrap'      => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
          'depth'           => 1,
          'walker'          => new Primelink_Nav_Walker(),
      ] );
      ?>

      <!-- CTA -->
      <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="pl-nav-cta d-none d-lg-inline-flex align-items-center gap-2">
        <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Get Quote', 'primelink' ); ?>
      </a>

      <!-- Hamburger -->
      <button class="pl-hamburger" id="pl-hamburger" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'primelink' ); ?>" aria-expanded="false" aria-controls="pl-mobile-nav">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </button>

    </nav>
  </div>
</header>

<!-- Mobile Nav Drawer — populated from the same WP menu -->
<nav id="pl-mobile-nav" class="pl-mobile-nav" aria-label="<?php esc_attr_e( 'Mobile navigation', 'primelink' ); ?>" hidden>
  <?php
  wp_nav_menu( [
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'pl-mobile-nav-list',
      'fallback_cb'    => 'primelink_mobile_nav_fallback',
      'items_wrap'     => '%3$s',
      'depth'          => 1,
      'walker'         => new Primelink_Mobile_Nav_Walker(),
  ] );
  ?>
  <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="pl-nav-cta">
    <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Get a Quote', 'primelink' ); ?>
  </a>
</nav>

<main id="main-content" tabindex="-1">
