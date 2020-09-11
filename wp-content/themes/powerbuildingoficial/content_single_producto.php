  <?php
              // one
              $id_p = get_the_ID();
              global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$id_p'"); 
              foreach($result_link as $r)
              {
                      $acerca = $r->post_content;
                      $acerca = str_replace("\n", "<br>", $acerca); 
              }

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'banner_entrenador' and post_id = '$id_p'"); 
              foreach($result_link as $r)
              {
                      $id = $r->meta_value;
              } 
              // two   
              $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_wp_attached_file' and post_id = '$id'"); 
              foreach($result_link2 as $r)
              {
                      $url_file2 = '/'.$r->meta_value;
              }
              $link_file = link_upload()."/wp-content/uploads/".$url_file2;

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'imagen_perfil' and post_id = '$id_p'"); 
              foreach($result_link as $r)
              {
                      $id_img = $r->meta_value;
              } 
              // two   
              $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_wp_attached_file' and post_id = '$id_img'"); 
              foreach($result_link2 as $r)
              {
                      $url_file_perfil = '/'.$r->meta_value;
              }
              $link_file = link_upload()."/wp-content/uploads/".$url_file2; 
              $link_file_perfil = link_upload()."/wp-content/uploads/".$url_file_perfil; 

              $whatsapp_entrenador = meta_value( 'whatsapp', $id_p ); 
              $whatsapp_entrenador_limpio = limpia_espacios($whatsapp_entrenador); 

  ?>
  <section id="profile-trainer">

    <div class="hero-profile-trainer" style="background-image: url(<?php echo  $link_file; ?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-12">
            <div class="profile-top-wrapper">
              <div class="profile-top clearfix">
                <div class="pull-left">
                  <h1><?php the_title(); ?></h1>
                  <div class="profile-location">
                    <i class="glyphicon glyphicon-map-marker"></i>
                    <?php the_field('lugar'); ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content-profile">
      <div class="container">
        <div class="row">

          <div class="col-md-3 col-sm-3">
            <div class="profile-sidebar">

              <div class="profile-pict-wrapper">
                <img class="img-responsive" src="<?php echo $link_file_perfil; ?>">
              </div>

              <div class="booking-info hidden-xs">
                <div class="profile-action">      
                  <?php if (get_field('facebook') != NULL) { ?>  
                   <a target="_blank" class="btn btn-default btn-lg btn-block btn-biography" onclick="acerca();" href="<?php the_field('facebook'); ?>" >FACEBOOK</a>
                  <?php  } ?>                
                  <?php if (get_field('instagram') != NULL) { ?>                
                    <a target="_blank" class="btn btn-default btn-lg btn-block btn-biography" onclick="acerca();" href="<?php the_field('instagram'); ?>">INSTAGRAM</a>
                  <?php  } ?>
                  <?php if (get_field('twitter') != NULL) { ?>                
                    <a target="_blank" class="btn btn-default btn-lg btn-block btn-biography" onclick="acerca();" href="<?php the_field('twitter'); ?>" >TWITTER</a>
                  <?php  } ?>  
                  <?php if (get_field('google_plus') != NULL) { ?>                
                    <a target="_blank" class="btn btn-default btn-lg btn-block btn-biography" onclick="acerca();" href="<?php the_field('google_plus'); ?>" >GOOGLE</a>
                  <?php  } ?>                                  
                  <?php if (get_field('youtube') != NULL) { ?>  
                    <a target="_blank" class="btn btn-default btn-lg btn-block btn-biography" onclick="acerca();" href="<?php the_field('youtube'); ?>" >YOUTUBE</a>
                  <?php  } ?>
                  <a class="btn btn-default btn-lg btn-block btn-send-message-email" target="_blank" href="mailto:<?php the_field('email'); ?>">EMAIL</a>

                </div>
              </div>

              <div class="profile-overview hidden-xs text-center">
                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('ano_de_nacimiento'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">Año de nacimiento</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('altura'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">Altura</div>
                  </div>
                </div>

                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('peso_competicion'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">Peso competición</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('peso_fuera_de_competicion'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">Peso fuera de competición</div>
                  </div>
                </div>

                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('pr_sentadilla'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">PR Sentadilla</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('pr_peso_muerto'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">PR Peso muerto</div>
                  </div>
                </div>

                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('pr_press_banca'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">PR Press banca</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('pr_dominada'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">PR Dominada</div>
                  </div>
                </div>
              </div>
              <div class="panel-group visible-xs" id="accordion1" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" >
                      <h4 class="panel-title text-center"><div data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">Ver más <span class="caret"></span> </div></h4>
                      </div>
                    <div id="collapseTwo1" class="panel-collapse collapse">
                        <div class="booking-info">
                            <div class="profile-action">
                              <a onclick="acerca();" class="btn btn-default btn-lg btn-block btn-biography" href="#tab-acerca" data-toggle="tab" role="tab" aria-controls="tab6">BIOGRAFÍA</a>
                              <a class="btn btn-default btn-lg btn-block btn-send-message-email" href="<?php the_field('enviar_mensaje'); ?>">ENVIAR MENSAJE</a>
                            </div>
                          </div>
            
                          <div class="profile-overview text-center">
                          <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('ano_de_nacimiento'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">Año de nacimiento</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('altura'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">Altura</div>
                  </div>
                </div>

                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('peso_competicion'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">Peso competición</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('peso_fuera_de_competicion'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">Peso fuera de competición</div>
                  </div>
                </div>

                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('pr_sentadilla'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">PR Sentadilla</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('pr_peso_muerto'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">PR Peso muerto</div>
                  </div>
                </div>

                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('pr_press_banca'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">PR Press banca</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('pr_dominada'); ?></h4>
                    <div style="    color: rgba(0, 0, 0, 0.47843137254901963);">PR Dominada</div>
                  </div>
                </div>
                          </div>
            
                          <div class="social-profile">
                            <div class="row">

                              <div class="col-md-6 col-sm-12 col-xs-6">
                                <a class="btn btn-default btn-lg btn-block btn-link-social" href="<?php the_field('instagram'); ?>">Instagram</a>
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-6">
                                <a class="btn btn-default btn-lg btn-block btn-link-social" href="<?php the_field('Facebook'); ?>">Facebook</a>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  
              </div>

            </div>
          </div>

        <div class="container">
          <div class="col-md-9 col-sm-9" id="acerca">
            <div>
                <div class="content-programas">
                  <div class="profile-content-section">
                    <h4 class="profile-content-title">BIOGRAFÍA</h4>
                       <?php echo $acerca; ?>
                  </div>
                </div>
            </div>            
          </div>

          <div class="col-md-9 col-sm-9" id="tabContent1" style="display:none">
           <!-- código para mostrar content -->
            <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade" id="tab-asesoria">
            <div class="content-asesoria">
          
            <div class="profile-content-section">
              <h4 class="profile-content-title">ASESORAMIENTO PERSONALIZADO</h4>

              <div class="shop-content">
                <div class="row">



                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'asesorias', 'meta_key' => 'entrenador', 'meta_value' => $id_p ); ?>
                <?php $loop = new WP_Query( $args ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?> 
                <?php $id_pro = get_the_ID(); ?>            
                    <div class="col-md-5 col-sm-8 col-xs-12">
                        <div class="item-shop">
                            <a href="<?php the_permalink() ?>">
                                <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title(); ?>">
                                <div class="info-item-shop">
                                    <p class="details-item-shop">Duración de 4 semanas</p>
                                    <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                    <div class="row">
                                        
                                        <div class="col-md-12 text-right">
                                          <span class="price-item-shop"><?php echo $product->get_price_html(); ?></span>
                                        </div>
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


                </div>
              </div>

            </div>

          
           </div>
           </div>


            <div role="tabpanel" class="tab-pane fade" id="tab-programas">
            <div class="content-programas">
          
            <div class="profile-content-section">
              <h4 class="profile-content-title">PROGRAMAS</h4>

              <div class="shop-content">
                <div class="row">
                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'programas', 'meta_key' => 'entrenador', 'meta_value' => $id_p ); ?>
                <?php $loop = new WP_Query( $args ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?> 
                <?php
                     $post_id = get_the_ID();
                     foreach((get_the_terms($post_id, 'duracion' )) as $category) 
                     {                
                          $categoria_pro = $category->name;               
                     } ?>              
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    
                      <div class="item-shop">
                       <a href="<?php the_permalink() ?>">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                        <div class="info-item-shop">
                          <p class="details-item-shop">Programa <?php echo $categoria_pro; ?></p>
                          <h5 class="title-item-shop"><span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                          <div class="row">
                            <div class="col-md-5"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles</a></span></div>
                            <div class="col-md-7 text-right"><span class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
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


                </div>
              </div>

            </div>

           <!-- codigo para mostrar content-->
           </div>
           </div>


            <div role="tabpanel" class="tab-pane fade" id="tab-ebooks">
            <div class="content-programas">
          
            <div class="profile-content-section">
              <h4 class="profile-content-title">EBOOKS</h4>

              <div class="shop-content">
                <div class="row">
                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'ebooks', 'meta_key' => 'entrenador', 'meta_value' => $id_p ); ?>
                <?php $loop = new WP_Query( $args ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>                 
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    
                      <div class="item-shop">
                       <a href="<?php the_permalink() ?>">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                        <div class="info-item-shop">
                          <h5 class="title-item-shop"><span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                          <div class="row">
                            <div class="col-md-5"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles</a></span></div>
                            <div class="col-md-7 text-right"><span class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
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


                </div>
              </div>

            </div>

           <!-- codigo para mostrar content-->
           </div>
           </div>


       


            <div role="tabpanel" class="tab-pane fade" id="tab-analize">
            <div class="content-analize">
          
            <div class="profile-content-section">
              <h4 class="profile-content-title">ANALIZO TU TÉCNICA</h4>

              <div class="shop-content">
                <div class="row">
                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'analizo_tu_tecnica', 'meta_key' => 'entrenador', 'meta_value' => $id_p ); ?>
                <?php $loop = new WP_Query( $args ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>                 
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    
                      <div class="item-shop">
                       <a href="<?php the_permalink() ?>">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                        <div class="info-item-shop">
                          <p class="details-item-shop"><?php echo short_description($id_pro); ?></p>
                          <h5 class="title-item-shop"><span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                          <div class="row">
                            <div class="col-md-5"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles</a></span></div>
                            <div class="col-md-7 text-right"><span class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
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


                </div>
              </div>

            </div>

           <!-- codigo para mostrar content-->
           </div>
           </div>



           <!-- fin -->
            </div>          
        </div>




          </div>

          <div class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3">
            <div class="reviews-content-profile">
              <h4 class="profile-content-title">COMENTARIOS</h4>
              <?php comments_template(); ?>
              
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>
    <div class="main-suscribe-members">
        <div class="title-section text-center">
            <h2>RECIBE DEMOS EXCLUSIVOS PBO</h2>
            <p>Únete a los miembros exclusivos de PBO recibirás gratis rutinas, programas y mucho más.</p>
          </div>
          <div style="max-width: 600px;margin: 0 auto;">
              <iframe class="mj-w-res-iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://app.mailjet.com/widget/iframe/4qCC/jZj" width="100%"></iframe>
              </div>
    </div>
  <script type="text/javascript">
  function acerca(){ 
            div = document.getElementById('acerca');
            div.style.display = 'inline';
            div2 = document.getElementById('tabContent1');
            div2.style.display = 'none';           
  }  
  function tabContent1(){ 
             div = document.getElementById('acerca');
            div.style.display = 'none';
            div2 = document.getElementById('tabContent1');
            div2.style.display = 'inline';
  }
  </script>