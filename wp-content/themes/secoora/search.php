<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php /* The loop */ ?>
<?php get_template_part( 'template_part/template_title', '' ); ?>
	<?php get_template_part( 'template_part/template_page_row_start', '' ); ?>
    <div class="col-md-9 col-md-push-3 clearfix">
    	<!--loop start-->
    	<?php get_template_part( 'template_part/template_loop', '' ); ?>
        <!--loop start-->
    </div>
    <div class="col-md-3 col-md-pull-9 clearfix">
        <?php get_sidebar(); ?>
    </div>

    <?php get_template_part( 'template_part/template_page_row_end', '' ); ?>
<?php get_footer(); ?>