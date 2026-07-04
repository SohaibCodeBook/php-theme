<?php
/**
 * Template Name: IT Services
 */
get_header();

// ── All content reads from Customizer → IT Services Page

$banner_badge   = pl_it( 'banner_badge',   'Technology' );
$banner_heading = pl_it( 'banner_heading', 'IT Services & Products' );
$banner_subtext = pl_it( 'banner_subtext', 'Custom software development, business systems, laptops, hardware, and technical support for Sri Lankan businesses.' );

$sw_heading  = pl_it( 'sw_heading',  'Software Solutions for Sri Lankan Businesses' );
$sw_subtitle = pl_it( 'sw_subtitle', 'Custom-built software systems designed specifically for small and medium businesses in Sri Lanka. Cost-effective, reliable, and easy to use.' );

// Software cards (6)
$sw_icon  = [ 'fa-cash-register','fa-utensils','fa-barcode','fa-database','fa-code','fa-headset' ];
$sw_color = [ 'amber','green','blue','purple','cyan','pink' ];
$sw_card_def = [
    1 => [ 'Retail Cashier Software',        'LKR 50,000',   'Complete point-of-sale system for retail shops. Handles sales, receipts, daily reports, and user management.',        [ 'Sales & receipt printing','Daily sales reports','Multiple user accounts','Product catalog management' ] ],
    2 => [ 'Restaurant Management System',   'LKR 50,000',   'Table management, order tracking, kitchen display, and billing system for restaurants and cafes.',                    [ 'Table & order management','Kitchen order display','Menu management','Daily revenue reports' ] ],
    3 => [ 'Barcode & Inventory System',      'LKR 75,000',   'Full inventory management with barcode scanning, stock tracking, purchase orders, and reporting.',                    [ 'Barcode scanning support','Stock in/out tracking','Low stock alerts','Purchase order management' ] ],
    4 => [ 'Database Development',            'LKR 45,000',   'Custom database design and setup for businesses needing secure, structured data management solutions.',                [ 'Database design & setup','Data entry forms','Reporting & exports','User access control' ] ],
    5 => [ 'Custom Business Software',        'LKR 100,000+', 'Fully customized business applications built to your exact workflow and business process requirements.',              [ 'Requirements analysis','Custom UI design','Process automation','Training & documentation' ] ],
    6 => [ 'Technical Support & Maintenance', 'Contact Us',   'Ongoing technical support, software maintenance, updates, and IT troubleshooting for businesses.',                    [ 'Remote & on-site support','Software updates','Bug fixing & improvements','Staff training' ] ],
];
$sw_cards = [];
for ( $i = 1; $i <= 6; $i++ ) {
    $sw_cards[] = [
        'icon'     => $sw_icon[ $i - 1 ],
        'color'    => $sw_color[ $i - 1 ],
        'title'    => pl_it( 'sw'.$i.'_title', $sw_card_def[$i][0] ),
        'price'    => pl_it( 'sw'.$i.'_price', $sw_card_def[$i][1] ),
        'desc'     => pl_it( 'sw'.$i.'_desc',  $sw_card_def[$i][2] ),
        'features' => $sw_card_def[$i][3],
    ];
}

$laptop_heading  = pl_it( 'laptop_heading',  'Laptops & Computers' );
$laptop_subtitle = pl_it( 'laptop_subtitle', 'A selection of laptops available at our Gampaha outlet. Contact us for current stock and pricing.' );
$hw_heading      = pl_it( 'hw_heading',   'Hardware & Accessories' );
$repair_heading  = pl_it( 'repair_heading', 'Computer Repair & Technical Support' );
$cta_heading     = pl_it( 'cta_heading', 'Send Your IT Enquiry' );
$cta_subtext     = pl_it( 'cta_subtext', 'For software, hardware, or technical support enquiries. We respond within 24 hours on business days.' );
$default_map     = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9!2d80.00222!3d7.08643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f8b5bdb5b0ab%3A0x5d7b3f0f3f7b3f0f!2s54A%20Sanasa%20Ideal%20Shopping%20Complex%2C%20Colombo%20Rd%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1';
$map_url         = pl_it( 'map_url', $default_map );
?>

