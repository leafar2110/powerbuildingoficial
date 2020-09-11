 <?php  get_header(); ?>
 <?php
              global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE slug = 'blog'"); 
              foreach($result_link as $r)
              {
                      $id_cat = $r->term_id;
              }
 ?>
<section id="blog" class="blog-news margin-top-page">
        <div class="container">

            <div class="title-page text-center">
                <h1>Bienvenido a nuestro Blog</h1>
            </div>

            <div class="menu-blog">
                <div class="row">
                    <div class="col-md-8 col-sm-12 hidden-xs">
                        <div class="subnav">

                            <ul class="nav nav-pills subnav-blog">
                                 <li><a href="#tab-todos" class="" data-toggle="tab" role="tab" aria-controls="tab1" onclick="Activarentre();">Todos</a></li>  
                                 <li><a href="#tab-biografia" class="active" data-toggle="tab" role="tab" aria-controls="tab1" onclick="Activarentre();">Biografia</a></li>  
                               <?php $i=0; ?>
                               <?php $categories =  get_categories("child_of=$id_cat");?>
                               <?php foreach($categories as $category): ?>
                               <?php $categoria = $category->name; ?> 
                                 <li><a href="#tab-<?= $categoria ?>" data-toggle="tab" role="tab" aria-controls="tab1" onclick="Activarentre();"><?= $categoria ?></a></li>   
                               <?php $i=$i+1;?>
                               <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-group visible-xs" id="accordion-menu-blog" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                          <div class="panel-heading" >
                              <div data-toggle="collapse" data-parent="#accordion-menu-blog" href="#collapse-menu-blog"><h4 class="panel-title text-center">Categorías del blog <span class="caret"></span> </h4></div>
                          </div>
                          <div id="collapse-menu-blog" class="panel-collapse collapse">
                              <ul class="nav subnav-blog">
                                 <li><a href="#tab-todos" class="" data-toggle="tab" role="tab" aria-controls="tab1" onclick="Activarblog();">Todos</a></li>   
                                  <li><a href="#tab-biografia" class="active" data-toggle="tab" role="tab" aria-controls="tab1" onclick="Activarblog();">Biografias</a></li>  
                               <?php $i=0; ?>
                               <?php $categories =  get_categories("child_of=$id_cat");?>
                               <?php foreach($categories as $category): ?>
                               <?php $categoria = $category->name; ?> 
                                 <li><a href="#tab-<?= $categoria ?>" data-toggle="tab" role="tab" aria-controls="tab1" onclick="Activarblog();"><?= $categoria ?></a></li>   
                               <?php $i=$i+1;?>
                               <?php endforeach; ?>
                              </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                      
                    </div>

                </div>
            </div>
        </div>
      </section>      


<section id="blog" class="blog-news" style="min-height:300px">
<div role="tabpanel">
<div id="tabContent1" class="tab-content"> 


<div role="tabpanel" class="tab-pane fade in " id="tab-todos">
  <div class="row content-todos">
    <div class="container">
      <div class="new-blog">
        <div class="row">
          <?php 
          $conta = 0;
      $wp_query = new WP_Query();
      $wp_query->query('post_type=post'.'&paged='.$paged.'&cat='.$id_cat);

     if ( $wp_query -> have_posts() ) : while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
                     $post_id = get_the_ID();
                     foreach((get_the_terms($post_id, 'category' )) as $category) 
                     {                
                          $categoria = $category->name;       
                          $category_id = $category->term_id;           
                     }
                     $category_link = get_category_link( $category_id );     
            $post_thumbnail_id = get_post_thumbnail_id( $wp_query->id );  
            $url = wp_get_attachment_url( $post_thumbnail_id);

            ?>
                    <?php  if ($conta<2){ ?>

                    <div class="col-md-6 col-sm-6 new-item-6 no-padding">

                        <div class="new-item-6-img">

                          <a href="<?php echo the_permalink() ?>">
                            <img data-lazy-type="image" class="new-item-img-zoom lazy-hidden" src="//powerbuildingoficial.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-src="<?php echo $url ?>" width="" height="" alt="<?php the_title(); ?>">
                          </a>
                        </div>
     
                     <div class="new-item-6-meta">
     
                         <h2 class="new-item-6-title">
                           <a href="<?php the_permalink();  ?>"><?php the_title() ?> </a>
                         </h2>
                  
                         <div class="details-item-blog">
                             <div class="author-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor-white.svg" />
                               <?php the_author_posts_link(); ?>
                             </div>
                             <div class="date-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock-white.svg" />
                               <a href=""><?php the_time(get_option('date_format')); ?></a>
                             </div>
                             <div class="category-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file-white.svg" />
                               <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                             </div>
                         </div>
 
                     </div>
 
                     <a class="link-new-item-blog" href="<?php the_permalink();  ?>"></a>
 
                    </div>                    
                    <?php  }  ?>                
                    <?php  if ($conta>=2 AND $conta <5){ ?>
                    <div class="col-md-4 col-sm-6 new-item-6 no-padding">
                        <div class="new-item-6-img">
                          <a href="<?php echo the_permalink() ?>">
                            <img data-lazy-type="image" class="new-item-img-zoom lazy-hidden" src="//powerbuildingoficial.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-src="<?php echo $url ?>" width="" height="" alt="<?php the_title(); ?>">
                          </a>
                        </div>     
                     <div class="new-item-6-meta">     
                         <h2 class="new-item-4-title">
                           <a href="<?php echo the_permalink() ?>"><?php the_title() ?></a>
                         </h2>
                  
                         <div class="details-item-blog">
                             <div class="author-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor-white.svg" />
                               <?php the_author_posts_link(); ?>
                             </div>
                             <div class="date-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock-white.svg" />
                               <a href=""><?php the_time(get_option('date_format')); ?></a>
                             </div>
                             <div class="category-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file-white.svg" />
                               <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                             </div>
                         </div>
 
                     </div> 
                     <a class="link-new-item-blog" href="<?php echo the_permalink() ?>"></a> 
                    </div>
                    <div class="visible-sm clearfix"></div>
                     <?php  }  ?> 
                      <div class="visible-sm clearfix"></div>


                     <?php if($conta>=5) { ?>
          <div class="col-md-4 item-blog" style="margin-top:50px">
            <div class="imagen-blog">
              <a href="<?php the_permalink();  ?>">
                <?php the_post_thumbnail('', array('class' => 'img-responsive'));  ?>
              </a>
            </div>

            <div class="content-item-blog">
              <a href="<?php the_permalink();  ?>"><h4><?php the_title(); ?></h4></a>
              <div class="details-item-blog row">
                  <div class="author-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor.svg" />
                    <?php the_author_posts_link(); ?>
                  </div>
                  <div class="date-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock.svg" />
                    <a><?php the_time(get_option('date_format')); ?> </a>
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

                     <?php } ?>
                    <?php $conta++; endwhile;endif; ?>                  
        </div>
      </div>
    </div>
  </div>
