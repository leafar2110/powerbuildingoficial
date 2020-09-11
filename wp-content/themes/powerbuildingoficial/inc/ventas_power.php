<?php
/***************** Ventas Power *****/
add_action( 'admin_menu', 'ventas_create_admin_menu' , 2); 
function ventas_create_admin_menu() { 
$anos = date('Y');
$meses = date('m');
$code_meses = $anos."-".$meses;
$fecha_anterior = date('Y-m', strtotime('-1 month'));
    $mes1 = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
    $mes_anterior = $mes1[(date('m', strtotime($fecha_anterior))*1)-1];

global $wpdb;

$result_link = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."ventas_power ORDER by ID DESC LIMIT 1"); 
foreach($result_link as $ventas)
{
  $ultimo_code_mes = $ventas->code_mes;
} 

  
 add_menu_page ( 'Ventas Power', 'Ventas Power', 'manage_options', 'ventas_create_admin_menu', 'ventas_pagina_de_opciones', ''.get_template_directory_uri().'/images/production/ico-powerbuilding.png');
 if ($fecha_anterior != $ultimo_code_mes) {
   add_submenu_page ( 'ventas_create_admin_menu', 'guardar_ventas', 'Guardar Ventas <span class="update-plugins count-1"><span class="plugin-count">save</span></span>', 'manage_options', 'guardar_ventas', 'guardado_ventas' );
  }
 if ($fecha_anterior == $ultimo_code_mes) {
   add_submenu_page ( 'ventas_create_admin_menu', 'guardar_ventas', 'Guardar Ventas', 'manage_options', 'guardar_ventas', 'guardado_ventas' );
  }

}

