<?php get_header() ?>

<h1>Voir tous les jeux</h1>

<?php if (have_posts()) : ?>
	<div class="row">
    
		<?php while (have_posts()) : the_post(); ?>
    		<div class="col-sm-4">
				<?php get_template_part('parts/card', 'post'); ?>
    		</div>
		<?php endwhile ?>        
    </div>
    <?php oxy_pagination() ?>
    <?= paginate_links(); ?>
<?php else : ?>
	<h1>Pas d'articles</h1>
<?php endif; ?> 

<?php get_footer() ?>