<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

  <section class="bs-body bs-body-product clearfix">
  		<?php if ( have_posts() ) : ?>
    <section class="bs-body-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="hide1 anim1" data-vp-add-class="animated bounceInUp" data-vp-remove-class="hide1" data-vp-offset="100"><?php printf( __( '%s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
          </div>
          <div class="col-md-6 bs-prod-size-cat">
            <h4 class="hide1 anim1" data-vp-add-class="animated bounceInUp" data-vp-remove-class="hide1" data-vp-offset="100"><?php //echo $size_w.' X '.$size_h.' mm'; ?> <?php //echo $category->name; ?></h4>
          </div>
        </div>
      </div>
    </section>        
        
        
        <section class="bs-body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 clearfix">
                    	<div class="row bs-products-item-row2">
							<?php
                            /* Start the Loop */
                            while ( have_posts() ) : the_post(); ?>
                            	<?php
									$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
								?>
                                <div class="col-md-3">
                                	 <div class="bs-product-item">
                                     	<a class="" title="<?php echo get_the_title(); ?>" href="<?php echo $large_image_url[0]; ?>">
                                            <div class="bs-product-img">
                                                <?php the_post_thumbnail('medium',array('class'=>'attachment-full img-responsive')); ?>
                                            </div>
                                            <div class="bs-product-desc usefonticon"><?php echo get_the_title(); ?></div>
                                            <div class="bs-overlay1"></div>
                                            <div class="bs-overlay2"></div>
                                            <div class="miscdata">
                                                <?php
                                                    $tilesmisc='Product ID : '.get_the_title().'<br>'.
                                                                'Product Category : '.$category->name.
                                                    $pgcontent;
                                                    echo $tilesmisc;
                                                ?>
                                            </div> 
                                        
                                        </a>
                                     </div>
                				</div>
                            <?php endwhile;
                			content_nav(null);
                            //twentytwelve_content_nav( 'nav-below' );
                            ?>  
						</div>          

                    </div>
                    <div class="col-md-3 bs-sidebar bs-sidebar-product clearfix">
                       <h3>Other Product Categories</h3>
                       <?php $othercat=wp_list_categories('echo=0&hide_empty=0&child_of=11&title_li=&show_option_none='); ?>
                        <ul class="bs-series-items2">
                          <?php echo $othercat; ?>
                        </ul> 
                        <h4 class="bs-pconce usefonticon"><a href="<?php echo get_permalink( 82 ); ?>">product concepts</a></h4>
                        <h4 class="bs-tcalc"><a href="<?php echo get_permalink( 72 ); ?>">Tiles calculator</a></h4> 
                        <?php get_sidebar(); ?>                   
                    </div>
                    
                </div>
            </div>
        </section>
		<?php else : ?>
        <section class="bs-body-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="hide1 anim1" data-vp-add-class="animated bounceInUp" data-vp-remove-class="hide1" data-vp-offset="100"><?php printf( __( '%s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
                    </div>
                </div>
            </div>	
        </section>        

        <section class="bs-body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 clearfix">
							<p>No Post Found!</p>
                    </div>
                    <div class="col-md-3 bs-sidebar bs-sidebar-product clearfix">
                       <h3>Product Categories</h3>
                        <ul class="bs-series-items">
                          <?php wp_nav_menu( array('items_wrap' => '%3$s', 'theme_location' => 'product_menu' )); ?>
                        </ul> 
                        <h4 class="bs-pconce usefonticon"><a href="<?php echo get_permalink( 82 ); ?>">product concepts</a></h4>
                        <h4 class="bs-tcalc"><a href="<?php echo get_permalink( 72 ); ?>">Tiles calculator</a></h4> 
                        <?php get_sidebar(); ?>                   
                    </div>
                    
                </div>
            </div>
        </section>
		<?php endif; ?>
        
    </section>
	<!--bs-body clearfix-->

	
<?php //get_sidebar(); ?>
<?php get_footer(); ?>