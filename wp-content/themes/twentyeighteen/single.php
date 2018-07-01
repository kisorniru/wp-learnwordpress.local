<?php
	
	get_header();

	if (have_posts()) :
		while (have_posts()) : 
			the_post();
?>
			<article class="post">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="post-info">
					<?php the_time('F jS, Y g:i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in 
					<?php
						$categories = get_the_category();
						$separetor = ", ";
						$output = '';

						if ($categories) {
							foreach ($categories as $category) {
								$output .= '<a href="'.get_category_link($category->term_id).'">' . $category->cat_name . '</a>' . $separetor;
							}
							echo trim($output, $separetor);
						}
					?>
				</p>

				<?php the_post_thumbnail('banner-image'); ?>

				<?php

					the_content();

				?>
				
				<p class="post-tag">
					Tag |  
					<?php
						$tags = get_the_tags();;
						$separetor = ", ";
						$output = '';

						if ($tags) {
							foreach ($tags as $tag) {
								$output .= '<a href="'.get_tag_link($tag->term_id).'">' . $tag->name . '</a>' . $separetor;
							}
							echo trim($output, $separetor);
						}
					?>
				</p>
			</article>
<?php
		endwhile;
	else :
		echo '<p> No content found. </p>';
		endif;

	get_footer();

?>