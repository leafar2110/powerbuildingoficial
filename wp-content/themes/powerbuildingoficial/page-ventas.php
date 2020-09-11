<?php 
if(is_user_logged_in() == NULL)
{
  header('Location: https://powerbuildingoficial.com/');
} 
if (is_user_logged_in()){    
          $cu = wp_get_current_user();      
          $id_usu= $cu->ID;
          $nombreusu_usu= $cu->user_login;
          $nombre_usu= $cu->user_firstname;
          $apellido_usu= $cu->user_lastname;
          $email_usu= $cu->user_email;
   } 
 function last_month_day() { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
 
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
  };  
 /** Actual month first day **/
  function first_month_day() {
      $month = date('m');
      $year = date('Y');
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
  }         
$nivel = usermeta_value( 'wp_capabilities', $id_usu );  
$usu_vendedor= usermeta_value( 'vendedores', $id_usu ); 
$queried_vendedor = get_post($usu_vendedor); 

              $comision_cupon_vendedor1 = meta_value('comisiones_cupones', $usu_vendedor);
              $comision_cupon_vendedor = $comision_cupon_vendedor1/100;
              $comision_asesoria_vendedor1 =  meta_value('comisiones_asesorias', $usu_vendedor);
              $comision_asesoria_vendedor = $comision_asesoria_vendedor1/100;
              $comision_programa_vendedor1 = meta_value('comisiones_programas', $usu_vendedor);
              $comision_programa_vendedor = $comision_programa_vendedor1/100;
              $comision_tienda_vendedor1 = meta_value('comisiones_tienda', $usu_vendedor);
              $comision_tienda_vendedor = $comision_tienda_vendedor1/100;  

$parte1=explode('"',$nivel);
$parte2=explode('"',$parte1[1]);
$nivel_acceso= $parte2[0];
?>

<?php  get_header(); ?>

<style type="text/css">
.text h4,h1{
  color: #000;
}

.btn-start {
  margin-top: 0px !important;
}
#powerbuilding-masthead .flush {
  -webkit-box-shadow: 0px 9px 41px -2px rgba(0,0,0,0.5);
  -moz-box-shadow: 0px 9px 41px -2px rgba(0,0,0,0.5);
  box-shadow: 0px 9px 41px -2px rgba(0,0,0,0.5);
}
.white-color {
  color: #ffffff!important;
}  
.white-color h4,h1{
  color: #ffffff!important;
} 
.white-color {
  color: #ffffff!important;
} 
.col5{
width: 66.66666667%;    
} 
@media only screen and (max-width: 970px) 
{
  .col5{
    width: 41.66666667% !important; 
  }
  .xs-hide{
    display: none;
  }
  .xs-block{
    padding-bottom: 70px !important;
  }
  h1 
  {
    font-size: 18px !important;
  }
  h4 
  {
     font-size: 14px !important;
  }
  p
  {
    color: #000 !important;
    font-size: 10px;
  }
  .white-color span{
  font-size: 30px;
  }
  .avatar {
    width: 70px;
    height: 70px
    }
  .flush span{
    display: block;
    padding-bottom: 5px;
    padding-top: 5px;  
  } 
  .btn-start {
    padding-top: 15px !important;
  } 

  .text h1{
    color: #000!important;
  } 
}

</style>

<?php 
if ($usu_vendedor != NULL && $nombreusu_usu != "IVAN-ALONSO-MOLERO") { 

                $fecha1= first_month_day();
                $fecha2= last_month_day();
if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL) {
  $fecha1 = $_POST["fecha1"];
  $fecha2 = $_POST["fecha2"];
}

$fecha11=$fecha1;
$fecha22=$fecha2;

    $mes1 = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
    $mes1 = $mes1[(date('m', strtotime($fecha1))*1)-1];

    $mes2 = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
    $mes2 = $mes2[(date('m', strtotime($fecha2))*1)-1];  
    if ($mes1 != $mes2) {
       $mes22 = " - ".$mes2.""; 
     } 

  
$fecha1= $fecha1." 00:00:00";
$fecha2= $fecha2." 23:59:59"; 
?>
  
<section id="powerbuilding-masthead" style="margin-top: 150px">
      <div class="container">     
        <div class="flush">
          <div class="row">   
            <div class="col-md-12" style="padding: 20px 30px;">
            <form method="post" >
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-3"><label for='titulo'>RANGO FECHAS: </label> </div>
                  <div class="col-md-3"><span> Desde </span>
                       <input type='date' name='fecha1' id='fecha1'  value='<?php echo $_POST["fecha1"]; ?>'> 
                  </div>
                  <div class="col-md-3"> <span> Hasta </span>
                        <input type='date' name='fecha2' id='fecha2'  value='<?php echo $_POST["fecha2"]; ?>'>         
                  </div>
                 <div class="col-md-3 btn-start">
                       <button type="submit" class="btn btn-default buttom-gradient-red" name="login" value="Acceder">Buscar</button>
                 </div>

                </div>      
              </div>         
            </form> 
            </div>
          </div>  
        </div>  
      </div>
<?php
if ($nombreusu_usu == "growbeats") { ?>
      <div class="container" style="margin-top: 30px">
          <ul class="nav nav-pills subnav-profile">
            <li class="active"><a href="#tab-personal-general" data-toggle="tab" role="tab" aria-controls="tab44">REPORTE PERSONAL</a></li>
            <li ><a href="#tab-direcciones" data-toggle="tab" role="tab" aria-controls="tab33">DIRECCIONES</a></li>
          </ul>  
      </div> 
<?php } ?>      
</section>  

<div id="tabContent1" class="tab-content">
<!-- personal  -->
<div role="tabpanel" class="tab-pane fade in active" id="tab-personal-general"> 
<section id="powerbuilding-masthead" style="margin-top: 50px">
      <div class="container">     
         <div class="flush">
          <div class="row" style="background-color: #272727!important;">            
            <div class="col-md-12 xs-block" style="background-color: #272727!important;padding: 20px;"> 

              <div class="col-md-8 col-xs-5 col5">              
                   <div class="text">
                  <?php                   
                   if (is_user_logged_in()){
                     echo get_avatar( $current_user->user_email ); 
                    }?>
                  </div>          
              </div>
               
              <div class="col-md-4 col-xs-7">
                   <div class="text">
                    <h1 class="white-color" style="font-size: 4rem; margin-top: 20px; color:#fff !important">REPORTE</h1>
                    <p class="white-color"> <?php echo $fecha11; echo " / "; echo $fecha22;?> </p>
                   </div>
              </div> 
            </div> 

            <div class="col-md-12 xs-block" style="background-color: #272727!important;padding-bottom: 20px;"> 
               <div class="col-md-8 col-xs-5 col5">              
                   <div class="text">                  
                     <h4 class="white-color">Afiliado:</h4>
                     <h4 class="white-color" style="font-size: 3rem; "><?php echo $queried_vendedor->post_title; ?></h4>
                   </div>          
               </div>

               <div class="col-md-4 col-xs-7">              
                   <div class="text">                  
                     <h4 class="white-color">Cupón: 
                        <?php
                          $result_linkp = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'shop_coupon' AND ID ORDER BY ID DESC "); 
                          foreach($result_linkp as $p)
                          {     
                            $coupon = $p->ID; 
                            $name_coupon = $p->post_title;
                            $asoc_coupon = meta_value( 'vendedores', $coupon );
                            if ($usu_vendedor == $asoc_coupon) { echo $name_coupon; echo " "; }
                          }
                        ?>
                     </h4>
                     <h4 class="white-color" style="font-size: 2rem;">Mes: <?php echo $mes1; echo $mes22;?></h4>
                   </div>          
               </div>         
            </div>
<?php
       


$veces=0;


