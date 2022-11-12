<?php
/**
 * Initialize the custom theme options.
 */
//add_action( 'admin_init', 'custom_theme_options' );
add_action( 'admin_init', 'custom_meta_boxes' );


/**
 * Build the custom settings & update OptionTree.
 */
function custom_meta_boxes($choices) {
  /**
   * Get a copy of the saved settings array. 
   */
  //$saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
   
$option=get_option('option_tree_settings');
$choices=array();
//wp_list_categories();
foreach($option['settings'][0]['choices'] as $value){
	$choices[]=$value;
}
$choices2=array();
//wp_list_categories();
foreach($option['settings'][1]['choices'] as $value){
	$choices2[]=$value;
}
$termlist=array();
$termlist[]=array(
		'value'       => "",
		'label'       => "Select Category",
		'src'         => ''
	);
$myterms = get_terms("category",'hide_empty=0');
foreach($myterms as $term){
	$termlist[]=array(
		'value'       => $term->slug,
		'label'       => $term->name,
		'src'         => ''
	);
}
  $my_meta_box1 = array( 
        'id'          => 'tiles_c1',
        'title'     => 'Tiles Size, Series Concept or not',
        'desc'        => '',
		'pages'     => array( 'post' ),
        'context'   => 'side',
		'priority'  => 'high',
		'fields'    => array(
		  array(
			'id'          => 'tiles_sizes',
			'label'       => 'Select Tiles Size',
			'desc'        => '',
			'std'         => '',
			'type'        => 'select',
			'section'     => 'general',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'choices'     => $choices
		  ),
		  array(
			'id'          => 'tiles_series',
			'label'       => 'Select Tiles Series',
			'desc'        => '',
			'std'         => '',
			'type'        => 'select',
			'section'     => 'general',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'choices'     => $choices2
		  ),
		  array(
			'id'          => 'is_this_concept_series_',
			'label'       => 'Is this concept series?',
			'desc'        => '',
			'std'         => '',
			'type'        => 'on-off',
			'section'     => 'general',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  )		  
		  
		)
  );    

  
  $my_meta_box2 = array( 
        'id'          => 'tiles_c',
        'title'     => 'Multiple Tiles or Single Tiles',
        'desc'        => '',
		'pages'     => array( 'post' ),
        'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
		  array(
			'id'          => 'add_tiles',
			'label'       => 'Add Tiles',
			'desc'        => '',
			'std'         => '',
			'type'        => 'gallery',
			'section'     => 'general',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  )
		)
  );  
  
  $my_meta_box3 = array( 
        'id'          => 'tiles_c2',
        'title'     => 'Select Tiles Category',
        'desc'        => '',
		'pages'     => array( 'page' ),
        'context'   => 'side',
		'priority'  => 'high',
		'fields'    => array(
		  array(
			'id'          => 'tiles_category',
			'label'       => 'Tiles Category',
			'desc'        => '',
			'std'         => '',
			'type'        => 'select',
			'section'     => 'general',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'choices'     => $termlist
		  ),
		  array(
			'id'          => 'tiles_sizes',
			'label'       => 'Select Tiles Size',
			'desc'        => '',
			'std'         => '',
			'type'        => 'select',
			'section'     => 'general',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'choices'     => $choices
		  ),
		  array(
			'id'          => 'tiles_series',
			'label'       => 'Select Tiles Series',
			'desc'        => '',
			'std'         => '',
			'type'        => 'select',
			'section'     => 'general',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'choices'     => $choices2
		  )		  
		)
  );   
  
  $my_meta_box4 = array( 
        'id'          => '_concept_tiles_image_upload',
        'title'     => 'Upload Tiles Concept',
        'desc'        => '',
		'pages'     => array( 'post' ),
        'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
		  array(
			'id'          => '_concept_tiles_upload',
			'label'       => '',
			'desc'        => '',
			'std'         => '',
			'type'        => 'upload',
			'section'     => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  )
		)
  );  

	ot_register_meta_box( $my_meta_box1 );
	ot_register_meta_box( $my_meta_box2 );
	ot_register_meta_box( $my_meta_box3 );
	ot_register_meta_box( $my_meta_box4 );
  //ot_register_meta_box( $my_meta_box );
 
  
}