function guardado_ventas(){ ?>
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/inc/style_menu.css">
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/global.css">
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/newglobal.css">
 <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,500,600,700|Barlow:400,500,700&display=swap" rel="stylesheet" />
 <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans:400,600,700,800|Source+Sans+Pro&display=swap" rel="stylesheet">


<?php
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
                $fecha1= first_month_day();
                $fecha2= last_month_day();


                    
$anos = date('Y');
$meses = date('m');
$code_meses = $anos."-".$meses;
$fecha_anterior = date('Y-m', strtotime('-1 month'));
    $mes1 = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
    $mes_anterior = $mes1[(date('m', strtotime($fecha_anterior))*1)-1];

global $wpdb;

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."ventas_power ORDER by ID DESC
LIMIT 1"); 
foreach($result_link as $ventas)
{
  $ultimo_code_mes = $ventas->code_mes;
} 

    echo("<div class='text'><h1>Guardar Ventas</h1></div>");

if ($fecha_anterior != $ultimo_code_mes) {
      echo("<div class='text'><h2>Mes Pendiente: ".$mes_anterior."</h2></div>");
      $mes_informe = date('m', strtotime('-1 month'));
      $mes_informe = $mes1[(date('m', strtotime($mes_informe))*1)-1];

      $month_ant = date('m', strtotime('-1 month'));
      $year_ant = date('Y', strtotime('-1 month'));
      $fecha1 = date('Y-m-d', mktime(0,0,0, $month_ant, 1, $year_ant));

      $day = date("d", mktime(0,0,0, $month_ant+1, 0, $year_ant));
      $fecha2 = date('Y-m-d', mktime(0,0,0, $month_ant, $day, $year_ant));
    } 

if ($fecha_anterior == $ultimo_code_mes) {
      echo("<div class='text'><h2>Mes Pendiente: Ninguno</h2></div>");
      $fecha_anterior2 = date('Y-m');
      $mes_informe = $mes1[(date('m', strtotime($fecha_anterior2))*1)-1];

    } 

$fecha1= $fecha1." 00:00:00";
$fecha2= $fecha2." 23:59:59";

?>

    <form method='post'>
        <input type='hidden' name='action' value='guardarventas'>
        <table>                     
            <tr>
                <td>
                    <input type='hidden' name="revisar" value='revisar'>
                    <input type='submit' class="btn btn-default buttom-gradient-red" value='Revisar'>
                </td>
            </tr>
        </table>
    </form>


           
<!-- resultados -->
<?php
if($_POST["revisar"] != NULL){ 

?>  
<section>
      <div class="container">
          <div class="row">   
            <div class="col-md-12">  
                   <div class="text">
                      <h2>TOTAL VENTAS MES <?php echo $mes_informe; ?></h2>
                   </div>
            </div> 
          </div>
        <div class="border_center">
          <div class="row">
   

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
              $categoria_h = "";
              $categoria_pa = "";
              $total_pasarela_pago= "";
              $total_art_paypal = "";
              $total_art_stripe = "";
              $total_importe_cupon = ""; 
              $total_comi_cupon = "";
              $totales_asesoria = "";
              $totales_programa = "";
              $totales_tienda = "";
           //   $total_producto = "";
              $porcentaje_total_asesoria = "";
              $porcentaje_total_programa = "";
              $porcentaje_total_tienda = "";                
////////////////////////////////////                 
              $cupon_id = NULL;
              $comision_stripe = meta_value( '_stripe_fee', $wc_order->ID );
              $comision_paypal = meta_value( 'PayPal Transaction Fee', $wc_order->ID );
              $importe_cupon = meta_value( '_cart_discount', $wc_order->ID );
              $total_pagado_stripe = meta_value( '_stripe_net', $wc_order->ID );                              
              $cupon = woocommerce_order_items( coupon, $wc_order->ID );
            
              $fecha = date("Y-m-d", strtotime($wc_order->post_date) );   
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
              $coste_articulo = woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              $coste_articulo = round($coste_articulo,2); 
              $product_id = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $qty = woocommerce_itemrmeta_value('_qty',  $r->order_item_id );
              $id_p = $product_id;
              $producto_regalo = meta_value('producto_regalo',$id_p);


              $impri = 1;
              $idproducto = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $producto_regalo2 = meta_value('producto_regalo',$idproducto);

                   $count_productos=count($array_productos);
                   for ($f=0; $f < $count_productos; $f++) 
                   { 
                        $producto=$array_productos[$f];
                        if ($producto==$idproducto) {
                          $impri=0;
                        }
                   }
                      if ($impri==1 and  $producto_regalo2!='Si') {
                        $array_productos[] = $idproducto;
                      }              

             ////////////////////////////////////////////////////////
              $producto = $id_p;
              $queried_p = get_post($producto);
              $name_producto = $queried_p->post_title;
              $asoc_producto = meta_value( 'vendedores', $producto ); 

  
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
              //////////////////////////////////////////////////
              
              $vendedor_producto = meta_value( 'vendedores', $id_p ); 
              $vendedor= $vendedor_producto;

              if ( $vendedor_cupon != $vendedor_producto ) {
                $comision_cupon = meta_value( 'comisiones_cupones', $vendedor_cupon ); 
                $comision_cupon = ($comision_cupon/100);
              } 
            
              
              ///// $comision artículos
              if ($suma_art>0) {
                $art = $coste_articulo/$suma_art;
              }
              
              $art_paypal = ($art*$comision_paypal);
              $art_paypal = $art_paypal;

              $art_stripe = ($art*$comision_stripe);
              $art_stripe = $art_stripe;


              $subtotal = ($coste_articulo-$art_stripe)-$art_paypal;

              $comi_cupon = ($subtotal*$comision_cupon);

              $total = ($subtotal-$comi_cupon);             

            //  $subtotal= $coste_articulo-$comision_stripe-$comision_paypal;                
              
              /////CPONES  
              $comision_cupon_vendedor = meta_value('comisiones_cupones', $vendedor_cupon_order );
              $comision_cupon_vendedor=$comision_cupon_vendedor/100;     
              $total_cupones = $subtotal*$comision_cupon_vendedor;           

              if ( $producto_regalo != 'Si' && $cupon_id!=NULL && $vendedor_cupon_order!=$vendedor_producto) {
            
                $total_cupones_ = $subtotal*$comision_cupon_vendedor;
                $id_cupon_vendedor[$vendedor_cupon_order] = $id_cupon_vendedor[$vendedor_cupon_order]+$total_cupones;                                
    
              }
                

                if ($producto == $id_p){ 
                 $total_producto = $total_producto + $qty; 
                 $total_pasarela_pago = $total_pasarela_pago+$art_stripe+$art_paypal;
                 $totales_asesoria = $totales_asesoria + $total;
                 $totales_programa = $totales_programa + $total;
                 $totales_tienda = $totales_tienda + $total;
                 
                 $cat = $categoria_pa;   
                 $total_art_paypal = $total_art_paypal+$art_paypal; 
                 $total_art_stripe = $total_art_stripe+$art_stripe;  
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;  
                 $total_comi_cupon = $total_comi_cupon + $comi_cupon;          
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
                 }             
       
  ///////////////////////////////////////////////////////////777
$producto_array[$producto] = $producto_array[$producto] + $total;
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


              $total_producto = "";
              $porcentaje_total_asesoria = "";
              $porcentaje_total_programa = "";
              $categoria_p = "";
              $categoria_h = "";
              $categoria = "";
              $categoria_pa = "";
              $asoc_producto = "";


              $vende_producto = meta_value( 'vendedores', $producto );          
              $comision_cupon_vendedor1 = meta_value('comisiones_cupones',  $vende_producto);
              $comision_cupon_vendedor = $comision_cupon_vendedor1/100;
              $comision_asesoria_vendedor1 =  meta_value('comisiones_asesorias',  $vende_producto);
              $comision_asesoria_vendedor = $comision_asesoria_vendedor1/100;
              $comision_programa_vendedor1 = meta_value('comisiones_programas',  $vende_producto);
              $comision_programa_vendedor = $comision_programa_vendedor1/100;
              $comision_tienda_vendedor1 = meta_value('comisiones_tienda',  $vende_producto);
              $comision_tienda_vendedor = $comision_tienda_vendedor1/100;  


              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."ventas_power WHERE code_mes = '$code_mes_actual' AND vendedor = '$vende_producto' "); 
              foreach($result_link as $r)
              {                  
                  $comision_cupon_vendedor1 = $r->comision_cupones;
                  $comision_cupon_vendedor = $comision_cupon_vendedor1/100;
                  $comision_asesoria_vendedor1 =  $r->comision_asesoria;
                  $comision_asesoria_vendedor = $comision_asesoria_vendedor1/100;
                  $comision_programa_vendedor1 = $r->comision_programa;
                  $comision_programa_vendedor = $comision_programa_vendedor1/100;
                  $comision_tienda_vendedor1 = $r->comision_tienda;
                  $comision_tienda_vendedor = $comision_tienda_vendedor1/100;                    
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

$total_producto = $total_producto_array[$producto]; 

if($total_producto>0){ 

if ($categoria_h == 'asesorias' OR $categoria_pa == 'asesorias') {
//$porcentaje_total_asesoria = ($totales_asesoria*$comision_asesoria_vendedor);

  $porcentaje_total_asesoria = ($total_producto*$comision_asesoria_vendedor1);

  if ($comision_asesoria_vendedor1==NULL) {
    $porcentaje_total_asesoria = ($producto_array[$producto]);
  }
  $otro_total_asesoria=$producto_array[$producto]-$porcentaje_total_asesoria;
  $total_asesoria = $total_asesoria+$otro_total_asesoria;
  $array_asesoria[] = '
           <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto.'</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div>  
         
              
               <div class="col-md-2 col-xs-4">              
                   <div class="text">                  
                     <p>'.round($otro_total_asesoria,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
                    

   }//asesoria

//programas
if ($categoria_h == 'programas-powerbuilding' OR $categoria_pa == 'programas-powerbuilding') {
$porcentaje_total_programa = ($producto_array[$producto]*$comision_programa_vendedor);

$otro_total_programa=$producto_array[$producto]-$porcentaje_total_programa;
$total_programa = $total_programa+$otro_total_programa;
$array_programa_g[] = '
           <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto.'</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-4">              
                   <div class="text">                  
                     <p> '.round($otro_total_programa,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
  }//programa  

//tienda
if ($categoria_h == 'tienda' OR $categoria_pa == 'tienda') {

$porcentaje_total_tienda = ($producto_array[$producto]*$comision_tienda_vendedor);

$otro_total_tienda=$producto_array[$producto]-$porcentaje_total_tienda;

if ($categoria_h == 'camisetas' OR $categoria_pa == 'camisetas') {
     $total_ventas_camisetas_ivan=$total_producto*3.5;
     $otro_total_tienda=$producto_array[$producto]-$porcentaje_total_tienda-$total_ventas_camisetas_ivan;
} 

$total_tienda = $total_tienda+$otro_total_tienda;
$array_tienda[] = '
           <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>'.$total_producto.'</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <p>'.$name_producto.'</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-4">              
                   <div class="text">                  
                     <p>'.round($otro_total_tienda,2).'€</p>
                   </div>          
               </div>                                              
            </div>';   
  } //tienda

 ////////////////////cupones
$asoc_producto = meta_value( 'vendedores', $producto ); 
$total_vendedor=0;
$total_vendedor=$porcentaje_total_asesoria+$porcentaje_total_programa ;
if ($usu_vendedor != $asoc_producto) {
        $total_id_vendedor = $id_vendedor[$vende_producto];
        $id_vendedor[$vende_producto] = $total_id_vendedor+$porcentaje_total_asesoria+$porcentaje_total_programa+$porcentaje_total_tienda;
}

}//total producto







 }//productoss


///////////////////////////////////

$count_asesoria=count($array_asesoria);
echo'
            <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h3>Qty</h3>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <h3>Asesorías</h3>
                   </div>          
               </div>   
               
               <div class="col-md-2 col-xs-4">              
                   <div class="text">                  
                     <h3>Total</h3>
                   </div>          
               </div>                                              
            </div>';
if ( $total_asesoria==0) {
  echo'
           <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-4">              
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
            <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h3>Qty</h3>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <h3>Programas</h3>
                   </div>          
               </div>   
               
               <div class="col-md-2 col-xs-4">              
                   <div class="text">                  
                     <h3>Total</h3>
                   </div>          
               </div>                                              
            </div>
';
if ( $total_programa==0) {
  echo'
           <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-4">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div> ';  
}

for ($i=0; $i < $count_programa_g; $i++) { 
  echo $array_programa_g[$i];
}    

 //tienda
$count_tienda=count($array_tienda); 
echo '
            <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <h3>Qty</h3>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <h3>Tienda </h3>
                   </div>          
               </div>   
               
               <div class="col-md-2 col-xs-4">              
                   <div class="text">                  
                     <h3>Total</h3>
                   </div>          
               </div>                                              
            </div>
';
if ( $total_tienda==0) {
  echo'
           <div class="col-md-12 col-xs-12"> 
               <div class="col-md-1 col-xs-2">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               <div class="col-md-9 col-xs-6">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div> 
               
               <div class="col-md-2 col-xs-4">              
                   <div class="text">                  
                     <p>-</p>
                   </div>          
               </div>                                              
            </div> ';  
}

for ($i=0; $i < $count_tienda; $i++) { 
  echo $array_tienda[$i];
}  

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_date >= '$fecha1' AND post_date <= '$fecha2' AND  post_type = 'shop_order' AND post_status IN ('wc-processing','wc-completed') ORDER BY ID DESC"); 
foreach($result_link as $wc_order)
{
              $id_order = $wc_order->ID;
              $vendedor_cupon=NULL;
              $suma_art = NULL;
              $art = "";
                          
              $cupon_id = NULL;
              $comision_stripe = meta_value( '_stripe_fee', $wc_order->ID );
              $comision_paypal = meta_value( 'PayPal Transaction Fee', $wc_order->ID );
              $importe_cupon = meta_value( '_cart_discount', $wc_order->ID );
              $total_pagado_stripe = meta_value( '_stripe_net', $wc_order->ID );                              
              $cupon = woocommerce_order_items( coupon, $wc_order->ID );
            
              $fecha = date("Y-m-d", strtotime($wc_order->post_date) );   
              $metodo =  meta_value( '_payment_method', $wc_order->ID );
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_name = '$cupon' "); 
              foreach($result_link as $r)
              {
                      $cupon_id = $r->ID;                      
              } 
              $vendedor_cupon_order = meta_value( 'vendedores',  $cupon_id );     

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
             
              
              $vendedor_producto = meta_value( 'vendedores', $id_p ); 
              $vendedor= $vendedor_producto;

 

              $comision_cupon_vendedor = meta_value('comisiones_cupones', $usu_vendedor);
              $comision_asesoria_vendedor =  meta_value('comisiones_asesorias', $_POST["vendedor"]);
              $comision_programa_vendedor = meta_value('comisiones_programas', $_POST["vendedor"]);
              
              ///// $comision artículos
              if ($suma_art>0) {
                $art = $coste_articulo/$suma_art;
              }
              
              $art_paypal = ($art*$comision_paypal);
              $art_paypal = $art_paypal;

              $art_stripe = ($art*$comision_stripe);
              $art_stripe = $art_stripe;


              $subtotal = ($coste_articulo-$art_stripe)-$art_paypal;              
              
              ///// $comision artículos
              $comision_cupon_vendedor=$comision_cupon_vendedor/100;

              $total = $subtotal*$comision_cupon_vendedor;
              

              $coupon_producto= meta_value( 'vendedores', $id_p ); 
             
              if ( $coupon_producto != $usu_vendedor && $producto_regalo != 'Si' && $total>0) {
                $total_cupones = $total_cupones+$total;
echo'
           <div class="col-md-12 col-xs-12 xs-block" style="background-color: #fff; padding: 20px 30px;"> 
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
                     <p>+'.round($total,2).'€</p>
                   </div>          
               </div>
                                              
            </div>';                                
    
              }

}}}           
?>      


            <div class="col-md-12 col-xs-12"> 
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

            <div class="col-md-12 col-xs-12" > 
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
                     <h1 style="color: #000000!important;"><?php $total=$total_asesoria+$total_programa+$total_cupones+$total_tienda; echo round($total,2); ?>€</h1>
                   </div>          
               </div>                                              
            </div>  
 

          </div>
        </div>
      </div>