$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_date >= '$fecha1' AND post_date <= '$fecha2' AND  post_type = 'shop_order' AND post_status IN ('wc-processing','wc-completed') ORDER BY ID DESC"); 
foreach($result_link as $wc_order)
{
              $id_order = $wc_order->ID;
              $vendedor_cupon=NULL;
              $suma_art = NULL;
              $art = "";
////////////////////////////////////////////////
              $categoria_p = NULL;
              $categoria_h = NULL;
              $categoria = NULL;
              $categoria_pa = NULL;
              $asoc_producto = "";
              $categoria_hijo = "";


           //   $total_producto = "";
              $porcentaje_total_asesoria = "";
              $porcentaje_total_programa = "";
              $porcentaje_total_tienda = "";      
                       
////////////////////////////////////7                    
              $cupon_id = NULL;
              $comision_stripe = meta_value( '_stripe_fee', $wc_order->ID );
              $comision_paypal = meta_value( 'PayPal Transaction Fee', $wc_order->ID );
              $importe_cupon = meta_value( '_cart_discount', $wc_order->ID );
              $total_pagado_stripe = meta_value( '_stripe_net', $wc_order->ID );                              
              $cupon = woocommerce_order_items( coupon, $wc_order->ID );
            
              $fecha = date("Y-m-d", strtotime($wc_order->post_date) ); 
              $code_mes_actual = date('Y-m', strtotime($fecha));

              $metodo =  meta_value( '_payment_method', $wc_order->ID );
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_name = '$cupon' "); 
              foreach($result_link as $r)
              {
                      $cupon_id = $r->ID;                      
              } 
              $vendedor_cupon = meta_value( 'vendedores',  $cupon_id ); 
              $vendedor_cupon_order = meta_value( 'vendedores',  $cupon_id );      

              // % comisiones por articulos
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
              foreach($result_link as $r)
              {               
                      $suma_art= $suma_art + woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              }   
//
if ($cupon != "prueba5852") {

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
foreach($result_link as $r)
{     

              $vendedor_producto=NULL;  
              $comision_cupon=NULL; 
              $productos_pbo_vendedor = NULL;
              $subtotal_array = NULL;
              $total_ventas_camisetas_ivan = NULL;
              $hijo = NULL;
              $total_pbo_comi = NULL;
              $total_pbo = NULL;
              $comi_cupon = NULL;
               $asoc_producto = NULL;

              $vende_producto = NULL;
              $p_comision_cupon_vendedor1 = NULL;
              $p_comision_cupon_vendedor = NULL;
              $p_comision_productos_pbo_vendedor1 = NULL;
              $p_comision_productos_pbo_vendedor = NULL;
              $p_comision_asesoria_vendedor1 =  NULL;
              $p_comision_asesoria_vendedor = NULL;
              $p_comision_programa_vendedor1 = NULL;
              $p_comision_programa_vendedor = NULL;
              $p_comision_tienda_vendedor1 = NULL;
              $p_comision_tienda_vendedor = NULL;

              $coste_articulo = woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              $coste_articulo = round($coste_articulo,2); 
              $product_id = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $qty = woocommerce_itemrmeta_value('_qty',  $r->order_item_id );
              $id_p = $product_id;
              $producto_regalo = meta_value('producto_regalo',$id_p);
              $producto_pbo = meta_value( 'producto_pbo', $id_p );

              $impri = 1;
              $idproducto = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $producto_regalo2 = meta_value('producto_regalo',$idproducto);

             ////////////////////////////////////////////////////////
              $producto = $id_p;
              $queried_p = get_post($producto);
              $name_producto = $queried_p->post_title;
              $asoc_producto = meta_value( 'vendedores', $producto ); 

             ////////growbeats

              if ($nombreusu_usu == "growbeats") { 
                $fecha_entrada = strtotime($fecha);
                $fecha_limite = strtotime("2020-01-21");
                   if ( $fecha_entrada < $fecha_limite ) {
                     $asoc_producto = NULL;
                   }
              }
              if ($id_p == '1213' OR $id_p == '1231') {
                $asoc_producto=2721;
              }
            ////////////////

            
            if ($usu_vendedor == $asoc_producto) {  

                if ($id_order != $id_order1) {
                  $id_order1 = $id_order;
                  $array_pedido[] = $id_order1;
                  $_shipping_first_name[$id_order] = meta_value('_shipping_first_name', $id_order);
                  $_shipping_last_name[$id_order] = meta_value('_shipping_last_name', $id_order);
                  $_shipping_address_1[$id_order] = meta_value('_shipping_address_1', $id_order);
                  $_shipping_city[$id_order] = meta_value('_shipping_city', $id_order);
                  $_shipping_postcode[$id_order] = meta_value('_shipping_postcode', $id_order);
                  $_billing_state[$id_order] = meta_value('_billing_state', $id_order);
                  $_billing_phone[$id_order] = meta_value('_billing_phone', $id_order);
                  $_billing_email[$id_order] = meta_value('_billing_email', $id_order);                   
                }
              

                  $array_order_item_id[] = $r->order_item_id;

                   $count_productos=count($array_productos);
                   for ($f=0; $f < $count_productos; $f++) 
                   { 
                        $producto1=$array_productos[$f];
                        if ($producto1==$idproducto) {
                          $impri=0;
                        }
                   }
                      if ($impri==1 and  $producto_regalo2!='Si') {
                        $array_productos[] = $idproducto;
                      }              

 
              //////////////////////////////////////////////////
              
              $vendedor_producto = meta_value( 'vendedores', $id_p ); 
              $vendedor= $vendedor_producto;

              ////

            
              
              ///// $comision artículos
              if ($suma_art>0) {
                $art = $coste_articulo/$suma_art;
              }
              
              $art_paypal = ($art*$comision_paypal);
              $art_paypal = $art_paypal;

              $art_stripe = ($art*$comision_stripe);
              $art_stripe = $art_stripe;


              $subtotal = ($coste_articulo-$art_stripe)-$art_paypal;

             
            

            //  $subtotal= $coste_articulo-$comision_stripe-$comision_paypal;                
              
              /////CPONES  
            //  $comision_cupon_vendedor = meta_value('comisiones_cupones', $vendedor_cupon_order );

                

              //  if ($producto == $id_p){ 
                 $total_producto = $total_producto + $qty; 
                 $total_pasarela_pago[$producto] = $total_pasarela_pago[$producto]+$art_stripe+$art_paypal;

                 
                 $cat = $categoria_pa;   
                 $total_art_paypal = $total_art_paypal+$art_paypal; 
                 $total_art_stripe = $total_art_stripe+$art_stripe;  
                 $total_importe_cupon[$producto] = $total_importe_cupon[$producto] + $importe_cupon;  
                          
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
               //  }             
   


              $vende_producto = meta_value( 'vendedores', $producto );     

              $p_comision_cupon_vendedor1 = meta_value('comisiones_cupones', $vendedor_cupon );
              $p_comision_cupon_vendedor = $p_comision_cupon_vendedor1/100;

              $p_comision_productos_pbo_vendedor1 = meta_value('comisiones_productos_pbo', $vendedor_cupon);
              $p_comision_productos_pbo_vendedor = $p_comision_productos_pbo_vendedor1/100;

              $p_comision_asesoria_vendedor1 =  meta_value('comisiones_asesorias',  $vende_producto);
              $p_comision_asesoria_vendedor = $p_comision_asesoria_vendedor1/100;

              $p_comision_programa_vendedor1 = meta_value('comisiones_programas',  $vende_producto);
              $p_comision_programa_vendedor = $p_comision_programa_vendedor1/100;

              $p_comision_tienda_vendedor1 = meta_value('comisiones_tienda',  $vende_producto);
              $p_comision_tienda_vendedor = $p_comision_tienda_vendedor1/100;  


              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."ventas_power WHERE code_mes = '$code_mes_actual' AND vendedor = '$vende_producto' "); 
              foreach($result_link as $r)
              {                  
                  $p_comision_cupon_vendedor1 = $r->comision_cupones;
                  $p_comision_cupon_vendedor = $p_comision_cupon_vendedor1/100;
                  $p_comision_asesoria_vendedor1 =  $r->comision_asesoria;
                  $p_comision_asesoria_vendedor = $p_comision_asesoria_vendedor1/100;
                  $p_comision_programa_vendedor1 = $r->comision_programa;
                  $p_comision_programa_vendedor = $p_comision_programa_vendedor1/100;
                  $p_comision_tienda_vendedor1 = $r->comision_tienda;
                  $p_comision_tienda_vendedor = $p_comision_tienda_vendedor1/100;  
                  $p_comision_productos_pbo_vendedor1 = $r->comision_productos_pbo;
                  $p_comision_productos_pbo_vendedor = $p_comision_productos_pbo_vendedor1/100;
              }




              foreach((get_the_terms($producto, 'product_cat' )) as $category) {                
                  $categoria_p = $category->term_id;
                  $categoria_h = $category->slug;               
              }  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$categoria_p' "); 
              foreach($result_link as $cr)
              {                  
                  $categoria = $cr->parent;
              }      
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$categoria' "); 
              foreach($result_link as $cra)
              {                  
                  $categoria_pa = $cra->slug;
              } 

              $cat = NULL;

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_relationships WHERE object_id = '$id_p' "); 
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
                      $cat[] = $res->slug;
                    }  
                 }              
             } 

if ($id_p == '1213' OR $id_p == '1231') {
  $subtotal_array = $qty*18;
}

if ($cat[0] == 'asesorias' OR $cat[1] == 'asesorias' OR $cat[2] == 'asesorias' OR $cat[3] == 'asesorias') {
  $subtotal_array = $qty*$p_comision_asesoria_vendedor1;
}              
 if ($categoria_h == 'programas-powerbuilding' OR $categoria_pa == 'programas-powerbuilding') {
  $subtotal_array = $subtotal*$p_comision_programa_vendedor;
}    
if ($cat[0] == 'tienda' OR $cat[1] == 'tienda' OR $cat[2] == 'tienda' OR $cat[3] == 'tienda') {
  $subtotal_array = $subtotal*$p_comision_tienda_vendedor;  
} 
  $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_relationships WHERE object_id= '$producto' "); 
  foreach($result_link as $cra)
  {                  
      $term_taxonomy_id = $cra->term_taxonomy_id; 
       $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id= '$term_taxonomy_id' "); 
       foreach($result_link as $cra)
       {                  
           $hijo = $cra->slug;

           if ($hijo == 'camisetas') {
             $total_ventas_camisetas_ivan=$qty*3.5;
             //$otro_total_tienda=$producto_array[$producto]-$total_ventas_camisetas_ivan;

           }  
       }      
  }

$total_pbo_comi = $subtotal_array+$total_ventas_camisetas_ivan; 
$total_pbo = $subtotal - $total_pbo_comi;

if ($vendedor_cupon!=$asoc_producto) {

   if ($p_comision_productos_pbo_vendedor1 != NULL && $producto_pbo == "Si") {
     $productos_pbo_vendedor = ($total_pbo*$p_comision_productos_pbo_vendedor);

   }  
   if ($p_comision_productos_pbo_vendedor1 != NULL && $producto_pbo != "Si") {
     $comi_cupon = ($total_pbo*$p_comision_cupon_vendedor); 

   }     

   if ($p_comision_productos_pbo_vendedor1 == NULL && $p_comision_cupon_vendedor != NULL) {
     $comi_cupon = ($total_pbo*$p_comision_cupon_vendedor); 
   } 
}
$total_comi_cupon[$producto] = $total_comi_cupon[$producto] + $comi_cupon + $productos_pbo_vendedor; 
  ///////////////////////////////////////////////////////////777
$producto_subtotal_array[$producto] = $producto_subtotal_array[$producto] + $subtotal_array;
//$producto_subtotal_array[$producto] = $producto_subtotal_array[$producto] +$total_pbo;

$producto_array[$producto] = $producto_array[$producto] + $total;
$total_producto_array[$producto] = $total_producto_array[$producto] + $qty;
$total_producto_array1[$producto] = $total_producto_array1[$producto] + ($qty*$p_comision_asesoria_vendedor1);

///////////////////////////////////////////////  

