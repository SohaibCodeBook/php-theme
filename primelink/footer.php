</main>

<!-- CONTACT STRIP -->
<div class="pl-contact-strip">
  <div class="container">
    <div class="row g-0">
      <div class="col-md-4">
        <div class="pl-contact-strip-item border-end border-white border-opacity-10 pe-4">
          <div class="pl-contact-strip-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></div>
          <div>
            <strong><?php esc_html_e( 'Visit Our Office', 'primelink' ); ?></strong>
            <span><?php echo esc_html( pl_site( 'address_short' ) ); ?></span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pl-contact-strip-item border-end border-white border-opacity-10 px-4">
          <div class="pl-contact-strip-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
          <div>
            <strong><?php esc_html_e( 'Call or WhatsApp', 'primelink' ); ?></strong>
            <a href="tel:<?php echo esc_attr( pl_site( 'phone_raw' ) ); ?>"><?php echo esc_html( pl_site( 'phone' ) ); ?></a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pl-contact-strip-item ps-4">
          <div class="pl-contact-strip-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></div>
          <div>
            <strong><?php esc_html_e( 'Email Us', 'primelink' ); ?></strong>
            <a href="mailto:<?php echo esc_attr( pl_site( 'email' ) ); ?>"><?php echo esc_html( pl_site( 'email' ) ); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer id="site-footer" role="contentinfo">
  <div class="container">
    <div class="row g-5">

      <!-- Brand -->
      <div class="col-lg-4 col-md-6">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="pl-footer-logo text-decoration-none d-inline-block">
          <?php primelink_the_logo( 'footer' ); ?>
        </a>
        <p class="pl-footer-desc mt-3"><?php echo esc_html( pl_site( 'footer_desc' ) ); ?></p>
        <div class="pl-social-links">
          <?php $facebook_url = get_theme_mod( 'primelink_facebook_url', '' );
          if ( $facebook_url ) : ?>
          <a href="<?php echo esc_url( $facebook_url ); ?>" aria-label="<?php esc_attr_e( 'Facebook', 'primelink' ); ?>" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
          </a>
          <?php endif;
          $linkedin_url = get_theme_mod( 'primelink_linkedin_url', '' );
          if ( $linkedin_url ) : ?>
          <a href="<?php echo esc_url( $linkedin_url ); ?>" aria-label="<?php esc_attr_e( 'LinkedIn', 'primelink' ); ?>" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
          </a>
          <?php endif; ?>
          <a href="https://wa.me/<?php echo esc_attr( pl_site( 'whatsapp' ) ); ?>" aria-label="<?php esc_attr_e( 'WhatsApp', 'primelink' ); ?>" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
          </a>
          <a href="mailto:<?php echo esc_attr( pl_site( 'email' ) ); ?>" aria-label="<?php esc_attr_e( 'Email', 'primelink' ); ?>">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6 col-6 pl-footer-col">
        <h6><?php esc_html_e( 'Quick Links', 'primelink' ); ?></h6>
        <ul class="pl-footer-links">
          <?php foreach ( [ '/' => 'Home', '/about-us' => 'About Us', '/services' => 'Services', '/engineering-solutions' => 'Engineering', '/outlets' => 'Outlets', '/it-services' => 'IT Services', '/contact' => 'Contact' ] as $path => $label ) : ?>
          <li><a href="<?php echo esc_url( home_url( $path ) ); ?>"><i class="fa-solid fa-chevron-right fa-xs me-1" aria-hidden="true"></i><?php echo esc_html( $label ); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Services -->
      <div class="col-lg-3 col-md-6 col-6 pl-footer-col">
        <h6><?php esc_html_e( 'Our Services', 'primelink' ); ?></h6>
        <ul class="pl-footer-links">
          <?php foreach ( [ [ '/engineering-solutions', 'Geotechnical Eng.' ], [ '/engineering-solutions', 'Landslide Mitigation' ], [ '/engineering-solutions', 'GIS & Mapping' ], [ '/engineering-solutions', 'AutoCAD Design' ], [ '/it-services', 'Software Development' ], [ '/it-services', 'Database Solutions' ], [ '/it-services', 'IT Products' ] ] as [ $path, $label ] ) : ?>
          <li><a href="<?php echo esc_url( home_url( $path ) ); ?>"><i class="fa-solid fa-chevron-right fa-xs me-1" aria-hidden="true"></i><?php echo esc_html( $label ); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-3 col-md-6 pl-footer-col">
        <h6><?php esc_html_e( 'Contact Us', 'primelink' ); ?></h6>
        <div class="pl-footer-contact-item">
          <i class="fa-solid fa-location-dot mt-1" aria-hidden="true"></i>
          <span><?php echo esc_html( pl_site( 'address_full' ) ); ?></span>
        </div>
        <div class="pl-footer-contact-item">
          <i class="fa-solid fa-phone" aria-hidden="true"></i>
          <a href="tel:<?php echo esc_attr( pl_site( 'phone_raw' ) ); ?>"><?php echo esc_html( pl_site( 'phone' ) ); ?></a>
        </div>
        <div class="pl-footer-contact-item">
          <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
          <a href="https://wa.me/<?php echo esc_attr( pl_site( 'whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'WhatsApp Us', 'primelink' ); ?></a>
        </div>
        <div class="pl-footer-contact-item">
          <i class="fa-solid fa-envelope" aria-hidden="true"></i>
          <a href="mailto:<?php echo esc_attr( pl_site( 'email' ) ); ?>"><?php echo esc_html( pl_site( 'email' ) ); ?></a>
        </div>
        <div class="mt-3">
          <span class="pl-tag"><?php echo esc_html( 'Mon–Fri: ' . pl_site( 'hours_weekday' ) ); ?></span>
          <span class="pl-tag mt-2"><?php echo esc_html( 'Sat: ' . pl_site( 'hours_sat' ) ); ?></span>
        </div>
      </div>

    </div>
  </div>

  <div class="pl-footer-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
        <p>&copy; 2025 <?php echo esc_html( pl_site( 'company_name' ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'primelink' ); ?></p>
        <div class="d-flex gap-3">
          <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'primelink' ); ?></a>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'primelink' ); ?></a>
        </div>
      </div>
    </div>
  </div>
</footer>

<button class="pl-scroll-top" id="pl-scroll-top" aria-label="<?php esc_attr_e( 'Back to top', 'primelink' ); ?>">
  <i class="fa-solid fa-chevron-up" aria-hidden="true"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>