</section>



<?php
  /////////////////////////// 2 parte  
  echo "<section id='powerbuilding-masthead' style='margin-top: 50px'>";
  echo "<div class='container'><div><div class='row'>";
  echo("<div class='col-md-12'><div class='text'><h2>Comisiones Vendedores</h2></div></div>");
  echo("</div></div></div>");

  echo "<div class='container'><div class='border_center'><div class='row'>";
  
  echo"
      <div class='col-md-12'> 
      <div class='text col-xs-4 hydden'><h3>Vendedor</h3></div>
      <div class='text col-xs-2 hydden'><h3>€ Asesorías</h3></div>
      <div class='text col-xs-2 hydden'><h3>% Programas </h3></div>
      <div class='text col-xs-2 hydden'><h3>% Cupones</h3></div>
      <div class='text col-xs-2 hydden'><h3>% Tienda</h3></div>

      <div class='text col-xs-4 block' style='display:none'><h3>Vendedor</h3></div>
      <div class='text col-xs-2 block' style='display:none'><h3>€Ase</h3></div>
      <div class='text col-xs-2 block' style='display:none'><h3>%Pro</h3></div>
      <div class='text col-xs-2 block' style='display:none'><h3>%Cup</h3></div>
      <div class='text col-xs-2 block' style='display:none'><h3>%Tie</h3></div>

      </div>
  "; 
  echo"";
  $args = array( 'post_type' => 'vendedor', 'post_status' => 'publish');
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post(); $vendedor = get_the_title();
    echo"
      <div class='col-md-12 border'><div class='container'><div class='row'>
      <div class='text col-xs-4'>".$vendedor."</div>
      <div class='text col-xs-2'>".get_field('comisiones_asesorias')."</div>
      <div class='text col-xs-2'>".get_field('comisiones_programas')."</div>
      <div class='text col-xs-2'>".get_field('comisiones_cupones')."</div>
      <div class='text col-xs-2'>".get_field('comisiones_tienda')."</div>
      </div></div></div>
    ";
  endwhile; 
  echo "</div></div>";?>
  
    <?php if ($fecha_anterior != $ultimo_code_mes) { ?>
    <form method='post' style="margin-top: 50px">
        <input type='hidden' name='action' value='guardarventas'>
        <table>                     
            <tr>
                <td>
                    <input type='hidden' name="guardaventas" value='guardaventas'>
                    <input type='hidden' name="pro" value='<?php echo $pro; ?>'>
                    <!--<input type='hidden' name="array_insert[" value='<?php echo $array_tienda; ?>'>-->
                    <input type='submit' class="btn btn-default buttom-gradient-red" value='Guardar Ventas'>
                </td>
            </tr>
        </table>
    </form>
    <?php } ?>
 <?php   
 }//if revisar