<!-- PAGE BANNER -->
<section class="pl-page-banner">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3"><i class="fa-solid fa-laptop-code fa-xs me-2" aria-hidden="true"></i><?php echo esc_html( $banner_badge ); ?></div>
    <h1><?php echo esc_html( $banner_heading ); ?></h1>
    <p class="mt-2" style="color:rgba(255,255,255,.7);font-size:1rem;max-width:580px;"><?php echo esc_html( $banner_subtext ); ?></p>
    <nav class="pl-breadcrumb mt-3" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> <?php esc_html_e( 'Home', 'primelink' ); ?></a>
      <span class="sep mx-2" aria-hidden="true">/</span>
      <span class="current"><?php esc_html_e( 'IT Services', 'primelink' ); ?></span>
    </nav>
  </div>
</section>

<!-- SOFTWARE SOLUTIONS -->
<section class="section-lg">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-code fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Business Software', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php echo esc_html( $sw_heading ); ?></h2>
      <div class="section-divider center"></div>
      <p class="section-subtitle"><?php echo esc_html( $sw_subtitle ); ?></p>
    </div>
    <div class="row g-4">
      <?php foreach ( $sw_cards as $card ) : ?>
      <div class="col-lg-4 col-md-6">
        <div class="pl-service-card h-100">
          <div class="pl-service-icon <?php echo esc_attr( $card['color'] ); ?>">
            <i class="fa-solid <?php echo esc_attr( $card['icon'] ); ?>" aria-hidden="true"></i>
          </div>
          <h4><?php echo esc_html( $card['title'] ); ?></h4>
          <p style="font-size:0.82rem;font-weight:700;color:var(--pl-primary);margin-bottom:8px;"><?php echo esc_html( $card['price'] ); ?></p>
          <p><?php echo esc_html( $card['desc'] ); ?></p>
          <ul style="margin:8px 0 16px;padding:0;">
            <?php foreach ( $card['features'] as $f ) : ?>
            <li style="display:flex;align-items:center;gap:8px;font-size:0.82rem;color:var(--pl-text-muted);padding:3px 0;">
              <i class="fa-solid fa-check" style="color:var(--pl-success);font-size:0.7rem;" aria-hidden="true"></i><?php echo esc_html( $f ); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="pl-service-link mt-auto">
            <?php esc_html_e( 'Get Quote', 'primelink' ); ?> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- LAPTOPS -->
<section class="section-lg" style="background:var(--pl-bg);">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-laptop fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Computer Products', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php echo esc_html( $laptop_heading ); ?></h2>
      <div class="section-divider center"></div>
      <p class="section-subtitle"><?php echo esc_html( $laptop_subtitle ); ?></p>
    </div>
    <div class="row g-4">
      <?php
      $laptops = [
        [ 'Dell','Dell Latitude 5430',  'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&q=70&auto=format&fit=crop',[ 'Intel Core i5 12th Gen','8GB DDR4 RAM','256GB SSD','14" FHD Display','Windows 11 Pro' ] ],
        [ 'Dell','Dell Inspiron 15',    'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=400&q=70&auto=format&fit=crop',[ 'Intel Core i3 12th Gen','8GB RAM','512GB HDD','15.6" HD Display','Windows 11 Home' ] ],
        [ 'Dell','Dell Vostro 3510',    'https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?w=400&q=70&auto=format&fit=crop',[ 'Intel Core i5 11th Gen','16GB RAM','512GB SSD','15.6" FHD','Ubuntu / Windows' ] ],
        [ 'ASUS','ASUS VivoBook 15',    'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=400&q=70&auto=format&fit=crop',[ 'AMD Ryzen 5 5600H','8GB RAM','512GB SSD','15.6" FHD','Windows 11 Home' ] ],
        [ 'ASUS','ASUS ExpertBook B1',  'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&q=70&auto=format&fit=crop',[ 'Intel Core i5 12th Gen','8GB RAM','256GB SSD','14" FHD','Windows 11 Pro' ] ],
        [ 'ASUS','ASUS ZenBook 14',     'https://images.unsplash.com/photo-1611078489935-0cb964de46d6?w=400&q=70&auto=format&fit=crop',[ 'Intel Core i7 12th Gen','16GB RAM','512GB NVMe SSD','14" OLED FHD','Windows 11 Home' ] ],
      ];
      foreach ( $laptops as [ $brand, $model, $img, $specs ] ) : ?>
      <div class="col-xl-4 col-md-6">
        <div class="pl-product-card h-100">
          <div class="pl-product-img">
            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $model ); ?>" loading="lazy" class="lazy">
          </div>
          <div class="pl-product-body">
            <span class="pl-brand-chip"><?php echo esc_html( $brand ); ?></span>
            <h5><?php echo esc_html( $model ); ?></h5>
            <ul class="pl-product-specs">
              <?php foreach ( $specs as $spec ) : ?>
              <li><i class="fa-solid fa-circle fa-xs" aria-hidden="true"></i><?php echo esc_html( $spec ); ?></li>
              <?php endforeach; ?>
            </ul>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-primary-pl btn-sm-pl w-100 justify-content-center">
              <i class="fa-solid fa-phone fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Contact Us', 'primelink' ); ?>
            </a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="text-center mt-4 text-muted-pl" style="font-size:0.83rem;">
      <i class="fa-solid fa-circle-info me-1" aria-hidden="true"></i><?php esc_html_e( 'Product listings are for display purposes. Contact us to confirm current stock and pricing.', 'primelink' ); ?>
    </p>
  </div>
