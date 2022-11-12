<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<div class="sidebar">
        <div class="series-block">
            <h3>Product<br>Categories</h3>
            <ul class="list-unstyled list-02">
            	 <?php wp_nav_menu( array('items_wrap' => '%3$s', 'theme_location' => 'product_menu' )); ?>
            </ul>
        </div>
		<div class="series-block d-none">
            <h3>Related<br>Info</h3>
            <ul class="list-unstyled list-02">
            	 <?php //wp_nav_menu( array('items_wrap' => '%3$s', 'menu' => 'Related Info' )); ?>
                 <?php
				 	$series = (get_query_var('series')) ? get_query_var('series') : get_post_meta( get_the_ID(), 'tiles_series', true );
					$size = (get_query_var('size')) ? get_query_var('size') : get_post_meta( get_the_ID(), 'tiles_sizes', true );
					$cat= get_post_meta( get_the_ID(), 'tiles_category', true );
					$categories = get_the_category(get_the_ID());
					if(!empty($cat))
						$category = get_category_by_slug($cat);
					else 
						$category = $categories[0];
					//var_dump($category->term_id);
					//$category = get_category_by_slug($categories[0]->slug);
					//echo 'series='.$series.' size='.$size.' cat='.$cat.' category='.$category;
					/*
					if($category->term_id==8)
						$technical_url=get_permalink(274);
					elseif($category->term_id==3)
						$technical_url=get_permalink(275);
					elseif($category->term_id==5)
						$technical_url=get_permalink(276);
					else 
						$technical_url=get_permalink(158);
					
					echo '<li><a href="'.$technical_url.'">Technical Specifications</a></li>';
					*/
					
				 ?>
                
            </ul>
        </div>        
		<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar1' ); ?>
        <?php endif; ?>        
        
    </div>