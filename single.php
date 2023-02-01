<?php get_header(); ?>

<main id="site-post" class="site-content site-padding" role="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<div id="post-featured" style="background-image: url('<?php echo get_the_post_thumbnail_url('', 'large'); ?>')" aria-label="Featured image">
				<a id="read" href="#read" aria-label="Scroll to article">
					<span>↓</span>
				</a>
			</div>
		<?php endif; ?>

		<header id="content-intro">
			<?php if ( in_category( get_option( 'default_category' ) ) ) : ?>
				<p id="content-date"><?php the_date(); ?></p>
			<?php else : ?>
				<div class="post-category"><?php the_category(' '); ?></div>
			<?php endif; ?>
			<h1 id="content-title"><?php the_title(); ?></h1>
		</header>

		<article id="content" class="content-wrap">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</article>

		<?php endwhile; ?>
		
	<?php else : ?>

		<header id="content-intro">
			<h1 id="content-title"><?php _e( 'Sorry, no posts matched your criteria.', 'pradeeva' ); ?></h1>
		</header>

	<?php endif; ?>

</main>

<?php get_footer();