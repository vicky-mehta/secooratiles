<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php get_template_part('template_part/template_title',''); ?>
	<?php
        $curPage=get_the_ID();
        $categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );
		$series = (get_query_var('series')) ? get_query_var('series') : get_post_meta( get_the_ID(), 'tiles_series', true );
		$size = (get_query_var('size')) ? get_query_var('size') : get_post_meta( get_the_ID(), 'tiles_sizes', true );
        $category = get_category_by_slug($cat);
		$categories = get_the_category(get_the_ID());
		$cate_gory = $categories[0]->slug;			
    ?>

<?php include_once(locate_template('template_part/template_series_title.php')); //get_template_part('template_part/template_series_title',''); ?>
   

	<?php get_template_part('template_part/template_page_row_start',''); ?>
            <div class="col-md-9 col-md-push-3 clearfix">
                    <?php while ( have_posts() ) : the_post(); ?>
					  <?php if ( has_post_thumbnail() ) : ?>
                        <div class="news-img hide">
                          <figure class="wp-caption">
                            <?php the_post_thumbnail('large',array('class'=>'d-block m-auto img-fluid pb-4')); ?>
                            <figcaption class="wp-caption-text"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></figcaption>
                          </figure>
                        </div>  
                      <?php endif; ?>                       
                        <?php the_content(); ?>
                        <div class="concept-img clearfix">
                        	<div class="row">
                            	<div class="col-md-12">
									  <?php $_concept_tiles_upload=get_post_meta( get_the_ID(), '_concept_tiles_upload', true );  ?>
                                      <?php
									  if(!empty($_concept_tiles_upload)) :
                                            $thepost = $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $_concept_tiles_upload )); 
                                            $get_it_now__cover_ID = $thepost[0];
											echo '<div class="image-front img-thumbnail">'.wp_get_attachment_image($get_it_now__cover_ID, 'full', "", array( "class" => "d-block m-auto img-fluid pb-4")).'</div>';
                                            //echo $get_it_now__cover_ID;
                                      endif;
                                      ?>
                                                                  
                                </div>
                            </div>
                        	
                        </div>
                        <div class="row">
                        	<div class="col-md-8 bs-shade">
		                        <h3>Shade</h3>
                                <hr class="hr2" />
                                <div class="thumblists">
                                 <ul class="list-unstyled row marB0">
                                <?php
                                    $ids=explode(',',get_post_meta( get_the_ID(), 'add_tiles', true ));
                                    if(isset($ids)) :
                                        $args1 = array (
                                            'numberposts' => -1,
                                            'posts_per_page'    => '-1',
                                            'post_type'			=>'attachment',
                                            'post_status' => 'inherit',
                                            'paged' => $gallery_page,
                                            'post__in'=>$ids,
                                            'orderby'=>'post__in'
                                        );					
                                        $the_query3 = new WP_Query( $args1 );
                                        if ( $the_query3->have_posts() ) :
                                            while ( $the_query3->have_posts() ) :
                                                $the_query3->the_post();
                                                $image_attributes = wp_get_attachment_image_src( get_the_ID(),'full' );
                                ?>
                                            <?php
                                                $rotate="";
                                                if($size_w==600 && $size_h==1200) {
                                                    $rotate="bs-rotate-left";
                                                }
                                            ?>                        
                                    <li class="col-sm-4 col-md-4">
                                        <a class="thumblists-container <?php echo $rotate; ?>" title="<?php echo get_the_title(); ?>" href="<?php echo $image_attributes[0]; ?>" ontouchstart="this.classList.toggle('hover');">
                                                <div class="image-front">
                                                    <?php echo $image1=wp_get_attachment_image( get_the_ID(), 'medium', '', array('class'=>'img-fluid') ); ?>
                                                    <div class="flipper1"><div class="image-overlay"><span class="front-caption"></span></div></div>
                                                </div>
                                                <div class="image-caption"><?php echo get_the_title(); ?></div>
                                          </a>
                                    </li>
                                <?php				
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                    endif;
                                ?>
                             <?php endwhile; // end of the loop. ?>  
                                <div class="clearfix"></div>
                                <ul class="pager hide">
                                    <li class="previous-image"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> Previous' ); ?></li>
                                    <li class="next-image"><?php next_post_link( '%link', 'Next <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></li>
                                </ul><!-- #image-navigation -->          
        
                             </ul>
                             <!-- list-unstyled row mar0 -->
                             </div>
                            <!-- thumblists -->                            
                            </div>
                            <div class="col-md-4 tiles-info-col">
                            	<h3>Information</h3>
                                <hr class="hr2" />
<?php
				$args=array(
					'post_type' => 'page',
					'order' =>'ASC',
					'paged'	=>$paged,
					'posts_per_page'    => -1,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'tiles_sizes',
							'value' => $size
						),
						array(
							'key' => 'tiles_category',
							'value' => $cate_gory
						),						
						array(
							'key' => 'tiles_series',
							'value' => $series
						)
					)					
				);
				$the_content_query = new WP_Query( $args );
				

?>
								<?php while ( $the_content_query->have_posts() ) : $the_content_query->the_post(); ?>
                                <?php the_content(); ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>

                                <p class="action-btns"><a title="Tiles Calculator" class="btn btn-default" href="<?php echo get_permalink(72);?>" role=""><i class="fa fa-calculator"></i></a> <a class="btn btn-default" href="<?php echo get_permalink(78);?>" title="Dealer Network"><i class="fa fa-map-marker"></i></a> <a class="btn btn-default" href="javascript:window.print();" title="Print"><i class="fa fa-print"></i></a> <a class="btn btn-default" href="<?php echo get_permalink(80);?>" title="Inquiry"><i class="fa fa-envelope-o"></i></a></p>
                                                            
                            </div>
                        </div>
                <?php get_template_part('template_part/template_childpage_in_parent',''); ?>
            </div>
			<div class="col-md-3 col-md-pull-9 clearfix">
                <?php get_sidebar(); ?>             
            </div>            
            
    <?php get_template_part('template_part/template_page_row_end',''); ?>    
<div class="clear"></div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
