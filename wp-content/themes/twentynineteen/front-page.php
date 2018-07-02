<?php
	
	get_header();

	?>

	<div class="site-content clearfix">
		
		<?php

			if (have_posts()) :

				while (have_posts()) : the_post();

					the_content();

				endwhile;

			else :

				echo '<p> No content found. </p>';

			endif;

			?>

			<div class="home-columns clearfix">
				
				<div class="one-half">
					<?php

					// Opinion post loop begins here
					$opinionPosts =  new WP_Query('cat=17&posts_per_page=2');
					// $opinionPosts =  new WP_Query('cat=17&posts_per_page=2&orderby=title&order=ASC');

					if ($opinionPosts->have_posts()) :

						while ($opinionPosts->have_posts()) : $opinionPosts->the_post();

							?>
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
								<?php the_excerpt(); ?>
							<?php

						endwhile;

					else :

						// fallback no content message here

					endif;

					wp_reset_postdata();

					?>
				</div>

				<div class="one-half last">
					<?php

						// News post loop begins here
						$newsPosts =  new WP_Query('cat=10&posts_per_page=2');
						// $newsPosts =  new WP_Query('cat=17&posts_per_page=2&orderby=title&order=ASC');

						if ($newsPosts->have_posts()) :

							while ($newsPosts->have_posts()) : $newsPosts->the_post();

								?>
									<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
									<?php the_excerpt(); ?>
								<?php

							endwhile;

						else :

							// fallback no content message here

						endif;

						wp_reset_postdata();

					?>
				</div>

			</div>

	</div>

	<?php

	get_footer();

?>