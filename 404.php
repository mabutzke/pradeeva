<?php get_header(); ?>

<main class="site-content site-padding" role="main">

	<header id="content-intro">
		<h1 id="content-title">Ooooops, we've got a 404. If only it was bingo!</h1>
			<br>
			<h2>The page you are trying to reach doesn't exist.</h2>
			<p>The url <b><?php echo get_bloginfo('url').$_SERVER['REQUEST_URI']; ?></b> is unreachable. You can try changing the address or making a search on the site.</p>
			<br>
		<h2>Try searching on the site:</h2>
		<?php get_search_form(); ?>
	</header>
	<div id="content" class="content-wrap">
		<div></div>
	</div>

</main>

<?php get_footer();