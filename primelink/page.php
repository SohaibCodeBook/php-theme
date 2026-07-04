<?php
/**
 * Default Page Template
 */
get_header();
$pid = get_the_ID();
$banner_heading = pl_field( $pid, 'banner_heading', get_the_title() );
$banner_subtext = pl_field( $pid, 'banner_subtext', '' );
?>

<section class="pl-page-banner">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <h1><?php echo esc_html( $banner_heading ); ?></h1>
    <?php if ( $banner_subtext ) : ?>
    <p class="mt-2" style="color:rgba(255,255,255,.7);font-size:1rem;max-width:560px;"><?php echo esc_html( $banner_subtext ); ?></p>
    <?php endif; ?>
    <nav class="pl-breadcrumb mt-2" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> <?php esc_html_e( 'Home', 'primelink' ); ?></a>
      <span class="sep mx-2" aria-hidden="true">/</span>
      <span class="current"><?php the_title(); ?></span>
    </nav>
  </div>
</section>

<section class="section-lg">
  <div class="container" style="max-width:820px;">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
