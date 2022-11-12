<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/manifest.json">
<meta name="msapplication-TileColor" content="#503c2c">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/ms-icon-144x144.png">
<meta name="theme-color" content="#503c2c">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>

<!--google translate-->
<!--<meta name="google-translate-customization" content="78b311ca89e2bae2-17684e30a806c7be-gf81cd9696e3318df-14"></meta>-->
</head>
<?php if(is_home() || is_front_page()): ?>
<body <?php body_class("home-pg"); ?> onLoad="body_loaded();">
<?php else : ?>
<body <?php body_class("inner-pg product-pg"); ?> onLoad="body_loaded();">
<?php endif; ?>

<div class="spinner">
	<div class="loading">
	  <div class="loading-bar"></div>
	  <div class="loading-bar"></div>
	  <div class="loading-bar"></div>
	  <div class="loading-bar"></div>
	</div>
</div>

<section class="mainsec hide1 clearfix">

<header class="header">
    <section class="top">
      <div class="container">
        <div class="row">
        	<div class="col-md-3">
        	  <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-fluid d-block m-auto" src="<?php echo get_header_image(); ?>" width="264" height="97"></a></div>
            </div>
            <div class="col-md-9 top-right text-left text-sm-right">
           	  <div class="support d-inline-block text-primary">Support<span class="f-bold">+91 9727779928</span></div>
              <div class="email d-inline-block text-primary">E-mail<span class="f-bold"><a href="mailto:secooratilesllp@gmail.com">secooratilesllp@gmail.com</a></span></div>
            </div>
        </div>
      </div>
    </section>

    <section class="main-nav position-fixed" id="main-nav-sec">
    	<div class="container">
            <nav class="navbar navbar-dark bg-primary navbar-expand-lg"> <a class="navbar-brand d-block d-lg-none" href="#">Menu</a>
              <button  type="button" class="navbar-toggler main-navbar-toggler hamburger hamburger--spring" data-toggle="collapse" data-target="#main-nav" aria-expanded="false"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
              <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav mr-auto navbar-left-nav">
					<?php wp_nav_menu( array('items_wrap' => '%3$s', 'theme_location' => 'main_top_menu', 'fallback_cb'  => 'wp_bootstrap_navwalker::fallback', 'walker'=>new wp_bootstrap_navwalker())); ?>
                  <!--<li class="nav-item active"> <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> </li>
                  <li class="nav-item"> <a class="nav-link" href="#">Profile</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="#">Products</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="#">Quality</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="#">Exports </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="#">Why Secoora? </a> </li>
                  <li class="nav-item"> <a class="nav-link" href="#">Contact</a> </li>-->
                </ul>
                <ul class="navbar-nav ml-auto prd-range">
                	<li class="nav-item"> <a class="nav-link" href="#">OUR PRODUCT RANGE</a> </li>
                </ul>
              </div>
            </nav>        
        </div>
    </section>
</header>
<div class="clearfix"></div>