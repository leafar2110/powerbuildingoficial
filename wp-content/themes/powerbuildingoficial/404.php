<?php get_header(); 
get_template_part('partials/header-2'); ?>

<div style="width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center;" >
	<div style="text-align: center;">
		
		 <h1 style="color: #CCC; font-size: 70px;">Page not Found</h1><br>
		 <h2 style="color: #CCC; font-size: 100px;">404</h2><br>
		 <a style="color: #e60065" href="<?php bloginfo('url'); ?>/index.php">Return to Home</a>
	</div>
</div>
<?php get_footer(); ?>