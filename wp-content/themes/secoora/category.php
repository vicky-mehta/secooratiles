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
<?php if ( have_posts() ) : ?>

<?php
	$catid = get_query_var('cat'); //current category id
	$category = get_category($catid);
	$parent = $category->category_parent; //immediate parent
	$parent2 = get_category($parent); //immediate parent
	
	$p1_1=get_category($category->category_parent);
	$p2_1=get_category($p1_1->category_parent);
	$parentCategory = get_category($parent);
	//var_dump($parentCategory);
?>
		<?php if((11==$catid) || ("Others"==$parentCategory->name) || ("Others"==$p2_1->name)) : ?>
            <?php get_template_part('template_part/template_title',''); ?>  
                <?php get_template_part('template_part/template_page_row_start',''); ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-md-push-3 clearfix">
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
                                                        <?php the_post_thumbnail('medium',array('class'=>'attachment-full img-fluid')); ?>
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

                            <div class="col-md-3 col-md-pull-9 clearfix">
                                <?php get_sidebar(); ?>                   
                            </div>
                            
                        </div>
                    </div>
                <?php get_template_part('template_part/template_page_row_end',''); ?>   
        <?php else : ?>
       
          <?php get_template_part('template_part/template_title',''); ?>
           <?php get_template_part('template_part/template_page_row_start',''); ?>
            <div class="container">
              <div class="row">

                <div class="col-md-9 col-md-push-3 clearfix">
                  <div class="row">
                    <?php
                                    /* Start the Loop */
                    while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-4">
                      <?php get_template_part( 'content', get_post_format() ); ?>
                    </div>
                    <?php endwhile;
                                    content_nav(null);
                                    //twentytwelve_content_nav( 'nav-below' );
                                    ?>
                  </div>
                </div>
                <div class="col-md-3 col-md-pull-9 clearfix">
                  <?php get_sidebar(); ?>
                </div>
                
              </div>
            </div>
        <?php get_template_part('template_part/template_page_row_end',''); ?>   
        <!--bs-body clearfix-->
        <?php endif ; ?> 

<?php else : ?>
          <?php get_template_part('template_part/template_title',''); ?>
         <?php get_template_part('template_part/template_page_row_start',''); ?>
            <div class="container">
              <div class="row">
                <div class="col-md-9 col-md-push-3 clearfix">
                  <p>No Post Found!</p>
                </div>
                <div class="col-md-3 col-md-pull-9 clearfix">
                  <?php get_sidebar(); ?>
                </div>


              </div>
            </div>
        <?php get_template_part('template_part/template_page_row_end',''); ?>   
<!--bs-body clearfix-->
<?php endif; ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
