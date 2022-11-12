<?php
/**
 * Template Name: First series & size in category
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
			$keyname=array();
			$option=get_option('option_tree_settings');
			foreach($option['settings'][1]['choices'] as $key=>$value) {
				$keyname[$value['label']]=$value['value'];
				//var_dump($value);
				//echo $value['label'];
			}
			$keyname2=array();
			foreach($option['settings'][0]['choices'] as $key=>$value) {
				$keyname2[$value['label']]=$value['value'];
				//var_dump($value);
				//echo $value['label'];
			}			
			
			//var_dump($keyname2);
			?>
			<?php 
				$curPage=get_the_ID();
				while ( have_posts() ) : 
					the_post();
					$pgcontent= apply_filters( 'the_content', get_the_content() );
				endwhile;
				//$series=types_render_field('series', array('raw' => 'true'));
				$series = (get_query_var('series')) ? get_query_var('series') : get_post_meta( get_the_ID(), 'tiles_series', true );
				$size = (get_query_var('size')) ? get_query_var('size') : get_post_meta( get_the_ID(), 'tiles_sizes', true );
				//preg_match_all('!\d+!', $size, $matches);
				$ttt1=explode("_x_", $size);
				$size_w=floatval($ttt1[0])*10;
				$size_h=floatval($ttt1[1])*10;
				//$size_w=floatval($ttt1[0]);
				//$size_h=floatval($ttt1[1]);				
				//echo floatval($size_w_h[0]);
				//echo floatval($size_w_h[1]);
				//var_dump(get_post_meta( get_the_ID(), 'tiles_sizes', true ));
				
				//$concept=get_post_meta( get_the_ID(), 'is_this_concept_series_', true );
				//echo $concept;
				$cat= get_post_meta( get_the_ID(), 'tiles_category', true );
				$category = get_category_by_slug($cat);

				if($size_w==250 && $size_h==750){
					$post_per_page=2;
				}elseif($size_w>=200 && $size_w<=400) {
					$post_per_page=3;
				}else {
					$post_per_page=3;
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


<?php get_template_part('template_part/template_title',''); ?>
<?php //include_once(locate_template('template_part/template_series_title.php')); //get_template_part('template_part/template_series_title',''); ?>

<div class="export">
	<div class="container series-size-title ">
		<h2 class="text-center h1style1 text-uppercase"><span><font class="f-bold"><?php echo str_replace("_", " ", $series) ?></font></span></h2>
		<p><span class="size-text">Size : <?php echo $size_h.' X '.$size_w.' mm'; ?></span><span class="category-text">Category : <?php echo $category->name; ?></span></p>
		<hr class="hr4" />
	</div> 
</div>
<?php get_template_part('template_part/template_page_row_start',''); ?>
	<div class="row">
    	<div class="col-md-9 col-md-push-3 clearfix">
        	<input type="hidden" name="misdatahide" id="misdatahide" value="<?php echo $series ?>" />
            <div class="main_sec_content clearfix">
            	<div class="thumblists">
                	<ul class="list-unstyled row mar0 <?php echo $series ?>">
                    	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<?php
                            $ids=explode(',',get_post_meta( get_the_ID(), 'add_tiles', true ));
							$_concept_tiles_upload=get_post_meta( get_the_ID(), '_concept_tiles_upload', true );
                            //var_dump();
                            $concept=get_post_meta( get_the_ID(), 'is_this_concept_series_', true );
                            //echo get_post_meta( get_the_ID(), 'add_tiles', true );
                        
                            if(isset($concept) &&  $concept=="off") {
                               
                                if(get_post_meta( get_the_ID(), 'add_tiles', true )) :
            
                                        //echo the_ID();
                                        // $attachments = get_posts( array('post_type' => 'attachment', 'posts_per_page' => 5, 'orderby'=>'post__in') );
                                        //$attachments = get_posts( $args );
                                        //echo get_query_var('paged');
                                        $gallery_page = (get_query_var('gallery_page')) ? get_query_var('gallery_page') : 1;
                                        //echo $paged;
                                        //echo get_query_var('paged');
                                        $args1 = array (
                                            'numberposts' => -1,
                                            'posts_per_page'    => '6',
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
                                
                                
                                              <li class="col-sm-6 col-md-4">
                                              <!--380X20/100-->
                                              <?php
                                                $thumbwidth=(floatval($ttt1[0]))*380/100;
                                                //$thumbwidth=$thumbwidth+20;
                                                //echo $thumbwidth;
                                              ?>
                                				<a class="thumblists-container <?php echo $rotate; ?>" title="<?php echo get_the_title(); ?>" href="<?php echo $image_attributes[0]; ?>" ontouchstart="this.classList.toggle('hover');">
                                                    <?php
                                                        $rotate="";
                                                        $prefix="";
                                                        if($size_w==600 && $size_h==1200) {
                                                            $rotate="bs-rotate-left";
                                                        }
                                                        if($seriesName=="Matt Elevation"){
                                                            $prefix="Ele-";
                                                        }
                                                        if($seriesName=="Glossy Elevation"){
                                                            $prefix="GL-";
                                                        }											
                                                        
                                                    ?> 
                                                    <div class="image-front">
                                                        <?php echo $image1=wp_get_attachment_image( get_the_ID(), 'medium', '', array('class'=>'d-block m-auto img-fluid') ); ?>
                                                        <div class="flipper1"><div class="image-overlay"><span class="front-caption"></span></div></div>
                                                    </div>
                                                    <div class="image-caption"><?php echo $prefix.get_the_title(); ?></div>
                                                    <div class="miscdata hide">
                                                        <?php
                                                            $tilesmisc='Product ID : '.get_the_title().'<br>'.
                                                                        'Product Category : '.$category->name.
                                                            $pgcontent;
                                                            echo $tilesmisc;
                                                        ?>
                                                    </div>                                                                                                                                                        
                                                </a>
                                              </li>                                  
                                              <?php 
                                              /*
											  if($i%3==0)
                                                echo '<div class="clear visible-md visible-lg"></div>';
                                              if($i%2==0)
                                                echo '<div class="clear visible-sm"></div>';
											*/
                                            $i++ ;
                                              ?>
                                          
                                                
                                            <?php }
                                            echo '<div class="clear"></div><div class="col-md-12 bs-pagination text-center">';
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
                                            'show_all'=>false,
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
                                    
                                else:
                                
                                    //echo 'hi';
                                    //the_content();
                                    //wp_link_pages();
            
                                endif;
            
                                
                                
                            
                            }else {
                                $attachments = get_posts( array('post_type' => 'attachment', 'posts_per_page' => -1, 'include'=>$ids, 'orderby'=>'post__in') );
                                ?>
                                <?php if($post_per_page==6) : ?>
                                <li class="col-sm-6 col-md-2">
                                <?php elseif($post_per_page==3) : ?>
                                <li class="col-sm-6 col-md-4">
                                <?php elseif($post_per_page==2) : ?>
                                <li class="col-sm-6 col-md-6">
                                <?php else : ?>
                                <li class="col-sm-6 col-md-4">
                                <?php endif ; ?>
										<?php foreach($attachments as $id) : 
                                            $attachmeta=wp_get_attachment_metadata($id->ID);
                                            //var_dump($attachmeta['width'].$attachmeta['height']);
                                            $w1=(int)$attachmeta['width'];
                                            $h1=(int)$attachmeta['height'];
                                            $dif=abs($w1-$h1);
                                            //echo ($size_h);
                                            $class="";
                                            if($dif<10 && $size_w==250 && $size_h==750) {
                                                $class="reduce_h";
                                            }
                                            if($dif<10 && $size_w==300 && $size_h==450) {
                                                $class="reduce_h2";
                                            }								
                                            if($dif<10 && $size_h==450) {
                                                //$class="reduce15";
                                            }
                                            if($dif<10 && $size_h==450) {
                                               // $class="reduce15";
                                            }								
                                            if($dif<10 && $size_h==600) {
                                               $class="reduce20";
                                            }						
                                        
                                            $image1=wp_get_attachment_image( $id->ID, 'medium', '', array('class'=>'d-block m-auto img-fluid') );
                                        ?>
                                          <?php
                                            $thumbwidth=(floatval($ttt1[1]))*238/100;
                                            //$thumbwidth=$thumbwidth+20;
                                            //echo $thumbwidth;
                                          ?>  
                                          
											<a class="thumblists-container <?php echo $class; ?>" title="<?php echo $id->post_title; ?>" href="<?php echo $id->guid; ?>" ontouchstart="this.classList.toggle('hover');">
                                                    <?php
                                                        $rotate="";
                                                        $prefix="";
                                                        if($size_w==600 && $size_h==1200) {
                                                            $rotate="bs-rotate-left";
                                                        }
                                                        if($seriesName=="Matt Elevation"){
                                                            $prefix="Ele-";
                                                        }
                                                        if($seriesName=="Glossy Elevation"){
                                                            $prefix="GL-";
                                                        }											
                                                        
                                                    ?> 
                                                    <div class="image-front">
                                                        <?php echo $image1; ?>
                                                        <div class="flipper1"><div class="image-overlay"><span class="front-caption"></span></div></div>
                                                    </div>
                                                    <div class="image-caption"><?php echo $id->post_title; ?></div>
                                                    <div class="miscdata hide">
														<?php
                                                            $tilesmisc='Product ID : '.$id->post_title.'<br>'.
                                                                        'Product Category : '.$category->name.
                                                            $pgcontent;
                                                            echo $tilesmisc;
                                                        ?>
                                                    </div>
                                                </a>


                                				
                                                                                          
                                    <?php endforeach; ?>
                                    <?php if(!empty($_concept_tiles_upload)) : ?>
                                    <p class="text-center"><a class="btn btn-primary" title="<?php the_title(); ?>" href="<?php echo $_concept_tiles_upload; ?>"><i class="fa fa-image"></i> View Concept</a></p>
                                    <?php endif; ?>
                                </li>
                            
                            <?php
                            } ?>
                        
						<?php endwhile; // end of the loop. 
                        //var_dump($the_query); ?>	                        
                    </ul>
                    <?php                      
						content_nav($the_query);
                        wp_reset_postdata();
					?>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-md-pull-9 clearfix">
            <div class="sidebar-block series-block">
                <h3><span>Available Series </span><br><?php echo $size_h.'X'.$size_w.' mm'; ?></h3>
                <?php
                $added = array();
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
                <ul class="list-unstyled list-02">
					<?php
                        //echo $series;
                        while ( $the_query2->have_posts() ) : $the_query2->the_post();		
                        $ot_series=get_post_meta( get_the_ID(), 'tiles_series', true );
                        //sort($ot_series);
                        if( in_array($ot_series, $added) )
                        {
                            continue;
                        }
                        $added[] = $ot_series;
                        //sort($added);
                        $url=add_query_arg( 'series', $ot_series, get_permalink($curPage) );
                        $key = array_search ($ot_series, $keyname);
                        //echo $key;
        
        
                        
                        if($series==$ot_series)
                        echo '<li class="active"><a href="'.$url.'">'.$key.'</a></li>';
                        else
                        echo '<li><a href="'.$url.'">'.$key.'</a></li>';
                        endwhile;
                        wp_reset_postdata();			
                    ?>
                </ul>
            </div>
			<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar1' ); ?>
            <?php endif; ?>               

        
        </div>
    </div>


<?php get_template_part('template_part/template_page_row_end',''); ?>    
<div class="clear"></div>
<?php 

?>
<?php get_footer(); ?>