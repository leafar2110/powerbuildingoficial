<section id="powerbuilding-oficial-blog">
  <div class="blog">
    <div class="container">
      <div class="title-section text-left">
        <h2>Mantente al día con nuestro blog</h2>
      </div>

      <div class="items-blog">
        <div class="row">

                 <?php
                   $args =array(
                   'posts_per_page' => 3,
	                 'category_name' => 'Blog'
                    );
				   
		               $entradas = new WP_Query($args); while($entradas->have_posts() ): $entradas->the_post();
                     $post_id = get_the_ID();
                     foreach((get_the_terms($post_id, 'category' )) as $category) 
                     {                
                          $categoria = $category->name;       
                          $category_id = $category->term_id;           
                     }
                     $category_link = get_category_link( $category_id );                   
                   ?>
                   
          <div class="col-md-4 item-blog">
            <div class="imagen-blog">
              <a href="<?php the_permalink();  ?>">
                <?php the_post_thumbnail('', array('class' => 'img-responsive'));  ?>
              </a>
            </div>

            <div class="content-item-blog">
              <a href="<?php the_permalink();  ?>"><h4><?php the_title(); ?></h4></a>
              <div class="details-item-blog row">
                  <div class="author-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor.svg" />
                    <?php the_author_posts_link(); ?>
                  </div>
                  <div class="date-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock.svg" />
                    <span><?php the_time(get_option('date_format')); ?> <span>
                  </div>
                  <div class="category-detail">
                  <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file.svg" />
                  <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                </div>

              </div>

              <div class="descrition-item-blog">
              <?php the_excerpt();  ?>
              </div>
            </div>
          </div>

          <?php
				   endwhile; wp_reset_postdata();
          ?>

        </div>
      </div>

      <div class="btn-go-to-the-blog text-center">
        <a href="<?php echo get_home_url() ?>/index.php/blog" class="go-to-the-blog">LEER MÁS EN EL BLOG</a>
      </div>
    </div>
  </div>
</section>