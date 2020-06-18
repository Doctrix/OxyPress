<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
		<a class="navbar-brand" href="#">
			<?php bloginfo('name') ?>
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
			])
			?>
	        <?= get_search_form() ?>
		</div>
	</nav>
<div class="container">