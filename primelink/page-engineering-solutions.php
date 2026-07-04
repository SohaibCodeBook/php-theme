<?php
/**
 * Template Name: Engineering Solutions
 */
get_header();

// ── All content reads from Customizer → Engineering Solutions Page

$banner_badge   = pl_eng( 'banner_badge',   'Engineering' );
$banner_heading = pl_eng( 'banner_heading', 'Engineering Solutions' );
$banner_subtext = pl_eng( 'banner_subtext', 'Professional geotechnical investigations, landslide mitigation, GIS mapping, and AutoCAD design services for Sri Lankan projects.' );

// Geotechnical
$geo_heading = pl_eng( 'geo_heading', 'Geotechnical Engineering' );
$geo_intro   = pl_eng( 'geo_intro',   'We carry out comprehensive geotechnical site investigations for construction, housing, infrastructure, and research projects. Our investigations provide the ground data needed to make informed foundation and design decisions.' );
$geo_pricing = pl_eng( 'geo_pricing', 'Starting from LKR 100,000. Larger investigations range up to LKR 500,000+ depending on number of boreholes and depth required.' );
$geo_image   = pl_eng( 'geo_image',   'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=700&q=75&auto=format&fit=crop' );
$geo_defaults = [ 'Soil Investigation & Sampling','Standard Penetration Test (SPT)','Borehole Drilling Through Soil','Rock Core Drilling & Core Logging','Field & Laboratory Testing','Geotechnical Engineering Reports','Foundation Depth Recommendations','Bearing Capacity Analysis' ];
$geo_items = [];
for ( $i = 1; $i <= 8; $i++ ) {
    $v = pl_eng( 'geo_item'.$i, $geo_defaults[ $i - 1 ] );
    if ( $v ) $geo_items[] = $v;
}

// Landslide
$ls_heading = pl_eng( 'ls_heading', 'Landslide Mitigation & Slope Engineering' );
$ls_intro   = pl_eng( 'ls_intro',   "Sri Lanka's hilly terrain presents unique challenges for construction and infrastructure. PrimeLink specialises in evaluating unstable slopes, designing mitigation measures, and providing engineering solutions for sites previously rejected due to slope instability." );
$ls_image   = pl_eng( 'ls_image',   'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=700&q=75&auto=format&fit=crop' );
$ls_defaults = [ 'Landslide Mitigation Works','Retaining Wall Design','Slope Stabilisation Solutions','Earth Reinforcement Systems','Gov-Rejected Site Re-evaluation','Site Stability Assessments','Slope Stability Analysis (GeoStudio)','PLAXIS Modelling','Factor of Safety Calculations','Foundation Recommendations' ];
$ls_items = [];
for ( $i = 1; $i <= 10; $i++ ) {
    $v = pl_eng( 'ls_item'.$i, $ls_defaults[ $i - 1 ] );
    if ( $v ) $ls_items[] = $v;
}

// GIS
$gis_heading  = pl_eng( 'gis_heading', 'GIS & Mapping Solutions' );
$gis_intro    = pl_eng( 'gis_intro',   'We provide GIS mapping and spatial analysis for engineering companies, government agencies, universities, and individual researchers. Our GIS team works with ArcGIS and QGIS to deliver accurate, professionally produced spatial outputs.' );
$gis_warning  = pl_eng( 'gis_warning', 'PrimeLink only accepts legitimate project work. GIS support is available for genuine research, industry projects, and approved academic work.' );
$gis_image    = pl_eng( 'gis_image',   'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=700&q=75&auto=format&fit=crop' );
$gis_cap_def  = [ 'ArcGIS Projects','QGIS Projects','Spatial Analysis','Terrain Modelling','Highway Engineering GIS','Infrastructure Studies','University Research Support','Government Projects' ];
$gis_caps = [];
for ( $i = 1; $i <= 8; $i++ ) {
    $v = pl_eng( 'gis_cap'.$i, $gis_cap_def[ $i - 1 ] );
    if ( $v ) $gis_caps[] = $v;
}

// AutoCAD
$autocad_heading = pl_eng( 'autocad_heading', 'AutoCAD & Engineering Design' );
$autocad_card_def = [
    [ 'fa-pen-ruler',     'AutoCAD Drafting',    'Precise engineering drawings and technical drafting to professional standards.' ],
    [ 'fa-house-chimney', 'Housing Plans',       'Residential housing layout plans, floor plans, and elevation drawings for permit submission.' ],
    [ 'fa-building',      'Building Layouts',    'Architectural and structural layout plans for commercial and residential projects.' ],
    [ 'fa-compass',       'Structural Concepts', 'Conceptual structural designs and sketches for review and planning purposes.' ],
    [ 'fa-map-location',  'Site Plans',          'Site layout plans including boundaries, setbacks, and infrastructure locations.' ],
    [ 'fa-city',          'Large Scale Projects','Drafting support for larger engineering and infrastructure development projects.' ],
];
$autocad_cards = [];
for ( $i = 1; $i <= 6; $i++ ) {
    $autocad_cards[] = [
        'icon'  => $autocad_card_def[ $i - 1 ][0],
        'title' => pl_eng( 'autocad_card'.$i.'_title', $autocad_card_def[ $i - 1 ][1] ),
        'desc'  => pl_eng( 'autocad_card'.$i.'_desc',  $autocad_card_def[ $i - 1 ][2] ),
    ];
}

