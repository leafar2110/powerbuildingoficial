<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
global $wpdb;


   if(is_product_category()){   
    $term_cat_id = get_queried_object_id();
    $prod_term        =    get_term($term_cat_id,'product_cat');
    $categoria =    $prod_term->slug;        
   }
?>
    <section id="programs-powerbuilding" class="programs margin-top-page">
        <div class="container" style="min-height:200px">
          <header>
            <div>
              <div class="row">
                <div >
                        <div class="col-lg-8 col-md-8 col-sm-12">
                                  <div class="title-page text-left col-md-12" style="margin-bottom:30px;">
                                      <h1>Tienda Powerbuilding</h1>                           
                                  </div>


                        </div>  
                        <div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom:30px;">
                            <form class="navbar-form search-programs" id="ajax-form" method="post" action="">
                                <div class="form-group">
                                    <input  name="cat" id="cat" value="<?php echo $categoria; ?>" class="form-control" type="hidden">
                                    <input type="text" name="cadena" id="cadena" class="form-control" placeholder="Buscar productos...">
                                </div>
                                <button type="submit" name="enviar" value="enviar" class="btn btn-default" onclick="ocultartienda();"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-search.svg"
                                        alt=""></button>
                            </form>
                        </div>          
                </div>                
              </div>
            </div>    
          </header>



            <div id="content-shop">
                <div class="row">
                <?php $args = array( 'post_type' => 'product', 'product_cat' => $categoria ); ?>
                <?php $loop = new WP_Query( $args ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
                $producto = get_the_ID();
                $cat = NULL;
                $subca = NULL;

                $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_relationships WHERE object_id = '$producto' "); 
                foreach($result_link as $ra)
                {
                   $term_taxonomy_id = $ra->term_taxonomy_id;
                   $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_taxonomy_id = '$term_taxonomy_id' AND taxonomy = 'product_cat' "); 
                   foreach($result_link as $re)
                   {  
                      $term_taxonomy_id2  = $re->term_taxonomy_id;
                      $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$term_taxonomy_id2' "); 
                    foreach($result_link as $res)
                      {
                        if ($res->slug == 'packs') {
                             $subca = 'packs';
                         } 
                      }  
                   }  
                 }              
                ?> 

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                        <div class="item-shop">
                            <a href="<?php the_permalink() ?>" >
                                <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title(); ?>" >
                                <div class="info-item-shop">
                                    
                                    <h5 class="title-item-shop" > <a href="<?php the_permalink() ?>" ><?php the_title(); ?></a> </h5>
                                    
                                    <?php if ($subca != 'packs') { ?>    
                                        <span class="price-item-shop" style="font-weight:600!important; color:#808285;"><?php echo $product->get_price_html(); ?></span>                    
                                   <?php } ?>
                                    <?php if ($subca == 'packs') { ?>    
                                        <span class="price-item-shop" style="font-weight:600!important; color:#808285;"><?php the_field('precio_producto_pack') ?>€</span>                    
                                   <?php } ?>                                   
                                    

                                </div>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>

<div id="posts_container" style="min-height:200px"><div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div></div>
        </div>
    </section>

    <section id="btn-top">
        <span class="ir-arriba glyphicon glyphicon-chevron-up">
        </span>
    </section>


<?php
get_footer( 'shop' );
