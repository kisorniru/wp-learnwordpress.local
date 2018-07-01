<?php
	
	function learningWordPress_resources() {
		wp_enqueue_style( 'style', get_stylesheet_uri());
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
	}

	add_action( 'after_setup_theme', 'learningWordPress_setup' );

?>