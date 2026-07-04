<?php
/**
 * Template Name: Contact
 */
get_header();

// ── All content reads from Customizer → Contact Page + Contact Info (Global)

$banner_badge   = pl_contact_page( 'banner_badge',   'Get In Touch' );
$banner_heading = pl_contact_page( 'banner_heading', 'Contact PrimeLink Holdings' );
$banner_subtext = pl_contact_page( 'banner_subtext', 'Have a project enquiry, need a quotation, or want to discuss a service? Our team is ready to assist.' );
$form_heading   = pl_contact_page( 'form_heading',   'Send Us a Message' );
$form_subtitle  = pl_contact_page( 'form_subtitle',  'Use this form for project enquiries, quotation requests, or general questions. We respond within 24 hours on business days.' );
$default_map    = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9!2d80.00222!3d7.08643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f8b5bdb5b0ab%3A0x5d7b3f0f3f7b3f0f!2s54A%20Sanasa%20Ideal%20Shopping%20Complex%2C%20Colombo%20Rd%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1';
$map_url        = pl_contact_page( 'map_url', $default_map );

// Contact details from global Contact Info
$address  = pl_site( 'address_full' );
$phone    = pl_site( 'phone' );
$phone_r  = pl_site( 'phone_raw' );
$whatsapp = pl_site( 'whatsapp' );
$email    = pl_site( 'email' );
$h_week   = pl_site( 'hours_weekday' );
$h_sat    = pl_site( 'hours_sat' );
?>

<!-- PAGE BANNER -->
<section class="pl-page-banner">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3"><i class="fa-solid fa-envelope fa-xs me-2" aria-hidden="true"></i><?php echo esc_html( $banner_badge ); ?></div>
    <h1><?php echo esc_html( $banner_heading ); ?></h1>
    <p class="mt-2" style="color:rgba(255,255,255,.7);font-size:1rem;max-width:540px;"><?php echo esc_html( $banner_subtext ); ?></p>
    <nav class="pl-breadcrumb mt-3" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> <?php esc_html_e( 'Home', 'primelink' ); ?></a>
      <span class="sep mx-2" aria-hidden="true">/</span>
      <span class="current"><?php esc_html_e( 'Contact', 'primelink' ); ?></span>
    </nav>
  </div>
</section>

