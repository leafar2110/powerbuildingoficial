<?php 

if(is_user_logged_in() == NULL)
{
  header('Location: https://powerbuildingoficial.com/iniciar-sesion/');
} 
?>
<?php 
if (is_user_logged_in()){    
          $cu = wp_get_current_user();      
          $id_usu= $cu->ID;
          $nombreusu_usu= $cu->user_login;
          $nombre_usu= $cu->user_firstname;
          $apellido_usu= $cu->user_lastname;
          $email_usu= $cu->user_email;
   } 

$nivel = usermeta_value( 'wp_capabilities', $id_usu ); 
$parte1=explode('"',$nivel);
$parte2=explode('"',$parte1[1]);
$nivel_acceso= $parte2[0];
$usu_vendedor= usermeta_value( 'vendedores', $id_usu ); 
//if ($usu_vendedor != NULL) {
//  header('Location: https://powerbuildingoficial.com/ventas');
//}

?>
<?php  get_header(); ?>
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
           $fecha_pedido = $pedido->post_date;
           $wp_pedido = new WC_Order($pedido->ID);  
           $usuario = new WP_User($wp_pedido->user_id);
           $informacion_usuario = get_userdata($wp_pedido->user_id);
           $lineas_pedido = $wp_pedido->get_items();
           foreach ($lineas_pedido as $linea_pedido)
                 {
                 $idproducto=$linea_pedido['product_id'];
                 $producto = new WC_Product($idproducto);
                 $id_productos= array($linea_pedido['product_id']);
                 
             } 
         }    
?>

