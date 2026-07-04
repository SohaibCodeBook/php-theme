<?php
/**
 * Search Results Template
 */
get_header();

$search_query = get_search_query();
?>

<section class="pl-page-banner" aria-labelledby="search-heading">
  <div class="pl-hero-grid-bg" aria-hidden="true"></div>
  <div class="container pl-page-banner-content">
    <div class="section-badge mb-3">
      <i class="fa-solid fa-magnifying-glass fa-xs me-2" aria-hidden="true"></i>
      <?php esc_html_e( 'Search Results', 'primelink' ); ?>
    </div>
    <h1 id="search-heading">
      <?php
      if ( $search_query ) {
          printf(
              /* translators: %s: search query */
              esc_html__( 'Results for: "%s"', 'primelink' ),
              '<span style="color:var(--pl-accent);">' . esc_html( $search_query ) . '</span>'
          );
      } else {
          esc_html_e( 'Search', 'primelink' );
      }
      ?>
    </h1>
    <nav class="pl-breadcrumb mt-3" aria-label="<?php esc_attr_e( 'Breadcrumb', 'primelink' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <i class="fa-solid fa-house fa-xs" aria-hidden="true"></i>
        <?php esc_html_e( 'Home', 'primelink' ); ?>
      </a>
      <span class="sep mx-2" aria-hidden="true">/</span>
      <span class="current"><?php esc_html_e( 'Search', 'primelink' ); ?></span>
    </nav>
  </div>
</section>

<section class="section-lg">
  <div class="container" style="max-width: 860px;">

    <!-- Search form -->
    <div class="mb-5">
      <?php get_search_form(); ?>
    </div>

    <?php if ( have_posts() ) : ?>

      <p class="text-muted-pl mb-4" style="font-size:0.88rem;">
        <?php
        printf(
            /* translators: 1: result count, 2: search query */
            esc_html( _n( '%1$s result found for "%2$s"', '%1$s results found for "%2$s"', $wp_query->found_posts, 'primelink' ) ),
            number_format_i18n( $wp_query->found_posts ),
            esc_html( $search_query )
        );
        ?>
      </p>

      <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5 pb-5' ); ?> style="border-bottom:1px solid var(--pl-border);">

        <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
          <?php the_post_thumbnail( 'primelink-card', [
              'class' => 'w-100 rounded-3 mb-3',
              'style' => 'height:220px;object-fit:cover;',
          ] ); ?>
        </a>
        <?php endif; ?>

        <h2 style="font-size:1.3rem;margin-bottom:6px;">
          <a href="<?php the_permalink(); ?>" style="color:var(--pl-dark);text-decoration:none;">
            <?php the_title(); ?>
          </a>
        </h2>

        <p style="font-size:0.78rem;color:var(--pl-text-muted);margin-bottom:10px;display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
          <span>
            <i class="fa-regular fa-calendar fa-xs me-1" aria-hidden="true"></i>
            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
          </span>
          <?php
          $cats = get_the_category();
          if ( $cats ) {
              echo '<span><i class="fa-solid fa-folder fa-xs me-1" aria-hidden="true"></i>' . esc_html( $cats[0]->name ) . '</span>';
          }
          ?>
        </p>

        <p class="text-muted-pl" style="font-size:0.9rem;line-height:1.75;"><?php the_excerpt(); ?></p>

        <a href="<?php the_permalink(); ?>" class="btn-pl btn-outline-dark btn-sm-pl">
          <?php esc_html_e( 'Read More', 'primelink' ); ?>
          <i class="fa-solid fa-arrow-right fa-sm" aria-hidden="true"></i>
        </a>

      </article>
      <?php endwhile; ?>

      <!-- Pagination -->
      <nav aria-label="<?php esc_attr_e( 'Search results pages', 'primelink' ); ?>">
        <?php
        the_posts_pagination( [
            'prev_text' => '<i class="fa-solid fa-arrow-left fa-sm me-1" aria-hidden="true"></i>' . esc_html__( 'Previous', 'primelink' ),
            'next_text' => esc_html__( 'Next', 'primelink' ) . '<i class="fa-solid fa-arrow-right fa-sm ms-1" aria-hidden="true"></i>',
        ] );
        ?>
      </nav>

    <?php else : ?>

      <!-- No results state -->
      <div class="text-center py-5">
        <div style="width:72px;height:72px;background:var(--pl-bg);border-radius:var(--pl-radius-lg);display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;">
          <i class="fa-solid fa-magnifying-glass" style="font-size:1.8rem;color:var(--pl-border);" aria-hidden="true"></i>
        </div>
        <h2 style="font-size:1.4rem;margin-bottom:0.75rem;">
          <?php esc_html_e( 'No results found', 'primelink' ); ?>
        </h2>
        <p class="text-muted-pl" style="font-size:0.95rem;max-width:420px;margin:0 auto 2rem;">
          <?php
          printf(
              /* translators: %s: search query */
              esc_html__( 'Nothing matched "%s". Try different keywords or browse our pages below.', 'primelink' ),
              esc_html( $search_query )
          );
          ?>
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-pl btn-primary-pl">
            <i class="fa-solid fa-house fa-sm" aria-hidden="true"></i>
            <?php esc_html_e( 'Back to Home', 'primelink' ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-pl btn-outline-dark">
            <i class="fa-solid fa-paper-plane fa-sm" aria-hidden="true"></i>
            <?php esc_html_e( 'Contact Us', 'primelink' ); ?>
          </a>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
