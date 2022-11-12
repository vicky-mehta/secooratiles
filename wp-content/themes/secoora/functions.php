<?php
// Set content width value based on the theme's design
//if ( ! isset( $content_width ) )
	//$content_width = 870;

// Register Theme Features
function custom_theme_features()  {
	global $wp_version;

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );	

	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style( '' );	

	// Add theme support for Semantic Markup
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );	
	
	/* Removing the Navigation Container */
	function my_wp_nav_menu_args( $args = '' ) {
		$args['container'] = false;
		return $args;
	}
	add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
	
	/* add custome header image for logo 
	update your header.php file to: 
	<img src="<?php header_image(); ?>
" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />	
	*/
	$defaults = array(
		'default-image'          => get_template_directory_uri() . '/images/logo.png',
		'width'                  => 264,
		'height'                 => 97,
		'flex-height'            => false,
		'flex-width'             => true,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true,
		'default-text-color'     => '',
	);
	add_theme_support( 'custom-header', $defaults );		
	
	/*Adding .active class to active menu item bootstrap 4*/
	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 3);
	function special_nav_class($classes, $item, $args){
		//var_dump($item);
		if($args->theme_location=='main_top_menu'){
			 if( in_array('menu-item', $classes) ){
				 $classes[] = 'nav-item ';
			 }
		}	
		if($args->theme_location=='main_menu2'){
			 if( in_array('menu-item-type-custom', $classes) ){
				 $classes[] = 'list-inline-item ';
			 }
		}
		if($args->theme_location=='main_menu3'){
			 if( in_array('menu-item', $classes) ){
				 $classes[] = 'list-inline-item ';
			 }
		}		
		if( in_array('current-menu-item', $classes) ){
				$classes[] = 'active ';
		}
		 return $classes;
	}
	
	function add_specific_menu_location_atts( $atts, $item, $args ) {
		// check if the item is in the primary menu
		if( $args->theme_location == 'main_top_menu' ) {
		  // add the desired attributes:
		  $atts['class'] = 'nav-link';
		}
		return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );	
	
}

function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    //$wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

/*Replace “Howdy, admin” in WordPress admin bar */
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

/* How to remove menu items from WordPress admin panel/dashboard */
//add_action( 'admin_menu', 'remove_links_menu', 9999  );
function remove_links_menu() {
     //remove_menu_page('index.php'); // Dashboard
     //remove_menu_page('edit.php'); // Posts
     //remove_menu_page('upload.php'); // Media
     //remove_menu_page('link-manager.php'); // Links
     //remove_menu_page('edit.php?post_type=page'); // Pages
     //remove_menu_page('edit-comments.php'); // Comments
     //remove_menu_page('themes.php'); // Appearance
     remove_menu_page('plugins.php'); // Plugins
    // remove_menu_page('users.php'); // Users
     remove_menu_page('tools.php'); // Tools
	 remove_menu_page('ot-settings'); // Remove Option-Tree Plugin
	 //remove_menu_page('wpcf'); // remove types plugin
	 //remove_menu_page('duplicator'); // remove types plugin
     //remove_menu_page('options-general.php'); // Settings
}

/* remove welcome screen/panel on dashboard */
remove_action( 'welcome_panel', 'wp_welcome_panel' );

/*Change footer text in WordPress admin panel*/
function remove_footer_admin () {
  echo 'Developed By Ways Software';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*How to add featured image thumbnail to WordPress admin columns*/
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);

// Add the column
function tcb_add_post_thumbnail_column($cols){
  $cols['tcb_post_thumb'] = __('Featured');
  return $cols;
}

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);

// Grab featured-thumbnail size post thumbnail and display it.
function tcb_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'tcb_post_thumb':
      if( function_exists('the_post_thumbnail') )
       // echo the_post_thumbnail( 'admin-list-thumb');
	    echo the_post_thumbnail(array(100,100));
      else
        echo 'Not supported in theme';
      break;
  }
}

