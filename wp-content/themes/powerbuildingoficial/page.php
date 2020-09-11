<?php

get_header(); ?>



<section class="main-content ">
	<?php
		// Start the loop.
	while ( have_posts() ) : the_post();

			// Include the page content template.
		/*	get_template_part( 'content', 'page' );*/
		the_content();

			// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
	endif;

		// End the loop.
endwhile;
?>

</section>
<?php get_footer(); ?>
