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
            <div class="col-md-9 order-2 order-md-1 clearfix">
				  <?php if ( has_post_thumbnail() ) : ?>
                    <div class="news-img hide">
                      <figure class="wp-caption">
                        <?php the_post_thumbnail('large',array('class'=>'center-block img-fluid padB20')); ?>
                        <figcaption class="wp-caption-text"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></figcaption>
                      </figure>
                    </div>  
                  <?php endif; ?>            
            	<?php the_content(); ?>
                <?php get_template_part('template_part/template_childpage_in_parent',''); ?>
            </div>
            <div class="col-md-3 order-1 order-md-2 clearfix">
                <?php get_sidebar(); ?>             
            </div>

        <?php endwhile; // end of the loop. ?>
    <?php get_template_part('template_part/template_page_row_end',''); ?>    
<div class="clear"></div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>