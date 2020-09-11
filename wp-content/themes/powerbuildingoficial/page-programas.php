<?php  get_header(); $link_form = get_template_directory_uri()."/form"; global $wpdb; ?>
    <section id="programs-powerbuilding" class="programs margin-top-page">
        <div class="container">

            <header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
                <div class="title-page text-left">
                    <h1>Programas</h1>
                </div>
 
                <div class="controls-page">
                    <div class="row">

                        <div class="col-lg-4 col-md-3 hidden-sm hidden-xs">
                            <div class="controls-filter">
                                <div aria-controls="filters-dropdown" class="btn">
                                    <span><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-filter.svg" alt=""></span>
                                    Filtrar
                                    <span class="caret"></span>
                                </div>
                            </div>
                        </div>
<form role="form"  name="fvalida"  id="fvalida" onSubmit="return false;" >
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="controls-flex-right">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria"
                                        id="categoria" value="Todos" onclick="enviarDatos();" checked>
                                    <label class="form-check-label active" for="categoria">
                                        Todos
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria"
                                        id="categoria2" value="Hombre" onclick="enviarDatos();">
                                    <label class="form-check-label" for="categoria2">
                                        Hombre
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria"
                                        id="categoria23" value="Mujer" onclick="enviarDatos();">
                                    <label class="form-check-label" for="categoria23">
                                        Mujer
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria"
                                        id="categoria24" value="Influencers" onclick="enviarDatos();">
                                    <label class="form-check-label" for="categoria24">
                                        Influencers
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="navbar-form search-programs">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="buscar" placeholder="Buscar programa...">
                                </div>
                                <button type="submit" class="btn btn-default"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-search.svg"
                                        alt="" onclick="enviarDatos();"></button>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <div id="content-filter-programs" class="content-filter-programs">

                <div class="controls-filter-movil visible-sm visible-xs">
                    <div aria-controls="filters-dropdown" class="btn">
                        <span><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-filter.svg" alt=""></span>
                        Filtrar
                        <span class="caret"></span>
                    </div>
                </div>

                <div class="row">                    

                    <div class="col-md-5 col-sm-11 col-xs-10 col-filter">
                        <div class="filter-programs">
                           
                            <div class="filter-header" id="activo">  
                              <a onclick="ActivarCampoOtroTema();">                            
                                <h6 class="title-col-filter">Duración del programa <span class="caret"></span></h6>
                              </a> 
                            </div>
                            <div class="filter-header" id="oculto" style="display:none">  
                              <a onclick="ActivarCampoOtroTemaoculto();">                            
                                <h6 class="title-col-filter">Duración del programa <span class="caret"></span></h6>
                              </a> 
                            </div>
                           
                            <div class="filter-set" id="filter-set">
                                <ul class="checkbox-set">
                                  <input class="form-control space" name="link_form" id="link_form" value="<?php echo"$link_form"?>" type="hidden">
                                  <?php   
                                  $i=0;                                 
                                  $result_duracion = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE taxonomy = 'duracion'"); 
                                  foreach($result_duracion as $r)
                                  {
                                          $id_duracion = $r->term_id;
                                          $result_duracion_name = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = $id_duracion"); 
                                          foreach($result_duracion_name as $r)
                                          {
                                                  $name_duracion = $r->name; 

                                                  ?>
                                            <li>
                                                <input id="<?php echo $name_duracion; ?>" type="checkbox" name="duracion[]" value="<?php echo $name_duracion; ?>" onclick="enviarDatos();">
                                                <label for="<?php echo $name_duracion; ?>">
                                                    <div><span><?php echo $name_duracion; ?></span></div>
                                                </label>
                                            </li>                              

                                          <?php
                                          }                      
                                  } 
                                  ?>                                
             
                                </ul>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-5 col-sm-11 col-xs-10 col-filter">
                        <div class="filter-programs">
                           
                            <div class="filter-header"  id="activo2">
                              <a onclick="ActivarCampoOtroTema2();">
                                <h6 class="title-col-filter">Niveles<span class="caret"></span></h6>
                              </a>  
                            </div>
                            
                            <div class="filter-header" id="oculto2" style="display:none">  
                              <a onclick="ActivarCampoOtroTema2oculto();">                            
                                <h6 class="title-col-filter">Niveles <span class="caret"></span></h6>
                              </a> 
                            </div>                           
                            <div class="filter-set" id="filter-set2">
                                <ul class="checkbox-set">
                                  <?php                                    
                                  $result_niveles = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE taxonomy = 'niveles'"); 
                                  foreach($result_niveles as $r)
                                  {
                                          $id_niveles = $r->term_id;
                                          $result_niveles_name = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = $id_niveles"); 
                                          foreach($result_niveles_name as $r)
                                          {
                                                  $name_niveles = $r->name; ?>
                                            <li>
                                                <input id="<?php echo $name_niveles; ?>" type="checkbox" name="niveles[]" value="<?php echo $name_niveles; ?>" onclick="enviarDatos();">
                                                <label for="<?php echo $name_niveles; ?>">
                                                    <div><span><?php echo $name_niveles; ?></span></div>
                                                </label>
                                            </li>                              

                                          <?php
                                          }                      
                                  } 
                                  ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-11 col-xs-10 col-filter">
                        <div class="filter-programs">
                          
                            <div class="filter-header"  id="activo3">
                              <a onclick="ActivarCampoOtroTema3();">                            
                                <h6 class="title-col-filter">Objetivos<span class="caret"></span></h6>
                              </a>
                            </div>
                            
                            <div class="filter-header" id="oculto3" style="display:none">  
                              <a onclick="ActivarCampoOtroTema3oculto();">                            
                                <h6 class="title-col-filter">Objetivos <span class="caret"></span></h6>
                              </a> 
                            </div>                          
                            <div class="filter-set" id="filter-set3">
                                <ul class="checkbox-set">
                                  <?php                                    
                                  $result_objetivos = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE taxonomy = 'objetivos'"); 
                                  foreach($result_objetivos as $r)
                                  {
                                          $id_objetivos = $r->term_id;
                                          $result_objetivos_name = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = $id_objetivos"); 
                                          foreach($result_objetivos_name as $r)
                                          {
                                                  $name_objetivos = $r->name; ?>
                                            <li>
                                                <input id="<?php echo $name_objetivos; ?>" type="checkbox" name="objetivos[]" value="<?php echo $name_objetivos; ?>" onclick="enviarDatos();">
                                                <label for="<?php echo $name_objetivos; ?>">
                                                    <div><span><?php echo $name_objetivos; ?></span></div>
                                                </label>
                                            </li>                              

                                          <?php
                                          }                      
                                  } 
                                  ?> 
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-11 col-xs-10 col-filter">
                        <div class="filter-programs">
                          
                            <div class="filter-header"  id="activo4">
                              <a onclick="ActivarCampoOtroTema4();">
                                <h6 class="title-col-filter">Especialidad en Fuerza<span class="caret"></span></h6>
                               </a>
                            </div>
                           
                            <div class="filter-header" id="oculto4" style="display:none">  
                              <a onclick="ActivarCampoOtroTema4oculto();">                            
                                <h6 class="title-col-filter">Especialidad en Fuerza <span class="caret"></span></h6>
                              </a> 
                            </div>                          
                            <div class="filter-set" id="filter-set4">
                                <ul class="checkbox-set">
                                  <?php   
                                  $result_fuerza = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE taxonomy = 'fuerza'"); 
                                  foreach($result_fuerza as $r)
                                  {
                                          $id_fuerza = $r->term_id;
                                          $result_fuerza_name = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = $id_fuerza"); 
                                          foreach($result_fuerza_name as $r)
                                          {
                                                  $name_fuerza = $r->name; 

                                                  ?>
                                            <li>
                                                <input class="casef" id="<?php echo $name_fuerza; ?>" type="checkbox" name="fuerza[]" value="<?php echo $name_fuerza; ?>" onclick="desactivare();enviarDatos();">
                                                <label for="<?php echo $name_fuerza; ?>">
                                                    <div><span><?php echo $name_fuerza; ?></span></div>
                                                </label>
                                            </li>                              

                                          <?php
                                          }                      
                                  } 
                                  ?>                      
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-11 col-xs-10 col-filter">
                        <div class="filter-programs">
                          
                            <div class="filter-header"  id="activo5">
                              <a onclick="ActivarCampoOtroTema5();">
                                <h6 class="title-col-filter">Especiales Estética<span class="caret"></span></h6>
                              </a>
                            </div>
                            
                            <div class="filter-header" id="oculto5" style="display:none">  
                              <a onclick="ActivarCampoOtroTema5oculto();">                            
                                <h6 class="title-col-filter">Especiales Estética <span class="caret"></span></h6>
                              </a> 
                            </div>                           
                            <div id="filter-set5" class="filter-set">
                                <ul class="checkbox-set">
                                  <?php   
                                  $result_estetica = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE taxonomy = 'estetica'"); 
                                  foreach($result_estetica as $r)
                                  {
                                          $id_estetica = $r->term_id;
                                          $result_estetica_name = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = $id_estetica"); 
                                          foreach($result_estetica_name as $r)
                                          {
                                                  $name_estetica = $r->name; 

                                                  ?>
                                            <li>
                                                <input class="case" id="<?php echo $name_estetica; ?>" type="checkbox" name="estetica[]" value="<?php echo $name_estetica; ?>" onclick="desactivar();enviarDatos();">
                                                <label for="<?php echo $name_estetica; ?>">
                                                    <div><span><?php echo $name_estetica; ?></span></div>
                                                </label>
                                            </li>                              

                                          <?php
                                          }                      
                                  } 
                                  ?>          
                                </ul>
                            </div>
                        </div>
                    </div>
