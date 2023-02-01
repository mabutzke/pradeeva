	<footer id="site-footer" class="site-flex site-padding" role="contentinfo">

		<div class="flex-column-1">
			<div id="social-accounts">
			<?php if (get_theme_mod( 'facebook' )) : ?>
				<a href="<?php echo get_theme_mod('facebook', ''); ?>" class="img-link" target="_blank" rel="facebook">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-facebook.svg" class="footer-social-icon" rel="icon" aria-label="Facebook Profile">
				</a>
			<?php endif; ?>
			<?php if (get_theme_mod( 'instagram' )) : ?>
				<a href="<?php echo get_theme_mod('instagram', ''); ?>" class="img-link" target="_blank" rel="instagram">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-instagram.svg" class="footer-social-icon" rel="icon" aria-label="Instagram Profile">
				</a>
			<?php endif; ?>
			<?php if (get_theme_mod( 'twitter' )) : ?>
				<a href="<?php echo get_theme_mod('twitter', ''); ?>" class="img-link" target="_blank" rel="twitter">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-twitter.svg" class="footer-social-icon" rel="icon" aria-label="Twitter Profile">
				</a>
			<?php endif; ?>
			<?php if (get_theme_mod( 'youtube' )) : ?>
				<a href="<?php echo get_theme_mod('youtube', ''); ?>" class="img-link" target="_blank" rel="youtube">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-youtube.svg" class="footer-social-icon" rel="icon" aria-label="Youtube Profile">
				</a>
			<?php endif; ?>
			</div>

			<a id="footer-logo" href="<?php echo esc_attr( home_url('/') ); ?>" class="img-link" rel="home">
				<?php if ( function_exists( 'the_custom_logo' ) ) :
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) : ?>
						<img src="<?php echo esc_url( $logo[0] ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
					<?php else : ?>
						<?php bloginfo( 'name' ); ?>
					<?php endif; ?>
				<?php endif; ?>
			</a>

			<?php if ( get_theme_mod( 'footer' ) ) : ?>
				<p id="footer-info"><?php echo get_theme_mod('footer', ''); ?></p>
			<?php endif; ?>
		</div>
		
		<div class="flex-column-2">
			<?php if ( has_nav_menu( 'footer-menu' ) ) wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'container'	     => false,
				'menu_id'        => 'footer-menu',
			)); ?>
		</div>

		<?php wp_footer(); ?>

	</footer>
</body>
</html>