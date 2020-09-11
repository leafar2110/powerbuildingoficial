<?php
/**
* A Simple Author Template
*/
get_header(); 


$user_id = get_the_author_ID();
?> 
    <section id="blog-auto-page">

        <div class="hero-autor-profile">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="the-title-autor-page text-center">
                            <h1>AUTOR - <br class="visible-xs"> <span class="color-primary-1"><?php echo usermeta_value( 'first_name', $user_id ); ?> <?php echo usermeta_value( 'last_name', $user_id ); ?> </span> </h1>
                        </div>
                        <div class="autor-description-grado text-center">
                            <p><i class="glyphicon glyphicon-education"></i><?php echo usermeta_value( 'description', $user_id ); ?></p>
                        </div>
                        <div class="photo-autor-profile">
                            <center><?php $author_email = get_the_author_email(); echo get_avatar($author_email, '50'); ?></center>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="social-profile">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a class="btn btn-default btn-lg btn-block btn-link-social"
                                        href="mailto:<?php echo get_the_author_email(); ?>" target="blank">Enviar mensaje</a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a class="btn btn-default btn-lg btn-block btn-link-social"
                                        href="<?php echo usermeta_value( 'instagram_usuario', $user_id ); ?>" target="blank">Instagram</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="blog">
            <div class="container">
                <div class="items-blog">
                    <div class="row">
      <?php 
      $new_query = new WP_Query();
      $new_query->query('post_type=post'.'&paged='.$paged.'&post_author='.$user_id);

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
                        <div class="col-md-4 col-sm-6 col-xs-12 item-blog">
                            <div class="imagen-blog">
                                <a href="<?php echo the_permalink() ?>">
                                    <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title() ?>" />
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
                                        <span><?php the_time(get_option('date_format')); ?></span>
                                    </div>
                                    <div class="category-detail">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file.svg" />
                                        <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                                    </div>
                                </div>
                                
                                <idv class="descrition-item-blog">
                                   <?php the_excerpt();  ?>
                                </idv>
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