<?php  get_header(); ?>
 <?php
              global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE slug = 'tienda'"); 
              foreach($result_link as $r)
              {
                      $id_cat = $r->term_id;
              }
 ?>


 <style type="text/css">
      .img-responsive {
    display: block;
    width: 100%;
    height: 285px;
    object-fit: cover;
}
.info-item-shop {
    height: 155px;
}
 </style>
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
                                    <input  name="cat" id="cat" value="tienda" class="form-control" type="hidden">
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
                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'tienda' ); ?>
                <?php $loop = new WP_Query( $args ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?> 

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="item-shop">
                            <a href="<?php the_permalink() ?>">
                                <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title(); ?>">
                                <div class="info-item-shop">
                                    <p class="details-item-shop"></p>
                                    <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                    <div class="row">
                                       
                                        <div class="col-md-7 col-sm-8 col-xs-8"><span
                                                class="price-item-shop" style="font-weight:600!important"><?php echo $product->get_price_html(); ?></span></div>
                                    </div>

                                    <span>
                                        <form action="">                             
                                          <a class="btn-add-to-bag text-center" href="?add-to-cart=<?php echo get_the_ID(); ?>"><span class="icon-add-to-bag"><img src="<?php echo get_bloginfo('template_directory') ?>/images/icons/icon-bag.svg" alt="Add to bag"></span> AGREGAR A LA BOLSA</a>                              
                                        </form>
                                    </span>

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
<?php  get_footer(); ?>    