</div> 

<div role="tabpanel" class="tab-pane in active" id="tab-biografia">
  <div class=" content-todos">
    <div class="container"  style="overflow-x:hidden;">
      <div class="new-blog">
        <div class="" id="style-2" style="display:flex;overflow-x:scroll;">
<style>
                        #style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar
{
	width: 3px !important;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #c9272f;
}

.content-images__biografia{
	width:250px;
}

@media only screen and (max-width: 767px) {
    .content-images__biografia{
        width:230px;
    }
}
                        
                        
                        </style>

 <?php
                           $argsBanner = array( 'post_type' => 'entrenador', 'post_per_page' => 7); 
                           $Banners = new WP_Query($argsBanner);   
                           if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                               $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                               $url = wp_get_attachment_url( $post_thumbnail_id);
                         ?>                             
                             <div class="slider-item pr-2" style="padding-bottom: 25px; padding: 10px;">
                                <div class="trainer-item-page">
                                     <a href="<?php echo the_permalink() ?>" class="content-images__biografia" style="width: 250px;">
                                     
                                         <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                                         <h4 class="name-trainer-item-page"><?php the_title(); ?></h4>
                                     
                                     </a>
                                </div>
                             </div>
                         <?php endwhile; endif; ?>              

            
        </div>
      </div>
                                                     <div class="new-blog">
        <div class="" id="style-2" style="display:flex;overflow-x:scroll;">
<style>
                        #style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar
{
	width: 3px !important;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #c9272f;
}

.content-images__biografia{
	width:250px;
}

@media only screen and (max-width: 767px) {
    .content-images__biografia{
        width:230px;
    }
}
                        
                        
                        </style>

 <?php
                           $argsBanner = array( 'post_type' => 'entrenador', 'post_per_page' => 7, 'order' => 'ASC'); 
                           $Banners = new WP_Query($argsBanner);   
                           if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                               $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                               $url = wp_get_attachment_url( $post_thumbnail_id);
                         ?>                             
                             <div class="slider-item pr-2" style="padding-bottom: 25px; padding: 10px;">
                                <div class="trainer-item-page">
                                     <a href="<?php echo the_permalink() ?>" class="content-images__biografia" style="width: 250px;">
                                     
                                         <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                                         <h4 class="name-trainer-item-page"><?php the_title(); ?></h4>
                                     
                                     </a>
                                </div>
                             </div>
                         <?php endwhile; endif; ?>              

            
        </div>
      </div>
                              <div class="new-blog">
        <div class="" id="style-2" style="display:flex;overflow-x:scroll;">
<style>
                        #style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar
{
	width: 3px !important;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #c9272f;
}

.content-images__biografia{
	width:250px;
}

@media only screen and (max-width: 767px) {
    .content-images__biografia{
        width:230px;
    }
}
                        
                        
                        </style>

 <?php
                           $argsBanner = array( 'post_type' => 'entrenador', 'post_per_page' => 7, 'orderby' => 'rand'); 
                           $Banners = new WP_Query($argsBanner);   
                           if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                               $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                               $url = wp_get_attachment_url( $post_thumbnail_id);
                         ?>                             
                             <div class="slider-item pr-2" style="padding-bottom: 25px; padding: 10px;">
                                <div class="trainer-item-page">
                                     <a href="<?php echo the_permalink() ?>" class="content-images__biografia" style="width: 250px;">
                                     
                                         <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                                         <h4 class="name-trainer-item-page"><?php the_title(); ?></h4>
                                     
                                     </a>
                                </div>
                             </div>
                         <?php endwhile; endif; ?>              

            
        </div>
      </div>
    </div>
  </div>