/*How to change WordPress admin and login page logo*/
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a {width:250px !important; height:92px !important;  background-size: 100% auto !important; background-image:url('.get_bloginfo('template_url').'/images/logo-small.png) !important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

function custom_logo() {
  echo '<style type="text/css">
    #header-logo { background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}
add_action('admin_head', 'custom_logo');

/*add custome css to login page */
function stylized_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/login.css" />';
}
//add_action('login_head', 'stylized_login');

/* The login page logo's default link is changed to the site url.  */
function the_url( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );

/* the login page logo title change */
function change_title() {
	 return get_bloginfo( 'name' );
}
add_filter('login_headertitle', 'change_title');

/*Change WordPress default FROM email address*/
//add_filter('wp_mail_from', 'new_mail_from');
//add_filter('wp_mail_from_name', 'new_mail_from_name');
function new_mail_from($old) {
 return get_bloginfo('admin_email');
}
function new_mail_from_name($old) {
 return get_bloginfo('name');
}

/*Remove WordPress Dashboard Widgets*/
function remove_dashboard_widgets() {
	global $wp_meta_boxes;
	//var_dump($wp_meta_boxes);
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['welcome-panel']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>';
	echo '<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

/**
 * Filter the page title. */
function wp_post_page_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'wp_post_page_title', 10, 2 );


function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/* prev | 1 | 2 | 3 | next navigation
usage 
content_nav(null);
or custom loop wp_query

		The Query
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args=array(
			'post_type' => 'prod_concept',
			'posts_per_page'=>9,
			'paged' => $paged
		);
		$the_query = new WP_Query( $args );
content_nav($the_query);
add just before wp_reset_postdata();	
		
*/
function content_nav( $query ) {
	if(!isset($query)) {
		global $wp_query;
		$query=$wp_query;

	}
	//global $wp_query;
	//var_dump($wp_query);
	$html_id = esc_attr( $html_id );
	if(isset($_POST['current_page']))
		$page = (isset($_POST['current_page'])) ? $_POST['current_page'] : 1;
	else 
		$page=get_query_var('paged');
	$big = 999999999; // need an unlikely integer
	ob_start();
	echo '<div class="clearfix"></div><div class="bs-pagination text-center">';
	$pagination =  paginate_links( array(
		/*'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),*/
		'base'               => '%_%',
		'format' => '?paged=%#%',
		'current' => max( 1, $page ),
		'type' => 'array',
		'show_all'=>true,
		'total' => $query->max_num_pages
	) );
	if ( ! empty( $pagination ) ) :
		echo '<ul class="pagination justify-content-center">';
			foreach ( $pagination as $key => $page_link ) :
					
				 echo '<li class="page-item '.(( strpos( $page_link, 'current' ) !== false ) ? 'active' : '').'">'.str_replace('page-numbers','page-link',$page_link).'</li>';
			endforeach;
		echo '</ul>';
	endif;
	echo '</div>';
	$links = ob_get_clean();
	echo  $links;
	//var_dump(paginate_links);
}

/* limit post per archive page */
function limit_posts_per_archive_page() {
	$desc=category_description();
	if (!is_admin() && is_category() && ($desc == 'concept_tiles' )) {
		//set_query_var('posts_per_page', 4);
		//set_query_var( 'order', 'ASC' );
	}else {
		//set_query_var('posts_per_page', 12);
		//set_query_var( 'order', 'ASC' );
	}
	if(!is_admin() && is_tax()) {
		//set_query_var('posts_per_page', 9);
		//set_query_var( 'order', 'ASC' );
	}
}
//add_filter('pre_get_posts', 'limit_posts_per_archive_page');

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'custom_theme_features' );


// Register Navigation Menus
function custom_navigation_menus() {

	$locations = array(
		'main_top_menu' => 'Main Top Menu',
		'footer_menu' => 'footer menu',
		'product_menu' => 'Product Menu'
		
	);
	register_nav_menus( $locations );

}
// Hook into the 'init' action
add_action( 'init', 'custom_navigation_menus' );



