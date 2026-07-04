<?php
/**
 * Single Post Template
 */
get_header();

// Buffer the banner title before output starts
$banner_title = '';
$banner_cat   = '';
if ( have_posts() ) {
    the_post();
    $banner_title = get_the_title();
    $cats = get_the_category();
    $banner_cat = $cats ? esc_html( $cats[0]->name ) : '';
    rewind_posts();
}
?>

<section class="pl-page-banner" aria-label="<?php echo esc_attr( $banner_title ); ?>">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3">
      <?php if ( $banner_cat ) : ?>
        <i class="fa-solid fa-tag fa-xs me-2" aria-hidden="true"></i><?php echo esc_html( $banner_cat ); ?>
      <?php else : ?>
        <i class="fa-solid fa-newspaper fa-xs me-2" aria-hidden="true"></i><?php esc_html_e( 'News & Updates', 'primelink' ); ?>
      <?php endif; ?>
    </div>
    <h1 style="max-width:720px;"><?php echo esc_html( $banner_title ); ?></h1>
    <nav class="pl-breadcrumb mt-3" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> <?php esc_html_e( 'Home', 'primelink' ); ?>
      </a>
      <span class="sep mx-1" aria-hidden="true">/</span>
      <span class="current" style="max-width:360px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php echo esc_html( $banner_title ); ?></span>
    </nav>
  </div>
</section>

<section class="section-lg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <?php while ( have_posts() ) : the_post(); ?>

        <!-- Post meta -->
        <div class="d-flex align-items-center gap-3 flex-wrap mb-4 pb-4" style="border-bottom:1px solid var(--pl-border);">
          <span style="display:flex;align-items:center;gap:6px;font-size:0.82rem;color:var(--pl-text-muted);">
            <i class="fa-regular fa-calendar fa-xs" aria-hidden="true"></i>
            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
          </span>
          <?php if ( get_the_author() ) : ?>
          <span style="display:flex;align-items:center;gap:6px;font-size:0.82rem;color:var(--pl-text-muted);">
            <i class="fa-regular fa-user fa-xs" aria-hidden="true"></i>
            <?php echo esc_html( get_the_author() ); ?>
          </span>
          <?php endif; ?>
          <?php
          $post_cats = get_the_category();
          if ( $post_cats ) : ?>
          <span style="display:flex;align-items:center;gap:6px;font-size:0.82rem;color:var(--pl-text-muted);">
            <i class="fa-solid fa-folder fa-xs" aria-hidden="true"></i>
            <?php echo esc_html( $post_cats[0]->name ); ?>
          </span>
          <?php endif; ?>
        </div>

        <!-- Featured image -->
        <?php if ( has_post_thumbnail() ) : ?>
        <figure style="margin:0 0 2.5rem;">
          <?php the_post_thumbnail( 'primelink-card', [
              'class' => 'w-100 rounded-4',
              'style' => 'height:420px;object-fit:cover;',
          ] ); ?>
          <?php if ( get_the_post_thumbnail_caption() ) : ?>
          <figcaption style="font-size:0.8rem;color:var(--pl-text-muted);text-align:center;margin-top:10px;">
            <?php echo esc_html( get_the_post_thumbnail_caption() ); ?>
          </figcaption>
          <?php endif; ?>
        </figure>
        <?php endif; ?>

        <!-- Post content -->
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-content' ); ?>>
          <?php the_content(); ?>
          <?php wp_link_pages( [
              'before' => '<div class="page-links" style="margin-top:2rem;">' . esc_html__( 'Pages:', 'primelink' ),
              'after'  => '</div>',
          ] ); ?>
        </article>

        <!-- Tags -->
        <?php
        $post_tags = get_the_tags();
        if ( $post_tags ) : ?>
        <div class="mt-4 pt-4" style="border-top:1px solid var(--pl-border);">
          <p style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--pl-text-muted);margin-bottom:10px;">
            <?php esc_html_e( 'Tags', 'primelink' ); ?>
          </p>
          <div class="d-flex flex-wrap gap-2">
            <?php foreach ( $post_tags as $tag ) : ?>
            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="pl-tag" rel="tag">
              <?php echo esc_html( $tag->name ); ?>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- Post navigation -->
        <nav class="d-flex justify-content-between gap-4 mt-5 pt-4" style="border-top:1px solid var(--pl-border);" aria-label="<?php esc_attr_e( 'Post navigation', 'primelink' ); ?>">
          <?php
          $prev_post = get_previous_post();
          $next_post = get_next_post();
          if ( $prev_post ) : ?>
          <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="d-flex align-items-start gap-3 text-decoration-none" rel="prev" style="flex:1;min-width:0;">
            <div style="width:36px;height:36px;background:var(--pl-primary-soft);border-radius:var(--pl-radius-sm);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;">
              <i class="fa-solid fa-arrow-left" style="color:var(--pl-primary);font-size:0.8rem;" aria-hidden="true"></i>
            </div>
            <div style="min-width:0;">
              <span style="font-size:0.72rem;color:var(--pl-text-muted);text-transform:uppercase;letter-spacing:1px;font-weight:600;display:block;"><?php esc_html_e( 'Previous', 'primelink' ); ?></span>
              <span style="font-size:0.9rem;font-weight:700;color:var(--pl-dark);display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
            </div>
          </a>
          <?php endif; ?>
          <?php if ( $next_post ) : ?>
          <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="d-flex align-items-start gap-3 text-decoration-none" rel="next" style="flex:1;min-width:0;justify-content:flex-end;text-align:right;">
            <div style="min-width:0;">
              <span style="font-size:0.72rem;color:var(--pl-text-muted);text-transform:uppercase;letter-spacing:1px;font-weight:600;display:block;"><?php esc_html_e( 'Next', 'primelink' ); ?></span>
              <span style="font-size:0.9rem;font-weight:700;color:var(--pl-dark);display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
            </div>
            <div style="width:36px;height:36px;background:var(--pl-primary-soft);border-radius:var(--pl-radius-sm);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;">
              <i class="fa-solid fa-arrow-right" style="color:var(--pl-primary);font-size:0.8rem;" aria-hidden="true"></i>
            </div>
          </a>
          <?php endif; ?>
        </nav>

        <?php endwhile; ?>

      </div>
    </div>
  </div>
</section>

<!-- CTA strip -->
<section class="pl-quote-section section-md">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-4">
      <div class="col-lg-8">
        <h2 style="color:#fff;font-size:clamp(1.4rem,3vw,1.8rem);font-weight:800;letter-spacing:-0.02em;margin-bottom:8px;">
          <?php esc_html_e( 'Have a project or enquiry?', 'primelink' ); ?>
        </h2>
        <p style="color:rgba(255,255,255,.6);font-size:0.95rem;margin:0;">
          <?php esc_html_e( 'Get in touch with our team for engineering, software, or IT services.', 'primelink' ); ?>
        </p>
      </div>
      <div class="col-lg-4 text-lg-end">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-accent-pl btn-lg-pl">
          <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i>
          <?php esc_html_e( 'Contact Us', 'primelink' ); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