</div> 



<?php $act = 0; $cont=0;?> 
<?php $categories =  get_categories("child_of=$id_cat");?>
<?php foreach($categories as $category): ?>
<?php $categoria = $category->name; ?>

<div role="tabpanel" class="tab-pane fade" id="tab-<?= $categoria ?>">
  <div class="row content-<?= $categoria ?>">
    <div class="container">
      <div class="new-blog">
        <div class="row">
          <?php 
          $x=0;$act = $act+1; $cont = 0;
      $wp_query = new WP_Query();
      $wp_query->query('post_type=post'.'&paged='.$paged.'&cat='.$id_cat);

     if ( $wp_query -> have_posts() ) : while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
            $post_thumbnail_id = get_post_thumbnail_id( $wp_query->id );  
            $url = wp_get_attachment_url( $post_thumbnail_id);
                
                 foreach((get_the_category()) as $category)
              { 
                   if ($category->category_parent == $id_cat) //id de la 
                   {    
                    if ($category->cat_name == $categoria) { 

                     $post_id = get_the_ID();
                     foreach((get_the_terms($post_id, 'category' )) as $category) 
                     {                
                          $categoria = $category->name;       
                          $category_id = $category->term_id;           
                     }
                     $category_link = get_category_link( $category_id );
                      ?>

                    <?php  if ($cont<2){ ?>

                    <div class="col-md-6 col-sm-6 new-item-6 no-padding">

                        <div class="new-item-6-img">

                          <a href="<?php echo the_permalink() ?>">
                            <img class="new-item-img-zoom" src="<?php echo $url ?>" width="" height="" alt="<?php the_title(); ?>">
                          </a>
                        </div>
     
                     <div class="new-item-6-meta">
     
                         <h2 class="new-item-6-title">
                           <a href="<?php the_permalink();  ?>"><?php the_title() ?></a>
                         </h2>
                  
                         <div class="details-item-blog">
                             <div class="author-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor-white.svg" />
                                <?php the_author_posts_link(); ?>
                             </div>
                             <div class="date-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock-white.svg" />
                               <a href=""><?php the_time(get_option('date_format')); ?></a>
                             </div>
                             <div class="category-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file-white.svg" />
                               <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                             </div>
                         </div>
 
                     </div>
 
                     <a class="link-new-item-blog" href="<?php the_permalink();  ?>"></a>
 
                    </div>                    
                    <?php  }  ?>                
                    <?php  if ($cont>=2 AND $cont <5){ ?>
                    <div class="col-md-4 col-sm-6 new-item-6 no-padding">
                        <div class="new-item-6-img">
                          <a href="<?php echo the_permalink() ?>">
                            <img class="new-item-img-zoom lazy-hidden" src="<?php echo $url ?>" width="" height="" alt="<?php the_title(); ?>">
                          </a>
                        </div>     
                     <div class="new-item-6-meta">     
                         <h2 class="new-item-4-title">
                           <a href="<?php echo the_permalink() ?>"><?php the_title() ?></a>
                         </h2>
                  
                         <div class="details-item-blog">
                             <div class="author-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor-white.svg" />
                               <?php the_author_posts_link(); ?>
                             </div>
                             <div class="date-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock-white.svg" />
                               <a href=""><?php the_time(get_option('date_format')); ?></a>
                             </div>
                             <div class="category-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file-white.svg" />
                               <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                             </div>
                         </div>
 
                     </div> 
                     <a class="link-new-item-blog" href="<?php echo the_permalink() ?>"></a> 
                    </div>
                    <div class="visible-sm clearfix"></div>
                     <?php  }  ?> 
                      <div class="visible-sm clearfix"></div>


                     <?php if($cont>=5) { ?>
          <div class="col-md-4 item-blog" style="margin-top:50px">
            <div class="imagen-blog">
              <a href="<?php the_permalink();  ?>">
                <?php the_post_thumbnail('', array('class' => 'img-responsive'));  ?>
              </a>
            </div>

            <div class="content-item-blog">
              <a href="<?php the_permalink();  ?>"><h4><?php the_title(); ?></h4></a>
              <div class="details-item-blog row">
                  <div class="author-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor.svg" />
                     <?php the_author_posts_link(); ?>
                  </div>
                  <div class="date-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock.svg" />
                    <a href=""><?php the_time(get_option('date_format')); ?> </a>
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

                     <?php } ?>

                     <?php $cont++; $x=$x+1; } } }   ?>                
                    <?php endwhile;endif; ?>                  
        </div>
      </div>
    </div>
  </div>
</div> 




<?php endforeach; ?>


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




<div id="posts_container" class="container"><div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

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
<?php  get_footer(); ?>