// Register Script
function func_javascript() {

	//wp_deregister_script( 'jquery' );
	//wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery.1.11.1.min.js', false, '1.7.2', true );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'popper_js', get_template_directory_uri().'/js/popper.min.js', array( 'jquery' ), null, true );
	
	
	wp_register_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '3.1', true );
	wp_enqueue_script( 'bootstrap' );
	
	//wp_register_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '3.1', true );

	//wp_register_script( 'owl_carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array( 'jquery' ), false, true );
	//wp_enqueue_script( 'owl_carousel' );
	
	
	//wp_register_script( 'html5', get_template_directory_uri().'/js/html5.js', array( 'jquery' ), false, true );
	//wp_enqueue_script( 'html5' );
	
	//wp_register_script( 'modernizr', get_template_directory_uri().'/js/modernizr.js', array( 'jquery' ), false, true );
	//wp_enqueue_script( 'modernizr' );	
	
	wp_enqueue_script( 'smartmenus_js', get_template_directory_uri().'/js/jquery.smartmenus.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'smartmenus_bootstrap_js', get_template_directory_uri().'/js/jquery.smartmenus.bootstrap-4.min.js', array( 'jquery', 'smartmenus_js' ), null, true );
	
	wp_enqueue_script( 'venobox_min_js', get_template_directory_uri().'/venobox/venobox.min.js', array( 'jquery' ), null, true );
	
	wp_enqueue_script( 'jquery_scrollbar_js', get_template_directory_uri().'/js/jquery.scrollbar.min.js', array( 'jquery' ), '', true );

	
	wp_enqueue_script( 'wow_js', get_template_directory_uri().'/js/wow.js', array( 'jquery' ), null, true );
	
	wp_register_script( 'custom', get_template_directory_uri().'/js/custom.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'custom' );			
	
	if(get_query_var( 'paged' )) {
		$currentpage=get_query_var('paged');
	}elseif(get_query_var( 'gallery_page' )) {
		$currentpage=get_query_var('gallery_page');
	}else {
		$currentpage=1;
	}
	
	
	wp_localize_script( 'custom', 'ajax_posts', array(
		'ajaxurl_bs1' => admin_url( 'admin-ajax.php' ),
		'current_page' => $currentpage,
		'noposts_bs1' => __('No older posts found', 'twentyfifteen'),
	));		
	

	//wp_register_script( 'ie10-viewport', get_template_directory_uri().'/js/ie10-viewport-bug-workaround.js', array( 'jquery' ), false, true );
	//wp_enqueue_script( 'ie10-viewport' );	
}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'func_javascript' );

/* custome featured image custom size image size for slider */
//add_image_size( 'slider-image', 1150, 302, array( 'center', 'top' ) );
add_image_size( 'concept-thumb', 350, 200, array( 'center', 'top' ) );

