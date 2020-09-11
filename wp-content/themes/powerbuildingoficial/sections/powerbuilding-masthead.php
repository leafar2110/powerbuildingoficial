<section id="powerbuilding-masthead">
      <div class="container">
          <?php
            global $wpdb;  
 
            $result_activar_votacion = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."options WHERE option_name = 'activar_activar_votacion'"); 
            foreach($result_activar_votacion as $r)
            {
                   $activar_votacion = $r->option_value;
            } 

            $result_fecha_votacion = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."options WHERE option_name = 'activar_fecha_votacion'"); 
            foreach($result_fecha_votacion as $r)
            {
                    $fecha_votacion = $r->option_value;
            }  
          $fecha_votacion= "$fecha_votacion 11:59 PM";

          if ($activar_votacion == 'Si') { 
   
        ?>            
           <div class="col-md-12" style="display:none;padding-bottom: 20px;color: #fff;box-shadow: 0px 9px 41px -2px rgba(0, 0, 0, 0.01) !important;"><center><span class="text-vota">VOTA A LA MEJOR FOTO DE LA SEMANA </span><a href="<?php bloginfo('url') ?>/index.php/votaciones" class="buttom-gradient-red votar-btn" >Votar </a></center></div> 
        <?php  }  ?>        
        <div class="flush">
          <div class="row">
   

            <div class="col-md-4 masthead-plans">
              <a href="<?php echo get_theme_mod('powerbuilding-masthead1_link'); ?>">
                <div class="text">
                  <?php echo get_theme_mod('powerbuilding-masthead1_contenido'); ?>
                </div>
              </a>
            </div>

            <div class="col-md-4 masthead-plans2">
              <a href="<?php echo get_theme_mod('powerbuilding-masthead2_link'); ?>">
                <div class="text">
                  <?php echo get_theme_mod('powerbuilding-masthead2_contenido'); ?>
                </div>
              </a>
            </div>

            <div class="col-md-4 masthead-button">
              <a href="<?php echo get_theme_mod('powerbuilding-masthead3_link'); ?>" class="buttom-gradient-red2 text-center">
                <?php echo get_theme_mod('powerbuilding-masthead3_contenido'); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
</section>