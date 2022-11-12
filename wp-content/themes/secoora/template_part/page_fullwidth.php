<?php
/*
Template Name: Full width no sidebar page
*/
?>
<?php
get_header(); ?>
<?php /* The loop */ ?>
<?php get_template_part('template_part/template_title',''); ?>
	<?php get_template_part('template_part/template_page_row_start',''); ?>
	  <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-12 clearfix">
				  <?php if ( has_post_thumbnail() ) : ?>
                    <div class="news-img hide">
                      <figure class="wp-caption">
                        <?php the_post_thumbnail('large',array('class'=>'d-block m-auto img-fluid pb-4')); ?>
                        <figcaption class="wp-caption-text"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></figcaption>
                      </figure>
                    </div>  
                  <?php endif; ?>            
            	<?php the_content(); ?>
                <?php get_template_part('template_part/template_childpage_in_parent',''); ?>
            </div>
<!--            <div class="col-md-3 col-md-pull-9 clearfix">
                <?php //get_sidebar(); ?>             
            </div>-->

        <?php endwhile; // end of the loop. ?>
    <?php get_template_part('template_part/template_page_row_end',''); ?>    
<div class="clear"></div>
<?php get_footer(); ?>
