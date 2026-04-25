<?php
/**
 * Blog listing template (used when "Posts page" is set in WP Settings > Reading)
 */
get_header();
?>

<main id="primary" class="site-main">

    <!-- Page Header -->
    <section class="form-page-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg-2.jpeg'); min-height: auto; padding: 160px 0 60px;">
        <div class="form-page-overlay"></div>
        <div class="container" style="position: relative; z-index: 2;">
            <h1 class="section-title gs-reveal-up" style="color: #fff; margin-bottom: 20px;">Blog</h1>
            <p class="gs-reveal-up" style="max-width: 600px; margin: 0 auto; color: var(--text-muted); font-size: 1.2rem; text-align: center;">
                Sektörel haberler, kurye dünyasından güncellemeler ve daha fazlası.
            </p>
        </div>
    </section>

    <section style="padding: 80px 0; background: var(--bg-main);">
        <div class="container">
            
            <?php if ( have_posts() ) : ?>
            
            <div class="blog-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                
                <article class="blog-card glass-card gs-reveal-up" data-tilt data-tilt-max="5" data-tilt-speed="400">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="blog-card-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span><i class="fa-regular fa-calendar"></i> <?php echo get_the_date(); ?></span>
                            <span><i class="fa-regular fa-user"></i> <?php the_author(); ?></span>
                        </div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="blog-read-more">Devamını Oku <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="blog-pagination" style="text-align: center; margin-top: 60px;">
                <?php
                echo paginate_links( array(
                    'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                    'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                ) );
                ?>
            </div>

            <?php else : ?>
            
            <div style="text-align: center; padding: 80px 0;">
                <i class="fa-solid fa-newspaper" style="font-size: 60px; color: var(--primary-color); margin-bottom: 20px;"></i>
                <h2>Henüz blog yazısı yok.</h2>
                <p style="color: var(--text-muted);">WordPress yönetim panelinden "Yazılar > Yeni Ekle" ile blog yazılarınızı ekleyebilirsiniz.</p>
            </div>

            <?php endif; ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>
