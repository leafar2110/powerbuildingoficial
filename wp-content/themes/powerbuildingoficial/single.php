<?php get_header(); ?>
            <?php
              foreach((get_the_category()) as $category) {
                   $cat=$category->cat_name . '';
            }
             if ($cat == 'Mujer' OR $cat == 'Hombre') {
           	  get_template_part( 'content_single_producto', get_post_format() );
             }
             if ($cat != 'Mujer'AND $cat != 'Hombre') {
           	  get_template_part( 'content_single_blog', get_post_format() );
             }             
            ?>
<?php get_footer(); ?>