<?php get_template_part( 'parts/footer-markup' ); ?>

<script>window.MARRA = { ajaxUrl: <?php echo wp_json_encode( admin_url( 'admin-ajax.php' ) ); ?> };</script>
<?php
if ( 'home' === marra_page_key() ) {
	get_template_part( 'parts/scripts', 'home' );
} else {
	get_template_part( 'parts/scripts', 'inner' );
}
get_template_part( 'parts/scripts', 'common' );
wp_footer();
?>
</body>
</html>
