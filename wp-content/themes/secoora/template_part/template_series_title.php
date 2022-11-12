<div class="container series-size-title">
	<?php
				$size = get_post_meta( $curPage, 'tiles_sizes', true );
				//preg_match_all('!\d+!', $size, $matches);
				$ttt1=explode("_x_", $size);
				//$size_w=floatval($ttt1[0])*10;
				//$size_h=floatval($ttt1[1])*10;
				$size_w=floatval($ttt1[0]);
				$size_h=floatval($ttt1[1]);	
				
					$cat= get_post_meta( get_the_ID(), 'tiles_category', true );
					$categories = get_the_category(get_the_ID());
					if(!empty($cat)) :
						$catname_for = get_category_by_slug($cat);
						$category = $catname_for[0]->name;
					else :
						$category = $categories[0]->name;
					endif;	
				
	?>
	<h1><?php echo str_replace("_", " ", get_post_meta($curPage, 'tiles_series', true )) ?><?php //echo get_post_meta($curPage, 'tiles_series', true ); ?></h1>
    <p><span class="size-text">Size : <?php echo $size_w.' X '.$size_h.' mm'; ?></span><span class="category-text">Category : <?php echo $category; ?></span></p>
	<hr class="hr4" />
</div> 