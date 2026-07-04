<?php
/**
 * Template Name: Services
 */
get_header();

// ── All content reads from Customizer → Services Page
// ── Defaults match original content — nothing changes until edited

$banner_badge   = pl_services( 'banner_badge',   'What We Offer' );
$banner_heading = pl_services( 'banner_heading', 'Our Services' );
$banner_subtext = pl_services( 'banner_subtext', 'Professional engineering, GIS, software, and IT services for businesses and individuals across Sri Lanka.' );

// Engineering section
$eng_heading = pl_services( 'eng_heading', 'Engineering & Geotechnical Services' );
$eng_intro   = pl_services( 'eng_intro',   'Professional geotechnical, construction, and engineering services delivered with technical precision and industry-standard methodologies.' );
$eng_price   = pl_services( 'eng_price',   'LKR 100,000' );
$eng_image   = pl_services( 'eng_image',   'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=700&q=75&auto=format&fit=crop' );
$eng_items   = [];
$eng_defaults = [
    'Geotechnical Investigations & SPT', 'Borehole Drilling (Soil & Rock)',
    'Core Logging & Engineering Reports', 'Landslide Mitigation Works',
    'Retaining Wall Design', 'Earth Reinforcement Systems',
    'Foundation Engineering', 'Site Re-evaluation (Gov-Rejected)', 'Construction Consultancy',
];
for ( $i = 1; $i <= 9; $i++ ) {
    $val = pl_services( 'eng_item'.$i, $eng_defaults[ $i - 1 ] );
    if ( $val ) $eng_items[] = $val;
}

// GIS & AutoCAD section
$gis_heading = pl_services( 'gis_heading', 'GIS, Mapping & AutoCAD Services' );
$gis_intro   = pl_services( 'gis_intro',   'GIS mapping, spatial analysis, and AutoCAD drafting services for engineering firms, universities, researchers, and businesses across Sri Lanka.' );
$gis_price   = pl_services( 'gis_price',   'LKR 100,000' );
$gis_image   = pl_services( 'gis_image',   'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=700&q=75&auto=format&fit=crop' );
$gis_items   = [];
$gis_defaults = [
    'ArcGIS Project Support', 'QGIS Project Support', 'Spatial Analysis', 'Terrain Modelling',
    'Highway Engineering GIS', 'Infrastructure GIS Studies', 'AutoCAD Engineering Drafting',
    'Housing & Building Plans', 'Structural Concept Drawings', 'Site Layout Plans',
];
for ( $i = 1; $i <= 10; $i++ ) {
    $val = pl_services( 'gis_item'.$i, $gis_defaults[ $i - 1 ] );
    if ( $val ) $gis_items[] = $val;
}

// Software & IT section
$sw_heading = pl_services( 'sw_heading', 'Software Development & IT Services' );
$sw_intro   = pl_services( 'sw_intro',   'Custom software, database solutions, and complete IT services for small and medium businesses across Sri Lanka.' );
$sw_price   = pl_services( 'sw_price',   'LKR 45,000' );
$sw_image   = pl_services( 'sw_image',   'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=700&q=75&auto=format&fit=crop' );
$sw_items   = [];
$sw_defaults = [
    'Database Development', 'Custom Business Software', 'Retail Cashier Systems',
    'Restaurant Management Systems', 'Barcode & Inventory Systems',
    'Small Business Solutions', 'Technical Support', 'Software Installation',
];
for ( $i = 1; $i <= 8; $i++ ) {
    $val = pl_services( 'sw_item'.$i, $sw_defaults[ $i - 1 ] );
    if ( $val ) $sw_items[] = $val;
}

// Pricing cards
$price_db_label  = pl_services( 'price_db_label',  'Database Solutions' );
$price_db_price  = pl_services( 'price_db_price',  '45,000' );
$price_db_desc   = pl_services( 'price_db_desc',   'Starting price per project' );
$price_biz_label = pl_services( 'price_biz_label', 'Business Software' );
$price_biz_price = pl_services( 'price_biz_price', '50,000' );
$price_biz_desc  = pl_services( 'price_biz_desc',  'Per system, per project' );
$price_eng_label = pl_services( 'price_eng_label', 'Engineering & GIS' );
$price_eng_price = pl_services( 'price_eng_price', '100,000' );
$price_eng_desc  = pl_services( 'price_eng_desc',  'Starting price per project' );
?>

<!-- PAGE BANNER -->
<section class="pl-page-banner">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3"><i class="fa-solid fa-grid-2 fa-xs me-2" aria-hidden="true"></i><?php echo esc_html( $banner_badge ); ?></div>
    <h1><?php echo esc_html( $banner_heading ); ?></h1>
    <p class="mt-2" style="color:rgba(255,255,255,.7);font-size:1rem;max-width:560px;"><?php echo esc_html( $banner_subtext ); ?></p>
    <nav class="pl-breadcrumb mt-3" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> <?php esc_html_e( 'Home', 'primelink' ); ?></a>
      <span class="sep mx-2" aria-hidden="true">/</span>
      <span class="current"><?php esc_html_e( 'Services', 'primelink' ); ?></span>
    </nav>
  </div>
