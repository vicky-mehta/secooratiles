    <section class="banner banner-inner clearfix">
                	<h1 class="text-center text-white f-bold">
						<?php if(is_404()): ?>
							<?php _e( 'Page Not Found' ); ?>
						<?php elseif(is_search()) : ?>  
							<?php printf( __( 'Search Results for:', '' ), '' ); ?><br /><small style="color:#FFF; line-height:1; font-weight:400; font-size:50%"><?php printf( __( '%s', 'twentythirteen' ), get_search_query() ); ?></small>   
						<?php elseif(is_tax()) : ?>  
							<?php echo single_cat_title( '', false ); ?> 
						<?php elseif(is_category()) : ?>  
							<?php echo single_cat_title( '', false ); ?> 
						<?php elseif(is_home()) : ?>       
							<?php $our_title = get_the_title( get_option('page_for_posts', true) ); echo $our_title;  ?>
						<?php elseif(is_page_template( 'page_service_detail.php' )) : ?>     
							<?php echo get_the_title(wp_get_post_parent_id( get_the_ID())) ?>
						<?php elseif(is_page_template( 'page_gallery_detail.php' )) : ?>     
							<?php echo get_the_title(wp_get_post_parent_id( get_the_ID())) ?>
						<?php //elseif(is_page() && ($post->post_parent)) : ?>     
							<?php
								//$ancestor = get_post_ancestors( $post->ID );
								//echo get_the_title($ancestor[0]);
							?>
						<?php elseif(is_day()) : ?>     
							<?php echo $before . 'Archive by Day "' . get_the_time('d') . '"' . $after;  ?>
						<?php elseif(is_month()) : ?>     
							<?php echo $before . 'Archive by Month "' . get_the_time('F') . '"' . $after;  ?>
						<?php //elseif(is_shop()) : ?>   
						<?php //elseif(apply_filters( 'woocommerce_show_page_title', true )) : ?>
							<?php //woocommerce_page_title(); ?>	
						<?php //elseif(is_product()) : ?>	
							<?php
								//$product_cats = wp_get_post_terms(get_the_ID(), 'product_cat');
								//var_dump($product_cats);
								//(!empty($product_cats))
								//echo $product_cats[0]->name;
							?>
						<?php elseif(is_year()) : ?>     
							<?php echo $before . 'Archive by Year "' . get_the_time('Y') . '"' . $after;  ?>
						<?php elseif(is_tag()) : ?>     
							<?php echo $before . 'Archive by Tag "' . single_tag_title('', false) . '"' . $after;  ?>
						<?php elseif(is_author()) : ?>   
							<?php
								global $author;
								$userdata = get_userdata($author);						
							?>  
							<?php echo $before . 'Articles posted by "' . $userdata->display_name . '"' . $after;  ?>
						<?php else : ?>
							<?php the_title(); ?>
						<?php endif; ?>						
					</h1>	
    </section>
