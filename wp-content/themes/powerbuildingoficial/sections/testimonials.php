<section id="testimonials">
      <div class="container">
        <div class="title-section text-center">
          <h2>Este es el éxito de los nuestros</h2>
          <p>Nuestra comunidad ha logrado un verdadero cambio en sus vidas.</p>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div
              id="myCarousel"
              class="carousel slide carousel-testimonials"
              data-ride="carousel"
              data-interval="false"
            >
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
              <?php 
                $i=1;
                $argsBanner = array( 'post_type' => 'testimonials', 'meta_key' => 'post_instagram', 'meta_value' => 'a:1:{i:0;s:2:"No";}' );  
          
                $Banners = new WP_Query($argsBanner);   
                if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                    $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                    $url = wp_get_attachment_url( $post_thumbnail_id);                  
              ?>                
                <div class="item <?php if($i == 1) echo 'active'; ?>">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <img
                        class="img-responsive lazy-hidden" data-lazy-type="image"
                        src="//powerbuildingoficial.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif"
                        data-src="<?php echo $url ?>" width="" height=""
                        alt="<?php the_title(); ?>"
                      />
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="text-testimonial">
                        <p class="testomonials-carousel-reviewer text-center">
                          <?php the_title(); ?>
                        </p>
                        <p class="testomonials-carousel-description">
                          <?php the_content(); ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php $i++; endwhile; endif; ?>

              </div>
              <!-- Left and right controls -->
              <a
                class="left carousel-control"
                href="#myCarousel"
                data-slide="prev"
              >
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a
                class="right carousel-control"
                href="#myCarousel"
                data-slide="next"
              >
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>

        <!-- Post Instagram -->
        <?php 
          $i=1;
          $argsinsta = array( 'post_type' => 'testimonials', 'posts_per_page' => 4, 'meta_key' => 'post_instagram', 'meta_value' => 'a:1:{i:0;s:2:"Si";}' );  
          
          $instas = new WP_Query($argsinsta);   
          if ($instas->have_posts()) : while($instas->have_posts() ) : $instas->the_post();  
              $post_thumbnail_id = get_post_thumbnail_id( $instas->id );  
              $url = wp_get_attachment_url( $post_thumbnail_id); 

              // one
              $id_p = get_the_ID();
              global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'antes' and post_id = '$id_p'"); 
              foreach($result_link as $r)
              {
                      $id = $r->meta_value;
              } 
              // two   
              $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_wp_attached_file' and post_id = '$id'"); 
              foreach($result_link2 as $r)
              {
                      $url_file2 = '/'.$r->meta_value;
              }
              $link_file = link_upload()."/wp-content/uploads/".$url_file2; 

              $result_links = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'despues' and post_id = '$id_p'"); 
              foreach($result_links as $rs)
              {
                      $ids = $rs->meta_value;
              } 
              // two   
              $result_links2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_wp_attached_file' and post_id = '$ids'"); 
              foreach($result_links2 as $rs)
              {
                      $url_files2 = '/'.$rs->meta_value;
              }
              $link_files = link_upload()."/wp-content/uploads/".$url_files2;                                             
        ?>        
        <div class="col-md-3 col-sm-4 col-xs-6 item-testimonial" style="overflow: hidden;">
          <a class="insta-testimonial-item" href="<?php the_field('instagram_testimonios'); ?>" target="blank">
            <div class="insta-poster-description">
              <p>
                 <?php the_content(); ?>
              </p>
            </div>
            <div class="insta-poster-transition">
              <img class="img-responsive slide-testimonial-img lazy-hidden" data-lazy-type="image"
              src="//powerbuildingoficial.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif"
              data-src="<?php echo  $link_file; ?>" width="" height="" alt="" />
              <img class="img-responsive slide-testimonial-img2 lazy-hidden" data-lazy-type="image"
              src="//powerbuildingoficial.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif"
              data-src="<?php echo $link_files; ?>" width="" height="" alt="" />
            </div>
            <div class="insta-poster-meta">
              <img class="icon-instagram" src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-instagram.svg" alt="" />
              <p><?php the_title(); ?></p>
            </div>
          </a>
        </div>
        <?php $i++; endwhile; endif; ?>



      </div>
    </div>
  </section>
