<?php
get_header();
while ( have_posts() ) {
	the_post();
	get_template_part( 'parts/project-detail' );
}
get_footer();
