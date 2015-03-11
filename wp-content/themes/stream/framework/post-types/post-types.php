<?php 

/*-----------------------------------------------------------------------------------*/
/*	Team Taxanomy
/*-----------------------------------------------------------------------------------*/

function team_register() {  
    	 
	 $team_labels = array(
	 	'name' => __( 'Team', 'taxonomy general name', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'People Item', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search People Item', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'Team', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent People Item', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit People Item', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update People Item', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New People Item', 'INFINITE_LANGUAGE')
	 );
	 
	 $options = get_option('infinite_options');
	 $custom_slug = null;		
	 
	 if(!empty($options['team_rewrite_slug'])) $custom_slug = $options['team_rewrite_slug'];
	
	 $args = array(
			'labels' => $team_labels,
			'rewrite' => array('slug' => $custom_slug,'with_front' => false),
			'singular_label' => __('Person', 'INFINITE_LANGUAGE'),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 9,
			'menu_icon' => 'dashicons-groups',
			'supports' => array('title', 'editor', 'thumbnail', 'comments')  
       );  
  
    register_post_type( 'team' , $args );
	
	$category_labels = array(
		'name' => __( 'Disciplines', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'Discipline', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search Discipline', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'All Discipline', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent Discipline', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit Discipline', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update Discipline', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New Discipline', 'INFINITE_LANGUAGE'),
    	'menu_name' => __( 'Disciplines', 'INFINITE_LANGUAGE')
	); 	

	register_taxonomy("disciplines", 
			array("team"), 
			array("hierarchical" => true, 
				'labels' => $category_labels,
				'show_ui' => true,
    			'query_var' => true,
				'rewrite' => array( 'slug' => 'disciplines' )
	));
	
	$attributes_labels = array(
		'name' => __( 'Attributes', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'Attribute', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search Attributes', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'All Attributes', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent Attribute', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit Attribute', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update Attribute', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New Attribute', 'INFINITE_LANGUAGE'),
		'new_item_name' => __( 'New Attribute', 'INFINITE_LANGUAGE'),
		'menu_name' => __( 'Attributes', 'INFINITE_LANGUAGE')
	); 	
	
	register_taxonomy('attributes',
		array('team'),
		array('hierarchical' => true,
		'labels' => $attributes_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'attributes' )
	));
} 
add_action('init', 'team_register');

// Include Single Team
function include_template_team_function( $template_path ) {
if ( get_post_type() == 'team' ) {
	if ( is_single() ) {
		$template_path = get_template_directory() . '/framework/post-types/single-team.php';
	}
}
return $template_path;
}

add_filter( 'template_include', 'include_template_team_function', 1 );

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Taxanomy
/*-----------------------------------------------------------------------------------*/

function portfolio_register() {  
    	 
	 $portfolio_labels = array(
	 	'name' => __( 'Portfolio', 'taxonomy general name', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'Portfolio Item', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search Portfolio Item', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'Portfolio', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent Portfolio Item', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit Portfolio Item', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update Portfolio Item', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New Portfolio Item', 'INFINITE_LANGUAGE')
	 );
	 
	 $options = get_option('infinite_options');
	 $custom_slug = null;		
	 
	 if(!empty($options['portfolio_rewrite_slug'])) $custom_slug = $options['portfolio_rewrite_slug'];
	
	 $args = array(
			'labels' => $portfolio_labels,
			'rewrite' => array('slug' => $custom_slug,'with_front' => false),
			'singular_label' => __('Project', 'INFINITE_LANGUAGE'),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 8,
			'menu_icon' => 'dashicons-portfolio',
			'supports' => array('title', 'editor', 'thumbnail', 'comments')  
       );  
  
    register_post_type( 'portfolio' , $args );
	
	$categories_portfolio_labels = array(
		'name' => __( 'Project Categories', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'Project Category', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search Project Categories', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'All Project Categories', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent Project Category', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit Project Category', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update Project Category', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New Project Category', 'INFINITE_LANGUAGE'),
		'menu_name' => __( 'Project Categories', 'INFINITE_LANGUAGE')
	); 	
	
	register_taxonomy("project-category", 
			array("portfolio"), 
			array("hierarchical" => true, 
					'labels' => $categories_portfolio_labels,
					'show_ui' => true,
					'query_var' => true,
					'rewrite' => array( 'slug' => 'project-category' )
	));
	
	$attributes_portfolio_labels = array(
		'name' => __( 'Project Attributes', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'Project Attribute', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search Project Attributes', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'All Project Attributes', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent Project Attribute', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit Project Attribute', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update Project Attribute', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New Project Attribute', 'INFINITE_LANGUAGE'),
		'new_item_name' => __( 'New Project Attribute', 'INFINITE_LANGUAGE'),
		'menu_name' => __( 'Project Attributes', 'INFINITE_LANGUAGE')
	); 	
	
	register_taxonomy('project-attribute',
		array('portfolio'),
		array('hierarchical' => true,
		'labels' => $attributes_portfolio_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'project-attribute' )
	));  
}  
add_action('init', 'portfolio_register');

// Include Single Portfolio

function include_template_portfolio_function( $template_path ) {
if ( get_post_type() == 'portfolio' ) {
	if ( is_single() ) {
		$template_path = get_template_directory() . '/framework/post-types/single-portfolio.php';
	}
}
return $template_path;
}

add_filter( 'template_include', 'include_template_portfolio_function', 1 );

/*-----------------------------------------------------------------------------------*/
/*	KnowledgeBase Taxanomy
/*-----------------------------------------------------------------------------------*/

function knowledgebase_register() {  
    	 
	 $knowledgebase_labels = array(
	 	'name' => __( 'KnowledgeBase', 'taxonomy general name', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'KnowledgeBase Item', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search KnowledgeBase Item', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'KnowledgeBase', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent KnowledgeBase Item', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit KnowledgeBase Item', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update KnowledgeBase Item', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New KnowledgeBase Item', 'INFINITE_LANGUAGE')
	 );
	 
	 $options = get_option('infinite_options');
	 $custom_slug = null;		
	 
	 if(!empty($options['knowledgebase_rewrite_slug'])) $custom_slug = $options['knowledgebase_rewrite_slug'];
	
	 $args = array(
			'labels' => $knowledgebase_labels,
			'rewrite' => array('slug' => $custom_slug,'with_front' => false),
			'singular_label' => __('Project', 'INFINITE_LANGUAGE'),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-welcome-learn-more',
			'supports' => array('title', 'editor', 'thumbnail', 'comments')  
       );  
  
    register_post_type( 'knowledgebase' , $args );
	
	$categories_knowledgebase_labels = array(
		'name' => __( 'Categories', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'Category', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search Categories', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'All Categories', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent Category', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit Category', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update Category', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New Category', 'INFINITE_LANGUAGE'),
		'menu_name' => __( 'Categories', 'INFINITE_LANGUAGE')
	); 	
	
	register_taxonomy("knowledgebase-category", 
			array("knowledgebase"), 
			array("hierarchical" => true, 
					'labels' => $categories_knowledgebase_labels,
					'show_ui' => true,
					'query_var' => true,
					'rewrite' => array( 'slug' => 'knowledgebase-category' )
	));
	
	$attributes_knowledgebase_labels = array(
		'name' => __( 'Tags', 'INFINITE_LANGUAGE'),
		'singular_name' => __( 'Tag', 'INFINITE_LANGUAGE'),
		'search_items' =>  __( 'Search Tags', 'INFINITE_LANGUAGE'),
		'all_items' => __( 'All Tags', 'INFINITE_LANGUAGE'),
		'parent_item' => __( 'Parent Tag', 'INFINITE_LANGUAGE'),
		'edit_item' => __( 'Edit Tag', 'INFINITE_LANGUAGE'),
		'update_item' => __( 'Update Tag', 'INFINITE_LANGUAGE'),
		'add_new_item' => __( 'Add New Tag', 'INFINITE_LANGUAGE'),
		'new_item_name' => __( 'New Tag', 'INFINITE_LANGUAGE'),
		'menu_name' => __( 'Tags', 'INFINITE_LANGUAGE')
	); 	
	
	register_taxonomy('knowledgebase-tag',
		array('knowledgebase'),
		array('hierarchical' => true,
		'labels' => $attributes_knowledgebase_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'project-attribute' )
	));  
}  
add_action('init', 'knowledgebase_register');

// Include Single KnowledgeBase

function include_template_knowledgebase_function( $template_path ) {
if ( get_post_type() == 'knowledgebase' ) {
	if ( is_single() ) {
		$template_path = get_template_directory() . '/framework/post-types/single-knowledgebase.php';
	}
}
return $template_path;
}

add_filter( 'template_include', 'include_template_knowledgebase_function', 1 );

?>