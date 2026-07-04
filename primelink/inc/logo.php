<?php
/**
 * PrimeLink – Logo Renderer
 *
 * Uses a hybrid SVG badge + HTML text approach.
 * SVG is used only for the icon badge (gradient, shapes).
 * HTML <span> elements are used for the wordmark text so the
 * already-loaded web font renders correctly at all sizes.
 *
 * @param string $variant  'default' | 'footer'
 * @param string $size     'normal'  | 'small'
 */
defined( 'ABSPATH' ) || exit;

function primelink_logo_svg( $variant = 'default', $size = 'normal' ) {

    $is_footer = ( $variant === 'footer' );
    $is_small  = ( $size === 'small' );

    // Badge dimensions
    $badge = $is_small ? 36 : 44;
    $rx    = $is_small ? 9  : 11;

    // Unique gradient ID — avoid conflicts when rendered twice (header + footer)
    static $idx = 0;
    $idx++;
    $gid = 'plg' . $idx;

    $wrapper_class = 'pl-logo-mark pl-logo-mark--' . esc_attr( $variant )
                   . ( $is_small ? ' pl-logo-mark--small' : '' );
    ?>
    <span class="<?php echo $wrapper_class; ?>">

      <!-- SVG Badge — gradient + monogram + amber dot -->
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="<?php echo $badge; ?>"
        height="<?php echo $badge; ?>"
        viewBox="0 0 <?php echo $badge; ?> <?php echo $badge; ?>"
        aria-hidden="true"
        focusable="false"
        class="pl-logo-badge-svg"
        style="display:block;flex-shrink:0;"
      >
        <defs>
          <linearGradient id="<?php echo esc_attr( $gid ); ?>" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%"   stop-color="#1039a0"/>
            <stop offset="100%" stop-color="#3b82f6"/>
          </linearGradient>
        </defs>

        <!-- Badge background -->
        <rect x="0" y="0" width="<?php echo $badge; ?>" height="<?php echo $badge; ?>"
          rx="<?php echo $rx; ?>"
          fill="url(#<?php echo esc_attr( $gid ); ?>)"
        />

        <!-- Subtle top highlight -->
        <rect x="0" y="0" width="<?php echo $badge; ?>" height="<?php echo round( $badge * 0.45 ); ?>"
          rx="<?php echo $rx; ?>"
          fill="rgba(255,255,255,0.12)"
        />

        <!-- PL monogram using basic shapes — not text, so font-loading is irrelevant -->
        <?php if ( $is_small ) : ?>
          <!-- Small: simple bold "PL" via rect paths -->
          <!-- P stem -->
          <rect x="7"  y="9"  width="3.5" height="18" rx="1.5" fill="#fff"/>
          <!-- P bowl top -->
          <rect x="7"  y="9"  width="9"   height="3.5" rx="1.5" fill="#fff"/>
          <!-- P bowl bottom -->
          <rect x="7"  y="16" width="9"   height="3.5" rx="1.5" fill="#fff"/>
          <!-- P bowl right -->
          <rect x="13" y="9"  width="3.5" height="10.5" rx="1.5" fill="#fff"/>
          <!-- L stem -->
          <rect x="20" y="9"  width="3.5" height="18" rx="1.5" fill="#fff"/>
          <!-- L foot -->
          <rect x="20" y="23.5" width="8" height="3.5" rx="1.5" fill="#fff"/>
        <?php else : ?>
          <!-- Normal: P letter -->
          <rect x="8"  y="10" width="4"   height="22" rx="2" fill="#fff"/>
          <!-- P bowl top -->
          <rect x="8"  y="10" width="12"  height="4"  rx="2" fill="#fff"/>
          <!-- P bowl bottom -->
          <rect x="8"  y="19" width="12"  height="4"  rx="2" fill="#fff"/>
          <!-- P bowl right curve -->
          <rect x="16" y="10" width="4"   height="13" rx="2" fill="#fff"/>
          <!-- L stem -->
          <rect x="24" y="10" width="4"   height="22" rx="2" fill="#fff"/>
          <!-- L foot -->
          <rect x="24" y="28" width="10"  height="4"  rx="2" fill="#fff"/>
        <?php endif; ?>

        <!-- Amber accent dot -->
        <circle
          cx="<?php echo $badge - 5; ?>"
          cy="5"
          r="<?php echo $is_small ? '3.5' : '4.5'; ?>"
          fill="#f59e0b"
        />
      </svg>

      <!-- Wordmark — HTML text renders the web font perfectly -->
      <span class="pl-logo-text-wrap">
        <span class="pl-logo-brand-name">PrimeLink</span>
        <span class="pl-logo-sub-name"><?php esc_html_e( 'Holdings (Pvt) Ltd', 'primelink' ); ?></span>
      </span>

    </span>
    <?php
}
