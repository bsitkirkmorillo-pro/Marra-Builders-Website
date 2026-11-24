<?php
// Generic fallback (pages, search, 404): same look as the rest of the site.
get_header();
$marra_heading = is_404() ? 'Page not found' : ( is_singular() ? get_the_title() : 'Marra Builders Inc.' );
?>
<main class="flex-grow">
    <header class="relative pt-36 md:pt-44 pb-16 md:pb-20 bg-ink text-white overflow-hidden text-left">
        <div class="absolute inset-0 bg-gradient-to-br from-brand/95 via-ink to-ink"></div>
        <div class="relative max-w-6xl mx-auto px-6 text-left">
            <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-[1.05] max-w-3xl"><?php echo esc_html( $marra_heading ); ?></h1>
        </div>
    </header>
    <section class="py-20 bg-surface text-left dark:bg-ink-light">
        <div class="max-w-4xl mx-auto px-6 text-slate-700 text-base leading-relaxed space-y-4 dark:text-slate-200">
            <?php if ( is_404() ) : ?>
                <p>We couldn&rsquo;t find that page.</p>
                <p><a class="font-semibold text-brand hover:text-accent dark:text-accent-light" href="<?php echo esc_url( marra_url( 'home' ) ); ?>">Back to the home page &rarr;</a></p>
            <?php elseif ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Nothing to show here yet.</p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
