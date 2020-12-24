			<footer id="colophon" class="site-footer" role="contentinfo">
				<?php
				wp_nav_menu([
					'theme_location' => 'footer',
					'container' => false,
					'menu_class' => 'navbar-nav mr-auto cadre-bloc-shadow bloc-large'
					]);
				the_widget(TwitchWidget::class, ['twitch' => '2HE5vRIx_RVGqQ'], ['before_widget' => '<div class="cadre-bloc-shadow">', 'after_widget' => '</div>']);
				?>
			<div class="cadre-bloc-shadow">
				<h3 style="text-align: center;"><?= get_option('extra_infos'); ?></h3>
				<h4 style="text-align: center;"><a href="<?php echo get_option('extra_liens'); ?>">En savoir plus</a></h4>
				<h5 style="text-align: center;">Projets en cours : <?= get_option('extra_events_titre'); ?>
				<br/>Sortie pr&eacute;vu : <?= get_option('extra_events_date'); ?></h5>
				<div style="text-align: right;"><script type="text/javascript" src="<?= "//".$_SERVER['HTTP_HOST']."/compteur/"; ?>gcount.php?page=index"></script></div>
			</div>
			<div class="cadre-bloc-shadow" style="text-align: center;">
				<ul><strong><a href="http://oxygames.fr/<?= get_option('oxygames', ''); ?>" target="_blank">OxyGameS</a>
					- <a href="http://server.oxygames.fr/<?= get_option('ogs', ''); ?>" target="_blank">OGS</a>
					 - <a href="http://twitch.tv/<?= get_option('twitch', ''); ?>" target="_blank">Twitch</a>
					  -	<a href="http://twitter.com/<?= get_option('twitter', ''); ?>" target="_blank">Twitter</a>
					   - <a href="http://twitter.com/<?= get_option('facebook', ''); ?>" target="_blank">Facebook</a>
					</strong><br><?= get_option('copyright', ''); ?>
				</ul>
			</div>
		</footer>
	</div>
	<!-- #content -->
	<br>
<?php wp_footer() ?>
</body>
</html>