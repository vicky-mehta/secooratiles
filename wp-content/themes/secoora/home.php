<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<section class="bs_banner clearfix">
        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/trans.png" width="1920" height="904">  <!--carousel-->
</section>
<section class="bs-welcome section_pad">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-7 col-md-3 col-lg-3">
            	<h2 class=""><span>welcome to</span> <strong>wolf export</strong></h2>
            </div>
            <div class="col-sm-5 col-md-1 col-lg-1"><div class="bs-welcome-sep hidden-xs"></div></div>
            <div class="col-sm-8 col-md-5 col-lg-6 f-montserratregular"><p>WOLF EXPORT House is one of Leading Manufacturers in Domestic & Export Ceramic Product. As pioneers in the ceramic tiles exporter, we stand committed.</p></div>
            <div class="col-sm-4 col-md-3 col-lg-2"><a href="#" class="btn btn-readmore2 btn-block">READ MORE</a></div>
        </div>
    </div>
</section>
<section class="bs_cat_sec section_pad text-center">
	<div class="container">
    	<h2 class="mar0"><span>PRODUCT</span> <strong>CATEGORIES</strong></h2>
        <p class="text-muted">Our wide rand of exported products in various categories incudes</p>
    	<div class="row">
        	<div class="col-sm-6 col-md-3">
            	<a href="#" class="bs_cat_sec_item thumbnail">
           	    	<img src="<?php echo get_template_directory_uri(); ?>/images/cat1-1.jpg" width="262" height="502">
                    <div class="caption">
                    	<h5>WALL TILES</h5>
                        <p>We produce an extensive range of ceramic and gres porcelain </p>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
            	<a href="#" class="bs_cat_sec_item thumbnail">
           	    	<img src="<?php echo get_template_directory_uri(); ?>/images/cat1-2.jpg" width="262" height="502">
                    <div class="caption">
                    	<h5>WALL TILES</h5>
                        <p>We produce an extensive range of ceramic and gres porcelain </p>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
            	<a href="#" class="bs_cat_sec_item thumbnail">
           	    	<img src="<?php echo get_template_directory_uri(); ?>/images/cat1-3.jpg" width="262" height="502">
                    <div class="caption">
                    	<h5>WALL TILES</h5>
                        <p>We produce an extensive range of ceramic and gres porcelain </p>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
            	<a href="#" class="bs_cat_sec_item thumbnail">
           	    	<img src="<?php echo get_template_directory_uri(); ?>/images/cat1-4.jpg" width="262" height="502">
                    <div class="caption">
                    	<h5>WALL TILES</h5>
                        <p>We produce an extensive range of ceramic and gres porcelain </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="homepage-hero-module clearfix">
    <div class="video-container">
        <div class="filter clearfix">

            <div class="bs_export_fac section_pad text-center">
                <div class="container">
                    <h2>export <span>facilities at</span> <strong>wolf</strong></h2>
                    <hr class="hr" />
                    <div class="row">
                   	  <div class="col-md-10 col-md-offset-1">

                            <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel"> 
                                      <!-- Indicators -->
                                      <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic2" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic2" data-slide-to="1"></li>
                                      </ol>
                                      
                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                        	<p>The world is a village we would like to serve. To reach and conquer the corners of the earth, we have entailed logistics facilities. Our prime concern remains providing the intact wall tiles and floor tiles to our customers based overseas. We thrive till our designer wall tiles from India reaches to your door step. For this, we have established Export Facilitation Centre which primarily looks after the quality of export, efficient transit process and timely delivery of export. WOLF has also invested in securing a base at port and state of art equipment to assist the export packaging and transfer.</p>
                                        </div>
                                        <div class="item">
                                        	<p>The world is a village we would like to serve. To reach and conquer the corners of the earth, we have entailed logistics facilities. Our prime concern remains providing the intact wall tiles and floor tiles to our customers based overseas. We thrive till our designer wall tiles from India reaches to your door step. For this, we have established Export Facilitation Centre which primarily looks after the quality of export, efficient transit process and timely delivery of export. WOLF has also invested in securing a base at port and state of art equipment to assist the export packaging and transfer.</p>
                                        </div>
                                      </div>
                                      
                            </div>
                            <p><a href="#" class="btn btn-readmore3">Read More</a></p>                        
                        
                        	
                      </div>
                    </div>
                    
                </div>
            </div>   
     
        </div>
        
        <video autoplay loop class="fillWidth">
            <source src="<?php echo get_template_directory_uri(); ?>/images/Night-Out/MP4/Night-Out.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
            <source src="<?php echo get_template_directory_uri(); ?>/images/Night-Out/WEBM/Night-Out.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
        </video>
        <div class="poster hidden">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Night-Out/Snapshots/Night-Out.jpg" alt="">
        </div>
    </div>
</section>
<section class="bs_group_company section_pad text-center">
	<div class="container">
        	<h2><span>group</span> <strong>companies</strong></h2>
            <hr class="hr2" />
            <div class="owl-carousel-holder">
                <div id="owl-example2" class="owl-carousel">
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/c-logo1.jpg"></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/c-logo2.jpg"></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/c-logo3.jpg"></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/c-logo4.jpg"></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/c-logo5.jpg"></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/c-logo6.jpg"></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/c-logo7.jpg"></div>
                </div>
            </div>             
    </div>
</section>
<section class="bs_message section_pad text-center">
	<div class="container">
        	<h2><span>send us </span> <strong>message</strong></h2>
            <hr class="hr" />
            <div class="space20"></div>
    	
        	<?php echo do_shortcode('[caldera_form id="CF5856c32d2bafe"]'); ?>
       
        
    </div>
</section>
<?php get_template_part('template_part/template_map',''); ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>