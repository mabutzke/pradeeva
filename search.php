<?php get_header(); ?>

<main role="main">

	<section id="latest-posts" class="site-flex site-padding site-internal">

		<header class="flex-column-1">
			<div id="search-title">
				<h1>Results for "<?php the_search_query(); ?>"</h1>
				<?php get_search_form(); ?>
			</div>
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
				<h2><?php echo 'Sorry, no results found for "' . get_search_query() .'"'; ?></h2>
			<?php endif; ?>
			<?php the_posts_pagination(); ?>
		</article>

	</section>

</main>

<?php get_footer();