<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<section id="related-products">

    <div class="subnav">
      
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-xs-12">
            <ul class="nav nav-pills">
              <li class="active"><a href="#" data-toggle="tab">PRODUCTOS SIMILARES</a></li>
            </ul>
          </div>
        </div>
      
    </div>

    
      <div class="row">
        <div id="carousel-touch-product" class="col-md-12 heroSlider-fixed">

          <!-- Slider -->
          <div class="slider responsive row">
    <?php 
    $args = array( 'post_type' => 'product',
                'product_cat' => 'tienda',
                'post__not_in'    =>array(get_the_ID()),
                'posts_per_page'  => 6,
                'orderby'     =>'rand'     
      );?>
               <?php $loop = new WP_Query( $args ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
                     $post_id = get_the_ID();
                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_p = $category->name;               
                     }
                ?>     


            <div class="itcp col-md-3 col-sm-6 col-xs-12">
              <div class="item-shop">
                <a href="<?php the_permalink() ?>">
                  <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                  <div class="info-item-shop">
                    <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> </h5>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles</a></span></div>
                      <div class="col-md-6 col-sm-6 col-xs-6 text-right"><span class="price-item-shop"><?php echo $product->get_price_html(); ?></span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
<?php endwhile; ?>



          </div>
          <!-- control arrows -->
          <div id="constrols-itcp">
            <div class="prev">
              <a class="left carousel-control" aria-hidden="true"><i class="glyphicon glyphicon-chevron-left"></i></a>
            </div>
            <div class="next">
              <a class="right carousel-control" aria-hidden="true"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    

  </section>

<?php endif;

wp_reset_postdata();
