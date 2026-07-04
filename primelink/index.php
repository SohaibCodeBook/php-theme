<?php
/**
 * Index / Blog fallback — redirects to front page if blog is set as front page accidentally.
 */
if ( get_option( 'show_on_front' ) === 'posts' ) {
    wp_redirect( home_url( '/' ) );
    exit;
}
get_header();
?>

<section class="pl-page-banner">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3"><i class="fa-solid fa-newspaper fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'News', 'primelink' ); ?></div>
    <h1><?php
      if      ( is_archive() ) the_archive_title();
      elseif  ( is_search() )  printf( esc_html__( 'Search Results: "%s"', 'primelink' ), esc_html( get_search_query() ) );
      else                     esc_html_e( 'Latest News', 'primelink' );
    ?></h1>
  </div>
</section>

<section class="section-lg">
  <div class="container" style="max-width:860px;">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5 pb-5' ); ?> style="border-bottom:1px solid var(--pl-border);">
      <?php if ( has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'primelink-card', [ 'class' => 'w-100 rounded-3 mb-3', 'style' => 'height:280px;object-fit:cover;' ] ); ?>
      </a>
      <?php endif; ?>
      <h2 style="font-size:1.4rem;margin-bottom:8px;">
        <a href="<?php the_permalink(); ?>" style="color:var(--pl-dark);text-decoration:none;"><?php the_title(); ?></a>
      </h2>
      <p style="font-size:0.8rem;color:var(--pl-text-muted);margin-bottom:12px;">
        <i class="fa-regular fa-calendar fa-xs me-1" aria-hidden="true"></i>
        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
      </p>
      <p class="text-muted-pl"><?php the_excerpt(); ?></p>
      <a href="<?php the_permalink(); ?>" class="btn-pl btn-outline-dark btn-sm-pl">
        <?php esc_html_e( 'Read More', 'primelink' ); ?> <i class="fa-solid fa-arrow-right fa-sm" aria-hidden="true"></i>
      </a>
    </article>
    <?php endwhile; else : ?>
    <div class="text-center py-5">
      <div style="width:72px;height:72px;background:var(--pl-bg);border-radius:var(--pl-radius-lg);display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;" aria-hidden="true">
        <i class="fa-regular fa-newspaper" style="font-size:1.8rem;color:var(--pl-border);" aria-hidden="true"></i>
      </div>
      <h3 class="mt-3"><?php esc_html_e( 'No posts yet', 'primelink' ); ?></h3>
      <p class="text-muted-pl"><?php esc_html_e( 'Check back soon for news and updates.', 'primelink' ); ?></p>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-pl btn-primary-pl mt-2">
        <i class="fa-solid fa-house fa-sm" aria-hidden="true"></i> <?php esc_html_e( 'Back to Home', 'primelink' ); ?>
      </a>
    </div>
    <?php endif; ?>
    <nav aria-label="<?php esc_attr_e( 'Blog post pages', 'primelink' ); ?>">
      <?php the_posts_pagination( [ 'class' => 'mt-4' ] ); ?>
    </nav>
  </div>
</section>

<?php get_footer(); ?>
