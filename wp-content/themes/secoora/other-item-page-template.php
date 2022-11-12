<?php
/**
 * Template Name: Template for Ohter items
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
			<?php 
				$curPage=get_the_ID();
				while ( have_posts() ) : 
					the_post();
					$pgcontent= apply_filters( 'the_content', get_the_content() );
				endwhile;
				//$series=types_render_field('series', array('raw' => 'true'));
				$series = (get_query_var('series')) ? get_query_var('series') : get_post_meta( get_the_ID(), 'tiles_series', true );
				$size = (get_query_var('size')) ? get_query_var('size') : get_post_meta( get_the_ID(), 'tiles_sizes', true );
				$ttt1=explode("X", $size);
				$size_w=floatval($ttt1[0])*10;
				$size_h=floatval($ttt1[1])*10;
				//echo floatval($size_w_h[0]);
				//echo floatval($size_w_h[1]);
				
				//$concept=get_post_meta( get_the_ID(), 'is_this_concept_series_', true );
				//echo $concept;
				$cat= get_post_meta( get_the_ID(), 'tiles_category', true );
				$category = get_category_by_slug($cat);
				//var_dump($category);
				$child_cats = wp_list_categories('echo=0&hide_empty=0&child_of=$category->term_id&title_li=&show_option_none=');
				echo $child_cats;
				if($size_w>=200 && $size_w<=400) {
					$post_per_page=4;
				}else {
					$post_per_page=4;
				}
				//var_dump();
				//echo $cat;
				//echo get_the_title($post->post_parent).'--'.types_render_field('size', array('raw' => 'true')).'--'.types_render_field('series', array('raw' => 'true')); 				/* query to genereate category page with default size & seris */
				//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				//echo $paged;
				$args=array(
					'post_type' => 'post',
					'category_name' => $cat,
					'order' =>'ASC',
					'paged'	=>$paged,
					'posts_per_page'    => $post_per_page,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'tiles_sizes',
							'value' => get_post_meta( get_the_ID(), 'tiles_sizes', true )
						),
						array(
							'key' => 'tiles_series',
							'value' => $series
						)
					)					
				);
				$the_query = new WP_Query( $args );
				//var_dump($the_query);
				//echo '#######'.$the_query->found_posts;
			?>


  <section class="bs-body bs-body-product bs-body-product2 clearfix">
    <section class="bs-body-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="hide1 anim1" data-vp-add-class="animated bounceInUp" data-vp-remove-class="hide1" data-vp-offset="100"><?php echo $series ?></h2>
          </div>
          <div class="col-md-6 bs-prod-size-cat">
            <h4 class="hide1 anim1" data-vp-add-class="animated bounceInUp" data-vp-remove-class="hide1" data-vp-offset="100"><?php echo $category->name; ?></h4>
          </div>
        </div>
      </div>
    </section>
    <section class="bs-product-cat-in">
      <div class="container">
      <div class="spacer spacer30"></div>
        <div class="row">
          <div class="col-md-9 clearfix">
            <div class="row bs-products-item-row2 clearfix">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php
                    $ids=explode(',',get_post_meta( get_the_ID(), 'add_tiles', true ));
                    $concept=get_post_meta( get_the_ID(), 'is_this_concept_series_', true );
            
               if(isset($concept) &&  $concept=="off") {
                    //echo the_ID();
                    // $attachments = get_posts( array('post_type' => 'attachment', 'posts_per_page' => 5, 'orderby'=>'post__in') );
                    //$attachments = get_posts( $args );
                    //echo get_query_var('paged');
                    $gallery_page = (get_query_var('gallery_page')) ? get_query_var('gallery_page') : 1;
                    //echo $paged;
                    //echo get_query_var('paged');
                    $args1 = array (
                        'numberposts' => -1,
                        'posts_per_page'    => '12',
                        'post_type'			=>'attachment',
                        'post_status' => 'inherit',
                        'paged' => $gallery_page,
                        'post__in'=>$ids,
                        'orderby'=>'post__in'
                    );					
                    $the_query3 = new WP_Query( $args1 );
                    $i=1;
                    //var_dump($the_query3);
                    // The Loop
                    if ( $the_query3->have_posts() ) {
                        while ( $the_query3->have_posts() ) {
                            $the_query3->the_post();
                            $image_attributes = wp_get_attachment_image_src( get_the_ID(),'full' ); 
                        ?>
            
            
                          <!--<div class="col-sm-6 col-md-3">-->
                          <!--380X20/100-->
                          <?php
                            $thumbwidth=(floatval($ttt1[0]))*380/100;
                            $thumbwidth=$thumbwidth+20;
                            //echo $thumbwidth;
                          ?>
            			<div class="col-sm-6 col-md-3">
                          <div class="bs-product-item" style="" ontouchstart="this.classList.toggle('hover');">
                            <?php
                                $rotate="";
                                if($size_w==600 && $size_h==1200) {
                                    $rotate="bs-rotate-left";
                                }
                            ?>                                  
                            <a class="<?php echo $rotate; ?>" title="<?php echo get_the_title(); ?>" href="<?php echo $image_attributes[0]; ?>">
                                <div class="bs-product-img">
                                    <?php echo $image1=wp_get_attachment_image( get_the_ID(), 'medium', '', array('class'=>'img-responsive') ); ?>
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
                          <?php 
                          if($i%2==0)
                            echo '<div class="clearfix visible-sm"></div>';
                          ?>    
                                                                  
                          <?php 
                          if($i%4==0)
                            echo '<div class="clearfix"></div>';
                          $i++ ;
                          ?>                       
                            
                        <?php }
                        echo '<div class="clearfix"></div><div class="bs-pagination text-center">';
                        //echo '--'.$page;
                        $big = 999999999;
                        $l1=get_permalink($curPage);
                        //add_query_arg( 'series', get_query_var['series'], $l1)
                        $l2=add_query_arg( 'series', urlencode(get_query_var('series')), $l1);
                        //echo urlencode(get_query_var('series'));
                        $args_pagi = array(
                        'base' => $l2.'%_%',
                        'format' => '&gallery_page=%#%',
                        'total' => $the_query3->max_num_pages,
                        'show_all'=>true,
                        'type'=>'list',
                        'current' => max( 1, get_query_var('gallery_page') ),
                        );
                        
                        //content_nav($the_query3);
                        echo paginate_links( $args_pagi);
                        echo '</div>';
                        wp_reset_postdata();
                    } else {
                        echo 'no posts found';
                    }
                    
                    /* Restore original Post Data */
                    
                    
                
                }else {
                $attachments = get_posts( array('post_type' => 'attachment', 'posts_per_page' => -1, 'include'=>$ids, 'orderby'=>'post__in') );
                ?>
                <?php if($post_per_page==6) : ?>
                <div class="col-sm-6 col-md-2">
                <?php else : ?>
                <div class="col-sm-6 col-md-3">
                <?php endif ; ?>
                    <?php foreach($attachments as $id) : 
                        $attachmeta=wp_get_attachment_metadata($id->ID);
                        $image1=wp_get_attachment_image( $id->ID, 'medium', '', array('class'=>'') );
                    ?>
                          <?php
                            $thumbwidth=(floatval($ttt1[0]))*380/100;
                            $thumbwidth=$thumbwidth+20;
                            //echo $thumbwidth;
                          ?>  
                    <div class="bs-product-item" style="width:<?php echo $thumbwidth.'px';?>; height:auto;" ontouchstart="this.classList.toggle('hover');">
                        <a title='<?php echo $id->post_title; ?>' href="<?php echo $id->guid; ?>">
                          <div class="bs-product-img"> <?php echo $image1; ?> </div>
                          <div class="bs-product-desc usefonticon"><?php  echo $id->post_title; ?></div>
                          <div class="bs-overlay1"></div>
                          <div class="bs-overlay2"></div>
                          <div class="miscdata">
                            <?php
                                $tilesmisc='Product ID : '.$id->post_title.'<br>'.
                                            'Product Category : '.$category->name.
                                $pgcontent;
                                echo $tilesmisc;
                            ?>
                          </div>                                   
                        </a>
                    </div>
                    
                    <?php endforeach; ?>
                </div>
                
                <?php
            } ?>
            
            
                <?php endwhile; // end of the loop. 
                //var_dump($the_query);
                content_nav($the_query);
                wp_reset_postdata(); ?>	
            
            </div>
            
            
          </div>
          <div class="col-md-3 bs-sidebar bs-sidebar-product clearfix">
          	<h3><span>Available Categories</span><span><?php //echo $size_w.' X '.$size_h.' mm'; ?></span></h3>
          <?php
			$added = array();
			$cat1=array();
			$args=array(
				'category_name' => $cat,
				'posts_per_page'    => '-1',
				'meta_query' => array(
					array(
						'key' => 'tiles_sizes',
						'value' => get_post_meta( get_the_ID(), 'tiles_sizes', true )
					)
				)					
			);
			$the_query2 = new WP_Query( $args );		  
		  ?>            
       	    <ul>
            <?php
				while ( $the_query2->have_posts() ) : $the_query2->the_post();		
				$ot_series=get_post_meta( get_the_ID(), 'tiles_series', true );
				
				if( in_array($ot_series, $added) )
				{
					continue;
				}
				$added[] = $ot_series;
				$url=add_query_arg( 'series', $ot_series, get_permalink($curPage) );
				$cat1[$ot_series]=$url;
				endwhile;
				ksort($cat1);
				//var_dump($cat1);
				foreach($cat1 as $catk=>$catval){
					echo '<li><a href="'.$catval.'">'.$catk.'</a></li>';
				}
				wp_reset_postdata();			
			?>
            
   	        </ul>
            <h4 class="bs-pconce usefonticon"><a href="<?php echo get_permalink( 82 ); ?>">product concepts</a></h4>
            <h4 class="bs-tcalc"><a href="<?php echo get_permalink( 72 ); ?>">Tiles calculator</a></h4> 
          </div>
        </div>
        
        
      </div>
    </section>
    <!--bs-product-cat--> 
    
  </section>

<?php 

?>
<?php get_footer(); ?>