</section>

<!-- HARDWARE -->
<section class="section-lg">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-microchip fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Components & Peripherals', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php echo esc_html( $hw_heading ); ?></h2>
      <div class="section-divider center"></div>
    </div>
    <div class="row g-4">
      <?php foreach ( [ [ 'fa-hard-drive','blue','Storage','SSDs – SATA & NVMe, Hard Disk Drives, USB Flash Drives, External Storage Devices' ],[ 'fa-memory','purple','Memory','DDR4 & DDR5 RAM Modules, Laptop RAM Upgrades, Server RAM' ],[ 'fa-keyboard','amber','Peripherals','Keyboards, Optical & Gaming Mice, LED & IPS Monitors, Headphones & Speakers' ],[ 'fa-wifi','green','Networking','Wi-Fi Routers, Network Switches, Ethernet Cables, Powerline Adapters' ],[ 'fa-plug','cyan','Cables & Power','HDMI & DisplayPort Cables, USB-C Cables, Power Banks, Laptop Chargers' ],[ 'fa-desktop','pink','Computer Systems','Desktop PCs, All-in-One Computers, Mini PCs, Workstations' ] ] as [ $icon, $color, $title, $items ] ) : ?>
      <div class="col-lg-4 col-md-6">
        <div class="pl-service-card h-100">
          <div class="pl-service-icon <?php echo esc_attr( $color ); ?>"><i class="fa-solid <?php echo esc_attr( $icon ); ?>" aria-hidden="true"></i></div>
          <h4><?php echo esc_html( $title ); ?></h4>
          <p class="text-muted-pl" style="font-size:0.87rem;"><?php echo esc_html( $items ); ?></p>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="pl-service-link"><?php esc_html_e( 'Enquire Now', 'primelink' ); ?> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- REPAIR & SUPPORT -->
<section class="section-lg" style="background:var(--pl-bg);">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-badge mx-auto"><i class="fa-solid fa-screwdriver-wrench fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'Repair & Support', 'primelink' ); ?></div>
      <h2 class="section-title mt-3"><?php echo esc_html( $repair_heading ); ?></h2>
      <div class="section-divider center"></div>
    </div>
    <div class="row g-4">
      <?php foreach ( [ [ 'fa-laptop','Laptop Repair','Screen replacements, keyboard repairs, charging port fixes, and hardware fault diagnosis.' ],[ 'fa-magnifying-glass','Computer Troubleshooting','Diagnosing and resolving hardware and software issues for desktops and laptops.' ],[ 'fa-screwdriver-wrench','Hardware Installation','RAM upgrades, SSD upgrades, GPU installation, and component replacements.' ],[ 'fa-floppy-disk','Software Installation','Operating system installation, driver setup, software configuration, and activation.' ],[ 'fa-shield-virus','System Maintenance','Virus removal, disk cleanup, performance optimisation, and system health checks.' ],[ 'fa-headset','Business IT Support','On-site and remote IT support for small businesses and professional offices.' ] ] as [ $icon, $title, $desc ] ) : ?>
      <div class="col-lg-4 col-md-6">
        <div class="pl-why-card h-100">
          <div class="pl-why-icon"><i class="fa-solid <?php echo esc_attr( $icon ); ?>" aria-hidden="true"></i></div>
          <h5><?php echo esc_html( $title ); ?></h5>
          <p><?php echo esc_html( $desc ); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- IT ENQUIRY FORM -->
