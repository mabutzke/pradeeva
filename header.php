<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="<?php bloginfo( 'name' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
  	<meta name="keywords" content="<?php the_title(); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="site-header" class="site-padding" role="banner">
		<a id="logo" href="<?php echo esc_attr( home_url('/') ); ?>" rel="home">
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
		<button id="menu-button">Menu</button>
	</header>

	<div id="header-bg"></div>

	<nav id="main-menu" class="site-padding" role="navigation">
		<div class="menu-column-1">
			<?php if (has_nav_menu('main-menu')) wp_nav_menu(array(
				'theme_location' => 'main-menu',
				'container'     => false,
				'menu_id'       => 'main-menu-1',
				'menu_class'    => 'main-menu',
			)); ?>
			<?php get_search_form(); ?>
		</div>
		<div>
			<?php if (has_nav_menu('main-menu-2')) wp_nav_menu(array(
				'theme_location' => 'main-menu-2',
				'container'      => false,
				'menu_id'        => 'main-menu-2',
				'menu_class'     => 'main-menu',
			)); ?>
		</div>
	</nav>