<section id="user-profile">
  <div class="hero-user-profile">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12">
          <div class="photo-user-profile ">           
          
                  <?php                   
                   if (is_user_logged_in()){
                     echo get_avatar( $current_user->user_email, 165 ); 
                    }?>                  
          </div>
          <div class="editar-user">
            <center><a href="<?php echo get_home_url() ?>/mi-cuenta">Ver/Editar</a></center>
          </div>  
        </div>
        <div class="col-md-10 col-sm-9 col-xs-12">
          <div class="data-user-profile">
            <div class="name-user">
              <h1><?php echo "$nombre_usu $apellido_usu"; ?></h1>
            </div>
            <div class="email-user">
              <p><?php echo "$email_usu"; ?></p>
            </div>
            <?php if ($usu_vendedor != NULL) { ?>
            <div class="link-votaciones" style="margin-bottom:20px">
               <a class="btn btn-default btn-link-votaciones" href="<?php bloginfo('url') ?>/ventas">&nbsp; &nbsp; &nbsp; &nbsp; VER MIS VENTAS &nbsp; &nbsp;&nbsp;  &nbsp; </a>
            </div>   
            <?php } ?>			  
            <div class="link-votaciones">
              <?php if($id_productos != NULL) { ?>
                <a class="btn btn-default btn-link-votaciones" href="<?php bloginfo('url') ?>/index.php/publicacion">COMPARTIR MI PROGRESO</a>
              <?php } ?>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="subnav">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <ul class="nav nav-pills subnav-profile">
            <li class="active"><a href="#tab-asesoria" data-toggle="tab" role="tab" aria-controls="tab3">ASESORAMIENTO</a></li>
            <li><a <a href="#tab-programas" data-toggle="tab" role="tab" aria-controls="tab4">MIS PROGRAMAS</a></li>
            <li><a href="#tab-ebooks" data-toggle="tab" role="tab" aria-controls="tab5">EBOOKS</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="tabContent1" class="tab-content" style="min-height:300px">
  <!-- asesoria -->
   <div role="tabpanel" class="tab-pane fade in active" id="tab-asesoria">
    <div class="container">
    <div class="row content-asesoria">    
        <?php
         $i=0;
         $impri = 1;
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
           $fecha_pedido = $pedido->post_date;
           $id_pedido = $pedido->ID;
           $wp_pedido = new WC_Order($pedido->ID);  
           $usuario = new WP_User($wp_pedido->user_id);
           $informacion_usuario = get_userdata($wp_pedido->user_id);
           $lineas_pedido = $wp_pedido->get_items();
           foreach ($lineas_pedido as $linea_pedido)
                 {
                 $idproducto=$linea_pedido['product_id'];
                 $producto = new WC_Product($idproducto);
                 $id_productos= $linea_pedido['product_id'];
                 
             
          $i=$i+1;
        ?>    
              <?php
              $archivo_dietas=NULL;
              $id_dietas=NULL;
              $id_dieta=NULL;
              $cuestionario_realizado=NULL;
              $cuestionario_realizado_p=NULL;

              $archivo_entres=NULL;
              $id_entres=NULL;
              $id_entre=NULL;
              $cuestionario_realizado_entre=NULL;
              $cuestionario_realizado_entre_p=NULL;

              $post_id = $id_productos;
              $queried_post = get_post($post_id);
              $title = $queried_post->post_title;  
              $link_pr = $post_url = get_permalink( $id_entrenador);   


              // Lista category echo wc_get_product_category_list (262);
              $i = 0;
              foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
                  $categoria_p = $category->name;               
              }

              global $wpdb;  

              $id_entrenador = meta_value( 'entrenador', $post_id ); 
              $queried_post_entrenador = get_post($id_entrenador);
              $nombre_entrenador = $queried_post_entrenador->post_title;
              $link_producto_ase = get_permalink( $post_id ); 


              $result_cuestionario_dieta = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_status = 'publish' and post_author = '$id_usu' and post_type = 'cuestionarios_dieta'"); 
              foreach($result_cuestionario_dieta as $rdieta)
              {
                      $id_dieta = $rdieta->ID;

                      $result_cuestionario_dietas_p = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE post_id = '$id_dieta' and meta_key = 'id_pedido' and meta_value = '$id_pedido' "); 
                      foreach($result_cuestionario_dietas_p as $rdietsa)
                      {
                        $cuestionario_realizado_p="si";                            
                      }                      
                     
                      $result_cuestionario_dietas = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE post_id = '$id_dieta' and meta_key = 'id_pedido' and meta_value = '$id_pedido' "); 
                      foreach($result_cuestionario_dietas as $rdietsa)
                      {
                        $result_cuestionario_dietas_pro = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE post_id = '$id_dieta' and meta_key = 'producto_id' and meta_value = '$post_id' "); 
                        foreach($result_cuestionario_dietas_pro as $rentres)
                        {                        
                           $cuestionario_realizado="si";
                           $id_dietas = meta_value( 'archivo_plan_de_alimentacion',  $id_dieta );                 
                           $queried_post_dietas = get_post($id_dietas);
                           $archivo_dietas = $queried_post_dietas->guid;                              
                        }
                      }

              }           

              $result_cuestionario_entre = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_status = 'publish' and post_author = '$id_usu' and post_type = 'cuestionarios_entre'"); 
              foreach($result_cuestionario_entre as $rentre)
              {
                      $id_entre = $rentre->ID;

                      $result_cuestionario_entres_p = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE post_id = '$id_entre' and meta_key = 'id_pedido_entre' and meta_value = '$id_pedido' "); 
                      foreach($result_cuestionario_entres_p as $rdietsa)
                      {
                        $cuestionario_realizado_entre_p="si";                            
                      }                        
                     

                      $result_cuestionario_entres = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE post_id = '$id_entre' and meta_key = 'id_pedido_entre' and meta_value = '$id_pedido' "); 
                      foreach($result_cuestionario_entres as $rentres)
                      {

                        $result_cuestionario_entres_pro = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE post_id = '$id_entre' and meta_key = 'producto_id_entre' and meta_value = '$post_id' "); 
                        foreach($result_cuestionario_entres_pro as $rentres)
                        {                        
                           $cuestionario_realizado_entre="si";
                           $id_entres = meta_value( 'archivo_plan_de_entrenamiento',  $id_entre );                 
                           $queried_post_entres = get_post($id_entres);
                           $archivo_entres = $queried_post_entres->guid; 
                        }                                // 
                      }

              }  



              $whatsapp_entrenador = meta_value( 'whatsapp', $id_entrenador ); 
              $whatsapp_entrenador_limpio = limpia_espacios($whatsapp_entrenador);

              $email_entrenador = meta_value( 'email', $id_entrenador );

 
              $id_img_entrenador = meta_value( '_thumbnail_id', $id_entrenador );                 
                     $queried_post_img_entrenador = get_post($id_img_entrenador);
                     $imagen_entrenador = $queried_post_img_entrenador->guid;

              $fecha_inicio = NULL;
              $fecha_finalizacion = NULL;


