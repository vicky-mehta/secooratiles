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
            <div class="col-md-12 clearfix">
            	<?php the_content(); ?>
            </div>
        <?php endwhile; // end of the loop. ?>
    <?php get_template_part('template_part/template_page_row_end',''); ?>    
<div class="clear"></div>
<?php //get_template_part('template_part/template_map',''); ?>    
<?php //get_sidebar(); ?>
<?php get_footer(); ?>