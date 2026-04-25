<?php
/**
 * Single blog post template
 * Displays full blog content + related posts at bottom
 */
get_header();
?>

<main id="primary" class="site-main">
    
    <?php while ( have_posts() ) : the_post(); ?>

    <!-- Post Header -->
    <section class="form-page-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg-2.jpeg'); min-height: auto; padding: 160px 0 60px;">
        <div class="form-page-overlay"></div>
        <div class="container" style="position: relative; z-index: 2; text-align: center;">
            <div class="blog-card-meta gs-reveal-up" style="margin-bottom: 20px; justify-content: center;">
                <span><i class="fa-regular fa-calendar"></i> <?php echo get_the_date(); ?></span>
                <span><i class="fa-regular fa-user"></i> <?php the_author(); ?></span>
                <?php if ( has_category() ) : ?>
                <span><i class="fa-regular fa-folder"></i> <?php the_category( ', ' ); ?></span>
                <?php endif; ?>
            </div>
            <h1 class="gs-reveal-up" style="font-size: 2.8rem; background: linear-gradient(to right, #fff, var(--primary-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; max-width: 800px; margin: 0 auto;"><?php the_title(); ?></h1>
        </div>
    </section>

    <section style="padding: 60px 0; background: var(--bg-main);">
        <div class="container" style="max-width: 800px;">
            
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="gs-reveal-up" style="margin-bottom: 40px; border-radius: 20px; overflow: hidden;">
                <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; border-radius: 20px;' ) ); ?>
            </div>
            <?php endif; ?>

            <article class="glass-card gs-reveal" style="padding: 50px;">
                <div class="blog-single-content">
                    <?php the_content(); ?>
                </div>

                <?php if ( has_tag() ) : ?>
                <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.1);">
                    <i class="fa-solid fa-tags" style="color: var(--primary-color); margin-right: 10px;"></i>
                    <?php the_tags( '', ', ', '' ); ?>
                </div>
                <?php endif; ?>
            </article>

            <!-- Post Navigation -->
            <div style="display: flex; justify-content: space-between; margin-top: 40px; gap: 20px; flex-wrap: wrap;">
                <div>
                    <?php previous_post_link( '<span style="color: var(--text-muted); font-size: 0.85rem;">← Önceki Yazı</span><br>%link' ); ?>
                </div>
                <div style="text-align: right;">
                    <?php next_post_link( '<span style="color: var(--text-muted); font-size: 0.85rem;">Sonraki Yazı →</span><br>%link' ); ?>
                </div>
            </div>

        </div>
    </section>

    <!-- ============================================
         RELATED POSTS / DİĞER YAZILAR
         ============================================ -->
    <?php
    $categories = get_the_category();
    $related_args = array(
        'post__not_in'   => array( get_the_ID() ),
        'posts_per_page' => 3,
        'orderby'        => 'rand',
    );
    if ( $categories ) {
        $related_args['cat'] = $categories[0]->term_id;
    }
    $related_posts = new WP_Query( $related_args );

    if ( $related_posts->have_posts() ) :
    ?>
    <section style="padding: 60px 0 80px; background: var(--bg-main);">
        <div class="container">
            <h2 class="section-title gs-reveal-up" style="margin-bottom: 50px;">Diğer Yazılar</h2>
            <div class="blog-grid">
                <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                <article class="blog-card glass-card gs-reveal-up" data-tilt data-tilt-max="5" data-tilt-speed="400">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="blog-card-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </a>
                    </div>
                    <?php else : ?>
                    <div class="blog-card-img" style="background: linear-gradient(135deg, rgba(255,107,0,0.2), rgba(11,12,16,0.9)); display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-newspaper" style="font-size: 50px; color: var(--primary-color);"></i>
                    </div>
                    <?php endif; ?>
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span><i class="fa-regular fa-calendar"></i> <?php echo get_the_date(); ?></span>
                        </div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="blog-read-more">Devamını Oku <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php
    endif;
    wp_reset_postdata();
    ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