</section>

<!-- SERVICES NOTICE -->
<section aria-label="<?php esc_attr_e( 'Important notice', 'primelink' ); ?>" style="padding: 2.5rem 0 0;">
  <div class="container">
    <div class="pl-alert info" role="note">
      <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
      <p><?php esc_html_e( 'Most of our services are customized to meet each client\'s specific requirements. Please contact us to discuss your project and request a quote before proceeding.', 'primelink' ); ?></p>
    </div>
  </div>
</section>

<!-- ENGINEERING SERVICES -->
<section class="section-lg" id="engineering">
  <div class="container">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-5">
        <img src="<?php echo esc_url( $eng_image ); ?>"
             alt="<?php esc_attr_e( 'Geotechnical engineering site investigation in Sri Lanka', 'primelink' ); ?>"
             loading="lazy" class="lazy w-100 rounded-4 shadow-lg" style="height:360px;object-fit:cover;">
      </div>
      <div class="col-lg-7">
        <div class="section-badge"><i class="fa-solid fa-mountain fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Engineering', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $eng_heading ); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl"><?php echo esc_html( $eng_intro ); ?></p>
        <div class="row g-2 mt-3">
          <?php foreach ( $eng_items as $item ) : ?>
          <div class="col-md-6">
            <div class="d-flex align-items-center gap-2" style="font-size:0.88rem;padding:6px 0;border-bottom:1px solid var(--pl-border);">
              <i class="fa-solid fa-check" style="color:var(--pl-success);font-size:0.75rem;" aria-hidden="true"></i>
              <?php echo esc_html( $item ); ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="d-flex align-items-center gap-3 mt-4 flex-wrap">
          <div style="background:var(--pl-primary-soft);border-radius:var(--pl-radius-md);padding:12px 20px;">
            <span style="font-size:0.78rem;color:var(--pl-text-muted);display:block;"><?php esc_html_e( 'Starting from', 'primelink' ); ?></span>
            <strong style="font-size:1.4rem;color:var(--pl-primary);font-family:var(--pl-font-head);"><?php echo esc_html( $eng_price ); ?></strong>
          </div>
          <a href="<?php echo esc_url( home_url( '/engineering-solutions' ) ); ?>" class="btn-pl btn-primary-pl">
            <i class="fa-solid fa-arrow-right fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'View All Engineering Services', 'primelink' ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- GIS & AUTOCAD -->
<section class="section-lg" style="background:var(--pl-bg);" id="gis">
  <div class="container">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-7 order-2 order-lg-1">
        <div class="section-badge"><i class="fa-solid fa-map fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'GIS & Design', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $gis_heading ); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl"><?php echo esc_html( $gis_intro ); ?></p>
        <div class="row g-2 mt-3">
          <?php foreach ( $gis_items as $item ) : ?>
          <div class="col-md-6">
            <div class="d-flex align-items-center gap-2" style="font-size:0.88rem;padding:6px 0;border-bottom:1px solid var(--pl-border);">
              <i class="fa-solid fa-check" style="color:var(--pl-success);font-size:0.75rem;" aria-hidden="true"></i>
              <?php echo esc_html( $item ); ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="d-flex align-items-center gap-3 mt-4 flex-wrap">
          <div style="background:var(--pl-primary-soft);border-radius:var(--pl-radius-md);padding:12px 20px;">
            <span style="font-size:0.78rem;color:var(--pl-text-muted);display:block;"><?php esc_html_e( 'Starting from', 'primelink' ); ?></span>
            <strong style="font-size:1.4rem;color:var(--pl-primary);font-family:var(--pl-font-head);"><?php echo esc_html( $gis_price ); ?></strong>
          </div>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-primary-pl">
            <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Request Quote', 'primelink' ); ?>
          </a>
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2">
        <img src="<?php echo esc_url( $gis_image ); ?>"
             alt="<?php esc_attr_e( 'GIS mapping and spatial analysis', 'primelink' ); ?>"
             loading="lazy" class="lazy w-100 rounded-4 shadow-lg" style="height:360px;object-fit:cover;">
      </div>
    </div>
  </div>
</section>

