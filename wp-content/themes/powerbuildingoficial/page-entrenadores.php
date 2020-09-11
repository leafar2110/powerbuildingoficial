 <?php  get_header(); ?>

<section id="trainers-content" class="margin-top-page">

    <div class="container">

        <div class="title-page text-left">
            <h3>Elige a tu Asesor Premium</h3>
        </div> 

            <div role="tabpanel" style="min-height:300px">
              <div class="row grid-filter-content">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-xs-12">
                   <ul class="nav nav-tabs navbar-right" role="tablist">

                      <li role="presentation" class="active"><a href="#tab-todos" data-toggle="tab" role="tab" aria-controls="tab2" onclick="Activarentre();">Todos</a></li>
                      
                      <li role="presentation"><a href="#tab-hombre" data-toggle="tab" role="tab" aria-controls="tab3" onclick="Activarentre();">Hombre</a></li>
                      
                      <li role="presentation"><a href="#tab-mujer" data-toggle="tab" role="tab" aria-controls="tab4" onclick="Activarentre();">Mujer</a></li>
                    </ul>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                            <form class="navbar-form search-programs" id="ajax-form" method="post" action="">
                                <div class="form-group">
                                    <input  name="cat" id="cat" value="entrenador" class="form-control" type="hidden">
                                    <input type="text" name="cadena" id="cadena" class="form-control" placeholder="Buscar entrenadores...">
                                </div>
                                <button type="submit" name="enviar" value="enviar" class="btn btn-default" onclick="Activarbuscaentre();"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-search.svg"
                                        alt=""></button>
                            </form>
                  </div>
              </div>
                    <div id="tabContent1" class="tab-content">                     
                    
                     <div role="tabpanel" class="tab-pane fade in active" id="tab-todos">
                         <div class="row content-todos">
                         <?php
                           $argsBanner = array( 'post_type' => 'entrenador', 'meta_key' => 'personalizados', 'meta_value' => 'No' ); 
                           $Banners = new WP_Query($argsBanner);   
                           if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                               $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                               $url = wp_get_attachment_url( $post_thumbnail_id);
                         ?>                             
                             <div class="col-md-5 col-sm-3 col-xs-4 no-padding">
                                <div class="trainer-item-page">
                                     <a href="<?php echo the_permalink() ?>">
                                     
                                         <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                                         <h4 class="name-trainer-item-page"><?php the_title(); ?></h4>
                                     
                                     </a>
                                </div>
                             </div>
                         <?php $i++; endwhile; endif; ?>                             

                         </div>
                     </div>
                     
                      
                     <div role="tabpanel" class="tab-pane fade" id="tab-hombre">

                      <div class="row content-hombre">

                        <?php                        
                        $argsBanner = array( 'post_type' => 'entrenador', 'category_name' => 'hombre', 'meta_key' => 'personalizados', 'meta_value' => 'No' ); 
                        $Banners = new WP_Query($argsBanner);   
                        if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                            $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                            $url = wp_get_attachment_url( $post_thumbnail_id);
                        ?>                             

                        <div class="col-md-5 col-sm-3 col-xs-4 no-padding">
                            <div class="trainer-item-page">
                                 <a href="<?php echo the_permalink() ?>">
                                 
                                     <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                                     <h4 class="name-trainer-item-page"><?php the_title(); ?></h4>
                                 
                                 </a>
                            </div>
                        </div>
                        <?php $i++; endwhile; endif; ?> 
                        </div>
                     </div>
                    
                     <div role="tabpanel" class="tab-pane fade" id="tab-mujer">

                      <div class="row content-mujer">
                        <?php
                        $argsBanner = array( 'post_type' => 'entrenador', 'category_name' => 'mujer', 'meta_key' => 'personalizados', 'meta_value' => 'No' ); 
                        $Banners = new WP_Query($argsBanner);   
                        if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                            $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                            $url = wp_get_attachment_url( $post_thumbnail_id);
                        ?> 
                          <div class="col-md-5 col-sm-3 col-xs-4 no-padding">
                              <div class="trainer-item-page">
                                   <a href="<?php echo the_permalink() ?>">
                                   
                                       <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                                       <h4 class="name-trainer-item-page"><?php the_title(); ?></h4>
                                   
                                   </a>
                              </div>
                          </div>
                        <?php $i++; endwhile; endif; ?>
                      </div>
                     </div>
                    </div>

                    <div id="posts_container"><div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

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

    </div>

</section>

<!-- ***********************SECTION WORKMODE*************************** -->
  <section id="workmode">
    <div
      class="workmode"
      style="background-image: url(https://powerbuildingoficial.com/wp-content/uploads/2019/09/bk-workmode-powerbuilder-pbo.jpg)"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
            <div class="title-section text-left">
              <h2>
                Tu transformación <br />
                paso a paso
              </h2>
              <br />
              <img
                class="icon-work-mode"
                src="<?php echo get_stylesheet_directory_uri() ?>/images/services/icon-workmode-test.svg"
                alt=""
              />
              <h5>Cuestionarios individualizados para planificar tus objetivos.</h5>
              <br />
              <img
                class="icon-work-mode"
                src="<?php echo get_stylesheet_directory_uri() ?>/images/services/icon-workmode-whatsapp.svg"
                alt=""
              />
              <h5>Atencion diaria por tu asesor via WhatsApp.</h5>
              <br />
              <img
                class="icon-work-mode"
                src="<?php echo get_stylesheet_directory_uri() ?>/images/services/icon-workmode-skype.svg"
                alt=""
              />
              <h5>Reunion con tu asesor via Skype.</h5>
              <div class="btn-start">
                <a class="buttom-gradient-red work-mode-ir-arriba">COMIENZA AHORA</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php  get_footer(); ?>