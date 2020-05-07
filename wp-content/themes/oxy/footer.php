</div>	
<br/>
<footer>
<?php
wp_nav_menu([
	'theme_location' => 'footer',
	'container' => false,
	'menu_class' => 'navbar-nav mr-auto cadre-bloc-shadow menu-footer'
	]);
the_widget(TwitchWidget::class, ['twitch' => '2HE5vRIx_RVGqQ'], ['before_widget' => '<div class="cadre-bloc-shadow">', 'after_widget' => '</div>']);
?>
</footer>
<div class="cadre-bloc-shadow">
	<h5><?= get_option('extra_infos') ?></h5>
	<h6><a href="<?php echo get_option('extra_liens') ?>">En savoir plus</a></h6>
	<h4>Projets en cours : <?= get_option('extra_events_titre') ?><br/>Sortie pr&eacute;vu : <?= get_option('extra_events_date') ?></h4>
</div>
<?php wp_footer() ?>
</body>
</html>