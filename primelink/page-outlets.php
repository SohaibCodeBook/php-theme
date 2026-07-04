<?php
/**
 * Template Name: Outlets
 */
get_header();

// ── All content reads from Customizer → Outlets Page

$banner_badge   = pl_outlets( 'banner_badge',   'Find Us' );
$banner_heading = pl_outlets( 'banner_heading', 'Our Outlets' );
$banner_subtext = pl_outlets( 'banner_subtext', 'Visit our main office and retail outlet in Gampaha for IT products, engineering service enquiries, and technical support.' );

$outlet_name    = pl_outlets( 'outlet_name',    'PrimeLink Holdings – Gampaha' );
$outlet_address = pl_outlets( 'outlet_address', pl_site( 'address_full' ) );
$outlet_phone   = pl_outlets( 'outlet_phone',   pl_site( 'phone' ) );
$outlet_email   = pl_outlets( 'outlet_email',   pl_site( 'email' ) );
$outlet_intro   = pl_outlets( 'outlet_intro',   'Our main office serves as both our operational headquarters and retail outlet. Visit us for computer products, IT accessories, engineering service enquiries, and software consultations.' );
$outlet_image   = pl_outlets( 'outlet_image',   'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&q=75&auto=format&fit=crop' );

$hours_weekday  = pl_outlets( 'hours_weekday', pl_site( 'hours_weekday' ) );
$hours_sat      = pl_outlets( 'hours_sat',     pl_site( 'hours_sat' ) );

$expansion_heading = pl_outlets( 'expansion_heading', 'Future Outlet Expansion' );
$expansion_intro   = pl_outlets( 'expansion_intro',   'PrimeLink Holdings plans to expand its retail presence to additional districts across Sri Lanka. More outlets are coming soon to better serve our growing client base island-wide.' );
$expansion_notice  = pl_outlets( 'expansion_notice',  'While physical outlets are limited to Gampaha currently, all our engineering and software services are available island-wide. We visit project sites throughout Sri Lanka.' );

// Products available
$prod_defaults = [ 'Laptops','Desktop PCs','Computer Accessories','Networking Equipment','SSDs & RAM','USB Drives','Keyboards & Mice','Monitors','Laptop Bags','Chargers & Cables' ];
$products = [];
for ( $i = 1; $i <= 10; $i++ ) {
    $v = pl_outlets( 'product'.$i, $prod_defaults[ $i - 1 ] );
    if ( $v ) $products[] = $v;
}

// Planned districts
$district_defaults = [ 'Colombo','Kandy','Kurunegala','Negombo','Kalutara','Ratnapura','Kegalle','Matara','Anuradhapura','Galle' ];
$districts = [];
for ( $i = 1; $i <= 10; $i++ ) {
    $v = pl_outlets( 'district'.$i, $district_defaults[ $i - 1 ] );
    if ( $v ) $districts[] = $v;
}

$default_map = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2941447470976!2d79.99489697505702!3d7.091862592911288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2fbed579aaaab%3A0x50af137ede85e371!2sSanasa%20Ideal%20Shopping%20Complex!5e0!3m2!1sen!2s!4v1783159692434!5m2!1sen!2s';
$map_url = pl_outlets( 'map_url', $default_map );
?>

<!-- PAGE BANNER -->
<section class="pl-page-banner">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3"><i class="fa-solid fa-store fa-xs me-2" aria-hidden="true"></i><?php echo esc_html( $banner_badge ); ?></div>
    <h1><?php echo esc_html( $banner_heading ); ?></h1>
    <p class="mt-2" style="color:rgba(255,255,255,.7);font-size:1rem;max-width:540px;"><?php echo esc_html( $banner_subtext ); ?></p>
    <nav class="pl-breadcrumb mt-3" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> <?php esc_html_e( 'Home', 'primelink' ); ?></a>
      <span class="sep mx-2" aria-hidden="true">/</span>
      <span class="current"><?php esc_html_e( 'Outlets', 'primelink' ); ?></span>
    </nav>
  </div>
</section>

