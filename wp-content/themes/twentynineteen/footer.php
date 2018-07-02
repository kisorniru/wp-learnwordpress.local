		
		<footer class="site-footer">

			<div class="footer-widgets clearfix">

				<?php if (is_active_sidebar('footer_one')) : ?>
					<div class="footer-widget-area">
						<?php dynamic_sidebar('footer_one'); ?>
					</div>
				<?php endif; ?>

				<?php if (is_active_sidebar('footer_two')) : ?>
					<div class="footer-widget-area">
						<?php dynamic_sidebar('footer_two'); ?>
					</div>
				<?php endif; ?>

				<?php if (is_active_sidebar('footer_three')) : ?>
					<div class="footer-widget-area">
						<?php dynamic_sidebar('footer_three'); ?>
					</div>
				<?php endif; ?>

				<?php if (is_active_sidebar('footer_four')) : ?>
					<div class="footer-widget-area">
						<?php dynamic_sidebar('footer_four'); ?>
					</div>
				<?php endif; ?>

			</div>

			<nav class="site-nav">
				<?php
					$arg = array(
						'theme_location' => 'footer'
						);
				?>
				<?php wp_nav_menu($arg); ?>
			</nav>

			<p><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?></p>
		
		</footer>

		</div> <!-- container -->

		<?php wp_footer(); ?>
	
	</body>

</html>