</form>
                </div>
            </div>

<div style="min-height:300px">
<div id="hidden">
<div class="shop-content">
                <div class="row">
                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'programas-powerbuilding' ); ?>
                <?php $loop = new WP_Query( $args ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
                     $post_id = get_the_ID();
                     $sub_categoria_pro = NULL;
                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_p = $category->name;               
                     }
                     foreach((get_the_terms($post_id, 'niveles' )) as $niveles) 
                     {                
                          $niveles_p = $niveles->name;               
                     }                     
                     foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
                          $sub_categoria_p = $category->slug;  
                          if ($sub_categoria_p == 'influencers') {
                                  $sub_categoria_pro = $sub_categoria_p;
                           }          
                     }
                     if ( $sub_categoria_pro != 'influencers' ) {                     
                ?>                 
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" <?php if (get_field('ocultar_demo')) {echo "style='display: none;'"; } ?>>
                    
                      <div class="item-shop <?php  ?>"  >
                       <a href="<?php the_permalink() ?>">
                        <img data-lazy-type="image" class="img-responsive lazy-hidden"
                        src="//powerbuildingoficial.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif"
                        data-src="<?php the_post_thumbnail_url('full');?>" width="" height="" alt="programa powerbuilding">
                        <div class="info-item-shop">
                          <p class="details-item-shop"><?php echo''.$categoria_p.' | '.$niveles_p.''; ?></p>
                          <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></a></h5>
                          <div class="row">
                            <div class="col-md-5 col-sm-4 col-xs-4"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles</a></span></div>
                            <div class="col-md-7 col-sm-8 col-xs-8 text-right"><span class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
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
                  <?php $categoria_p= NULL; ?>
                   <?php } ?>
                  <?php endwhile; ?>


                </div>
              </div>
    
</div>

<div id="resultado"><div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div> </div>
</div>
        </div>
    </section>

    <section id="btn-top">
        <span class="ir-arriba glyphicon glyphicon-chevron-up">
        </span>
    </section>

<style>
@media (min-width: 768px) and (max-width: 991px) {
	.info-item-shop{
		height:155px;
	}
	}
	@media (min-width: 992px) and (max-width: 1199px) {
	.info-item-shop{
		height:155px;
	}
	}
</style>

    
<?php  get_footer(); ?>