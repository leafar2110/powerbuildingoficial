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
                 $id_productos= array($linea_pedido['product_id']);
                 
                 
             } 
         }    
?>
<?php 
if($id_productos == NULL) 
{ 
  header('Location: https://powerbuildingoficial.com/iniciar-sesion/');
} 
?>
<?php  get_header(); ?>
  
<section class="margin-top-page">
    <div class="container"> 
              <div class="row">                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <center>
                      <h2 style="margin-bottom:20px">!Sube tus archivos!</h2>
                       <?php echo do_shortcode('[formidable id=06]');  ?>
                    </center>
                    <div><br></div>
                    <center><h6 style="margin-bottom:20px"><a href="javascript:history.back()"><strong style="color: #000"> Regresar!</strong></a></h6></center>
                </div>
              </div>        

    </div>

</section>

<?php  get_footer(); ?>