// Projects
$projects_subtitle = pl_eng( 'projects_subtitle', 'A selection of representative projects by our engineering team. Images are illustrative and will be updated with actual project photographs.' );

// CTA
$cta_heading = pl_eng( 'cta_heading', 'Discuss Your Engineering Project' );
$cta_subtext = pl_eng( 'cta_subtext', 'Contact our engineering team for project quotes on geotechnical, GIS, AutoCAD, and construction consultancy services.' );

// Map
$default_map = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9!2d80.00222!3d7.08643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f8b5bdb5b0ab%3A0x5d7b3f0f3f7b3f0f!2s54A%20Sanasa%20Ideal%20Shopping%20Complex%2C%20Colombo%20Rd%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1';
$map_url = pl_field( get_the_ID(), 'map_embed_url', $default_map );
?>

<!-- PAGE BANNER -->
<section class="pl-page-banner">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3"><i class="fa-solid fa-mountain fa-xs me-2" aria-hidden="true"></i><?php echo esc_html( $banner_badge ); ?></div>
    <h1><?php echo esc_html( $banner_heading ); ?></h1>
    <p class="mt-2" style="color:rgba(255,255,255,.7);font-size:1rem;max-width:600px;"><?php echo esc_html( $banner_subtext ); ?></p>
    <nav class="pl-breadcrumb mt-3" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> <?php esc_html_e( 'Home', 'primelink' ); ?></a>
      <span class="sep mx-2" aria-hidden="true">/</span>
      <span class="current"><?php esc_html_e( 'Engineering Solutions', 'primelink' ); ?></span>
    </nav>
  </div>
</section>

