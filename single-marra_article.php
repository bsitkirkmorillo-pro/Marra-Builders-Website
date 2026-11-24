<?php
get_header();
while ( have_posts() ) {
	the_post();
	get_template_part( 'parts/article-detail' );
}
get_footer();
