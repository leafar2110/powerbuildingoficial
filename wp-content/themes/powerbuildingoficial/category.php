<?php
/**
* A Simple Category Template
*/
get_header(); 


$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;
$categoria = $category->name;
$category_link = get_category_link( $cat_id );
?> 
    <section id="blog-category-page">

        <div class="hero-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="the-title-category-page text-center">
                            <h1>BLOG CATEGORÍA - <br class="visible-xs"> <span class="color-primary-1"> <?php echo $categoria; ?>
                                </span> </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container search-in-category">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12">
                    <div class="search-blog">
                        <form class="navbar-form navbar-right" id="ajax-form" method="post" action="">
                            <div class="form-group">
                                <input  name="cat" id="cat" value="<?php echo $categoria; ?>" class="form-control" type="hidden">
                                <input type="text" name="cadena" id="cadena" class="form-control" placeholder="Buscar en el blog...">                              
                            </div>
                            <button type="submit" name="enviar" value="enviar" class="btn btn-default" onclick="Activarbuscaentre();"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-search.svg"
                                        alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog">
            <div class="container" id="tabContent1">
                <div class="items-blog">
                    <div class="row">
      <?php 
      $new_query = new WP_Query();
      $new_query->query('post_type=post'.'&paged='.$paged.'&cat='.$cat_id);

     if ( $wp_query -> have_posts() ) : while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>

                       <div class="col-md-4 col-sm-6 col-xs-12 item-blog">
                            <div class="imagen-blog">
                                <a href="<?php echo the_permalink() ?>">
                                    <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title() ?>" />
                                </a>
                            </div>

                            <div class="content-item-blog">
                                <a href="<?php echo the_permalink() ?>">
                                    <h4><?php the_title() ?></h4>
                                </a>
                                <div class="details-item-blog row">
                                    <div class="author-detail">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor.svg" />
                                         <?php the_author_posts_link(); ?>
                                    </div>
                                    <div class="date-detail">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock.svg" />
                                        <a href=""><?php the_time(get_option('date_format')); ?></a>
                                    </div>
                                    <div class="category-detail">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file.svg" />
                                        <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                                    </div>
                                </div>
                                
                                <div class="descrition-item-blog">
                                   <?php the_excerpt();  ?>
                                </div>
                            </div>
                        </div>
  <?php endwhile; 
endif;?>
<div class="pagination">
    <div id="pagination">

       <?php $max_page = $wp_query->max_num_pages;
        if (!$paged && $max_page >= 1) {
            $current_page = 1;
        }
        else {
            $current_page = $paged;
        } ?>
     <div class="page-nav fix">
     <span class="page-index"><?php printf(__('P&aacute;gina %1$s de %2$s'), $current_page, $max_page); ?></span>
     <div class="suf-page-nav fix">
 <?php echo paginate_links(array(
 "base" => add_query_arg("paged", "%#%"),
 "format" => '',
 "type" => "plain",
 "total" => $max_page,
 "current" => $current_page,
 "show_all" => false,
 "end_size" => 2,
 "mid_size" => 2,
 "prev_next" => true,
 "next_text" => __('&rArr;'),
 "prev_text" => __('&lArr;'),
 )); ?>

    </div>
</div>
</div>
  </div>
  </div>
                        

                    </div>
                </div>
            </div>
            <div id="posts_container" class="container"><div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">
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

<script>
$('#pagination a').on('click', function(event){
event.preventDefault();
var link = $(this).attr('href'); //Get the href attribute
$('#content').fadeOut(500, function(){ });//fade out the content area
$('#content').load(link + ' #content', function() { });
$('#content').fadeIn(500, function(){ });//fade in the content area

});
</script>
<?php get_footer(); ?>