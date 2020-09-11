<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

get_header( 'shop' ); 


foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
   $cat = $category->name; 
   $cate =$category->slug;              
}

//////// PROGRAMAS POWERBUILDING
if ($cat == 'PROGRAMAS POWERBUILDING') { 
global $post, $product, $woocommerce;
get_header( 'shop' );

global $woocommerce;

$product = new WC_Product(get_the_ID()); 
echo $product->get_price_html(); //Shows the price

$currency = get_woocommerce_currency_symbol();
$price = get_post_meta( get_the_ID(), '_regular_price', true);
$sale = get_post_meta( get_the_ID(), '_sale_price', true);
echo $desc = $price-$sale;
echo $desc = $desc /$price;
echo $desc = $desc*100;
$desc = number_format($desc,0);

              $id_p = get_the_ID();
              global $wpdb;   
  
             
              $ida = meta_value( 'banner_programas_powerbuilding', $id_p );
 
              $url_file2 = meta_value( '_wp_attached_file', $ida );

              $link_file = link_upload()."/wp-content/uploads/".$url_file2;

              foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
                  $categoria_p = $category->name;               
              }
              foreach((get_the_terms($post_id, 'duracion' )) as $category) 
              {                
                  $categoria_pro = $category->name;               
              }   

              foreach((get_the_terms($post_id, 'entrenamientos' )) as $category) 
              {                
                  $categoria_entrenamientos = $category->name;               
              }   

              foreach((get_the_terms($post_id, 'niveles' )) as $category) 
              {                
                  $categoria_nivel = $category->name;               
              }                                       
?>
  
<section id="detail-product">            
    <div class="hero-profile-trainer" style="background-image: url(<?php the_field('banner_programas_powerbuilding'); ?>);">
      <div class="container">
        <div class="product-detail-action">
          <div class="row">


          <div class="col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
            <div class="product-top-wrapper">
              <div class="product-action">
                
                  <h1><?php the_title();?></h1>
                  <div class="description-product-hero">
                    <p><?php echo short_description($id_p); ?></p>
                  </div>
                 <?php if( $sale == NULL ){  ?>
                  <div class="price-detail">
                    <span class="price-item-shop"><?php echo $product->get_price_html();  ?> &nbsp;</span>                     
                  </div>
                 <?php } ?> 
                 <?php if( $sale != NULL ){  ?>
                  <div class="price-detail">
                    <span class="price-item-shop"><?php echo get_woocommerce_currency_symbol().$product->get_sale_price();  ?> &nbsp;</span>
                    
                    <span class="price-badges">
                      <span class="promo-tag"> REBAJADO</span>
                      <span class="price-badges-prices">
                        <span class="price-discount"> &nbsp;<?php echo $desc; ?>% Dto. </span>
                        <b class="price-before"><?php echo get_woocommerce_currency_symbol().$product->get_regular_price(); ?></b>
                      </span>
                    </span>                    
                  </div>
                 <?php } ?>
                  
                  <div class="shop">
                      <span>
                          <form action="">
                             <a class="btn-add-to-bag text-center" href="?add-to-cart=<?php echo get_the_ID(); ?>"><span class="icon-add-to-bag"><img src="<?php echo get_bloginfo('template_directory') ?>/images/icons/icon-bag.svg" alt="Add to bag"></span> AGREGAR A LA BOLSA</a>       
                          </form>
                      </span>
