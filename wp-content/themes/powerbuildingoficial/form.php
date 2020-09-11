<?php

require_once('../../../wp-config.php');
global $wpdb;



$categoria =$_POST["categoria"];
$buscar =$_POST["buscar"];
$duracion =$_POST["duracion"];
$niveles =$_POST["niveles"];
$objetivos =$_POST["objetivos"];
$fuerza =$_POST["fuerza"];
$estetica =$_POST["estetica"];


?>


            <div class="">
                <div class="content-holder">
                    <ul class="content-tags">
                        <li>                                                                  


                            <a href="<?php echo get_home_url() ?>/programas/"><button class="btn btn-clear-tag buttom-gradient-red" >
                                Clear All <span class="glyphicon glyphicon-remove"></span>
                            </button></a>
                        </li>
                    </ul>
                </div>
            </div>

<div class="shop-content">
                <div class="row">

                <?php if ($categoria != "Todos" && $buscar == NULL){ ?>
                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'programas', 'duracion' => $duracion, 'niveles' => $niveles, 'objetivos' => $objetivos, 'fuerza' => $fuerza, 'estetica' => $estetica ); ?>
                <?php $loop = new WP_Query( $args ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; 

                     $post_id = get_the_ID();

                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_p = $category->name;               
                     }

                          $id_entrenador = meta_value( 'entrenador', $post_id ); 
                     foreach((get_the_terms($id_entrenador, 'category' )) as $category) 
                     {                
                          $categoria_entrenador = $category->name;               
                     }                     

                  if ($categoria == $categoria_entrenador){ 
                ?> 
               

                  <div class="col-md-3 col-sm-6 col-xs-12">                    
                      <div class="item-shop">
                       <a href="<?php the_permalink() ?>">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                        <div class="info-item-shop">
                         <p class="details-item-shop">Programa <?php echo $categoria_p; ?></p>
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
                 
               <?php } ?>  
              <?php endwhile; ?>


            <?php } ?>

            <!--  todos  -->

               <?php if ($categoria == "Todos" && $buscar == NULL){ ?>
                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'programas', 'duracion' => $duracion, 'niveles' => $niveles, 'objetivos' => $objetivos, 'fuerza' => $fuerza, 'estetica' => $estetica ); ?>
                <?php $loop = new WP_Query( $args ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; 

                     $post_id = get_the_ID();

                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_p = $category->name;               
                     }


                ?> 
               

                  <div class="col-md-3 col-sm-6 col-xs-12">                    
                      <div class="item-shop">
                       <a href="<?php the_permalink() ?>">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                        <div class="info-item-shop">
                         <p class="details-item-shop">Programa <?php echo $categoria_p; ?></p>
                          <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><span ><?php the_title(); ?></span></a></h5>
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
      
              <?php endwhile; ?>


            <?php } ?>

 
           <!--   -->
               <?php if ($buscar != NULL){ ?>
 
    <?php 
    $i=0; 
    $args = array( 'post_type' => 'product', 'product_cat' => 'programas', 's' => $_POST['buscar']);
     
    $myposts = get_posts( $args );
    echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;">Resultados para: '.$buscar.'</h4></div>';   
    foreach( $myposts as $post ) :  setup_postdata($post); global $product;?>
          <?php foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
                $cat = $category->name;               
               }
            $i++;    
          ?>    
    <!-- product -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item-shop">
                            <a href="<?php the_permalink() ?>">
                                <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title(); ?>">
                                <div class="info-item-shop">
                                    <p class="details-item-shop">
                                    <?php if ($cat == 'PROGRAMAS') {
                                       the_field('duracion'); 
                                    }?>
                                    <?php if ($cat == 'ASESORÍAS') {
                                       echo "Entrenamiento + Dieta";
                                    }?>
                                    </p>
                                    <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles </a></span></div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right"><span
                                                class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
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
    <!-- end product -->        
           
        <?php endforeach; ?>
        <?php if($i == 0){  ?>
         <p>No hay resultados</p>
        <?php } ?> 

            <?php } ?>           




                </div>
              </div>


</section>

