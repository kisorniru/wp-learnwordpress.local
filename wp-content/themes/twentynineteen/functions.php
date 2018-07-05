<?php

	function learningWordPress_resources() {
		wp_enqueue_style( 'style', get_stylesheet_uri());
		wp_enqueue_style( 'carousel-style', get_theme_file_uri().'/assets/css/carousel.css');
		wp_enqueue_style( 'bootstrap-style', get_theme_file_uri().'/assets/css/bootstrap.min.css');

		wp_enqueue_script('bootstrap-script', get_theme_file_uri().'/assets/js/bootstrap.min.js', array('jquery'));
		wp_enqueue_script('jquery-slim-script', get_theme_file_uri().'/assets/js/jquery-slim.min.js', array('jquery'));
	}

	add_action('wp_enqueue_scripts', 'learningWordPress_resources');

	// Get Top Ancestor
	function get_top_ancestor_id() {
		global $post;
		if ($post->post_parent) {
			$ancestor = array_reverse(get_post_ancestors($post->ID));
			return $ancestor[0];
		}
		else {
			return $post->ID;
		}

	}

	// Does page have children?
	function has_children() {
		global $post;
		$pages = get_pages(array('child_of' => $post->ID));
		return count($pages);
	}

	// Customize excerpt word count length
	function custom_excerpt_length() {
		return 25;
	}

	add_filter( 'excerpt_length', 'custom_excerpt_length');

	function learningWordPress_setup() {

		// Custom Post Type
		register_post_type('sliderUniqueId', array(
			'labels' => array(
					'name' => 'Sliders',
					'add_new_item' => 'Add Slider Image'
				),
			'public' => true,
			'supports' => array(
					'title',
					'thumbnail'
				)
		));

		// Navigation Menus
		register_nav_menus( array(
			'primary' => __('Primary Menu'),
			'footer' => __('Footer Menu'),
		) );

		// Add Featured Image Support
		add_theme_support('post-thumbnails');
		add_image_size( 'small-thumbnail', 180, 120, true );
		add_image_size( 'banner-image', 920, 210, true );
		// add_image_size( 'banner-image', 920, 210, array('left', 'top'));

		// Add post format support
		add_theme_support('post-formats', array('aside', 'gallery', 'link'));
	}

	add_action( 'after_setup_theme', 'learningWordPress_setup' );

	// Add Our Widget Locations

	function ourWidgetsInit() {

		register_sidebar( array( 
			'name' => 'Sidebar',
			'id' => 'sidebar_one',
			'description' => 'Sidebar description goes here.',
			'before_widget'  => '<div class="widget-item">',
			'after_widget'   => '</div>',
			'before_title'  => '<h3 class="my-special-class">',
        	'after_title'   => '</h3>',
		) );

		register_sidebar( array( 
			'name' => 'Footer Column 1',
			'id' => 'footer_one',
			'before_widget'  => '<div class="widget-item">',
			'after_widget'   => '</div>',
			'before_title'  => '<h3 class="my-special-class">',
        	'after_title'   => '</h3>',
		) );

		register_sidebar( array( 
			'name' => 'Footer Column 2',
			'id' => 'footer_two',
			'before_widget'  => '<div class="widget-item">',
			'after_widget'   => '</div>',
			'before_title'  => '<h3 class="my-special-class">',
        	'after_title'   => '</h3>',
		) );

		register_sidebar( array( 
			'name' => 'Footer Column 3',
			'id' => 'footer_three',
			'before_widget'  => '<div class="widget-item">',
			'after_widget'   => '</div>',
			'before_title'  => '<h3 class="my-special-class">',
        	'after_title'   => '</h3>',
		) );

		register_sidebar( array( 
			'name' => 'Footer Column 4',
			'id' => 'footer_four',
			'before_widget'  => '<div class="widget-item">',
			'after_widget'   => '</div>',
			'before_title'  => '<h3 class="my-special-class">',
        	'after_title'   => '</h3>',
		) );
		
		// Register Custom Widgets
		register_widget('Author_Info_Widget');

	}

	include_once('custom_functions/custom_wedgets.php');

	add_action('widgets_init','ourWidgetsInit');