<?php get_header() ?>



<?php $genres = get_terms(['taxonomy' => 'genre']); ?>

<ul class="nav nav-pills my-4">
    <?php foreach($genres as $genre): ?>
    <li class="nav-item">
        <a href="<?= get_term_link($genre) ?>" class="nav-link <?= is_tax('genre', $genre->term_id) ? 'active' : '' ?>"><?= $genre->name ?></a>
    </li>
    <?php endforeach; ?>
</ul>

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
<h2>Projets en cours</h2>
<!-- Post type -->
<?php
$projet = new WP_Query(array(
    'post_type' => 'projet',
    'posts_per_page' => 3
));
if($projet->have_posts()) : while($projet->have_posts()): $projet->the_post(); ?>

<div class="projet">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    <div class="clear"></div>
</div>
<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer() ?>