$pro = $_POST['pro'];
if($_POST["guardaventas"] != NULL){ 
$ano = date('Y');
$mes = date('m');
$code_mes = $fecha_anterior;
$fecha_guardado = date('Y-m-d');
$table = "wp_ventas_power";

global $wpdb;

$args = array( 'post_type' => 'vendedor', 'post_status' => 'publish');
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); 
$vendedor = get_the_ID();
$cupones = NULL;
$productos_v = NULL;
 
    $args1 = array( 'post_type' => 'shop_coupon', 'post_status' => 'publish');
    $loop1 = new WP_Query( $args1 );
    while ( $loop1->have_posts() ) : $loop1->the_post(); 
      $coupon_vendedor = get_the_ID();        
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'Vendedores' and post_id = $coupon_vendedor"); 
              foreach($result_link as $r)
              {
                 if ($r->meta_value == $vendedor) {
                        $cupones[] = $coupon_vendedor;  
                       // echo $coupon_vendedor; echo "<br>";
                  }                   
              }                            
    endwhile;

    $args2 = array( 'post_type' => 'product', 'post_status' => 'publish');
    $loop2 = new WP_Query( $args2 );
    while ( $loop2->have_posts() ) : $loop2->the_post(); 
      $product_vendedor = get_the_ID();        

              $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'Vendedores' and post_id = $product_vendedor"); 
              foreach($result_link2 as $r2)
              {
                 
                 if ($r2->meta_value == $vendedor) {
                        $productos_v[] = $product_vendedor;  
                       // echo $coupon_vendedor; echo "<br>";
                  }                   
              } 
                           
    endwhile;    
     
  //$b1=unserialize($b);
  //print_r($b1);
  //echo "<br>";
  //echo $b1[1];
  
  $cupo=serialize($cupones); 
  $pro=serialize($productos_v); 



  $comision_asesoria_vendedor =  meta_value('comisiones_asesorias',  $vendedor);
  $comision_programa_vendedor =  meta_value('comisiones_programas',  $vendedor);
  $comision_cupon_vendedor = meta_value('comisiones_cupones',  $vendedor);
  $comision_tienda_vendedor = meta_value('comisiones_tienda',  $vendedor);

if ($fecha_anterior != $ultimo_code_mes) {

  $wpdb->insert( $table, array( 
  'Vendedor' => $vendedor,
  'comision_asesoria' => $comision_asesoria_vendedor,
  'comision_programa' => $comision_programa_vendedor,
  'comision_cupones' =>  $comision_cupon_vendedor,
  'comision_tienda' =>  $comision_tienda_vendedor,
  'productos' => $pro,
  'cupones' => $cupo,
  'code_mes' =>  $code_mes,
  'fecha' =>  $fecha_guardado,



   ));

}//if 
endwhile;


echo "*Los datos se han guardado correctamente"; echo $pro[2378];


}//if


}//function


////////////////////////////////////////////////////////////////////////////////////////////////////

