<?php

// Add js for admin panel
add_action('admin_enqueue_scripts', 'aothor_info_custom_js_resources');

function aothor_info_custom_js_resources() {

		wp_enqueue_media();
		
		wp_register_script('admin_custom_script', get_theme_file_uri().'/assets/js/admin_script.js', array('jquery'));
		
		wp_enqueue_script('admin_custom_script');

	}


// Create Custom Widgets
class Author_Info_Widget extends WP_widget {
	
	// This function is overwritten and for loading it into the widget list in admin panel
	public function __construct() {
		parent::__construct('author_info', 'Author Info Box', array(
			'description' => 'Author Information Box Contained with title, image and details.'
		));
	}

	// This function is overwritten and for showing the widget in front-end
	public function widget( $args, $instance ) {

		?>

			<?php echo $args['before_widget']; ?>
				<?php echo $args['before_title']. $instance['title'] .$args['after_title']; ?>
				<div class="sidebar-widget__about-me">
					<div class="sidebar-widget__about-me-image">
						<img src="<?php echo $instance['author_info_image']; ?>" alt="<?php echo $instance['title']; ?>">
					</div>
					<p><?php echo $instance['author_bio']; ?></p>
				</div>
			<?php echo $args['after_widget']; ?>

		<?php
	
	}

	// This function is overwritten and for creating the widget form in admin panel
	public function form( $instance ) {
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
				<input type="text" value="<?php echo $instance['title']; ?>" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" >
			</p>
			<p>
				<button class="button" id="author_info_image">Upload Image</button>
				<input type="hidden" name="<?php echo $this->get_field_name('author_info_image') ?>" class="author_info_image_link" value="<?php echo $instance['author_info_image']; ?>" >
				<div class="image_show">
					<img src="<?php echo $instance['author_info_image']; ?>" width="260" height="auto" alt="">
				</div>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('author_bio'); ?>">Author Bio</label>
				<textarea name="<?php echo $this->get_field_name('author_bio'); ?>" id="<?php echo $this->get_field_id('author_bio'); ?>" class="widefat"><?php echo $instance['author_bio']; ?></textarea>
			</p>
		<?php
	}

}