$ordera = $wc_order->id;                              

}}}}
/////////////////////////////////////////////////////////
$count_productos=count($array_productos);
for ($f=0; $f < $count_productos; $f++) { 
    $producto=$array_productos[$f];  
    $queried_post = get_post($producto);
    $name_producto = $queried_post->post_title;
    

              $total_producto = "";
              $porcentaje_total_asesoria = "";
              $porcentaje_total_programa = "";
              $categoria_p = NULL;
              $categoria_h = NULL;
              $categoria = NULL;
              $categoria_pa = NULL;
              $asoc_producto = "";
              $categoria_hijo = "";

              $vende_producto = meta_value( 'vendedores', $producto );          



              foreach((get_the_terms($producto, 'product_cat' )) as $category) {                
                  $categoria_p = $category->term_id;
                  $categoria_h = $category->slug;               
              }  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$categoria_p' "); 
              foreach($result_link as $cr)
              {                  
                  $categoria = $cr->parent;
              }      
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$categoria' "); 
              foreach($result_link as $cra)
              {                  
                  $categoria_pa = $cra->slug;
              } 
$categoria_hijo = $categoria_h;
$total_producto = $total_producto_array[$producto]; 

if($total_producto>0){ 

if ($producto == '1213' OR $producto == '1231') {
  $categoria_pa = 'tienda';
}


if ($categoria_h == 'asesorias' OR $categoria_pa == 'asesorias') {
//$porcentaje_total_asesoria = ($totales_asesoria*$comision_asesoria_vendedor);

//$porcentaje_total_asesoria = ($total_producto*$comision_asesoria_vendedor1);
  $porcentaje_total_asesoria = ($producto_subtotal_array[$producto]);


$total_asesoria = $total_asesoria + $porcentaje_total_asesoria;
$array_asesoria[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto_array[$producto].'</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_pasarela_pago[$producto],2).'€</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_importe_cupon[$producto],2).'€</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_comi_cupon[$producto],2).'€</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($porcentaje_total_asesoria,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
                    
 }

//programas
if ($categoria_h == 'programas-powerbuilding' OR $categoria_pa == 'programas-powerbuilding') {
//$porcentaje_total_programa = ($totales_programa*$comision_programa_vendedor);
  $porcentaje_total_programa = ($producto_subtotal_array[$producto]);
$total_programa = $total_programa+$porcentaje_total_programa;

$array_programa[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto_array[$producto].'</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_pasarela_pago[$producto],2).'€</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_importe_cupon[$producto],2).'€</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_comi_cupon[$producto],2).'€</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($porcentaje_total_programa,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
 }
  
//tienda
if ($categoria_h == 'tienda' OR $categoria_pa == 'tienda') {

if ($producto == 1213) {
   $name_producto = "AIRSOUND PRO II";
}
if ($producto == 1231) {
   $name_producto = "SHELLSOUND SLIM";
}  
//$porcentaje_total_tienda = ($totales_tienda*$comision_tienda_vendedor);
  $porcentaje_total_tienda = $producto_subtotal_array[$producto];
$total_tienda = $total_tienda+$porcentaje_total_tienda;

$array_tienda[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto_array[$producto].'</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_pasarela_pago[$producto],2).'€</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_importe_cupon[$producto],2).'€</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_comi_cupon[$producto],2).'€</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($porcentaje_total_tienda,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
 }
  
 }}  

//
$count_asesoria=count($array_asesoria);
echo'
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <h4>Asesorías</h4>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Pasarela Pago</h4>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Cupones</h4>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Comisión Venta</h4>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';

if ($total_asesoria==0) {
    echo'  <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div>';
}

for ($i=0; $i < $count_asesoria; $i++) { 
  echo $array_asesoria[$i];
}
 
$count_programa=count($array_programa); 
echo '
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <h4>Programas</h4>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Pasarela Pago</h4>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Cupones</h4>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Comisión Venta</h4>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';

if ($total_programa==0) {
    echo'  <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div>';
}

for ($i=0; $i < $count_programa; $i++) { 
  echo $array_programa[$i];
}    

  
///tienda
$count_tienda=count($array_tienda); 
echo '
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <h4>Tienda </h4>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Pasarela Pago</h4>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Cupones</h4>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Comisión Venta</h4>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';

if ($total_tienda==0) {
    echo'  <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div>';

}

for ($i=0; $i < $count_tienda; $i++) { 
  echo $array_tienda[$i];
}
?>

            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>N°</h4>
                   </div>          
               </div> 
               <div class="col-md-5 col-xs-7">              
                   <div class="text">                  
                     <h4>Cupón % por venta</h4>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Fecha</h4>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Precio - desc.</h4>
                   </div>          
               </div>                              
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div> 

<?php

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_date >= '$fecha1' AND post_date <= '$fecha2' AND  post_type = 'shop_order' AND post_status IN ('wc-processing','wc-completed') ORDER BY ID DESC"); 
foreach($result_link as $wc_order)
{
              $id_order = $wc_order->ID;
              $vendedor_cupon=NULL;
              $suma_art = NULL;
              $art = "";
                          
              $coupon_producto = NULL;
              
              $cupon_id = NULL;
              $comision_stripe = meta_value( '_stripe_fee', $wc_order->ID );
              $comision_paypal = meta_value( 'PayPal Transaction Fee', $wc_order->ID );
              $importe_cupon = meta_value( '_cart_discount', $wc_order->ID );
              $total_pagado_stripe = meta_value( '_stripe_net', $wc_order->ID );                              
              $cupon = woocommerce_order_items( coupon, $wc_order->ID );
            
              $fecha = date("Y-m-d", strtotime($wc_order->post_date) );   
              $code_mes_actual = date('Y-m', strtotime($fecha));
              $metodo =  meta_value( '_payment_method', $wc_order->ID );
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_name = '$cupon' "); 
              foreach($result_link as $r)
              {
                      $cupon_id = $r->ID;                      
              } 
              $vendedor_cupon_order = meta_value( 'vendedores',  $cupon_id );   
              $vendedor_cupon = meta_value( 'vendedores',  $cupon_id );    

              // % comisiones por articulos
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
              foreach($result_link as $r)
              {               
                      $suma_art= $suma_art + woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              }   
//

if($usu_vendedor == $vendedor_cupon_order){ 

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
foreach($result_link as $r)
{     

              $vendedor_producto=NULL;  
              $comision_cupon=NULL;               
              $coste_articulo1 = woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              $coste_articulo = round($coste_articulo1,2); 
              $product_id = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $id_p = $product_id;
              $name_producto = get_post($id_p);
              $producto_regalo = meta_value('producto_regalo',$id_p);
              $asoc_producto = meta_value( 'vendedores', $product_id );
              $qty = woocommerce_itemrmeta_value('_qty',  $r->order_item_id ); 
              
              $vendedor_producto = meta_value( 'vendedores', $id_p ); 
              $vendedor= $vendedor_producto;

              $asesoria_vendedor = NULL;
              $programa_vendedor = NULL;
              $tienda_vendedor = NULL;
              $total_ventas_camisetas_ivan = NULL;
              $comi_cupon = NULL;
              $total_pbo = NULL;
              $total_pbo_comi = NULL;
              $total = NULL;
              $subtotal = NULL;
              $productos_pbo_vendedor = NULL;

              
              ///// $comision artículos
              if ($suma_art>0) {
                $art = $coste_articulo/$suma_art;
              }
              
              $art_paypal = ($art*$comision_paypal);
              $art_paypal = $art_paypal;

              $art_stripe = ($art*$comision_stripe);
              $art_stripe = $art_stripe;


              $subtotal = ($coste_articulo-$art_stripe)-$art_paypal;              
              
              ///// COMISION
              $producto_pbo = meta_value( 'producto_pbo', $id_p );

              $comision_cupon_vendedor1 = meta_value('comisiones_cupones', $vendedor_cupon);
              $comision_productos_pbo_vendedor1 = meta_value('comisiones_productos_pbo', $vendedor_cupon);
              $comision_asesoria_vendedor1 = meta_value('comisiones_asesorias', $asoc_producto);
              $comision_programa_vendedor1 = meta_value('comisiones_programas', $asoc_producto);
              $comision_tienda_vendedor1 = meta_value('comisiones_tienda', $asoc_producto);


              if ( $vendedor_cupon != $vendedor_producto ) {
                  $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."ventas_power WHERE code_mes = '$code_mes_actual' AND vendedor = '$vendedor_cupon' "); 
                  foreach($result_link as $r)
                  {                  
                      $comision_cupon_vendedor1 = $r->comision_cupones; 
                      $comision_asesoria_vendedor1 = $r->comision_asesoria; 
                      $comision_programa_vendedor1 = $r->comision_programa; 
                      $comision_tienda_vendedor1 = $r->comision_tienda; 
                      $comision_productos_pbo_vendedor1 = $r->comision_productos_pbo; 
                    
                  }
                  
              }    
              $comision_cupon_vendedor = $comision_cupon_vendedor1/100;
              $comision_asesoria_vendedor = $comision_asesoria_vendedor1/100;
              $comision_programa_vendedor = $comision_programa_vendedor1/100;
              $comision_tienda_vendedor = $comision_tienda_vendedor1/100;
              $comision_productos_pbo_vendedor = $comision_productos_pbo_vendedor1/100;   

              $cat = NULL;

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_relationships WHERE object_id = '$id_p' "); 
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
                      $cat[] = $res->slug;
                    }  
                 }              
              }

                                       /////////////////////////////////////////////////////
if ($cat[0] == 'asesorias' OR $cat[1] == 'asesorias' OR $cat[2] == 'asesorias' OR $cat[3] == 'asesorias') {
  $asesoria_vendedor = $qty*$comision_asesoria_vendedor1;
}              
 if ($cat[0] == 'programas-powerbuilding' OR $cat[1] == 'programas-powerbuilding' OR $cat[2] == 'programas-powerbuilding' OR $cat[3] == 'programas-powerbuilding') {
  $programa_vendedor = $subtotal*$comision_programa_vendedor;
}  
  
if ($cat[0] == 'tienda' OR $cat[1] == 'tienda' OR $cat[2] == 'tienda' OR $cat[3] == 'tienda') {
  $tienda_vendedor = $subtotal*$comision_tienda_vendedor;
          if ($cat[0] == 'camisetas' OR $cat[1] == 'camisetas' OR $cat[2] == 'camisetas' OR $cat[3] == 'camisetas') {
             $total_ventas_camisetas_ivan=$qty*3.5;

           }  
}   
$total_pbo_comi = $asesoria_vendedor+$programa_vendedor+$tienda_vendedor+$total_ventas_camisetas_ivan; 

$total_pbo = $subtotal-$total_pbo_comi;



if ($vendedor_cupon!=$asoc_producto) {

   if ($comision_productos_pbo_vendedor1 != NULL && $producto_pbo == "Si") {
     $productos_pbo_vendedor = ($total_pbo*$comision_productos_pbo_vendedor);

   }  

   if ($comision_productos_pbo_vendedor1 != NULL && $producto_pbo != "Si") {
     $comi_cupon = ($total_pbo*$comision_cupon_vendedor); 

   }   

   if ($comision_productos_pbo_vendedor1 == NULL && $comision_cupon_vendedor != NULL) {
     $comi_cupon = ($total_pbo*$comision_cupon_vendedor); 
   } 
}
$total = ($productos_pbo_vendedor+$comi_cupon);  

              //////////////////////////////////////////77
              

              $coupon_producto= meta_value( 'vendedores', $id_p ); 
             
              if ( $coupon_producto != $usu_vendedor && $producto_regalo != 'Si' && $total>0) {
                $total_cupones = $total_cupones+$total;
echo'
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$id_order.'</p>
                   </div>          
               </div> 
               <div class="col-md-5 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto->post_title.'</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>'.$fecha.'</p>
                   </div>          
               </div>               
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>'.round($subtotal,2).'€</p>
                   </div>          
               </div> 
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>+'.round($total,3).'</p>
                   </div>          
               </div>                                              
            </div>';                                
    
              }

}}}
?>

           
            <div class="col-md-12 xs-hide" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div> 
               <div class="col-md-5">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div>   
               <div class="col-md-4">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div> 
               <div class="col-md-2">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div>      
            </div>

        <!-- totales-->

            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-6 xs-hide">              
                   <div class="text">                  
                     <h4></h4>
                   </div>          
               </div> 

               <div class="col-md-3 col-xs-8">              
                   <div class="text">                  
                     <h1 style="color:#000000!important;">TOTAL</h1>
                   </div>          
               </div>               
               <div class="col-md-3 col-xs-4">              
                   <div class="text">                  
                     <h1 style="color:#000000!important;"><?php $total=$total_asesoria+$total_programa+$total_tienda+$total_cupones; echo round($total,2); ?>€</h1>
                   </div>          
               </div>                                              
            </div>  

            <div class="col-md-12" style="background-color: #fff !important;padding: 20px 30px;"> 
               <div class="col-md-12">              
                   <div class="text">  
                
                     <p>* Las pasarelas de pago son Stripe (para tarjetas de crédito) y Paypal en nuestro sitio hecho con Woocommerce www.powerbuildingoficial.com</p>
                   </div>          
               </div>                                              
            </div>



