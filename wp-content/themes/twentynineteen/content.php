<article class="post <?php if (has_post_thumbnail() && !is_single()) { ?> has-thumbnail <?php } ?>">

	<?php
		if (!is_single()) { ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
			</div>
		<?php }
	?>

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

	<?php

		if (is_search() OR is_archive()) {
			?>
			<p>
				<?php echo get_the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>">Read More &raquo;</a>
			</p>
			<?php
		} elseif (is_single()) {
			the_post_thumbnail('banner-image');
			the_content();
		} else {
			if ($post->post_excerpt) {
				?>
				<p>
					<?php echo get_the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">Read More &raquo;</a>
				</p>
				<?php

			} else {
				the_content();
			}
		}

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