  <?php
              // one
              $id_p = get_the_ID();
              global $wpdb;  
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

     <div class="subnav">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-sm-offset-3 col-xs-12">
            <ul class="nav nav-pills subnav-profile">
              <li><a href="#tab-asesoria" data-toggle="tab" role="tab" aria-controls="tab2">ASESORÍAS</a></li>
              <li><a href="#tab-programas" data-toggle="tab" role="tab" aria-controls="tab3">PROGRAMAS</a></li>
              <li><a href="#tab-ebooks" data-toggle="tab" role="tab" aria-controls="tab4">EBOOKS</a></li>
              <li><a href="">ANALIZO TU TÉCNICA</a></li>
            </ul>
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
                <img class="img-responsive" src="<?php the_post_thumbnail_url('medium');?>">
              </div>

              <div class="booking-info hidden-xs">
                <div class="profile-action">                
                  <a class="btn btn-default btn-lg btn-block btn-biography" href="#tab-acerca" data-toggle="tab" role="tab" aria-controls="tab0">ACERCA DEL ENTRENADOR</a>
                  <a class="btn btn-default btn-lg btn-block btn-send-message-email" href="">ENVIAR MENSAJE</a>
                </div>
              </div>

              <div class="profile-overview hidden-xs text-center">
                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('plazas_libres'); ?></h4>
                    <div class="pb-label">Plazas libres</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('programas'); ?></h4>
                    <div class="pb-label">Programas</div>
                  </div>
                </div>

                <div class="row basic-block">
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('asesorados'); ?></h4>
                    <div class="pb-label">Asesorados</div>
                  </div>
                  <div class="col-xs-6 item-block-overview" href="">
                    <h4><?php the_field('adaptabilidad'); ?></h4>
                    <div class="pb-label">Adaptabilidad</div>
                  </div>
                </div>
              </div>

              <div class="social-profile hidden-xs">
                <div class="row">
                  <?php if (get_field('facebook') != NULL) { ?>  
                  <div class="col-md-6 col-sm-12 col-xs-6">
                    <a class="btn btn-default btn-lg btn-block btn-link-social" href="<?php the_field('facebook'); ?>" target="blank">Facebook</a>
                  </div>
                  <?php  } ?>                
                  <?php if (get_field('instagram') != NULL) { ?>                
                  <div class="col-md-6 col-sm-12 col-xs-6">
                    <a class="btn btn-default btn-lg btn-block btn-link-social" href="<?php the_field('instagram'); ?>" target="blank">Instagram</a>
                  </div>
                  <?php  } ?>
                  <?php if (get_field('twitter') != NULL) { ?>                
                  <div class="col-md-6 col-sm-12 col-xs-6">
                    <a class="btn btn-default btn-lg btn-block btn-link-social" href="<?php the_field('twitter'); ?>" target="blank">Twitter</a>
                  </div>
                  <?php  } ?>  
                  <?php if (get_field('google_plus') != NULL) { ?>                
                  <div class="col-md-6 col-sm-12 col-xs-6">
                    <a class="btn btn-default btn-lg btn-block btn-link-social" href="<?php the_field('google_plus'); ?>" target="blank">Google +</a>
                  </div>
                  <?php  } ?>                                  
                  <?php if (get_field('youtube') != NULL) { ?>  
                  <div class="col-md-6 col-sm-12 col-xs-6">
                    <a class="btn btn-default btn-lg btn-block btn-link-social" href="<?php the_field('youtube'); ?>" target="blank">Youtube</a>
                  </div>
                  <?php  } ?>
                  <?php if (get_field('email') != NULL) { ?>  
                  <div class="col-md-6 col-sm-12 col-xs-6">
                    <a class="btn btn-default btn-lg btn-block btn-link-social" href="<?php the_field('email'); ?>" target="blank">Email</a>
                  </div>
                  <?php  } ?>                  
                </div>
              </div>

              <div class="panel-group visible-xs" id="accordion1" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" >
                      <h4 class="panel-title text-center"><div data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">Ver más del entrenador <span class="caret"></span> </div></h4>
                      </div>
                    <div id="collapseTwo1" class="panel-collapse collapse">
                        <div class="booking-info">
                            <div class="profile-action">
                              <a class="btn btn-default btn-lg btn-block btn-biography" href="">ACERCA DEL ENTRENADOR</a>
                              <a class="btn btn-default btn-lg btn-block btn-send-message-email" href="">ENVIAR MENSAJE</a>
                            </div>
                          </div>
            
                          <div class="profile-overview text-center">
                            <div class="row basic-block">
                              <div class="col-xs-6 item-block-overview" href="">
                                <h4><?php the_field('plazas_libres'); ?></h4>
                                <div class="pb-label">Plazas libres</div>
                              </div>
                              <div class="col-xs-6 item-block-overview" href="">
                                <h4><?php the_field('programas'); ?></h4>
                                <div class="pb-label">Programas</div>
                              </div>
                            </div>
            
                            <div class="row basic-block">
                              <div class="col-xs-6 item-block-overview" href="">
                                <h4><?php the_field('asesorados'); ?></h4>
                                <div class="pb-label">Asesorados</div>
                              </div>
                              <div class="col-xs-6 item-block-overview" href="">
                                <h4><?php the_field('adaptabilidad'); ?></h4>
                                <div class="pb-label">Adaptabilidad</div>
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

          <div class="col-md-9 col-sm-9">
           <!-- código para mostrar content -->
            <div id="tabContent1" class="tab-content">

            <div role="tabpanel" class="tab-pane fade  in active" id="tab-acerca">
            <div class="row content-acerca">
          
            <div class="profile-content-section">
              <h4 class="profile-content-title">ACERCA DEL ENTRENADOR</h4>

              <?php the_content(); ?>
              <?php the_excerpt(); ?>
            </div>

           <!-- codigo para mostrar content-->
           </div>
           </div>

            <div role="tabpanel" class="tab-pane fade" id="tab-asesoria">
            <div class="row content-asesoria">
          
            <div class="profile-content-section">
              <h4 class="profile-content-title">ASESORAMIENTO PERSONALIZADO</h4>




              <div class="shop-content">
                <div class="row">



                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'asesorias', 'meta_key' => 'entrenador', 'meta_value' => $id_p ); ?>
                <?php $loop = new WP_Query( $args ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>                 
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    
                      <div class="item-shop">
                       <!--<a href="">-->
                        <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="">
                        <div class="info-item-shop">
                          <p class="details-item-shop">Entrenamiento + Dieta</p>
                          <h5 class="title-item-shop"><span class="no-bold"><?php the_title(); ?></h5>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles</a></span></div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right"><span class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
                          </div>
                          <span>
                            <form action="">
                              <button class="btn-add-to-bag text-center">
                                  <span class="icon-add-to-bag"><img src="<?php echo get_bloginfo('template_directory') ?>/images/icons/icon-bag.svg" alt="Add to bag"></span> AGREGAR A LA BOLSA
                              </button>
                            </form>
                          </span>


                        </div>
                      <!--</a>-->
                      </div>                    
                  </div>
                  <?php endwhile; ?>


                </div>
              </div>

            </div>

          
           </div>
           </div>


            <div role="tabpanel" class="tab-pane fade" id="tab-programas">
            <div class="row content-programas">
          
            <div class="profile-content-section">
              <h4 class="profile-content-title">PROGRAMAS</h4>

              <div class="shop-content">
                <div class="row">

                <?php $args = array( 'post_type' => 'product', 'product_cat' => 'programas', 'meta_key' => 'entrenador', 'meta_value' => $id_p ); ?>
                <?php $loop = new WP_Query( $args ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>                 
                  <div class="col-md-4 col-sm-6 col-xs-12">
                   
                      <div class="item-shop-category-squirrel-asesorias">
                    <!--   <a href="">-->

                        <img class="img-responsive" src="<?php the_post_thumbnail_url('medium');?>" alt="">
                     
                        <div class="info-item-shop">
                          <p class="details-item-shop">post_excerpt<?php the_excerpt(); ?></p>
                          <h5 class="title-item-shop"><span class="no-bold"><?php the_title(); ?></h5>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6"><a href="<?php the_permalink() ?>"><span class="view-details">Ver detalles</span></a></div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right"><span class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
                          </div>
                          <span>
                            <form action="">
                              <button class="btn-add-to-bag text-center">
                                + AGREGAR A LA BOLSA
                              </button>
                            </form>
                          </span>


                        </div>
                    <!--  </a> -->
                      </div>
                    
                  </div>
                  <?php endwhile; ?>


                </div>
              </div>

            </div>

           <!-- codigo para mostrar content-->
           </div>
           </div>





           </div>
           <!-- fin -->
            </div>




          </div>

          <div class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3">
            <div class="reviews-content-profile">
              <h4 class="profile-content-title">COMENTARIOS</h4>
              <?php comments_template(); ?>
              <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/images/coments.png" alt="" style="margin-top: 50px;">
            </div>
          </div>

        </div>

      </div>
    </div>


  </section>