<!-- 
                      <div class="">
        <div class="title-section text-center">
            <h2 style="color: white;">RECIBE EL DEMO EXCLUSIVO PBO</h2>
            
          </div>
          <div style="max-width: 600px;margin: 0 auto;">
            <style type="text/css">
              input{
                color: white !important;
              }
            </style>
              <iframe class="mj-w-res-iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://app.mailjet.com/widget/iframe/4qCC/jZj" width="100%"></iframe>
              </div>
    </div> -->
                  </div>
               
              </div>
            </div>
          </div>

          <div class="col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
            <div class="product-top-wrapper min-width-370">
              <div class="photo-product">
                  <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="programa powerbuilding">
              </div>
              <div class="product-detail">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">

                    <span class="item-product-detail">Duración</span>
                    <h6 class="duration-product"><?php echo $categoria_pro; ?></h6>                    

                    <span class="item-product-detail">Entrenamientos</span>
                    <h6 class="trainer-product"> <?php echo $categoria_entrenamientos; ?></h6>

                    <span class="item-product-detail">Equipamiento</span>
                    <h6 class="equipemment-product"><?php the_field('equipamiento'); ?></h6>

                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-6">

                    <span class="item-product-detail">Nivel</span>
                    <h6 class="trainer-product"><?php echo  $categoria_nivel; ?></h6>
 
                    <span class="item-product-detail">Categoría</span>
                    <h6 class="duration-product"><?php echo meta_value( 'tipo', $id_p ); ?></h6>
 
                   </div>
                </div>
              </div>
            </div>
          </div>

          </div>
      </div>
      </div>
    </div>

    <div class="subnav">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-xs-12">
            <ul class="nav nav-pills subnav-profile">
              <li class="active"><a href="#content-detail-product" data-toggle="tab">ACERCA DE</a></li>
              <li><a href="#content-faqs-product" data-toggle="tab">PREGUNTAS FRECUENTES</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="tab-content">

      <div id="content-detail-product" class="content-detail-product tab-pane active">
      <div class="container">

         <div class="row">
          <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-7 col-xs-12">        
               <div class="description-product">
                  <div class="row">
                      <div class="col-md-2">
                          <h5>Descripción</h5>
                      </div>
                      <div class="col-md-10">
                          <p><?php echo description($id_p); ?></p>
                      </div>
                  </div>
               </div>

               <div class="objectives-product">
                  <div class="row">
                      <div class="col-md-2">
                          <h5>Objetivos</h5>
                      </div>
                      <div class="col-md-10 margin-top-60"> 
                      <span class='glyphicon glyphicon-ok'></span>                        
                      <?php
                          $campo_largo = meta_value( 'objetivos_descripcion', $id_p ); 
                          echo str_replace("\n", "<br><br><span class='glyphicon glyphicon-ok'></span> ", $campo_largo); 
                       ?>
                      </div>
                  </div>
               </div>

               <div class="method-product">
                  <div class="row">
                      <div class="col-md-2">
                          <h5>Método</h5>
                      </div>
                      <div class="col-md-10">
                          <p><?php the_field('metodo'); ?>
                          </p> <br>
                      </div>
                   <?php if ($categoria_p == "ASESORÍAS"){ ?>
                      <div class="col-md-10 col-md-offset-2 method-product-workmode">
                          <h5>
                              <span> <img src="<?php echo get_template_directory_uri(); ?>/images/services/icon-workmode-test.svg" alt=""></span> 
                              Cuestionario para planificar tu entrenamiento y dieta.
                          </h5>

                           <h5> 
                              <span class="icon-with-25"> <img src="<?php echo get_template_directory_uri(); ?>/images/services/icon-workmode-whatsapp.svg" alt=""></span> 
                              Seguimiento diario por tu entrenador vía WhatsApp.
                          </h5>

                          <h5> 
                              <span class="icon-with-25"> <img src="<?php echo get_template_directory_uri(); ?>/images/services/icon-workmode-skype.svg" alt=""></span> 
                               Reunión con tu entrenador vía Skype.
                          </h5>
                      </div>
                   <?php } ?>
                  </div>
               </div>
                 
           
          </div>

         </div>

      </div>
      </div>

          <div id="content-faqs-product" class="content-faqs-product tab-pane">
            <div class="container">
              <div class="row">
                <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-7 col-xs-12">
                    <div class="faqs-product">
                        <div class="row">

                            <div class="col-md-5">
                              <h5>1. ¿Cómo se cual es mi nivel de entrenamiento?</h5>
                            </div>
                            <div class="col-md-7">
                              <p>
                                Para sacar el máximo partido posible a los programas de entrenamiento es importante que seas realista y escojas el nivel que más se ajusta a tu situación.<br><br>
                                Algunas orientaciones que podemos darte son el tiempo que llevas entrenando o el rendimiento que has alcanzado.<br><br>
                                Aproximadamente, si llevas menos de dos años entrenando eres principiante, si llevas entre dos y seis años eres intermedio y si llevas más de seis años entrenando eres avanzado.<br><br>
                                Por su parte, si levantas menos de 1 vez tu peso corporal en press de banca, 1,5 veces en sentadilla y 2 veces en muerto eres principiante, si levantas entre 1-1,5 en press de banca, 1,5-2 en sentadilla y 2-2,5 en muerto eres intermedio y si levantas más de 1,5 en press de banca, 2 en sentadilla y 2,5 en peso muerto eres avanzado.<br><br>
                              </p>
                            </div>

                            <div class="col-md-5">
                                <h5>2. ¿Necesito doce semanas para notar cambios o con seis semanas es suficiente?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                  Los resultados dependen de tu esfuerzo. Si bien es cierto que siguiendo bien todas las indicaciones seis semanas son suficientes para que se produzcan adaptaciones, con doce semanas es mucho más probable que notes los cambios y consigas tus objetivos. <br><br> 
                                </p>
                            </div>


                            <div class="col-md-5">
                                <h5>3. ¿A qué hora debería entrenar? ¿Pasa algo si cambio mi hora de entrenamiento?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                   No existe suficiente evidencia científica para poder concretar un horario de entrenamiento que sea mejor para todo el mundo, simplemente escoge la hora que mejor se adapte a tu día a día.<br><br>
                                   Si bien es cierto que recomendamos entrenar siempre a la misma hora para que tengas una rutina que te ayude a entrenar mejor y respetar más los descansos de un entrenamiento a otro, no pasa nada si tienes que cambiar de hora, puedes realizar perfectamente tu entrenamiento.<br><br> 
                                   
                                </p>
                            </div>


                            <div class="col-md-5">
                                <h5>4. ¿Qué pasa si me tengo que saltar una sesión de entrenamiento?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                  Entendemos que, debido al resto de obligaciones del día a día, muchos os veréis obligados a perder de vez en cuando alguna sesión de entrenamiento. <br><br> 
                                  Todos los programas tienen al menos un día de descanso, por lo que os recomendamos recuperar la sesión al día siguiente y mover todos los entrenamientos en el mismo orden que están hasta ocupar el próximo día de descanso.<br><br> 
                                </p>
                            </div>

                            <div class="col-md-5">
                                <h5>5. Tengo o he tenido una lesión ¿Puedo realizar igualmente el programa de entrenamiento?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                  Todos nuestros programas adaptan la intensidad al esfuerzo percibido por la persona que va a realizarlo, por lo que simplemente tendrías que ajustar los pesos para que no se produzca ningún tipo de molestia. <br><br> 
                                  Todos los programas tienen al menos un día de descanso, por lo que os recomendamos recuperar la sesión al día siguiente y mover todos los entrenamientos en el mismo orden que están hasta ocupar el próximo día de descanso.<br><br> 
                                </p>
                            </div>


                            <div class="col-md-5">
                                <h5>6. ¿En el programa de entrenamiento detalláis como realizar el calentamiento?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                  Con este programa de entrenamiento añadimos también a tu carrito totalmente gratis nuestra “GUIA DEFINITIVA DE CALENTAMIENTO PARA POWERBUILDERS” en la cual detallamos paso a paso como realizar el calentamiento.<br><br> 
                                </p>
                            </div>  


                            <div class="col-md-5">
                                <h5>7. ¿Qué hago si tengo alguna duda con mi programa de entrenamiento?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                  Es importante que primero leas toda la información que adjuntamos a tu programa.<br><br>
                                  En ella detallamos exactamente como seguir la programación, además de vincular videos para que puedas ver cómo realizar todos y cada uno de los ejercicios mostrados.<br><br>
                                  Si a pesar de ello tienes alguna duda que está exclusivamente relacionada con el programa adquirido y no con tu caso concreto puedes escribirnos a nuestro correo <a href="mailto:soporte@powerbuildingoficial.com">soporte@powerbuildingoficial.com</a> y te responderemos en un plazo máximo de 48 horas.<br><br> 
                                </p>
                            </div>


                        </div>
                     </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </section>