<!-- MAIN OUTLET -->
<section class="section-lg">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <img src="<?php echo esc_url( $outlet_image ); ?>"
             alt="<?php echo esc_attr( $outlet_name ); ?>"
             loading="lazy" class="lazy w-100 rounded-4 shadow-lg" style="height:420px;object-fit:cover;">
      </div>
      <div class="col-lg-6">
        <div class="section-badge"><i class="fa-solid fa-building fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Main Office', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $outlet_name ); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl"><?php echo esc_html( $outlet_intro ); ?></p>

        <div class="d-flex flex-column gap-3 mt-4">
          <div class="pl-contact-item">
            <div class="pl-contact-item-icon" style="background:var(--pl-primary-soft);">
              <i class="fa-solid fa-location-dot" style="color:var(--pl-primary);" aria-hidden="true"></i>
            </div>
            <div>
              <strong style="color:var(--pl-dark);"><?php esc_html_e( 'Office Address', 'primelink' ); ?></strong>
              <span style="color:var(--pl-text-muted);font-size:0.9rem;"><?php echo esc_html( $outlet_address ); ?></span>
            </div>
          </div>
          <div class="pl-contact-item">
            <div class="pl-contact-item-icon" style="background:var(--pl-primary-soft);">
              <i class="fa-solid fa-phone" style="color:var(--pl-primary);" aria-hidden="true"></i>
            </div>
            <div>
              <strong style="color:var(--pl-dark);"><?php esc_html_e( 'Phone / WhatsApp', 'primelink' ); ?></strong>
              <a href="tel:<?php echo esc_attr( pl_site( 'phone_raw' ) ); ?>" style="color:var(--pl-text-muted);font-size:0.9rem;"><?php echo esc_html( $outlet_phone ); ?></a>
            </div>
          </div>
          <div class="pl-contact-item">
            <div class="pl-contact-item-icon" style="background:var(--pl-primary-soft);">
              <i class="fa-solid fa-envelope" style="color:var(--pl-primary);" aria-hidden="true"></i>
            </div>
            <div>
              <strong style="color:var(--pl-dark);"><?php esc_html_e( 'Email', 'primelink' ); ?></strong>
              <a href="mailto:<?php echo esc_attr( $outlet_email ); ?>" style="color:var(--pl-text-muted);font-size:0.9rem;"><?php echo esc_html( $outlet_email ); ?></a>
            </div>
          </div>
        </div>

        <?php if ( $products ) : ?>
        <div class="mt-4">
          <h5 style="font-size:0.9rem;font-weight:700;margin-bottom:12px;"><?php esc_html_e( 'Available at Our Outlet', 'primelink' ); ?></h5>
          <div class="d-flex flex-wrap gap-2">
            <?php foreach ( $products as $p ) : ?>
            <span class="pl-tag primary"><?php echo esc_html( $p ); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <div class="d-flex gap-3 mt-4 flex-wrap">
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-primary-pl">
            <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Contact Us', 'primelink' ); ?>
          </a>
          <a href="https://wa.me/<?php echo esc_attr( pl_site( 'whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer" class="btn-pl btn-accent-pl">
            <i class="fa-brands fa-whatsapp fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'WhatsApp', 'primelink' ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HOURS + EXPANSION -->
<section class="section-lg" style="background:var(--pl-bg);">
  <div class="container">
    <div class="row g-5">

      <!-- Business Hours -->
      <div class="col-lg-5">
        <div class="pl-contact-info-card">
          <h3><i class="fa-solid fa-clock me-2" aria-hidden="true"></i><?php esc_html_e( 'Business Hours', 'primelink' ); ?></h3>
          <p><?php esc_html_e( 'Our office is open during the following hours. Contact us in advance for holiday visits.', 'primelink' ); ?></p>
          <div class="pl-hours-list">
            <?php
            $hours = [
              [ 'Monday',    $hours_weekday ],
              [ 'Tuesday',   $hours_weekday ],
              [ 'Wednesday', $hours_weekday ],
              [ 'Thursday',  $hours_weekday ],
              [ 'Friday',    $hours_weekday ],
              [ 'Saturday',  $hours_sat     ],
              [ 'Sunday',    'Closed'       ],
            ];
            foreach ( $hours as [ $day, $time ] ) : ?>
            <div class="pl-hours-row">
              <span><?php echo esc_html( $day ); ?></span>
              <span><?php echo esc_html( $time ); ?></span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Expansion -->
      <div class="col-lg-7">
        <div class="section-badge"><i class="fa-solid fa-map-location-dot fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Coming Soon', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $expansion_heading ); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl"><?php echo esc_html( $expansion_intro ); ?></p>
        <div style="background:var(--pl-white);border:2px dashed var(--pl-border);border-radius:var(--pl-radius-lg);padding:20px 24px;margin:20px 0;display:flex;align-items:center;gap:14px;">
          <i class="fa-solid fa-clock-rotate-left" style="color:var(--pl-text-muted);font-size:1.5rem;" aria-hidden="true"></i>
          <div>
            <strong style="color:var(--pl-dark);font-size:0.95rem;"><?php esc_html_e( 'Additional outlets coming soon', 'primelink' ); ?></strong>
            <p style="margin:0;font-size:0.83rem;color:var(--pl-text-muted);"><?php esc_html_e( 'We are planning expansion to multiple districts across Sri Lanka.', 'primelink' ); ?></p>
          </div>
        </div>

        <?php if ( $districts ) : ?>
        <h5 style="font-size:0.9rem;font-weight:700;margin-bottom:14px;color:var(--pl-dark);"><?php esc_html_e( 'Planned Districts', 'primelink' ); ?></h5>
        <div class="d-flex flex-wrap gap-2">
          <?php foreach ( $districts as $d ) : ?>
          <span class="pl-district-chip"><?php echo esc_html( $d ); ?></span>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="mt-4 p-3 rounded-3" style="background:var(--pl-primary-soft);display:flex;align-items:start;gap:12px;">
          <i class="fa-solid fa-info-circle" style="color:var(--pl-primary);margin-top:2px;" aria-hidden="true"></i>
          <p style="margin:0;font-size:0.87rem;color:var(--pl-primary);"><?php echo esc_html( $expansion_notice ); ?></p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- MAP -->
<section class="section-md" style="background:var(--pl-white);">
  <div class="container">
    <div class="text-center mb-4">
      <h2 style="font-size:1.5rem;font-weight:800;letter-spacing:-0.02em;"><?php esc_html_e( 'Find Us on the Map', 'primelink' ); ?></h2>
      <p class="text-muted-pl" style="font-size:0.9rem;"><?php echo esc_html( $outlet_address ); ?></p>
    </div>
    <div class="pl-map-wrap">
      <iframe src="<?php echo esc_url( $map_url ); ?>" width="100%" height="420" style="border:0;display:block;" allowfullscreen="" loading="lazy" title="<?php echo esc_attr( $outlet_name ); ?>"></iframe>
    </div>
  </div>
</section>

<?php get_footer(); ?>