</div> 
</div>
</div>
</section>
</div> <!-- fin personal -->
<!-- direcciones -->
<div role="tabpanel" class="tab-pane fade" id="tab-direcciones">       
<section id="powerbuilding-masthead" style="margin-top: 50px">
      <div class="container">
     
        <div class="flush">
          <div class="row">
   
            <div class="col-md-12" style="background-color: #272727!important;padding: 20px 30px;"> 

              <div class="col-md-8 ">              
                   <div class="text">
                  <?php                   
                   if (is_user_logged_in()){
                     echo get_avatar( $current_user->user_email ); 
                    }?>
                  </div>          
              </div>

              <div class="col-md-4">
                 <a href="<?php echo get_theme_mod('powerbuilding-masthead2_link'); ?>">
                   <div class="text">
                    <h1 class="white-color white" style="font-size: 4rem; margin-top: 20px; color:#fff !important">REPORTE<br>
                    <span class="white-color" style="font-size: 3rem;"> <?php echo $mes1; echo $mes22;?> </span></h1>
                   </div>
                 </a>
              </div>
            </div> 


<?php
echo'
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Pedido</h4>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-4 xs-hide">              
                   <div class="text">                  
                     <h4>Qty/Producto</h4>
                   </div>          
               </div> 
                            
               <div class="col-md-2  xs-hide">              
                   <div class="text">                  
                     <h4>Nombre</h4>
                   </div>          
               </div>   
               <div class="col-md-2 col-xs-10">              
                   <div class="text">                  
                     <h4>Dirección Envío</h4>
                   </div>          
               </div>                
               <div class="col-md-4 xs-hide">              
                   <div class="text">                  
                     <h4>Teléfono / Email</h4>
                   </div>          
               </div>        
            </div>';


$count_array_pedido=count($array_pedido);
for ($i=0; $i < $count_array_pedido; $i++) { 
  $pedi = $array_pedido[$i];
  $contar_pedido=$contar_pedido+1;
  $array_name_producto = NULL;

  


echo'
            <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$array_pedido[$i].'</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-4 xs-hide">              
                   <div class="text">                  
                     <p>';
                        $count_array_order_item_id = count($array_order_item_id);
                        for ($j=0; $j < $count_array_order_item_id; $j++) { 
                          $order_item_id = $array_order_item_id[$j];  
                          $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_id ='$order_item_id' and order_id = '$pedi' "); 
                          foreach($result_link as $r)
                          {
                            echo woocommerce_itemrmeta_value('_qty',  $r->order_item_id ); echo " / "; echo $r->order_item_name; echo '<br>';
                          }
                        } 
                      echo '</p>
                   </div>          
               </div>                             
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>'.$_shipping_first_name[$pedi].' '.$_shipping_last_name[$pedi].'</p>
                   </div>          
               </div>   
               <div class="col-md-2 col-xs-10">              
                   <div class="text">                  
                     <p>'.$_shipping_address_1[$pedi].' <br> '.$_shipping_postcode[$pedi].' '.$_shipping_city[$pedi].', '.$_billing_state[$pedi].'</p>
                   </div>          
               </div>                
               <div class="col-md-4 xs-hide">              
                   <div class="text">                  
                     <p>'.$_billing_phone[$pedi].'</p><p>'.$_billing_email[$pedi].'</p>
                   </div>          
               </div>
        
            </div>';  
}            
?>
            <div class="col-md-12 xs-hide" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div> 
               <div class="col-md-5">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div>   
               <div class="col-md-4">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div> 
               <div class="col-md-2">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div>      
            </div>

        <!-- totales-->

            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-3 xs-hide">              
                   <div class="text">                  
                     <h4></h4>
                   </div>          
               </div> 

               <div class="col-md-6 col-xs-8">              
                   <div class="text">                  
                     <h1 style="color:#000000!important;">TOTAL PEDIDOS</h1>
                   </div>          
               </div>               
               <div class="col-md-3 col-xs-4">              
                   <div class="text">                  
                     <h1 style="color:#000000!important;"><?php echo $contar_pedido; ?></h1>
                   </div>          
               </div>                                              
            </div>  

            <div class="col-md-12" style="background-color: #fff !important;padding: 20px 30px;"> 
               <div class="col-md-12">              
                   <div class="text">  
                
                     <p>* Las pasarelas de pago son Stripe (para tarjetas de crédito) y Paypal en nuestro sitio hecho con Woocommerce www.powerbuildingoficial.com</p>
                   </div>          
               </div>                                              
            </div>



          </div>
        </div>
      </div>
</section>
</div> <!-- fin direcciones -->            
</div>
<?php } ?>


<!-- ////////////////////////////////////////////////-->
<?php
if ($usu_vendedor != NULL && $nombreusu_usu == "IVAN-ALONSO-MOLERO") { 

  ///cupon de vendedor usuario

                $fecha1= first_month_day();
                $fecha2= last_month_day();
if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL) {
  $fecha1 = $_POST["fecha1"];
  $fecha2 = $_POST["fecha2"];
}

//$code_mes_actual = date('Y-m', strtotime($fecha1));

$fecha11=$fecha1;
$fecha22=$fecha2;

    $mes1 = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
    $mes1 = $mes1[(date('m', strtotime($fecha1))*1)-1];

    $mes2 = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
    $mes2 = $mes2[(date('m', strtotime($fecha2))*1)-1];  
    if ($mes1 != $mes2) {
       $mes22 = " - ".$mes2.""; 
     } 
  
$fecha1= $fecha1." 00:00:00";
$fecha2= $fecha2." 23:59:59";  
?>
  
<section id="powerbuilding-masthead" style="margin-top: 150px">
      <div class="container">     
        <div class="flush">
          <div class="row">   
            <div class="col-md-12" style="padding: 20px 30px;">
            <form method="post" >
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-3"><label for='titulo'>RANGO FECHAS: </label> </div>                
                  <div class="col-md-3"><span> Desde </span>
                       <input type='date' name='fecha1' id='fecha1'  value='<?php echo $_POST["fecha1"]; ?>'> 
                  </div>
                  <div class="col-md-3"> <span> Hasta </span>
                        <input type='date' name='fecha2' id='fecha2'  value='<?php echo $_POST["fecha2"]; ?>'>         
                  </div>
                 <div class="col-md-3 btn-start">
                       <button type="submit" class="btn btn-default buttom-gradient-red" name="login" value="Acceder">Buscar</button>
                 </div>
                </div>      
              </div>   
            </form> 
            </div> 
          </div>
        </div>  
      </div>
      <div class="container" style="margin-top: 30px">
          <ul class="nav nav-pills subnav-profile">
            <li class="active"><a href="#tab-programas" data-toggle="tab" role="tab" aria-controls="tab4">REPORTE PERSONAL</a></li>
            <li ><a href="#tab-asesoria" data-toggle="tab" role="tab" aria-controls="tab3">REPORTE GENERAL</a></li>
            <li ><a href="#tab-influencer" data-toggle="tab" role="tab" aria-controls="tab5">REPORTE INFLUENCERS</a></li>            
          </ul>  
      </div> 