// Register Style
function func_styles() {
	
	//wp_register_style( 'bootstrap',  get_template_directory_uri().'/css/bootstrap.min.css', false, '1' );
	//wp_enqueue_style( 'bootstrap' );
	
	//wp_register_style( 'font-awesome',  get_template_directory_uri().'/css/font-awesome.min.css', false, '1' );
	//wp_enqueue_style( 'fontello' );	
	
	//wp_register_style( 'normalize',  get_template_directory_uri().'/css/normalize.css', false, '1' );
	//wp_enqueue_style( 'normalize' );	


	wp_enqueue_style( 'my-theme', get_stylesheet_uri() ); // Load the main stylesheet
	
	wp_enqueue_style( 'bootstrap-css',  get_template_directory_uri().'/css/theme.min.css', array( 'my-theme' ), null, 'all' );
	wp_enqueue_style( 'offset-css',  get_template_directory_uri().'/css/offset.css', array( 'my-theme' ), null, 'all' );
	//wp_enqueue_style( 'ie10-viewport-bug-workaround-css',  get_template_directory_uri().'/css/ie10-viewport-bug-workaround.css', array( 'my-theme' ), false, 'all' );
	wp_enqueue_style( 'font-awesome-css',  get_template_directory_uri().'/css/font-awesome.min.css', array( 'my-theme' ), null, 'all' );
	
	wp_enqueue_style( 'smartmenus-css',  get_template_directory_uri().'/css/jquery.smartmenus.bootstrap-4.css', array( 'my-theme' ), null, 'all' );

	wp_enqueue_style( 'animate-css',  get_template_directory_uri().'/css/animate.css', array( 'my-theme' ), null, 'all' );

	wp_enqueue_style( 'jquery-scrollbar-css', get_template_directory_uri().'/css/jquery.scrollbar.css', array( 'my-theme' ), false, 'all' );
	
	
	wp_enqueue_style( 'venobox-css',  get_template_directory_uri().'/venobox/venobox.css', array( 'my-theme' ), null, 'all' );

	wp_enqueue_style( 'custom-css',  get_template_directory_uri().'/css/custom.css', array( 'my-theme' ), null, 'all' );
	

	//wp_register_style( 'main',  get_template_directory_uri().'css/style.css', false, '1' );
	//wp_enqueue_style( 'main' );

	//wp_register_style( 'nivoslider_css',  get_template_directory_uri().'/css/slider.css', false, '1' );
	//wp_enqueue_style( 'nivoslider_css' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'func_styles' );

/**
* Creates a shortcode that links to other
* content on your site.
EXAMPLE:
[pl id='33']
RETURNS:
http://wwww.mysite.com/hello-world

EXAMPLE:
<a href="[pl id='33']">read me</a>
 
RETURNS:
<a href="http://wwww.mysite.com/hello-world">read me</a>

EXAMPLE:
[pl id='33' link='1']
 
RETURNS:
<a href="http://wwww.mysite.com/hello-world">Hello, World!</a>

EXAMPLE:
[pl id='33' link='1' title='Read!']
RETURNS:
<a href="http://wwww.mysite.com/hello-world">Read!</a>

EXAMPLE: 
[pl id='33' link='1' title='Read!' class="primary"] 
suppported value for type primary, info, success, warning, danger
RETURNS:
<a href="http://wwww.mysite.com/hello-world" class="primary">Read!</a>

*/
function my_permalink_shortcode($atts) {
 
// Check that $id exists.
$id = intval($atts['id']);
if ($id <= 0) { return; }
// Check that $id has a URL.
$url = get_permalink($id);
if ($url == '') { return; }
// Get link option and title.
//$type=$atts['type'];
$class1=$atts['class'];

if($class1) {
	$class='class="'.$class1.'"';
}
else {
	$class='';
}

$link = ($atts['link'] == '1') ? true : false;
$title = (trim($atts['title']) == '') ? get_the_title($id) : $atts['title'];
if($class1=="samplebtn") {
	$title="&nbsp;";
}
$title2 = get_the_title($id);
// Determine if we create a link.
if ($link) {
	return '<a '.$class.' title="'.$title2.'" href="'.$url.'"> '.$title.'</a>';
} else {
	return $url;
}
}
add_shortcode('pl', 'my_permalink_shortcode');


/* WordPress Breadcrumb navigation Function Code */

function breadcrumb_navigation() {
$delimiter = '';
$home = get_bloginfo('name');
$before = '<li>';
$after = '</li>';
echo '';
global $post;
$homeLink = get_bloginfo('url');
	echo '<li><a href="' . $homeLink . '">' . 'home' . '</a></li> ' . $delimiter . ' ';
if ( is_category() ) {
	global $wp_query;
	$cat_obj = $wp_query->get_queried_object();
	$thisCat = $cat_obj->term_id;
	$thisCat = get_category($thisCat);
	$parentCat = get_category($thisCat->parent);
if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
echo $before . '' . single_cat_title('', false) . '' . $after;
} elseif ( is_day() ) {
echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
echo $before . 'Archive by date "' . get_the_time('d') . '"' . $after;
} elseif ( is_month() ) {
echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
echo $before . 'Archive by month "' . get_the_time('F') . '"' . $after;
} elseif ( is_year() ) {
echo $before . 'Archive by year "' . get_the_time('Y') . '"' . $after;
} elseif ( is_single() && !is_attachment() ) {
if ( get_post_type() != 'post' ) {
$post_type = get_post_type_object(get_post_type());
$slug = $post_type->rewrite;
echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter . ' ';
echo $before . get_the_title() . $after;
} else {
$cat = get_the_category(); $cat = $cat[0];
echo '<li>' . get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . '</li> ';
echo $before . ' ' . get_the_title() . '' . $after;
}
} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
$post_type = get_post_type_object(get_post_type());
echo $before . $post_type->labels->singular_name . $after;
} elseif ( is_attachment() ) {
$parent_id  = $post->post_parent;
$breadcrumbs = array();
while ($parent_id) {
$page = get_page($parent_id);
$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
$parent_id    = $page->post_parent;
}
$breadcrumbs = array_reverse($breadcrumbs);
foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
echo $before . '' . get_the_title() . '' . $after;
} elseif ( is_page() && !$post->post_parent ) {
echo $before . '' . get_the_title() . '' . $after;
} elseif ( is_page() && $post->post_parent ) {
$parent_id  = $post->post_parent;
$breadcrumbs = array();
while ($parent_id) {
$page = get_page($parent_id);
$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
$parent_id    = $page->post_parent;
}
$breadcrumbs = array_reverse($breadcrumbs);
foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
echo $before . '' . get_the_title() . '' . $after;
} elseif ( is_search() ) {
echo $before . 'Search results for "' . get_search_query() . '"' . $after;
} elseif ( is_tag() ) {
echo $before . 'Archive by tag "' . single_tag_title('', false) . '"' . $after;
} elseif ( is_author() ) {
global $author;
$userdata = get_userdata($author);
echo $before . 'Articles posted by "' . $userdata->display_name . '"' . $after;
} elseif ( is_404() ) {
echo $before . 'You got it "' . 'Error 404 not Found' . '"&nbsp;' . $after;
}
if ( get_query_var('paged') ) {
	if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		echo ('Page') . ' ' . get_query_var('paged');
	if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
}
echo '';
}

