<?php
/*
Template Name: My Custom Page
*/
?>

<?php

    $post1 = get_post($_POST['id']);
	//var_dump($_POST['id']);
	if ($post1) :
		setup_postdata($post1);
		//var_dump($post1->ID);
?>
<section class="ajax-content-sect">
	<?php
			//echo apply_filters( 'siteorigin_panels_before_content', '<div class="content-holder">', $panels_data, $post1->ID );
		//	echo siteorigin_panels_render( $post_id = $post1->ID,true,$panels_data);
			//echo apply_filters( 'siteorigin_panels_after_content', '</div>', $panels_data, $post1->ID );	
	?>

	 <?php the_content(); ?>
	 <?php if($_POST['id']=="72") : ?>
	 <?php get_template_part('tiles-calculators',''); ?>
	 <?php endif; ?>
</section>
<?php endif; ?>