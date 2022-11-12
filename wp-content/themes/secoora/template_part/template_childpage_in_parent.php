		<!--List Child Pages-->
					<?php
					//echo get_the_ID();
                    // WP_Query arguments
                    $args = array (
                        'post_parent'            => get_the_ID(),
						'post_type'              => array( 'page' ),
						'orderby'                => 'menu_order',
						'order'                  => 'ASC',
						'posts_per_page'         => '-1'
                    );
                    // The Query
                    $query = new WP_Query( $args );
                    // The Loop
                    if ( $query->have_posts() ) :
					?>
					
                    <div class="main_sec_content clearfix">
						<div class="thumblists">
						  <ul class="list-unstyled row mar0">
									<?php
										$i=1;
										while ( $query->have_posts() ) :
											$query->the_post();
									?>
									<li class="col-sm-4 col-md-4">
										<a class="thumblists-container" href="<?php the_permalink(); ?>" ontouchstart="this.classList.toggle('hover');">
												<div class="image-front">
													<?php if ( has_post_thumbnail() ) : ?>
													<?php the_post_thumbnail(array(300,0),array('class'=>'attachment-full center-block img-fluid')); ?>
													<?php else : ?>
													<?php endif; ?>
													<div class="flipper1"><div class="image-overlay"><span class="front-caption"></span></div></div>
												</div>
												<div class="image-caption"><?php the_title(); ?></div>
										</a>										
									</li>
									<?php
										if($i%3==0)
											echo '<div class="clearfix"></div>';
									?>      
									<?php
										$i++;
										endwhile;
										
									?>
						  </ul>
						</div>
                    </div>
                    
                    <?php	
                    else :
                        // no posts found
                    endif;
                    
                    // Restore original Post Data
                    wp_reset_postdata();
                    
                    ?> 
		<!--List Child Pages-->   