<section id="comment-programs">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
          <?php
           /**
            * Remove product data tabs
            */
              add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

              function woo_remove_product_tabs( $tabs ) {

                 unset( $tabs['description'] );        // Remove the description tab
                 // unset( $tabs['reviews'] );      // Remove the reviews tab
                 unset( $tabs['additional_information'] );   // Remove the additional information tab
                 return $tabs;
              }

              remove_action( 'woocommerce_after_single_product_summary','woocommerce_output_related_products', 20 );
              do_action( 'woocommerce_after_single_product_summary' );
           ?>
      </div>  
    </div>
  </div>
</section>


 <section id="related-products">

    <div class="subnav">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-xs-12">
            <ul class="nav nav-pills">
              <li class="active"><a href="#" data-toggle="tab">PRODUCTOS SIMILARES</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div id="carousel-touch-product" class="col-md-12 heroSlider-fixed">
          <div class="overlay1-carousel visible-xs"></div>
          <div class="overlay2-carousel visible-xs"></div>
          <!-- Slider -->
          <div class="slider responsive row">
    <?php 
    $args = array( 'post_type' => 'product',
                'product_cat' => $cate,
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
                    <p class="details-item-shop">Programa <?php echo $categoria_p; ?></p>
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
    </div>

  </section>




 

<?php }
//////////// Programas y Asesorías x entrenadores
if ($cat != 'TIENDA' AND $cat != 'PROGRAMAS POWERBUILDING') { 
global $post, $product, $woocommerce;
get_header( 'shop' );

global $woocommerce;

$product = new WC_Product(get_the_ID()); 
echo $product->get_price_html(); //Shows the price

$currency = get_woocommerce_currency_symbol();
$price = get_post_meta( get_the_ID(), '_regular_price', true);
$sale = get_post_meta( get_the_ID(), '_sale_price', true);
echo $desc = $price-$sale;
echo $desc = $desc /$price;
echo $desc = $desc*100;
$desc = number_format($desc,0);

              $id_p = get_the_ID();
              global $wpdb;  
 
              $id = meta_value( 'entrenador', $id_p );

              $result_linkt = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$id' "); 
              foreach($result_linkt as $rt)
              {
                      $entrenador = $rt->post_title;
              } 
             
              $ida = meta_value( 'banner_programas_powerbuilding', $id );
 
              $url_file2 = meta_value( '_wp_attached_file', $ida );

              $link_file = link_upload()."/wp-content/uploads/".$url_file2;

              foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
                  $categoria_p = $category->name;               
              }
              foreach((get_the_terms($post_id, 'duracion' )) as $category) 
              {                
                  $categoria_pro = $category->name;               
              }     
              foreach((get_the_terms($post_id, 'niveles' )) as $category) 
              {                
                  $categoria_nivel = $category->name;               
              }                        
