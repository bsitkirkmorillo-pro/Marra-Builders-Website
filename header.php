<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <!-- THEME: applied before first paint to prevent a light/dark flash on load -->
    <script>
        (function () {
            try {
                var stored = localStorage.getItem('theme');
                var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (stored ? stored === 'dark' : prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            } catch (e) {}
        })();
    </script>
    <?php wp_head(); ?>
    <?php if ( ! has_site_icon() ) : ?>
    <link rel="icon" type="image/png" href="<?php echo esc_url( MARRA_ASSETS . 'png/marra-builders-emblem.png' ); ?>">
    <?php endif; ?>
    <!-- Google Fonts Integration for Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php get_template_part( 'parts/styles', marra_page_key() ); ?>
    <?php if ( is_admin_bar_showing() ) : ?>
    <style>#main-nav{top:32px!important}@media(max-width:782px){#main-nav{top:46px!important}}</style>
    <?php endif; ?>
</head>
<?php
$marra_body = marra_json( 'body-classes.json' );
$marra_key  = marra_page_key();
$marra_cls  = isset( $marra_body[ $marra_key ] ) ? $marra_body[ $marra_key ] : '';
if ( 'home' === $marra_key ) {
	$marra_nav = 'home';
} else {
	$marra_nav = $marra_key;
}
?>
<body class="<?php echo esc_attr( $marra_cls ); ?>">
<?php wp_body_open(); ?>

<?php get_template_part( 'parts/nav', $marra_nav ); ?>
