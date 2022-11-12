<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php get_template_part('template_part/template_title',''); ?>
	<?php get_template_part('template_part/template_page_row_start',''); ?>
            <div class="col-md-9 col-md-push-3 clearfix">
            	<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
                        <?php get_search_form(); ?>
            </div>
            <div class="col-md-3 col-md-pull-9 clearfix">
                <?php get_sidebar(); ?>             
            </div>            

    <?php get_template_part('template_part/template_page_row_end',''); ?>    
<div class="clear"></div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>