?>
  
<section id="detail-product">            
    <div class="hero-profile-trainer" style="background-image: url(<?php the_field('banner_programas_powerbuilding'); ?>);">
      <div class="container">
        <div class="product-detail-action">
          <div class="row">


          <div class="col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
            <div class="product-top-wrapper">
              <div class="product-action">
                
                  <h1><?php the_title();?></h1>
                  <div class="description-product-hero">
                    <p><?php echo short_description($id_p); ?></p>
                  </div>

                 <?php if( $sale == NULL ){  ?>
                  <div class="price-detail">
                    <span class="price-item-shop"><?php echo $product->get_price_html();  ?> &nbsp;</span>                     
                  </div>
                 <?php } ?> 
                 <?php if( $sale != NULL ){  ?>
                  <div class="price-detail">
                    <span class="price-item-shop"><?php echo get_woocommerce_currency_symbol().$product->get_sale_price();  ?> &nbsp;</span>
                    
                    <span class="price-badges">
                      <span class="promo-tag"> REBAJADO</span>
                      <span class="price-badges-prices">
                        <span class="price-discount"> &nbsp;<?php echo $desc; ?>% Dto. </span>
                        <b class="price-before"><?php echo get_woocommerce_currency_symbol().$product->get_regular_price(); ?></b>
                      </span>
                    </span>                    
                  </div>
                 <?php } ?>                
                  
                  <div class="shop">
                      <span>
                          <form action="">
                             <a class="btn-add-to-bag text-center" href="?add-to-cart=<?php echo get_the_ID(); ?>"><span class="icon-add-to-bag"><img src="<?php echo get_bloginfo('template_directory') ?>/images/icons/icon-bag.svg" alt="Add to bag"></span> AGREGAR A LA BOLSA</a>       
                          </form>
                      </span>
  
                  </div>
               
              </div>
            </div>
          </div>
 





          <div class="col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
            <div class="product-top-wrapper min-width-370">
              <div class="photo-product">
                  <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
              </div>
              <div class="product-detail">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">

                    <span class="item-product-detail">Entrenador</span>
                    <h6 class="trainer-product"> <?php echo $entrenador; ?></h6>

                    <span class="item-product-detail">Duración</span>
                    <h6 class="duration-product"><?php echo $categoria_pro; ?></h6>

                    <span class="item-product-detail">Equipamiento</span>
                    <h6 class="equipemment-product"><?php the_field('equipamiento'); ?></h6>

                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-6">

                    <span class="item-product-detail">Nivel</span>
                    <h6 class="trainer-product"><?php echo  $categoria_nivel; ?></h6>
 
                    <span class="item-product-detail">Categoría</span>
                    <h6 class="duration-product"><?php echo meta_value( 'tipo', $id_p ); ?></h6>
 
                   </div>
                </div>
              </div>
            </div>
          </div>

          </div>
      </div>
      </div>
    </div>

    <div class="subnav">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-xs-12">
            <ul class="nav nav-pills subnav-profile">
              <li class="active"><a href="#content-detail-product" data-toggle="tab">ACERCA DE</a></li>
              <li><a href="#content-faqs-product" data-toggle="tab">PREGUNTAS FRECUENTES</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="tab-content">

      <div id="content-detail-product" class="content-detail-product tab-pane active">
      <div class="container">

         <div class="row">

          <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-7 col-xs-12">
          


               <div class="description-product">
                  <div class="row">
                      <div class="col-md-2">
                          <h5>Descripción</h5>
                      </div>
                      <div class="col-md-10">
                          <p><?php echo description($id_p); ?></p>
                      </div>
                  </div>
               </div>

               <div class="objectives-product">
                  <div class="row">
                      <div class="col-md-2">
                          <h5>Objetivos</h5>
                      </div>
                      <div class="col-md-10 margin-top-60"> 
                      <span class='glyphicon glyphicon-ok'></span>                        
                      <?php
                          $campo_largo = meta_value( 'objetivos_descripcion', $id_p ); 
                          echo str_replace("\n", "<br><br><span class='glyphicon glyphicon-ok'></span> ", $campo_largo); 
                       ?>
                      </div>
                  </div>
               </div>

               <div class="method-product">
                  <div class="row">
                      <div class="col-md-2">
                          <h5>Método</h5>
                      </div>
                      <div class="col-md-10">
                          <p><?php the_field('metodo'); ?>
                          </p> <br>
                      </div>
                   <?php if ($categoria_p == "ASESORÍAS"){ ?>
                      <div class="col-md-10 col-md-offset-2 method-product-workmode">
                          <h5>
                              <span> <img src="<?php echo get_template_directory_uri(); ?>/images/services/icon-workmode-test.svg" alt=""></span> 
                              Cuestionarios individualizados para planificar tus objetivos.
                          </h5>

                           <h5> 
                              <span class="icon-with-25"> <img src="<?php echo get_template_directory_uri(); ?>/images/services/icon-workmode-whatsapp.svg" alt=""></span> 
                              Atención diaria por tu asesor vía WhatsApp.
                          </h5>

                          <h5> 
                              <span class="icon-with-25"> <img src="<?php echo get_template_directory_uri(); ?>/images/services/icon-workmode-skype.svg" alt=""></span> 
                               Reunión con tu asesor vía Skype.
                          </h5>
                      </div>
                   <?php } ?>
                  </div>
               </div>
                 
           
          </div>

         </div>

      </div>
      </div>

          <div id="content-faqs-product" class="content-faqs-product tab-pane">
            <div class="container">
              <div class="row">
                <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-7 col-xs-12">
                    <div class="faqs-product">
                        <div class="row">

                            <div class="col-md-5">
                              <h5>1. ¿Conseguiré resultados en solo cuatro semanas?</h5>
                            </div>
                            <div class="col-md-7">
                              <p>
                                Los resultados dependen de tu esfuerzo. Si bien es cierto que siguiendo bien todas las indicaciones cuatro semanas son suficientes para que se produzcan adaptaciones, renovando la asesoría es mucho más probable que notes los cambios y consigas tus objetivos.<br><br>
                              </p>
                            </div>

                            <div class="col-md-5">
                                <h5>2. ¿Las asesorías son personalizadas?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                 Absolutamente todas nuestras asesorías (tanto deportivas como nutricionales) son desarrolladas por un profesional atendiendo a tus circunstancias y objetivos personales.<br><br> Para ello, lo primero que hacemos cuando contratas el servicio es cargar dos cuestionarios con todas las preguntas necesarias para elaborar tus planes. <br><br> 
                                </p>
                            </div>


                            <div class="col-md-5">
                                <h5>3. ¿Cómo será el seguimiento? ¿Dónde encontraré mi plan?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                   En un plazo máximo de 72 horas desde que hayas cumplimentados los dos cuestionarios iniciales, tu asesor subirá tus planes en la pestaña de “ASESORAMIENTO”.<br><br>
                                   El seguimiento del proceso será diario vía WhatsApp, con un plazo máximo de 24 horas para contestarte por parte del asesor. Este último te irá pidiendo todos los datos, fotografías y mediciones que necesita para detallar tu programa y es tu responsabilidad enviárselo.<br><br> La actualización del plan se realizará en la misma pestaña cada dos semanas en base a las adaptaciones y sensaciones subjetivas que comuniques a tu asesor.<br><br> 
                                   
                                </p>
                            </div>


                            <div class="col-md-5">
                                <h5>4. ¿Puedo concretar una reunión con mi asesor?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                  Si, en caso de que consideres necesario concretar una reunión solo tendrás que solicitársela a tu asesor. Para ello tendréis que acordar una fecha y hora que os vaya bien, tendrá una duración de 30 minutos y será vía Skype.<br><br> 
                                </p>
                            </div>

                            <div class="col-md-5">
                                <h5>5. ¿El asesor me mandará también como realizar el calentamiento?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                 Al contratar este servicio añadimos también a tu carrito totalmente gratis nuestra “GUIA DEFINITIVA DE CALENTAMIENT, ACTIVACIÓN Y LIBERACIÓN” en la cual detallamos paso a paso como realizar el calentamiento.<br><br> 
                                </p>
                            </div>


                            <div class="col-md-5">
                                <h5>6. ¿Qué hago si tengo alguna duda con mi asesoría y no me responde mi asesor?</h5>
                            </div>
                            <div class="col-md-7">
                                <p>
                                 Es importante que seas paciente y tengas confianza con tu asesor para decirle todo lo que necesites. 
