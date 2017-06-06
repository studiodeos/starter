<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/js.min.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="skip-link screen-reader-text" href="#main">Skocz do treści</a>
	
<header id="header">
    
	<div class="kontener">
		<div class="logotop">
			<a href="<?php echo home_url('/'); ?>" rel="home">
				<?php if( is_home() ) { ?>
					<h1 class="h1"><span><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></span></h1>
				<?php } else { ?>
					<div class="h1"><span><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></span></div>
				<?php } ?>
			</a>
		</div>

		<div class="otwieracz"></div>
		<nav id="menuglowne">
			<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
		</nav>
	</div>
    
</header>

<main id="main">
	<div class="kontener">