</section>  


<div id="tabContent1" class="tab-content">
<!-- asesoria -->
<div role="tabpanel" class="tab-pane fade" id="tab-asesoria">       
<section id="powerbuilding-masthead" style="margin-top: 50px">
      <div class="container">
     
        <div class="flush">
          <div class="row">
   
            <div class="col-md-12" style="background-color: #272727!important;padding: 20px 30px;"> 

              <div class="col-md-8 ">              
                   <div class="text">
                    <a class="navbar-brand" href="<?php echo get_home_url() ?>"><img class="normalize-svg" src="https://powerbuildingoficial.com/wp-content/themes/powerbuildingoficial/images/production/logo-new-pbo.svg" alt="Go to Home Page" />
                     </a>
                  </div>          
              </div>

              <div class="col-md-4">
                 <a href="<?php echo get_theme_mod('powerbuilding-masthead2_link'); ?>">
                   <div class="text">
                    <h1 class="white-color white" style="font-size: 4rem; margin-top: 20px; color:#fff !important">REPORTE<br>
                    <span class="white-color" style="font-size: 3rem;"> <?php echo $mes1; echo $mes22;?> </span></h1>
                   </div>
                 </a>
              </div>
            </div> 
 
<?php
       


$veces=0;


$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_date >= '$fecha1' AND post_date <= '$fecha2' AND  post_type = 'shop_order' AND post_status IN ('wc-processing','wc-completed') ORDER BY ID DESC"); 
foreach($result_link as $wc_order)
{
              $id_order = $wc_order->ID;
              $vendedor_cupon=NULL;
              $suma_art = NULL;
              $art = "";
////////////////////////////////////////////////
              $categoria_p = NULL;
              $categoria_h = NULL;
              $categoria = NULL;
              $categoria_pa = NULL;
              $asoc_producto = "";
              $categoria_hijo = "";


           //   $total_producto = "";
              $porcentaje_total_asesoria = "";
              $porcentaje_total_programa = "";
              $porcentaje_total_tienda = "";                
////////////////////////////////////7                    
              $cupon_id = NULL;
              $comision_stripe = meta_value( '_stripe_fee', $wc_order->ID );
              $comision_paypal = meta_value( 'PayPal Transaction Fee', $wc_order->ID );
              $importe_cupon = meta_value( '_cart_discount', $wc_order->ID );
              $total_pagado_stripe = meta_value( '_stripe_net', $wc_order->ID );                              
              $cupon = woocommerce_order_items( coupon, $wc_order->ID );
            
              $fecha = date("Y-m-d", strtotime($wc_order->post_date) ); 
              $code_mes_actual = date('Y-m', strtotime($fecha));

              $metodo =  meta_value( '_payment_method', $wc_order->ID );
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_name = '$cupon' "); 
              foreach($result_link as $r)
              {
                      $cupon_id = $r->ID;                      
              } 
              $vendedor_cupon = meta_value( 'vendedores',  $cupon_id ); 
              $vendedor_cupon_order = meta_value( 'vendedores',  $cupon_id );      

              // % comisiones por articulos
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
              foreach($result_link as $r)
              {               
                      $suma_art= $suma_art + woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              }   
//
if ($cupon != "prueba5852") {

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
foreach($result_link as $r)
{     

              $vendedor_producto=NULL;  
              $comision_cupon=NULL; 
              $productos_pbo_vendedor = NULL;
              $subtotal_array = NULL;
              $total_ventas_camisetas_ivan = NULL;
              $hijo = NULL;
              $hi=NULL;
              $total_pbo_comi = NULL;
              $total_pbo = NULL;
              $comi_cupon = NULL;
              $asoc_producto = NULL;
              $total_comisiones = NULL;

              $vende_producto = NULL;
              $p_comision_cupon_vendedor1 = NULL;
              $p_comision_cupon_vendedor = NULL;
              $p_comision_productos_pbo_vendedor1 = NULL;
              $p_comision_productos_pbo_vendedor = NULL;
              $p_comision_asesoria_vendedor1 =  NULL;
              $p_comision_asesoria_vendedor = NULL;
              $p_comision_programa_vendedor1 = NULL;
              $p_comision_programa_vendedor = NULL;
              $p_comision_tienda_vendedor1 = NULL;
              $p_comision_tienda_vendedor = NULL;

              $coste_articulo = woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              $coste_articulo = round($coste_articulo,2); 
              $product_id = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $qty = woocommerce_itemrmeta_value('_qty',  $r->order_item_id );
              $id_p = $product_id;
              $producto_regalo = meta_value('producto_regalo',$id_p);
              $producto_pbo = meta_value( 'producto_pbo', $id_p );

              $impri = 1;
              $idproducto = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $producto_regalo2 = meta_value('producto_regalo',$idproducto);

             ////////////////////////////////////////////////////////
              $producto = $id_p;
              $queried_p = get_post($producto);
              $name_producto = $queried_p->post_title;
              $asoc_producto = meta_value( 'vendedores', $producto ); 


         //   if ($usu_vendedor == $asoc_producto) {  



                   $count_productos=count($array_productos);
                   for ($f=0; $f < $count_productos; $f++) 
                   { 
                        $producto1=$array_productos[$f];
                        if ($producto1==$idproducto) {
                          $impri=0;
                        }
                   }
                      if ($impri==1 and  $producto_regalo2!='Si') {
                        $array_productos[] = $idproducto;
                      }              

 
              //////////////////////////////////////////////////
              
              $vendedor_producto = meta_value( 'vendedores', $id_p ); 
              $vendedor= $vendedor_producto;

              ////

            
              
              ///// $comision artículos
              if ($suma_art>0) {
                $art = $coste_articulo/$suma_art;
              }
              
              $art_paypal = ($art*$comision_paypal);
              $art_paypal = $art_paypal;

              $art_stripe = ($art*$comision_stripe);
              $art_stripe = $art_stripe;


              $subtotal = ($coste_articulo-$art_stripe)-$art_paypal;

             
            

            //  $subtotal= $coste_articulo-$comision_stripe-$comision_paypal;                
              
              /////CPONES  
            //  $comision_cupon_vendedor = meta_value('comisiones_cupones', $vendedor_cupon_order );

                

              //  if ($producto == $id_p){ 
                 $total_producto = $total_producto + $qty; 
                 $total_pasarela_pago[$producto] = $total_pasarela_pago[$producto]+$art_stripe+$art_paypal;
                 $total_pasarela_pago_iv[$producto] = $total_pasarela_pago_iv[$producto]+$art_stripe+$art_paypal;

                 
                 $cat = $categoria_pa;   
                 $total_art_paypal = $total_art_paypal+$art_paypal; 
                 $total_art_stripe = $total_art_stripe+$art_stripe;  
                 $total_importe_cupon[$producto] = $total_importe_cupon[$producto] + $importe_cupon;  
                 $total_importe_cupon_iv[$producto] = $total_importe_cupon_iv[$producto] + $importe_cupon;
                          
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
               //  }             
   


              $vende_producto = meta_value( 'vendedores', $producto );          
              $p_comision_cupon_vendedor1 = meta_value('comisiones_cupones', $vendedor_cupon );
              $p_comision_cupon_vendedor = $p_comision_cupon_vendedor1/100;

              $p_comision_productos_pbo_vendedor1 = meta_value('comisiones_productos_pbo', $vendedor_cupon);
              $p_comision_productos_pbo_vendedor = $p_comision_productos_pbo_vendedor1/100;

              $p_comision_asesoria_vendedor1 =  meta_value('comisiones_asesorias',  $vende_producto);
              $p_comision_asesoria_vendedor = $p_comision_asesoria_vendedor1/100;
              $p_comision_programa_vendedor1 = meta_value('comisiones_programas',  $vende_producto);
              $p_comision_programa_vendedor = $p_comision_programa_vendedor1/100;
              $p_comision_tienda_vendedor1 = meta_value('comisiones_tienda',  $vende_producto);
              $p_comision_tienda_vendedor = $p_comision_tienda_vendedor1/100;  


              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."ventas_power WHERE code_mes = '$code_mes_actual' AND vendedor = '$vende_producto' "); 
              foreach($result_link as $r)
              {                  
                  $p_comision_cupon_vendedor1 = $r->comision_cupones;
                  $p_comision_cupon_vendedor = $p_comision_cupon_vendedor1/100;
                  $p_comision_asesoria_vendedor1 =  $r->comision_asesoria;
                  $p_comision_asesoria_vendedor = $p_comision_asesoria_vendedor1/100;
                  $p_comision_programa_vendedor1 = $r->comision_programa;
                  $p_comision_programa_vendedor = $p_comision_programa_vendedor1/100;
                  $p_comision_tienda_vendedor1 = $r->comision_tienda;
                  $p_comision_tienda_vendedor = $p_comision_tienda_vendedor1/100;  
                  $p_comision_productos_pbo_vendedor1 = $r->comision_productos_pbo;
                  $p_comision_productos_pbo_vendedor = $p_comision_productos_pbo_vendedor1/100;
              }




              foreach((get_the_terms($producto, 'product_cat' )) as $category) {                
                  $categoria_p = $category->term_id;
                  $categoria_h = $category->slug;               
              }  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$categoria_p' "); 
              foreach($result_link as $cr)
              {                  
                  $categoria = $cr->parent;
              }      
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$categoria' "); 
              foreach($result_link as $cra)
              {                  
                  $categoria_pa = $cra->slug;
              } 

              $cat = NULL;

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_relationships WHERE object_id = '$id_p' "); 
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
                      $cat[] = $res->slug;
                    }  
                 }              
             } 