<section class="pl-quote-section section-lg">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <div class="section-badge accent"><i class="fa-solid fa-laptop fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'IT Enquiry', 'primelink' ); ?></div>
        <div class="pl-quote-info mt-3">
          <h2><?php echo esc_html( $cta_heading ); ?></h2>
          <p class="lead"><?php echo esc_html( $cta_subtext ); ?></p>
          <a href="tel:<?php echo esc_attr( pl_site( 'phone_raw' ) ); ?>" class="pl-contact-pill text-decoration-none mb-2">
            <div class="pl-contact-pill-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
            <div><strong><?php echo esc_html( pl_site( 'phone' ) ); ?></strong><span><?php esc_html_e( 'Call or WhatsApp', 'primelink' ); ?></span></div>
          </a>
          <a href="<?php echo esc_url( home_url( '/outlets' ) ); ?>" class="pl-contact-pill text-decoration-none">
            <div class="pl-contact-pill-icon"><i class="fa-solid fa-store" aria-hidden="true"></i></div>
            <div><strong><?php esc_html_e( 'Visit Our Outlet', 'primelink' ); ?></strong><span><?php echo esc_html( pl_site( 'address_short' ) ); ?></span></div>
          </a>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="pl-form-card">
          <h3><?php esc_html_e( 'IT & Software Enquiry', 'primelink' ); ?></h3>
          <p class="subtitle"><?php esc_html_e( "Tell us what you need and we'll get back to you promptly.", 'primelink' ); ?></p>
          <form id="it-quote-form" novalidate>
            <div class="row g-3">
              <div class="col-md-6"><div class="pl-form-group"><label for="iq-name"><?php esc_html_e( 'Full Name', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><input type="text" id="iq-name" name="name" placeholder="<?php esc_attr_e( 'Your name', 'primelink' ); ?>" required autocomplete="name" aria-required="true"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="iq-phone"><?php esc_html_e( 'Phone Number', 'primelink' ); ?></label><input type="tel" id="iq-phone" name="phone" placeholder="+94 77X XXX XXX" autocomplete="tel"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="iq-email"><?php esc_html_e( 'Email Address', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><input type="email" id="iq-email" name="email" placeholder="your@email.com" required autocomplete="email" aria-required="true"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="iq-subject"><?php esc_html_e( 'Enquiry Type', 'primelink' ); ?></label>
                <select id="iq-subject" name="subject">
                  <?php foreach ( [ 'Software Development','Database Solution','Cashier / POS System','Laptop / Computer Purchase','Hardware / Accessories','Computer Repair','Technical Support','General IT Enquiry' ] as $opt ) : ?>
                  <option><?php echo esc_html( $opt ); ?></option>
                  <?php endforeach; ?>
                </select></div></div>
              <div class="col-12"><div class="pl-form-group"><label for="iq-message"><?php esc_html_e( 'Details', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><textarea id="iq-message" name="message" rows="4" placeholder="<?php esc_attr_e( 'Describe your requirements…', 'primelink' ); ?>" required aria-required="true"></textarea></div></div>
            </div>
            <div id="it-quote-form-msg" class="form-msg" role="status" aria-live="polite"></div>
            <button type="submit" class="btn-pl btn-primary-pl w-100 justify-content-center mt-2">
              <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Send IT Enquiry', 'primelink' ); ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="pl-map-wrap" style="border-radius:0;">
  <iframe src="<?php echo esc_url( $map_url ); ?>" width="100%" height="380" style="border:0;display:block;" allowfullscreen="" loading="lazy" title="<?php esc_attr_e( 'PrimeLink Holdings – Gampaha', 'primelink' ); ?>"></iframe>
</div>

<?php get_footer(); ?>