function ventas_pagina_de_opciones(){?>
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/inc/style_menu.css">
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/global.css">
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/newglobal.css">
 <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,500,600,700|Barlow:400,500,700&display=swap" rel="stylesheet" />
 <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans:400,600,700,800|Source+Sans+Pro&display=swap" rel="stylesheet">

  <?php
    echo("<div class='wrap'><h2>Filtrar Ordenes</h2></div>");
    echo("<div class='wrap'><br></div>");

  //  if(isset($_POST['action']) && $_POST['action'] == "salvaropciones"){
  //      update_option('ventas_vendedor',$_POST['vendedor']);
  //      update_option('ventas_fecha1',$_POST['fecha1']);        
  //      update_option('ventas_fecha2',$_POST['fecha2']);
  //      update_option('ventas_producto',$_POST['producto']);
  //      update_option('ventas_metodo_pago',$_POST['metodo_pago']);
  //      echo("<div class='updated message' style='padding: 10px'>Opciones guardadas.</div>");
  //  }
 ?>
    <form method='post'>
        <input type='hidden' name='action' value='salvaropciones'>
            <div class="col-md-6 col-xs-12"> 
              <div class="col-md-12">
                <div class="col-md-2 col-xs-4">
                    <label style="margin-top: 05px" for='cabecera'>Vendedor</label>
                </div>
                <div class="col-md-10 col-xs-8">   
                    <select style="margin-bottom: 10px; width: 100%" name="vendedor">                                      
                       <?php
                           global $wpdb;   $vende=$_POST["vendedor"];
                           if ($_POST["vendedor"]==NULl) {
                               echo '<option value="">Todos</option>'; 
                           } 
                           if ($_POST["vendedor"]!=NULl) {
                              $queried_vendedor = get_post($_POST["vendedor"]);
                               echo '<option value="'.$queried_vendedor->ID.'">'.$queried_vendedor->post_title.'</option>'; 
                               echo '<option value="">Todos</option>'; 
                           }                                                     
                           $args = array( 'post_type' => 'vendedor', 'post_status' => 'publish');
                           $loop = new WP_Query( $args );
                           while ( $loop->have_posts() ) : $loop->the_post();
                               $post_id = get_the_ID();?>
                               <option value="<?php echo $post_id; ?>"><?php the_title(); ?></option>
                             <?php  endwhile;  ?>
                    </select>   
                </div>
              </div>
              <div class="col-md-12">  
                <div class="col-md-2 col-xs-4">
                    <label style="margin-top: 05px" for='email'>Producto</label>
                </div>
                <div class="col-md-10 col-xs-8">
                    <select style="margin-bottom: 10px; width: 100%" name="producto">  
             
                       <?php
                       $pro=$_POST["producto"];
                           if ($_POST["producto"]==NULl) {
                               echo '<option value="">Todos</option>'; 
                           }                        
                           global $wpdb;
                           $result = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = $pro"); 
                           foreach($result as $r)
                           { 
                             echo '<option value="'.$r->ID.'">'.$r->post_title.'</option>'; 
                             echo '<option value="">Todos</option>'; 
                           }                            
                           $result = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'product'"); 
                           foreach($result as $r)
                           { 
                             echo '<option value="'.$r->ID.'">'.$r->post_title.'</option>'; 
                           }                  
                           ?>
                    </select>   
                </div>
              </div>
              <div class="col-md-12">  
                <div class="col-md-2 col-xs-4">
                    <label style="margin-bottom: 10px" for='titulo'>Desde:</label>
                </div>
                <div class="col-md-10 col-xs-8">    
                    <input style="margin-bottom: 10px" type='date' name='fecha1' id='fecha1'  value='<?php echo $_POST["fecha1"]; ?>'>
                </div>
                <div class="col-md-2 col-xs-4">
                    <label style="margin-bottom: 10px" for='titulo'>Hasta:</label>
                </div>                
                <div class="col-md-10 col-xs-8">     
                    <span style="font-size: 14px;"></span> <input style="margin-bottom: 10px" type='date' name='fecha2' id='fecha2'  value='<?php echo $_POST["fecha2"]; ?>'>
                </div>              
              </div>
              <div class="col-md-12">    
                <div class="col-md-2 col-xs-4">
                    <label style="margin-bottom: 10px" for='titulo'>Método de pago</label>
                </div>
                <div class="col-md-9 col-xs-8">    
                    <select style="margin-bottom: 10px" name="metodo_pago">
                        <?php
                           if ($_POST["metodo_pago"]!=NULl) {
                               echo '<option value="">'.$_POST["metodo_pago"].'</option>'; 
                           } 
                            
                        ?>                                               
                        <option value="">Todos</option>
                        <option value="paypal">Paypal</option>
                        <option value="stripe">Stripe</option>
                    </select>                    
                </div>    
              </div>
              <div class="col-md-12">  
                <div class="col-md-2 col-xs-4">
                    <label style="margin-bottom: 10px" for='titulo'>Cupones</label>
                </div>
                <div class="col-md-10 col-xs-8">    
                    <select style="margin-bottom: 10px; width:100%" name="cupon" width="100%">
                        <?php
                           if ($_POST["cupon"]!=NULl) {
                               echo '<option value="'.$_POST["cupon"].'">'.$_POST["cupon"].'</option>'; 
                           } 
                            
                        ?>                    
                        <option value="">Todos</option>
                       <?php
                           global $wpdb;
                           $result = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'shop_coupon' ORDER by post_date DESC"); 
                           foreach($result as $r)
                           { 
                             echo '<option value="'.$r->post_name.'">'.$r->post_name.'</option>'; 
                           }                  
                           ?>
                    </select>                    
                </div>               
              </div>
              <div class="col-md-12">   
                <div class="col-md-12 col-xs-12">
                    <input class="btn btn-default buttom-gradient-red" style="margin-bottom: 10px" type='submit' value='Buscar'>
                </div>
              </div>  
            </div>
    </form>
 <div class="col-md-12">
<?php if ($_POST["fecha1"] != NULL OR $_POST["fecha2"] != NULL OR $_POST["metodo_pago"] != NULL OR $_POST["vendedor"] != NULL OR $_POST["producto"] != NULL OR $_POST["cupon"] != NULL) { $comi = $_POST["comision"]/100;?>
    <form method="post" id="download_form" action="" style="text-align: right;">
       <input type="hidden" name="fecha1" value="<?php echo $_POST["fecha1"];?>">
       <input type="hidden" name="fecha2" value="<?php echo $_POST["fecha2"];?>">
       <input type="hidden" name="vendedor" value="<?php echo $_POST["vendedor"];?>">
       <input type="hidden" name="producto" value="<?php echo $_POST["producto"];?>">
       <input type="hidden" name="metodo_pago" value="<?php echo $_POST["metodo_pago"];?>">
       <input type="hidden" name="cupon" value="<?php echo $_POST["cupon"];?>">
       <input type="hidden" name="comision" value="<?php echo $comi;?>">
       <input type="submit" name="exportar_xls" class="btn btn-default buttom-gradient-red" value="<?php _e('Exportar', 'ventas'); ?>" />
    </form><br/>
 </div>     
            
           <!-- Table -->
           <div class='container'><div ><div class='row'>
            <!-- label -->
            <div class="col-md-12">
               <div class='text col-xs-1 hydden'><h4>Pedido</h4></div>
               <div class='text col-xs-2 hydden'><h4>Fecha</h4></div>
               <div class='text col-xs-4 hydden'><h4>Artículo # Item Nombre</h4></div>
               <div class='text col-xs-2 hydden'><h4>Pasarela</h4></div>
               <div class='text col-xs-1 hydden'><h4>Coste Art</h4></div>
               <div class='text col-xs-2 hydden'><h4>Cupon</h4></div>

               <div class='text col-xs-3 block' style="display:none"><h4>N° pedido</h4></div>
               <div class='text col-xs-3 block' style="display:none"><h4>Fecha</h4></div>
               <div class='text col-xs-6 block' style="display:none"><h4>Artículo # Item Nombre</h4></div>
            </div>
           
<?php
$limit = $_POST['limit'];
$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'shop_order' AND post_status IN ('wc-processing','wc-completed') ORDER BY ID DESC "); 
foreach($result_link as $wc_order)
{
                 $id_order = $wc_order->ID;     
                 $cupon_id = NULL;
                 $comision_stripe = meta_value( '_stripe_fee', $wc_order->ID );
                 $comision_paypal = meta_value( 'PayPal Transaction Fee', $wc_order->ID );
                 $importe_cupon = meta_value( '_cart_discount', $wc_order->ID );
                 $total_pagado_stripe = meta_value( '_stripe_net', $wc_order->ID );                              
                 $cupon = woocommerce_order_items( coupon, $wc_order->ID );
                 $fecha = date("Y-m-d", strtotime($wc_order->post_date) );   
                 $metodo =  meta_value( '_payment_method', $wc_order->ID );

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_name = '$cupon' "); 
              foreach($result_link as $r)
              {
                      $cupon_id = $r->ID;                      
              } 
                            
if ($cupon != "prueba5852") {
                
                
$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC "); 
foreach($result_link as $r)
{     
              $comision_cupon=0;
              $vendedor_producto=NULL;  
              $vendedor_cupon=NULL;
              $coste_articulo = woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              $coste_articulo = round($coste_articulo,2); 
              $id_p = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );

              $vendedor_producto = meta_value('vendedores', $id_p); 
              $vendedor= $vendedor_producto;
              $vendedor_cupon = meta_value( 'vendedores',  $cupon_id );  

              if ($vendedor_cupon != $vendedor_producto) {
                $comision_cupon = meta_value( 'comisiones_cupones', $vendedor_cupon ); 
                $comision_cupon = ($comision_cupon/100);
              }


              $subtotal = ($coste_articulo-$comision_stripe)-$comision_paypal;

              $comi_cupon = ($subtotal*$comision_cupon);


           $var='
                  <div class="col-md-12">      
                    <div class="text col-xs-1 hydden">'.$id_order.'</div>
                    <div class="text col-xs-2 hydden">'.$fecha.'</div>
                    <div class="text col-xs-4 hydden">'.$r->order_item_name.'</div>
                    <div class="text col-xs-2 hydden">'.$metodo.'</div>
                    <div class="text col-xs-1 hydden">'.$coste_articulo.'</div>
                    <div class="text col-xs-2 hydden">'.$cupon.'</div>

                    <div class="text col-xs-3 block" style="display:none">'.$id_order.'</div>
                    <div class="text col-xs-3 block" style="display:none">'.$fecha.'</div>
                    <div class="text col-xs-6 block" style="display:none">'.$r->order_item_name.'</div>
                  </div>'; 

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
                     echo $var;
                 } }   

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } }

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }}

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"]){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }} 

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["producto"] == $id_p){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }}                

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } } 

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p){                   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } }  

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["producto"] == $id_p){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;
                 } }

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["producto"] == $id_p){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;
                 } }                 

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["vendedor"] == $vendedor){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                      echo $var; 
                 }}

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["metodo_pago"] == $metodo){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                              
                 } } 


                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["vendedor"] == $vendedor){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                               
                } }                  
                
                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
                     echo $var;
                 } }   

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["vendedor"] == $vendedor){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
                     echo $var;
                 } }   

                ////////////////////////////////////////////////////////


                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;
                 } }   

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["cupon"] == $cupon){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } }

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["cupon"] == $cupon){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }}

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["cupon"] == $cupon){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }} 

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }}                

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } } 

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){                   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } }  

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;
                 } }

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["vendedor"] == $vendedor && $_POST["cupon"] == $cupon){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                      echo $var; 
                 }}

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["metodo_pago"] == $metodo && $_POST["cupon"] == $cupon){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                              
                 } } 


                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["vendedor"] == $vendedor && $_POST["cupon"] == $cupon){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                               
                 } } 

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["cupon"] == $cupon){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                               
                } }   

