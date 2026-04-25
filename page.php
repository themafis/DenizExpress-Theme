<?php
/**
 * The template for displaying all generic pages
 * WordPress'ten girip yazı düzenlendiğinde bu şablon kullanılır
 */
get_header();
?>

<main id="primary" class="site-main">
    
    <?php while ( have_posts() ) : the_post(); ?>

    <!-- Page Header -->
    <section class="form-page-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg-2.jpeg'); min-height: auto; padding: 160px 0 60px;">
        <div class="form-page-overlay"></div>
        <div class="container" style="position: relative; z-index: 2; text-align: center;">
            <h1 class="gs-reveal-up" style="font-size: 3rem; background: linear-gradient(to right, #fff, var(--primary-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>

    <section style="padding: 60px 0; background: var(--bg-main);">
        <div class="container" style="max-width: 900px;">
            <article class="glass-card gs-reveal" style="padding: 50px;">
                <div class="blog-single-content">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
