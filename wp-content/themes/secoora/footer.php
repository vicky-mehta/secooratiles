<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


    <footer class="footer">
		<div class="contact-sec pt-5">
        	<div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-5 pb-5 d-flex align-items-stretch">
                        <div class="location c-icons">
                            <p class="lead f-medium mb-2">Mail Us:</p>
                            <p class="f-light m-0">S.R. No. 92, Morbi-Halvad Road, Near Liva Minereals, Unchi Mandal, Morbi - 363642, Gujarat-India</p>
                        </div>
                    </div>
                    <div class="col pb-5 d-flex align-items-stretch">
                        <div class="location c-icons p-icons">
                            <p class="lead f-medium mb-2">Phone & Fax:</p>
                            <p class="f-light m-0">Phone : +91 9727779928</p>
                        </div>
                    </div>
                    <div class="col pb-5 d-flex align-items-stretch">
                        <div class="location c-icons e-icons">
                            <p class="lead f-medium mb-2">E-mail Us :</p>
                            <p class="f-light m-0"><a href="mailto:secooratilesllp@gmail.com">secooratilesllp@gmail.com</a></p>
                        </div>
                    </div>
                </div>            
            </div>

        </div>
        <div class="footer-nav">
        	<div class="container pt-5">
            	<div class="row justify-content-md-center">
                	<div class="col-md-11">
                    	<div class="row">
                        	<div class="col-md-12 col-lg-3 pb-5"><img class="d-block img-fluid m-auto" src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" width="186" height="164"></div>
                            <div class="col-md-12 col-lg-9">
                                <div class="row">
                                    <div class="col-md-7 pb-5">
                                         <h1 class="h1style2"><span><font class="f-bold">Quick Links</font></span></h1>
                                         <hr class="hr hr2" />
                                         <div class="row">
                                            <div class="col">
                                                 <ul class="list01 list-unstyled">
													<?php wp_nav_menu( array('items_wrap' => '%3$s', 'menu' => 'Footer Menu' )); ?>
                                                    
                                                 </ul>
                                            </div>
                                            <div class="col-7">
                                                 <ul class="list01 list-unstyled">
													<?php wp_nav_menu( array('items_wrap' => '%3$s', 'menu' => 'Footer Menu 2' )); ?>
                                                 </ul>
                                            </div>
                                         </div>
    
                                    </div>
                                    <div class="col-md-5 pb-5">
                                         <h1 class="h1style2"><span><font class="f-bold">Product</font></span></h1>
                                         <hr class="hr hr2" />
                                         <div class="row">
                                            <div class="col-7 col-12">
                                            	<h5 class="f-medium">600 X 300 MM</h5>
                                                 <ul class="list01 list-unstyled">
													<?php wp_nav_menu( array('items_wrap' => '%3$s', 'menu' => 'Footer Product List' )); ?>
                                                 </ul>
                                                 <h5 class="f-medium">450x300 MM</h5>
                                                 <ul class="list01 list-unstyled">
                                                     <li id="" class=""><a href="#">GLOSSY SERIES</a></li>
                                                     <li id="" class=""><a href="#">HIGH GLOSS SERIES</a></li>
                                                     <li id="" class=""><a href="#">KITCHEN SERIES</a></li>
                                                     <li id="" class=""><a href="#">ELEVATION SERIES</a></li>
                                                     <li id="" class=""><a href="#">FISH & FLOWER SERIES </a></li>
                                                 </ul>

                                            </div>
                                            
                                         </div>
    
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container copyright pt-4 pb-4">
        	<div class="row">
            	<div class="col-md-7">
                	<span class="text-muted">© <?php echo do_shortcode('[year]'); ?> Secoora Tiles LLP.</span>
                </div>
                <div class="col-md-5 text-left text-md-right">
                	<ul class="list-unstyled list-inline mb-0">
                    	<li class="text-muted pr-3">Follows us: </li>
						 <?php //wp_nav_menu( array('items_wrap' => '%3$s', 'theme_location' => 'footer_menu' )); ?>
                    	<li><a href="#"><i class=" fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class=" fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class=" fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class=" fa fa-google-plus"></i></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </footer> 



<!--/* modal dialog */-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="content">...</div>

        <div class="progress hide">
          <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            <span class="sr-only">40% Complete (success)</span>
          </div>
        </div>    
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Inquiry Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<p>Please Submit form. Then you will able to download brochure or view our products.</p>
        	<?php echo do_shortcode('[caldera_form id="CF585436d08a327"]'); ?>
      </div>
      
    </div>
  </div>
</div>







<a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>
</section>
</body>
</html>