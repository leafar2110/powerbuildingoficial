<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<section style=" padding-top: 50px;">
	<div class="container">
		<?php if ( have_posts() ) : ?>			
	        <div class="container">
		        <div class="row">
                    <div class="col-lg-12 space-cat">
                        <h4 class="title-category"><?php printf( __( 'Resultados de la búsqueda para el término: %s', '' ), get_search_query() ); ?></h4>
                    </div>
				    <?php while ( have_posts() ) : the_post(); ?>
                                <div class="col-md-3">                        	
                                    <div class="single-blog-post style-3 single-effect">
                                        <!-- Post Thumb -->
        
        
                                        <div class="post-thumb post-effect">
                                            <a href="<?php the_permalink();?>"><img class="post-img" src="<?php         the_post_thumbnail_url('medium');?>" alt="<?php the_title(); ?>"></a>
                                        </div>
                                        <!-- Post Data -->
                                        <div class="post-data">
                                            <a href="<?php the_permalink();?>" class="post-title">
                                                <h6><?php the_title(); ?></h6>
                                            </a>
                                            <span><?php echo excerpt('15'); ?></span>
                                            <div class="post-meta">
                                                <p class="post-date"><?php echo get_the_date(); ?></p>
                                            </div>
                                        </div>
                               
                                    </div>
                                </div>
				<?php endwhile;
				else : ?>
					<p>No existen noticias relacionda con la búsqueda</p>
				<?php endif; ?>
			</div>
		</div>

	</div>
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
</section>

<?php

get_footer();
?>