$ordera = $wc_order->id;                              

}}}


 
echo ' </div></div></div>';
 }}


          
  //////////////////////////////
  function exportando(){
    global $wpdb;
    if ( isset($_POST['exportar_xls'])  ) {
    $hoy = date("Y-m-d");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename='.$file);
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=Ventas-$hoy.xls");
    echo "<table>
    <thead>    
    <tr>
    <th>".__( 'N PEDIDO','ventas' )."</th>
    <th>".__( 'FECHA','ventas' )."</th>
    <th>".__( 'ARTICULO # ITEM NOMBRE','ventas' )."</th>
  <th>".__( 'QTY','ventas' )."</th>
    <th>".__( 'CATEGORIA','ventas' )."</th>
    <th>".__( 'PASARELA','ventas' )."</th>
    <th>".__( 'TOTAL PAGADO STRIPE','ventas' )."</th> 
    <th>".__( 'CUPON','ventas' )."</th>
    <th>".__( 'COSTE ARTICULO','ventas' )."</th>
    <th>".__( 'COMISION STRIPE','ventas' )."</th>

    <th>".__( 'COMISION PAYPAL','ventas' )."</th>
    
    <th>".__( 'IMPORTE CUPON','ventas' )."</th>  

    <th>".__( 'SUBTOTAL','ventas' )."</th>



    <th>".__( '€ COMISION ASESORIA','ventas' )."</th>
    <th>".__( 'COMISION ASESORIA','ventas' )."</th>

    <th>".__( '€ COMISION PROGRAMA','ventas' )."</th>
    <th>".__( 'COMISION PROGRAMA','ventas' )."</th>    

    <th>".__( '% COMISION TIENDA','ventas' )."</th>
    <th>".__( 'COMISION TIENDA','ventas' )."</th>

    <th>".__( 'COMISION CAMISETAS IVAN','ventas' )."</th>

    <th>".__( 'TOTAL PBO','ventas' )."</th>    

    <th>".__( '% COMISION CUPON','ventas' )."</th> 
    <th>".__( 'COMISION CUPON','ventas' )."</th>   

    <th>".__( '% COMISION PRODUCTOS PBO','ventas' )."</th>
    <th>".__( 'COMISION PRODUCTOS PBO','ventas' )."</th>     

    <th>".__( 'ENVIO','ventas' )."</th>
    <th>".__( 'TOTAL','ventas' )."</th>
    </tr>
    </tr>
    </thead>
    ";

 $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'shop_order' AND post_status IN ('wc-processing','wc-completed') ORDER BY ID DESC"); 
foreach($result_link as $wc_order)
{
              $id_order = $wc_order->ID;
              $vendedor_cupon=NULL;
              $suma_art = NULL;
              $art = "";
              $envio = NULL;            
              $cupon_id = NULL;
              $vendedor_cupon = NULL;
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

              // % comisiones por articulos
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
              foreach($result_link as $r)
              {               
                      $suma_art= $suma_art + woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              }  
              // envíos
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'shipping' AND order_id = $id_order ORDER BY order_item_id DESC"); 
              foreach($result_link as $r)
              {               
                      $envio= woocommerce_itemrmeta_value('cost',  $r->order_item_id );
              }               
//
if ($cupon != "prueba5852") {

$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' AND order_id = $id_order ORDER BY order_item_id DESC"); 
foreach($result_link as $r)
{     
              $categoria_h = "";
              $categoria_pa = "";
              $vendedor_producto=NULL;  
              $comision_cupon=NULL;    

              $comi_cupon = NULl;
              $comision_cupon_vendedor1 = NULl;
              $comision_asesoria_vendedor1 = NULl;
              $asesoria_vendedor = NULl;
              $comision_asesoria_vendedor = NULl;
              $comision_programa_vendedor1 = NULl;
              $programa_vendedor = NULl;
              $comision_programa_vendedor = NULl;
              $comision_tienda_vendedor1 = NULl;
              $comision_tienda_vendedor = NULl;
              $tienda_vendedor = NULl;
              $comision_productos_pbo_vendedor1 = NULl;
              $comision_productos_pbo_vendedor = NULl;
              $productos_pbo_vendedor = NULl;
              $total_pbo_comi = NULL;
              $total_pbo = NULL;
              $total = NULL;
              $producto_pbo = NULL;
              $subtotal = NULL;
              $total_ventas_camisetas_ivan = NULL;
              $asoc_producto = NULl;


              $coste_articulo = woocommerce_itemrmeta_value('_line_total',  $r->order_item_id );
              $coste_articulo = round($coste_articulo,2); 
              $product_id = woocommerce_itemrmeta_value('_product_id',  $r->order_item_id );
              $id_p = $product_id;
              $qty = woocommerce_itemrmeta_value('_qty',  $r->order_item_id );
              $queried_p = get_post($id_p);
              $name_producto = $queried_p->post_title;
              $asoc_producto = meta_value( 'vendedores', $product_id ); 

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

              //$cat = get_the_terms($product_id, 'product_cat' );
              //foreach($cat as $category) {                
                  //$categoria_p = $category->term_id;
                  //$categoria_h = ", ".$category->name."";               
              //}  
             // $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$categoria_p' "); 
              //foreach($result_link as $cr)
              //{                  
                 // $categoria = $cr->parent;
              //}      
              //$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$categoria' "); 
              //foreach($result_link as $cra)
              //{                  
                  //$categoria_pa = $cra->name;
             // } 
             
              
              $vendedor_producto = meta_value( 'vendedores', $id_p ); 
              $vendedor= $vendedor_producto;
              $producto_pbo = meta_value( 'producto_pbo', $id_p );

              $comision_cupon_vendedor1 = meta_value('comisiones_cupones', $vendedor_cupon);
              $comision_productos_pbo_vendedor1 = meta_value('comisiones_productos_pbo', $vendedor_cupon);
              $comision_asesoria_vendedor1 = meta_value('comisiones_asesorias', $asoc_producto);
              $comision_programa_vendedor1 = meta_value('comisiones_programas', $asoc_producto);
              $comision_tienda_vendedor1 = meta_value('comisiones_tienda', $asoc_producto);


             

                  $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."ventas_power WHERE code_mes = '$code_mes_actual' AND vendedor = '$asoc_producto' "); 
                  foreach($result_link as $r)
                  {                  
                      $comision_cupon_vendedor1 = $r->comision_cupones; 
                      $comision_asesoria_vendedor1 = $r->comision_asesoria; 
                      $comision_programa_vendedor1 = $r->comision_programa; 
                      $comision_tienda_vendedor1 = $r->comision_tienda; 
                      $comision_productos_pbo_vendedor1 = $r->comision_productos_pbo; 
                    
                  }
                  
                 
              $comision_cupon_vendedor = $comision_cupon_vendedor1/100;
              $comision_asesoria_vendedor = $comision_asesoria_vendedor1/100;
              $comision_programa_vendedor = $comision_programa_vendedor1/100;
              $comision_tienda_vendedor = $comision_tienda_vendedor1/100;
              $comision_productos_pbo_vendedor = $comision_productos_pbo_vendedor1/100;



              
              ///// $comision artículos
              if ($suma_art>0) {
                $art = $coste_articulo/$suma_art;
              }
              $art_paypal = ($art*$comision_paypal);
              $art_paypal = round($art_paypal,2);

              $art_stripe = ($art*$comision_stripe);
              $art_stripe = round($art_stripe,2);


              $subtotal = ($coste_articulo-$art_stripe)-$art_paypal;

            //  $comi_cupon = ($subtotal*$comision_cupon);

            //  $total = ($subtotal-$comi_cupon);


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
$total = $total_pbo-($productos_pbo_vendedor+$comi_cupon);        
  ///////////////////////////////////////////////////////////777
             
             
             // $comi_cupon = (3*0.1);
            if ($cat[1]!=NULL) {
               $cat[1]= "- ".$cat[1];
             }
            if ($cat[2]!=NULL) {
               $cat[2]= "- ".$cat[2];
             }              
            $var = "<tbody><tr>
            <td>".utf8_encode($id_order)."</td>
            <td>".utf8_encode($fecha)."</td>
            <td>".utf8_decode($name_producto)."</td>
            <td>".utf8_decode($qty)."</td>
            <td>".$cat[0]." ".$cat[1]."".$cat[2]."</td>
            <td>".utf8_encode($metodo)."</td>
            <td>".utf8_encode($total_pagado_stripe)."</td> 
            <td>".utf8_encode($cupon)."</td>
            <td>".utf8_encode($coste_articulo)."</td>
            <td>".utf8_encode($art_stripe)."</td>
            <td>".utf8_encode($art_paypal)."</td>            
            <td>".utf8_encode($importe_cupon)."</td>       
            <td>".utf8_encode($subtotal)."</td> 

  

            <td>".utf8_encode($comision_asesoria_vendedor1)."</td> 
            <td>".round($asesoria_vendedor,2)."</td> 

            <td>".utf8_encode($comision_programa_vendedor1)."</td> 
            <td>".round($programa_vendedor,2)."</td> 

            <td>".utf8_encode($comision_tienda_vendedor1)."</td> 
            <td>".round($tienda_vendedor,2)."</td> 

            <td>".round($total_ventas_camisetas_ivan,2)."</td> 

            <td>".round($total_pbo,2)."</td>

            <td>".utf8_encode($comision_cupon_vendedor1)."</td> 
            <td>".round($comi_cupon,2)."</td>     

            <td>".utf8_encode($comision_productos_pbo_vendedor1)."</td> 
            <td>".round($productos_pbo_vendedor,2)."</td>                    
            
            <td>".round($envio,2)."</td>  
            <td>".round($total,2)."</td>         
            </tr></tbody>";

                $subtotal= $coste_articulo-$comision_stripe-$comision_paypal;

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
                     echo $var;
                 } }   

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } }

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_envio = $total_envio + $envio;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }}

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"]){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }} 

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["producto"] == $id_p){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }}                

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } } 

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p){                   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } }  

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["producto"] == $id_p){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;
                 } }

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["producto"] == $id_p){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;
                 } }                 

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["vendedor"] == $vendedor){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                      echo $var; 
                 }}

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["metodo_pago"] == $metodo){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                              
                 } } 


                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($_POST["vendedor"] == $vendedor){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                               
                } }                  
                
                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
                     echo $var;
                 } }   

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] == NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["vendedor"] == $vendedor){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }
                     echo $var;
                 } }   

                ////////////////////////////////////////////////////////


                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;
                 } }   

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["cupon"] == $cupon){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } }

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["cupon"] == $cupon){ 
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }}

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["cupon"] == $cupon){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }} 

                 if ($_POST["fecha1"] != NULL && $_POST["fecha2"] != NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($fecha >= $_POST["fecha1"] && $fecha <= $_POST["fecha2"] && $_POST["metodo_pago"] == $metodo && $_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var; 
                 }}                

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["metodo_pago"] == $metodo && $_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } } 

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["vendedor"] == $vendedor && $_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){                   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;  
                 } }  

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] != NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["producto"] == $id_p && $_POST["cupon"] == $cupon){                    
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;
                 } }

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["vendedor"] == $vendedor && $_POST["cupon"] == $cupon){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                      echo $var; 
                 }}

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] != NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["metodo_pago"] == $metodo && $_POST["cupon"] == $cupon){   
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                              
                 } } 


                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] != NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["vendedor"] == $vendedor && $_POST["cupon"] == $cupon){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                               
                 } } 

                 if ($_POST["fecha1"] == NULL && $_POST["fecha2"] == NULL && $_POST["metodo_pago"] == NULL && $_POST["vendedor"] == NULL && $_POST["producto"] == NULL && $_POST["cupon"] != NULL) {
                 if ($_POST["cupon"] == $cupon){  
                 $total_precio_producto = $total_precio_producto + $precio_producto;
                 $total_comision_stripe = $total_comision_stripe + $comision_stripe;
                 $total_total_pagado_stripe = $total_total_pagado_stripe + $total_pagado_stripe;
                 $total_comision_paypal = $total_comision_paypal + $comision_paypal;
                 $total_importe_cupon = $total_importe_cupon + $importe_cupon;
                 $total_envio = $total_envio + $envio;
                 $totales = $totales + $total;
                 $cat = $categoria_pa;                 
                    if ($ordera != $wc_order->id) {
                       $cant_items = $cant_items + 1;
                    }                 
                     echo $var;                               
                } }   

