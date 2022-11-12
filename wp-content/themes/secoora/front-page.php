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

    <section class="banner clearfix">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/images/banner-01.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/images/banner-02_.jpg" alt="First slide">
            </div>			
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/images/banner-03.jpg" alt="First slide">
            </div>  
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/images/banner-04_.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/images/banner-02.jpg" alt="First slide">
            </div>   			
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/images/banner-06_.jpg" alt="First slide">
            </div>                                      
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/images/banner-07_.jpg" alt="First slide">
            </div>                                      
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo get_template_directory_uri(); ?>/images/banner-08_.jpg" alt="First slide">
            </div>                                      
          </div>
        </div>        
    </section>


    <section class="overview">
        <div class="container">
            <div class="row d-flex align-items-center wow fadeInUp">
            	<div class="col-md-3"><div class="overview-img"><img class="d-block img-fluid m-auto" src="<?php echo get_template_directory_uri(); ?>/images/overview-img.png" width="263" height="275"></div></div>
                <div class="col-md-1 align-self-start"><div class="hr-line"></div></div>
                <div class="col-md-8"><h1 class="f-light pb-4 pt-4 pb-md-4 pt-md-4 pb-lg-0 pt-lg-0">Our WALL TILES offer an affordable way to bring unique design from around the globe into your home. <span class="f-medium">Give your space a unique look</span> with <span class="f-bold">SECOORA</span>.</h1></div>
            </div>
        </div>
    </section>

    <section class="about pt-5 pb-5" id="profile">
        <div class="container">
            <div class="row">
            	<div class="col-md-12 col-lg-6 wow fadeInLeft">
                	<div class="about-content">
                    	<h1 class="text-uppercase"><small>who is SECOORA?</small>a bit about us</h1>
                        <hr class="hr" />
						  <p>In tile industries, Secoora Tiles is well know name in it self. A world of ceramic wall tiles
							which will give your home and offices a look of style and distinctiveness. An ISO
							9001:2008 certified company, Established a year ago, manufacturing high quality wall
							tiles by furnishing innovative and diversified product range. Secoora has got latest high-tech,
							well managed plant and well trained R &amp; D department and strong qualified professionals
							to serve you the finest product with foremost quality and services. We are growing day by
							day expanding our horizons consistently. We have spacious strong unit to ensure the
							procured product.</p>
						  <p>Different colour in various designs with unique texture will bring a wall ambience in your
							room. </p>
						  <p>For us quality is most important factor as it is the way to reach our customer satisfaction and trust.</p>
						  <p>We are offering friendly and timely response to our customer query. </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 wow fadeInRight">
					<div class="abt-img"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/VIVEKBHAI-AWARD-PHOTO-1.jpg"></div>
					<div class="row">
						<div class="col-md-6 col-lg-6">
							<a href="http://www.secooratiles.in/wp-content/uploads/secoora_iso_14001.jpg"><img class="img-fluid d-block m-auto pt-4 pb-4" src="http://www.secooratiles.in/wp-content/uploads/secoora_iso_14001.jpg"></a>
						</div>
						<div class="col-md-6 col-lg-6">
							<a href="http://www.secooratiles.in/wp-content/uploads/secoora_iso_9001.jpg"><img class="img-fluid d-block m-auto pt-4 pb-4" src="http://www.secooratiles.in/wp-content/uploads/secoora_iso_9001.jpg"></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<!-- <a href="<?php echo get_template_directory_uri(); ?>/images/003-ce.jpg"><img class="img-fluid d-block m-auto pt-4 pb-4" src="<?php echo get_template_directory_uri(); ?>/images/003-ce-t.jpg"></a> -->
						</div>						
					</div>
                	
                </div>
            </div>
        </div>
		<div class="p-4"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 wow fadeInRight">
                	<div class=""><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/our-vision-image.jpg"></div>
                </div>
            	<div class="col-md-12 col-lg-6 wow fadeInLeft">
                	<div class="f-light">
                    	<h1 class="text-uppercase">Our Vision</h1>
                        <hr class="hr" />
						<p>Company has grown in very short time is well appreciable. We want to work on policy of quality, trust and transparency.</p>
						<p>Company’s motto is to constantly work on customer’s satisfaction. Today Company name has gone out of India in form of exporting to various countries</p>
						<p>I warmly welcome into paradise of your thought, your search in choosing stylish wall tiles will end here.</p>
						<p>Our products are widely preferred across the world. We export to Saudi Arabia, Sudan, Sri Lanka, Yemen, Iraq, Qatar, Oman, Jamaica etc.</p>
        
                    </div>
                </div>

            </div>
        </div>
		
    </section>
    <section class="collection pt-5 pb-5" id="product">
    	<div class="container wow fadeInUp">
        	<h1 class="text-white text-center h1style1"><span><font class="f-bold">SECOORA</font> Collection 2021</span></h1>
            <p class="text-center text-white lead pt-2 mb-0 f-light w-75 d-block ml-auto mr-auto">Our catalogue is rich in wall tiles collections with glossy or satin finish, single tints or decorated, to finish off any space with style and personality.</p>
        </div>
        
		<div class="container product-cat">

        	<div class="row">
            	<div class="col-md-2 col-lg-1"><div class="size-vt1">300 X 300 mm</div></div>
                <div class="col-md-10 col-lg-11">
                	<div class="row">
                        <div class="col-md-12 col-lg-12 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a target="_blank" href="#" data-toggle="modal" data-target="#myModal3">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="http://www.secooratiles.in/wp-content/uploads/300X300_COOLROOFTILES_2.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Cool Roof Tiles</h5></div>
                                </a>
                            </div>
                        </div>											
                    </div>
                </div>
			</div>		
		
        	<div class="row">
            	<div class="col-md-2 col-lg-1 order-1 order-md-2"><div class="size-vt1">600 X 600 mm</div></div>
                <div class="col-md-10 col-lg-11 order-1 order-sm-2 order-md-1">
                	<div class="row">
                        <div class="col-md-6 col-lg-6 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a target="_blank" href="http://www.secooratiles.in/wp-content/uploads/SECOORA 600x600 Matt.pdf">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="http://www.secooratiles.in/wp-content/uploads/600x600_matt_series.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Matt Series</h5></div>
                                </a>
                            </div>
                        </div>					

                        <div class="col-md-6 col-lg-6 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a target="_blank" href="http://www.secooratiles.in/wp-content/uploads/SECOORA 600X600 GLOSSY.pdf">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="http://www.secooratiles.in/wp-content/uploads/600x600_glossy_series.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Glossy Series</h5></div>
                                </a>
                            </div>
                        </div>
						
                    </div>
                </div>
			</div>

        	<div class="row">
            	<div class="col-md-2 col-lg-1 order-1 order-md-2"><div class="size-vt1">600 X 1200 mm</div></div>
                <div class="col-md-10 col-lg-11 order-1 order-sm-2 order-md-1">
                	<div class="row">
                        <div class="col-md-6 col-lg-4 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a target="_blank" href="http://www.secooratiles.in/wp-content/uploads/Secoora 60x120 matt.pdf">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="http://www.secooratiles.in/wp-content/uploads/600x1200_matt.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Matt Series</h5></div>
                                </a>
                            </div>
                        </div>					

                        <div class="col-md-6 col-lg-4 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a target="_blank" href="http://www.secooratiles.in/wp-content/uploads/Secoora 60x120high gloss.pdf">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="http://www.secooratiles.in/wp-content/uploads/600x1200_high_glossy.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">High Glossy Series</h5></div>
                                </a>
                            </div>
                        </div>
						
                        <div class="col-md-6 col-lg-4 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a target="_blank" href="http://www.secooratiles.in/wp-content/uploads/Secoora 60x120glossy.pdf">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="http://www.secooratiles.in/wp-content/uploads/600x1200_glossy.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Glossy Series</h5></div>
                                </a>
                            </div>
                        </div>						
						
                    </div>
                </div>
			</div>			
			
			<div class="row">
			
            	<div class="col-md-2 col-lg-1 order-1 order-md-2"><div class="size-vt1">600 X 300 mm</div></div>
                <div class="col-md-10 col-lg-11 order-1 order-sm-2 order-md-1">
                	<div class="row">
                        <div class="col-md-6 col-lg-4 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a href="#" data-toggle="modal" data-target="#myModal3">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/001-coleccion-clasica.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Coleccion Clasica</h5></div>
                                </a>
                            </div>
                        </div>					
                    	<div class="col-md-6 col-lg-4">
							<div class="product-cat-item mt-5 wow rotateInDownLeft">
								<a href="#contact" data-pageid="206" class="more_posts">
									<div class="product-cat-item-img">
										<img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/002-glossy-series-1.jpg">
									</div>
									<div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Glossy Series 1</h5></div>
								</a>
							</div>

                        </div>
                    	<div class="col-md-6 col-lg-4">
							<div class="product-cat-item mt-5 wow rotateInDownLeft">
								<a href="#contact" data-pageid="206" class="more_posts">
									<div class="product-cat-item-img">
										<img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/002-glossy-series-2.jpg">
									</div>
									<div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Glossy Series 2</h5></div>
								</a>
							</div>

                        </div>						
						
                        <div class="col-md-6 col-lg-4 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a href="#contact" data-pageid="745" class="more_posts">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/003-matt-series.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Matt Series</h5></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow rotateInDownLeft d-none">
                            <div class="product-cat-item mt-5">
                                <a href="#contact" data-pageid="746" class="more_posts">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/pr-04.jpg" width="320" height="335">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">HD Elevation Series</h5></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a href="#" data-toggle="modal" data-target="#myModal3">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/004-kitchen-series.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Kitchen Series</h5></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow rotateInDownRight">
                            <div class="product-cat-item mt-5">
                                <a href="#" data-toggle="modal" data-target="#myModal3">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/005-wall-cladding.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Wall Cladding Series</h5></div>
                                </a>
                            </div>
                        </div>
						
                    </div>
                </div>
            </div>
        </div> 
		
    	<div class="container wow fadeInUp mt-5 pt-5 d-none">
			<div class="row">
				<div class="col-md-2">
					<img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/d0p1f-o16f9.jpg">
				</div>
				
				<div class="col-md-9">
					<h1 class="text-white text-center h1style1"><span>Revolutionary Change In <br /><font class="f-bold">Digital Walltiles</font> </span></h1>
					<p class="text-white text-center lead pt-2 mb-0 f-light d-block ml-auto mr-auto">SECOORA TILES Presents new innovation in Ceramic World first time in india. Its called <font class="f-bold">CBC (Crystal Blaze Coated) Tile</font>. CBC is the new spanish technology which is enhance glows of designs effective areas with micro crystals.</p>
				</div>				
			</div>
            
        </div>
		

		<div class="container product-cat d-none">
        	<div class="row">
            	<div class="col-md-2 col-lg-1 "><div class="size-vt1">600 X 300 mm</div></div>
                <div class="col-md-10 col-lg-11">
                	<div class="row">
                    	<div class="col-md-6 col-lg-3">
                            <div class="product-cat-item mt-5 wow rotateInDownLeft">
                                <a href="#">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/001-luxury-series.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Luxury Series</h5></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="product-cat-item mt-5 wow rotateInDownRight">
                                <a href="#">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/002-crystal-stone.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Crystal Stone Series</h5></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="product-cat-item mt-5 wow rotateInDownLeft">
                                <a href="#">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/003-sprinkled-lava.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Sprinkled Lava Series</h5></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="product-cat-item mt-5 wow rotateInDownRight">
                                <a href="#">
                                    <div class="product-cat-item-img">
                                        <img class="img-fluid d-block m-auto" src="<?php echo get_template_directory_uri(); ?>/images/004-silvaglow.jpg">
                                    </div>
                                    <div class="product-cat-item-desc text-center text-capitalize pt-3 pb-2"><h5 class="m-0">Silvaglow Series</h5></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  		
		
		<div class="container product-cat">
        	<!--206 glossy matt 745 elevation 746-->
        	<p><a href="#" data-pageid="746" class="more_posts btn btn-warning d-none">Load Post</a></p>
            <div class="loader_msg"></div>
            <div id="loader_ic" class="text-center">
				<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>            
            </div>
        	<div class="ajax_tiles_loader" >
            </div>
			<?php //get_template_part('tiles-size-page-home-ajax','') ?>
		</div>
		
    </section>

	<section class="info-btns pt-5 pb-5">
    	<div class="container">
        	<div class="row">
            	<div class="pt-0 pt-sm-0 col-md-4 wow fadeInLeft"><a class="ajax_page_load" title="Tiles Calculator" rel="72" href="<?php echo get_permalink(72); ?>"><img class="d-block m-auto img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/tiles-cal.jpg"></a></div>
            	<div class="pt-4 pt-sm-0 col-md-4 wow fadeInUp"><a class="ajax_page_load" title="Technical Details" rel="158" href="<?php echo get_permalink(158); ?>"><img class="d-block m-auto img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/technical-img.jpg"></a></div>
            	<div class="pt-4 pt-sm-0 col-md-4 wow fadeInRight"><a class="ajax_page_load" title="Download Brochure" rel="61" href="<?php echo get_permalink(61); ?>"><img class="d-block m-auto img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/download-brochure.jpg"></a></div>
            </div>
        </div>
    </section>
	
	<section class="export pt-5 pb-5 bg-light border-top" id="export">
		<div class="container wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
        	<h1 class="text-center h1style1"><span><font class="f-bold">EXPORT</font></span></h1>
            <p class="text-center lead pt-2 mb-0 f-light w-100 d-block ml-auto mr-auto">Secoora Tiles LLP is located about 190 kms from Mundra port, the largest port in India. Well connected, the port is easily accessible by road and its geographical proximity and easy connectivity ensure minimum time lag for a shipment. The port of Mundra is frequented by all major shipping lines and provides flexibility in choice of lines that can be used to send shipments across the world without any obstacles as well as on time.</p>
        </div>
		<div class="p-4"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-7 wow fadeInLeft">
				  <h3>20' Container - Wall Tiles</h3>
				  <hr class="hr">
				  <div class="space10"></div>
					<div class="table-responsive"><table class="table  table-striped " width="100%" cellspacing="0" cellpadding="0" border="0">
					  <tbody><tr>
						<th>Size</th>
						<td>300 x 600 MM</td>
						<td>300 x 450 MM</td>
						<td>300 x 300 MM</td>
					  </tr>
					  <tr>
						<th>No. Pallet</th>
						<td>20</td>
						<td>22</td>
						<td>22</td>
					  </tr>
					  <tr>
						<th>Boxes/pallet</th>
						<td>96 Boxes</td>
						<td>108 Boxes</td>
						<td>108 Boxes</td>
					  </tr>
					  <tr>
						<th>Total Boxes Container</th>
						<td>1920 Boxes</td>
						<td>2376 Boxes</td>
						<td>2376 Boxes</td>
					  </tr>
					  <tr>
						<th>Total SQMT/container</th>
						<td>1728 SQMT</td>
						<td>1924.56 SQMT</td>
						<td>1924.56 SQMT</td>
					  </tr>
					  <tr>
						<th>Approximate Tonnage</th>
						<td>27.3 MT</td>
						<td>27.3 MT</td>
						<td>27.3 MT</td>
					  </tr>
					</tbody></table></div>
				</div>
				<div class="col-sm-5 wow fadeInRight"><img class="d-block m-auto img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/truck_size2.png"></div>
			</div>
		</div>
		<div class="p-4"></div>
		<div class="container wow fadeInUp">
			<div class="row">
				<div class="col-sm-12">
					<div class="ps-inner-pad20"></div>
				  <h3>Wall Tile Packing Details</h3>
				  <hr class="hr">
				  <div class="table-responsive"><table class="table table-condensed table-bordered table-striped " width="100%" cellspacing="0" cellpadding="0" border="0">
					<thead class="">
		<tr>
					  <th align="center">Tile Size</th>
					  <th align="center">Tile Thickness</th>
					  <th align="center">Tiles/ box</th>
					  <th align="center">Sq.Mts/ box</th>
					  <th align="center">Boxes/ Pallet</th>
					  <th align="center">Sq.Mts./ Pallet</th>
					  <th align="center">Pallets/ Container </th>
					  <th align="center">Boxes/ Container</th>
					  <th align="center">Sq.Mts./ Container</th>
				  </tr>
		</thead>
					<tbody><tr>
					  <td align="center">300x600 MM</td>
					  <td align="center">9.5mm</td>
					  <td align="center">5</td>
					  <td align="center">0.90</td>
					  <td align="center">96</td>
					  <td align="center">86.4</td>
					  <td align="center">20</td>
					  <td align="center">1920</td>
					  <td align="center">1728</td>
				  </tr>
					<tr>
					  <td align="center">300x450 MM</td>
					  <td align="center">8.5mm</td>
					  <td align="center">6</td>
					  <td align="center">0.81</td>
					  <td align="center">108</td>
					  <td align="center">87.48</td>
					  <td align="center">22</td>
					  <td align="center">2376</td>
					  <td align="center">1924.56</td>
				  </tr>
					<tr>
					  <td align="center">300x300 MM</td>
					  <td align="center">8.5 mm</td>
					  <td align="center">9</td>
					  <td align="center">0.81</td>
					  <td align="center">108</td>
					  <td align="center">87.48</td>
					  <td align="center">22</td>
					  <td align="center">2376</td>
					  <td align="center">1924.56</td>
				  </tr>
				  </tbody></table></div>
				  <p>&nbsp;</p>
				</div>
			</div>
		</div>	
		
	
	</section>
    <section class="map-section-overlay" id="contact">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.5810426160892!2d70.94238531505654!3d22.854984785038212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39598edb1999486f%3A0xa4aaf8c065af64de!2sSecoora+tiles+llp!5e0!3m2!1sen!2sin!4v1521103345930" style="border:0" allowfullscreen="" frameborder="0" width="100%" height="550"></iframe>   
        
		<div class="inq-con-tabs">
        	<div class="container-f">
                <nav class="nav nav-pills shadow" id="v-pills-tab" role="tablist" aria-orientation="">
                  <a class="nav-link btn btn-lg active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Contact Us</a>
                  <a class="nav-link btn btn-lg" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Inquiry Form</a>
                  <!--<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>-->
                </nav>
				<div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            		<h2>Contact Us</h2>
                    <hr class="hr" />
                      <h5>Secoora Tiles LLP</h5>
                      <div class="space10"></div>
                      <ul class="fa-ul">
                        <li><i class="fa fa-li fa-map-marker"></i> S.R. No. 92, Morbi-Halvad Road, Near Liva Minereals, Unchi Mandal, <br>Morbi - 363642, Gujarat-India</li>
                        <li><i class="fa fa-li fa-phone"></i> +91-9727779928</li>
                        <li><i class="fa fa-li fa-envelope-o"></i> <a href="mailto:secooratilesllp@gmail.com">secooratilesllp@gmail.com</a></li>
                      </ul>
            
                          
                  </div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<div class="scrollbar-outer" style="">
						<h2>Corporate Inquiry</h2>
                        <hr class="hr" />
                        <p class="small">We welcome your approch to <span class="f-semi-bold">Secoora Tiles LLP</span>. Send your detailed inquiry and one of our executive will contact you shortly</p>
                        <h5>Inquiry Form</h5>
                       	<div class="" style=";">
                            <?php echo do_shortcode('[caldera_form id="CF585436d08a327"]'); ?>
                        </div>
					</div>
                  </div>
                  <!--<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>-->
                </div>


            </div>		        
        </div>             
            
    </section>
	

<?php //get_template_part('template_part/template_map',''); ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>