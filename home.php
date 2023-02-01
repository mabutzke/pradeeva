<?php get_header(); ?>

<main role="main">

	<?php if (get_theme_mod( 'carousel-image-1' ) || get_theme_mod( 'carousel-image-2' ) || get_theme_mod( 'carousel-image-3' )) : ?>
		<section id="home-carousel">

			<div id="carousel-nav" class="site-padding">
				<button id="carousel-prev" class="plain">←</button>
				<button id="carousel-next" class="plain">→</button>
			</div>

			<?php if (get_theme_mod( 'carousel-image-1' )) : ?>
			<div class="carousel site-padding" style="background-image: url('<?php echo get_theme_mod( 'carousel-image-1', ''); ?>')">
				<div class="carousel-content">
					<h1 class="carousel-title"><?php echo get_theme_mod( 'carousel-text-1', ''); ?></h1>
					<button class="carousel-button plain" data-href="<?php echo get_theme_mod( 'carousel-url-1', ''); ?>">
						<?php echo get_theme_mod( 'carousel-button-1', ''); ?> <span class="arrow">→</span>
					</button>
				</div>
			</div>
			<?php endif; ?>

			<?php if (get_theme_mod( 'carousel-image-2' )) : ?>
			<div class="carousel site-padding" style="background-image: url('<?php echo get_theme_mod( 'carousel-image-2', ''); ?>')">
				<div class="carousel-content">
					<h2 class="carousel-title"><?php echo get_theme_mod( 'carousel-text-2', ''); ?></h2>
					<button class="carousel-button plain" data-href="<?php echo get_theme_mod( 'carousel-url-2', ''); ?>">
						<?php echo get_theme_mod( 'carousel-button-2', ''); ?> <span class="arrow">→</span>
					</button>
				</div>
			</div>
			<?php endif; ?>

			<?php if (get_theme_mod( 'carousel-image-3' )) : ?>
			<div class="carousel site-padding" style="background-image: url('<?php echo get_theme_mod( 'carousel-image-3', ''); ?>')">
				<div class="carousel-content">
					<h2 class="carousel-title"><?php echo get_theme_mod( 'carousel-text-3', ''); ?></h2>
					<button class="carousel-button plain" data-href="<?php echo get_theme_mod( 'carousel-url-3', ''); ?>">
						<?php echo get_theme_mod( 'carousel-button-3', ''); ?> <span class="arrow">→</span>
					</button>
				</div>
			</div>
			<?php endif; ?>

		</section>
	<?php endif; ?>

	<section id="latest-news" class="site-flex site-padding">

		<header class="flex-column-1">
			<a class="news-link section-title" href="<?php echo get_category_link( get_option( 'default_category' ) ); ?>"><h2 class="section-title">News</h2></a>
		</header>

		<article id="news-grid" class="flex-column-2">
			<?php $query = new WP_Query( array( 'cat' => get_option( 'default_category' ), 'posts_per_page' => get_theme_mod( 'home-news', '4') ) );
	 		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				<button class="latest-news button-3d" data-href="<?php the_permalink(); ?>">
					<div>
						<h3 class="post-title"><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
					</div>
					<div class="news-more">
						<p class="news-read">Read Full Story <span class="arrow">→</span></p>
						<p><?php echo get_the_date(); ?></p>
					</div>
				</button>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<h2><?php _e( 'Sorry, no posts matched your criteria.', 'pradeeva' ); ?></h2>
			<?php endif; ?>
		</article>

	</section>

	<section class="site-flex site-padding">

		<header class="flex-column-1">
			<h2 class="section-title">Latest Work</h2>
		</header>

		<article class="flex-column-2">
			<?php $query = new WP_Query( array( 'cat' => -get_option( 'default_category' ), 'posts_per_page' => get_theme_mod( 'home-work', '10') ) );
	 		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					<button class="latest-post button-3d" data-href="<?php the_permalink(); ?>">
						<h3 class="post-title"><?php the_title(); ?> <span class="arrow">→</span></h3>
						<div class="post-category">
							<?php the_category(' '); ?>
						</div>
					</button>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<h2><?php _e( 'Sorry, no posts matched your criteria.', 'pradeeva' ); ?></h2>
			<?php endif; ?>
		</article>

	</section>

</main>

<?php get_footer();