Si a pesar de ello tienes alguna duda que está exclusivamente relacionada con el programa adquirido y no con tu caso concreto puedes escribirnos a nuestro correo <a href="mailto:soporte@powerbuildingoficial.com">soporte@powerbuildingoficial.com</a> y te responderemos en un plazo máximo de 48 horas.
<br><br> 
                                </p>
                            </div>  



                        </div>
                     </div>
                </div>
              </div>
            </div>
          </div>

    </div>

  </section>

  <section id="related-products">

    <div class="subnav">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-xs-12">
            <ul class="nav nav-pills">
              <li class="active"><a href="#" data-toggle="tab">PRODUCTOS SIMILARES</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div id="carousel-touch-product" class="col-md-12 heroSlider-fixed">
         <!-- <div class="overlay1-carousel visible-xs"></div>
          <div class="overlay2-carousel visible-xs"></div>-->
          <!-- Slider -->
          <div class="slider responsive row">
    <?php 
    $args = array( 'post_type' => 'product',
                'product_cat' => $cate,
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


            <div class="itcp col-md-4 col-sm-6 col-xs-12">
            <!--  <div class="item-shop">
                <a href="<?php the_permalink() ?>">
                  <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                  <div class="info-item-shop">
                    <p class="details-item-shop">Programa <?php echo $categoria_p; ?></p>
                    <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> </h5>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles</a></span></div>
                      <div class="col-md-6 col-sm-6 col-xs-6 text-right"><span class="price-item-shop"><?php echo $product->get_price_html(); ?></span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>-->
            </div>
<?php endwhile; ?>



          </div>
          <!-- control arrows 
          <div id="constrols-itcp">
            <div class="prev">
              <a class="left carousel-control" aria-hidden="true"><i class="glyphicon glyphicon-chevron-left"></i></a>
            </div>
            <div class="next">
              <a class="right carousel-control" aria-hidden="true"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
          </div>-->

        </div>
      </div>
    </div>

  </section>


<?php }
//////////// Tienda
if ($cat == 'TIENDA') {
?>          
<?php



    /**
     * woocommerce_before_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     */
 ?>
<section id="programs-powerbuilding" class="product_single">
  <div class="container" >   
 <?php   do_action( 'woocommerce_before_main_content' );
  ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php wc_get_template_part( 'content', 'single-product' ); ?>
          <div class="main-suscribe-members">
        <div class="title-section text-center">
            <h2>RECIBE DEMOS EXCLUSIVOS PBO</h2>
            <p>Únete a los miembros exclusivos de PBO recibirás gratis rutinas, programas y mucho más.</p>
          </div>
          <div style="max-width: 600px;margin: 0 auto;">
              <iframe class="mj-w-res-iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://app.mailjet.com/widget/iframe/4qCC/jZj" width="100%"></iframe>
              </div>
    </div>

    <?php endwhile; // end of the loop. ?>

  <?php
    /**
     * woocommerce_after_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );
  ?>

  <?php
    /**
     * woocommerce_sidebar hook.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    do_action( 'woocommerce_sidebar' );


}

  ?>


</div>
</section>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */