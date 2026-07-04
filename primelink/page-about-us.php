<?php
/**
 * Template Name: About Us
 */
get_header();

// ── All content reads from Customizer (Appearance → Customize → About Us Page)
// ── Defaults match the original hardcoded content — nothing changes until edited

$banner_badge   = pl_about( 'banner_badge',   'Who We Are' );
$banner_heading = pl_about( 'banner_heading', 'About Ceylon PrimeLink Holdings' );
$banner_subtext = pl_about( 'banner_subtext', 'A Sri Lankan multi-sector company delivering engineering, geotechnical, GIS, construction, software, and IT solutions with precision and integrity.' );

$story_img    = pl_about( 'story_image', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=75&auto=format&fit=crop' );
$est_year     = pl_about( 'est_year',    '2014' );
$story_title  = pl_about( 'story_title', 'Ceylon PrimeLink Holdings (Pvt) Ltd' );
$para1        = pl_about( 'para1', 'Our company primarily specializes in landslide investigations and geotechnical testing. Much of our work focuses on landslide-prone areas in Sri Lanka, including districts such as Kandy, Nuwara Eliya, Badulla, Kegalle, Ratnapura, Galle, Kalutara, and parts of Gampaha and Kurunegala. This has been our core expertise, and over time we expanded our services to include AutoCAD drafting, engineering design, and related consultancy services.' );
$para2        = pl_about( 'para2', "Our mission is to provide practical, cost-effective, and professionally delivered services that make a real difference to our clients' projects. Whether it is a geotechnical site investigation for a housing development, a GIS mapping study for a university research project, or a custom cashier system for a small business, we approach every project with the same level of professionalism and attention to detail." );
$para3        = pl_about( 'para3', 'We are based at our main office and retail outlet in Gampaha, conveniently located in the Western Province of Sri Lanka, and we serve clients across the island.' );

$mission = pl_about( 'mission', 'To connect industries through practical engineering knowledge, modern technology, and innovative solutions — delivering reliable services that empower Sri Lankan businesses and communities to grow and prosper.' );
$vision  = pl_about( 'vision',  'To be the most trusted multi-sector solutions provider in Sri Lanka — recognised for professional integrity, technical excellence, and commitment to delivering real value to every client we serve.' );

$cta_heading = pl_about( 'cta_heading', 'How to Reach PrimeLink Holdings' );
$cta_subtext = pl_about( 'cta_subtext', 'All enquiries are handled promptly via email, telephone, and WhatsApp. Use our enquiry form to describe your project and we will respond with a tailored solution.' );

// Expertise cards (12) — title and description from Customizer
$exp_defaults = [
    1  => [ 'fa-mountain',         'blue',   'Geotechnical Engineering', 'Soil investigations, borehole drilling, SPT testing, and detailed geotechnical reports.' ],
    2  => [ 'fa-hammer',           'amber',  'Construction Consultancy',  'Site assessments, retaining wall design, earth reinforcement, and advisory services.' ],
    3  => [ 'fa-shield-halved',    'green',  'Landslide Mitigation',      'Slope stability analysis, hazard assessment, and practical mitigation solutions.' ],
    4  => [ 'fa-map',              'cyan',   'GIS & Mapping',              'ArcGIS and QGIS projects, spatial analysis, terrain modelling, and engineering GIS.' ],
    5  => [ 'fa-drafting-compass', 'purple', 'AutoCAD Drafting',           'Precision engineering drawings, housing plans, and structural concept designs.' ],
    6  => [ 'fa-code',             'blue',   'Software Development',       'Custom business software, cashier systems, and database applications.' ],
    7  => [ 'fa-database',         'amber',  'Database Solutions',         'Small business database setup, data management, and ongoing support.' ],
    8  => [ 'fa-laptop',           'green',  'IT Products & Support',      'Laptops, desktops, accessories, and networking equipment.' ],
    9  => [ 'fa-house-chimney',    'purple', 'Housing Design',             'Residential and commercial housing plan designs and feasibility studies.' ],
    10 => [ 'fa-globe',            'cyan',   'Mining Support',             'Engineering support services for mining operations and geological investigations.' ],
    11 => [ 'fa-file-contract',    'pink',   'Engineering Reports',        'Professional technical reports for geotechnical and site assessment projects.' ],
    12 => [ 'fa-graduation-cap',   'blue',   'University & Research',      'GIS and engineering analysis support for undergraduate and postgraduate projects.' ],
];
$expertise = [];
foreach ( $exp_defaults as $i => [ $icon, $color, $dt, $dd ] ) {
    $expertise[] = [
        'icon'  => $icon,
        'color' => $color,
        'title' => pl_about( 'exp'.$i.'_title', $dt ),
        'desc'  => pl_about( 'exp'.$i.'_desc',  $dd ),
    ];
}

// Core Values (6) — title and description from Customizer
$val_defaults = [
    1 => [ 'fa-shield-halved', 'Integrity',     'We uphold honesty and transparency in every client relationship.' ],
    2 => [ 'fa-crosshairs',    'Precision',     'Engineering work demands accuracy. We deliver detailed, reliable outputs.' ],
    3 => [ 'fa-lightbulb',     'Innovation',    'We continuously adopt modern tools to deliver forward-thinking solutions.' ],
    4 => [ 'fa-handshake',     'Reliability',   'Our clients trust us to deliver what we promise, on time.' ],
    5 => [ 'fa-tag',           'Affordability', 'Professional-grade services at pricing that works for Sri Lankan budgets.' ],
    6 => [ 'fa-people-group',  'Community',     'As a Sri Lankan company, we contribute positively to local development.' ],
];
$values = [];
foreach ( $val_defaults as $i => [ $icon, $dt, $dd ] ) {
    $values[] = [
        'icon'  => $icon,
        'title' => pl_about( 'val'.$i.'_title', $dt ),
        'desc'  => pl_about( 'val'.$i.'_desc',  $dd ),
    ];
}
?>

<!-- PAGE BANNER -->
<section class="pl-page-banner">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="section-badge mb-3"><i class="fa-solid fa-building-columns fa-xs me-2" aria-hidden="true"></i><?php echo esc_html( $banner_badge ); ?></div>
        <h1><?php echo esc_html( $banner_heading ); ?></h1>
        <p class="mt-3" style="color:rgba(255,255,255,.7);font-size:1.05rem;max-width:560px;"><?php echo esc_html( $banner_subtext ); ?></p>
      </div>
      <div class="col-lg-5 d-none d-lg-flex justify-content-end">
        <nav class="pl-breadcrumb mt-2" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> <?php esc_html_e( 'Home', 'primelink' ); ?></a>
          <span class="sep mx-2" aria-hidden="true">/</span>
          <span class="current"><?php esc_html_e( 'About Us', 'primelink' ); ?></span>
        </nav>
      </div>
    </div>
  </div>
</section>

<!-- STORY -->
<section class="section-lg">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <div class="pl-about-img-wrap">
          <img src="<?php echo esc_url( $story_img ); ?>" alt="<?php esc_attr_e( 'PrimeLink team', 'primelink' ); ?>" class="pl-about-img lazy" loading="lazy" decoding="async" width="700" height="500">
          <div class="pl-about-badge" aria-hidden="true">
            <strong><?php echo esc_html( $est_year ); ?></strong>
            <span><?php esc_html_e( 'Est. Sri Lanka', 'primelink' ); ?></span>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="section-badge"><i class="fa-solid fa-flag fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Our Story', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $story_title ); ?></h2>
        <div class="section-divider"></div>
        <?php foreach ( [ $para1, $para2, $para3 ] as $p ) : if ( $p ) : ?>
        <p class="text-muted-pl"><?php echo esc_html( $p ); ?></p>
        <?php endif; endforeach; ?>
        <div class="d-flex gap-3 flex-wrap mt-3">
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-primary-pl">
            <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Get in Touch', 'primelink' ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="btn-pl btn-outline-dark">
            <i class="fa-solid fa-grid-2 fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Our Services', 'primelink' ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MISSION & VISION -->
<section class="section-lg" style="background:var(--pl-bg);">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-bullseye fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Purpose', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php esc_html_e( 'Mission & Vision', 'primelink' ); ?></h2>
      <div class="section-divider center"></div>
    </div>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="h-100 p-4 rounded-3 bg-white border" style="border-color:var(--pl-border)!important;">
          <div class="pl-why-icon mb-3" style="background:#eff4ff;">
            <i class="fa-solid fa-rocket" style="color:var(--pl-primary);font-size:1.2rem;" aria-hidden="true"></i>
          </div>
          <h3 style="font-size:1.3rem;font-weight:800;margin-bottom:12px;"><?php esc_html_e( 'Our Mission', 'primelink' ); ?></h3>
          <p class="text-muted-pl mb-0"><?php echo esc_html( $mission ); ?></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-4 rounded-3 bg-white border" style="border-color:var(--pl-border)!important;">
          <div class="pl-why-icon mb-3" style="background:#fffbeb;">
            <i class="fa-solid fa-eye" style="color:var(--pl-accent);font-size:1.2rem;" aria-hidden="true"></i>
          </div>
          <h3 style="font-size:1.3rem;font-weight:800;margin-bottom:12px;"><?php esc_html_e( 'Our Vision', 'primelink' ); ?></h3>
          <p class="text-muted-pl mb-0"><?php echo esc_html( $vision ); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- EXPERTISE CARDS -->
<section class="section-lg">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-star fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'What We Do', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php esc_html_e( 'Our Areas of Expertise', 'primelink' ); ?></h2>
      <div class="section-divider center"></div>
    </div>
    <div class="row g-4">
      <?php foreach ( $expertise as $card ) : ?>
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="pl-service-card h-100">
          <div class="pl-service-icon <?php echo esc_attr( $card['color'] ); ?>">
            <i class="fa-solid <?php echo esc_attr( $card['icon'] ); ?>" aria-hidden="true"></i>
          </div>
          <h4><?php echo esc_html( $card['title'] ); ?></h4>
          <p><?php echo esc_html( $card['desc'] ); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CORE VALUES -->
<section class="section-lg" style="background:var(--pl-bg);">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-heart fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'What Drives Us', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php esc_html_e( 'Our Core Values', 'primelink' ); ?></h2>
      <div class="section-divider center"></div>
    </div>
    <div class="row g-4 justify-content-center">
      <?php foreach ( $values as $val ) : ?>
      <div class="col-xl-2 col-lg-4 col-md-4 col-6">
        <div class="text-center p-3">
          <div style="width:60px;height:60px;background:var(--pl-primary-soft);border-radius:var(--pl-radius-md);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;" aria-hidden="true">
            <i class="fa-solid <?php echo esc_attr( $val['icon'] ); ?>" style="color:var(--pl-primary);font-size:1.3rem;" aria-hidden="true"></i>
          </div>
          <h5 style="font-size:0.92rem;font-weight:700;margin-bottom:6px;"><?php echo esc_html( $val['title'] ); ?></h5>
          <p style="font-size:0.8rem;color:var(--pl-text-muted);margin:0;"><?php echo esc_html( $val['desc'] ); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="pl-quote-section section-lg">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <div class="section-badge accent"><i class="fa-solid fa-phone fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Contact Us', 'primelink' ); ?></div>
        <h2 style="color:#fff;font-size:clamp(1.8rem,3.5vw,2.4rem);font-weight:800;letter-spacing:-0.03em;margin:12px 0;"><?php echo esc_html( $cta_heading ); ?></h2>
        <p style="color:rgba(255,255,255,.65);font-size:0.96rem;line-height:1.8;max-width:540px;"><?php echo esc_html( $cta_subtext ); ?></p>
      </div>
      <div class="col-lg-5 d-flex flex-column gap-3">
        <a href="tel:<?php echo esc_attr( pl_site( 'phone_raw' ) ); ?>" class="pl-contact-pill text-decoration-none">
          <div class="pl-contact-pill-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
          <div><strong><?php echo esc_html( pl_site( 'phone' ) ); ?></strong><span><?php esc_html_e( 'Call us anytime', 'primelink' ); ?></span></div>
        </a>
        <a href="mailto:<?php echo esc_attr( pl_site( 'email' ) ); ?>" class="pl-contact-pill text-decoration-none">
          <div class="pl-contact-pill-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></div>
          <div><strong><?php echo esc_html( pl_site( 'email' ) ); ?></strong><span><?php esc_html_e( 'We reply within 24 hours', 'primelink' ); ?></span></div>
        </a>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-accent-pl mt-1" style="align-self:flex-start;">
          <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Request a Quotation', 'primelink' ); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