<!-- SOFTWARE & IT -->
<section class="section-lg" id="software">
  <div class="container">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-5">
        <img src="<?php echo esc_url( $sw_image ); ?>"
             alt="<?php esc_attr_e( 'Custom software development for Sri Lankan businesses', 'primelink' ); ?>"
             loading="lazy" class="lazy w-100 rounded-4 shadow-lg" style="height:360px;object-fit:cover;">
      </div>
      <div class="col-lg-7">
        <div class="section-badge"><i class="fa-solid fa-code fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Software & IT', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $sw_heading ); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl"><?php echo esc_html( $sw_intro ); ?></p>
        <div class="row g-2 mt-3">
          <?php foreach ( $sw_items as $item ) : ?>
          <div class="col-md-6">
            <div class="d-flex align-items-center gap-2" style="font-size:0.88rem;padding:6px 0;border-bottom:1px solid var(--pl-border);">
              <i class="fa-solid fa-check" style="color:var(--pl-success);font-size:0.75rem;" aria-hidden="true"></i>
              <?php echo esc_html( $item ); ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="d-flex align-items-center gap-3 mt-4 flex-wrap">
          <div style="background:var(--pl-primary-soft);border-radius:var(--pl-radius-md);padding:12px 20px;">
            <span style="font-size:0.78rem;color:var(--pl-text-muted);display:block;"><?php esc_html_e( 'Starting from', 'primelink' ); ?></span>
            <strong style="font-size:1.4rem;color:var(--pl-primary);font-family:var(--pl-font-head);"><?php echo esc_html( $sw_price ); ?></strong>
          </div>
          <a href="<?php echo esc_url( home_url( '/it-services' ) ); ?>" class="btn-pl btn-primary-pl">
            <i class="fa-solid fa-arrow-right fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'View IT Services', 'primelink' ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PRICING CARDS -->
<section class="section-lg" style="background:var(--pl-bg);">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-tag fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Pricing', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php esc_html_e( 'Service Pricing Overview', 'primelink' ); ?></h2>
      <div class="section-divider center"></div>
      <p class="section-subtitle"><?php esc_html_e( 'Transparent starting prices for our most common services. All projects are individually quoted.', 'primelink' ); ?></p>
    </div>
    <div class="row g-4 justify-content-center">

      <!-- Card 1: Database Solutions -->
      <div class="col-lg-4 col-md-6">
        <div class="pl-price-card h-100">
          <div class="pl-price-label"><?php echo esc_html( $price_db_label ); ?></div>
          <div class="pl-price-amount"><sup>LKR </sup><?php echo esc_html( $price_db_price ); ?></div>
          <div class="pl-price-desc"><?php echo esc_html( $price_db_desc ); ?></div>
          <div class="pl-price-divider"></div>
          <ul class="pl-price-features">
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Database design & setup', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Small business systems', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Data entry & management', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Ongoing support available', 'primelink' ); ?></li>
          </ul>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-outline-dark w-100 justify-content-center"><?php esc_html_e( 'Get Quote', 'primelink' ); ?></a>
        </div>
      </div>

      <!-- Card 2: Business Software (featured) -->
      <div class="col-lg-4 col-md-6">
        <div class="pl-price-card featured h-100">
          <div class="pl-price-label"><?php echo esc_html( $price_biz_label ); ?></div>
          <div class="pl-price-amount"><sup>LKR </sup><?php echo esc_html( $price_biz_price ); ?></div>
          <div class="pl-price-desc"><?php echo esc_html( $price_biz_desc ); ?></div>
          <div class="pl-price-divider"></div>
          <ul class="pl-price-features">
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Cashier / POS software', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Restaurant management', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Barcode & inventory system', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Training & support included', 'primelink' ); ?></li>
          </ul>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-primary-pl w-100 justify-content-center"><?php esc_html_e( 'Get Quote', 'primelink' ); ?></a>
        </div>
      </div>

      <!-- Card 3: Engineering & GIS -->
      <div class="col-lg-4 col-md-6">
        <div class="pl-price-card h-100">
          <div class="pl-price-label"><?php echo esc_html( $price_eng_label ); ?></div>
          <div class="pl-price-amount"><sup>LKR </sup><?php echo esc_html( $price_eng_price ); ?></div>
          <div class="pl-price-desc"><?php echo esc_html( $price_eng_desc ); ?></div>
          <div class="pl-price-divider"></div>
          <ul class="pl-price-features">
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'GIS mapping & analysis', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'AutoCAD project support', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Geotechnical reports', 'primelink' ); ?></li>
            <li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Slope stability analysis', 'primelink' ); ?></li>
          </ul>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-outline-dark w-100 justify-content-center"><?php esc_html_e( 'Get Quote', 'primelink' ); ?></a>
        </div>
      </div>

    </div>
    <p class="text-center mt-4 text-muted-pl" style="font-size:0.85rem;">
      <?php esc_html_e( 'All prices are starting prices. Final pricing depends on project scope and complexity.', 'primelink' ); ?>
      <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact us', 'primelink' ); ?></a>
      <?php esc_html_e( 'for a detailed quotation.', 'primelink' ); ?>
    </p>
  </div>
</section>

<?php get_footer(); ?>
