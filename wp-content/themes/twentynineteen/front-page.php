<?php
	
	get_header();

	$sliderImages = new WP_Query(array(
						'post_type' => 'sliderUniqueId'
					));

	?>

	<div class="site-content clearfix">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<ol class="carousel-indicators">
			<?php

				$i = 0;

				while ($sliderImages->have_posts()) : $sliderImages->the_post();

					?>
					<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0) { ?>active<?php } ?>"></li>
					<?php
				$i++;
				endwhile;
			?>
			</ol>

			<div class="carousel-inner">

				<?php

					$i = 0;

					while ($sliderImages->have_posts()) : $sliderImages->the_post();

						?>
						<div class="carousel-item <?php if($i==0) { ?>active<?php } ?>">

							<?php the_post_thumbnail(); ?>

							<div class="container">

								<div class="carousel-caption text-left">

									<h1>Example headline.</h1>

									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

									<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>

								</div>

							</div>

						</div>
						<?php
					$i++;
					endwhile;
				?>

			</div>

			<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		</div>
		
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