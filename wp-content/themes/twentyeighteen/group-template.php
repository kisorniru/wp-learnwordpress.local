<?php

/*
Template Name: Group Layout
*/
	
	get_header();

	if (have_posts()) :
		while (have_posts()) : 
			the_post();
?>
			<article class="post page">
				<h2><?php the_title(); ?></h2>

				<div class="info-box">
					<h4>Disclaimer Box</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi egestas erat sed imperdiet eleifend. Nunc a erat vel nulla ultrices maximus non bibendum nisi.</p>
				</div>

				<p><?php the_content(); ?></p>
			</article>
<?php
		endwhile;
	else :
		echo '<p> No content found. </p>';
		endif;

	get_footer();

?>