?>
  
    <!-- código para mostrar content -->  
 
    
 
   <?php if ($categoria_p == "ASESORÍAS"){ ?>
    <?php 
                      $fecha_inicio = date("Y-m-d", strtotime($fecha_pedido) ); 
         
               foreach((get_the_terms($post_id, 'duracion' )) as $category) 
              {                
                  $cat_duracion = $category->name;               
              }  
                         
                $cat_duracion_num_origi = intval(preg_replace('/[^0-9]+/', '', $cat_duracion), 10);
                $cat_duracion_num = $cat_duracion_num_origi*7;
                $hoy = date('Y-m-d');
                $fecha_finalizacion = strtotime('+'.$cat_duracion_num.' day',strtotime($fecha_inicio));
                $fecha_finalizacion = date('Y-m-d',$fecha_finalizacion);
               // $fecha_finalizacion = date("Y-m-d", strtotime($fecha_finalizacions) );
            

              if ($fecha_finalizacion != NULL) {
                $finalizacion = obtenerFechaEnLetra($fecha_finalizacion);
              }
    ?>
    <div class="content-user-profile">
      <div class="container">
        <div class="advice-content-user"
        <div class="title-section-user-profile">
            <h4><?php echo $title; ?></h4>
            <div class="data-info-trainer-category">
                <p>Por <a class="data-info-trainer" href="<?php echo $link_entrenador; ?>"><?php echo $nombre_entrenador; ?></a> - <a class="data-info-category" href=""><?php echo meta_value( 'tipo', $post_id ); ?> </a></p>
              </div>
        </div>
        <div class="content-service-user">
          <div class="row">
           <div class="col-md-9 col-sm-8">
              <div class="bg-details-service-user">
                <h5>PROGRESO DE LA ASESORÍA</h5>
                <p>Finaliza <span class="data-term-date"> <?php echo $finalizacion; ?></span></p> 
                <div class="progress progress-advice">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo progreso( $fecha_inicio, $fecha_finalizacion); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <?php
                      $semanas_asesorados = semanas_asesorados( $fecha_inicio, $fecha_finalizacion);
                      $semanas_asesorias = semanas_asesorias( $fecha_inicio, $fecha_finalizacion );
                      if ($semanas_asesorados > $semanas_asesorias){
                        $semanas_asesorados = $semanas_asesorias;
                      }
                      echo  $semanas_asesorados; ?> de <?php echo $cat_duracion_num_origi; ?></div>
                </div>
               <div class="add-workout-program">
                <div class="row">
                  <div class="col-md-2 col-sm-12">
                    <div class="base-icon-details-service-user"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-dumbbell.svg" alt=""></div>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <h5>Plan deportivo</h5>
                    
                    <div class="btn-ask-questionnaire">
                        <?php if ($cuestionario_realizado_entre == NULL and $id_entres == NULL){?> 
                           <p>Hola! necesito que realices el cuestionario para elaborar tu plan deportivo...</p>
                           <a class="btn btn-default btn-link-typeform" data-toggle="modal" data-target="#modal_entrenamiento_<?php echo $id_pedido;?>_<?php echo $post_id;?>">HACER CUESTIONARIO</a>
                        <?php } ?>

                      <?php if ($cuestionario_realizado_entre_p != NULL){ ?>  
                        <?php if ($cuestionario_realizado_entre != NULL and $id_entres == NULL){?>                      
                           <p>Gracias! estoy preparando tu plan deportivo, en un plazo máximo de 72h podrás descargarlo desde aquí...</p>
                           <a class="btn btn-default btn-link-typeform" style="background-color:#D6D6D6!important;color:#000000!important;" >EN PREPARACIÓN</a>
                        <?php } ?> 
                        <?php if ($cuestionario_realizado_entre != NULL and $id_entres != NULL ){?>
                           <p>ESTA LISTO! te dejo tu plan deportivo para que puedas descargarlo. ¡Dale duro!</p>
                           <a class="btn btn-default btn-link-typeform buttom-gradient-red" style="background-color:#000000!important;color:#ffffff!important;" href="<?php echo $archivo_entres; ?>" download="<?php echo $archivo_entres; ?>">DESCARGAR PLAN DEPORTIVO</a>
                        <?php } ?> 
                      <?php } ?>                                                                                                                           
                    </div>
                  </div>
                </div>
              </div>
              <div class="add-diet-program">
                  <div class="row">
                    <div class="col-md-2 col-sm-12">
                      <div class="base-icon-details-service-user"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-apple.svg" alt=""></div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                      <h5>Plan nutricional</h5>
                      
                      <div class="btn-ask-questionnaire">
                        <?php if ($cuestionario_realizado == NULL and $id_dietas == NULL){?>
                           <p>Hola! realiza el cuestionario para elaborar tu plan de alimentación...</p>
                           <a class="btn btn-default btn-link-typeform" data-toggle="modal" data-target="#modal_dieta_<?php echo $id_pedido?>_<?php echo $post_id;?>">HACER CUESTIONARIO</a>
                        <?php } ?>
                      <?php if ($cuestionario_realizado_p != NULL){ ?>
                        <?php if ($cuestionario_realizado != NULL and $id_dietas == NULL){?>
                           <p>Gracias! estoy preparando tu plan nutricional, en un plazo máximo de 72h podrás descargarlo desde aquí...</p>
                           <a class="btn btn-default btn-link-typeform" style="background-color:#D6D6D6!important;color:#000000!important;">EN PREPARACIÓN</a>
                        <?php } ?> 
                        <?php if ($cuestionario_realizado != NULL and $id_dietas != NULL ){?>
                           <p>ESTA LISTO! te dejo tu plan de alimentación para que puedas descargarlo. ¡No te la saltes!</p>
                           <a class="btn btn-default btn-link-typeform buttom-gradient-red" style="background-color:#000000!important;color:#ffffff!important;" href="<?php echo $archivo_dietas; ?>" download="<?php echo $archivo_dietas; ?>"><i class="fa-arrow-alt-to-right" ></i>DESCARGAR PLAN DE ALIMENTACIÓN</a>
                        <?php } ?>
                      <?php } ?>                                                    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="whatsapp-tracking">
                    <div class="row">
                      <div class="col-md-2 col-sm-12">
                        <div class="base-icon-details-service-user"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-whatsapp.svg" alt=""></div>
                      </div>
                      <div class="col-md-8 col-sm-12">
                        <h5>Seguimiento vía WhatsApp</h5>
                        <p>Evaluaremos tus avances día a día y cualquier consulta que tengas escríbeme...</p>
                        <div class="btn-service-user">
                          <a class="btn btn-default btn-link-typeform active-btn-service-user" href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp_entrenador_limpio;?>">ENVIAR MENSAJE</a>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="skype-meeting">
                    <div class="row">
                      <div class="col-md-2 col-sm-12">
                        <div class="base-icon-details-service-user"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-skype.svg" alt=""></div>
                      </div>
                      <div class="col-md-8 col-sm-12">
                        <h5>Reunión por Skype</h5>
                        <p>Conozcámonos! cuando gustes solicítame una reunión vía Skype...</p>
                        <div class="btn-service-user">
                          <a class="btn btn-default btn-link-typeform active-btn-service-user" href="mailto:<?php echo $email_entrenador;?>">SOLICITAR REUNIÓN</a>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="photo-trainer">
                  <img class="img-responsive" src="<?php echo $imagen_entrenador; ?>" alt="">
                </div>
                <div class="info-trainer-service text-center">
                  <h5><?php echo  $nombre_entrenador; ?></h5>
                   <p><span><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-mail.svg" alt="" width="13" height="auto"></span>
                    <?php echo $email_entrenador;?></p>
  
                    <p><span><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-whatsapp.svg" alt="" width="13" height="auto"></span> +
                      <?php echo $whatsapp_entrenador;?></p>
                </div>
              </div>
          </div>
        </div>        
      </div>
      </div>
  

    
<!-- Modal Dieta -->
<div class="modal fade" id="modal_dieta_<?php echo $id_pedido;?>_<?php echo $post_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Cuestionario Dieta</h4>
      </div>
      <div class="modal-body">
        <div><br></div>
        <?php echo do_shortcode('[frm-set-get id_pedido='.$id_pedido.'][frm-set-get producto_id='.$post_id.'][frm-set-get producto_link='. $link_producto_ase.'][formidable id=7]');  ?>
      </div>
    </div>
  </div>
</div>   

<!-- Modal Entrenamiento -->
<div class="modal fade" id="modal_entrenamiento_<?php echo $id_pedido;?>_<?php echo $post_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Cuestionario Entrenamiento</h4>
      </div>
      <div class="modal-body">
        <div><br></div>
        <?php echo do_shortcode('[frm-set-get id_pedido_entre='.$id_pedido.'][frm-set-get producto_id_entre='.$post_id.'][frm-set-get producto_link_entre='. $link_producto_ase.'][formidable id=8]');  ?>
      </div>
    </div>
  </div>
</div>     
  <?php  }  }  } ?>
    </div>
    </div>
  </div>

  <!-- Programas -->
   <div role="tabpanel" class="tab-pane fade" id="tab-programas">
    <div class="content-programas">   



    <div class="content-user-profile">
      <div class="container">
        <div class="advice-content-user">
          <h4>PROGRAMAS</h4>
        </div>
       

              <div class="shop-content">
                <div class="row">
 <?php $cont =0;$impri=0; $post_id_diferent =0; ?>
 <?php if ( $downloads = $woocommerce->customer->get_downloadable_products() ) : ?>
    <?php echo $has_downloads; ?>   
      <?php foreach ( $downloads as $download ) : ?>
        <?php
        // Get order date
        $order              = new WC_Order( $download['order_id'] );
        $items              = $order->get_items();
        $downloadLimit      = get_post_meta( $download['product_id'], '_download_limit', true );
        $downloadsRemaining = ( $downloadLimit - $download['downloads_remaining'] );
        $downloadOrder      = (array) $order;
        $file_name = $download['file']['name'];
        ?>  
        <!--  -->     
          <?php
          $post_id = $download['product_id'];

          if ($post_id != $post_id_diferent) {
            if ($impri == 1) { ?>
                          </span>
                        </div>
                      </a>
                    </div>                    
                  </div>              
          <?php  }
            $cont =0;$impri=0; 
          }
          /////////////////////////////////////             
          
          $post_id = $download['product_id'];
                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_d = $category->name;               
                     }
              $queried_post = get_post($post_id);
              $title = $queried_post->post_title;     

              $id_img_producto = meta_value( '_thumbnail_id', $post_id );                 
                     $queried_post_img_producto = get_post($id_img_producto);
                     $imagen_producto = $queried_post_img_producto->guid;      
              $link_producto = get_permalink( $post_id );  
              $product = new WC_Product($post_id); 

              $id_archivo_producto = meta_value( 'subir_archivo_programas', $post_id );                 
                     $queried_post_archivo_producto = get_post($id_archivo_producto);
                     $archivo_producto = $queried_post_archivo_producto->guid;  
              
               //Shows the price                     
              // Lista category echo wc_get_product_category_list (262);
              $i = 0;
              foreach((get_the_terms( $post_id, 'product_cat' )) as $category) {                
                  $categoria_p = $category->name;
                  $cat_id = $category->term_id;               
              }
              foreach((get_the_terms($post_id, 'niveles' )) as $niveles) 
              {                
                  $niveles_p = $niveles->name;               
              }              
              
              if ($categoria_p != "PROGRAMAS" and $categoria_p != "PROGRAMAS POWERBUILDING") {
                  $categoria_p = parent_cat($cat_id);
               } 


          if ( $showDate ) {
            echo date( 'm/d/Y', strtotime( $downloadOrder['order_date'] ) ) . ' - ';
          }
          do_action( 'woocommerce_available_download_start', $download );
          if ( is_numeric( $download['downloads_remaining'] ) ) {
            if ( $showDownloads ) {
              echo 'Downloaded ' . $downloadsRemaining . ' time. ';
            }
          }
          if ( $showDownloadCount ) {
            echo apply_filters( 'woocommerce_available_download_count', '<span class="wc-my-downloads-count">' . $download['downloads_remaining'] . '</span> / ', $download );
            echo apply_filters( 'woocommerce_available_available_download_count', '<span class="wc-my-downloads-available-count">' . $downloadLimit . ' downloads remaining. </span>', $download );
          }

    if ($categoria_p == "PROGRAMAS" OR $categoria_p == "PROGRAMAS POWERBUILDING"){ 
      //// 
      if ($cont == 0 ) {
           $impri=1; $post_id_diferent=$post_id;
           //////////////////
      
      ?>

                  <div class="col-md-3 col-sm-6 col-xs-12">                    
                    <div class="item-shop">
                      <a href="<?php echo $link_producto; ?>">
                        <img class="img-responsive" src="<?php echo $imagen_producto; ?>" alt="">
                        <div class="info-item-shop">
                          <p class="details-item-shop"><?php echo''.$categoria_d.' | '.$niveles_p.''; ?></p>
                          <h5 class="title-item-shop"><span class="no-bold"><a href="<?php echo $link_producto; ?>"><?php echo $title; ?></a> </span></h5>
                          
                          <span>
           <?php  } $cont=$cont+1;?>                            
                            <form action="">                             
                                  <?php  echo apply_filters( 'woocommerce_available_download_link', '<a class="btn-add-to-bag text-center" href="' . esc_url( $download['download_url'] ) . '" ><i class="glyphicon-glyphicon-download-alt" ></i>DESCARGAR</a>', $download );
          do_action( 'woocommerce_available_download_end', $download ); ?>                             
                            </form>


  
     <?php } ?> 
      <?php endforeach; ?>  
      <!-- -->
                          </span>
                        </div>
                      </a>
                    </div>                    
                  </div>
      <!-- -->            
  <?php else: ?>
    <?php echo $no_downloads; ?>
  <?php endif; ?>
    </div>
  </div>