/* current year short code for copyright */
function currentYear_shortcode_function(){
	return date('Y');
}
add_shortcode('year', 'currentYear_shortcode_function');

// Obscure login screen error messages
function wpfme_login_obscure(){ return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';}
add_filter( 'login_errors', 'wpfme_login_obscure' );


// Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling
function wpfme_remove_img_ptags($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'wpfme_remove_img_ptags');

/* add iframe shortcoe */ 
// usage [iframe src="http://www.yoursite.com/file_url.html" width="700" height="800"] 
add_shortcode('iframe', 'ag_iframe');
function ag_iframe($atts, $content) {
 if (!$atts['width']) { $atts['width'] = 630; }
 if (!$atts['height']) { $atts['height'] = 1500; }

 return '<div class="clear"></div><iframe border="0" frameborder="0" scrolling="no" class="shortcode_iframe" src="' . $atts['src'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '"></iframe><div class="clear"></div>';
}

function custom_excerpt_length( $length ) {
	if(!is_admin() && is_home()) {
		return 14;
	}
	else {
		return 50;
	}
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*Make the "read more" link to the post  */
function new_excerpt_more( $more ) {
	if(!is_admin() && is_home()) {
		return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('More') . '</a>';
	}else {
		return '<br /><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('More') . '</a>';
	}
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/*Disable Admin Bar for All Users*/
show_admin_bar(false);

/* add custom admin columns for post */
add_filter( 'manage_edit-post_columns', 'my_edit_post_columns' ) ;

function my_edit_post_columns( $columns ) {
	$columns['size'] = 'Size';
	$columns['series'] = 'Series';
	return $columns;
}
add_action( 'manage_post_posts_custom_column', 'my_manage_movie_columns', 10, 2 );
function my_manage_movie_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'series' :
			$series = get_post_meta( $post_id, 'tiles_series', true );
			if ( empty( $series ) )
				echo __( 'Unknown' );
			else
				printf( __( '%s' ), $series );
		break;
		case 'size' :
			$series = get_post_meta( $post_id, 'tiles_sizes', true );
			if ( empty( $series ) )
				echo __( 'Unknown' );
			else
				printf( __( '%s' ), $series );

		break;
	}
}

/* load meta boxes */
load_template( trailingslashit( get_template_directory() ) . '/meta-boxes.php' ); 

/* custome query series */
function add_query_vars_filter( $vars ){
  $vars[] = "series";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

/* prdocut concept */

// Register Custom Post Type
function prod_concept_func() {

	$labels = array(
		'name'                => 'Product Concepts',
		'singular_name'       => 'Product Conept',
		'menu_name'           => 'Prodcut Concept',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'All Concepts Items',
		'view_item'           => 'View Concepts',
		'add_new_item'        => 'Add New Concept Item',
		'add_new'             => 'Add New Concept',
		'edit_item'           => 'Edit Concept Item',
		'update_item'         => 'Update Concept Item',
		'search_items'        => 'Search Concept Item',
		'not_found'           => 'Concept Not found',
		'not_found_in_trash'  => 'Concept Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'product-concept',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'prod_concept',
		'description'         => 'Add Product Concepts Here',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'post-formats', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-lightbulb',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'prod_concept', $args );

}
// Hook into the 'init' action
add_action( 'init', 'prod_concept_func', 0 );

// Register Custom Taxonomy
function prod_concept_tax_func() {

	$labels = array(
		'name'                       => 'Product Concept Sizes',
		'singular_name'              => 'Product Concept Size',
		'menu_name'                  => 'Product Concept Size',
		'all_items'                  => 'All Sizes',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Size',
		'edit_item'                  => 'Edit Size',
		'update_item'                => 'Update Size',
		'separate_items_with_commas' => 'Separate Size with commas',
		'search_items'               => 'Search Size',
		'add_or_remove_items'        => 'Add or remove Size',
		'choose_from_most_used'      => 'Choose from the most used Size',
		'not_found'                  => 'Not Found',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'prod_concept_tax', array( 'prod_concept' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'prod_concept_tax_func', 0 );

add_filter('init', 'wpse124169_attachment_gallery_add_query_var');
function wpse124169_attachment_gallery_add_query_var() {
	global $wp;
	$wp->add_query_var('gallery_page');
}


/* Force wordpress sub categories to use the same template of the parent category */
//add_action('template_redirect', 'inheritParentTemplate');
function inheritParentTemplate() {
    if (is_category()) {
        $catid = get_query_var('cat'); //current category id
        $category = get_category($catid);
        $parent = $category->category_parent; //immediate parent
		$parent2 = get_category($parent); //immediate parent
		
		$p1_1=get_category($category->category_parent);
		$p2_1=get_category($p1_1->category_parent);
		///$p1=
		var_dump($p2_1->name);
        if ($parent){
            $parentCategory = get_category($parent);
            if(("Others"==$parentCategory->name) || ("Others"==$p2_1->name)){
                if ( file_exists(TEMPLATEPATH . '/category-others' . '.php') ) {
                   // include (TEMPLATEPATH . '/category-others' . '.php');
                }
                return true;
            }
        }
    }
}

/*How to disable responsive images srcset in WP 4.4*/
function disable_srcset( $sources ) {
	return false;
}
add_filter( 'wp_calculate_image_srcset', 'disable_srcset' );


if ( file_exists(  __DIR__ . '/template_part/wp_bootstrap_navwalker.php' ) ) {
  require_once  __DIR__ . '/template_part/wp_bootstrap_navwalker.php';
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


function image_tag_class($class) {
    $class .= 'img-fluid ';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );

/* wrap the_content with div */
add_filter( 'the_content', 'my_the_content_filter' );
function my_the_content_filter($content) {
	return '<div class="entry-content clearfix">'.$content.'</div>';
}

/** 
 * Bootstrap support for core wordpress widgets
 */
function brw_bootstrap_widget_output_filters( $widget_output, $widget_type, $widget_id ) {
	if ( 'categories' == $widget_type ) {
      		$widget_output = str_replace('<ul>', '<ul class="list01">', $widget_output);
      		$widget_output = str_replace('<li class="cat-item cat-item-', '<li class="cat-item cat-item-', $widget_output);
      		$widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
      		$widget_output = str_replace(')', ' </span>', $widget_output);
    	}
    	elseif ( 'calendar' == $widget_type ) {
		$widget_output = str_replace('calendar_wrap', 'calendar_wrap table-responsive', $widget_output);
        	$widget_output = str_replace('<table id="wp-calendar', '<table class="table table-condensed" id="wp-calendar', $widget_output);
    	}
    	elseif ( 'tag_cloud' == $widget_type )  {
		$regex = "/(<a[^>]+?)( style='font-size:.+pt;'>)([^<]+?)(<\/a>)/";
		$replace_with = "$1><span class='label label-primary'>$3</span>$4";
		$widget_output = preg_replace( $regex , $replace_with , $widget_output );
	}
  	elseif ( 'archives' == $widget_type ) {
      		$widget_output = str_replace('<ul>', '<ul class="list01">', $widget_output);
      		$widget_output = str_replace('<li>', '<li class="archive-list-group-item">', $widget_output);
		$widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
   		$widget_output = str_replace(')', ' </span>', $widget_output);
   	}
  	elseif ( 'meta' == $widget_type ) {
        	$widget_output = str_replace('<ul>', '<ul class="list01">', $widget_output);
        	$widget_output = str_replace('<li>', '<li class="meta-list-group-item">', $widget_output);
   	}
  	elseif ( 'recent-posts' == $widget_type ) {
        	$widget_output = str_replace('<ul>', '<ul class="list01">', $widget_output);
        	$widget_output = str_replace('<li>', '<li class="recent-posts-list-group-item">', $widget_output);
   	}
  	elseif ( 'recent-comments' == $widget_type ) {
        	$widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list01">', $widget_output);
        	$widget_output = str_replace('<li class="recentcomments">', '<li class="recentcomments recent-comments-list-group-item">', $widget_output);
   	}
  	elseif ( 'pages' == $widget_type ) {
        	$widget_output = str_replace('<ul>', '<ul class="list01">', $widget_output);
   	}
  	elseif ( 'nav_menu' == $widget_type ) {
        	$widget_output = str_replace(' class="menu"', 'class="menu nav"', $widget_output);
   	}
    //return $params;	
      return $widget_output;
}
add_filter( 'widget_output', 'brw_bootstrap_widget_output_filters', 10, 3 );

// if no title then add widget content wrapper to before widget
//add_filter( 'dynamic_sidebar_params', 'check_sidebar_params' );
function check_sidebar_params( $params ) {
    global $wp_registered_widgets;

    $settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
    $settings = $settings_getter->get_settings();
    $settings = $settings[ $params[1]['number'] ];

    if ( $params[0][ 'after_widget' ] == '</div></div></div>' && isset( $settings[ 'title' ] ) && empty( $settings[ 'title' ] ) )
        $params[0][ 'before_widget' ] .= '<div class="panel-body">';
		
	if ($params[0]['widget_name'] == 'Recent Posts') {
		var_dump($params);
	}

    return $params;
}


function custom_brochure() {
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'text_domain' ),
		'id' => 'sidebar1',
		'description' => __( 'Display Sidebar Items for static pages', 'text_domain' ),
		'before_widget' => '<div class="clear"></div><div id="%1$s" class="widget %2$s clearfix"><div class="sidebar-block">',
		'after_widget' => '</div></div></div>',
		'before_title' => '<h3 class="sidebar-title">',
		'after_title' => '</h3>',
	) );
			
}
// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'custom_brochure' );


//Set Default Meta Value
function set_default_meta_new_post($post_ID){
	$current_field_value = get_post_meta($post_ID,'tiles_series',true); //change YOUMETAKEY to a default 
	$current_field_value2 = get_post_meta($post_ID,'tiles_sizes',true);
	$default_meta1 = 'matt'; //set default value
	$default_meta2 = '30_x_60cm'; //set default value
	if ($current_field_value == '' && !wp_is_post_revision($post_ID)){
		add_post_meta($post_ID,'tiles_series',$default_meta1,true);
	}
	if ($current_field_value2 == '' && !wp_is_post_revision($post_ID)){
		add_post_meta($post_ID,'tiles_sizes',$default_meta2,true);
	}

	/*
	$current_field_value3 = get_post_meta($post_ID,'add_tiles',true);
	$default_meta3 = '1724,1725'; //set default value
	if ($current_field_value3 == '' && !wp_is_post_revision($post_ID)){
		add_post_meta($post_ID,'add_tiles',$default_meta3,true);
	}
	*/

	return $post_ID;
}

//add_action('wp_insert_post','set_default_meta_new_post');


function more_post_ajax(){
	global $wpdb;

	//global $wp_query;
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 1;
    //$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
	$page = (isset($_POST['current_page'])) ? $_POST['current_page'] : 1;
	$current_project=(isset($_POST['current_project'])) ? $_POST['current_project'] : '';
	$pageid=(isset($_POST["pageid"])) ? $_POST["pageid"] : 206;
    header("Content-Type: text/html");

	if($pageid==746)
		include(locate_template('tiles-size-page-home-ajax2.php'));
	else 
		include(locate_template('tiles-size-page-home-ajax.php'));
	/*
    $args = array(
        'suppress_filters' => true,
        'posts_per_page' => $ppp,
        'paged'    => $page,
		'post_type' => array('post'),
		'posts_per_archive_page'=>$ppp,
		'pagination'             => true,
		'order'=>'ASC',
    );

    $loop = new WP_Query($args);
    $out = '';
	
    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
		$project=get_post_custom(get_the_ID());
		
	get_template_part( 'template_part/template_loop_ajax');
		
    endwhile;
	wp_reset_postdata();
    endif;
	*/
    die();
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


// Activate WordPress Maintenance Mode
function wp_maintenance_mode(){
    if(!current_user_can('edit_themes') || !is_user_logged_in()){
        wp_die('<h1 style="color:red">Website under Maintenance</h1><br />We are performing scheduled maintenance. We will be back on-line shortly!');
    }
}
//add_action('get_header', 'wp_maintenance_mode');

add_shortcode('themedir', 'themedir_funct');
function themedir_funct($atts, $content) {
 return get_bloginfo('template_directory');
}