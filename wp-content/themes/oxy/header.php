<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script data-ad-client="ca-pub-2314966356420014" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
	<a class="navbar-brand" href="#">
		<?php bloginfo('name'); ?>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?php
		wp_nav_menu([
			'theme_location' => 'header',
			'container' => false,
			'menu_class' => 'navbar-nav mr-auto'
		]);
		?>
		<?php get_search_form(); ?>
	</div>
</nav>
	<div class="container">

<?php slider_ban_show(); ?>
