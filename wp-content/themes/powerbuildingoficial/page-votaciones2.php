<?php  get_header(); ?>
<?php
global $wpdb;  
 
    $result_activar_votacion = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."options WHERE option_name = 'activar_activar_votacion'"); 
    foreach($result_activar_votacion as $r)
    {
            $activar_votacion = $r->option_value;
    } 

    $result_fecha_votacion = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."options WHERE option_name = 'activar_fecha_votacion'"); 
    foreach($result_fecha_votacion as $r)
    {
            $fecha_votacion = $r->option_value;
            $years = date("Y", strtotime($fecha_votacion)); 
            $months = date("m", strtotime($fecha_votacion)); 
            $days = date("d", strtotime($fecha_votacion)); 
    }  
    $hoy= date("Y-m-d");
    $fecha_inicio_a = new DateTime($hoy);
    $fecha_finalizacion_a = new DateTime($fecha_votacion);
    $diff = $fecha_inicio_a->diff($fecha_finalizacion_a);

   if ($activar_votacion == 'Si') { 
   
?>   
<?php
        $pedidos = get_posts( array(
             'numberposts' => -1,
             'meta_key'    => '_customer_user',
             'meta_value'  => get_current_user_id(),
             'post_type'   => wc_get_order_types(),
             'post_status' => array_keys( wc_get_order_statuses() ),
             
         ) );
   
           $cliente = wp_get_current_user();
           $idcliente = $cliente->ID;
         foreach ($pedidos as $pedido)
         {
           $wp_pedido = new WC_Order($pedido->ID);  
           $usuario = new WP_User($wp_pedido->user_id);
           $informacion_usuario = get_userdata($wp_pedido->user_id);
           $lineas_pedido = $wp_pedido->get_items();
           foreach ($lineas_pedido as $linea_pedido)
                 {
                 $idproducto=$linea_pedido['product_id'];
                 $producto = new WC_Product($idproducto);
                 $id_productos= $linea_pedido['product_id'];
                 
             } 
         }    
?>

<section id="hero">
        <div
          id="carousel-voting"
          class="carousel slide carousel-fade carousel-voting"
          data-ride="carousel-voting"
        >
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div
              class="active item bk-voting"
              style="background-image: url(<?php echo get_theme_mod('vota_banner1_imagen'); ?>)"
            >
              <div class="carousel-caption">
                <p class="text-hashtag-white">
                  <?php echo get_theme_mod('vota_banner1_titulo'); ?>
                </p>
                <h1 class="title-banner">
                  <?php echo get_theme_mod('vota_banner1_contenido'); ?>
                </h1>                
                <div class="btn-start">
                  <a class="buttom-gradient-red" href="<?php echo get_theme_mod('vota_banner1_link'); ?>"><?php echo get_theme_mod('vota_banner1_boton'); ?></a>
                </div>                
              </div>
            </div>
  
            <div
              class="item bk-voting"
              style="background-image: url(<?php echo get_theme_mod('vota_banner2_imagen'); ?>)"
            >
              <div class="carousel-caption">
                <p class="text-hashtag-white">
                  <?php echo get_theme_mod('vota_banner2_titulo'); ?>
                </p>
                <h1 class="title-banner">
                  <?php echo get_theme_mod('vota_banner2_contenido'); ?>
                </h1>
                <div class="btn-start">
                  <a class="buttom-gradient-red" href="<?php echo get_theme_mod('vota_banner2_link'); ?>"><?php echo get_theme_mod('vota_banner2_boton'); ?></a>
                </div>
              </div>
            </div>
  
            <div
              class="item bk-voting"
              style="background-image: url(<?php echo get_theme_mod('vota_banner3_imagen'); ?>)"
            >
              <div class="carousel-caption">
                <p class="text-hashtag-white">
                  <?php echo get_theme_mod('vota_banner3_titulo'); ?>
                </p>
                <h1 class="title-banner">
                  <?php echo get_theme_mod('vota_banner3_contenido'); ?>
                </h1>
                <div class="btn-start">
                  <a class="buttom-gradient-red" href="<?php echo get_theme_mod('vota_banner3_link'); ?>"><?php echo get_theme_mod('vota_banner3_boton'); ?></a>
                </div>
              </div>
            </div>
          </div>


        </div>
</section>
<section id="voting">

    <div class="container">
            <div class="title-section text-center">
                    <h2>El mejor cambio de la semana.</h2>
                    <h6 class="text-link">El post con más votos será publicado en nuestra cuenta de Instagram <a href="https://www.instagram.com/powerbuilding_oficial/" target="blank">@powerbuilding_oficial</a></h6> 
            </div> 
            <?php if($id_productos != NULL) { ?>
                    <div class="btn-page-upload-post text-center">
                      <a href="<?php bloginfo('url') ?>/index.php/publicacion">AÑADIR PUBLICACIÓN +</a>
                    </div>
            <?php }  ?>


             <div class="count-down text-center">
              <form name="form">
                <p>Las votaciones finalizan en:</p>
                <div class="counter text-center container">
                    <input type="hidden" size="5" class="form_input" name="year" disabled>
                    <input type="hidden" size="5" class="form_input" name="month" disabled>

                    <div class="days">
                        <span id="days"><?php if ($hoy <= $fecha_votacion) { echo  $dias_faltantes = $diff->days; } else echo "0";?></span>
                        <p>DIAS</p>
                    </div>





                </div>
              </form>
            </div>

            <div class="voting-posts-content">
              <div class="row">

                <!-- Post 1 -->
            <?php 
              $count=0;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."options WHERE option_name = 'siteurl'"); 
              foreach($result_link as $r)
              {
                $link = $r->option_value;
              }            
              $link_file = $link."/wp-content/uploads/";
              $argspublicacion = array( 'post_type' => 'publicacions',  'showposts' => 4,  );  
 
              $publicacions = new WP_Query($argspublicacion);   
              if ($publicacions->have_posts()) : while($publicacions->have_posts() ) : $publicacions-> the_post();   
                   $post_thumbnail_id = get_post_thumbnail_id( $publicacions->id );  
                   $url = wp_get_attachment_url( $post_thumbnail_id);
                   $count=+1;
              // one

              $id_p = get_the_ID();
              global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'publicacion' and post_id = '$id_p'"); 
              foreach($result_link as $r)
              {
                      $id = $r->meta_value;
              } 
              // two   
              $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_wp_attached_file' and post_id = '$id'"); 
              foreach($result_link2 as $r)
              {
                      $url_file2 = $link_file.'/'.$r->meta_value;
              }
              
            ?>                              
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <article class="voting-post-item">

                     <header class="header-post-item">
                  <div class="photo-profile">
                   <img alt="Powerbuilding" src="https://powerbuildingoficial.com/wp-content/uploads/2019/10/Powerbuilding_avatar-50x50.png" data-lazy-type="image" data-src="https://powerbuildingoficial.com/wp-content/uploads/2019/10/Powerbuilding_avatar-50x50.png" class="avatar avatar-50 photo lazy-loaded" height="50" width="50">
                  </div>
                  <div class="name-profile">
                    <p><?php the_author(); ?></p>
                  </div>
                     </header>

                     <div class="content-img-post-item">
                       <img class="img-responsive" src="<?php echo $url_file2;?>" alt="">
                     </div>

                     <footer class="footer-post-item">
                     <div class="btn-vote col-md-12">
                       <?php the_content();?>
                     </div>

                    </footer>
                     
                   </article>
               </div>  
            <?php
          endwhile;
        endif;
        wp_reset_postdata();
      ?>
              <!-- Publicidad -->

              <div class="col-md-12 col-sm-12 hidden-xs">
          <a href="https://powerbuildingoficial.com/index.php/programas">
                <img class="img-responsive" src="<?php echo get_theme_mod('publicidad_imagen'); ?>" alt="" style="margin-top: 30px;">
            </a>
              </div>
              <div class="visible-xs col-xs-12">
          <a href="https://powerbuildingoficial.com/index.php/programas">
                <img class="img-responsive" src="https://powerbuildingoficial.com/wp-content/uploads/2019/11/publicidad-posts-movil.jpg" alt="" style="margin-top: 30px;">
            </a>
              </div>
                <!-- Post 2 -->
            <?php 
              $count=0;
              $argspublicacion = array( 'post_type' => 'publicacions',  'showposts' => 12,  'offset' => 4);  
 
              $publicacions = new WP_Query($argspublicacion);   
              if ($publicacions->have_posts()) : while($publicacions->have_posts() ) : $publicacions-> the_post();   
                   $post_thumbnail_id = get_post_thumbnail_id( $publicacions->id );  
                   $url = wp_get_attachment_url( $post_thumbnail_id);
                   $count=+1;
              // one

              $id_p = get_the_ID();
              global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'publicacion' and post_id = '$id_p'"); 
              foreach($result_link as $r)
              {
                      $id = $r->meta_value;
              } 
              // two   
              $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_wp_attached_file' and post_id = '$id'"); 
              foreach($result_link2 as $r)
              {
                      $url_file2 = $link_file.'/'.$r->meta_value;
              }
              
            ?>                              
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <article class="voting-post-item">

                     <header class="header-post-item">
                  <div class="photo-profile">
                    <img alt="Powerbuilding" src="https://powerbuildingoficial.com/wp-content/uploads/2019/10/Powerbuilding_avatar-50x50.png" data-lazy-type="image" data-src="https://powerbuildingoficial.com/wp-content/uploads/2019/10/Powerbuilding_avatar-50x50.png" class="avatar avatar-50 photo lazy-loaded" height="50" width="50">
                  </div>
                  <div class="name-profile">
                    <p><?php the_author(); ?></p>
                  </div>
                     </header>

                     <div class="content-img-post-item">
                       <img class="img-responsive" src="<?php echo $url_file2;?>" alt="">
                     </div>

                     <footer class="footer-post-item">
                     <div class="btn-vote col-md-12">
                       <?php the_content();?>
                     </div>

                    </footer>
                     
                   </article>
               </div> 
            <?php
          endwhile;
        endif;
        wp_reset_postdata();
      ?>

            </div>

            </div>
    </div>

</section> 
<?php } ?>

 <?php if ($activar_votacion == '') { ?>

<section id="voting">

    <div class="container">
            <div class="title-section text-center">
                <header class="page-header">
                    <h2 class="page-title">No hay votaciones a mostrar.</h2>
                    <h2 style="height: 100px"></h2>
                </header>
            </div>
</section>

 <?php   } ?>          
<!--****************************** Cronómetro ******************************-->


<?php  get_footer(); ?>