</div>
</div>
</div>
</div>


  <!-- Ebooks -->
   <div role="tabpanel" class="tab-pane fade" id="tab-ebooks">
    <div class="container">
    <div class="row content-ebooks">   



    <div class="content-user-profile">
      <div class="container">
        <div class="advice-content-user">
          <h4>EBOOKS</h4>
        </div>
       

              <div class="shop-content">
                <div class="row">

 <?php if ( $downloads = $woocommerce->customer->get_downloadable_products() ) : ?>
    <?php echo $has_downloads; ?>   
      <?php foreach ( $downloads as $download ) : ?>
        <?php
        // Get order date
        $order              = new WC_Order( $download['order_id'] );
        $items              = $order->get_items();
        $downloadLimit      = get_post_meta( $download['product_id'], '_download_limit', true );
        $downloadsRemaining = ( $downloadLimit - $download['downloads_remaining'] );
        $downloadOrder      = (array) $order;
        ?>       
          <?php 
              $post_ide = $download['product_id'];
              $queried_post = get_post($post_ide);
              $title = $queried_post->post_title;     

              $id_img_producto = meta_value( '_thumbnail_id', $post_ide );                 
                     $queried_post_img_producto = get_post($id_img_producto);
                     $imagen_producto = $queried_post_img_producto->guid;      
              $link_producto = get_permalink( $post_ide );  
              $product = new WC_Product($post_ide); 

              $id_archivo_producto = meta_value( 'subir_archivo_programas', $post_ide );                 
                     $queried_post_archivo_producto = get_post($id_archivo_producto);
                     $archivo_producto = $queried_post_archivo_producto->guid;  
              
               //Shows the price                     
              // Lista category echo wc_get_product_category_list (262);
              $i = 0;
              foreach((get_the_terms( $post_ide, 'product_cat' )) as $category) {                
                  $categoria_pe = $category->slug;               
              }




          if ( $showDate ) {
            echo date( 'm/d/Y', strtotime( $downloadOrder['order_date'] ) ) . ' - ';
          }
          do_action( 'woocommerce_available_download_start', $download );
          if ( is_numeric( $download['downloads_remaining'] ) ) {
            if ( $showDownloads ) {
              echo 'Downloaded ' . $downloadsRemaining . ' time. ';
            }
          }
          if ( $showDownloadCount ) {
            echo apply_filters( 'woocommerce_available_download_count', '<span class="wc-my-downloads-count">' . $download['downloads_remaining'] . '</span> / ', $download );
            echo apply_filters( 'woocommerce_available_available_download_count', '<span class="wc-my-downloads-available-count">' . $downloadLimit . ' downloads remaining. </span>', $download );
          }

    if ($categoria_pe == "ebooks" or $categoria_pe == "ebooks-tienda"){ ?>

                  <div class="col-md-3 col-sm-6 col-xs-12">                    
                    <div class="item-shop">
                      <a href="<?php echo $link_producto; ?>">
                        <img class="img-responsive" src="<?php echo $imagen_producto; ?>" alt="">
                        <div class="info-item-shop">
                          <h5 class="title-item-shop"><span class="no-bold"><a href="<?php echo $link_producto; ?>"><?php echo $title; ?></a> </span></h5>
                          
                          <span>
                            <form action="">                             
                                  <?php  echo apply_filters( 'woocommerce_available_download_link', '<a class="btn-add-to-bag text-center" href="' . esc_url( $download['download_url'] ) . '" ><i class="fa-arrow-alt-to-right" ></i>DESCARGAR</a>', $download );
          do_action( 'woocommerce_available_download_end', $download ); ?>                             
                            </form>
                          </span>
                        </div>
                      </a>
                    </div>                    
                  </div>

  
     <?php } ?> 
      <?php endforeach; ?>  
  <?php else: ?>
    <?php echo $no_downloads; ?>
  <?php endif; ?>
    </div>
  </div>
</div>
</div>

</div>
</div>
</div>
</section>
  




  <?php  get_footer();