<section class="section-lg">
  <div class="container">

    <!-- Section jump links -->
    <div class="row g-4 justify-content-center text-center mb-5">
      <?php foreach ( [ [ 'fa-mountain','Geotechnical','#geotech' ], [ 'fa-shield-halved','Landslide Mitigation','#landslide' ], [ 'fa-map','GIS & Mapping','#gis' ], [ 'fa-drafting-compass','AutoCAD Design','#autocad' ], [ 'fa-folder-open','Projects','#projects' ] ] as [ $icon, $label, $href ] ) : ?>
      <div class="col-auto">
        <a href="<?php echo esc_attr( $href ); ?>" class="btn-pl btn-outline-dark btn-sm-pl">
          <i class="fa-solid <?php echo esc_attr( $icon ); ?> fa-sm" aria-hidden="true"></i> <?php echo esc_html( $label ); ?>
        </a>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- GEOTECHNICAL -->
    <div id="geotech" class="row align-items-center g-5 mb-5 pb-5" style="border-bottom:1px solid var(--pl-border);">
      <div class="col-lg-5">
        <img src="<?php echo esc_url( $geo_image ); ?>" alt="<?php esc_attr_e( 'Borehole drilling and soil investigation', 'primelink' ); ?>" loading="lazy" class="lazy w-100 rounded-4 shadow-lg" style="height:380px;object-fit:cover;">
      </div>
      <div class="col-lg-7">
        <div class="section-badge"><i class="fa-solid fa-mountain fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Ground Investigation', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $geo_heading ); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl"><?php echo esc_html( $geo_intro ); ?></p>
        <div class="row g-2 my-3">
          <?php foreach ( $geo_items as $s ) : ?>
          <div class="col-md-6">
            <div class="d-flex align-items-center gap-2" style="font-size:0.87rem;padding:5px 0;border-bottom:1px solid var(--pl-border);">
              <i class="fa-solid fa-check-circle" style="color:var(--pl-success);font-size:0.8rem;" aria-hidden="true"></i><?php echo esc_html( $s ); ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="pl-alert info mt-3">
          <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
          <p><strong><?php esc_html_e( 'Typical Pricing:', 'primelink' ); ?></strong> <?php echo esc_html( $geo_pricing ); ?></p>
        </div>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-primary-pl mt-3">
          <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Request a Quotation', 'primelink' ); ?>
        </a>
      </div>
    </div>

    <!-- LANDSLIDE -->
    <div id="landslide" class="row align-items-center g-5 mb-5 pb-5" style="border-bottom:1px solid var(--pl-border);">
      <div class="col-lg-7 order-2 order-lg-1">
        <div class="section-badge"><i class="fa-solid fa-shield-halved fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Slope Engineering', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $ls_heading ); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl"><?php echo esc_html( $ls_intro ); ?></p>
        <div class="row g-2 my-3">
          <?php foreach ( $ls_items as $s ) : ?>
          <div class="col-md-6">
            <div class="d-flex align-items-center gap-2" style="font-size:0.87rem;padding:5px 0;border-bottom:1px solid var(--pl-border);">
              <i class="fa-solid fa-check-circle" style="color:var(--pl-success);font-size:0.8rem;" aria-hidden="true"></i><?php echo esc_html( $s ); ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-primary-pl mt-2">
          <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Contact Us for Quotation', 'primelink' ); ?>
        </a>
      </div>
      <div class="col-lg-5 order-1 order-lg-2">
        <img src="<?php echo esc_url( $ls_image ); ?>" alt="<?php esc_attr_e( 'Slope stabilisation', 'primelink' ); ?>" loading="lazy" class="lazy w-100 rounded-4 shadow-lg" style="height:380px;object-fit:cover;">
      </div>
    </div>

    <!-- GIS -->
    <div id="gis" class="row align-items-center g-5 mb-5 pb-5" style="border-bottom:1px solid var(--pl-border);">
      <div class="col-lg-5">
        <img src="<?php echo esc_url( $gis_image ); ?>" alt="<?php esc_attr_e( 'GIS mapping', 'primelink' ); ?>" loading="lazy" class="lazy w-100 rounded-4 shadow-lg" style="height:380px;object-fit:cover;">
      </div>
      <div class="col-lg-7">
        <div class="section-badge"><i class="fa-solid fa-map fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Spatial Solutions', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $gis_heading ); ?></h2>
        <div class="section-divider"></div>
        <p class="text-muted-pl"><?php echo esc_html( $gis_intro ); ?></p>
        <div class="row g-3 my-3">
          <?php foreach ( $gis_caps as $cap ) : ?>
          <div class="col-6 col-md-3">
            <div class="text-center p-2 rounded-3" style="background:var(--pl-primary-soft);">
              <span style="font-size:0.8rem;font-weight:600;color:var(--pl-primary);"><?php echo esc_html( $cap ); ?></span>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="pl-alert warning">
          <i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i>
          <p><?php echo esc_html( $gis_warning ); ?></p>
        </div>
      </div>
    </div>

    <!-- AUTOCAD -->
    <div id="autocad">
      <div class="text-center mb-5">
        <div class="section-badge mx-auto"><i class="fa-solid fa-drafting-compass fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Design & Drafting', 'primelink' ); ?></div>
        <h2 class="section-title mt-3"><?php echo esc_html( $autocad_heading ); ?></h2>
        <div class="section-divider center"></div>
      </div>
      <div class="row g-4">
        <?php foreach ( $autocad_cards as $card ) : ?>
        <div class="col-lg-4 col-md-6">
          <div class="pl-service-card h-100">
            <div class="pl-service-icon blue"><i class="fa-solid <?php echo esc_attr( $card['icon'] ); ?>" aria-hidden="true"></i></div>
            <h4><?php echo esc_html( $card['title'] ); ?></h4>
            <p><?php echo esc_html( $card['desc'] ); ?></p>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="pl-service-link"><?php esc_html_e( 'Get Quote', 'primelink' ); ?> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED PROJECTS -->
