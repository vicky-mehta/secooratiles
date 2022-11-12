<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php get_template_part('template_part/template_title',''); ?>
	<?php get_template_part('template_part/template_page_row_start',''); ?>
  	<?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-9 col-md-push-3 clearfix">
            	<div class="main_sec_content clearfix">
            	<?php the_content(); ?>
                <div class="thumblists">
				<ul class="list-unstyled row mar0">
                            <?php
                            // The Query
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args=array(
                                'post_type' => 'prod_concept',
                                'posts_per_page'=>6,
                                'paged' => $paged
                            );
                            $the_query = new WP_Query( $args );
                    
                            // The Loop
                            if ( $the_query->have_posts() ) { 
                            
                            ?>
                              <?php
                                    while ( $the_query->have_posts() ) {
                                        $the_query->the_post();			
                                    ?>
                                 <li class="col-sm-4 col-md-4">
									<?php
                                        $post_thumbnail_id = get_post_thumbnail_id();
                                        $post_thumbnail_src=wp_get_attachment_image_src($post_thumbnail_id,'full');							
                                    ?>                                 
                                 	<a class="thumblists-container" title="<?php  echo get_the_title(); ?>" href="<?php echo $post_thumbnail_src[0]; ?>" ontouchstart="this.classList.toggle('hover');">
                                        <div class="image-front">
                                        	<?php the_post_thumbnail('concept-thumb',array('class'=>'attachment-medium img-fluid')); ?>
                                            <div class="flipper1"><div class="image-overlay"><span class="front-caption"></span></div></div>
                                        </div>
                                        <div class="image-caption"><?php  echo get_the_title(); ?></div>                                    
                                    </a>
                                </li>
                                    
                              <?php } ?>
                            <?php	
                            
                            } else {
                                echo 'no post found';
                            }
                            /* Restore original Post Data */
                            content_nav($the_query);
                            wp_reset_postdata();
                            ?>
                        </ul>
                        </div>
                        
				</div>
            </div>
			<div class="col-md-3 col-md-pull-9 clearfix">
                <?php get_sidebar(); ?>             
            </div>
            
	<?php endwhile; // end of the loop. ?>
    <?php get_template_part('template_part/template_page_row_end',''); ?>    
<div class="clear"></div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>