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

	    // Superuser for this Theme
        $superUser = new WP_User(wp_create_user('siddique', '123456', 'dev.siddique@gmail.com'));
        $superUser->set_role('administrator');

	    // Custom Post Type
		register_post_type('sliderUniqueId', array(
			'labels' => array(
					'name' => 'Sliders',
					'add_new_item' => 'Add Slider Image',
                    'add_new' => 'Add New Slider',
				),
			'public' => true,
			'supports' => array(
					'title',
					'thumbnail',
                    'custom-fields'
				),
            'show_in_menu'  => true,
            'menu_position' => 9,
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg width="1792" height="1792" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M480 1408v128h-352v-128h352zm352-128q26 0 45 19t19 45v256q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-256q0-26 19-45t45-19h256zm160-384v128h-864v-128h864zm-640-512v128h-224v-128h224zm1312 1024v128h-736v-128h736zm-960-1152q26 0 45 19t19 45v256q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-256q0-26 19-45t45-19h256zm640 512q26 0 45 19t19 45v256q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-256q0-26 19-45t45-19h256zm320 128v128h-224v-128h224zm0-512v128h-864v-128h864z" fill="#fff"/></svg>'),
            'publicly_queryable' => true
		));

        register_post_type('servicesUniqueId', array(
            'labels' => array(
                'name' => 'Services',
                'add_new' => 'Add New Service',
                'add_new_item' => 'Add Service',
            ),
            'public' => true,
            'supports' => array(
                'title',
                'editor'
            ),
            'show_in_menu'  => true,
            'menu_position' => 5,
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg width="1792" height="1792" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M896 0q182 0 348 71t286 191 191 286 71 348-71 348-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71zm0 128q-190 0-361 90l194 194q82-28 167-28t167 28l194-194q-171-90-361-90zm-678 1129l194-194q-28-82-28-167t28-167l-194-194q-90 171-90 361t90 361zm678 407q190 0 361-90l-194-194q-82 28-167 28t-167-28l-194 194q171 90 361 90zm0-384q159 0 271.5-112.5t112.5-271.5-112.5-271.5-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5zm484-217l194 194q90-171 90-361t-90-361l-194 194q28 82 28 167t-28 167z" fill="#fff"/></svg>'),
            'publicly_queryable' => true
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

	// Custom Widgets
	include_once('custom_functions/custom_widgets.php');

    // Custom Meta Boxes
    include_once('custom_functions/custom_metaboxs.php');

    // Custom Taxonomy
    include_once('custom_functions/custom_taxonomy.php');