if ($cat[0] == 'asesorias' OR $cat[1] == 'asesorias' OR $cat[2] == 'asesorias' OR $cat[3] == 'asesorias') {
  $subtotal_array = $qty*$p_comision_asesoria_vendedor1;
}              
 if ($categoria_h == 'programas-powerbuilding' OR $categoria_pa == 'programas-powerbuilding') {
  $subtotal_array = $subtotal*$p_comision_programa_vendedor;
}    
if ($cat[0] == 'tienda' OR $cat[1] == 'tienda' OR $cat[2] == 'tienda' OR $cat[3] == 'tienda') {
  $subtotal_array = $subtotal*$p_comision_tienda_vendedor;  
} 
  $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_relationships WHERE object_id= '$producto' "); 
  foreach($result_link as $cra)
  {                  
      $term_taxonomy_id = $cra->term_taxonomy_id; 
       $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id= '$term_taxonomy_id' "); 
       foreach($result_link as $cra)
       {                  
           $hijo = $cra->slug;

           if ($hijo == 'camisetas') {
             $hi='camisetas';
             $total_ventas_camisetas_ivan=$qty*3.5;
             //$otro_total_tienda=$producto_array[$producto]-$total_ventas_camisetas_ivan;

           }  
       }      
  }

$total_pbo_comi = $subtotal_array+$total_ventas_camisetas_ivan; 
$total_pbo = $subtotal - $total_pbo_comi;

if ($vendedor_cupon!=$asoc_producto) {

   if ($p_comision_productos_pbo_vendedor1 != NULL && $producto_pbo == "Si") {
     $productos_pbo_vendedor = ($total_pbo*$p_comision_productos_pbo_vendedor);

   }  
   if ($p_comision_productos_pbo_vendedor1 != NULL && $producto_pbo != "Si") {
     $comi_cupon = ($total_pbo*$p_comision_cupon_vendedor); 

   }     

   if ($p_comision_productos_pbo_vendedor1 == NULL && $p_comision_cupon_vendedor != NULL) {
     $comi_cupon = ($total_pbo*$p_comision_cupon_vendedor); 
   } 
}
$total_comisiones = $productos_pbo_vendedor + $comi_cupon; 
$total_comi_cupon_iv[$producto] = $total_comi_cupon_iv[$producto] + $total_comisiones;
/////////////////////iv
if ($usu_vendedor == $asoc_producto OR $hi == 'camisetas') {  
$impri_iv = 1;
                   $count_productos_iv=count($array_productos_iv);
                   for ($f=0; $f < $count_productos_iv; $f++) 
                   { 
                        $producto1_iv=$array_productos_iv[$f];
                        if ($producto1_iv==$idproducto) {
                          $impri_iv=0;
                        }
                   }
                      if ($impri_iv==1 and  $producto_regalo2!='Si') {
                        $array_productos_iv[] = $idproducto;
                      }              
if ($hi == 'camisetas') {  

$producto_subtotal_array_iv[$producto] = $producto_subtotal_array_iv[$producto] + $total_ventas_camisetas_ivan;
}
if ($hi != 'camisetas') {  

$producto_subtotal_array_iv[$producto] = $producto_subtotal_array_iv[$producto] + ($total_pbo - $total_comisiones);
}
$total_producto_array_iv[$producto] = $total_producto_array_iv[$producto] + $qty;
} 
  ///////////////////////////////////////////////////////////777
$producto_subtotal_array[$producto] = $producto_subtotal_array[$producto] + ($total_pbo - $total_comisiones);


 ////////////////////cupones

if ($usu_vendedor != $asoc_producto) {
        $id_vendedor[$asoc_producto] = $id_vendedor[$asoc_producto]+$subtotal_array;
}
//$producto_subtotal_array[$producto] = $producto_subtotal_array[$producto] +$total_pbo;

$total_producto_array[$producto] = $total_producto_array[$producto] + $qty;


///////////////////////////////////////////////  

