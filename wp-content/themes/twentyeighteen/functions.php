<?php
	
	function learningWordPress_resources() {
		wp_enqueue_style( 'style', get_stylesheet_uri());
	}

	add_action('wp_enqueue_scripts', 'learningWordPress_resources');

	// Navigation Menus
	register_nav_menus( array(
			'primary' => __('Primary Menu'),
			'footer' => __('Footer Menu'),
		) );

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

?>