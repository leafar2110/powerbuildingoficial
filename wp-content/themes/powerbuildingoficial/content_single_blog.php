<?php

get_header(); ?>

    <section id="blog-item-page" class="blog-news margin-top-page">
      <?php
              global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE slug = 'blog'"); 
              foreach($result_link as $r)
              {
                      $id_cat = $r->term_id;
              }
      ?>        
      <?php while ( have_posts() ) : the_post(); ?>
      	<?php $id = get_the_ID(); $post_thumbnail_id = get_post_thumbnail_id( $id );  
                $url = wp_get_attachment_url( $post_thumbnail_id);
                     $post_id = get_the_ID();
                     foreach((get_the_terms($post_id, 'category' )) as $category) 
                     {                
                          $categoria = $category->name;       
                          $category_id = $category->term_id;           
                     }
                     $category_link = get_category_link( $category_id );
                ?>
        <div class="item-page-blog-bk new-item-6 no-padding">

            <div class="new-item-6-img">
                <span id="cb-media-bg"></span>
                <img class="img-100" src="<?php echo $url; ?>" alt="">
            </div>

            <div class="new-item-6-meta">
                <h2 class="new-item-6-title" style="color: #ffffff;">
                    <?php the_title() ?>
                </h2>
                <div class="details-item-blog">
                    <div class="author-detail">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-autor-white.svg" />
                        <?php the_author_posts_link(); ?>
                    </div>
                    <div class="date-detail">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-clock-white.svg" />
                        <span style="color: #ffffff;"><?php the_time(get_option('date_format')); ?></span>
                    </div>
                    <div class="category-detail">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-file-white.svg" />
                        <a href="<?php echo $category_link; ?>"><?php  echo $categoria; ?></a>
                    </div>
                </div>

            </div>

        </div>

        <div class="container">
            <div class="max-width-900">

                <div class="content-blog-item-page">
                    <?php the_content(); ?>
                </div>
                <div class="content-blog-item-page">

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix" id="comments">
                            <h4 class="title"><?php echo get_comments_number() ?> Comentarios</h4>
                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                 <?php    if ( comments_open() || get_comments_number() ) :
                                 comments_template();
                                 endif;  ?>
                                    </div>
                                </li>
                            </ol>
                        </div>

                </div>                

                <div class="posts-relacionados">
                    <!-- SOLAMENTE 2 POST DE LA MISMA CATEGORÍA -->
                    <h4 class="text-center">POSTS RELACIONADOS</h4>
                    <div class="new-blog">
                        <div class="row">
                              <!-- Single Post -->
                        <?php $terms = get_the_terms( get_the_ID(), 'category'); $categ = array();
                            $loop   = new WP_QUERY(array(
                                'category__in'      => $categ,
                                'posts_per_page'    => 2,
                                'post__not_in'      =>array(get_the_ID()),
                                'orderby'           =>'rand'
                            ));

                            if ( $loop->have_posts() ){ while ( $loop->have_posts() ){ $loop->the_post();
                               $post_thumbnail_id = get_post_thumbnail_id( $loop->id );  
                               $url = wp_get_attachment_url( $post_thumbnail_id);

                                ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 new-item-6 no-padding">

                                <div class="new-item-6-img">
                                    <a href="">
                                        <img class="new-item-img-zoom" src="<?php echo $url; ?>" alt="">
                                    </a>
                                </div>

                                <div class="new-item-6-meta">

                                    <h2 class="new-item-4-title">
                                        <a href=""><?php the_title() ?></a>
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
                                    </div>

                                </div>

                                <a class="link-new-item-blog" href="<?php the_permalink();  ?>"></a>

                            </div>
                        <?php   }}  wp_reset_query();?>
  

                        </div>
                    </div>

                </div>

                <div class="post-share-social">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12 text-center">
                                <h4>COMPARTIR EN: </h4>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                                 <a href=""><img style="margin: 10px;" src="<?php echo get_template_directory_uri(); ?>/images/icon share facebook.png" alt="" width="60"></a>
                                 <a href=""></a><img src="<?php echo get_template_directory_uri(); ?>/images/TwitterShareButton.png" alt="" width="70" height="auto"></a>
                         </div>
                            
                    </div>
                </div>
   
                <div class="others-category">
                        <h4 class="text-center">OTRAS CATEGORIAS</h4>

                        <ul class="nav nav-pills subnav-categories">
                               <?php $categories =  get_categories("child_of=$id_cat");?>
                               <?php foreach($categories as $category): ?>
                               <?php $categoria = $category->name; ?> 
                               <?php $category_id = $category->term_id; $category_link = get_category_link( $category_id );?>                            
                                  <li><a href="<?= $category_link ?>"><?= $categoria ?></a></li>
                               <?php endforeach; ?>
                        </ul>
                </div>

            </div>
        </div>
      <?php endwhile; // end of the loop. ?>
    </section>
    <section id="btn-top">
            <span class="ir-arriba glyphicon glyphicon-chevron-up">
            </span>
    </section>


<?php get_footer(); ?>