<?php  get_header(); ?>
 <?php
              global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE slug = 'tienda'"); 
              foreach($result_link as $r)
              {
                      $id_cat = $r->term_id;
              }
 ?>
     <section id="search-page">

        <div class="hero-search">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="the-title-search-page text-center">
                            <h1>BUSCADOR - <br class="visible-xs">
                                <span id="keywords" class="color-primary-1"> Ingrese su búsqueda...</span> 
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container search-in">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12">
                    <div class="search-blog">
                        <form class="navbar-form navbar-right" id="ajax-form" method="post" action="">
                            <div class="form-group">
                                <input  name="cat" id="cat" value="productos" class="form-control" type="hidden">
                                <input type="text" class="form-control" name="cadena" id="cadena" placeholder="Buscar productos...">
                            </div>
                            <button type="submit" class="btn btn-default" onclick="loader();"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-search.svg"
                                    alt="">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="posts_container" style="min-height: 300px"><div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">
    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.base}}"
        ng-attr-stroke-width="{{config.width}}" fill="none" r="30" stroke="#ffffff" stroke-width="10"></circle>
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

    </section>

    <section id="btn-top">
        <span class="ir-arriba glyphicon glyphicon-chevron-up">
        </span>
    </section>


<?php  get_footer(); ?>    