$ordera = $wc_order->id;                              

}}}
/////////////////////////////////////////////////////////
$count_productos=count($array_productos);
for ($f=0; $f < $count_productos; $f++) { 
    $producto=$array_productos[$f];  
    $queried_post = get_post($producto);
    $name_producto = $queried_post->post_title;
    $otro_total_tienda = NULL;


              $total_producto = "";
              $porcentaje_total_asesoria = "";
              $porcentaje_total_programa = "";
              $porcentaje_total_tienda = "";
              $categoria_p = NULL;
              $categoria_h = NULL;
              $categoria = NULL;
              $categoria_pa = NULL;
              $asoc_producto = "";
              $categoria_hijo = "";

              $vende_producto = meta_value( 'vendedores', $producto );          



              foreach((get_the_terms($producto, 'product_cat' )) as $category) {                
                  $categoria_p = $category->term_id;
                  $categoria_h = $category->slug;               
              }  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$categoria_p' "); 
              foreach($result_link as $cr)
              {                  
                  $categoria = $cr->parent;
              }      
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$categoria' "); 
              foreach($result_link as $cra)
              {                  
                  $categoria_pa = $cra->slug;
              } 
$categoria_hijo = $categoria_h;
$total_producto = $total_producto_array[$producto]; 

if($total_producto>0){ 

if ($categoria_h == 'asesorias' OR $categoria_pa == 'asesorias') {
//$porcentaje_total_asesoria = ($totales_asesoria*$comision_asesoria_vendedor);

  $porcentaje_total_asesoria = $producto_subtotal_array[$producto];


  $otro_total_asesoria=$producto_subtotal_array[$producto];
  $total_asesoria = $total_asesoria+$otro_total_asesoria;
  $array_asesoria[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto.'</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div>  
         
              
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($otro_total_asesoria,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
                    
  }//asesoria

//programas
if ($categoria_h == 'programas-powerbuilding' OR $categoria_pa == 'programas-powerbuilding') {
//$porcentaje_total_programa = ($producto_array[$producto]*$comision_programa_vendedor);
  $porcentaje_total_programa = $producto_subtotal_array[$producto];
//$otro_total_programa=$producto_array[$producto]-$porcentaje_total_programa;
$otro_total_programa=$producto_subtotal_array[$producto];  
$total_programa = $total_programa+$otro_total_programa;
$array_programa_g[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto.'</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <p> -'.$name_producto.'</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p> '.round($otro_total_programa,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
 }//programa  

//tienda
if ($categoria_h == 'tienda' OR $categoria_pa == 'tienda') {

//$porcentaje_total_tienda = ($producto_array[$producto]*$comision_tienda_vendedor);
  $porcentaje_total_tienda = $producto_subtotal_array[$producto];
//$otro_total_tienda=$producto_array[$producto]-$porcentaje_total_tienda;
$otro_total_tienda=$producto_subtotal_array[$producto];


$total_tienda = $total_tienda+$otro_total_tienda;
$array_tienda[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto.'</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($otro_total_tienda,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
 } //tienda



}//total producto







 }//productoss


////////////////////////////////////

$count_asesoria=count($array_asesoria);
echo'
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <h4>Asesorías</h4>
                   </div>          
               </div>   
               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';
if ( $total_asesoria==0) {
  echo'
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div> ';  
}
for ($i=0; $i < $count_asesoria; $i++) { 
  echo $array_asesoria[$i];
}

 //programa
$count_programa_g=count($array_programa_g); 
echo '
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <h4>Programas %</h4>
                   </div>          
               </div>   
               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';

if ( $total_programa==0) {
  echo'
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div>';  
}

for ($i=0; $i < $count_programa_g; $i++) { 
  echo $array_programa_g[$i];
}    

 //tienda
$count_tienda=count($array_tienda); 
echo '
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <h4>Tienda %</h4>
                   </div>          
               </div>   
               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';

if ( $total_tienda==0) {
  echo'
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div> ';  
}

for ($i=0; $i < $count_tienda; $i++) { 
  echo $array_tienda[$i];
}  

/////////////////////////////////////////cupones

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_date >= '$fecha1' AND post_date <= '$fecha2' AND  post_type = 'shop_order' AND post_status IN ('wc-processing','wc-completed') ORDER BY ID DESC"); 
foreach($result_link as $wc_order)
{
              $id_order = $wc_order->ID;
              $vendedor_cupon=NULL;
              $suma_art = NULL;
              $art = "";
                          
              $coupon_producto = NULL;
              
              $cupon_id = NULL;
              $comision_stripe = meta_value( '_stripe_fee', $wc_order->ID );
              $comision_paypal = meta_value( 'PayPal Transaction Fee', $wc_order->ID );
              $importe_cupon = meta_value( '_cart_discount', $wc_order->ID );
              $total_pagado_stripe = meta_value( '_stripe_net', $wc_order->ID );                              
              $cupon = woocommerce_order_items( coupon, $wc_order->ID );
            
              $fecha = date("Y-m-d", strtotime($wc_order->post_date) );   
              $code_mes_actual = date('Y-m', strtotime($fecha));
              $metodo =  meta_value( '_payment_method', $wc_order->ID );
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_name = '$cupon' "); 
              foreach($result_link as $r)
              {
                      $cupon_id = $r->ID;                      
              } 
              $vendedor_cupon_order = meta_value( 'vendedores',  $cupon_id );   
              $vendedor_cupon = meta_value( 'vendedores',  $cupon_id );    

              // % comisiones por articulos
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
              foreach($result_link as $r)
              {               
                      $suma_art= $suma_art + woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              }   
//

//if($usu_vendedor == $vendedor_cupon_order){ 

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
foreach($result_link as $r)
{     

              $vendedor_producto=NULL;  
              $comision_cupon=NULL;               
              $coste_articulo1 = woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              $coste_articulo = round($coste_articulo1,2); 
              $product_id = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $id_p = $product_id;
              $name_producto = get_post($id_p);
              $producto_regalo = meta_value('producto_regalo',$id_p);
              $asoc_producto = meta_value( 'vendedores', $product_id );
              $qty = woocommerce_itemrmeta_value('_qty',  $r->order_item_id ); 
              
              $vendedor_producto = meta_value( 'vendedores', $id_p ); 
              $vendedor= $vendedor_producto;

              $asesoria_vendedor = NULL;
              $programa_vendedor = NULL;
              $tienda_vendedor = NULL;
              $total_ventas_camisetas_ivan = NULL;
              $comi_cupon = NULL;
              $total_pbo = NULL;
              $total_pbo_comi = NULL;
              $total = NULL;
              $subtotal = NULL;
              $productos_pbo_vendedor = NULL;

              
              ///// $comision artículos
              if ($suma_art>0) {
                $art = $coste_articulo/$suma_art;
              }
              
              $art_paypal = ($art*$comision_paypal);
              $art_paypal = $art_paypal;

              $art_stripe = ($art*$comision_stripe);
              $art_stripe = $art_stripe;


              $subtotal = ($coste_articulo-$art_stripe)-$art_paypal;              
              
              ///// COMISION
              $producto_pbo = meta_value( 'producto_pbo', $id_p );

              $comision_cupon_vendedor1 = meta_value('comisiones_cupones', $vendedor_cupon);
              $comision_productos_pbo_vendedor1 = meta_value('comisiones_productos_pbo', $vendedor_cupon);
              $comision_asesoria_vendedor1 = meta_value('comisiones_asesorias', $asoc_producto);
              $comision_programa_vendedor1 = meta_value('comisiones_programas', $asoc_producto);
              $comision_tienda_vendedor1 = meta_value('comisiones_tienda', $asoc_producto);


              if ( $vendedor_cupon != $vendedor_producto ) {
                  $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."ventas_power WHERE code_mes = '$code_mes_actual' AND vendedor = '$vendedor_cupon' "); 
                  foreach($result_link as $r)
                  {                  
                      $comision_cupon_vendedor1 = $r->comision_cupones; 
                      $comision_asesoria_vendedor1 = $r->comision_asesoria; 
                      $comision_programa_vendedor1 = $r->comision_programa; 
                      $comision_tienda_vendedor1 = $r->comision_tienda; 
                      $comision_productos_pbo_vendedor1 = $r->comision_productos_pbo; 
                    
                  }
                  
              }    
              $comision_cupon_vendedor = $comision_cupon_vendedor1/100;
              $comision_asesoria_vendedor = $comision_asesoria_vendedor1/100;
              $comision_programa_vendedor = $comision_programa_vendedor1/100;
              $comision_tienda_vendedor = $comision_tienda_vendedor1/100;
              $comision_productos_pbo_vendedor = $comision_productos_pbo_vendedor1/100;   

              $cat = NULL;

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_relationships WHERE object_id = '$id_p' "); 
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
                      $cat[] = $res->slug;
                    }  
                 }              
              }

                                       /////////////////////////////////////////////////////
if ($cat[0] == 'asesorias' OR $cat[1] == 'asesorias' OR $cat[2] == 'asesorias' OR $cat[3] == 'asesorias') {
  $asesoria_vendedor = $qty*$comision_asesoria_vendedor1;
}              
 if ($cat[0] == 'programas-powerbuilding' OR $cat[1] == 'programas-powerbuilding' OR $cat[2] == 'programas-powerbuilding' OR $cat[3] == 'programas-powerbuilding') {
  $programa_vendedor = $subtotal*$comision_programa_vendedor;
}  
  
if ($cat[0] == 'tienda' OR $cat[1] == 'tienda' OR $cat[2] == 'tienda' OR $cat[3] == 'tienda') {
  $tienda_vendedor = $subtotal*$comision_tienda_vendedor;
          if ($cat[0] == 'camisetas' OR $cat[1] == 'camisetas' OR $cat[2] == 'camisetas' OR $cat[3] == 'camisetas') {
             $total_ventas_camisetas_ivan=$qty*3.5;

           }  
}   
$total_pbo_comi = $asesoria_vendedor+$programa_vendedor+$tienda_vendedor+$total_ventas_camisetas_ivan; 

$total_pbo = $subtotal-$total_pbo_comi;



if ($vendedor_cupon!=$asoc_producto) {

   if ($comision_productos_pbo_vendedor1 != NULL && $producto_pbo == "Si") {
     $productos_pbo_vendedor = ($total_pbo*$comision_productos_pbo_vendedor);

   }  

   if ($comision_productos_pbo_vendedor1 != NULL && $producto_pbo != "Si") {
     $comi_cupon = ($total_pbo*$comision_cupon_vendedor); 

   }   

   if ($comision_productos_pbo_vendedor1 == NULL && $comision_cupon_vendedor != NULL) {
     $comi_cupon = ($total_pbo*$comision_cupon_vendedor); 
   } 

   $id_cupon_vendedor[$vendedor_cupon] =  $id_cupon_vendedor[$vendedor_cupon] + ($productos_pbo_vendedor+$comi_cupon);
}

}}
$total = ($productos_pbo_vendedor+$comi_cupon);  

if ( $vendedor_cupon == $usu_vendedor ) {
               $coupon_producto= meta_value( 'vendedores', $id_p ); 
             
              if ( $coupon_producto != $usu_vendedor && $producto_regalo != 'Si' && $total>0) {
                $total_cupones = $total_cupones+$total;
$array_total_cupones_iv =  $array_total_cupones_iv + $total_cupones;               
$array_cupones_iv[]='
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$id_order.'</p>
                   </div>          
               </div> 
               <div class="col-md-5 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto->post_title.'</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>'.$fecha.'</p>
                   </div>          
               </div>               
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>'.round($subtotal,2).'€</p>
                   </div>          
               </div> 
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>+'.round($total,3).'</p>
                   </div>          
               </div>                                              
            </div>';                                
    
              } 
}
          
?>
            <div class="col-md-12 xs-hide" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div> 
               <div class="col-md-5">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div>   
               <div class="col-md-4">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div> 
               <div class="col-md-2">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div>      
            </div>

        <!-- totales-->

            <div class="col-md-12" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-6 xs-hide">              
                   <div class="text">                  
                     <h4></h4>
                   </div>          
               </div> 

               <div class="col-md-3 col-xs-8">              
                   <div class="text">                  
                     <h1 style="color: #000000!important;">TOTAL</h1>
                   </div>          
               </div>               
               <div class="col-md-3 col-xs-4">              
                   <div class="text">                  
                     <h1 style="color: #000000!important;"><?php $total=$total_asesoria+$total_programa+$total_tienda; echo round($total,2); ?>€</h1>
                   </div>          
               </div>                                              
            </div>  
 

            <div class="col-md-12" style="background-color: #fff !important;padding: 20px 30px;"> 
               <div class="col-md-12">              
                   <div class="text">  
                
                     <p>* Las pasarelas de pago son Stripe (para tarjetas de crédito) y Paypal en nuestro sitio hecho con Woocommerce www.powerbuildingoficial.com</p>
                   </div>          
               </div>                                              
            </div>


          </div>
        </div>
      </div>
</section>
</div>

  <!-- personal -->
<div role="tabpanel" class="tab-pane fade in active" id="tab-programas">
<div class="row content-programas">  
<section id="powerbuilding-masthead" style="margin-top: 50px">
      <div class="container">
     
         <div class="flush">
          <div class="row" style="background-color: #272727!important;">
            
            <div class="col-md-12 xs-block" style="background-color: #272727!important;padding: 20px;"> 

              <div class="col-md-8 col-xs-6">              
                   <div class="text">
                  <?php                   
                   if (is_user_logged_in()){
                     echo get_avatar( $current_user->user_email ); 
                    }?>
                  </div>          
              </div>
               
              <div class="col-md-4 col-xs-6">
                   <div class="text">
                    <h1 class="white-color white" style="font-size: 4rem; margin-top: 20px; color:#fff !important">REPORTE</h1>
                    <p class="white-color"> <?php echo $fecha11; echo " / "; echo $fecha22;?> </p>
                   </div>
              </div> 
            </div> 

            <div class="col-md-12 xs-block" style="background-color: #272727!important;padding-bottom: 20px;"> 
               <div class="col-md-4 col-xs-6">              
                   <div class="text">                  
                     <h4 class="white-color">Afiliado:</h4>
                     <h4 class="white-color" style="font-size: 3rem; "><?php echo $queried_vendedor->post_title; ?></h4>
                   </div>          
               </div>

               <div class="col-md-4 col-xs-6">              
                   <div class="text">                  
                     <h4 class="white-color">Cupón: 
                        <?php
                          $result_linkp = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'shop_coupon' AND ID ORDER BY ID DESC "); 
                          foreach($result_linkp as $p)
                          {     
                            $coupon = $p->ID; 
                            $name_coupon = $p->post_title;
                            $asoc_coupon = meta_value( 'vendedores', $coupon );
                            if ($usu_vendedor == $asoc_coupon) { echo $name_coupon; echo " "; }
                          }
                        ?>
                     </h4>
                     <h4 class="white-color" style="font-size: 2rem;">Mes: <?php echo $mes1; echo $mes22;?></h4>
                   </div>          
               </div>              

            </div> 

 
                
<?php
$count_productos=count($array_productos_iv);
for ($f=0; $f < $count_productos; $f++) { 
    $producto=$array_productos_iv[$f];  
    $queried_post = get_post($producto);
    $name_producto = $queried_post->post_title;


              $total_producto = "";
              $porcentaje_total_asesoria = "";
              $porcentaje_total_programa = "";
              $categoria_p = NULL;
              $categoria_h = NULL;
              $categoria = NULL;
              $categoria_pa = NULL;
              $asoc_producto = "";
              $categoria_hijo = "";


              $total_producto = "";
              $porcentaje_total_asesoria = "";
              $porcentaje_total_programa = "";
              $categoria_p = NULL;
              $categoria_h = NULL;
              $categoria = NULL;
              $categoria_pa = NULL;
              $asoc_producto = "";
              $categoria_hijo = "";

              $vende_producto = meta_value( 'vendedores', $producto );          



              foreach((get_the_terms($producto, 'product_cat' )) as $category) {                
                  $categoria_p = $category->term_id;
                  $categoria_h = $category->slug;               
              }  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$categoria_p' "); 
              foreach($result_link as $cr)
              {                  
                  $categoria = $cr->parent;
              }      
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$categoria' "); 
              foreach($result_link as $cra)
              {                  
                  $categoria_pa = $cra->slug;
              } 
$categoria_hijo = $categoria_h;
$total_producto = $total_producto_array_iv[$producto]; 

if($total_producto>0){ 
if ($categoria_h == 'asesorias' OR $categoria_pa == 'asesorias') {
//$porcentaje_total_asesoria = ($totales_asesoria*$comision_asesoria_vendedor);

//$porcentaje_total_asesoria = ($total_producto*$comision_asesoria_vendedor1);
  $porcentaje_total_asesoria = ($producto_subtotal_array_iv[$producto]);


$total_asesoria_iv = $total_asesoria_iv + $porcentaje_total_asesoria;
$array_asesoria_iv[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto_array_iv[$producto].'</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_pasarela_pago_iv[$producto],2).'€</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_importe_cupon_iv[$producto],2).'€</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_comi_cupon_iv[$producto],2).'€</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($porcentaje_total_asesoria,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
                    
 }

//programas
if ($categoria_h == 'programas-powerbuilding' OR $categoria_pa == 'programas-powerbuilding') {
//$porcentaje_total_programa = ($totales_programa*$comision_programa_vendedor);
  $porcentaje_total_programa = ($producto_subtotal_array_iv[$producto]);
$total_programa_iv = $total_programa_iv+$porcentaje_total_programa;

$array_programa_iv[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto_array_iv[$producto].'</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_pasarela_pago_iv[$producto],2).'€</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_importe_cupon_iv[$producto],2).'€</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_comi_cupon_iv[$producto],2).'€</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($porcentaje_total_programa,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
 }
  
//tienda
if ($categoria_h == 'tienda' OR $categoria_pa == 'tienda') {
//$porcentaje_total_tienda = ($totales_tienda*$comision_tienda_vendedor);
  $porcentaje_total_tienda = $producto_subtotal_array_iv[$producto];
$total_tienda_iv = $total_tienda_iv+$porcentaje_total_tienda;

$array_tienda_iv[] = '
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto_array_iv[$producto].'</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_pasarela_pago_iv[$producto],2).'€</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_importe_cupon_iv[$producto],2).'€</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-'.round($total_comi_cupon_iv[$producto],2).'€</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($porcentaje_total_tienda,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
 }
  
 }}  

//
$count_asesoria=count($array_asesoria_iv);
echo'
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <h4>Asesorías</h4>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Pasarela Pago</h4>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Cupones</h4>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Comisión Venta</h4>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';

if ($total_asesoria==0) {
    echo'  <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div>';
}

for ($i=0; $i < $count_asesoria; $i++) { 
  echo $array_asesoria_iv[$i];
}
 
$count_programa=count($array_programa_iv); 
echo '
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <h4>Programas</h4>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Pasarela Pago</h4>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Cupones</h4>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Comisión Venta</h4>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';

if ($total_programa==0) {
    echo'  <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div>';
}

for ($i=0; $i < $count_programa; $i++) { 
  echo $array_programa_iv[$i];
}    

  
///tienda
$count_tienda=count($array_tienda_iv); 
echo '
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <h4>Tienda </h4>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Pasarela Pago</h4>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Cupones</h4>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Comisión Venta</h4>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';

if ($total_tienda==0) {
    echo'  <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div>';

}

for ($i=0; $i < $count_tienda; $i++) { 
  echo $array_tienda_iv[$i];
}

///////////////////////////////////cupones
///tienda
$count_cupones=count($array_cupones_iv); 
echo '
            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h4>Qty</h4>
                   </div>          
               </div> 
               <div class="col-md-3 col-xs-7">              
                   <div class="text">                  
                     <h4>Tienda </h4>
                   </div>          
               </div>   
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Pasarela Pago</h4>
                   </div>          
               </div> 
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Cupones</h4>
                   </div>          
               </div>
               <div class="col-md-2 xs-hide">              
                   <div class="text">                  
                     <h4>Comisión Venta</h4>
                   </div>          
               </div>               
               <div class="col-md-2 col-xs-3">              
                   <div class="text">                  
                     <h4>Total</h4>
                   </div>          
               </div>                                              
            </div>';



for ($i=0; $i < $count_cupones; $i++) { 
  echo $array_cupones_iv[$i];
}
?>




        <!-- totales-->

            <div class="col-md-12" style="background-color: #f3f3f3 !important;color: #000000;padding: 20px 30px;"> 
               <div class="col-md-6">              
                   <div class="text xs-hide">                  
                     <h4></h4>
                   </div>          
               </div> 

               <div class="col-md-3 col-xs-8">              
                   <div class="text">                  
                     <h1 style="color: #000000!important;">TOTAL</h1>
                   </div>          
               </div>               
               <div class="col-md-3 col-xs-4">              
                   <div class="text">                  
                     <h1 style="color: #000000!important;" ><?php $total=$total_asesoria_iv + $total_programa_iv+$array_total_cupones_iv + $total_tienda_iv; echo round($total,2); ?>€</h1>
                   </div>          
               </div>                                              
            </div>  

            <div class="col-md-12" style="background-color: #fff !important;padding: 20px 30px;"> 
               <div class="col-md-12">              
                   <div class="text">  
                
                     <p>* Las pasarelas de pago son Stripe (para tarjetas de crédito) y Paypal en nuestro sitio hecho con Woocommerce www.powerbuildingoficial.com</p>
                   </div>          
               </div>                                              
            </div>



</div> 
</div>
</div>
</section>


</div>
</div>


<!-- influencer -->
<div role="tabpanel" class="tab-pane fade" id="tab-influencer">       
<section id="powerbuilding-masthead" style="margin-top: 50px">
      <div class="container">
     
        <div class="flush">
          <div class="row">
   
            <div class="col-md-12" style="background-color: #272727!important;padding: 20px 30px;"> 

              <div class="col-md-8 ">              
                   <div class="text">
                      <a class="navbar-brand" href="<?php echo get_home_url() ?>"><img class="normalize-svg" src="https://powerbuildingoficial.com/wp-content/themes/powerbuildingoficial/images/production/logo-new-pbo.svg" alt="Go to Home Page" />
                     </a>
                  </div>          
              </div>

              <div class="col-md-4">
                 <a href="<?php echo get_theme_mod('powerbuilding-masthead2_link'); ?>">
                   <div class="text">
                      <h1 class="white-color white" style="font-size: 4rem; margin-top: 20px; color:#fff !important">REPORTE<br>
                      <span class="white-color" style="font-size: 3rem;"> <?php echo $mes1; echo $mes22;?> </span></h1>
                   </div>
                 </a>
              </div>
            </div> 

            <div class="col-md-12 xs-block" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-9 col-xs-9">              
                   <div class="text">                  
                     <h4>Influencers</h4>
                   </div>          
               </div>   
                               
               <div class="col-md-3 col-xs-3">              
                   <div class="text">                  
                       <h4>Total</h4>
                   </div>    
               </div>          
            </div> 
 
<?php
////mostrar
$result_link_i = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'vendedor' ORDER BY ID DESC"); 
foreach($result_link_i as $inf)
{
    $post_id = $inf->ID;
    $name_vendedor = $inf->post_title;

    if ($id_vendedor[$post_id]!=NULL OR $id_cupon_vendedor[$post_id]!=NULL){  
       $total_vendedores=$total_vendedores+$id_vendedor[$post_id]+$id_cupon_vendedor[$post_id];
       $subtotal_vendedores= $id_vendedor[$post_id]+$id_cupon_vendedor[$post_id];
       //$subtotal_vendedores= $id_vendedor[$post_id];
      // $subtotal_vendedores= $id_vendedor[$post_id];
  echo'
           <div class="col-md-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 

               <div class="col-md-9 col-xs-9">              
                   <div class="text">                  
                     <p>'.$name_vendedor.'</p>
                   </div>          
               </div> 
               
               <div class="col-md-3 col-xs-3">              
                   <div class="text">                  
                     <p>'.round($subtotal_vendedores,2).'</p>
                   </div>          
               </div>                                              
            </div> ';  
    }
} //vendedor                
 ?>

            <div class="col-md-12 xs-hide" style="background-color: #fff; padding: 20px 30px;"> 
               <div class="col-md-1">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div> 
               <div class="col-md-5">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div>   
               <div class="col-md-4">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div> 
               <div class="col-md-2">              
                   <div class="text">                  
                     <p></p>
                   </div>          
               </div>      
            </div>

        <!-- totales-->

            <div class="col-md-12" style="background-color: #f3f3f3 !important;padding: 20px 30px;"> 
               <div class="col-md-6 xs-hide">              
                   <div class="text">                  
                     <h4></h4>
                   </div>          
               </div> 

               <div class="col-md-3 col-xs-8">              
                   <div class="text">                  
                     <h1 style="color: #000000!important;">TOTAL</h1>
                   </div>          
               </div>               
               <div class="col-md-3 col-xs-4">              
                   <div class="text">                  
                     <h1 style="color: #000000!important;"><?php  echo round($total_vendedores,2); ?>€</h1>
                   </div>          
               </div>                                              
            </div>  
 

            <div class="col-md-12" style="background-color: #fff !important;padding: 20px 30px;"> 
               <div class="col-md-12">              
                   <div class="text">  
                
                     <p>* Las pasarelas de pago son Stripe (para tarjetas de crédito) y Paypal en nuestro sitio hecho con Woocommerce www.powerbuildingoficial.com</p>
                   </div>          
               </div>                                              
            </div>


</div>
</div>
</div>
</section>



<?php } 
 get_footer();

if ($usu_vendedor == NULL) {
  header('Location: https://powerbuildingoficial.com');
}

?>