<!-- CONTACT SECTION -->
<section class="section-lg">
  <div class="container">
    <div class="row g-5">

      <!-- Info Card -->
      <div class="col-lg-4">
        <div class="pl-contact-info-card">
          <h3><?php esc_html_e( 'PrimeLink Holdings', 'primelink' ); ?></h3>
          <p><?php esc_html_e( 'We serve clients across Sri Lanka. Reach us through any of the channels below, or visit our office in Gampaha.', 'primelink' ); ?></p>
          <div class="pl-contact-item">
            <div class="pl-contact-item-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></div>
            <div><strong><?php esc_html_e( 'Office Address', 'primelink' ); ?></strong><span><?php echo esc_html( $address ); ?></span></div>
          </div>
          <div class="pl-contact-item">
            <div class="pl-contact-item-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
            <div><strong><?php esc_html_e( 'Phone', 'primelink' ); ?></strong><a href="tel:<?php echo esc_attr( $phone_r ); ?>"><?php echo esc_html( $phone ); ?></a></div>
          </div>
          <div class="pl-contact-item">
            <div class="pl-contact-item-icon"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></div>
            <div><strong><?php esc_html_e( 'WhatsApp', 'primelink' ); ?></strong><a href="https://wa.me/<?php echo esc_attr( $whatsapp ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $phone ); ?></a></div>
          </div>
          <div class="pl-contact-item">
            <div class="pl-contact-item-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></div>
            <div><strong><?php esc_html_e( 'Email', 'primelink' ); ?></strong><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></div>
          </div>
          <div class="pl-hours-list">
            <h5><?php esc_html_e( 'Business Hours', 'primelink' ); ?></h5>
            <div class="pl-hours-row"><span><?php esc_html_e( 'Monday – Friday', 'primelink' ); ?></span><span><?php echo esc_html( $h_week ); ?></span></div>
            <div class="pl-hours-row"><span><?php esc_html_e( 'Saturday', 'primelink' ); ?></span><span><?php echo esc_html( $h_sat ); ?></span></div>
            <div class="pl-hours-row"><span><?php esc_html_e( 'Sunday', 'primelink' ); ?></span><span><?php esc_html_e( 'Closed', 'primelink' ); ?></span></div>
          </div>
          <div class="mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,.1);">
            <p style="color:rgba(255,255,255,.5);font-size:0.8rem;margin-bottom:12px;text-transform:uppercase;letter-spacing:1px;font-weight:600;"><?php esc_html_e( 'Follow Us', 'primelink' ); ?></p>
            <div class="d-flex gap-2">
              <?php $fb = get_theme_mod( 'primelink_facebook_url', '' ); if ( $fb ) : ?>
              <a href="<?php echo esc_url( $fb ); ?>" aria-label="Facebook" target="_blank" rel="noopener noreferrer" style="width:38px;height:38px;border-radius:var(--pl-radius-sm);background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;text-decoration:none;">
                <i class="fa-brands fa-facebook-f" style="color:rgba(255,255,255,.7);" aria-hidden="true"></i>
              </a>
              <?php endif; ?>
              <a href="https://wa.me/<?php echo esc_attr( $whatsapp ); ?>" aria-label="WhatsApp" target="_blank" rel="noopener noreferrer" style="width:38px;height:38px;border-radius:var(--pl-radius-sm);background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;text-decoration:none;">
                <i class="fa-brands fa-whatsapp" style="color:rgba(255,255,255,.7);" aria-hidden="true"></i>
              </a>
              <a href="mailto:<?php echo esc_attr( $email ); ?>" aria-label="Email" style="width:38px;height:38px;border-radius:var(--pl-radius-sm);background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;text-decoration:none;">
                <i class="fa-solid fa-envelope" style="color:rgba(255,255,255,.7);" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-8">
        <div class="pl-form-card h-100" style="border:1.5px solid var(--pl-border);">
          <h3><?php echo esc_html( $form_heading ); ?></h3>
          <p class="subtitle"><?php echo esc_html( $form_subtitle ); ?></p>
          <form id="contact-form" novalidate>
            <div class="row g-3">
              <div class="col-md-6"><div class="pl-form-group"><label for="cf-name"><?php esc_html_e( 'Full Name', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><input type="text" id="cf-name" name="name" placeholder="<?php esc_attr_e( 'Your full name', 'primelink' ); ?>" required autocomplete="name" aria-required="true"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="cf-phone"><?php esc_html_e( 'Phone Number', 'primelink' ); ?></label><input type="tel" id="cf-phone" name="phone" placeholder="+94 77X XXX XXX" autocomplete="tel"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="cf-email"><?php esc_html_e( 'Email Address', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><input type="email" id="cf-email" name="email" placeholder="your@email.com" required autocomplete="email" aria-required="true"></div></div>
              <div class="col-md-6"><div class="pl-form-group"><label for="cf-subject"><?php esc_html_e( 'Subject', 'primelink' ); ?></label>
                <select id="cf-subject" name="subject">
                  <?php foreach ( [ 'General Enquiry','Request a Quotation','Engineering Services','GIS & AutoCAD','Software Development','IT Products','Technical Support','Other' ] as $opt ) : ?>
                  <option value="<?php echo esc_attr( $opt ); ?>"><?php echo esc_html( $opt ); ?></option>
                  <?php endforeach; ?>
                </select></div></div>
              <div class="col-12"><div class="pl-form-group"><label for="cf-message"><?php esc_html_e( 'Your Message', 'primelink' ); ?> <span style="color:#ef4444;" aria-hidden="true">*</span></label><textarea id="cf-message" name="message" rows="6" placeholder="<?php esc_attr_e( 'Describe your project or enquiry in detail…', 'primelink' ); ?>" required aria-required="true"></textarea></div></div>
            </div>
            <div id="contact-form-msg" class="form-msg" role="status" aria-live="polite"></div>
            <button type="submit" class="btn-pl btn-primary-pl w-100 justify-content-center mt-2">
              <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Send Message', 'primelink' ); ?>
            </button>
          </form>
          <!-- Quick contact alternatives -->
          <div class="row g-3 mt-4 pt-4" style="border-top:1px solid var(--pl-border);">
            <div class="col-sm-4">
              <a href="tel:<?php echo esc_attr( $phone_r ); ?>" class="text-decoration-none d-flex align-items-center gap-2 p-3 rounded-3" style="background:var(--pl-bg);">
                <div style="width:36px;height:36px;background:var(--pl-primary-soft);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fa-solid fa-phone" style="color:var(--pl-primary);font-size:0.85rem;" aria-hidden="true"></i></div>
                <div><span style="font-size:0.7rem;color:var(--pl-text-muted);display:block;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;"><?php esc_html_e( 'Call Us', 'primelink' ); ?></span><span style="font-size:0.82rem;font-weight:700;color:var(--pl-dark);"><?php echo esc_html( $phone ); ?></span></div>
              </a>
            </div>
            <div class="col-sm-4">
              <a href="https://wa.me/<?php echo esc_attr( $whatsapp ); ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none d-flex align-items-center gap-2 p-3 rounded-3" style="background:var(--pl-bg);">
                <div style="width:36px;height:36px;background:#dcfce7;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fa-brands fa-whatsapp" style="color:#16a34a;font-size:0.95rem;" aria-hidden="true"></i></div>
                <div><span style="font-size:0.7rem;color:var(--pl-text-muted);display:block;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;"><?php esc_html_e( 'WhatsApp', 'primelink' ); ?></span><span style="font-size:0.82rem;font-weight:700;color:var(--pl-dark);"><?php esc_html_e( 'Chat With Us', 'primelink' ); ?></span></div>
              </a>
            </div>
            <div class="col-sm-4">
              <a href="mailto:<?php echo esc_attr( $email ); ?>" class="text-decoration-none d-flex align-items-center gap-2 p-3 rounded-3" style="background:var(--pl-bg);">
                <div style="width:36px;height:36px;background:var(--pl-primary-soft);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fa-solid fa-envelope" style="color:var(--pl-primary);font-size:0.85rem;" aria-hidden="true"></i></div>
                <div><span style="font-size:0.7rem;color:var(--pl-text-muted);display:block;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;"><?php esc_html_e( 'Email', 'primelink' ); ?></span><span style="font-size:0.82rem;font-weight:700;color:var(--pl-dark);"><?php echo esc_html( $email ); ?></span></div>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Map -->
    <div class="pl-map-wrap mt-5">
      <iframe src="<?php echo esc_url( $map_url ); ?>" width="100%" height="420" style="border:0;display:block;" allowfullscreen="" loading="lazy" title="<?php esc_attr_e( 'PrimeLink Holdings office location on Google Maps', 'primelink' ); ?>"></iframe>
    </div>
  </div>
</section>

<?php get_footer(); ?>
