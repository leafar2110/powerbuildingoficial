<div id="cargando" style="display:none;margin-top:30px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">
    
    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div>
<?php


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
                <?php $args = array( 'post_type' => 'product', 'product_cat' => $categoria, 'duracion' => $duracion, 'niveles' => $niveles, 'objetivos' => $objetivos, 'fuerza' => $fuerza, 'estetica' => $estetica ); ?>
                <?php $loop = new WP_Query( $args ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; 

                     $post_id = get_the_ID();

                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_p = $category->name;               
                     }
                     foreach((get_the_terms($post_id, 'niveles' )) as $niveles) 
                     {                
                          $niveles_p = $niveles->name;               
                     }                     


                ?> 
               

                  <div class="col-md-3 col-sm-6 col-xs-12">                    
                      <div class="item-shop">
                       <a href="<?php the_permalink() ?>">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
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
      
              <?php endwhile; ?>


            <?php } ?>

            <!--  todos  -->

               <?php if ($categoria == "Todos" && $buscar == NULL){ ?>
                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'programas-powerbuilding', 'duracion' => $duracion, 'niveles' => $niveles, 'objetivos' => $objetivos, 'fuerza' => $fuerza, 'estetica' => $estetica ); ?>
                <?php $loop = new WP_Query( $args ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; 

                     $post_id = get_the_ID();

                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_p = $category->name;               
                     }
                     foreach((get_the_terms($post_id, 'niveles' )) as $niveles) 
                     {                
                          $niveles_p = $niveles->name;               
                     } 

                ?> 
               

                  <div class="col-md-3 col-sm-6 col-xs-12">                    
                      <div class="item-shop">
                       <a href="<?php the_permalink() ?>">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                        <div class="info-item-shop">
                         <p class="details-item-shop"><?php echo''.$categoria_p.' | '.$niveles_p.''; ?></p>
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
    $args = array( 'post_type' => 'product', 'product_cat' => 'programas-powerbuilding', 's' => $_POST['buscar']);
     
    $myposts = get_posts( $args );
    echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;">Resultados para: '.$buscar.'</h4></div>';   
    foreach( $myposts as $post ) :  setup_postdata($post); global $product;?>
          <?php foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
                $cat = $category->name;               
               }
                     $post_id = get_the_ID();

                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_p = $category->name;               
                     }
                     foreach((get_the_terms($post_id, 'niveles' )) as $niveles) 
                     {                
                          $niveles_p = $niveles->name;               
                     }                
            $i++;    
          ?>    
    <!-- product -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item-shop">
                            <a href="<?php the_permalink() ?>">
                                <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title(); ?>">
                                <div class="info-item-shop">
                                    <p class="details-item-shop"><?php echo''.$categoria_p.' | '.$niveles_p.''; ?></p>
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