$ordera = $wc_order->id;                              

}}}


            echo "<tr><td></td></tr>";
            echo "<thead> <tr>";
            echo "<th bgcolor='#990000' colspan='10'></th>";

            echo "<th bgcolor='#990000' colspan='7'>TOTAL GANANCIA</th>";
            echo "<th bgcolor='#990000' colspan='10'></th>";          
            echo "</tr></thead>";

            echo "<tr><td></td></tr>";
            echo "<thead> <tr>";
            echo "<th bgcolor='#990000' colspan='10'></th>";

            echo "<th bgcolor='#990000' colspan='7'>".round($totales,2)."</th>";
            echo "<th bgcolor='#990000' colspan='10'></th>";          
            echo "</tr></thead>";            


       if ($_POST["vendedor"]!=NULL && $_POST["producto"] != NULL) { 
           if ($cat == "PROGRAMAS POWERBUILDING") {
              $total_cat=$totales*($comision_programa_vendedor/100);
           }
           if ($cat == "ASESORIAS") {
              $total_cat=$totales*($comision_programa_vendedor/100);
           }           

            echo "<tr><td></td></tr>";
            echo "<thead> <tr>";
            echo "<th bgcolor='#990000' colspan='10'></th>";

            echo "<th bgcolor='#990000' colspan='7'>TOTAL GANANCIA</th>";
            echo "<th bgcolor='#990000' colspan='10'></th>";          
            echo "</tr></thead>";

            echo "<tr><td></td></tr>";
            echo "<thead> <tr>";
            echo "<th bgcolor='#990000' colspan='10'></th>";

            echo "<th bgcolor='#990000' colspan='7'>".round($totales,2)."</th>";
            echo "<th bgcolor='#990000' colspan='10'></th>";          
            echo "</tr></thead>"; ;   

        } 


    echo "</table>";               
    exit;
    }   
    
    register_setting( 'theme_settings_page', 'theme_settings_page' );
    
}
add_action( 'admin_init', 'exportando' );
?>