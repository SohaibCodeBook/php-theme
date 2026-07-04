<?php
/**
 * 404 Not Found Template
 *
 * Displayed when WordPress cannot find a matching page or post.
 */
get_header(); ?>

<section class="pl-page-banner" aria-labelledby="error-heading">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3">
      <i class="fa-solid fa-triangle-exclamation fa-xs me-2" aria-hidden="true"></i>
      <?php esc_html_e( 'Page Not Found', 'primelink' ); ?>
    </div>
    <h1 id="error-heading">
      <?php esc_html_e( '404 — Page Not Found', 'primelink' ); ?>
    </h1>
    <p class="mt-2" style="color:rgba(255,255,255,.7);font-size:1rem;max-width:520px;">
      <?php esc_html_e( "The page you're looking for doesn't exist or has been moved.", 'primelink' ); ?>
    </p>
    <nav class="pl-breadcrumb mt-3" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <i class="fa-solid fa-house fa-xs" aria-hidden="true"></i>
        <?php esc_html_e( 'Home', 'primelink' ); ?>
      </a>
      <span class="sep mx-2" aria-hidden="true">/</span>
      <span class="current"><?php esc_html_e( '404 Error', 'primelink' ); ?></span>
    </nav>
  </div>
</section>

<section class="section-lg" aria-label="<?php esc_attr_e( 'Error recovery options', 'primelink' ); ?>">
  <div class="container" style="max-width: 760px; text-align: center;">

    <!-- Large visual error indicator -->
    <div style="
      font-family: var(--pl-font-head);
      font-size: clamp(5rem, 18vw, 10rem);
      font-weight: 800;
      line-height: 1;
      letter-spacing: -0.05em;
      background: linear-gradient(135deg, var(--pl-primary), #60a5fa);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 1.5rem;
      user-select: none;
    " aria-hidden="true">404</div>

    <h2 style="font-size: clamp(1.4rem, 3vw, 1.8rem); margin-bottom: 1rem;">
      <?php esc_html_e( "We couldn't find that page", 'primelink' ); ?>
    </h2>
    <p class="text-muted-pl" style="font-size: 1rem; line-height: 1.8; margin-bottom: 2.5rem; max-width: 480px; margin-left: auto; margin-right: auto;">
      <?php esc_html_e( 'The page may have been moved, deleted, or the URL may be incorrect. Use the links below to find what you need.', 'primelink' ); ?>
    </p>

    <!-- Primary recovery action -->
    <div class="d-flex gap-3 justify-content-center flex-wrap mb-5">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-pl btn-primary-pl btn-lg-pl">
        <i class="fa-solid fa-house fa-sm" aria-hidden="true"></i>
        <?php esc_html_e( 'Back to Home', 'primelink' ); ?>
      </a>
      <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-outline-dark btn-lg-pl">
        <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i>
        <?php esc_html_e( 'Contact Us', 'primelink' ); ?>
      </a>
    </div>

    <!-- Quick links to key pages -->
    <div style="border-top: 1px solid var(--pl-border); padding-top: 2rem;">
      <p style="font-size: 0.82rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1.2px; color: var(--pl-text-muted); margin-bottom: 1.2rem;">
        <?php esc_html_e( 'Quick Links', 'primelink' ); ?>
      </p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <?php
        $quick_links = [
            '/services'              => __( 'Services', 'primelink' ),
            '/engineering-solutions' => __( 'Engineering', 'primelink' ),
            '/it-services'           => __( 'IT Services', 'primelink' ),
            '/about-us'              => __( 'About Us', 'primelink' ),
            '/outlets'               => __( 'Outlets', 'primelink' ),
        ];
        foreach ( $quick_links as $path => $label ) : ?>
        <a href="<?php echo esc_url( home_url( $path ) ); ?>" class="btn-pl btn-outline-dark btn-sm-pl">
          <?php echo esc_html( $label ); ?>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