<section class="section-lg" style="background:var(--pl-bg);" id="projects">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-folder-open fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Our Work', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php esc_html_e( 'Featured Projects', 'primelink' ); ?></h2>
      <div class="section-divider center"></div>
      <p class="section-subtitle"><?php echo esc_html( $projects_subtitle ); ?></p>
    </div>
    <div class="row g-4">
      <?php
      $projects = [
        [ 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=70&auto=format&fit=crop','Geotechnical Investigation – Residential Development','Borehole drilling, SPT testing, and engineering report for a multi-unit residential development.','Gampaha District','Geotechnical' ],
        [ 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=600&q=70&auto=format&fit=crop','Slope Stabilisation – Re-evaluated Site','Re-evaluation and slope stability analysis for a government-rejected site, with retaining wall design.','Kandy','Landslide Mitigation' ],
        [ 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=600&q=70&auto=format&fit=crop','GIS Terrain Mapping – Highway Study','ArcGIS-based terrain analysis and spatial data mapping for an infrastructure development corridor.','Western Province','GIS Mapping' ],
        [ 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=600&q=70&auto=format&fit=crop','Housing Plan Design – Residential Property','Complete AutoCAD housing plan set including floor plans, elevations, and site layout for permit submission.','Colombo','AutoCAD' ],
        [ 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=600&q=70&auto=format&fit=crop','Rock Core Drilling – Foundation Investigation','Rock core drilling through soil and into bedrock to determine foundation depth for a commercial building.','Gampaha','Geotechnical' ],
        [ 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=70&auto=format&fit=crop','Earth Reinforcement – Road Embankment','Design and technical supervision of earth reinforcement for a road embankment stabilisation project.','Kurunegala','Construction' ],
      ];
      foreach ( $projects as [ $img, $title, $desc, $loc, $tag ] ) : ?>
      <div class="col-lg-4 col-md-6">
        <div class="pl-project-card h-100">
          <div class="pl-project-img-wrap">
            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy" class="lazy">
            <div class="pl-project-overlay"><span class="pl-project-tag"><?php echo esc_html( $tag ); ?></span></div>
          </div>
          <div class="pl-project-body">
            <h5><?php echo esc_html( $title ); ?></h5>
            <p><?php echo esc_html( $desc ); ?></p>
            <div class="pl-project-meta"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> <?php echo esc_html( $loc ); ?>, Sri Lanka</div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ENQUIRY FORM -->
<section class="pl-quote-section section-lg">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <div class="section-badge accent"><i class="fa-solid fa-file-invoice fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Engineering Enquiry', 'primelink' ); ?></div>
        <div class="pl-quote-info mt-3">
          <h2><?php echo esc_html( $cta_heading ); ?></h2>
          <p class="lead"><?php echo esc_html( $cta_subtext ); ?></p>
          <a href="tel:<?php echo esc_attr( pl_site( 'phone_raw' ) ); ?>" class="pl-contact-pill text-decoration-none mb-2">
            <div class="pl-contact-pill-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
            <div><strong><?php echo esc_html( pl_site( 'phone' ) ); ?></strong><span><?php esc_html_e( 'Call our engineering team', 'primelink' ); ?></span></div>
          </a>
          <a href="https://wa.me/<?php echo esc_attr( pl_site( 'whatsapp' ) ); ?>" class="pl-contact-pill text-decoration-none" target="_blank" rel="noopener noreferrer">
            <div class="pl-contact-pill-icon"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></div>
            <div><strong><?php esc_html_e( 'WhatsApp Us', 'primelink' ); ?></strong><span><?php esc_html_e( 'Quick response', 'primelink' ); ?></span></div>
          </a>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="pl-form-card">
          <h3><?php esc_html_e( 'Engineering Enquiry Form', 'primelink' ); ?></h3>
          <p class="subtitle"><?php esc_html_e( 'Describe your project and our engineers will respond promptly.', 'primelink' ); ?></p>
          <form id="eng-quote-form" novalidate>
            <div class="row g-3">
              <div class="col-md-6"><div class="pl-form-group"><label for="eq-name"><?php esc_html_e( 'Full Name', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><input type="text" id="eq-name" name="name" placeholder="<?php esc_attr_e( 'Your name', 'primelink' ); ?>" required autocomplete="name" aria-required="true"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="eq-phone"><?php esc_html_e( 'Phone Number', 'primelink' ); ?></label><input type="tel" id="eq-phone" name="phone" placeholder="+94 77X XXX XXX" autocomplete="tel"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="eq-email"><?php esc_html_e( 'Email Address', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><input type="email" id="eq-email" name="email" placeholder="your@email.com" required autocomplete="email" aria-required="true"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="eq-subject"><?php esc_html_e( 'Service Required', 'primelink' ); ?></label>
                <select id="eq-subject" name="subject">
                  <?php foreach ( [ 'Geotechnical Engineering','Landslide Mitigation','Slope Stability Analysis','GIS Mapping','AutoCAD Drafting','Construction Consultancy','Engineering Report' ] as $opt ) : ?>
                  <option><?php echo esc_html( $opt ); ?></option>
                  <?php endforeach; ?>
                </select></div></div>
              <div class="col-12"><div class="pl-form-group"><label for="eq-message"><?php esc_html_e( 'Project Details', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><textarea id="eq-message" name="message" rows="4" placeholder="<?php esc_attr_e( 'Describe your project location, requirements, and specific details…', 'primelink' ); ?>" required aria-required="true"></textarea></div></div>
            </div>
            <div id="eng-quote-form-msg" class="form-msg" role="status" aria-live="polite"></div>
            <button type="submit" class="btn-pl btn-primary-pl w-100 justify-content-center mt-2">
              <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Send Engineering Enquiry', 'primelink' ); ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="pl-map-wrap" style="border-radius:0;margin-top:0;">
  <iframe src="<?php echo esc_url( $map_url ); ?>" width="100%" height="420" style="border:0;display:block;" allowfullscreen="" loading="lazy" title="<?php esc_attr_e( 'PrimeLink Holdings location in Gampaha', 'primelink' ); ?>"></iframe>
</div>

<?php get_footer(); ?>
