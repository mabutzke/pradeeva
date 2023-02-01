<?php get_header(); ?>

<main role="main">
	<?php if ( is_category( get_option( 'default_category' ) ) ) : ?>

		<section id="latest-news" class="site-flex site-padding">

			<header class="flex-column-1">
				<h1 class="section-title"><?php single_term_title(); ?></h1>
			</header>

			<article id="news-grid" class="flex-column-2">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
				<?php else : ?>
					<h2><?php _e( 'Sorry, no posts matched your criteria.', 'pradeeva' ); ?></h2>
				<?php endif; ?>
				<?php the_posts_pagination(); ?>
			</article>

		</section>

	<?php else : ?>

		<section id="latest-posts" class="site-flex site-padding site-internal">

			<header class="flex-column-1">
				<h2 class="section-title"><?php single_term_title(); ?></h2>
			</header>

			<article class="flex-column-2">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<button class="latest-post button-3d" data-href="<?php the_permalink(); ?>">
						<h3 class="post-title"><?php the_title(); ?> <span class="arrow">→</span></h3>
						<div class="post-category">
							<?php the_category(' '); ?>
						</div>
					</button>
					<?php endwhile; ?>
				<?php else : ?>
					<h2><?php _e( 'Sorry, no posts matched your criteria.', 'pradeeva' ); ?></h2>
				<?php endif; ?>
				<?php the_posts_pagination(); ?>
			</article>

		</section>

	<?php endif; ?>
</main>

<?php get_footer();